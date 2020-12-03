<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\User;
use App\Models\Personal;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Exception;
use Flash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Response;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Post.
     *
     * @param  UserDataTable  $userDataTable
     * @return JsonResponse|View
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }


    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create(Personal $personal)
    {
        return view('users.create', compact('personal'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  CreateUserRequest  $request
     *
     * @throws Exception
     *
     * @return RedirectResponse|Redirector
     */
    public function store(Personal $personal , CreateUserRequest $request)
    {
            $user = new User;
            $user->name = $request->Nombre_usuario;
            $user->email = $request->Email;
            $user->password = Hash::make($request->password);
            $user->Rol_id = $request->Rol_id;
            $user->Personal_id = $personal->id ;
            $user->save();

            Flash::success('User saved successfully.');
            return redirect(route('personals.show', $personal->id));
    }

    /**
     * Display the specified User.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.show',$id));
        }

        return view('users.show',$id)->with('user', $user);
    }

    /**
     * Show the form for editing the specified Video.
     *
     * @param  int  $id
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function edit($id, Request $request)
    {
        $user = User::find($id);

        if ($request->ajax()) {
            return $this->sendResponse($user, 'User retrieved successfully.');
        }

        if (empty($user)) {
            Flash::error('User not found');

            return "No existe";
        }

        return view('users.edit', compact('user'));
    }

    /**
     * @param  User  $user
     * @param  UpdateUserRequest  $request
     *
     * @return RedirectResponse|Redirector
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $user = new User;
            $user->name = $request->Nombre_usuario;
            $user->email = $request->Email;
            $user->password = $request->password;
            $user->Rol_id = $request->Rol_id;
            $user->save();

            Flash::success('User saved successfully.');
            return redirect(route('personals.show', $user->Personal_id));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  User  $user
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->sendSuccess('User deleted successfully.');
    }

    /**
     * @return mixed
     */
    public function editProfile()
    {
        try {
            $user = $this->userRepository->findWithoutFail(Auth::id());

            return view('profile.edit', compact('user'));
        } catch (Exception $e) {
            return Redirect::back()->withErrors([$e->getMessage()]);
        }
    }

    /**
     * @param  UpdateUserProfileRequest  $request
     *
     * @return RedirectResponse|Redirect
     */
    public function updateProfile(UpdateUserProfileRequest $request)
    {
        try {
            $user = $this->userRepository->findWithoutFail(Auth::id());
            if (empty($user)) {
                Flash::error('User not found');

                return redirect(route('users.index'));
            }
            $input = $request->all();
            $this->userRepository->updateProfile($input);
            Flash::success('Profile updated successfully.');

            return redirect('users');
        } catch (Exception $e) {
            return Redirect::back()->withErrors([$e->getMessage()])->withInput($request->all());
        }
    }
}

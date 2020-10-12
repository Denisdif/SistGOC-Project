<?php

namespace App\DataTables;

use App\Models\Tarea;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TareaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'tareas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tarea $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tarea $model)
    {
        return $model->newQuery()->with(['Estado_tarea','Tipo_tarea']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'Nombre_tarea',
            'Fecha_inicio',
            'Fecha_fin',
            'Valor',
            'Correcciones',
            'Descripcion_tarea',
            /*'Proyecto_id',
            'Tipo_tarea_id'=> new \Yajra\DataTables\Html\Column(['title'=>'Tipo','data'=>'Tipo_tarea.Nombre_tipo_tarea','name'=>'Tipo_tarea.Nombre_tipo_tarea']),
            'Estado_tarea_id'=> new \Yajra\DataTables\Html\Column(['title'=>'Estado','data'=>'Estado_tarea.Nombre_estado_tarea','name'=>'Estado_tarea.Nombre_estado_tarea'])
        */];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tareas_datatable_' . time();
    }
}

<?php

namespace App\DataTables;

use App\Models\consideracion_ambiente;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class consideracion_ambienteDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'consideracion_ambientes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\consideracion_ambiente $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(consideracion_ambiente $model)
    {
        return $model->newQuery()->with(['consideracion','ambiente']);
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
                'paging' => false,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    /*['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],*/
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    /*['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],*/
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
            'Complejidad',
            'ambiente' => new \Yajra\DataTables\Html\Column(['title'=>'Ambiente', 'data'=>'ambiente.Nombre_ambiente', 'name'=>'ambiente.Nombre_ambiente']),
            'consideracion'=> new \Yajra\DataTables\Html\Column(['title'=>'Consideracion', 'data'=>'consideracion.Nombre_Consideracion', 'name'=>'consideracion.Nombre_Consideracion'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'consideracion_ambientes_datatable_' . time();
    }
}

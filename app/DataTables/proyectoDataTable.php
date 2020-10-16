<?php

namespace App\DataTables;

use App\Models\Proyecto;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ProyectoDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'proyectos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Proyecto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Proyecto $model)
    {
        return $model->newQuery();
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
            'Nombre_proyecto'=> new \Yajra\DataTables\Html\Column(['title'=>'Nombre de Proyecto','data'=>'Nombre_proyecto','name'=>'Nombre_proyecto']),
            'Tipo_proyecto'=> new \Yajra\DataTables\Html\Column(['title'=>'Tipo de Proyecto','data'=>'Tipo_proyecto','name'=>'Tipo_proyecto']),
            //'Nro_plantas',
            //'Fecha_inicio_Proy',
            'Fecha_fin_Proy'=> new \Yajra\DataTables\Html\Column(['title'=>'Fecha limite','data'=>'Fecha_fin_Proy','name'=>'Fecha_fin_Proy']),
            /*'Director_id',
            'Comitente_id',
            'created_at',*/
            'Descripcion'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'proyectos_datatable_' . time();
    }
}

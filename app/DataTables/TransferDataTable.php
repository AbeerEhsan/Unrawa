<?php

namespace App\DataTables;

use App\Models\Transfer;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TransferDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'transfers.datatables_actions')
            ->editColumn('driver_id', function (Transfer $trans) {
                return  $trans->driver->name;
            })
            ->editColumn('to', function (Transfer $trans) {
                return  $trans->forward->name??'';
            })
            ->addColumn('van', function (Transfer $trans) {
                return  $trans->driver->van_num;
            })
           
            ->rawColumns(['driver_id', 'to', 'van','action']);
      
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Transfer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transfer $model)
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
            'driver_id' => ['title'=>'Driver Name'],
            'cart_note',
            'day',
            'date',
            'time',
            'van' => ['title'=>'Van.No'],
            // 'category_id',
            'to'=>['title'=>'Forward To']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'transfers_datatable_' . time();
    }
}

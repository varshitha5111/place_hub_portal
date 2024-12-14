<?php

namespace App\DataTables;

use App\Models\order;
use App\Models\UserOrder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserOrderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->setRowId('id')
            ->addColumn('user_name', function ($query) {
                return '<p>' . $query->user->name . '</p>';
            })
            ->addColumn('user_email', function ($query) {
                return '<p>' . $query->user->email . '</p>';
            })
            ->addColumn('package', function ($query) {
                return '<p>' . $query->package->name . '</p>';
            })
            ->addColumn('paid', function ($query) {
                return '<p>' . $query->paid_amount . '</p>';
            })
            ->addColumn('payment_method', function ($query) {
                return '<p>' . $query->payment_mode . '</p>';
            })
            ->addColumn('paid_amount', function ($query) {
                return '<p>' . $query->paid_amount . '</p>';
            })
            ->addColumn('paid_in', function ($query) {
                return '<p>' . $query->paid_currency . '</p>';
            })
            ->addColumn('payment_status', function ($query) {
                if ($query->payment_status === 'success') {
                    return '<button class="btn btn-sm btn-success" disabled>accepted</button>';
                } else if ($query->payment_status === 'pending') {
                    return '<button class="btn btn-sm btn-warning" disabled>pending</button>';
                } else {
                    return '<button class="btn btn-sm btn-danger" disabled>failed</button>';
                }
            })
            ->addColumn('action', function ($query) {
                $edit = '<div class="row"><div class="col-1"><a href="' . route('user.orders.view', $query->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a></div></div>';
                
                return $edit;
            })
            ->rawColumns(['user_name', 'paid_in', 'paid_amount', 'user_email', 'package', 'paid', 'payment_mode', 'payment_status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserOrder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(order $model): QueryBuilder
    {
        return $model->where('user_id',auth()->user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('userorder-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('user_name'),
            Column::make('user_email'),
            Column::make('package'),
            Column::make('payment_mode'),
            Column::make('paid_amount'),
            Column::make('paid_in'),
            Column::make('payment_status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'UserOrder_' . date('YmdHis');
    }
}

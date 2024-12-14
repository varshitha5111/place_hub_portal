<?php

namespace App\DataTables;

use App\Models\package;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class packageDataTable extends DataTable
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
            ->addColumn('Type', function ($query) {
                if ($query->type === 'free') {
                    return '<button class="btn btn-sm btn-success">Free</button>';
                } else {
                    return '<button class="btn btn-sm btn-warning">Paid</button>';
                }
            })
            ->addColumn('Name', function ($query) {
                return '<p>' . $query->name . '</p>';
            })
            ->addColumn('Price', function ($query) {
                return '<p>' . $query->price . '</p>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    return '<button class="btn btn-sm btn-success">Active</button>';
                } else {
                    return '<button class="btn btn-sm btn-danger">Inactive</button>';
                }
            })
            ->addColumn('action', function ($query) {
                $edit = '<div class="row"><div class="col-1"><a href="'.route('admin.package.edit',$query->id).'" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a></div>';
                $delete = '<div class="col-1"><a href="'.route('admin.package.show',$query->id).'" class="mx-1 btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></div>';
                return $edit . $delete;
            })
            ->rawColumns(['id', 'Type', 'Name', 'Price', 'status','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\package $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(package $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('package-table')
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
            Column::make('Name'),
            Column::make('Type'),
            Column::make('Price'),
            Column::make('status'),
            Column::make('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'package_' . date('YmdHis');
    }
}

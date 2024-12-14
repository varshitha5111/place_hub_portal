<?php

namespace App\DataTables;

use App\Models\location;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class locationDataTable extends DataTable
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
            ->addColumn('location', function ($query) {
                return '<span style="font-weight:bold;">' . $query->name . '</span>';
            })
            ->addColumn('show_at_home', function ($query) {
                if ($query->show_at_home === 1)
                    return '<button class="btn btn-sm btn-success" disabled>active</button>';
                else
                    return '<button class="btn btn-sm btn-danger" disabled>inactive</button>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1)
                    return '<button class="btn btn-sm btn-success" disabled>active</button>';
                else
                    return '<button class="btn btn-sm btn-danger" disabled>inactive</button>';
            })
            ->addColumn('action', function ($query) {
                $edit = '<a href="' . route('admin.location.edit', $query->slug) . '" class="btn btn-primary btn-sm">edit</a>';
                $delete = '<a href="' . route('admin.location', $query->slug) . '" class="mx-1 btn btn-danger btn-sm">delete</a>';
                return $edit . $delete;
            })
            ->rawColumns(['location','show_at_home', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\location $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(location $model): QueryBuilder
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
            ->setTableId('location-table')
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
            // Column::computed('action')
            //       ->exportable(false)
            //       ->width(100)
            //       ->addClass('text-center'),
            Column::make('id'),
            Column::make('location'),
            Column::make('show_at_home'),
            Column::make('status'),
            Column::make('action')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'location_' . date('YmdHis');
    }
}

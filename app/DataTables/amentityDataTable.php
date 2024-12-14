<?php

namespace App\DataTables;

use App\Models\amentity;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class amentityDataTable extends DataTable
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
            ->addColumn('title', function ($query) {
                return '<span style="font-weight:bold;">' . $query->name . '</span>';
            })
            ->addColumn('icon', function ($query) {
                return '<i class="'.$query->icon.'" style="font-size:30px;"></i>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1)
                    return '<button class="btn btn-sm btn-success" disabled>active</button>';
                else
                    return '<button class="btn btn-sm btn-danger" disabled>inactive</button>';
            })
            ->addColumn('action', function ($query) {
                $edit = '<a href="' . route('admin.amentity.edit', $query->slug) . '" class="btn btn-primary btn-sm">edit</a>';
                $delete = '<a href="' . route('admin.amentity.edit', $query->slug) . '" class="mx-1 btn btn-danger btn-sm">delete</a>';
                return $edit . $delete;
            })
            ->rawColumns(['icon', 'title', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\amentity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(amentity $model): QueryBuilder
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
            ->setTableId('amentity-table')
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
            Column::make('title'),
            Column::make('icon'),
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
        return 'amentity_' . date('YmdHis');
    }
}

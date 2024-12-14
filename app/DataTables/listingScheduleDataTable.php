<?php

namespace App\DataTables;

use App\Models\listingSchedule;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class listingScheduleDataTable extends DataTable
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
            ->addColumn('day', function ($query) {
                return '<p>' . $query->day . '</p>';
            })
            ->addColumn('start', function ($query) {
                return '<p>' . $query->start . '</p>';
            })
            ->addColumn('end', function ($query) {
                return '<p>' . $query->end . '</p>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status) {
                    return '<button class="btn btn-success">Active</button>';
                } else {
                    return '<button class="btn btn-warning">Inactive</button>';
                }
            })
            ->addColumn('action', function ($query) {
                $edit = '<div class="row"><div class="col-1"><a href="' . route('admin.listing.schedule.edit', [$query->list_id,$query->id]) . '" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a></div>';
                $delete = '<div class="col-1"><a href="#" class="mx-1 btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></div>';
                return $edit.$delete;
            })
            ->rawColumns(['day', 'start', 'end', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\listingSchedule $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(listingSchedule $model): QueryBuilder
    {
        return $model->where('list_id',$this->list_id)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('listingschedule-table')
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
            Column::make('day'),
            Column::make('start'),
            Column::make('end'),
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
        return 'listingSchedule_' . date('YmdHis');
    }
}

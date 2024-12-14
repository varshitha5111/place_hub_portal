<?php

namespace App\DataTables;

use App\Models\review;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class reviewDataTable extends DataTable
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
            ->addColumn('Rating', function ($query) {
                return '<p class="fw-bolder">' . $query->rating . '</p>';
            })
            ->addColumn('Comment', function ($query) {
                return '<p>' . $query->review . '</p>';
            })
            ->addColumn('status', function ($query) {
                if ($query->is_approved == 1) {
                    $input_box = '<form method="post" action="' . route('admin.listing.review.update', $query->id) . '">
                         <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <select class="form-control" id="" aria-label="Default select example" name="status">' .
                        '<option >Open this select menu</option>' .
                        '<option value="1" selected>Approved</option>' .
                        '<option value="0">Pending</option>' .
                        '</select>
                        <button type="submit" class="my-1 btn btn-sm btn-danger">submit</button>
                        </form>';
                } else {
                    $input_box = '<form method="post" action="' . route('admin.listing.review.update', $query->id) . '">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <select class="form-control" id="" aria-label="Default select example" name="status">' .
                        '<option >Open this select menu</option>' .
                        '<option value="1" >Approved</option>' .
                        '<option value="0" selected>Pending</option>' .
                        '</select>
                        <button type="submit" class=" my-1 btn btn-sm btn-danger">submit</button>
                        </form>';
                }
                return $input_box;
            })
            ->addColumn('action', function ($query) {
                return '<a href="" class="btn btn-danger">delete</a>';
            })
            ->rawColumns(['Rating', 'action', 'Comment', 'status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\review $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(review $model): QueryBuilder
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
            ->setTableId('review-table')
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
            Column::make('Rating'),
            Column::make('Comment'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(80)
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
        return 'review_' . date('YmdHis');
    }
}

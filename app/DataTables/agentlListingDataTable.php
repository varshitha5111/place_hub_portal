<?php

namespace App\DataTables;

use App\Models\agentlListing;
use App\Models\allList;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class agentlListingDataTable extends DataTable
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
                return '<p>' . $query->title . '</p>';
            })
            ->addColumn('category', function ($query) {
                return '<p>' . $query->Category->name . '</p>';
            })
            ->addColumn('location', function ($query) {
                return '<p>' . $query->location->name . '</p>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1)
                    $status= '<div class="">
                        <div class="">
                        <button class="btn btn-sm btn-success" disabled>active</button>
                        </div>';
                else
                    $status= '
                        <div class="">
                        <div class="">
                        <button class="btn btn-sm btn-danger" disabled>Inactive</button>
                        </div>';
                
                if($query->is_approved==0)
                    $approved= '
                        <div class="">
                        <button class="btn btn-sm btn-warning" disabled>pending</button>
                        </div>
                        </div>';
                else
                    $approved= '
                        <div class="">
                        <button class="btn btn-sm btn-info" disabled>approved</button>
                        </div>
                        </div>';
                return $status.$approved;
            })
            ->addColumn('action', function ($query) {
                $edit = '<div class="row"><div class="col-1"><a href="' . route('user.agent-listing.edit', $query->slug) . '" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a></div>';
                $delete = '<div class="col-1"><a href="' . route('admin.listing.delete', $query->id) . '" class="mx-1 btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></div>';
                $setting = '<div class="row">
                <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
   <i class="fas fa-star-of-david"></i>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="' . route('user.listing-image-gallery.index', ['list_id' => $query->id]) . '">Image Gallery</a></li>
    <li><a class="dropdown-item" href="' . route('user.listing-video-gallery.index', ['list_id' => $query->id]) . '">Video Gallery</a></li>
    <li><a class="dropdown-item" href="' . route('admin.listing.schedule.home', ['list_id' => $query->id]) . '">schedule</a></li>
  </ul>
</div></div></div>';
                return $edit . $delete . $setting;
            })
            ->rawColumns(['action',  'location', 'status', 'category', 'title']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\agentlListing $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(allList $model): QueryBuilder
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
            ->setTableId('agentllisting-table')
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
            Column::make('category'),
            Column::make('location'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
            // Column::make('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'agentlListing_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables;

use App\Models\Farmer;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FarmersDataTable extends DataTable
{
    // protected $actions = ['create', 'excel', 'csv', 'pdf'];
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'farmers.action')
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Farmer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Farmer $model): QueryBuilder
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
                    ->setTableId('farmers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->scrollX(true)
                    ->scrollY(false)
                    ->buttons([
                        Button::make('create')->addClass('gradient-45deg-green-teal')->addClass('border-round'),
                        Button::make('excel')->align('button-right')->addClass('gradient-45deg-purple-deep-orange')->addClass('border-round'),
                        Button::make('csv')->align('button-right')->addClass('gradient-45deg-purple-deep-orange')->addClass('border-round'),
                        Button::make('pdf')->align('button-right')->addClass('gradient-45deg-purple-deep-orange')->addClass('border-round'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
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
            Column::make('national_id'),
            Column::make('first_name'),
            Column::make('last_name'),
            Column::make('email'),
            Column::make('gender'),
            Column::make('dob'),
            Column::make('phone'),
            Column::make('county'),
            Column::make('ward'),
            Column::make('village'),
            Column::make('status'),
            Column::make('farm_type'),
            Column::make('')
                  ->content('<a href="#" class="btn gradient-45deg-blue-teal">Show Farm Produce</a>')
                  ->exportable(false)
                  ->printable(false)
                  ->searchable(false)
                  ->orderable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('')
                ->content('<a href="#" class="btn gradient-45deg-blue-teal">Show Farm House</a>')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('')
                ->content('<a href="#" class="btn gradient-45deg-blue-teal">Edit</a>')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                  ->width(60)
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
        return 'Farmers_' . date('YmdHis');
    }

    public function create() {

    }
}

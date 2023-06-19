<?php

namespace app\DataTables;

use App\Traits\DatatableTrait;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Exceptions\Exception;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    use DatatableTrait;


    /**
     * @throws Exception
     */
    public function dataTable(QueryBuilder $query)
    {
        return (new EloquentDataTable($query))
            ->addColumn('actions', function ($query) {
                return view('roles.role.datatable.actions', [
                    'query' => $query
                ]);
            })
            ->rawColumns(['actions']);
    }


    public function query(Role $model): QueryBuilder
    {
        return $model->select(['id', 'name', 'guard_name']);
    }


    public function html(): Builder
    {

        $hideButtonsArray = array_column($this->getColumns(), 'title');
        $hideButtonsArray = $this->makeHideButtons($hideButtonsArray);
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('roles.index'))
            ->dom('Bfrtip')
            ->parameters([
                'scrollX' => false,
                'ordering' => true,
                'buttons' =>
                    [
                        $hideButtonsArray
                    ],
                'order' => [
                    [0, 'desc']
                ],

            ]);
    }


    protected function getColumns(): array
    {
        return
            [
                ['name' => 'id', 'data' => 'id', 'title' => 'ID'],
                ['name' => 'name', 'data' => 'name', 'title' => 'Name'],
                ['name' => 'guard_name', 'data' => 'guard_name', 'title' => 'Guard Name'],
                ['name' => 'actions', 'data' => 'actions', 'title' => 'Actions', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
            ];
    }


    protected function filename(): string
    {
        return 'Role_' . date('YmdHis');
    }
}

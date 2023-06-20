<?php

namespace app\DataTables;

use App\Models\User;
use App\Traits\DatatableTrait;
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
            ->editColumn('roles', function ($query) {
                return view('user.datatable.roles', [
                    'roles' => $query->roles,
                ]);
            })
            ->addColumn('actions', function ($query) {
                return view('user.datatable.actions', [
                    'query' => $query
                ]);
            })
            ->rawColumns(['actions']);
    }


    public function query(User $model): QueryBuilder
    {
        return $model->select(['id', 'username', 'email', 'phone_number', 'status'])
            ->with(['roles' => function ($query) {
                return $query->select('id', 'name');
            }]);
    }


    public function html(): Builder
    {

        $hideButtonsArray = array_column($this->getColumns(), 'title');
        $hideButtonsArray = $this->makeHideButtons($hideButtonsArray);
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax(route('users.index'))
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
                ['name' => 'username', 'data' => 'username', 'title' => 'User Name'],
                ['name' => 'email', 'data' => 'email', 'title' => 'Email'],
                ['name' => 'phone_number', 'data' => 'phone_number', 'title' => 'Phone'],
                ['name' => 'status', 'data' => 'status', 'title' => 'Status'],
                ['name' => 'roles.name', 'data' => 'roles', 'title' => 'role'],
                ['name' => 'actions', 'data' => 'actions', 'title' => 'Actions', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
            ];
    }


    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}

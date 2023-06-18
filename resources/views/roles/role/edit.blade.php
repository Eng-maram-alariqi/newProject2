@extends('admin.master')

@push('title')
    Edit Role
@endpush

@section('breadcrumb')
    <div class="secondary-nav">
        <div class="breadcrumbs-container" data-page-heading="Analytics">
            <header class="header navbar navbar-expand-sm">
                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>
                <div class="d-flex breadcrumb-content">
                    <div class="page-header">

                        <div class="page-title">
                        </div>

                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.index')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="{{route('admin.role.index')}}">Roles</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </header>
        </div>
    </div>
    <!--  END BREADCRUMBS  -->
@endsection

@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
        <form method="POST" action="{{ route('admin.role.update' ,$role) }}">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">
                    <h3>Update Role</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header fw-bolder">Role Info</div>
                            <div class="card-body row">
                                <div class="col-md-12">
                                    <div class="form-group  callout callout-left-primary">
                                        <label for="name" class="col-form-label">Role Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror"
                                               name="name"
                                               type="text"
                                               id="name"
                                               value="{{old('name' , $role->name)}}"
                                               placeholder="Enter Role Name"/>

                                        @error('name')
                                        <p class="text-danger my-2"> {{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header fw-bolder">Assign Permissions To This Role</div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">Table</th>
                                            <th scope="col">List</th>
                                            <th class="text-center" scope="col">create</th>
                                            <th class="text-center" scope="col">show</th>
                                            <th class="text-center" scope="col">update</th>
                                            <th class="text-center" scope="col">delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tables as $table)
                                            <tr>
                                                <td class="d-flex">
                                                    <div class="form-check form-check-primary form-check-inline mr-5 ">
                                                        <input class="form-check-input checkAll"
                                                               type="checkbox"
                                                               id="checkAll_{{$table}}"
                                                               data-table="{{$table}}"/>
                                                    </div>
                                                    <p>
                                                        {{$table}}
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input
                                                            class="form-check-input permission_checkbox  permission_{{$table}}"
                                                            type="checkbox"
                                                            onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                            onload="checkIfCheckAllButtonChecked('{{$table}}')"
                                                            data-permission_table="{{$table}}"

                                                            name="permissions[list-{{$table}}]"
                                                            @checked((
                                                                old('permissions') !== null ) ?
                                                            array_key_exists('list-'.$table , old('permissions')) :
                                                            $role->getPermissionNames()->contains('list-' . $table))>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input
                                                            class="form-check-input  permission_checkbox  permission_{{$table}}"
                                                            type="checkbox"
                                                            onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                            data-permission_table="{{$table}}"

                                                            name="permissions[create-{{$table}}]"
                                                            @checked((old('permissions') !== null ) ?
                                                            array_key_exists('create-'.$table , old('permissions')) :
                                                            $role->getPermissionNames()->contains('create-' . $table)) >

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input
                                                            class="form-check-input  permission_checkbox  permission_{{$table}}"
                                                            type="checkbox"
                                                            onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                            data-permission_table="{{$table}}"

                                                            name="permissions[show-{{$table}}]"
                                                            @checked((old('permissions') !== null ) ?
                                                           array_key_exists('show-'.$table , old('permissions')) :
                                                           $role->getPermissionNames()->contains('show-' . $table))>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input
                                                            class="form-check-input  permission_checkbox permission_{{$table}}"
                                                            type="checkbox"
                                                            onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                            data-permission_table="{{$table}}"

                                                            name="permissions[update-{{$table}}]"
                                                            @checked((old('permissions') !== null ) ?
                                                           array_key_exists('update-'.$table , old('permissions')) :
                                                           $role->getPermissionNames()->contains('update-' . $table))>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input
                                                            class="form-check-input permission_checkbox  permission_{{$table}}"
                                                            type="checkbox"
                                                            data-permission_table="{{$table}}"
                                                            onchange="changeCheckAllButtonStatus('{{$table}}')"

                                                            name="permissions[delete-{{$table}}]"
                                                            @checked((old('permissions') !== null ) ?
                                                            array_key_exists('delete-'.$table , old('permissions')) :
                                                            $role->getPermissionNames()->contains('delete-' . $table)) >
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-outline-success btn-lg text-capitalize fw-bold">Update
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection

@push('js')
    <script>


        $(document).ready(function () {
            $('.checkAll').each(function () {
                let table = $(this).data('table');
                if ($(`.permission_${table}:checked`).length === 5) {
                    $(this).prop('checked', true);
                }
            });
        });

        $('.checkAll').on('change', function () {
            let table = $(this).data('table')
            if ($(this).prop('checked')) {
                $('.permission_' + table).prop('checked', true);
            } else {
                $('.permission_' + table).prop('checked', false);

            }
        });

        function changeCheckAllButtonStatus(tableName) {
            if ($('.permission_' + `${tableName}:checked`).length === 5) {
                $('#checkAll_' + tableName).prop('checked', true)
            } else {
                $('#checkAll_' + tableName).prop('checked', false)
            }
        }


    </script>

@endpush

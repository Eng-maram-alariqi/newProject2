@extends('layouts.contentLayoutMaster')

@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
        <form method="POST" action="{{ route('roles.update' ,$role) }}">
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
                                               value="{{old('name' , $role->name ?? '')}}"
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
                                                            data-permission_table="{{$table}}"

                                                            name="permissions[عرض الكل-{{$table}}]"
                                                            @checked((
                                                                old('permissions') !== null ) ?
                                                            array_key_exists('عرض الكل-'.$table , old('permissions')) :
                                                            $role->getPermissionNames()->contains('عرض الكل-' . $table))>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input
                                                            class="form-check-input  permission_checkbox  permission_{{$table}}"
                                                            type="checkbox"
                                                            onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                            data-permission_table="{{$table}}"

                                                            name="permissions[انشاء-{{$table}}]"
                                                            @checked((old('permissions') !== null ) ?
                                                            array_key_exists('انشاء-'.$table , old('permissions')) :
                                                            $role->getPermissionNames()->contains('انشاء-' . $table)) >

                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input
                                                            class="form-check-input  permission_checkbox  permission_{{$table}}"
                                                            type="checkbox"
                                                            onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                            data-permission_table="{{$table}}"

                                                            name="permissions[اظهار-{{$table}}]"
                                                            @checked((old('permissions') !== null ) ?
                                                           array_key_exists('اظهار-'.$table , old('permissions')) :
                                                           $role->getPermissionNames()->contains('اظهار-' . $table))>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input
                                                            class="form-check-input  permission_checkbox permission_{{$table}}"
                                                            type="checkbox"
                                                            onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                            data-permission_table="{{$table}}"

                                                            name="permissions[تحديث-{{$table}}]"
                                                            @checked((old('permissions') !== null ) ?
                                                           array_key_exists('تحديث-'.$table , old('permissions')) :
                                                           $role->getPermissionNames()->contains('تحديث-' . $table))>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input
                                                            class="form-check-input permission_checkbox  permission_{{$table}}"
                                                            type="checkbox"
                                                            data-permission_table="{{$table}}"
                                                            onchange="changeCheckAllButtonStatus('{{$table}}')"

                                                            name="permissions[حذف-{{$table}}]"
                                                            @checked((old('permissions') !== null ) ?
                                                            array_key_exists('حذف-'.$table , old('permissions')) :
                                                            $role->getPermissionNames()->contains('حذف-' . $table)) >
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

@push('scripts')
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

<div class="row my-3">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
            <form method="POST" action="{{ route('admin.role.store') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3>Create User</h3>
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
                                                   value="{{old('name')}}"
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
                                                        <div
                                                            class="form-check form-check-primary form-check-inline mr-5 ">

                                                            <input class="form-check-input checkAll"
                                                                   type="checkbox"
                                                                   id="checkAll_{{$table}}"
                                                                   data-table="{{$table}}">

                                                        </div>
                                                        <p>
                                                            {{$table}}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-primary form-check-inline">
                                                            <input class="form-check-input permission_{{$table}}"
                                                                   type="checkbox"
                                                                   onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                                   data-permission="permission_{{$table}}"
                                                                   name="permissions[list-{{$table}}]"
                                                                @checked(old('permissions') !== null &&  array_key_exists('list-' . $table ,old('permissions')))>


                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-primary form-check-inline">
                                                            <input class="form-check-input permission_{{$table}}"
                                                                   type="checkbox"
                                                                   onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                                   data-permission="permission_{{$table}}"
                                                                   name="permissions[create-{{$table}}]"
                                                                @checked(old('permissions') !== null &&  array_key_exists('create-' . $table ,old('permissions')))>

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check form-check-primary form-check-inline">
                                                            <input class="form-check-input permission_{{$table}}"
                                                                   type="checkbox"
                                                                   onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                                   data-permission="permission_{{$table}}"
                                                                   name="permissions[show-{{$table}}]"
                                                                @checked(old('permissions') !== null &&  array_key_exists('show-' . $table ,old('permissions')))>

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check form-check-primary form-check-inline">
                                                            <input class="form-check-input permission_{{$table}}"
                                                                   type="checkbox"
                                                                   onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                                   data-permission="permission_{{$table}}"
                                                                   name="permissions[update-{{$table}}]"
                                                                @checked(old('permissions') !== null &&  array_key_exists('update-' . $table ,old('permissions')))>

                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check form-check-primary form-check-inline">
                                                            <input class="form-check-input permission_{{$table}}"
                                                                   type="checkbox"
                                                                   onchange="changeCheckAllButtonStatus('{{$table}}')"
                                                                   data-permission="permission_{{$table}}"
                                                                   name="permissions[delete-{{$table}}]"
                                                                @checked(old('permissions') !== null &&  array_key_exists('delete-' . $table ,old('permissions')))>
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
                        <button type="submit" class="btn btn-outline-primary btn-lg text-capitalize fw-bold">create
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>




















<!-- <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAddRole" aria-labelledby="offcanvasAddRole">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasAddRole">Offcanvas Title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="card mg-b-20">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            <div class="col-xs-7 col-sm-7 col-md-7">
                                <div class="form-group">
                                    <p>اسم الصلاحية :</p>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <ul id="treeview1">
                                    <li>
                                        <a href="#">الصلاحيات</a>
                                        <ul>
                                            @foreach($permission as $value)
                                            <li>
                                                <label style="font-size: 16px;">
                                                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                    {{ $value->name }}
                                                </label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">حفظ</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>

                          
                      
                      
                    </div>
                </div>
              
            </div>
           
        </div>
        {!! Form::close() !!}
    </div>

</div> -->

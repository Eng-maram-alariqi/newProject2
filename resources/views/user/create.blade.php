@extends('layouts.contentLayoutMaster')


@push('styles')

    <link rel="stylesheet"
          type="text/css"
          href="{{asset('adminAssets/src/plugins/src/select2/select2.min.css')}}">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3>Create User</h3>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group ">
                                    <label for="name" class="col-form-label">User Name</label>
                                    <input class="form-control @error('username') is-invalid @enderror"
                                           name="username"
                                           type="text"
                                           id="username"
                                           value="{{old('username')}}"
                                           placeholder="Enter User Name"/>

                                    @error('username')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group ">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           type="text"
                                           id="email"
                                           value="{{old('email')}}"
                                           placeholder="Enter Email"/>

                                    @error('email')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group callout callout-left-primary  ">
                                    <label for="password">Password</label>
                                    <input type="password"
                                           name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           id="password"
                                           placeholder="Entre Password"
                                           value="{{old('password')}}"
                                           required/>
                                    @error('password')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group callout callout-left-primary  ">
                                    <label for="passwordConfirmation">Confirm Password</label>
                                    <input type="password"
                                           name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="passwordConfirmation"
                                           placeholder="Entre Password"
                                           required/>
                                    @error('password')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group ">
                                    <label for="phone_number" class="col-form-label">Phone Number</label>
                                    <input class="form-control @error('phone_number') is-invalid @enderror"
                                           name="phone_number"
                                           type="text"
                                           id="phone_number"
                                           value="{{old('phone_number')}}"
                                           placeholder="Enter Phone Number"/>

                                    @error('phone_number')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group ">
                                    <label for="status">Status</label>
                                    <select
                                        class="form-control  basic  @error('status') is-invalid @enderror"
                                        id="status"
                                        name="status">
                                        <option selected disabled>Select Status...</option>
                                        @foreach($status as $singleStatus )
                                            <option value="{{$singleStatus}}"
                                                @selected($singleStatus == old('status'))>
                                                {{$singleStatus}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group callout callout-bottom-primary">
                                    <label for="roles">Roles :</label>
                                    <select
                                        class="form-control  basic  multiple @error('roles') is-invalid @enderror"
                                        name="roles[]"
                                        id="roles"
                                        multiple>
                                        @foreach($roles as $role )
                                            <option value="{{$role->name}}"
                                                @selected( old('roles') !== null && in_array($role->name ,old('roles')) ) >
                                                {{$role->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
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
    </div>
@endsection

@push('scripts')

    <script src="{{asset('adminAssets/src/plugins/src/select2/select2.min.js')}}"></script>
    <script src="{{asset('adminAssets/src/plugins/src/select2/custom-select2.js')}}"></script>
    <script>
        $('#roles').select2({
            placeholder: "Select Roles",
            allowClear: true
        })
    </script>
@endpush



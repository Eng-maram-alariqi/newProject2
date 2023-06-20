@extends('layouts.contentLayoutMaster')


@push('styles')
    <link rel="stylesheet"
          type="text/css"
          href="{{asset('adminAssets/src/plugins/src/select2/select2.min.css')}}">
@endpush


@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom:24px;">
                <form method="POST" action="{{ route('users.update' ,$user) }}">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-header">
                            <h3>Update Admin</h3>
                        </div>
                        <div class="card-body  row">

                            <div class="col-md-3 mb-3">
                                <div
                                    class="form-group callout callout-top-primary callout ">
                                    <label for="username" class="">User Name</label>
                                    <input type="text"
                                           name="username"
                                           class="form-control @error('username') is-invalid @enderror"
                                           id="username"
                                           placeholder="Entre User Name"
                                           value="{{old('username', $user->username ?? '')}}"
                                           required/>

                                    @error('username')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group callout callout-left-primary ">
                                    <label for="name">Email</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           placeholder="Entre Email"
                                           value="{{old('email',$user->email ?? '' )}}"
                                           required/>
                                    @error('email')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group y">
                                    <label for="status">Status</label>
                                    <select
                                        class="form-control  basic @error('status') is-invalid @enderror"
                                        name="status">
                                        <option selected disabled>Select Status...</option>
                                        @foreach($status as $singleStatus )
                                            <option value="{{$singleStatus}}"
                                                @selected($singleStatus == old('status' ,$user->status ?? '' ))>
                                                {{$singleStatus}}
                                            </option>

                                        @endforeach
                                    </select>
                                    @error('status')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group callout callout-left-primary ">
                                    <label for="phone">Phone</label>
                                    <input type="text"
                                           name="phone_number"
                                           class="form-control  @error('phone_number') is-invalid @enderror"
                                           id="phone_number"
                                           placeholder="Entre Phone"
                                           value="{{old('phone_number' , $user->phone_number ?? '')}}"
                                           required/>
                                    @error('phone_number')
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
                                    />
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
                                    />
                                    @error('password')
                                    <p class="text-danger my-2"> {{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group callout callout-top-primary">
                                    <label for="role ">Roles :</label>
                                    <select
                                        class="form-control  basic  multiple @error('roles') is-invalid @enderror"
                                        name="roles[]"
                                        id="roles"
                                        multiple>
                                        @foreach($roles as $role)
                                            <option
                                                value="{{$role->name}}"
                                                @selected(
                                                         (old('roles') !== null && array_key_exists($role->name, old('roles')))
                                                          ||
                                                          $user->hasRole($role->name)) >
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
                            <button type="submit" class="btn btn-outline-primary btn-lg text-capitalize fw-bold">Update
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

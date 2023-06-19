@extends('layouts.contentLayoutMaster')

@push('styles')
    <link rel="stylesheet"
          type="text/css"
          href="{{ asset('adminAssets/src/plugins/src/table/datatable/datatables.css') }}">

    <link rel="stylesheet"
          type="text/css"
          href="{{asset('adminAssets/src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css')}}">
@endpush


@section('content')

    <div class="row layout-spacing my-4">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-between align-items-center ">
                    <h3 class="text-capitalize text-dark">
                        المستخدمين
                    </h3>

                        <a href="{{route('users.create')}}" class="icon text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-user-plus">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                        </a>

                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped dt-table-hover dataTable text-center' ,'id' => 'DataTable']) !!}

                </div>
            </div>
        </div>
        
    </div>
    <div class="content-backdrop fade"></div>
@endsection

@push('scripts')

    {{--Begin Data_Table--}}
    <script src="{{ asset('adminAssets/src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('adminAssets/src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('adminAssets/src/plugins/src/table/datatable/custom_miscellaneous.js') }}"></script>
{{--    <script src="{{ asset('js/adminAssets/button-confirmation-datatable.js') }}?v=123"></script>--}}

    {!! $dataTable->scripts() !!}
    {{--End Data_Table--}}

@endpush

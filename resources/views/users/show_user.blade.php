@extends('layouts.contentLayoutMaster')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4"><span class="text-muted fw-light">المستخدم /</span> إدارة المستخدم
            </h4>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table id="usersDatatable" class="datatables-basic table table-bordered">
                        <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>اسم المستخدم</th>
                            <th>البريد الالكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>حالة المستخدم</th>
                            <th>نوع المستخدم</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- BEGIN: Modal-->
            @include('users.add_user')
            @include('users.edit')
            @include('stores.delete')
            <!-- END: Modal-->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        @push('scripts')
            <script src="{{asset('js/users.js')}}"></script>
        @endpush

@endsection

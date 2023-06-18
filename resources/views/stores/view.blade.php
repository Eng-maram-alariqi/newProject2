@extends('layouts.contentLayoutMaster')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4"><span class="text-muted fw-light">المخازن /</span> إدارة المخازن
            </h4>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table id="storeDatatable" class="datatables-basic table table-bordered">
                        <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>رقم الدفعة</th>
                            <th>الصنف</th>
                            <th>المنتج</th>
                            <th>الوحدة</th>
                            <th>سعر الوحدة</th>
                            <th>سعر الشراء</th>
                            <th>تاريخ الانتاج</th>
                            <th>تاريخ الانتهاء</th>
                            <th>الكمية</th>
                            <th>الكمية المتبقة</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- BEGIN: Modal-->
            @include('stores.add')
            @include('stores.edit')
            @include('stores.delete')
            <!-- END: Modal-->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        @push('scripts')
            <script src="{{asset('js/stores.js')}}"></script>
        @endpush

@endsection

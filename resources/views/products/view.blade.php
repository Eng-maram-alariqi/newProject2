@extends('layouts.contentLayoutMaster')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4"><span class="text-muted fw-light">المنتجات /</span> إدارة المنتجات
            </h4>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table id="productDatatable" class="datatables-basic table table-bordered">
                        <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>المنتج</th>
                            <th>الصنف</th>
                            <th>التاريخ</th>
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- BEGIN: Modal-->
            @include('products.add')
            @include('products.edit')
            @include('products.stop')
            <!-- END: Modal-->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        @push('scripts')
            <script src="{{asset('js/products.js')}}"></script>
    @endpush
@endsection

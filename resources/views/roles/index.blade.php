@extends('layouts.contentLayoutMaster')
@section('content')


@if (session()->has('Add'))
    <script>
        window.onload = function() {
            notif({
                msg: " تم اضافة الصلاحية بنجاح",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            notif({
                msg: " تم تحديث بيانات الصلاحية بنجاح",
                type: "success"
            });
        }

    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: " تم حذف الصلاحية بنجاح",
                type: "error"
            });
        }

    </script>
@endif

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4"><span class="text-muted fw-light">المستخدم /</span> إدارة المستخدم
            </h4>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                <table id="rolesDatatable" class="datatables-basic table table-bordered">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                            </tr>
                        </thead>
                    </table>


                </div>
            </div>

            <!-- BEGIN: Modal-->
            @include('roles.create')
          
            <!-- END: Modal-->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        

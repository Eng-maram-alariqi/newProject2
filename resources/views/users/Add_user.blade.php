<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUser">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddUser" class="offcanvas-title">إضافة منتج جديد</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="pt-0" id="addNewUserForm" onsubmit="return false" method="post">
            <div class="mb-3">
                <label class="form-label" for="add-product-name">اسم المستخدم</label>
                <input type="text" class="form-control" id="username" name="username"/>
            </div>

            <div class="mb-3">
             <label class="form-label" for="email" >البريد الالكتروني</label>
             <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="col-md-6">
              <label  class="form-label" for="password">كلمة المرور</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            
            <div class="col-md-6">
              <label  class="form-label" for="password">تأكيد كلمة المرور</label>
              <input type="password" class="form-control" id="confirm-password" name="confirm-password">
            </div>

            
            <div class="col-md-6">
              <label  class="form-label" for="phone_number"> رقم الهاتف</label>
              <input type="number" class="form-control" id="phone_number" name="phone_number">
            </div>

        



            <div class="col-md-6">
                            <label class="form-label">حالة المستخدم</label>
                            <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
                                <option value="active">active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>

                
</br>
            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">حفظ</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>
        </form>
    </div>
</div>





















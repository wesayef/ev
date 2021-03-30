<a data-toggle="modal" role="button" href="#add_new" class="btn btn-right-icon btn-success"><i class="fa fa-plus"></i> إضافة جديد </a>
<div id="add_new" class="modal fade"  role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> إضافة مشرف جديد </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- Form inside modal -->
      <form method="post" class="form-horizontal" role="form">
        <div class="modal-body with-padding">


          <div class="form-group row">
            <label class="col-sm-4 col-form-label">البريد الالكتروني</label>
            <div class="col-sm-8">
              <input type="text" name="email" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4  col-form-label">كلمة المرور</label>
            <div class="col-sm-8">
              <input type="password" name="password" class="form-control">
            </div>
          </div>
          



        </div>
        <div class="modal-footer">
          <button type="submit" name="add_new" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة</button>
          <button class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> إغلاق النافذة</button>
        </div>
      </form>
    </div>
  </div>
</div>

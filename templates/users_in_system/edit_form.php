<div id="edit_<?php echo $key; ?>" class="modal fade"  role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> تحرير مشرف (<?php echo $user['email'];?>) </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- Form inside modal -->
      <form method="post" class="form-horizontal" role="form">
        <div class="modal-body with-padding">


          <div class="form-group row">
            <label class="col-sm-4 col-form-label">البريد الالكتروني</label>
            <div class="col-sm-8">
              <input type="text" name="email" class="form-control" value="<?php echo $user['email'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">كلمة المرور</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" name="password">
            </div>
          </div>
          <div class="form-group row">
          <label class="col-sm-4 col-form-label">حالة العضوية</label>
          <div class="col-sm-8">
            <select name="status" class="form-control">
              <option value="0"  <?php if($user['status'] == "0"){echo 'selected';} ?>>نشطة</option>
              <option value="1"  <?php if($user['status'] == "1"){echo 'selected';} ?>>غير نشطة</option>
            </select>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="save_changes" class="btn btn-primary"><i class="fas fa-save"></i> حفظ التغييرات</button>
          <button class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> إغلاق النافذة</button>
          <input type="hidden" name="id" value="<?php echo $key; ?>">
        </div>
      </form>
    </div>
  </div>
</div>

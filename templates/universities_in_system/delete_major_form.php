<div id="delete_major_<?php echo $major_key; ?>" class="modal fade"  role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">حذف التخصص(<?php echo $major['name']; ?>)</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- Form inside modal -->
      <form method="post" role="form">
        <div class="modal-body with-padding">
          <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                <div class="alert alert-danger">
                  هل أنت متأكد من رغبتك في حذف التخصص الحالي بشكلٍ نهائي؟
                </div>
              </div>
              </div>
            </div>

          </div>

        <div class="modal-footer">
          <button type="submit" name="delete_now_major" class="btn btn-danger"><i class="fa fa-trash"></i> تنفيذ عملية الحذف</button>
          <button class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> إغلاق النافذة</button>
          <input type="hidden" name="id" value="<?php echo $major_key; ?>">
        </div>
      </form>
    </div>
  </div>
</div>

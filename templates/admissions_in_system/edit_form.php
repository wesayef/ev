<div id="edit_<?php echo $key; ?>" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> تحرير الموعد (<?php echo $admissions['name'];?>) </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- Form inside modal -->
      <form method="post" class="form-horizontal" role="form">
        <div class="modal-body with-padding">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">اسم الجامعة</label>
            <div class="col-sm-10">
              <select name="university_id" class="form-control select2">
                <?php foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $uni_key => $uni){ ?>
                  <option value="<?php echo $uni_key;?>" <?php if($admissions['university_id'] == $uni_key){echo "selected";} ?>> <?php echo $uni['name'].' - '.$uni['location'];?>
                  <?php }?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">البرنامج</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" value="<?php echo $admissions['name'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">يبدأ / ينتهي في</label>
            <div class="col-sm-10">
              <input type="text" name="start_end_date" class="form-control dates" value="<?php echo $admissions['start_date'].' - '.$admissions['end_date'];?>">
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

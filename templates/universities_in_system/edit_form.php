<div id="edit_<?php echo $key; ?>" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> تحرير الجامعة (<?php echo $university['name'];?>) </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- Form inside modal -->
      <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="modal-body with-padding">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">اسم الجامعة</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" value="<?php echo $university['name'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2  col-form-label">الشعار</label>
            <div class="col-sm-7">
              <input type="file" name="logo" class="dropify" id='input-file-now'  data-default-file='<?php echo (!empty($university["logo"]) ? $university["logo"] : ""); ?>'>
            </div>
            <div class="col-sm-2">
              <?php
              if(!empty($university["logo"]))
              {
                echo '<a href="'.$university["logo"].'" target="_blank" class="btn btn-md btn-success"><i class="fa fa-search"></i> معاينة </a>';
              }
              ?>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">نبذه عنها</label>
            <div class="col-sm-10">
              <textarea name="about" class="form-control" style="height:50px"><?php echo $university['about'];?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">مقرها</label>
            <div class="col-sm-10">
              <input type="text" name="location" class="form-control" value="<?php echo $university['location'];?>">
            </div>
          </div>
          <div class="form-group row">
          <label class="col-sm-2 col-form-label">الحالة</label>
          <div class="col-sm-10">
            <select name="status" class="form-control">
              <option value="0"  <?php if($university['status'] == "0"){echo 'selected';} ?>>معروضة</option>
              <option value="1"  <?php if($university['status'] == "1"){echo 'selected';} ?>>غير معروضة</option>
            </select>
          </div>
        </div>
          <h3>* نسب القبول</h3>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">الثانوية العامة</label>
            <div class="col-sm-10">
              <input type="text" name="high_school" class="form-control percentage-inputmask" value="<?php echo $university['high_school'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">القدرات</label>
            <div class="col-sm-10">
              <input type="text" name="general_aptitude" class="form-control percentage-inputmask" value="<?php echo $university['general_aptitude'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">التحصيلي</label>
            <div class="col-sm-10">
              <input type="text" name="scholastic_chievement" class="form-control percentage-inputmask" value="<?php echo $university['scholastic_chievement'];?>">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" name="save_changes" class="btn btn-primary"><i class="fas fa-save"></i> حفظ التغييرات</button>
          <button class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> إغلاق النافذة</button>
          <input type="hidden" name="id" value="<?php echo $key; ?>">
          <input type="hidden" name="path" value="<?php echo $university['logo']; ?>">
        </div>
      </form>
    </div>
  </div>
</div>

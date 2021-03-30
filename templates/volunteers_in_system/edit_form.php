<div id="edit_<?php echo $key; ?>" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> تحرير المتطوع (<?php echo $volunteers['name'];?>) </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- Form inside modal -->
      <form method="post" class="form-horizontal" role="form">
        <div class="modal-body with-padding">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">اسم المتطوع</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" value="<?php echo $volunteers['name'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">اسم الجامعة</label>
            <div class="col-sm-10">
              <select name="university_id" class="form-control select2" id='get_uni_major2'>
                <option value="0">--- فضلًا أختر الجامعة ---</option>

                <?php foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $uni_key => $uni){ ?>
                  <option value="<?php echo $uni_key;?>" <?php if($volunteers['university_id'] == $uni_key){echo "selected";} ?>> <?php echo $uni['name'].' - '.$uni['location'];?>
                  <?php }?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">التخصص</label>
            <div class="col-sm-10">
              <select name="major_id" class="form-control select2" id='put_uni_major2'>
              <?php foreach ($conn->getReference('majors_in_universities/')->getSnapshot()->getValue() as $major_key => $major){ ?>
                <option value="<?php echo $major_key;?>" <?php if($volunteers['major_id'] == $major_key){echo "selected";} ?>> <?php echo $major['name'];?>
                <?php }?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">وسيلة التواصل</label>
            <div class="col-sm-10">
              <input type="text" name="contact" class="form-control" value="<?php echo $volunteers['contact'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">نوع وسيلة التواصل</label>
            <div class="col-sm-10">
              <input type="text" name="type_contact" class="form-control" value="<?php echo $volunteers['type_contact'];?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">المستوى</label>
            <div class="col-sm-10">
              <input type="text" name="level" class="form-control" value="<?php echo $volunteers['level'];?>">
            </div>
          </div>
          <div class="form-group row">
          <label class="col-sm-2 col-form-label">الحالة</label>
          <div class="col-sm-10">
            <select name="status" class="form-control">
              <option value="0"  <?php if($volunteers['status'] == "0"){echo 'selected';} ?>>معروض</option>
              <option value="1"  <?php if($volunteers['status'] == "1"){echo 'selected';} ?>>غير معروض</option>
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

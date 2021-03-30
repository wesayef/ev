<a data-toggle="modal" role="button" href="#add_new" class="btn btn-right-icon btn-success"><i class="fa fa-plus"></i> إضافة متطوع جديد </a>
<div id="add_new" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> إضافة متطوع جديد </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- Form inside modal -->
      <form method="post" class="form-horizontal" role="form">
        <div class="modal-body with-padding">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">اسم المتطوع</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">اسم الجامعة</label>
            <div class="col-sm-10">
            <select name="university_id" class="form-control select2" id="get_uni_major1">
              <option value="0">--- فضلًا أختر الجامعة ---</option>
                <?php foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $uni_key => $uni){ ?>
                  <option value="<?php echo $uni_key;?>"> <?php echo $uni['name'].' - '.$uni['location'];?>
                  <?php }?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">التخصص</label>
            <div class="col-sm-10">
              <select name="major_id" class="form-control select2" id='put_uni_major1'></select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">نوع وسيلة التواصل</label>
            <div class="col-sm-10">
              <input type="text" name="type_contact" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">وسيلة التواصل</label>
            <div class="col-sm-10">
              <input type="text" name="contact" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">المستوى</label>
            <div class="col-sm-10">
              <input type="text" name="level" class="form-control">
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

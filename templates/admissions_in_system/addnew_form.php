<a data-toggle="modal" role="button" href="#add_new" class="btn btn-right-icon btn-success"><i class="fa fa-plus"></i> إضافة موعد جديد </a>
<div id="add_new" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> إضافة موعد جديد </h4>
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
                  <option value="<?php echo $uni_key;?>"> <?php echo $uni['name'].' - '.$uni['location'];?>
                  <?php }?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">البرنامج</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">يبدأ / ينتهي في</label>
            <div class="col-sm-10">
              <input type="text" name="start_end_date" class="form-control dates">
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

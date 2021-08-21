<?php
include_once 'header.php';
include_once "certificates_in_system/actions.php";
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">إضافة شهادة جديدة</h3>
      </div>
      <?php include_once 'time_now.php';?>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a href="certificates_in_system" class="btn btn-dark"><i class="fa fa-share"></i> عودة إلى الصفحة السابقة</a>

              <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="modal-body with-padding">


                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">اسم الشهادة</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2  col-form-label">الشعار</label>
                    <div class="col-sm-10">
                      <input type="file" name="logo" class="dropify" id='input-file-now'>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">وصفها</label>
                    <div class="col-sm-10">
                      <textarea name="describe" class="ckeditor"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">متطلباتها</label>
                    <div class="col-sm-10">
                      <textarea name="requirement" class="ckeditor"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">تفاصيل آخرى</label>
                    <div class="col-sm-10">
                      <textarea name="details" class="ckeditor"></textarea>
                    </div>
                  </div>
                </div>
                <button type="submit" name="add_new" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
custom_footer("",array(
  '<script type="text/javascript" src="../templates/assets/js/ckeditor/ckeditor.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/dropify/dist/js/dropify.min.js"></script>',
  '<script type="text/javascript" src="../templates/assets/js/axios.min.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>',
  '<script type="text/javascript" src="../templates/assets/js/mask.init.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/moment/moment.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/jquery-asColor/dist/jquery-asColor.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/jquery-asGradient/dist/jquery-asGradient.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>',
  '<script type="text/javascript" src="../templates/assets/plugins/daterangepicker/daterangepicker.js"></script>'
));
?>

<?php
include_once 'header.php';
if (!isset($_GET['akey']) OR empty($_GET['akey']))
{
  header('Location: apps_in_system');
}
else
{
  if($conn->getReference('apps/')->getSnapshot()->numChildren() == 0)
  {
    header('Location: apps_in_system');
  }
}
include_once "apps_in_system/actions.php";
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">
          <?php
          foreach ($conn->getReference('apps/')->getSnapshot()->getValue() as $key => $app)
          {
            if($_GET['akey'] = $key)
            {
              echo "تحرير التطبيق ( ".$app['name']." )";
            }
            break;
          }
          ?>
        </h3>
      </div>
      <?php include_once 'time_now.php';?>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?php
            if(isset($_POST['save_changes']))
            {
              echo '
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span> </button>
              <h3><i class="fa fa-check-circle"></i> تمّت العملية بنجاح </h3>
              تمّ تحرير التطبيق
              </div>';
              header("Refresh:2");
            }
            echo '<a href="apps_in_system" class="btn btn-dark"><i class="fa fa-share"></i> عودة إلى الصفحة السابقة</a>';
            foreach ($conn->getReference('apps/')->getSnapshot()->getValue() as $key => $app)
            {
              if($_GET['akey'] = $key)
              {
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="modal-body with-padding">


                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">اسم التطبيق</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" value="<?php echo $app['name'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2  col-form-label">الشعار</label>
                        <div class="col-sm-7">
                          <input type="file" name="logo" class="dropify" id='input-file-now' data-default-file='<?php echo (!empty($app["logo"]) ? $app["logo"] : ""); ?>'>
                        </div>
                        <div class="col-sm-3">
                          <?php
                          if(!empty($app["logo"]))
                          {
                            echo '<a href="'.$app["logo"].'" target="_blank" class="btn btn-md btn-success"><i class="fa fa-search"></i> معاينة </a>';
                          }
                          ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">وصفه</label>
                        <div class="col-sm-10">
                          <textarea name="describe" class="ckeditor"><?php echo decrypt($app['describe']);?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">أنظمة التشغيل</label>
                        <div class="col-sm-10">
                        <select name="OS[]" class="select2" multiple>
                          <option value="Web browser" <?php if(in_array("Web browser",explode(",",$app['OS']))){echo "selected";}?>>Web browser</option>
                          <option value="IOS" <?php if(in_array("IOS",explode(",",$app['OS']))){echo "selected";}?>>IOS</option>
                          <option value="Android" <?php if(in_array("Android",explode(",",$app['OS']))){echo "selected";}?>>Android</option>
                          <option value="MacOS" <?php if(in_array("MacOS",explode(",",$app['OS']))){echo "selected";}?>>MacOS</option>
                          <option value="Linux" <?php if(in_array("Linux",explode(",",$app['OS']))){echo "selected";}?>>Linux</option>
                          <option value="Windows" <?php if(in_array("Windows",explode(",",$app['OS']))){echo "selected";}?>>Windows</option>
                        </select>
                        </div>
                      </div>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الحالة</label>
                    <div class="col-sm-10">
                      <select name="status" class="form-control">
                        <option value="0"  <?php if($app['status'] == "0"){echo 'selected';} ?>>معروض</option>
                        <option value="1"  <?php if($app['status'] == "1"){echo 'selected';} ?>>غير معروض</option>
                      </select>
                    </div>
                  </div>
                    <button type="submit" name="save_changes" class="btn btn-primary"><i class="fas fa-save"></i> حفظ التغييرات</button>
                    <input type="hidden" name="id" value="<?php echo $key; ?>">
                    <input type="hidden" name="path" value="<?php echo $app['logo']; ?>">
                  </form>
                </div>
                <?php
              }
              break;
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
custom_footer("",array(
  '<script type="text/javascript" src="http://localhost/ev/templates/assets//js/ckeditor/ckeditor.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/dropify/dist/js/dropify.min.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/js/axios.min.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/js/mask.init.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/moment/moment.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/jquery-asColor/dist/jquery-asColor.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/jquery-asGradient/dist/jquery-asGradient.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>',
  '<script type="text/javascript" src="http://localhost/ev/templates/assets/plugins/daterangepicker/daterangepicker.js"></script>'
));
?>

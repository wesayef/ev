<?php
include_once 'header.php';
if (!isset($_GET['ckey']) OR empty($_GET['ckey']))
{
  header('Location: certificates_in_system');
}
else
{
  if($conn->getReference('certificates/')->getSnapshot()->numChildren() == 0)
  {
    header('Location: certificates_in_system');
  }
}
include_once "certificates_in_system/actions.php";
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">
          <?php
          foreach ($conn->getReference('certificates/')->getSnapshot()->getValue() as $key => $certificate)
          {
            if($_GET['ckey'] == $key)
            {
              echo "تحرير الشهادة ( ".$certificate['name']." )";
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
              تمّ تحرير الشهادة
              </div>';
              header("Refresh:2");
            }
            echo '<a href="certificates_in_system" class="btn btn-dark"><i class="fa fa-share"></i> عودة إلى الصفحة السابقة</a>';
            foreach ($conn->getReference('certificates/')->getSnapshot()->getValue() as $key => $certificate)
            {
              if($_GET['ckey'] == $key)
              {
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="modal-body with-padding">


                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">اسم الشهادة</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" value="<?php echo $certificate['name'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2  col-form-label">الشعار</label>
                        <div class="col-sm-7">
                          <input type="file" name="logo" class="dropify" id='input-file-now' data-default-file='<?php echo (!empty($certificate["logo"]) ? $certificate["logo"] : ""); ?>'>
                        </div>
                        <div class="col-sm-3">
                          <?php
                          if(!empty($certificate["logo"]))
                          {
                            echo '<a href="'.$certificate["logo"].'" target="_blank" class="btn btn-md btn-success"><i class="fa fa-search"></i> معاينة </a>';
                          }
                          ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">وصفها</label>
                        <div class="col-sm-10">
                          <textarea name="describe" class="ckeditor"><?php echo decrypt($certificate['describe']);?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">متطلباتها</label>
                        <div class="col-sm-10">
                          <textarea name="requirement" class="ckeditor"><?php echo decrypt($certificate['requirement']);?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">تفاصيل آخرى</label>
                        <div class="col-sm-10">
                          <textarea name="details" class="ckeditor"><?php echo decrypt($certificate['details']);?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">الحالة</label>
                    <div class="col-sm-10">
                      <select name="status" class="form-control">
                        <option value="0"  <?php if($certificate['status'] == "0"){echo 'selected';} ?>>معروضة</option>
                        <option value="1"  <?php if($certificate['status'] == "1"){echo 'selected';} ?>>غير معروضة</option>
                      </select>
                    </div>
                  </div>
                    <button type="submit" name="save_changes" class="btn btn-primary"><i class="fas fa-save"></i> حفظ التغييرات</button>
                    <input type="hidden" name="id" value="<?php echo $key; ?>">
                    <input type="hidden" name="path" value="<?php echo $certificate['logo']; ?>">
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
  '<script type="text/javascript" src="../templates/assets//js/ckeditor/ckeditor.js"></script>',
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

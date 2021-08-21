<?php
if (isset($_GET['type']) AND $_GET['type'] == 'add_new_app')
{
 include_once 'apps_in_system/add_new_app.php';
 die();
}
if (isset($_GET['type']) AND $_GET['type'] == 'edit_app')
{
 include_once 'apps_in_system/edit_app.php';
 die();
}
include_once 'header.php';
include_once "apps_in_system/actions.php";
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">التطبيقات الدراسية</h3>
      </div>
      <?php include_once 'time_now.php';?>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="card card-outline-info">
              <div class="card-header">
                <h4 class="mb-0 text-white"><i class="fa fa-universitys"></i>
                  <?php echo NUM_with_Text(
                    $conn->getReference('apps/')->getSnapshot()->numChildren(),
                    "تطبيق",
                    "تطبيق واحد",
                    "تطبيقات",
                    "تطبيقات",
                    "لا توجد أيّ تطبيقات مضافة حتى الآن"
                  );
                  ?>
                </h4>
              </div>
            </div>
            <?php


            if(isset($_POST['delete_now']))
            {
              echo '
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span> </button>
              <h3><i class="fa fa-check-circle"></i> تمّت العملية بنجاح </h3>
              تمّ حذف التطبيق
              </div>';
              header("Refresh:2");
            }

            ?>
            <a href="add_new_app" class="btn btn-right-icon btn-success"><i class="fa fa-plus"></i> إضافة تطبيق جديد</a>

            <hr>
            <?php
            if($conn->getReference('apps/')->getSnapshot()->numChildren() == 0)
            {
              echo '
              <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span> </button>
              لا توجد بيانات
              </div>';
            }
            else
            {
              ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table table-bordered tables_mobile">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">الاسم</th>
                      <th class="text-center">وصفه</th>
                      <th class="text-center">أنظمة التشغيل</th>
                      <th class="text-center">الشعار</th>
                      <th class="text-center">الحالة</th>
                      <th class="text-center">آخر تحديث</th>
                      <th class="text-center">الإجراءات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $counter = 1;
                    foreach ($conn->getReference('apps/')->getSnapshot()->getValue() as $key => $apps){
                      ?>
                      <td class="text-center" data-title="#"><?php echo $counter; ?></td>
                      <td class="text-center" data-title="الاسم"><?php echo $apps['name'];?></td>
                      <td class="text-center" data-title="وصفها">
                        <?php echo text_limit(decrypt($apps['describe']), 50,'<a data-toggle="modal" href="#describe_'.$key.'">قراءة المزيد</a>');?>
                      </td>
                      <td class="text-center" data-title="أنظمة التشغيل">
                        <ul>
                        <?php
                        foreach (explode(',',$apps['OS']) as $OS)
                        {
                          echo "<li>$OS</li>";
                        }
                        ?>
                      </ul>
                      </td>
                      <td class="text-center" data-title="الشعار">
                        <?php
                        if(!empty($apps["logo"]))
                        {
                          echo '<a href="'.$apps["logo"].'" target="_blank" class="btn btn-xs btn-success"> معاينة </a>';
                        }
                        ?>
                      </td>
                        <td class="text-center" data-title="الحالة">
                          <?php
                          if($apps['status'] == 0)
                          {
                            echo '<span class="badge badge-success">معروضة</span>';
                          }else if($apps['status'] == 1){
                            echo '<span class="badge badge-danger">غير معروضة</span>';
                          }
                          ?>
                        </td>
                      <td class="text-center" data-title="آخر تحديث"><?php echo convert_date($apps['updated_at'])."<br>".datetime_to_string_ago($apps['updated_at']); ?></td>
                      <td class="text-center" data-title="الإجراءات">
                        <a class="btn btn-xs btn-info" href="edit_app=<?php echo $key; ?>" title="تحرير ">
                          <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a data-toggle="modal" class="btn btn-xs btn-danger" href="#delete_<?php echo $key; ?>"  title="حذف ">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <?php $counter++;} ?>
                  </tbody>
                </table>
                <?php

                foreach ($conn->getReference('apps/')->getSnapshot()->getValue() as $key => $apps){
                  include 'apps_in_system/delete_form.php';
                  include 'apps_in_system/describe.php';
                }
                ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php
      custom_footer("",array(
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

<?php
include_once 'header.php';
include_once "admissions_in_system/actions.php";
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0"> القبول والتسجيل في الجامعات</h3>
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
                    $conn->getReference('admissions/')->getSnapshot()->numChildren(),
                    "موعد",
                    "موعد واحد",
                    "موعدان",
                    "مواعيد",
                    "لا يوجد أيّ موعد مضاف حتى الآن"
                  );
                  ?>
                </h4>
              </div>
            </div>
            <?php

            if(isset($_POST['add_new']))
            {
              echo '
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span> </button>
              <h3><i class="fa fa-check-circle"></i> تمّت العملية بنجاح </h3>
              تمّ إضافة الموعد
              </div>';
              header("Refresh:2");
            }
            if(isset($_POST['save_changes']))
            {
              echo '
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span> </button>
              <h3><i class="fa fa-check-circle"></i> تمّت العملية بنجاح </h3>
              تمّ تحرير الموعد
              </div>';
              header("Refresh:2");
            }
            if(isset($_POST['delete_now']))
            {
              echo '
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span> </button>
              <h3><i class="fa fa-check-circle"></i> تمّت العملية بنجاح </h3>
              تمّ حذف الموعد
              </div>';
              header("Refresh:2");
            }

            include_once 'admissions_in_system/addnew_form.php';
            echo "<hr>";

            if($conn->getReference('admissions/')->getSnapshot()->numChildren() == 0)
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
                      <th class="text-center">اسم الجامعة</th>
                      <th class="text-center">البرنامج</th>
                      <th class="text-center">تاريخ البدأ/الإنتهاء</th>
                      <th class="text-center">المتبقي</th>
                      <th class="text-center">آخر تحديث</th>
                      <th class="text-center">الإجراءات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $counter = 1;
                    foreach ($conn->getReference('admissions/')->getSnapshot()->getValue() as $key => $admissions){
                      ?>
                      <td class="text-center" data-title="#"><?php echo $counter; ?></td>
                      <td class="text-center" data-title="اسم الجامعة">
                        <?php
                        if($conn->getReference('universities/')->getSnapshot()->numChildren() != 0)
                        {
                          foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $university_key => $university)
                          {
                            if($admissions['university_id'] == $university_key)
                            {
                              echo $university['name'];
                            }
                          }
                        }
                        ?>
                      </td>
                      <td class="text-center" data-title="البرنامج"><?php echo $admissions['name'];?></td>
                      <td class="text-center" data-title="تاريخ البدأ/الإنتهاء">

                        <?php
                        echo '<span class="badge badge-success">'.$admissions['start_date'].'</span>';
                        echo "<hr>";
                         echo '<span class="badge badge-danger">'.$admissions['end_date'].'</span>';?>

                        </td>
                      <td class="text-center" data-title="المتبقي">
                        <?php
                        if(date('Y-m-d') < $admissions['start_date'])
                        {
                          $start ="يبدأ بعد ".datetime_to_string_Diff(date('Y-m-d'),$admissions['start_date']);
                        }
                        else
                        {
                          $start =  "بدأ ".datetime_to_string_ago($admissions['start_date']);
                        }
                        if(date('Y-m-d') < $admissions['end_date'])
                        {
                          $end = "ينتهي بعد ".datetime_to_string_Diff(date('Y-m-d'),$admissions['end_date']);
                        }
                        else
                        {
                          $end = "إنتهى ".datetime_to_string_ago($admissions['end_date']);
                        }
                        echo "$start <hr> $end";
                         ?>

                      </td>
                      <td class="text-center" data-title="آخر تحديث"><?php echo convert_date($admissions['updated_at'])."<br>".datetime_to_string_ago($admissions['updated_at']); ?></td>
                      <td class="text-center" data-title="الإجراءات">
                        <a data-toggle="modal" class="btn btn-xs btn-info" href="#edit_<?php echo $key; ?>" title="تحرير ">
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

                foreach ($conn->getReference('admissions/')->getSnapshot()->getValue() as $key => $admissions){
                  include 'admissions_in_system/delete_form.php';
                  include 'admissions_in_system/edit_form.php';
                }
                ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php
      custom_footer("",array(
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

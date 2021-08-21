<?php
include_once 'header.php';
include_once "volunteers_in_system/actions.php";
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">المتطوعين</h3>
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
                    $conn->getReference('volunteers/')->getSnapshot()->numChildren(),
                    "متطوع",
                    "متطوع واحد",
                    "متطوعان",
                    "متطوعين",
                    "لا يوجد أيّ متطوعين مضافين حتى الآن"
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
              تمّ إضافة المتطوع
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
              تمّ تحرير المتطوع
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
              تمّ حذف المتطوع
              </div>';
              header("Refresh:2");
            }

            include_once 'volunteers_in_system/addnew_form.php';
            echo "<hr>";

            if($conn->getReference('volunteers/')->getSnapshot()->numChildren() == 0)
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
                      <th class="text-center">وسيلة التواصل</th>
                      <th class="text-center">الجامعة</th>
                      <th class="text-center">التخصص</th>
                      <th class="text-center">المستوى</th>
                      <th class="text-center">الحالة</th>
                      <th class="text-center">آخر تحديث</th>
                      <th class="text-center">الإجراءات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $counter = 1;
                    foreach ($conn->getReference('volunteers/')->getSnapshot()->getValue() as $key => $volunteers){
                      ?>
                      <td class="text-center" data-title="#"><?php echo $counter; ?></td>
                      <td class="text-center" data-title="الاسم"><?php echo $volunteers['name'];?></td>
                      <td class="text-center" data-title="وسيلة التواصل"><?php echo $volunteers['type_contact']." | ".$volunteers['contact'];?></td>
                      <td class="text-center" data-title="الجامعة">
                        <?php
                        if($conn->getReference('universities/')->getSnapshot()->numChildren() != 0)
                        {
                          foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $university_key => $university)
                          {
                            if($volunteers['university_id'] == $university_key)
                            {
                              echo $university['name'];
                            }
                          }
                        }
                        ?>
                      </td>
                      <td class="text-center" data-title="التخصص">
                        <?php
                        if($conn->getReference('majors_in_universities/')->getSnapshot()->numChildren() != 0)
                        {
                          foreach ($conn->getReference('majors_in_universities/')->getSnapshot()->getValue() as $major_key => $major)
                          {
                            if($volunteers['major_id'] == $major_key)
                            {
                              echo $major['name'];
                            }
                          }
                        }
                        ?>
                        <td class="text-center" data-title="المستوى"><?php echo $volunteers['level'];?></td>
                        <td class="text-center" data-title="الحالة">
                          <?php
                          if($volunteers['status'] == 0)
                          {
                            echo '<span class="badge badge-success">معروض</span>';
                          }else if($volunteers['status'] == 1){
                            echo '<span class="badge badge-danger">غير معروض</span>';
                          }
                          ?>
                        </td>
                      <td class="text-center" data-title="آخر تحديث"><?php echo convert_date($volunteers['updated_at'])."<br>".datetime_to_string_ago($volunteers['updated_at']); ?></td>
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

                foreach ($conn->getReference('volunteers/')->getSnapshot()->getValue() as $key => $volunteers){
                  include 'volunteers_in_system/delete_form.php';
                  include 'volunteers_in_system/edit_form.php';
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
  '<script type="text/javascript" src=../templates/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>',
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

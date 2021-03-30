<?php
include_once 'header.php';
include_once "users_in_system/actions.php";
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">المستخدمين</h3>
      </div>
      <?php include_once 'time_now.php';?>
    </div>


    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="card card-outline-info">
              <div class="card-header">
                <h4 class="mb-0 text-white"><i class="fa fa-users"></i>
                  <?php echo NUM_with_Text(
                    $conn->getReference('users/')->getSnapshot()->numChildren(),
                    "عضوية",
                    "عضوية واحدة",
                    "عضويتان",
                    "عضويات",
                    "لا توجد عضويات مضافة"
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
              تمّ إضافة
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
              تمّ تحرير العضوية
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
              تمّ حذف العضوية
              </div>';
              header("Refresh:2");
            }
            include_once 'users_in_system/addnew_form.php';
            echo "<hr>";
            if($conn->getReference('users/')->getSnapshot()->numChildren() == 0)
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
                      <th class="text-center">البريد الالكتروني</th>
                      <th class="text-center">حالة العضوية</th>
                      <th class="text-center">آخر دخول</th>
                      <th class="text-center">أضيف في</th>
                      <th class="text-center">آخر تحديث</th>
                      <th class="text-center">الإجراءات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $counter = 1;
                    foreach ($conn->getReference('users/')->getSnapshot()->getValue() as $key => $user){
                      ?>
                      <tr>
                      <td class="text-center" data-title="#"><?php echo $counter; ?></td>
                      <td class="text-center" data-title="البريد الالكتروني"><?php echo $user['email']; ?></td>
                      <td class="text-center" data-title="حالة العضوية">
                        <?php
                        if($user['status'] == 0)
                        {
                          echo '<span class="badge badge-success">نشطة</span>';
                        }else if($user['status'] == 1){
                          echo '<span class="badge badge-danger">غير نشطة</span>';
                        }
                        ?>
                      </td>
                      <td class="text-center" data-title="آخر دخول">
                        <?php
                        if($user['last_login'] == 0)
                        {
                          echo '<span class="badge badge-danger">لم يقوم بتسجيل الدخول حتى الآن</span>';
                        }else {
                          echo sprintf("%s<br>( %s )",
                          convert_date($user['last_login']),
                          datetime_to_string_ago($user['last_login']));
                        }
                        ?>
                      </td>
                      <td class="text-center" data-title="أضيفت في"><?php echo convert_date($user['created_at']); ?></td>
                      <td class="text-center" data-title="آخر تحديث"><?php echo convert_date($user['updated_at'])."<br>".datetime_to_string_ago($user['updated_at']); ?></td>
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

                foreach ($conn->getReference('users/')->getSnapshot()->getValue() as $key => $user){
                  include 'users_in_system/delete_form.php';
                  include 'users_in_system/edit_form.php';
                }
                ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php custom_footer();?>

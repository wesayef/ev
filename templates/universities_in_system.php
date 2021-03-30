<?php
include_once 'header.php';
include_once "universities_in_system/actions.php";
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0"> الجامعات والتخصصات</h3>
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
                    $conn->getReference('universities/')->getSnapshot()->numChildren(),
                    "جامعة",
                    "جامعة واحدة",
                    "جامعتان",
                    "جامعات",
                    "لا توجد أيّ جامعات مضافة"
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
              تمّ إضافة الجامعة
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
              تمّ تحرير الجامعة
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
              تمّ حذف الجامعة
              </div>';
              header("Refresh:2");
            }
            if(isset($_POST['add_new_major']))
            {
              echo '
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span> </button>
              <h3><i class="fa fa-check-circle"></i> تمّت العملية بنجاح </h3>
              تمّ إضافة التخصص
              </div>';
              header("Refresh:2");
            }
            if(isset($_POST['save_changes_major']))
            {
              echo '
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span> </button>
              <h3><i class="fa fa-check-circle"></i> تمّت العملية بنجاح </h3>
              تمّ تحرير التخصص
              </div>';
              header("Refresh:2");
            }
            if(isset($_POST['delete_now_major']))
            {
              echo '
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span> </button>
              <h3><i class="fa fa-check-circle"></i> تمّت العملية بنجاح </h3>
              تمّ حذف التخصص
              </div>';
              header("Refresh:2");
            }
            include_once 'universities_in_system/addnew_form.php';
            echo "<hr>";
            if($conn->getReference('universities/')->getSnapshot()->numChildren() != 0)
            {
              include_once 'universities_in_system/addnew_major_form.php';
              echo "<hr>";
            }
            if($conn->getReference('universities/')->getSnapshot()->numChildren() == 0)
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
                      <th class="text-center">نبذه</th>
                      <th class="text-center">المقر</th>
                      <th class="text-center">التخصصات</th>
                      <th class="text-center">الصورة</th>
                      <th class="text-center">الحالة</th>
                      <th class="text-center">آخر تحديث</th>
                      <th class="text-center">الإجراءات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $counter = 1;
                    foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $key => $university){
                      ?>
                      <td class="text-center" data-title="#"><?php echo $counter; ?></td>
                      <td class="text-center" data-title="الاسم"><?php echo $university['name'];?></td>
                      <td class="text-center" data-title="الموقع">
                        <?php
                        echo text_limit($university['about'], 50,'<a data-toggle="modal" href="#about_'.$key.'">قراءة المزيد</a>');
                      ?>
                      </td>
                      <td class="text-center" data-title="المقر"><?php echo $university['location'];?></td>
                      <td class="text-center" data-title="التخصصات">
                        <?php
                        if($conn->getReference('majors_in_universities/')->getSnapshot()->numChildren() != 0)
                        {
                          foreach ($conn->getReference('majors_in_universities/')->getSnapshot()->getValue() as $major_key => $major)
                          {
                            if($major['university_id'] == $key)
                            {
                              ?>
                              <ul class="text-left">
                                <li>
                                  <?php echo $major['name'];?>
                                  <a data-toggle="modal" class="btn btn-xs btn-info" href="#edit_major_<?php echo $major_key; ?>" title="تحرير ">
                                    <i class="fa fa-pencil-alt"></i>
                                  </a>
                                  <a data-toggle="modal" class="btn btn-xs btn-danger" href="#delete_major_<?php echo $major_key; ?>"  title="حذف ">
                                    <i class="fa fa-trash"></i>
                                  </a>
                                </li>
                              </ul>
                              <?php
                              include 'universities_in_system/delete_major_form.php';
                              include 'universities_in_system/edit_major_form.php';
                            }
                          }
                        }
                        else
                        {
                          echo '<span class="badge badge-danger">لا توجد أيّ تخصصات</span>';
                        }
                        ?>
                      </td>
                      <td class="text-center" data-title="الشعار">
                        <?php
                        if(!empty($university["logo"]))
                        {
                          echo '<a href="'.$university["logo"].'" target="_blank" class="btn btn-xs btn-success"> معاينة </a>';
                        }
                        ?>
                      </td>
                      <td class="text-center" data-title="الحالة">
                        <?php
                        if($university['status'] == 0)
                        {
                          echo '<span class="badge badge-success">معروضة</span>';
                        }else if($university['status'] == 1){
                          echo '<span class="badge badge-danger">غير معروضة</span>';
                        }
                        ?>
                      </td>
                      <td class="text-center" data-title="آخر تحديث"><?php echo convert_date($university['updated_at'])."<br>".datetime_to_string_ago($university['updated_at']); ?></td>
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

                foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $key => $university){
                  include 'universities_in_system/delete_form.php';
                  include 'universities_in_system/edit_form.php';
                  include 'universities_in_system/uni_about.php';
                }
                ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php
      custom_footer("",array(
        '<script type="text/javascript" src="http://192.168.64.2/ev/templates/assets/plugins/dropify/dist/js/dropify.min.js"></script>',
        '<script type="text/javascript" src="http://192.168.64.2/ev/templates/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>',
        '<script type="text/javascript" src="http://192.168.64.2/ev/templates/assets/js/mask.init.js"></script>'
      ));
      ?>

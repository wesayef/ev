<?php
include_once "../conf/config.php";
if(isset($_SESSION['admin_id']))
{
  foreach ($conn->getReference('admins/')->getSnapshot()->getValue() as $key => $user)
  {
    if(decrypt($_SESSION['admin_id']) == $key)
    {
      header("Location: dashboard");
    }
  }
}
if(isset($_POST['login_now']))
{
  foreach ($conn->getReference('admins/')->getSnapshot()->getValue() as $key => $user)
  {
    if($user['username'] == $_POST['username'])
    {
      if(password_verify($_POST['password'],$user['password']))
      {
        if($user['status'] != 0)
        {
          $msg = "<div class='alert alert-danger'>";
          $msg .= "عفوًا الحساب : ".$_POST['username']." غير نشط فضلا قم بمراجعة مدير النظام لتنشيطة";
          $msg .= "</div>";
        }
        else
        {
          $time =  time()+3600*2;
          $_SESSION['expire_SAdmins'] = $time;
          $_SESSION['admin_id'] = encrypt($key);
          $upd_last_login = [
            'last_login' => date("Y-m-d H:i:s")
          ];
          $conn->getReference('admins/'.$key)->update($upd_last_login);
    dump("test");
    /*  if(isset($_GET['returnTo']))
          {
            header("Location: ".$_GET['returnTo']);
          }
          else
          {
            header("Location: dashboard");
          } */
        }
      }
      else
      {
        $msg = "<div class='alert alert-danger'>";
        $msg .= "عفوًا لقد قمت بإدخال كلمة مرور خاطئة للحساب : ".$_POST['username'];
        $msg .= "</div>";
      }
    }
    else
    {
      $msg = "<div class='alert alert-danger'>";
      $msg .= "عفوًا الحساب ".$_POST['username']." غير موجود بسجلاتنا، نأمل التحقق من معلومات الدخول أو مراجعة مدير النظام لمساعدتك في حلّ المشكلة.";
      $msg .= "</div>";
    }
  }
}


?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16">
  <title>

  </title>
  <link href="../templates/assets/css/style_all_ar.css" rel="stylesheet">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/files/login-bg.jpg);">
      <div class="login-box card">
        <div class="card-body">
          <form class="form-horizontal form-material" id="loginform" method="POST" action="">
            <div class="text-center">

            </div>
            <br>
            <br>
            <h2 class="text-center d-block">دخول المشرفين</h2>
            <div class="form-group mt-4">
              <div class="col-xs-12">
                <?php if(!empty($msg)){ echo $msg; } ?>
                <div class="form-group mt-4">
                  <div class="col-xs-12">
                    <i class="fa fa-user"></i>
                    <input class="form-control" type="text" name="username" placeholder="اسم المستخدم" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <i class="fa fa-key"></i>
                    <input class="form-control" type="password" name="password" placeholder="كلمة المرور" required>
                  </div>
                </div>
                <div class="form-group text-center mt-3">
                  <div class="col-xs-12">
                    <button class="btn btn-success btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login_now"><i class="fas fa-sign-in-alt"></i> تسجيل الدخول</button>
                  </div>
                </div>

              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <?php custom_footer();?>

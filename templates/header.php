<?php
include_once "../conf/config.php";
if(isset($_GET['logout']))
{
  session_destroy();
  header("Location: clogin");
}
if (empty($_SESSION['expire_SAdmins']))
{
  session_destroy();
  header("Location: clogin?returnTo=".$_SERVER['REQUEST_URI']);
}
if(time() > $_SESSION['expire_SAdmins'])
{
  session_destroy();
  header("Location: clogin?returnTo=".$_SERVER['REQUEST_URI']);
}
if(isset($_SESSION['admin_id']))
{
  foreach ($conn->getReference('admins/')->getSnapshot()->getValue() as $key => $user)
  {
    if(decrypt($_SESSION['admin_id']) == $key)
    {
      $login_user = $user;
    }
    else
    {
      if(decrypt($_SESSION['admin_id']) != $key)
      {
        header("Location: clogin?returnTo=".$_SERVER['REQUEST_URI']);
      }
    }
  }
}
else
{
  header("Location: clogin?returnTo=".$_SERVER['REQUEST_URI']);
}
?>
<!DOCTYPE html>
<html lang="rtl" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" type="image/png" sizes="16x16" href="">
  <title>أرشدني</title>
  <link href="../templates/assets/css/style_all_ar.css" rel="stylesheet">
  <!--[if IE]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border logo-center">
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
  </div>
  <div id="main-wrapper">
    <?php
    include_once "top_bar.php";
    include_once "menu.php";
    ?>

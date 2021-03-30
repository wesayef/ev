<?php
include_once "../conf/config.php";
if(isset($_SESSION['user_id']))
{
  foreach ($conn->getReference('users/')->getSnapshot()->getValue() as $key => $user)
  {
    if(decrypt($_SESSION['user_id']) == $key)
    {
      header("Location: home");
    }
  }
}
if(isset($_POST['login_now']))
{
  foreach ($conn->getReference('users/')->getSnapshot()->getValue() as $key => $user)
  {
    if($user['email'] == $_POST['email'])
    {
      if(password_verify($_POST['password'],$user['password']))
      {
        if($user['status'] != 0)
        {
          $msg = "<div class='alert alert-danger'>";
          $msg .= "عفوًا الحساب : ".$_POST['email']." غير نشط فضلا قم بمراجعة مدير النظام لتنشيطة";
          $msg .= "</div>";
        }
        else
        {
          $time =  time()+3600*2;
          $_SESSION['expire_SUsers'] = $time;
          $_SESSION['user_id'] = encrypt($key);
          $upd_last_login = [
            'last_login' => date("Y-m-d H:i:s")
          ];
          $conn->getReference('users/'.$key)->update($upd_last_login);
            header("Location: home");
          
        }
      }
      else
      {
        $msg = "<div class='alert alert-danger'>";
        $msg .= "عفوًا لقد قمت بإدخال كلمة مرور خاطئة للحساب : ".$_POST['email'];
        $msg .= "</div>";
      }
    }
    else
    {
      $msg = "<div class='alert alert-danger'>";
      $msg .= "عفوًا الحساب ".$_POST['email']." غير موجود بسجلاتنا، نأمل التحقق من معلومات الدخول أو مراجعة مدير النظام لمساعدتك في حلّ المشكلة.";
      $msg .= "</div>";
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>تسجيل الدخول</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="visitors/assets/css/my-login.css">
	<!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-auth.js"></script>
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100" id="formContainer"> 
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="visitors/assets/img/arshedni.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title"  align="center" >تسجيل دخول</h4>
							<div id="formContainer">
								<?php if(!empty($msg)){echo $msg;} ?>
<form method="post" action="" >
							
								<div class="form-group" id="formContainer">
									<label for="email" align="right">البريد الالكتروني</label>
									<input id="email" type="email" placeholder=" " class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										بريدك الالكتروني غير صالح
									</div>
								</div>

								 <div class="form-group" id="formContainer">
								    <label for="email" align="right">كلمة المرور</label>
									<input id="password" type="password" placeholder="" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	كلمة المرور مطلوبة
							    	</div>
								</div>
								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block"  name="login_now">
										تسجيل دخول
									</button>
</form>
									
								</div>
								<div class="mt-4 text-center">
									هل لديك حساب ؟ <a href="register">أنشىء الآن</a>
								</div>

								<div class="mt-4 text-center">
							    <button class="btn btn-block "  onclick="signOut()" id="signOut">تسجيل خروج</button>
								</div>
                      
							
						 </div>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2021 &mdash; Arshedni 
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>

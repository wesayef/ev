<?php 
include_once "../conf/config.php" ;

if(isset($_POST['add_new']))
  {
    $data = [
      'email' => "".$_POST['email']."",
      'password' => "".password_hash($_POST['password'], PASSWORD_DEFAULT)."",
      'status' => "0",
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s"),
      'last_login' => "0"
    ];
    
	$get_this_userkey = $conn->getReference('users/')->push($data)->getKey();
	$time =  time()+3600*2;
          $_SESSION['expire_SUsers'] = $time;
          $_SESSION['user_id'] = encrypt($get_this_userkey);
	header("Location: home");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>انشاء حساب</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="visitors/assets/css/my-login.css">
	<!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-auth.js"></script>
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="visitors/assets/img/arshedni.png" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
						 <div id="formContainer">
							<h4 class="card-title" align="center">تسجيل حساب جديد</h4>
<form method="post" action="" >
								<div class="form-group" id="formContainer">
									<label for="email" align="right">البريد الالكتروني</label>
									<input id="email" type="email" placeholder="" class="form-control" name="email" required>
									<div class="invalid-feedback">
										بريدك الالكتروني غير صالح
									</div>
								</div>

								<div class="form-group" id="formContainer">
									<label for="password" align="right" >كلمة المرور</label>
									<input id="password" type="password" placeholder="" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
									كلمة المرور مطلوبة
									</div>
								</div>


								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" name="add_new" >
										تسجيل
									</button>
</form>
									
								</div>
								<div class="mt-4 text-center">
									هل لديك حساب مُسبقًا ؟ <a href="login">تسجيل دخول</a>
								</div>
							</form>
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
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>

</body>
</html>
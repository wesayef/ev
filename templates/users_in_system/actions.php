<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  //add
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
    $conn->getReference('users/')->push($data);
}
//edit
if (isset($_POST['save_changes']))
{
  $data = [
    'email' => "".$_POST['email']."",
    'password' => "".password_hash($_POST['password'], PASSWORD_DEFAULT)."",
    'status' => "".$_POST['status']."",
    'updated_at' => date("Y-m-d H:i:s"),
    'last_login' => date("Y-m-d H:i:s"),
  ];
  $conn->getReference('users/'.$_POST['id'])->update($data);
  if(isset($_POST['password']) and !empty($_POST['password']))
  {
    $up_password = [
      'password' => "".password_hash($_POST['password'], PASSWORD_DEFAULT).""
    ];
    $conn->getReference('users/'.$_POST['id'])->update($up_password);
  }
}
//delete
if (isset($_POST["delete_now"])) {
  $conn->getReference('users/'.$_POST['id'])->remove();

}

}

?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  //add
  if(isset($_POST['add_new']))
  {
    $logo = "";
    if(!empty($_FILES['logo']['name']))
    {
      $start = explode(".", $_FILES['logo']['name']);
      $ext = end($start);
      $filename = time()."_".rand(000000000,999999999).".".$ext;
      $dir_image = "../templates/assets/images/";
      move_uploaded_file($_FILES['logo']['tmp_name'],$dir_image.$filename);
      $logo = "templates/assets/images/".$filename;
    }
    $data = [
      'name' => "".$_POST['name']."",
      'describe' => "".encrypt($_POST['describe'])."",
      'OS' => "".implode(",", $_POST['OS'])."",
      'logo' => "".$logo."",
      'status' => "0",
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    ];
    $app_now = $conn->getReference('apps/')->push($data)->getKey();
    header("Location: edit_app=$app_now");
  }
  //edit
  if (isset($_POST['save_changes'])) {
    $logo = $_POST['path'];
    if(!empty($_FILES['logo']['name']))
    {
      $start = explode(".", $_FILES['logo']['name']);
      $ext = end($start);
      $filename = time()."_".rand(000000000,999999999).".".$ext;
      $dir_image = "../templates/assets/images/";
      move_uploaded_file($_FILES['logo']['tmp_name'],$dir_image.$filename);
      $logo = "templates/assets/images/".$filename;
    }
    $data = [
      'name' => "".$_POST['name']."",
      'describe' => "".encrypt($_POST['describe'])."",
      'OS' => "".implode(",", $_POST['OS'])."",
      'logo' => "".$logo."",
      'status' => "".$_POST['status']."",
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    ];
    $conn->getReference('apps/'.$_POST['id'])->update($data);
  }
  //delete
  if (isset($_POST["delete_now"])) {
    $conn->getReference('apps/'.$_POST['id'])->remove();

  }

}

?>

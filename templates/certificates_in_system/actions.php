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
      'requirement' => "".encrypt($_POST['requirement'])."",
      'logo' => "".$logo."",
      'details' => "".encrypt($_POST['details'])."",
      'status' => "0",
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    ];
    $cer_now = $conn->getReference('certificates/')->push($data)->getKey();
    header("Location: edit_certificate=$cer_now");
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
  'requirement' => "".encrypt($_POST['requirement'])."",
  'details' => "".encrypt($_POST['details'])."",
  'logo' => "".$logo."",
  'status' => "".$_POST['status']."",
  'created_at' => date("Y-m-d H:i:s"),
  'updated_at' => date("Y-m-d H:i:s")
];
  $conn->getReference('certificates/'.$_POST['id'])->update($data);
}
//delete
if (isset($_POST["delete_now"])) {
  $conn->getReference('certificates/'.$_POST['id'])->remove();

}

}

?>

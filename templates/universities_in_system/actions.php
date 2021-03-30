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
      'about' => "".$_POST['about']."",
      'location' => "".$_POST['location']."",
      'logo' => "".$logo."",
      'high_school' => "".str_replace("%","",$_POST['high_school'])."",
      'general_aptitude' => "".str_replace("%","",$_POST['general_aptitude'])."",
      'scholastic_chievement' => "".str_replace("%","",$_POST['scholastic_chievement'])."",
      'status' => "0",
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    ];
    $uni_now = $conn->getReference('universities/')->push($data)->getKey();
    foreach ($_POST['major_name'] as $key => $value) {
      if(!empty($_POST['major_name'][$key])){
        $major = [
          'name' => "".$_POST['major_name'][$key]."",
          'describe' => "".$_POST['major_describe'][$key]."",
          'university_id' => "".$uni_now."",
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ];
    $conn->getReference('majors_in_universities/')->push($major);
        }
      }
}
  //add major
  if(isset($_POST['add_new_major']))
  {
    foreach ($_POST['major_name'] as $key => $value) {
      if(!empty($_POST['major_name'][$key])){
        $major = [
          'name' => "".$_POST['major_name'][$key]."",
          'describe' => "".$_POST['major_describe'][$key]."",
          'university_id' => "".$_POST['university_id']."",
          'created_at' => date("Y-m-d H:i:s"),
          'updated_at' => date("Y-m-d H:i:s")
        ];
    $conn->getReference('majors_in_universities/')->push($major);
        }
      }
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
    'about' => "".$_POST['about']."",
    'location' => "".$_POST['location']."",
    'logo' => "".$logo."",
    'high_school' => "".str_replace("%","",$_POST['high_school'])."",
    'general_aptitude' => "".str_replace("%","",$_POST['general_aptitude'])."",
    'scholastic_chievement' => "".str_replace("%","",$_POST['scholastic_chievement'])."",
    'status' => "".$_POST['status']."",
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s")
  ];
  $conn->getReference('universities/'.$_POST['id'])->update($data);
}
if (isset($_POST['save_changes_major'])) {
      $major = [
        'name' => "".$_POST['major_name']."",
        'describe' => "".$_POST['major_describe']."",
        'university_id' => "".$_POST['university_id']."",
        'updated_at' => date("Y-m-d H:i:s")
      ];
  $conn->getReference('majors_in_universities/'.$_POST['id'])->update($major);
}
//delete
if (isset($_POST["delete_now"])) {
  $conn->getReference('universities/'.$_POST['id'])->remove();

}
if (isset($_POST["delete_now_major"])) {
  $conn->getReference('majors_in_universities/'.$_POST['id'])->remove();

}

}

?>

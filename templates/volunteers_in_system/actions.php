<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  //add
  if(isset($_POST['add_new']))
  {
    $data = [
      'name' => "".$_POST['name']."",
      'university_id' => "".$_POST['university_id']."",
      'major_id' => "".$_POST['major_id']."",
      'type_contact' => "".$_POST['type_contact']."",
      'contact' => "".$_POST['contact']."",
      'level' => "".$_POST['level']."",
      'status' => "0",
      'created_at' => date("Y-m-d H:i:s"),
      'updated_at' => date("Y-m-d H:i:s")
    ];
    $conn->getReference('volunteers/')->push($data);
  }

  //edit
  if (isset($_POST['save_changes']))
  {
    $data = [
      'name' => "".$_POST['name']."",
      'university_id' => "".$_POST['university_id']."",
      'major_id' => "".$_POST['major_id']."",
      'type_contact' => "".$_POST['type_contact']."",
      'contact' => "".$_POST['contact']."",
      'level' => "".$_POST['level']."",
      'status' => "".$_POST['status']."",
      'updated_at' => date("Y-m-d H:i:s")
    ];
    $conn->getReference('volunteers/'.$_POST['id'])->update($data);
  }

  //delete
  if (isset($_POST["delete_now"]))
  {
    $conn->getReference('volunteers/'.$_POST['id'])->remove();

  }

}

?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  //add
  if(isset($_POST['add_new']))
  {
    $dates = explode(" - ",$_POST['start_end_date']);
    $data = [
        'name' => "".$_POST['name']."",
        'university_id' => "".$_POST['university_id']."",
        'start_date' => "".$dates[0]."",
        'end_date' => "".$dates[1]."",
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
    ];
    $conn->getReference('admissions/')->push($data);
}

//edit
if (isset($_POST['save_changes'])) {
  $dates = explode(" - ",$_POST['start_end_date']);
  $data = [
      'name' => "".$_POST['name']."",
      'university_id' => "".$_POST['university_id']."",
      'start_date' => "".$dates[0]."",
      'end_date' => "".$dates[1]."",
      'updated_at' => date("Y-m-d H:i:s")
  ];
  $conn->getReference('admissions/'.$_POST['id'])->update($data);
}

//delete
if (isset($_POST["delete_now"])) {
  $conn->getReference('admissions/'.$_POST['id'])->remove();

}

}

?>

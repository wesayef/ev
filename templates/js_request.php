<?php
include_once "../conf/config.php";
if (isset($_GET['uni_key']) AND !empty($_GET['uni_key']))
{
  $ot = "";
  if($conn->getReference('majors_in_universities/')->getSnapshot()->numChildren() != 0)
  {
    foreach ($conn->getReference('majors_in_universities/')->getSnapshot()->getValue() as $major_key => $major)
    {
      if($major['university_id'] == $_GET['uni_key'])
      {
        $ot .= '<option value="'.$major_key.'">'.$major['name'].'</option>';
      }
    }
  }
  echo $ot;
  die();
}

?>

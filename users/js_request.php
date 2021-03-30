<?php
include_once "../conf/config.php";
if(isset($_GET['rating']))
{
    $data = [
        'volunteer_id' => "".$_GET['volunteer_id']."",
        'user_id' => "".decrypt($_SESSION['user_id'])."",
        'rating' => "".$_GET['rating']."",
        'created_at' => date("Y-m-d H:i:s")
      ];
     $conn->getReference('ratings/')->push($data);
}
if (isset($_GET['uni_key']) AND !empty($_GET['uni_key']))
{
  if($conn->getReference('universities/')->getSnapshot()->numChildren() != 0)
  {

    foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $key => $uni)
{
    if($_GET['uni_key'] == $key)
    {
    $cal = array();

        $cal['high_school'] = $uni['high_school'];
        $cal['general_aptitude'] = $uni['general_aptitude'];
        $cal['scholastic_chievement'] = $uni['scholastic_chievement'];
        echo json_encode($cal);
 
    }
}
  }
}

?>
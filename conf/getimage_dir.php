<?php
include_once "encrypt_fun.php";
if(!empty($_GET['image_ID']))
{
  $path = URL_Decode($_GET['image_ID'], "IMG");
  $mime = get_image_mime_type($path);
  if($mime != 'image/gif')
  {
    if(isset($_GET['size']))
    {
      $the_img = resize_img($_GET['size'], $path);
    }
    else
    {
      if(isset($_GET['c']) and $_GET['c'] == 1)
      {
        $the_img = compress_img($path, 70);
      }
      else
      {
        $the_img = $path;
      }
    }
  }
  else
  {
    if(isset($_GET['size']))
    {
      if(isset($_GET['c']) and $_GET['c'] == 1)
      {
        $the_img = $path;
      }
      else
      {
        $the_img = resize_img($_GET['size'], $path);
      }
    }
    else
    {
      $the_img = $path;
    }
  }
  header('Content-type: ' .$mime);
  readfile($the_img);
  die();

}

?>

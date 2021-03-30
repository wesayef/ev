<?php
function rand_str($length){
  $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_)(&#?><][';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++){
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}


function inc_file($path,$type="",$roles=""){
  ob_start();
  if(!empty($type) and !empty($roles)){
    $_GET['type'] = $type;
    $the_roles = explode(",", $roles);
  }
  include $path;
  return ob_get_clean();
}


function NUM_with_Text($actual_number, $single_word, $one_word, $twain_word, $plural_word, $null)
{
  $output = "";
  if($actual_number >= 0){
    if($actual_number == 0){$output .= $null;}
    if($actual_number == 1){$output .= $one_word;}
    if($actual_number == 2){$output .= $twain_word;}
    if($actual_number > 2 and $actual_number < 11){$output .= $actual_number." ".$plural_word;}
    if($actual_number >= 11){$output .= $actual_number." ".$single_word;}
  }
  else
  {
    if($actual_number == -1){$output .= $one_word;}
    if($actual_number == -2){$output .= $twain_word;}
    if($actual_number < -2 and $actual_number > -11){$output .= $actual_number." ".$plural_word;}
    if($actual_number <= -11){$output .= $actual_number." ".$single_word;}
  }
  return $output;
}
function NUM_with_Text_Just_NUM($actual_number, $single_word, $one_word, $twain_word, $plural_word, $null)
{
  $output = "";
  if($actual_number < 0){$output .= $actual_number." ".$single_word;}
  if($actual_number == 0){$output .= $null;}
  if($actual_number == 1){$output .= $one_word;}
  if($actual_number == 2){$output .= $twain_word;}
  if($actual_number > 2 and $actual_number < 11){$output .= $plural_word;}
  if($actual_number >= 11){$output .= $single_word;}
  return $output;
}


function text_limit($text, $word_limits,$more=null)
{
  $string = strip_tags($text);
  if (strlen($string) > $word_limits)
  {
    // truncate string
    $stringCut = substr($string, 0, $word_limits);
    $endPoint = strrpos($stringCut, ' ');
    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $string .= '...';
    if(!empty($more))
    {
      $string .= $more;
    }
  }
  return $string;
}

function custom_footer($php_files="",$js_files="")
{
  $ot = "";
  if(!empty($php_files))
  {
    foreach($php_files as $num => $php_file)
    {
      $ot .= inc_file($php_file);
    }
  }
  $ot .= inc_file('footer.php');
  $ot .= inc_file('js.php');
  if(!empty($js_files)){
    foreach($js_files as $num => $js_file)
    {
      $ot .= $js_file;
    }
  }
  $ot .= '<script type="text/javascript" src="http://localhost/ev/templates/assets/js/config.js"></script>';
  $ot .= inc_file('end_html.php');
  echo $ot;
}

?>

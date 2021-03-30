<?php
function create_modal($id, $modal_type='', $title, $body, $method='', $form_class='', $action='', $submit_name, $submit_class='', $submit_text, $close_window_class='',$close_window_text, $custom_hidden_inputs='')
{
  $ot = "";
  $ot .='
  <div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog '.$modal_type.'">
  <div class="modal-content">
  <div class="modal-header label-light-green white">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabelSuccess">'.$title.'</h4>
  </div>
  <form method="'.$method.'" class="'.$form_class.'" enctype="multipart/form-data" action="'.$action.'">
  <div class="modal-body">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  '.$body.'
  </div>
  </div>
  </div>
  <div class="modal-footer">';
  if(!empty($submit_name) and !empty($submit_text)){
    $ot .= '<button type="submit" name="'.$submit_name.'" class="'.$submit_class.'">'.$submit_text.'</button>';
  }
  $ot .= '
  <button class="'.$close_window_class.'" data-dismiss="modal">'.$close_window_text.'</button>
  '.$custom_hidden_inputs.'
  </div>
  </form>
  </div>
  </div>
  </div>';
  return $ot;
}
function tag_modal($id,$class,$icon=null,$text=null,$more=null){
  $ot='
  <a href="javascript:void(0)" data-toggle="modal" data-target="#'.$id.'" class="'.$class.'" '.$more.'>';
  if(!empty($icon)){
    $ot .='
    <i class="'.$icon.'"></i>';
  }
  if(!empty($text)){
  $ot .= " ".$text;
  }
  $ot .='</a>';
  return $ot;
}
function create_input($type_form,$type_input,$text,$type,$name,$value="",$class="form-control",$more="",$error=""){
    $ot = "";
     $add_required = "";
     if($type_form=="pure"){
        $ot .= '<input type="'.$type.'" name="'.$name.'" class="'.$class.'" title="'.$text.'"
   value="'.((isset($_POST[$name]) ? $_POST[$name] : $value)).'" '.$add_required.' '.$more.'>';
    } else if($type_form=="side" OR $type_form==""){
    if(!empty($text) and $type!="checkbox" and $type!="radio"){
    $ot .='<div class="form-group row"><label for="example-text-input" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-form-label">';
    if($type_input == "required"){
        $add_required = "required";
    $ot .='<span style="color:red;">* </span>';
    }else if($type_input == "null"){
         $ot .='<span style="color:green;">* </span>';
    }
    else if($type_input == "no" OR $type_input=""){
         $ot .='';
    }
    $ot .= $text.'</label>';
  }
  $ot .='
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
  <input type="'.$type.'" name="'.$name.'" class="'.$class.'" title="'.$text.'"
   value="'.((isset($_POST[$name]) ? $_POST[$name] : $value)).'" '.$add_required.' '.$more.'>'.$error;
  if($type=="checkbox") {
    $ot .= " ".$text;
  }
  if($type=="radio") {
    $ot .= " ".$text;
  }
  if(!empty($text) and $type!="checkbox" and $type!="radio"){
    $ot .='</div> </div>';
  }
    }else if($type_form=="above"){

  if(!empty($text) and $type!="checkbox" and $type!="radio"){
    $ot .='<div class="form-group"><label for="input-file-now">';
    if($type_input == "required"){
        $add_required = "required";
    $ot .='<span style="color:red;">* </span>';
    }else if($type_input == "null"){
         $ot .='<span style="color:green;">* </span>';
    }
    else if($type_input == "no"){
         $ot .='';
    }
    $ot .= $text.'</label>';
  }
  $ot .='
  <input type="'.$type.'" name="'.$name.'" class="'.$class.'" title="'.$text.'"
   value="'.((isset($_POST[$name]) ? $_POST[$name] : $value)).'" '.$add_required.' '.$more.'>'.$error;
  if($type=="checkbox") {
    $ot .= " ".$text;
  }
  if($type=="radio") {
    $ot .= " ".$text;
  }
  if(!empty($text) and $type!="checkbox" and $type!="radio"){
    $ot .='</div>';
  }
    }
  return $ot;
}
function create_select($type_form,$type_input,$text,$name,$class,$options,$more="",$error=""){
     $ot = "";
     $add_required = "";
    if($type_form=="pure"){
        $ot .= '<select name="'.$name.'" class="'.$class.'" title="'.$text.'" '.$add_required.' '.$more.'>
  '.$options.'
  </select>';
    }else if($type_form=="side"){
         $ot .='<div class="form-group row"><label for="example-text-input" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-form-label">';
   if($type_input == "required"){
       $add_required = "required";
    $ot .='<span style="color:red;">* </span>';
    }else if($type_input == "null"){
         $ot .='<span style="color:green;">* </span>';
    }
    else if($type_input == "no"){
         $ot .='';
    }
    $ot .= $text.'</label>';
    $ot .='
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
  <select name="'.$name.'" class="'.$class.'" title="'.$text.'" '.$more.'>
  <option value=""> ---- '.str_lang('فضلاً إختر')." ".$text.' ----</option>
  '.$options.'
  </select>
  </div></div>';
    }else if($type_form=="above"){
  $ot .='<div class="form-group"><label for="input-file-now">';
   if($type_input == "required"){
       $add_required = "required";
    $ot .='<span style="color:red;">* </span>';
    }else if($type_input == "null"){
         $ot .='<span style="color:green;">* </span>';
    }
    else if($type_input == "no"){
         $ot .='';
    }
    $ot .= $text.'</label>';
    $ot .='
  <select name="'.$name.'" class="'.$class.'" title="'.$text.'" '.$add_required.' '.$more.'>
  <option value=""> ---- '.str_lang('فضلاً إختر')." ".$text.' ----</option>
  '.$options.'
  </select>
  </div>';
    }
  return $ot;
}
function create_textarea($type_form,$type_input,$text,$name,$value,$rows=null,$cols=null,$class="",$more="",$error=""){
    $ot = "";
    $add_required = "";
     if($type_form=="side"){
         $ot ='<div class="form-group row"><label for="example-text-input" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-form-label">';
   if($type_input == "required"){
       $add_required = "required";
    $ot .='<span style="color:red;">* </span>';
    }else if($type_input == "null"){
         $ot .='<span style="color:green;">* </span>';
    }
    else if($type_input == "no"){
         $ot .='';
    }
    $ot .= $text.'</label>';
    $ot .='
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
  <div class="panel-body no-padding">
  <textarea rows="'.$rows.'" cols="'.$cols.'" name="'.$name.'" class="'.$class.'" '.$add_required.' title="'.$text.'" '.$more.'>
  '.((isset($_POST[$name]) ? $_POST[$name] : $value)).'
  </textarea>
  </div>
  </div>
  </div>';
     }else if($type_form=="above"){
  $ot .='<div class="form-group"><label for="input-file-now">';
   if($type_input == "required"){
       $add_required = "required";
    $ot .='<span style="color:red;">* </span>';
    }else if($type_input == "null"){
         $ot .='<span style="color:green;">* </span>';
    }
    else if($type_input == "no"){
         $ot .='';
    }
    $ot .= $text.'</label>';
    $ot .='
  <div class="panel-body no-padding">
  <textarea rows="'.$rows.'" cols="'.$cols.'" name="'.$name.'" class="'.$class.'" '.$add_required.' title="'.$text.'" '.$more.'>
  '.((isset($_POST[$name]) ? $_POST[$name] : $value)).'
  </textarea>
  </div>
  </div>';
     }
  return $ot;
}
function create_button($type,$name,$class="",$text,$icon=null,$more=null){
  $ot="<button type='".$type."' name='".$name."' class='".$class."' ".$more.">";
  if(!empty($icon)){
    $ot .='
    <i class="'.$icon.'"></i>';
  }
  if(!empty($text)){
  $ot .= " ".$text;
}

  $ot .='</button>';
  return $ot;
}
function create_alert($color,$text,$more=""){
  $ot ='
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="alert alert-'.$color.'" '.$more.'>
  <button type="button" class="close" data-dismiss="alert"
  aria-hidden="true">&times;</button>
  <h6><b>'.$text.'</b></h6>
  </div>
  </div>';
  return $ot;
}
function create_menu($link,$icon,$text,$more=""){
  $ot ='<li>
   <a class="waves-effect waves-dark" href="'.$link.'" aria-expanded="false" '.$more.'>';
     if(!empty($icon)){
  $ot .=' <i class="'.$icon.'"></i>';
}
 if(!empty($text)){
$ot .='  <span class="hide-menu">'.$text.' </span>';
}
   $ot .='</a></li>';

  return $ot;
}

function search_form($name,$text_name, $text_placeholder, $button_name, $button_text)
{
  $output = '<center>'.section($name).'</center>
   <form method="POST">
       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
           <div class="form-group">
                <div class="controls">
                    <div class="input-group">
                        <input type="text" name="'.$text_name.'" class="form-control" placeholder="'.$text_placeholder.'">
                        <div class="input-group-append">
                            <button class="btn btn-danger" name="'.$button_name.'" type="submit"><i class="fas fa-search"></i> '.$button_text.'</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  ';
  return $output;
}
function get_pager($date,$line1,$line2){
  $ot ='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
  if(!empty($date)){
    if(!empty($line1)){
    $ot .= '<hr>';
  }
    $ot .= $date;
  if(!empty($line2)){
    $ot .= '<hr>';
  }
}
$ot .='</div>';
echo $ot;
}
function get_response($response,$status="",$icon="",$more=""){
  $ot ="";
  if(empty($status)){
      $status = "info";
  }else if($status == "error"){
      $status = "warning";
  }else if($status == "true"){
   $status = "success";
  }else if($status == "flase"){
   $status = "danger";
  }else{
    $status = $status;
  }
   if(empty($icon)){
    $icon = "<i class='fa fa-check'></i>";
  }else if($icon == "error"){
      $icon = "<i class='fa fa-exclamation-triangle'></i>";
  }else if($icon == "true"){
      $icon = "<i class='fa fa-check'></i>";
  }else if($icon == "flase"){
      $icon = "<i class='ti-close'></i>";
  }else{
      $icon = $icon;
  }
  if(is_array($response)){
    foreach ($response as $err){
        $ot .= $icon.$err."<br>";
    }
    echo create_alert($status,$ot,$more);
  }else{
      echo create_alert($status,$icon.$response,$more);
  }
}
function section($name,$hr1="",$hr2=""){
return $hr1.'<h3>'.$name.'</h3>'.$hr2;
}
function tag_a($link,$class,$text,$icon=null,$more=null){
  $ot=' <a href="'.$link.'" class="'.$class.'" '.$more.'>';
  if(!empty($icon)){
    $ot .='
    <i class="'.$icon.'"></i>';
  }
  if(!empty($text)){
  $ot .= " ".$text;
  }
  $ot .='</a>';
  return $ot;
}
function create_td($data_title,$class="",$text,$more=""){
  return "<td data-title='".$data_title."' class='".$class."' ".$more.">$text</td>";
}
function create_th($class,$text,$more=""){
  return "<th class='".$class."' ".$more.">$text</th>";
}
function create_tr($val,$class="",$more=""){
    if($val == "start"){
        if(!empty($class)){
        return "<tr class=".$class." $more>";
        }else{
             return "<tr $more>";
        }
    }else if($val == "end"){
       return "</tr>";
    }
}
function window_location($link){
  echo "<script type='text/javascript'>location.href='".$link."';</script>";
}

function window_location_time($link,$time){
  echo "<script type='text/javascript'>setTimeout(function(){location.href='".$link."'} , ".$time.");</script>";
}

function not_role(){
  echo window_location(site_op("link_page_is_not_role"));
}
function created_at($date){
  return sprintf("%s<br>( %s )",
  convert_date($date),
  datetime_to_string_ago($date));
}
function Last_activ($date){
  return sprintf("%s<br>( %s )",
  convert_just_date_text($date),
  datetime_to_string_ago($date));
}

 ?>

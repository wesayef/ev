<?php
function datetime_to_string_Diff($date1, $date2)
{
  $diff = strtotime($date2) - strtotime($date1);
  switch($diff):
    case $diff <= 60;
    return 'الآن';
    case $diff >= 60 && $diff < 3600;
    return (round($diff/60) == 1) ? '  دقيقة' : '  '.NUM_with_Text(round($diff/60),
    "دقيقة",
    "دقيقة واحدة",
    "دقيقتان",
    "دقائق",
    "");
    case $diff >= 3600 && $diff < 86400;
    return (round($diff/3600) == 1) ? '  ساعة' : '  '.NUM_with_Text(round($diff/3600),
    "ساعة",
    "ساعة واحدة",
    "ساعتان",
    "ساعات",
    "");
    case $diff >= 86400 && $diff < 604800;
    return (round($diff/86400) == 1) ? '  يوم' : '  '.NUM_with_Text(round($diff/86400),
    "يوم",
    "يوم واحد",
    "يومان",
    "أيام",
    "");
    case $diff >= 604800 && $diff < 2600640;
    return (round($diff/604800) == 1) ? '  أسبوع' : '  '.NUM_with_Text(round($diff/604800),
    "إسبوع",
    "إسبوع واحد",
    "إسبوعين",
    "إسابيع",
    "");
    case $diff >= 2600640 && $diff < 31207680;
    return (round($diff/2600640) == 1) ? '  شهر واحد' : '  '.NUM_with_Text(round($diff/2600640),
    "شهر",
    "شهر واحد",
    "شهرين",
    "أشهر",
    "");
    case $diff >= 31207680;
    return (round($diff/31207680) == 1) ? '  سنة' : '  '.NUM_with_Text(round($diff/31207680),
    "سنة",
    "سنة واحدة",
    "سنتين",
    "سنوات",
    "");
  endswitch;
}

function datetime_to_string_ago($datetime)
{

  $datetime =  strtotime($datetime) ? strtotime($datetime) : $datetime;
  $time  = time() - $datetime;
  switch($time):
    case $time <= 60;
    return 'الآن';
    case $time >= 60 && $time < 3600;
    return (round($time/60) == 1) ? ' مُنذ دقيقة' : ' منذُ '.NUM_with_Text(round($time/60),
    "دقيقة",
    "دقيقة",
    "دقيقتان",
    "دقائق",
    "");
    case $time >= 3600 && $time < 86400;
    return (round($time/3600) == 1) ? ' مُنذ ساعة' : ' منذُ '.NUM_with_Text(round($time/3600),
    "ساعة",
    "ساعة",
    "ساعتان",
    "ساعات",
    "");
    case $time >= 86400 && $time < 604800;
    return (round($time/86400) == 1) ? ' مُنذ يوم' : ' منذُ '.NUM_with_Text(round($time/86400),
    "يوم",
    "يوم",
    "يومان",
    "أيام",
    "");
    case $time >= 604800 && $time < 2600640;
    return (round($time/604800) == 1) ? ' مُنذ أسبوع' : ' منذُ '.NUM_with_Text(round($time/604800),
    "أسبوع",
    "أسبوع",
    "أسبوعين",
    "أسابيع",
    "");
    case $time >= 2600640 && $time < 31207680;
    return (round($time/2600640) == 1) ? ' مُنذ شهر' : ' منذُ '.NUM_with_Text(round($time/2600640),
    "شهر",
    "شهر",
    "شهرين",
    "أشهر",
    "");
    case $time >= 31207680;
    return (round($time/31207680) == 1) ? ' مُنذ سنة' : ' منذُ '.NUM_with_Text(round($time/31207680),
    "سنة",
    "سنة",
    "سنتين",
    "سنوات",
    "");
  endswitch;

}
function convert_date($date, $custom_format = '' , $lang = "ar")
{
  if(!empty($date)){
    if(!empty($custom_format))
    {
      $format = $custom_format;
    }else {
      $format = "_Y/_m/_d هـ (d-m-Yم) h:i a";
    }
    $convert_date = (new hijri\datetime(  $date, NULL, 'ar' ))->format($format);
  }else{
    $convert_date = '-';
  }
  return $convert_date;
}
?>

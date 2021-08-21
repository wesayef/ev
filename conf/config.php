<?php
session_start();
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Riyadh");

include_once 'hijri.class.php';
include_once "encrypt_fun.php";
include_once "date_fun.php";
include_once "sys_fun.php";
include_once __DIR__ .'/composer/vendor/autoload.php';

// use Kreait\Firebase\Database\RuleSet;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
// use Kreait\Firebase\Util\JSON;
// use Kreait\Firebase\Database;
// use Kreait\Firebase\Database\Query;
// use Kreait\Firebase;

//

$url = "https://arshedni-5d126-default-rtdb.firebaseio.com/";
$serviceAccount = ServiceAccount::fromJsonFile(__DIR__ .'/arshedni.json');


  $firebase = (new Factory)
  ->withServiceAccount($serviceAccount)
  ->withDatabaseUri($url)
  ->create();
  $conn = $firebase->getDatabase();
?>

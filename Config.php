<?php
error_reporting(0);

$dbtype="mysql";
$Server="10.183.188.103";
//$Server="10.183.188.112";
//$Server="192.168.5.130";
$UserID="root";
$Password="nopass";
$Database="gp_voice_social_service";
$COMMONPHP="../../lib/common.php";
$CALLFLOWLIB="../../lib/CallFlowLib.php";

$FileServer="10.183.188.111";
$Title="GP Voice Chat: Nick Shuffling Panel";


$CMS_URL_PREFIX = "http://localhost/cms_test/";
$CMS_RequestSourceID="GPVSDP";
$CMS_UserID = "Admin";
$CMS_Password = "1234";

$SMS_URL="http://10.183.188.103/smsgw_sendsms/SendSingleSMS.php?UserName=admin&Password=1234&Sender=2828&text=";
?>
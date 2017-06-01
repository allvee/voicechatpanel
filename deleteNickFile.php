<?php
session_start();
error_reporting(0);
require_once 'Config.php';
require_once $COMMONPHP;

if ($_SESSION["IsLoggedIn"] != 'YES')
{
    header("Location: index.php"); /* Redirect browser */
    exit("You are not AUTHENTIC!!! ");
}

$dostid = $_REQUEST['dostid'];
$msisdn = $_REQUEST['msisdn'];
//echo $dostid;
//echo $msisdn;
$cn = connectDB();
$qry="SELECT profile FROM gp_voice_social_service.user WHERE msisdn='$msisdn' AND voice_chat_id='$dostid' ORDER BY USERID DESC LIMIT 1";

$rs = Sql_exec($cn,$qry);

$dir = Sql_GetField($rs,'profile');
//echo $dir;
$qry1="update gp_voice_social_service.user set profile=NULL  where voice_chat_id='$dostid' and msisdn='$msisdn' AND  profile='$dir'";
//echo $qry1; 
if(Sql_exec($cn,$qry1)){
    echo  "Nick Delete Successful!";
}
else
    echo "Not deleted!";
ClosedDBConnection($cn);

?>
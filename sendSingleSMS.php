<?php
error_reporting(0);
require_once 'sdpSMS_service_config.php';
require_once $COMMONPHP;
require_once 'service_config.php';

$cn = connectDB();
set_time_limit(0);
$sender = $_GET['port'];
$message = $_GET['msg'];
$msisdn = $_GET['mn'];
$serviceName = $_GET['ServiceName'];
$TON = $_GET['TON'];
$NPI = $_GET['NPI'];
$type= $_GET['type'];
//echo "Type".$type;
//exit;
$coding = $_GET['coding'];

$reply = "";

//if message is blank or more than 160 char or message contain special charecter or sender mobile number is blank or more than 13 or less than 10
if (($msisdn == NULL) || ($msisdn == "") || (strlen($msisdn) > 13) || (strlen($msisdn) < 10) ) {
    $reply = "Incomplete Information in text parameter";
} else {


    $sc = $sender;

    $flag = 0;

    $mn = "880" . substr($msisdn, -10);
    $msg = $message;
    $msg = str_replace("'", "''", $msg);
    $fields = "srcMN, dstMN,ServiceName, msg, writeTime, sentTime,srcTON,srcNPI, msgStatus, retryCount,MsgType,srcAccount,schedule";
    //echo $fields;

    if ($TON == '')
        $TON = $TONDefault;
    if ($NPI == '')
        $NPI = $NPIDefault;
    if ($type == '')
        $type = $typeDefault;
    if ($coding == '')
        $coding = $codingDefault;

    $values = "'$sc','$mn','$serviceName','$msg',now(),now(),'$TON','$NPI','QUE',0, '$type','$UserName',now()";

    $insertqry = "insert into sdp_smsoutbox" . " (" . $fields . ") values(" . $values . ")";
    echo $insertqry; exit;
    $ret = Sql_exec($cn, $insertqry);
    //$ret=mysqli_query($cn, $sql);
    //echo $ret;

    if ($ret <> 1) {
        //exec_query("ROLLBACK",$cn);
        $flag = 1;
       // break;
    }

    if ($flag == 0) {
        //echo "success";
        // exec_query("COMMIT",$cn);
        $reply = "Successfully inserted to smsoutbox";
        //echo $reply;
    } else {
        $reply = "Error: $ret";
    }

    //echo $reply;
}
echo $reply . " ok";
?>
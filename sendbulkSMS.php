<?php
session_start();
error_reporting(0);
require_once 'Config.php';
require_once $COMMONPHP;
//require_once 'service_config.php';
$cn	= connectDB();
$msisdn = $_REQUEST['msisdn'];
$COUNTRY_SHORT_CODE='880';
if ($_SESSION["IsLoggedIn"] != 'YES')
{
    header("Location: index.php"); /* Redirect browser */
    exit("You are not AUTHENTIC!!! ");
}
?>
<?php
if(isset($_POST['submit']))
{
   if(!empty($_POST['check_list'])) 
   {

    // Loop to store and display values of individual checked checkbox.
    foreach($_POST['check_list'] as $selected) {
	echo "<p>".$selected ."</p>";
	$number[]=$selected;
  	
	}
	//first deleting from database
		 $queryDelete="delete from sms_msisdn";
		 $resultDelete=Sql_exec($cn,$queryDelete);
	 foreach ($number as $num)
     {
	    
		 
		 $queryInsert="INSERT INTO sms_msisdn(msisdn) VALUES('$num')";
		 $resultInsert=Sql_exec($cn,$queryInsert);
	  }
	  ClosedDBConnection($cn);
   }
   else
   {
      echo "<b>Please Select Atleast One Option.</b>";
   }
}
?>
<html>
<head>
    <link href="css/default.css" rel="stylesheet" type="text/css"/>
    <script language="JavaScript" src="./js/global.js" type="text/javascript"></script>
    <script language="javascript">
        window.resizeTo(600, 480);
    </script>
</head>

<body class="container">

<h3>
    <center>Send SMS to the user</center>
</h3>

<br>

<form action="" method="post" name="send" align="center">

    <div class="form-group">
        <label class="control-label">Select an option</label>
        <select onchange="choseSMSContent(this)" id="contentSelect" style="width: 250px;" name="smsSelection" class="form-control">
            <option value="">Select content</option>
            <option value="incomplete">Incomplete Nick</option>
            <option value="Poor_nick">Poor Nick</option>
            <option value="ncorrect_age_sex">Incorrect age/sex</option>
			<option value="blank_template">Blank Template</option>
        </select>
    </div>

    <div class="form-group">

        <label class="control-label" style="margin-right: 10px">Content:</label>
        <textarea class="form-control" type="text" id="smsContent" name="textContent" value="" disabled "></textarea>

    </div>
    <br>

    <div  class="sendButton"><input type="submit" value="Send" name="send"></div>
</form>

<?php

if (isset($_REQUEST['send'])) {
    $text = $_REQUEST['smsSelection'];
	$smsText = $_REQUEST['textContent'];
	if($text=='incomplete'){
		$msg ='Apnar opekkhay boshe ache onek bondhu,kintu apnake khuje pacchena.2828 dial kore 7 chepe profileti update korun ar khuje nin moner moto bondhu.';
	    //$msg=urlencode($msg);
	}
	else if($text=='Poor_nick'){
		$msg='Tumi ke ta jodi nai janao tahole bondhura khuje pabe kivabe? Tai 2828 dial kore 3 chapo ar profileti thikmoto record kore janiye dao tumi ke.';
	    //$msg=urlencode($msg);
	}
	else if($text=='ncorrect_age_sex'){
	    $msg ='Bondhu khuje pacchen na? 2828 e dial korun ar 7 chepe janiye din apni chele naki meye ar apnar boyosh. Bondhurai khuje nibe apnake';
	    //$msg=urlencode($msg);
	}
	else if($text=='blank_template'){
	    $msg =$smsText;
	}
	if ($text == "") {
        echo "Please Select a content";
    } else {
   
	 $msg=urlencode($msg);
     $cn	= connectDB();
	 $query = "SELECT msisdn FROM sms_msisdn";
                          $result = Sql_exec($cn, $query);
                          while ($row = Sql_fetch_array($result)) 
						  {
                              $msisdn = Sql_Result($row, "msisdn");
                             $url=$SMS_URL.$COUNTRY_SHORT_CODE.$msisdn."|".$msg;
							 //echo "<p>".$url."</p>";
	                         //$url=str_replace(" ","+",$url);
	                         echo file_get_contents($url); 
                        
                          }
						 ClosedDBConnection($cn);
	
    }
}
?>
</body>
</html>
<?PHP
	session_start();
   error_reporting(0); 
   require_once 'Config.php';
   require_once $COMMONPHP;

	if ($_SESSION["IsLoggedIn"] != 'YES')
	{
		header("Location: index.php"); /* Redirect browser */
		exit("You are not AUTHENTIC!!! ");
	}

	$cn = connectDB();
	 $dostid=$_POST['dostid']; 
	 $mobile_no=$_POST['mobileno']; 

	$sex=$_POST['sex']; 
	$age=$_POST['age'];

	$regdate=$_POST['regdate']; 
	$popularity=$_POST['popularity'];
	$BusyStatus=$_POST['BusyStatus'];
	
	$qry="UPDATE gp_voice_social_service.user SET popularity='$popularity',gender=$sex,age_group='$age ', busy_status='$BusyStatus', registration_date='$regdate' WHERE voice_chat_id='$dostid' AND msisdn='$mobile_no'";
//echo $qry;

		if(Sql_exec($cn,$qry))
		{
		?>
		&nbsp;&nbsp;<span class="succMsg"><font size="+1">Successfully Updated</font></span> 
		
		<?php
		}
	else
	{
		?>
		&nbsp;&nbsp;<span class="errMsg"><font size="+1">Update Process Failed</font></span>
		<?php
	}
ClosedDBConnection($cn);	


?>	




<script language="javascript">
window.resizeTo(350,320);
</script>

<link href="css/default.css" rel="stylesheet" type="text/css" />


<div class="edittablebody" id='popwindow'>

<table width="100%" cellpadding="0" cellspacing="1" height="200" style="border-collapse: collapse" bordercolor="#FF9933" border="1">
  <tbody>
    <tr class="datagridheader">
      <td height="26" colspan="2" align="center">VOICE CHAT DETAILS</td>
    </tr>
    <tr>
      <td align="right" width="40%">&nbsp;Mobile No:</td>
      <td style="" align="left" >&nbsp;&nbsp;<?php echo $mobile_no; ?></td>
    </tr>
    <tr>
      <td align="right">&nbsp;Sex:</td>
      <td style="" align="left" >&nbsp;&nbsp;<?php echo $sex; ?></td>
    </tr>
	<tr>
      <td align="right">&nbsp;Age:</td>
      <td style="" align="left">&nbsp;&nbsp;<?php echo $age; ?></td>
    </tr>
	<tr>
		  <td align="right">Popularity:</td>
		  <td style="" align="left"  ><?php echo $popularity; ?> </td>
		</tr>
	<tr>
		  <td align="right">BusyStatus:</td>
		  <td style="" align="left"  ><?php echo $BusyStatus; ?></td>
		</tr>
    <tr>
      <td colspan="2" bgcolor="#FF9933"></td>
    </tr>
	
		<tr>
		  <td align="right">Registration Date:</td>
		  <td style="" align="left"  ><?php echo $regdate; ?></td>
	     
		</tr>
		
  </tbody>
</table>
</div>


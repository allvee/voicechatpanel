<?PHP
session_start();
error_reporting(0);
require_once 'Config.php';
require_once $COMMONPHP;
require_once 'service_config.php';

if ($_SESSION["IsLoggedIn"] != 'YES')
{
	header("Location: index.php"); /* Redirect browser */
	exit("You are not AUTHENTIC!!! ");
}

	$dostid = $_GET['dostid'];
	$mobileno = $_GET['mobileno'];
	$sex=$_GET['sex'];
	$age=$_GET['age'];
	$regdate= $_GET['RegDate'];
	$popularity=$_GET['popularity'];
	$BusyStatus=$_GET['BusyStatus'];
	//$popularity="-900000";
$call_outgoing="SELECT call_time FROM calllog WHERE ano='$mobileno' ORDER BY call_time DESC LIMIT 1";
$call_incoming="SELECT call_time FROM calllog WHERE bno='$mobileno' ORDER BY call_time DESC LIMIT 1";
$outgoing='';
$incoming='';
$cn = connectDB();
$rs = Sql_exec($cn,$call_outgoing);
		while($dt = Sql_fetch_array($rs))
		{
		$outgoing = $dt['call_time'];
		}
ClosedDBConnection($cn);	
$cn = connectDB();
$rs1 = Sql_exec($cn,$call_incoming);

		while($dt1 = Sql_fetch_array($rs1))
		{
		$incoming = $dt1['call_time'];
		}
ClosedDBConnection($cn);
/**/	
?>
<script language="javascript">
window.resizeTo(350,350);
</script>
<link href="css/default.css" rel="stylesheet" type="text/css" />


<div class="edittablebody" id='popwindow'>
<form action="edit_reg_readonly.php" method="post" name="main">
<input type="hidden" name="dostid" value="<?php echo $dostid; ?>" />
<input type="hidden" name="mobileno" value="<?php echo $mobileno; ?>" />
<input type="hidden" name="sex" value="<?php echo $sex; ?>" />
<input type="hidden" name="age" value="<?php echo $age; ?>" />
<table width="100%" cellpadding="0" cellspacing="1" height="200" style="border-collapse: collapse" bordercolor="#FF9933" border="1">
  <tbody>
    <tr class="datagridheader">
      <td height="26" colspan="2" align="center">VOICE CHAT DETAILS</td>
    </tr>
    <tr>
      <td align="right" width="40%">&nbsp;Mobile No:</td>
      <td style="" align="left"  >&nbsp;&nbsp;<?php echo $mobileno ; ?></td>
    </tr>
    <tr>
      <td align="right">&nbsp;Sex:</td>
	  <td style="" align="left"  >&nbsp;&nbsp;<?php echo $sex; ; ?></td>
    </tr>
	<tr>
      <td align="right">&nbsp;Age:</td>
       <td style="" align="left"  >&nbsp;&nbsp;<?php echo $age; ; ?></td>
    </tr>
	<tr>
		  <td align="right">Popularity:</td>
			<td style="" align="left"  >&nbsp;&nbsp;<?php echo $popularity; ; ?></td>			
		</tr>
    <tr>
      <td colspan="2" bgcolor="#FF9933"></td>
    </tr>
	
		<tr>
		  <td align="right">Registration Date:</td>
		  <td style="" align="left"  >&nbsp;
	      <input type="text" name="regdate" value="<?php echo $regdate; ?>" class="newTextBox" /></td>
		</tr>
			<tr>
		  <td align="right">Last Outgoing:</td>
			<td style="" align="left"  >&nbsp;&nbsp;<?php echo $outgoing; ; ?></td>			
		</tr>
		<tr>
		  <td align="right">Last Incoming:</td>
			<td style="" align="left"  >&nbsp;&nbsp;<?php echo $incoming; ; ?></td>			
		</tr>
    <tr>
		<tr>
		  <td colspan="2" align="center">
			
			<input type="button" name="btnClose" value="Close" class="StBtn" onClick="window.close();" />
				  
		  </td>
		</tr>
  </tbody>
</table>
</form>
</div>

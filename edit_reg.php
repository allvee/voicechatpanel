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

?>
<script language="javascript">
window.resizeTo(350,320);
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
      <td style="" align="left"  >&nbsp;
		  <select name="sex">
			  <?php
			  foreach($Gender as $g) {
				  $selected=($g==$sex)?"selected":"";
				  ?>
				  <option <?php echo $selected;?> value="<?php echo $g;?>"><?php echo array_search($g, $Gender); ?></option>
				  <?php
			  }
			  ?>
		  </select>
	  </td>
    </tr>
	<tr>
      <td align="right">&nbsp;Age:</td>
      <td style="" align="left"  >&nbsp;
		  <select name="age">
			  <?php
			  foreach($ageCategory as $c) {
				  $selected=($age==$c)?"selected":"";
				  ?>
				  <option <?php echo $selected;?> value="<?php echo $c; ?> " > <?php echo array_search($c, $ageCategory); ?></option>
				  <?php
			  }
			  ?>
		  </select	  </td>
	  </td>
    </tr>
	<tr>
		  <td align="right">Popularity:</td>
		  <td style="" align="left"  >&nbsp;
	      <input type="text" name="popularity" value="<?php echo $popularity; ?>" class="newTextBox" /></td>
		</tr>
	<tr>
		  <td align="right">BusyStatus:</td>
		  <td style="" align="left"  >&nbsp;
	      <input type="text" name="BusyStatus" value="<?php echo $BusyStatus; ?>" class="newTextBox" /></td>
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
		  <td colspan="2" align="center">
			<input type="Submit" name="Submit" value="Update" />&nbsp;&nbsp;
			<input type="button" name="btnClose" value="Close" class="StBtn" onClick="window.close();" />
				  
		  </td>
		</tr>
  </tbody>
</table>
</form>
</div>

<?php
session_start();

error_reporting(0); 
require_once 'Config.php';


$usrID = $_POST['usrId'];
$pass = $_POST['pass'];
$show="";

if(isset($usrID))
	$_SESSION['usr'] = $usrID;
if(isset($pass))
	$_SESSION['pass'] = $pass;

 $usr = $_SESSION['usr'];
 $pss = $_SESSION['pass'];



if(($usr!="ADMIN" || $usr!="admin") && $pss!='1234')//if(strtoupper($usr)!="ADMIN" and strtoupper($pss)!='1234')
{
	exit("You are not AUTHENTIC!!! ");
}
else
	$_SESSION["IsLoggedIn"] = "YES";
$yr = date('Y');
$mn = date('m');
$dt = date('d');

?>
<html>
<title></title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}

.style3 {	font-size: 24px;
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
-->
</style>
<head>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="./js/global.js" type="text/javascript"></script>
  <SCRIPT LANGUAGE="JavaScript" SRC="js/CalendarPopup.js"></SCRIPT>
  <SCRIPT language="javascript" src="js/AnchorPosition.js"></SCRIPT>
  <SCRIPT language="javascript" src="js/date.js"></SCRIPT>
  <SCRIPT language="javascript" src="js/PopupWindow.js"></SCRIPT>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

  <SCRIPT LANGUAGE="JavaScript">
    var cal = new CalendarPopup();
  </SCRIPT>

</head>
<body>
<table width="100%" height="593" border="0" align="center" class="box1">
  <tr>
    <td colspan="3" align="center" bgcolor="" class="mainHead" height="100"><center>
      <span class="style3"><?php echo $Title;?>  </span>
    </center></p></td>
  </tr>
  <tr bgcolor="#FF0000">
    <td width='2%' height="21"><strong><font color='#0033FF'>Welcome
	</font></strong></td>
    <td width='98%' bgcolor="#FF0000">&nbsp;</td>
    <td width='2%'><div align='right'><font color='#FFFFFF'>
	<strong><a  href='logout.php'>Logout</a></strong></font></div></td>
  </tr>
  <tr valign="top">
    <td width="2%"><? //include "menu.php"; ?></td>
    <td width="98%" height="441">
	<?php include "dost_list.php"; ?>
	</td>

    <td width="2%">&nbsp;</td>
  </tr>
  <tr valign="top" >
    <td height="21" colspan="3" class="footer"><div align="center">Copyright &copy; 2009 &nbsp;<a href="http://www.ssd-tech.com" title="Official Webside" target="_blank" id="menu">Systems Solutions &amp; Development Technologies Ltd.</a></div></td>
  </tr>
</table>


</body>
</html>
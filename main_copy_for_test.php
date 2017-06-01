<?php
session_start();

error_reporting(0); 
require_once 'Config.php';


echo "userid=".$usrID = $_POST['usrId'];
echo "<br />Pass=".$pass = $_POST['pass'];
$show="";
echo "<br />";
if(isset($usrID))
	$_SESSION['usr'] = $usrID;
if(isset($pass))
	$_SESSION['pass'] = $pass;
var_dump($_SESSION);
 $usr = $_SESSION['usr'];
 $pss = $_SESSION['pass'];

echo "<br />check1=".strtoupper($usr);
echo "<br />check2=".strtoupper($pss);

if(($usr!="ADMIN" || $usr!="admin") && $pss!='1234')
{
	echo "<br /> In User";
	//if(strtoupper($pss)!='1234')
		exit("You are not AUTHENTIC!!! ");
}
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
</head>
<body>
<table width="100%" height="593" border="0" align="center" class="box1">
  <tr>
    <td colspan="3" align="center" bgcolor="" class="mainHead" height="100"><center>
      <span class="style3"><?php echo $Title;?>  </span>
    </center></p></td>
  </tr>
  <tr bgcolor="#FF0000">
    <td width='12%' height="21"><strong><font color='#0033FF'>Welcome
	</font></strong></td>
    <td width='79%' bgcolor="#FF0000">&nbsp;</td>
    <td width='9%'><div align='right'><font color='#FFFFFF'>
	<strong><a  href='logout.php'>Logout</a></strong></font></div></td>
  </tr>
  <tr valign="top">
    <td width="12%"><? //include "menu.php"; ?></td>
    <td width="79%" height="441">
	<? include "dost_list.php"; ?>
	</td>

    <td width="9%">&nbsp;</td>
  </tr>
  <tr valign="top" >
    <td height="21" colspan="3" class="footer"><div align="center">Copyright &copy; 2009 &nbsp;<a href="http://www.ssd-tech.com" title="Official Webside" target="_blank" id="menu">Systems Solutions &amp; Development Technologies Ltd.</a></div></td>
  </tr>
</table>


</body>
</html>
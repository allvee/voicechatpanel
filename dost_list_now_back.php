<?PHP session_start(); 
require_once 'Config.php';
require_once $COMMONPHP;


?>
<html>
<title></title>

<link href="css/stylenew.css" rel="stylesheet" type="text/css">
<head>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="./js/global.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript" SRC="js/CalendarPopup.js"></SCRIPT>
<SCRIPT language="javascript" src="js/AnchorPosition.js"></SCRIPT>
<SCRIPT language="javascript" src="js/date.js"></SCRIPT>
<SCRIPT language="javascript" src="js/PopupWindow.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
	var cal = new CalendarPopup();
</SCRIPT>
</head>
<body>
<?PHP
error_reporting(0);
	 $d1=$_POST['date1'];
	 $d2=$_POST['date2'];
	$md1 = explode('/',$d1);
	$md2 = explode('/',$d2);
	 $mdt1 = $md1[2]."-".$md1[0]."-".$md1[1]." ". 00 .":". 00 .":". 00;
	 $mdt2 = $md2[2]."-".$md2[0]."-".$md2[1]." ". 23 .":". 59 .":". 59;
	
?>
<table width="90%" border="0" cellspacing="5" cellpadding="0" align="center">
  <tr>
    <td valign="top">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="chn">
	  <form action="" method="post" name="frmdost" id="frmdost">
	    <tbody>
	      
	      <tr>
	        <td height="28" colspan="8" align="center" class="headTitleRpt">SEARCH CRITERIA </td>
   </tr>   <tr>
     <td width="91" height="28" align="right" bgcolor="#99CF78" class="TitleText">Sex: </td>
        <td width="221" align="left" bgcolor="#DCF3D1" class="sptr1"><label>
          <select name="sex">
            <option></option>
            <option value="1">Male</option>
            <option value="2">Female</option>
            </select>
          
          </label>
          <!--<script language="JavaScript" type="text/javascript">document.all("sex").value=""</script>-->      </td>
        <td width="74" align="right" bgcolor="#A0DF82" class="TitleText">Age: </td>
        <td width="196" align="left" bgcolor="#DCF3D1" class="sptr1"><label>
          
          <select name="age">
            <option></option>
            <option value="1">15-24</option>
            <option value="2">24-35</option>
            <option value="3">35+</option>
            </select>
          
          </label>
         <!-- <script language="JavaScript" type="text/javascript">document.all("age").value=""</script>-->          </td>
	    <td width="100" align="right" bgcolor="#A0DF82" class="TitleText">Mobile No: </td>
        <td width="179" align="left" bgcolor="#DCF3D1" class="sptr1"><label>
          
          <input name="mobileno" type="text" size="10" />
          </label>
         <!-- <script language="JavaScript" type="text/javascript">document.all("mobileno").value=""</script>-->     </td>
	  </tr>
	      <tr>
	        <td align="right" bgcolor="#A0DF82" class="TitleText">Date From: </td>
        <td align="left" bgcolor="#DCF3D1" class="sptr1"><input name="date1" type="text" class="newTextBox" value="" size="15">
          <script language="JavaScript" type="text/javascript">document.all("date1").value=""</script>
          <A HREF="#" onClick="cal.select(document.forms['frmdost'].date1,'anchor1','MM/dd/yyyy'); return false;"
   NAME="anchor1" ID="anchor1"><img src="images/calendar_icon.png" width="25" height="25" border="0" align="absmiddle" /></A></td>
        <td align="right" bgcolor="#99CF78" class="TitleText">To: </td>
        <td align="left" bgcolor="#DCF3D1" class="sptr1"><input name="date2" type="text" class="newTextBox" id="date2" value="" size="15"> 
          <script language="JavaScript" type="text/javascript">document.all("date2").value=""</script>
          <a href="#" onClick="cal.select(document.forms['frmdost'].date2,'anchor1','MM/dd/yyyy'); return false;"
   name="anchor1" id="anchor1"><img src="images/calendar_icon.png" width="25" height="25" border="0" align="absmiddle" /></a></td>
	   <td width="100" align="right" bgcolor="#A0DF82" class="TitleText"></td>
        <td width="179" align="left" bgcolor="#DCF3D1" class="sptr1"><label>
          </label></td>
	  </tr>
	      <tr class="headTitleRpt">
	        <td height="24" colspan="8" align="center"><input name="Submit" type="submit" value="SEARCH"></td>
      </tr>
	      </tbody>
	    </form>
      </table>
	  <br>
	<?php
	
if(isset($_GET['pageno']) && $_GET['submit']!="SEARCH"){
	$pageno = $_GET['pageno'];
	}
	else{
		$pageno = 1;
	}
	$rowperpage = 25;
	$firstrow = ($pageno-1) * $rowperpage +1;
	$lastrow = $pageno * $rowperpage;
	  	 
	 
if(isset($_POST['Submit']) or $_GET['submit']=="Generate")
//if(isset($_POST['Submit']))
{	
		
		$cn = connectDB();
		//echo "test";
		
		$mobileno = $_REQUEST['mobileno'];
		$sex = $_REQUEST['sex'];
		$age=$_REQUEST['age'];
		$regdate1=$_REQUEST['date1'];
		$regdate2 = $_REQUEST['date2'];
		$md1 = explode('/',$regdate1);
		$md2 = explode('/',$regdate2);
		 $mdt1 = $md1[2]."-".$md1[0]."-".$md1[1]." ". 00 .":". 00 .":". 00;
		 $mdt2 = $md2[2]."-".$md2[0]."-".$md2[1]." ". 23 .":". 59 .":". 59;

		$cond = '';

		//$sex = (isset($_POST['sex']) and !empty($_POST['sex']))?trim($_POST['sex']):'';
		if($sex != ''){
			if($cond != '')
			        $cond .= " and gender = '$sex'";
			else
				$cond .= "gender = '$sex'";
		}
		//$age = (isset($_POST['age']) and !empty($_POST['age']))?trim($_POST['age']):'';
		if($age != ''){
			if($cond != '')
				$cond .= " and age like '$age'";
			else
				$cond .= "age like '$age'";
		}

		if($mobileno != ''){
			if($cond != '')
				$cond .= " and mobileno like '$mobileno'";
			else
				$cond .= "mobileno like '$mobileno'";
		}

		if($regdate1 != '' && $regdate2 != ''){
			if($cond != '')
				$cond .= " and (RegDate >= '$mdt1' and RegDate <= '$mdt2')";
			else
				$cond .= "(RegDate >= '$mdt1' and RegDate <= '$mdt2')";
		}
		
		//$orderBy=' RegDate desc';
	    $orderBy=' popularity desc';
	
		
		
	        //$qr="select DostID,Mobileno,Gender,Age,NickFile,RegDate,BusyStatus,popularity from (SELECT ROW_NUMBER() over (order by popularity desc) as rowno, DostID,Mobileno,Gender,Age,NickFile,RegDate,BusyStatus,popularity from [tempdostlist] ";

        $qr="SELECT DostID,Mobileno,Gender,Age,NickFile,RegDate,BusyStatus,popularity FROM tempdostlist ";

		if($cond != '') $qr .= " where $cond ";
	
		//$qr .= ")  a where rowno>=$firstrow and rowno<=$lastrow";
		$qr .= " order by $orderBy";
		$firstrow = $firstrow -1;
		$qr .= " LIMIT $firstrow,$lastrow";
		if($cond != '')
		 $qr1="select count(*) as total from tempdostlist where ";
		if($cond != '')$qr1 .= " $cond ";
		
	//echo $qr . '<br />' . $qr1;
		
?>
    <table width="100%" border="1" cellspacing="1" cellpadding="0" style="border-collapse: collapse" bordercolor="#FF9933" align="center">
      <b></b>
      <center>
        <tr align="center" class="headTitleRpt">
          <td width="13%"><b>DostId</b></td>          
		    <td width="17%"><b>MobileNo</b></td>
            <td width="8%"><b>Sex</b></td>
		    <td width="8%"><b>Age</b></td>
	        <td width="27%"><b>RegistrationDate</b></td>
			 <td width="19%"><b>Popularity</b></td>
			  <td width="27%"><b>BusyStatus</b></td>
		    <td width="19%"><b>Preview</b></td>
		    <td width="8%"><b>Edit</b></td>
			<!--<td width="8%"><b>-->
			             <?php 
						 //echo $qr;
						 ?>
			 <!--  </b></td>-->
	      </tr>
        </center>
	    <b></b>
      <?PHP
	  

	  $rs = Sql_exec($cn,$qr);
		
		while(Sql_fetch_array($rs))
		{
	
			
?>
      <tr align="center" class="textRpt">
        <td height="23"><?php echo $dostid = Sql_GetField($rs,'DostID'); ?></td>
          <td><?php echo $mn = Sql_GetField($rs,'Mobileno'); ?></td>
          <td><?php echo $sex1 = Sql_GetField($rs,'Gender');?></td>
          <td><?php echo $age1 = Sql_GetField($rs,'Age'); ?></td>
		  <td><?php echo $reg_date = Sql_GetField($rs,'RegDate'); ?></td>
		   <td><?php echo $popularity = Sql_GetField($rs,'popularity'); ?></td>
		   <td><?php echo $BusyStatus = Sql_GetField($rs,'BusyStatus'); ?></td>
		  <?php  $nickname = Sql_GetField($rs,'NickFile'); ?>
		 
        <td align="center"><a href="#" onClick="StartPlaying(350,200,'<?php echo $mn;?>');"><img src="images/speaker.jpg" alt="Preview" width="16" border="0"/></a>
		
		</td>
	      <td align="center"><a href="#" <?php echo "onclick=\"ShowDetails(470,460,'$dostid','$mn','$sex1','$age1','$reg_date','$popularity','$BusyStatus');\"" ?>><img src="images/ico_edit.gif" alt="Edit" width="15" border="0"></a>
		  
		  </td>
        </tr>
      <?PHP
		}/// While loop
?>
    </table>    <?PHP

	$rs1=Sql_exec($cn,$qr1);
	Sql_fetch_array($rs1);
	$totalcolumn = Sql_GetField($rs1,"total");		


$totalpage = ceil($totalcolumn/$rowperpage);
	echo "<br><center>";

	if($pageno>1){
//	cdrlogreport.php?textfield=$srcmn&checkbox=$chkbox&yr1=2008&mn1=10&dt1=16&yr2=2008&mn2=10&dt2=19&type=MMSG&Submit=Generate
		echo "<a href='main.php?submit=Generate&popularity=$popularity&BusyStatus=$BusyStatus&sex=$sex&age=$age&mobileno=$mobileno&date1=$regdate1&date2=$regdate2&pageno=1'>".'First'."</a> ";	
		$prev = ($pageno-1);
		echo "<a href='main.php?submit=Generate&popularity=$popularity&BusyStatus=$BusyStatus&sex=$sex&age=$age&mobileno=$mobileno&date1=$regdate1&date2=$regdate2&pageno=$prev'>".'Previous'."</a> ";		
	}
	else{
		echo "First Previous ";
	}
	
	for($i=1;$i<=$totalpage;$i++){
		if($pageno<=3){
			$startno=1;
			$endno=5;
		}
		elseif($pageno>=($totalpage-2)){
			$startno=$totalpage-4;
			$endno=$totalpage;
		}		
		else{
			$startno=$pageno-2;
			$endno=$pageno+2;
		}
		
		if($i>=$startno && $i<=$endno){
			if($i==$pageno){
			echo "<a href='main.php?submit=Generate&popularity=$popularity&BusyStatus=$BusyStatus&sex=$sex&age=$age&mobileno=$mobileno&date1=$regdate1&date2=$regdate2&pageno=$i'><b>".$i."</b></a> ";
			}
			else{
			echo "<a href='main.php?submit=Generate&popularity=$popularity&BusyStatus=$BusyStatus&sex=$sex&age=$age&mobileno=$mobileno&date1=$regdate1&date2=$regdate2&pageno=$i'>".$i."</a> ";		
			}
		}	
	}
	
	if($pageno<$totalpage)
	{
		$next=$pageno+1;
		echo "<a href='main.php?submit=Generate&popularity=$popularity&BusyStatus=$BusyStatus&sex=$sex&age=$age&mobileno=$mobileno&date1=$regdate1&date2=$regdate2&pageno=$next'>".'Next'."</a> ";
		echo "<a href='main.php?submit=Generate&popularity=$popularity&BusyStatus=$BusyStatus&sex=$sex&age=$age&mobileno=$mobileno&date1=$regdate1&date2=$regdate2&pageno=$totalpage'>".'Last'."</a> ";	
				
	}
	else{
		echo "Next Last ";
	}	
	echo "<br><br>";
	echo "Total Pages - ".$totalpage;
	echo "</center>";
}//////////////// IF submitted ///////////////////////////// 
ClosedDBConnection($cn);

?>	</td>
  </tr>
</table>

</body>
</html>
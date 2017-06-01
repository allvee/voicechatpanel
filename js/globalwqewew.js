
function goTo() 
{
	var SrcKey = document.getElementById('SrcKey').value;
	var SrcType = document.getElementById('SrcType').value;

	location.href="index.php?id=srch&SrcKey="+SrcKey+"&SrcType="+SrcType;
	
}


function display(msg) 
{
   return msg;
}

function showPopup(w,h)
{   
	var popUp = document.getElementById("popupcontent");
	popUp.style.top = "50px";   
	popUp.style.left = "200px";   
	popUp.style.width = w + "px";   
	popUp.style.height = h + "px";    
	popUp.style.visibility = "visible";
	//popUp.moveTo(x,y);
}

function popclose()
{
	var popUp = document.getElementById("popupcontent");
	popUp.style.visibility = "hidden";	
}

function StartPlaying(w,h,ct)
{   
	var play = window.open("play.php?id="+ct,"Window1","menubar=no,width="+w+",height="+h+",toolbar=no,location=no");
	play.moveTo(200,200);
	if(window.focus)
		play.focus();
}

function RBTPresent(w,h,ct)
{   
	var Show = window.open("CRBTDetails.php?id="+ct,"Window1","menubar=no,width="+w+",height="+h+",toolbar=no,location=no");
	Show.moveTo(200,200);
	if(window.focus)
		Show.focus();
}

function RBTDownload(w,h,ct)
{   
	var Show = window.open("CRBTDetails.php?id="+ct,"Window1","menubar=no,width="+w+",height="+h+",toolbar=no,location=no");
	Show.moveTo(200,200);
	if(window.focus)
		Show.focus();
}

function popStyle(w,h)
{
	var popUp = document.getElementById("mypop");
	popUp = popUp+'This'; 
	popUp.style.top = "50px";   
	popUp.style.left = "200px";   
	popUp.style.width = w + "px";   
	popUp.style.height = h + "px";    
	popUp.style.visibility = "visible";
	//popUp.document.close();
}
var winheight=50
var winwidth=50
var pop=null
step=1;

function popswindows(url,name,width,height) 
{
	url = 'play.php';
	name = 'test';
	width = 50;
	height = 100;
	if (!document.all)
 	{
  		if (!document.layers)
		{
   	 	paramstp="height="+height+",width="+width+",top=10"+",left=10,scrollbars=no,location=no"+",directories=no,status=no,menubar=no,toolbar=no,resizable=no"
    	pop=window.open(url,name,paramstp);
    		if (pop.focus){pop.focus();}
    		return;
    		}
   			else
   			{
    		LeftPosition=(screen.width)?(screen.width-width)/2:100;
			TopPosition=(screen.height)?(screen.height-height)/2:100;
    		paramstp="height="+height+",width="+width+",top="+TopPosition+",left="+LeftPosition+",scrollbars=no,location=no"+",directories=no,status=no,menubar=no,toolbar=no,resizable=no"
    		pop=window.open(url,name,paramstp);
    		loadpos=height/2-40
        	if(pop.focus){pop.focus();} 
    		return;
   			} 
 		} 
LeftPosition=(screen.width)?(screen.width-width)/2:100;
TopPosition=(screen.height)?(screen.height-height)/2:100;
paramstp="height="+winheight+",width="+winwidth+",top="+TopPosition+",left="+LeftPosition+",scrollbars=no,location=no"+",directories=no,status=no,menubar=no,toolbar=no,resizable=no"
pop=window.open(url,name,paramstp);
x = y = step
var z = 1

while (z < 200) 
{
pop.resizeBy (x, y)
z++;
}
	if(pop.focus)
	{
		pop.focus();
	} 
}
function ShowDetails(w,h,ct,cn,cprice,userid)
{   
	var Show = window.open("CRBTAssign.php?contentid="+ct+"&contentname="+cn+"&contentprice="+cprice+"&userid="+userid,"Window1","menubar=no,width="+w+",height="+h+",toolbar=no,location=no");
	Show.moveTo(200,200);
	if(window.focus)
		Show.focus();
}




function doGift()
{
	var toNum=document.getElementById('gftNumber').value;
	if(toNum==null || toNum=="")
	{
		alert("Presentee Number Required!!");
		document.getElementById('gftNumber').focus();
		return;
	}
	var tmp=location.href+"&cmd_param="+toNum;
	//var tmp=location.href+"&pgid=gift&cmd_param="+toNum;
	//="index.php?id=rcom&pgid=cprec&cmd_param="+selectedCP;
	location.href=tmp;
	//alert(tmp);

}


function deleteAssignedCRBT(crbtid,grpid,grptype)
{
	confirmed=confirm("Are You Sure?");
	if(confirmed)
		location.href = "index.php?id=my&pgid=dltasscrbt&cmd_param="+crbtid+"|"+grpid+"|"+grptype;
}

function deleteCRBTGroupnew(grpid)
{
	confirmed=confirm("Are You Sure?");
	if(confirmed)
		location.href = "index.php?id=my&pgid=delgrp&cmdparam="+grpid;
}

function modifyAssignedCRBT(crbtid,grpid,grptype,grpname)
{
	location.href = "index.php?id=my&pgid=mdfyasscrbt&cmd_param="+crbtid+"|"+grpid+"|"+grptype+"|"+grpname;
}

function SearchRBTCopy()
{
	var num=document.getElementById('fromSubscriber').value;
	if(num.length != 10){
		alert('Number should be of 10 digit.');
		document.getElementById('fromSubscriber').focus();
	}
	else
	{
		//alert('Number found '+num);
		location.href = "index.php?id=my&pgid=showcopy&cmd_param="+num;
	}
}

/*function SetAllCheckBoxes(FormName, AreaID, false);
	document.getElementById(selected).checked=true;
	document.forms[FormName].toupdate.value="1";
	document.forms[FormName].submit();
	return true;
}*/




function addGroupMemberPrompt(groupid,groupname)
{
	location.href = "index.php?id=my&pgid=addgrpmmbr&cmd_param="+groupid+"|"+groupname;
}
function deleteCRBTGroup(groupid)
{
	location.href = "index.php?id=my&pgid=delgrp&cmd_param="+groupid;
}
function modifyCRBTGroup(groupid)
{
	location.href = "index.php?id=my&pgid=modgrp&cmd_param="+groupid;
}
function deleteCRBTGroupMember(mmbrid,groupid,grpname)//
{
	location.href = "index.php?id=my&pgid=delgrpmmbr&cmd_param="+groupid+"|"+mmbrid+"|"+grpname;
}
function modifyCRBTGroupMember(mmbrid,groupid,grpname)//
{
	location.href = "index.php?id=my&pgid=modgrpmmbr&cmd_param="+groupid+"|"+mmbrid+"|"+grpname;
}
function listCRBTGroupMember(groupid,groupname)
{
	location.href = "index.php?id=my&pgid=crbtgrpmmbr&cmd_param="+groupid+"|"+groupname;
}


function validateGroupForm(groupForm)
{
	if(document.getElementById('groupName').value == "")
	{
		alert("Group Name should be given");
		document.getElementById('groupName').focus();
		return false;
	}
	/*if(document.getElementById('groupDescription').value == "")
	{
		alert("Description should be given");
		document.getElementById('groupDescription').focus();
		return false;
	}*/
	document.forms[groupForm].submit();
//	return true;
}
function confirmGroupModify(groupForm)
{
	if(document.getElementById('groupName').value == "")
	{
		alert("Group Name should be given");
		document.getElementById('groupName').focus();
		return false;
	}
	document.forms[groupForm].submit();
//	return true;
}
function addCRBTPrompt()
{
	location.href = "index.php?id=my&pgid=addcrbt";
}

function addCRBTUpl()
{
	location.href = "index.php?id=my&pgid=diyrbt";
}
function selectRBTNext(AreaID)
{
	var cmd_param=getAllCheckBoxeValue(AreaID);
	if(cmd_param != -1)
		location.href="index.php?id=my&pgid=crbtnxtstns&cmd_param="+cmd_param;
	else
		alert("You must select a RBT");
	/////////////////////////////////////////////////////////////////////
}
function selectEditRBTNext(AreaID,oldcrbtid,oldgroupid,oldgrouptype,oldgroupname)
{
	var cmd_param=getAllCheckBoxeValue(AreaID);
	if(cmd_param != -1){
		cmd_param="index.php?id=my&pgid=crbtnxtmdfystns&cmd_param="+cmd_param+oldcrbtid+"|"+oldgroupid+"|"+oldgrouptype+"|"+oldgroupname+"|";
		//alert(cmd_param);
		location.href=cmd_param;
	}
	else
		alert("You must select a RBT");
	/////////////////////////////////////////////////////////////////////
}

function addGroupMemberCfm(groupMmbrForm)
{
	if(document.getElementById('memberNo').value == "")
	{
		alert("Member No should be given");
		document.getElementById('memberNo').focus();
		return false;
	}
	document.forms[groupMmbrForm].submit();
//	return true;
}
function modGroupMemberCfm(groupMmbrForm)
{	
	if(document.getElementById('memberNo').value == "")
	{
		alert("Member No should be given");
		document.getElementById('memberNo').focus();
		return false;
	}
	document.forms[groupMmbrForm].submit();
//	return true;
}

/*** Validation functions ***/
function validate_string(input)
{
	if (input.value=="")
	{
		 alert ( "Please input colored field" );
		 input.focus();
		 input.style.background = 'Yellow';
	}
	else 
		input.style.background = 'White';
}

function isNull(input)
{
	if (input.value=="") {
		return false;
//		input.style.background = 'Yellow';
		//return input.value;
	}
	else {
//		input.style.background = 'White';
//		return input.value;
		return true;
	}
}

function validate_numeric(fdl)
{
    var RegExPattern =/^([0-9][0-9]*)$/;

	if (!fdl.value.match(RegExPattern))
	{
		return false;
	}
	return true;
}
function validate_float(fdl)
{
    var RegExPattern =/^([0-9]+\.?[0-9]*|\.[0-9])$/;

	if (!fdl.value.match(RegExPattern))
	{
		return false;
	}
	return true;
}
function checkExtensions(inFile) {

var extension = new Array();
//alert(theForm);
var fieldvalue = inFile.value;

extension[0] = ".wav";
/*extension[1] = ".gif";
extension[2] = ".jpg";
extension[3] = ".jpeg";
extension[4] = ".txt";
extension[5] = ".xls";
extension[6] = ".dat";
extension[7] = ".rar";
extension[8] = ".zip";*/

var thisext = fieldvalue.substr(fieldvalue.lastIndexOf('.'));
for(var i = 0; i < extension.length; i++) 
{
	if(thisext == extension[i]) 
	{ 
		return true; 
	}
}
//alert("Soory you cannot upload this file.");
return false;
}
///
function showHide(comid)
{
	var comp=document.getElementById(comid);
	if(comp.style.visibility=='visible')
		comp.style.visibility ='hidden';
	else
		comp.style.visibility ='visible';
}

function confirmCRBTAssign(thisFrom)
{
	if(document.getElementById('rbtType')=='dvpersonal' && (document.getElementById('personal')==null || document.getElementById('personal')==""))
	{
		alert("Personal Number Required!");
		document.getElementById('personal').focus();
		return false;
	}
	//alert("OK");
	document.forms[thisFrom].submit();
}

function backPrevAdd1()
{
	location.href = "index.php?id=my&pgid=crbtstns";
}

function backPrevAdd2()
{
	location.href = "index.php?id=my&pgid=addcrbt";
}

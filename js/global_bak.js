
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

function StartPlaying(w,h,mn)
{   
	//var play = window.open("play.php?mobileno="+mn,"Window1","menubar=no,width="+w+",height="+h+",toolbar=no,location=no");
	var play = window.open("play.php?mobileno="+mn,"Window1","menubar=no,width="+w+",height="+h+",toolbar=no,location=no");
	play.moveTo(200,250);
	if(window.focus)
		play.focus();
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
function ShowDetails(w,h,dost,mn,sex,age,regdate,popularity,BusyStatus)
{   
	var Show = window.open("edit_reg.php?dostid="+dost+"&mobileno="+mn+"&sex="+sex+"&age="+age+"&RegDate="+regdate+"&popularity="+popularity+"&BusyStatus="+BusyStatus,"Window1","menubar=no,width="+w+",height="+h+",toolbar=no,location=no");
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











function validateForm(groupForm)
{
	if(document.getElementById('sub_no').value == "")
	{
		alert("Subscriber no should be given");
		document.getElementById('sub_no').focus();
		return false;
	}
	var num=document.getElementById('sub_no').value;
	if(num.length != 11){
		alert('Number should be of 11 digit.');
		document.getElementById('sub_no').focus();
		return false;
	}
	document.forms[groupForm].submit();

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





<script language="javascript">
window.resizeTo(350,280);
</script>


<!-- New Add For Media player-->
<SCRIPT language="JavaScript">
	<!--`
	// JavaScripts used for detecting RealPlayer plugin
	// initialize global variables
	var detectableWithVB = false;
	var pluginFound = false;

	function detectReal() {
	    pluginFound = detectPlugin('RealPlayer');
	    // if not found, try to detect with VisualBasic
	    if(!pluginFound && detectableWithVB) {
		pluginFound = (detectActiveXControl('rmocx.RealPlayer G2 Control') ||
			       detectActiveXControl('RealPlayer.RealPlayer(tm) ActiveX Control (32-bit)') ||
			       detectActiveXControl('RealVideo.RealVideo(tm) ActiveX Control (32-bit)'));
	    }	
	  //  return redirectCheck(pluginFound, redirectURL, redirectIfFound);
	  	return pluginFound;
	}

	function detectPlugin() {
	    // allow for multiple checks in a single pass
	    var daPlugins = detectPlugin.arguments;
	    // consider pluginFound to be false until proven true
	    var pluginFound = false;
	    // if plugins array is there and not fake
	    if (navigator.plugins && navigator.plugins.length > 0) {
		var pluginsArrayLength = navigator.plugins.length;
		// for each plugin...
		for (pluginsArrayCounter=0; pluginsArrayCounter < pluginsArrayLength; pluginsArrayCounter++ ) {
		    // loop through all desired names and check each against the current plugin name
		    var numFound = 0;
		    for(namesCounter=0; namesCounter < daPlugins.length; namesCounter++) {
			// if desired plugin name is found in either plugin name or description
			if( (navigator.plugins[pluginsArrayCounter].name.indexOf(daPlugins[namesCounter]) >= 0) || 
			    (navigator.plugins[pluginsArrayCounter].description.indexOf(daPlugins[namesCounter]) >= 0) ) {
			    // this name was found
			    numFound++;
			}   
		    }
		    // now that we have checked all the required names against this one plugin,
		    // if the number we found matches the total number provided then we were successful
		    if(numFound == daPlugins.length) {
			pluginFound = true;
			// if we've found the plugin, we can stop looking through at the rest of the plugins
			break;
		    }
		}
	    }
	    return pluginFound;
	} // detectPlugin
	
	
	// Here we write out the VBScript block for MSIE Windows
	// The VBScript has to be written out to the browser using JavaScript
	if ((navigator.userAgent.indexOf('MSIE') != -1) && (navigator.userAgent.indexOf('Win') != -1)) {
	    document.writeln('<script language="VBscript">');
	
	    document.writeln('\'do a one-time test for a version of VBScript that can handle this code');
	    document.writeln('detectableWithVB = False');
	    document.writeln('If ScriptEngineMajorVersion >= 2 then');
	    document.writeln('  detectableWithVB = True');
	    document.writeln('End If');
	
	    document.writeln('\'this next function will detect most plugins');
	    document.writeln('Function detectActiveXControl(activeXControlName)');
	    document.writeln('  on error resume next');
	    document.writeln('  detectActiveXControl = False');
		
	    document.writeln('  If detectableWithVB Then');
	    document.writeln('     detectActiveXControl = IsObject(CreateObject(activeXControlName))');
	    document.writeln('  End If');
	    document.writeln('End Function');
	
	    document.writeln('\'and the following function handles QuickTime');
	    document.writeln('Function detectQuickTimeActiveXControl()');
	    document.writeln('  on error resume next');
	    document.writeln('  detectQuickTimeActiveXControl = False');
	    document.writeln('  If detectableWithVB Then');
	    document.writeln('    detectQuickTimeActiveXControl = False');
	    document.writeln('    hasQuickTimeChecker = false');
	    document.writeln('    Set hasQuickTimeChecker = CreateObject("QuickTimeCheckObject.QuickTimeCheck.1")');
	    document.writeln('    If IsObject(hasQuickTimeChecker) Then');
	    document.writeln('      If hasQuickTimeChecker.IsQuickTimeAvailable(0) Then ');
	    document.writeln('        detectQuickTimeActiveXControl = True');
	    document.writeln('      End If');
	    document.writeln('    End If');
	    document.writeln('  End If');
	    document.writeln('End Function');
	
	    document.writeln('</scr' + 'ipt>');
	}
	// -->
</SCRIPT>



<!-- End
 New Add For Media player-->


<?PHP
require_once 'Config.php';
require_once $COMMONPHP;

$mobileno = $_GET['mobileno'];
$cn = connectDB();
$qry="select TOP 1 NickFile from TempDostlist where Mobileno='$mobileno'";
$rs = Sql_exec($cn,$qry);
$nick = Sql_GetField($rs,"NickFile");

 $path=$nick;
 $path=str_replace('\\'.'\\','/',$path);
//$path=str_replace('/ismp/shared/','shared/',$path); 
echo "<br>";
//echo $path=str_replace('/ismp/shared/','/',$path); 
 $path=str_replace('/ismp/','/',$path); 

//echo $url = "http://".$FileServer."/".$path;
//echo $url = "http://192.168.5.120/shared".$path;
echo $url = "http://192.168.5.120".$path;
//echo $url = "http://192.168.5.120/S:".$path;

ClosedDBConnection($cn);
?> 
<TABLE border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#FF9933" width="100%">
  <TR class="POPUPTitle"> 
    <TD colspan="2" align="center" bgcolor="#2998DC">Nick Preview</TD>
  </TR>
  
  <TR> 
    <TD width="35%" bgcolor="#A0DF82" class="TitleText">Mobile No </TD>
    <TD width="65%" bgcolor="#DCF3D1" class="TitleTextValue">&nbsp;<?PHP echo $mobileno; ?></TD>
  </TR>
 
  <TR> 
    <TD colspan="2"> 
	<!--<object classid=CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95 codebase=http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701
     width="100%" height="70" align="middle" id="mediaplayer">
        <param name="FileName" value="<?PHP echo $url; ?>">
        <param name="AutoStart" value="true">
        <param name="AutoRewind" value="-1">
        <param name="AnimationAtStart" value="true">
        <param name="ShowControls" value="true">
        <param name="ClickToPlay" value="true">
        <param name="EnableContextMenu" value="false">
        <param name="EnablePositionControls" value="true">
        <param name="Balance" value="1">
        <param name="ShowStatusBar" value="true">
        <param name="AutoSize" value="1">
      </object> -->
	   <div style="border: 1px solid rgb(208, 208, 208); padding: 2px; background: rgb(255, 255, 255) none repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; width: 366px;">
<embed type='application/x-mplayer2' pluginspage='http://www.microsoft.com/Windows/MediaPlayer/' name='MediaPlayer' src="<?php echo $url;?>" autoplay='0' play='1' autostart='1' showstatusbar='1' ShowControls='1' volume='100' height='65' width='300' >
	</div>
	  </TD>
  </TR>
  <TR>
    <TD colspan="2" align="center" bgcolor="#2998DC"><input type="button" name="btnClose" value="Close" class="StBtn" onClick="window.close();" /></TD>
  </TR>
</TABLE>

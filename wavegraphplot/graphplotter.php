<?php

require ('classAudioFile.php');
$file=$_REQUEST['file'];
$filelist=array();
$count=0;
$path='../ismp/shared/test/Recordings/2828_Robi/';
//$file='_30051775342am1875417879009553.wav';
/*
$handle=opendir('../ismp/shared/test/Recordings/2828_Robi/');
while (false !== ($file = readdir($handle)))
{
	if ($file <> "." && $file <> "..")
	{
		if ( (substr(strtoupper($file),strlen($file)-4,4)==".WAV") ||
			(substr(strtoupper($file),strlen($file)-4,4)==".AIF") ||
			(substr(strtoupper($file),strlen($file)-4,4)==".OGG") ||
			(substr(strtoupper($file),strlen($file)-4,4)==".MP3") )
		{
			//print "<a href=\"./graphplotter.php?filename=$file\">$file</a><br>";
			array_push($filelist,'../ismp/shared/test/Recordings/2828_Robi/'.$file);
			$count++;
		} else {
		}
	}
}
*/	
array_push($filelist,$file);

//echo "<pre>";
//print_r($filelist);
//exit;
for($i=0;$i<1;$i++){
	$AF = new AudioFile;
	$AF->loadFile($filelist[$i]); 
//print_r($AF);
	if ($AF->wave_id == "RIFF")
	{
		$AF->visual_width=600;
		$AF->visual_height=500;
		$AF->getVisualization(substr($filelist[$i],0,strlen($filelist[$i])-4).".png");
		//echo "<img src=./".substr($filelist[$i],0,strlen($filelist[$i])-4).".png>";
	}
}

?>
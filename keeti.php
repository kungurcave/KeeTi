<?php
// (c) Михаил Варин, г.Пермь

define ('KEETI_ROOTFOLDER', 'public_html');

function keeti_Point($file, $line) {
	global $keeti_Times;
	global $keeti_Counts;
	global $keeti_PrevLine;
	static $time;
	static $pos;
	
	if(!isset($time)) {
		$time=round(microtime(TRUE),3);
	}
	if(!isset($pos)) {
		$pos=strrpos($file, KEETI_ROOTFOLDER);
		if($pos === FALSE) {
			$pos=0;
		}
		else {
			$pos += strlen(KEETI_ROOTFOLDER);
			$pos += 1;
		}
	}

	$filename = substr($file,$pos);
	$key = $filename.' '.$keeti_PrevLine.'-'.$line;
	$keeti_Times[$key] = @(float)$keeti_Times[$key] + round(microtime(TRUE)-$time, 3);
	$keeti_Counts[$key] = @(int)$keeti_Counts[$key] + 1;
	$time=round(microtime(TRUE),3);
	$keeti_PrevLine=$line;
}

function keeti_Result() {
	global $keeti_Times;
	global $keeti_Counts;
	
	$mess='';
	foreach($keeti_Times as $key=>$value) {
		$mess .= quotemeta($key).' => '.$keeti_Times[$key].' ('.$keeti_Counts[$key].')\n';
	}
	echo "<script>alert('".$mess."');</script>";
}

<?php
	$fileContent = file_get_contents($_SERVER['DOCUMENT_ROOT']."/library/library/infochimps-words-2.txt");
	
	$words = explode("\n", $fileContent);
	
	$fileContent2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/library/library/testing.txt");
	
	$words2 = explode("\n", $fileContent2);
	
	$ar = array_diff($words2, $words);
	
	print_r($ar);
	
	
?>
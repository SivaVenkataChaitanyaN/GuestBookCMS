<?php
	$fileContent = file_get_contents($_SERVER['DOCUMENT_ROOT']."/library/library/infochimps-words-2.txt");
	
	$words = explode("\n", $fileContent);

	$dbToken = mysqli_connect('127.0.0.1', 'root', '', 'vd_lists');
	
	foreach($words as $v)
	{
		$v = mysqli_real_escape_string($dbToken, $v);
		
		$query = 
		"
			INSERT INTO `vd_lists`.`words` (
				`id`,
				`word`
			)
			VALUES (
				(SELECT MAX(id)+1 FROM `vd_lists`.`words` p),
				'$v'
			);
		";
		$result = mysqli_query($dbToken, $query);
	}
?>
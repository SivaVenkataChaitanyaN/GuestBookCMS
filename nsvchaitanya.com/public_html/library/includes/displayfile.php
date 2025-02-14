<?php
	$dbToken =	mysqli_connect('127.0.0.1', 'chaitanya', 'Chaitanya', 'chaitanya_useraccounts');
	
	$query = "
		SELECT 
			content, type
		FROM 
			`filestorage` 
		WHERE 
			file_number = $fileNumber
	";
	
	$result = mysqli_query($dbToken, $query);
	
	if(!$result)
	{
		$errTxt = mysqli_error($dbToken);	
		
		print_r($errTxt);
		
		error_submission($query, $dbToken, __LINE__, __FILE__);
	}
	else
	{
	}
	
	$row = mysqli_fetch_assoc($result);
	
	// header('Content-Disposition: Attachment;filename=image.png');
	
	header('Content-Type: '.$row['type']);
	
	echo $row['content'];
?>
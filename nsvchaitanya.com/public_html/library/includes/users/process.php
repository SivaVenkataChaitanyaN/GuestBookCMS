<?php	
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	
	foreach($_POST as $k => $v)
	{
		$_POST[$k] = trim($v);
	}
	$_POST['password'] = sha1($_POST['password']);
	/*
		Encrypting the password
	*/
	$query = "
		SELECT
			*
		FROM
			users
		WHERE
			`email-id` = '{$_POST['email-id']}' AND `password` = '{$_POST['password']}'
		";
	$result = mysqli_query($p->dbToken, $query);
	/*
		It returns a row which satisfies these conditions
	*/
	if(!$result)
	{
		$errTxt = mysqli_error($dbToken);	
		
		print_r($errTxt);
		
		error_submission($query, $dbToken, __LINE__, __FILE__);
	}
	
	$check = mysqli_num_rows($result);
	/*
		It returns number of rows
	*/
	if($check == 1)
	{
		$row = mysqli_fetch_assoc($result);
		
		$_SESSION['user'] = array(id => $row['id']);
		
		header('Location: http://' . $_SERVER['HTTP_HOST'] . '/library/');
	}
	/*
		Creates the session variable and indicating that he is signed in
	*/
	else
	{
		$p->output .= signinForm($_POST['email-id']);
	}
	
?>
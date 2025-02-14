<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
		
	if(isset($_POST['password']))
	{
		echo 'You already submitted';
	}
	
	else
	{
		$p->output .= signinForm();
	}
	
	$p->output .= '</main>';
?>
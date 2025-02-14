<?php
	unset($_SESSION['user']);
	
	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/library/');
?>
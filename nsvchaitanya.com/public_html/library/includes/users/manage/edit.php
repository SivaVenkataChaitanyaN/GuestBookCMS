<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	/*
		If this element is present and it indicates that insert the values 
	*/
	if(isset($_POST['signup']))
	{
		$sendBack = false;
		
		$_POST['name'] = preg_replace('/\s+|\W+/', ' ', $_POST['name'], -1, $count);
		
		if($count > 0)
		{
			$sendBack = true;
		}
		/*
			Extra spaces and special characters are removed and if count is greater than 0 send back is set to true
		*/
		$_POST['email-id'] = preg_replace('/\s+/', ' ', $_POST['email-id'], -1, $count);
		
		if($count > 0)
		{
			$sendBack = true;
		}
		/*
			Extra spaces are removed and if count is greater than 0 send back is set to true
		*/
		if($sendBack == true)
		{
			$p->output .= signupForm($POST['name'], $_POST['email-id'], $_POST['password']);
		}
		/*
			Again form is appeared indicating the mistakes
		*/
		else
		{
			$_POST['password'] = sha1($_POST['password']);
			
			$query = "
				INSERT 
				INTO
					`users`(
					`id`,
					`name`,
					`email-id`,
					`password`,
					`dateCreated`
				)
				Values(
					(SELECT MAX(p.id)+1 FROM `chaitanya_useracoounts`.`users` p),
					'{$_POST['name']}',
					'{$_POST['email-id']}',
					'{$_POST['password']}',
					(SELECT NOW())
				);
				
				";
			$result = mysqli_query($p->dbToken, $query);
			/*
				Values are inserted into table 
			*/
			if(!$result)
			{
				$errTxt = mysqli_error($p->dbToken);	
				
				print_r($errTxt);
				
				error_submission($query, $p->dbToken, __LINE__, __FILE__);
			}
			
			header('Location: http://' . $_SERVER['HTTP_HOST'] . '/library/thankyou');
		}
	}
	/*
		if element $_POST['password'] exists it indicates that these values must be updated
	*/
	else if(isset($_POST['password']))
	{
		$sendBack = false;
		
		$_POST['name'] = preg_replace('/\s+|\W+/', ' ', $_POST['name'], -1, $count);
		
		if($count > 0)
		{
			$sendBack = true;
		}
		/*
			Extra spaces and special characters are removed and if count is greater than 0 send back is set to true
		*/
		$_POST['email-id'] = preg_replace('/\s+/', ' ', $_POST['email'], -1, $count);
		
		if($count > 0)
		{
			$sendBack = true;
		}
		/*
			Extra spaces are removed and if count is greater than 0 send back is set to true
		*/
		if($sendBack == true)
		{
			$p->output .= editForm($POST['name'], $_POST['email-id'], $_POST['password']);
		}
		/*
			Again form is appeared indicating the mistakes
		*/
		else
		{
			$query = "
				UPDATE
					users
				SET
					`name` = '{$_POST['name']}',
					`email-id` = '{$_POST['email-id']}',
					`password` = '{$_POST['password']}'
				WHERE	
					id = '{$_GET['id']}';
				";
			$result = mysqli_query($p->dbToken, $query);
			/*
				Values are updated in table 
			*/
			if(!$result)
			{
				$errTxt = mysqli_error($dbToken);	

				print_r($errTxt);
				
				error_submission($query, $dbToken, __LINE__, __FILE__);
			}
			
			header('Location: http://' . $_SERVER['HTTP_HOST'] . '/library/thankyou');
		}
	}
	/*
		Form is appeared to containing values of required user
	*/
	else
	{
		$query ="
			SELECT
				*
			FROM
				users
			WHERE
				id = {$userEditId}
			";
			
		$result = mysqli_query($p->dbToken, $query);
		
		$row = mysqli_fetch_assoc($result);
		
		if(!$result)
		{
			$errTxt = mysqli_error($p->dbToken);	
			
			print_r($errTxt);
			
			error_submission($query, $p->dbToken, __LINE__, __FILE__);
		}
		
		$p->output .= editForm($row['name'], $row['email-id'], $row['password'], $userEditId);
	}
?>
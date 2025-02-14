<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	
	$rollBack = false;
	
	if(mysqli_autocommit($dbToken, false))
	{
		$query	= "
			INSERT
			INTO
				`users3`(
				`name`,
				`email-id`,
				`password`,
				`dateCreated`
			)
			VALUES(
				`name`,
				`email-id`,
				`password`,
				NOW()
			);
		";
			
		$result = mysqli_query($dbToken, $query);
		
		if(!$result)
		{
			$rollBack = true;
			
			print_r(error_get_last());
			
			error_submission($query, $dbToken, __LINE__, __FILE__);
		}
		else
		{
			$insId = mysqli_insert_id($dbToken);
			
			$query = "
				UPDAT
					`users3`
				SET
					`name` = `Science`
				WHERE
					`id` = {$insId}
			";
			
			$result2 = mysqli_query($dbToken, $query);
			
			if(!$result2)
			{
				$rollBack = true;
				
				print_r(error_get_last());
				
				error_submission($query, $dbToken, __LINE__, __FILE__);
			}
			else
			{
				mysqli_commit($dbToken);
			}
		}
		if($rollBack)
		{
			mysqli_rollback($dbToken);
		}
	}			
?>	
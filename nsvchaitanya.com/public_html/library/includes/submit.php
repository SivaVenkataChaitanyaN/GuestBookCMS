<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	
	$divoutput = array(
		'html'=>'',
		'java'=>''
	);
	
	$p->output = '';
	
	if(isset($_SERVER['HTTP_JSREQ']))
	{
		if(isset($_POST['commentNumber']))
		{
			
			foreach($_POST as $k=>$v)
			{
				$_POST[$k] = trim($v);
				
				if($k == 'favouriteSubject')
				{
					switch($v)
					{
						case 'Maths':
						{
							$_POST[$k] = 1;
						}
						break;
						case 'Physics':
						{
							$_POST[$k] = 2;
						}
						break;
						case 'Chemistry':
						{
							
							$_POST[$k] = 3;
						}
						break;
					}
				}
				
				if($k == 'hobbies')
				{
					$hobbArray = explode(',', $_POST[$k]);
					
					foreach($hobbArray as $key=>$value)
					{
						$hobbArray[$key] = trim($value);
					}
					$hobbies = implode(",", $hobbArray);
				}
			}
			
			$query = "
				SELECT
					* 
				FROM
					`chaitanya_useraccounts`.`books`
				WHERE
					num_id = '{$_POST['commentNumber']}'
			";
			
			$result = mysqli_query($p->dbToken, $query);
			
			$row = mysqli_fetch_assoc($result);
			
			$query = "
				INSERT INTO 
					`chaitanya_useraccounts`.`booksversion` (
						`id`,
						`num_id`,
						`user`,
						`age`,
						`due`,
						`favouriteSubject`,
						`hobbies`,
						`favouriteSport`,
						`nameOfBooks`,
						`dateCreated`,
						`dateUpdated`,
						`latest`
					)
					VALUES(
						(SELECT MAX(id)+1 FROM `chaitanya_useraccounts`.`booksversion` p),
						'{$_POST['commentNumber']}',
						{$row['user']},
						{$row['age']},
						{$row['due']},
						{$row['favouriteSubject']},
						'{$row['hobbies']}',
						'{$row['favouriteSport']}',
						'{$row['nameOfBooks']}',
						'{$row['dateCreated']}',
						(SELECT NOW()),
						0
					);	
				";
			$result = mysqli_query($p->dbToken, $query);
		
			$errTxt = mysqli_error($p->dbToken);	
			
			print_r($errTxt);

			$query = "
				UPDATE
					`chaitanya_useraccounts`.`books`
				SET
					`favouriteSubject` = {$_POST['favouriteSubject']},
					`hobbies` = '$hobbies',
					`favouriteSport` = '{$_POST['favouriteSport']}',
					`nameOfBooks` = '{$_POST['booksTakenName']}',
					`dateUpdated` = (SELECT NOW())
				WHERE
					`num_id` = '{$_POST['commentNumber']}'	
			";
			
			$result = mysqli_query($p->dbToken, $query);
		
			$errTxt = mysqli_error($p->dbToken);	
			
			print_r($errTxt);
			
			// $p->output .= userDisplay($_POST['commentNumber'], $p->dbToken);
			
			// $p->output .= '<script>eventCreation();</script>';
			
			
			$divoutput['html'] .= withUpdateButtonDisplay($_POST['commentNumber'], $p->dbToken);
			/*This for display page 
			$divoutput['java'] .= 'eventCreation();';*/
			
			/*This is for updateDiaplay page*/
			
			$divoutput['java'] .= 'updateEventCreation();';
			
			$p->output .= json_encode($divoutput);
		}
	}
	else
	{
		/*
			Includes the functions
		*/	
		$sendBack = false;
		
		/*
			Intially the sendBack is false if it is true again form is sent
			to fill correct details.
		*/
		foreach($_POST as $k=>$v)
		{
			$_POST[$k] = $v;
		}
		
		$msg = '';
		
		for($i = 0; $i < count($_POST['hobbies']); $i++)
		{
			switch($_POST['hobbies'][$i])
			{
				case 1:
				{
					$msg .= 'Playing';
					break;
				}
				case 2:
				{
					$msg .= 'Reading';
					break;
				}
				case 3:
				{
					$msg .= 'Listening to Music';
					break;
				}
				case 4:
				{
					$msg .= 'Watching movies';
					break;
				}
				case 5:
				{
					$msg .= 'Trekking';
					break;
				}
				case 6:
				{
					$msg .= 'Hiking';
					break;
				}
			}
			$msg .= ',';
		}
		$msg = rtrim($msg, ',');
		/*
			Get element is assigned 
		*/
		
		$_POST['user'] = preg_replace('/\s+|\W+/', ' ', $_POST['user'], -1, $count);
		/*
			Extra spaces and special characters are removed
		*/
		
		if($count > 0)
		{
			$sendBack = true;
		}
		
		$_POST['age'] = preg_replace('/[^0-9]{1,2}/', ' ', $_POST['age'], -1, $count);
		/*
			Other than 0-9 are replaced
		*/
		
		if($count > 0 && $age > 110)
		{
			$sendBack = true;
		}
		/*
		if(isset($_POST['booksTaken']))
		{
			$_POST['booksTaken'] = preg_replace('/[^1-3]/', '0', $_POST['booksTaken'], -1, $count);
			/*
			Other than 1-3 are replaced 
			*//*
			if($count > 0)
			{
				$sendBack = true;
			}
		}
		else
		{
			$sendBack = true;
		}
		*/
		if(isset($_POST['due']))
		{	
			$_POST['due'] = preg_replace('/[^0-9]/', ' ', $_POST['due'], -1, $count);
			
			if($count > 0)
			{
				$sendBack = true;
			}
		}
		else
		{
			$_POST['due'] = 0;
		}
		
		/*
		Other 0-9 are replaced
		*/
		
		$_POST['booksTakenName'] = preg_replace('/\s+/', ' ', $_POST['booksTakenName']);
		/*
			Removes the extra spacings
		*/
		
		if(isset($_POST['favouriteSubject']))
		{
			$_POST['favouriteSubject'] = preg_replace('/[^0-9]/', ' ', $_POST['favouriteSubject'], -1, $count);
		}
		if($count >0)
		{
			$sendBack = true;
		}
		
		if(isset($_POST['hobbies']))
		{	
			$_POST['hobbies'] = preg_replace('/[^0-9]/', ' ', $_POST['hobbies'], -1, $count);
			
		}
		if($count > 0)
		{
			$sendBack = true;
		}
		
		if(isset($_POST['sport']))
		{	
			$_POST['sport'] = preg_replace('/[^0-9]/', ' ', $_POST['sport'], -1, $count);
			
		}
		if($count > 0 )
		{
			$sendBack = true;
		}
		
		if($sendBack == true)
		{
			if(isset($_POST['update']))
			{
				$o = editingForm($_POST['user'], $_POST['age'], $_POST['booksTaken'], $_POST['due'], $_POST['booksTakenName'], $_POST['buttonSubmit']);
			}
			else
			{
				$o = buildingForm($_POST['user'], $_POST['age'], $_POST['sport'], $_POST['due'], $_POST['booksTakenName']);
			}

		}
		
		else
		{
			
			if(isset($_POST['submit']))
			{
				/*
					Insert the submitted data after validation into the database
					
					ID value would be the next after the highest.
				*/
				
				$query = "
					INSERT 
					INTO 
						`chaitanya_useraccounts`.`books`(
							`id`,
							`num_id`,
							`user`,
							`age`,
							`due`,
							`favouriteSubject`,
							`hobbies`,
							`favouriteSport`,
							`nameOfBooks`,
							`dateCreated`
						)
					 VALUES(
							(SELECT MAX(p.id)+1 FROM `chaitanya_useraccounts`.`books` p),
							(SELECT MAX(p.num_id)+1 FROM `chaitanya_useraccounts`.`books` p),
							'{$_POST['user']}',
							'{$_POST['age']}',
							'{$_POST['due']}',
							'{$_POST['favouriteSubject']}',
							'$msg',
							'{$_POST['sport']}',
							'{$_POST['booksTakenName']}',
							(SELECT NOW())
						)
					
					;";
					/*
						Takes the maximum value from the primary key id and insert the values into the table 
					*/
				$result = mysqli_query($p->dbToken, $query);
				
				if(!$result)
				{
					$errTxt = mysqli_error($p->dbToken);	
					
					print_r($errTxt);
					
					error_submission($query, $p->dbToken, __LINE__, __FILE__);
				}
				else
				{
				}
			}
			else if(isset($_POST['update']))
			{
				$query = 
					"
						UPDATE
							`chaitanya_useraccounts`.`books`
						SET
							`user` = '{$_POST['user']}',
							`age` = '{$_POST['age']}',
							`due` = '{$_POST['due']}',
							`favouriteSubject` = '{$_POST['favouriteSubject']}',
							`hobbies` = '$msg',
							`favouriteSport` = '{$_POST['sport']}',
							`nameOfBooks` = '{$_POST['booksTakenName']}'
						WHERE
							id = '$editId'
					";
					
				$result =  mysqli_query($p->dbToken, $query);
				/*
					Updates the values of table of a specified user
				*/
				
				if(!$result)
				{
					$errTxt = mysqli_error($p->dbToken);	
					
					print_r($errTxt);
				}
				else
				{
				}
			}
			else if(isset($_POST['delete']))
			{
				$query = 
					"DELETE
						*
					FROM
						chaitanya_useraccounts`.`books`
					WHERE
						id = '$editId'
				";
				
				$result = mysqli_query($p->dbToken, $query);
				/*
					Deletes the specified user
				*/
				if(!$result)
				{
					$errTxt = mysqli_error($p->dbToken);	
					
					print_r($errTxt);
					
					error_submission($query, $p->dbToken, __LINE__, __FILE__);
				}
				else
				{
				}
			}
			header('Location: http://' . $_SERVER['HTTP_HOST'] . '/library/thankyou');
		}
	}
?>
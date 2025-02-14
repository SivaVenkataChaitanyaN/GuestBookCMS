<?php
	function buildingForm($user="", $age = "", $books="1", $due="0", $booksTaken="Name the books")
	{
		$output = '<div class="div_background">
					<form action="/library/submit" method="post" class="form_style" id="form">
						<div class="div_holder">
							<div class="div_space">
								User-Id
								<div class = "div_input_message">
									Only Numerics
								</div>
								<input name="user" value="' . $user. '" type="text" id="id" class="input_style" placeholder="User-Id:"/>
							</div>
							<span class="span_id_error">
							</span>
						</div>
						<div class="div_holder">
							<div class="div_space">
								Age
								<div class = "div_input_message">
									Only Numerics < 4
								</div>
								<input name = "age" value="' . $age . '" id="age" type="number" class="input_style" placeholder="Age:"/>
							</div>
							<span class="span_age_error">
							</span>
						</div>
						<div class="div_space">		
							Any dues
							<input type="checkbox" id="checkValue" value="1" name="due"/>
						</div>
						<div class="div_holder">
							<div class="div_space">
								Favourite Subject
								<div class = "div_input_message">
									Select One 
								</div>
								<select name="favouriteSubject" id="subject">
							
									<option value="0" selected="">--Select--</option>
									
									<option value="1" >Maths</option>
									
									<option value="2">Physics</option>
									
									<option value="3">Chemistry</option>
								
								</select>
							</div>
							<span class="span_subject_error">
							</span>
						</div>
						<div class = "div_holder">
							<div class="div_space">
								Favourite Sport
								<div class = "div_input_message">
									Select One 
								</div>
							</div>
								<span class="sport_error">
								</span>
								<div class = "radio_element">
								
									<input name="sport" value="1" type="radio">
										Cricket
									</input>
									<br>
									<input name="sport" value="2" type="radio">
										Football
									</input>
									<br>
									<input name="sport" value="3" type="radio">
										Hockey
									</input>
									<br>
								</div>
						</div>
						<div class="div_holder">
							<div class="div_space">
								Hobbies
								<div class = "div_input_message">
									Multiple Select
								</div>
								<select name="hobbies[]" multiple id="hobbies">
								
										<option value="0" id="slideToggle">--Select--</option>
										
										<option value="1">Playing</option>
										
										<option value="2">Reading</option>
										
										<option value="3">Listening to Music</option>
										
										<option value="4">Watching Movies</option>
										
										<option value="5">Trekking</option>
										
										<option value="6">Hiking</option>
								</select>
							</div>
							<span class="span_hobbies_error">
							</span>
						</div>
						<div class="div_holder">
							<div class="div_space">
								Books Taken
								<div class = "div_input_message">
									12 < Characters < 1024 
								</div>
								<textarea name="booksTakenName" id="booksTaken" placeholder="Name the books" class="textarea_dim"></textarea>
							</div>
							<span class="span_books_error">
							</span>
						</div>
						<div class="div_space">
							<button type="button" name="submit" id="btn">
								Submit
							</button>
						</div>
					</form>
				</div>';
		return $output;
	}

	function editingForm($user="", $age = "", $books="1", $due="0", $booksTaken="Name the books", $id)
	{
		$output = 
			'<div class="div_background">
				<form action="/library/submit/'.$id.'" method="post" class="form_style" id="form">
					<div class="div_space">
						User-Id
					</div>
					<div class="div_space">
						<input name="user" value="' . $user. '" type="text" class="input_style" placeholder="User-Id:"/>
					</div>
					<div class="div_space">
						Age
					</div>
					<div class="div_space">
						<input name = "age" value="' . $age . '" type="number" class="input_style" placeholder="Age:"/>
					</div>
					<div class="div_space">		
						Any dues
					</div>
					<div class="div_space">
						<input type="checkbox" id="checkValue" value="1" name="due"/>
					</div>
					<div class="div_space">
						Favourite Subject
					</div>
					<div class="div_space">
						<select name="favouriteSubject">
					
							<option value="0">--Select--</option>
							
							<option value="1" selected="">maths</option>
							
							<option value="2">Physics</option>
							
							<option value="3">Chemistry</option>
						
						</select>
					</div>
					<div class="div_space">
						Favourite Sport
					</div>
					<div class="div_space">
						<input name="sport" value="1" type="radio">
							Cricket
						</input>
						<input name="sport" value="2" type="radio">
							Football
						</input>							
						<input name="sport" value="3" type="radio">
							Hockey
						</input>
						<input name="sport" value="4" type="radio">
							Kabbadi
						</input>
					</div>
					<div class="div_space">
						Hobbies
					</div>
					<div class="div_space">
						<select name="hobbies[]" multiple>
							<option value="0">--Select--</option>
							
							<option value="1">Playing</option>
							
							<option value="2">Reading</option>
							
							<option value="3">Listening to Music</option>
							
							<option value="4">Watching Movies</option>
							
							<option value="5">Trekking</option>
							
							<option value="6">Hiking</option>
						</select>
					</div>
					<div class="div_space">
						Books Taken
					</div>
					<div class="div_space">
						<textarea name="booksTakenName" class="textarea_dim">' . $booksTaken . '</textarea>
					</div>
					<div class="div_space">					
						<button type="submit" name="update" id="btn1">
							Update
						</button>
						<button type="submit" name="delete" id="btn2">
							Delete
						</button>
					</div>
				</form>
			</div>';	
		return $output;
	}
	
	function signinForm($email='email-id')
	{
		$output ='
				<div class="div_background">
					<form action="/library/users/process" method="post" class="form_style" id="form">';
					if(!isset($_SESSION['user']))
					{
						$output .= '<div>
							<a href="/library/users/manage/create" class="a_signup">
								Signup
							</a>
						</div>';
					}
		$output .='		
					<div>
						Email-id
					</div>
					<div>
						<input name="email-id" value="' . $email .'" type="text" class="input_style"/>
					</div>
					<div>
						Password
					</div>
					<div>
						<input name="password" type="password" class="input_style"/>
					</div>
					<div>
						<button type="submit">
							Submit
						</button>
					</div>
				</form>
			</div>';
		return $output;
	}
	
	function editForm($name='name', $email='email-id', $password, $id)
	{
		$output ='
				<div class="div_background">
					<form action="/library/users/manage/edit?id=' . $id . '" method="post" class="form_style" id="form">
						<div>
							Name
						</div>
						<div>
							<input name="name" value="' . $name .'" type="text" class="input_style"/>
						</div>
						<div>
							Email-id
						</div>
						<div>
							<input name="email-id" value="' . $email .'" type="text" class="input_style"/>
						</div>
						<div>
							Password
						</div>
						<div>
							<input name="password" value="'. $password . '" type="text" class="input_style"/>
						</div>
						<div>
							<button type="submit">
								Submit
							</button>
						</div>
					</form>
				</div>';
				
		return $output;
	}
	function signupForm($name='name', $email='email-id')
	{
		$output ='
				<div class="div_background">
					<form action="/library/users/manage/edit" method="post" class="form_style" id="form">
						<div>
							Name
						</div>
						<div>
							<input name="name" value="' . $name .'" type="text" class="input_style"/>
						</div>
						<div>
							Email-id
						</div>
						<div>
							<input name="email-id" value="' . $email .'" type="text" class="input_style"/>
						</div>
						<div>
							Password
						</div>
						<div>
							<input name="password" type="password" class="input_style"/>
						</div>
						<div>
							<button type="submit" name="signup">
								Submit
							</button>
						</div>
					</form>
				</div>';
				
		return $output;
	}
	function page_nav($numlinks, $currentPage, $numberOfPages)
	{
		$output = '';
		
		$chgCurrentPage = $currentPage;
		
		$remNumlinks = floor($numlinks/2);
		
		if($currentPage < $remNumlinks+2)
		{
			$firstchgCurrentPage = 1;
		}
		else
		{
			$firstchgCurrentPage = $currentPage - $remNumlinks;
			
			$output .= '<a href="/library/1" class="a_pag_nav">F</a> ...';
		}
		for($i = 0; $i < $numlinks; $i++)
		{
			$chgPage = $i+$firstchgCurrentPage;
			if($chgPage > $numberOfPages)
			{
				break;
			}
			else
			{
				if($chgPage == $currentPage)
				{
					$output .= " $chgPage ";
				}
				else
				{
					$output .=	'<a href="/library/' . $chgPage . '" class="a_pag_nav">' . $chgPage . '</a>';
				}
			}
		}
		if($currentPage < $numberOfPages - $remNumlinks)
		{
			$output .= ' ... <a href="/library/' . $numberOfPages . '" class="a_pag_nav">L</a>';
		}
		/*
		for($i = 1; $i < $numberOfPages; $i++)
		{
			$output .= '<a href="/library/' . $i . '" class="a_pag_nav">' . $i .' </a>';
		}
		*/
		return $output;
	}
	function edit_page_nav($numlinks, $currentPage, $numberOfPages)
	{
		$output = '';
		
		$chgCurrentPage = $currentPage;
		
		$remNumlinks = floor($numlinks/2);
		
		if($currentPage < $remNumlinks+2)
		{
			$firstchgCurrentPage = 1;
		}
		else
		{
			$firstchgCurrentPage = $currentPage - $remNumlinks;
			
			$output .= '<a href="/library/edit/1" class="a_pag_nav">F</a> ...';
		}
		for($i = 0; $i < $numlinks; $i++)
		{
			$chgPage = $i+$firstchgCurrentPage;
			
			if($chgPage == $currentPage)
			{
				$output .= " $chgPage ";
			}
			else
			{
				$output .=	'<a href="/library/edit/' . $chgPage . '" class="a_pag_nav">' . $chgPage . '</a>';
			}
		}
		if($currentPage < $numberOfPages - $remNumlinks)
		{
			$output .= ' ... <a href="/library/edit/' . $numberOfPages . '" class="a_pag_nav">L</a>';
		}
		/*
		for($i = 1; $i < $numberOfPages; $i++)
		{
			$output .= '<a href="/library/' . $i . '" class="a_pag_nav">' . $i .' </a>';
		}
		*/
		return $output;
	}

	function error_submission($query, $dbToken, $line, $script)
	{
		$error = mysqli_error($dbToken);
		
		$error = preg_replace('/\'/', '`', $error);
		
		$query = preg_replace('/\'/', '`', $query);
		
		$script = str_replace('\\', '\\\\', $script);
		
		$rquery = "
			INSERT
			INTO
				`error`(
				`id`,
				`query`,
				`errorQuery`,
				`lineNumber`,
				`scriptName`,
				`dateCreated`
			)
			VALUES(
				(SELECT MAX(p.id)+1 FROM `chaitanya_useraccounts`.`error` p),
				'{$query}',
				'{$error}',
				{$line},
				'{$script}',
				(NOW())
			);
		";
		
		$result = mysqli_query($dbToken, $rquery);
		
		if(!$result)
		{
			$qerror = mysqli_error($dbToken);
		}	
	}
	function userDisplay($num_id, $dbToken)
	{
		$output = '';
		
		$query = "
			SELECT NOW() as dateTime
		";
		
		$result = mysqli_query($dbToken, $query);
		
		$dateTime = mysqli_fetch_assoc($result);
		
		$query = "
			SELECT 
				users.name,
				books.nameOfBooks,
				books.favouriteSubject,
				books.favouriteSport,
				books.hobbies,
				books.num_id,
				subjects.subjectName
			FROM 
				chaitanya_useraccounts.books
			LEFT JOIN
				users
			ON
				books.user = users.id
			JOIN
				subjects
			ON
				books.favouriteSubject = subjects.id
			WHERE
				books.num_id = $num_id
			LIMIT
				1
		";
		$result = mysqli_query($dbToken, $query);
		
		if(!$result)
		{
			$errTxt = mysqli_error($dbToken);	
			
			print_r($errTxt);
			
			error_submission($query, $dbToken, __LINE__, __FILE__);
		}
		
		
		
		if($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$output .= 
				'
					<div class="div_border_on">
						<div>
							' . $row['name'];
				$output	.= '</div>';
			
				$output .= ' 
					<div>
						<form action="" method="post" class="form">
						<input name="commentNumber" type="hidden" value="'.$num_id.'">
						FavouriteSubject :	<input name="favouriteSubject"  type="text" readonly class="favouriteSubject" value="'.$row['subjectName'].'"/>
							<div style="float:right;">
								FavouriteSport : <input name="favouriteSport" type="text" readonly class="favouriteSport" value="'.$row['favouriteSport'].'"/>
							</div>
					';
				/*
					If the user login he can see edit button and delete button
				*/
				$output .= '
						<p class="content">
							<textarea name="booksTakenName"  class="nameOfBooks">
								'.$row['nameOfBooks'].'
							</textarea>
						</p>
						Hobbies : <input name="hobbies" type="text" class="hobbies" readonly value="' . $row['hobbies'] . '"/>
						<span style="float:right">'.$dateTime['dateTime'].'</span>
						</form>
					</div>
					</div>';
			}
		}
		return $output;
	}
	function display($num_id, $dbToken)
	{
		$output = '';
		
		$query = "
			SELECT 
				users.name,
				books.nameOfBooks,
				books.favouriteSubject,
				books.favouriteSport,
				books.hobbies,
				books.num_id,
				subjects.subjectName
			FROM 
				chaitanya_useraccounts.books
			LEFT JOIN
				users
			ON
				books.user = users.id
			JOIN
				subjects
			ON
				books.favouriteSubject = subjects.id
			WHERE
				books.num_id = $num_id
			LIMIT
				1
		";
		$result = mysqli_query($dbToken, $query);
		
		if(!$result)
		{
			$errTxt = mysqli_error($dbToken);	
			
			print_r($errTxt);
			
			error_submission($query, $dbToken, __LINE__, __FILE__);
		}
		
		if($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$output .= 
				'
					<div class="div_border_on">
					
						<div >
							' . $row['name'];
				$output	.= '</div>';
						/*
						if(isset($_SESSION['user']))
						{	
							$output .= '<div>
								<a href="'.$p->edit_nav_page['href'].'/'.$row['id'].'">
									<img class="'.$p->edit_img['class'].'"/>
								</a>
							</div>';
						}*/
					$output .= '
					<button class="toggle" name="toggle" type="button">Show/Hide</button> 
					<div>
						FavouriteSubject :	'.$row['subjectName'].'
						<div style="float:right;">
							FavouriteSport : '.$row['favouriteSport'].'
						</div>
					</div>';
					/*
						If the user login he can see edit button and delete button
					*/
					$row['nameOfBooks'] = trim($row['nameOfBooks']);
					$output .= '
						<p class="content">'.$row['nameOfBooks'] . '</p>
						Hobbies : ' . $row['hobbies'] . '
				</div>';
			}
		}
		return $output;
	}
	function sortingRows_page_nav($numlinks, $currentPage, $numberOfPages)
	{
		$output = '';
		
		$chgCurrentPage = $currentPage;
		
		$remNumlinks = floor($numlinks/2);
		
		if($currentPage < $remNumlinks+2)
		{
			$firstchgCurrentPage = 1;
		}
		else
		{
			$firstchgCurrentPage = $currentPage - $remNumlinks;
			
			$output .= '<a href="/library/sortingRows/" class="a_pag_nav">F</a> ...';
		}
		for($i = 0; $i < $numlinks; $i++)
		{
			$chgPage = $i+$firstchgCurrentPage;
			
			if($chgPage > $numberOfPages)
			{
				break;
			}
			else
			{
				if($chgPage == $currentPage)
				{
					$output .= " $chgPage ";
				}
				else
				{
					$output .=	'<a href="/library/sortingRows/' . $chgPage . '" class="a_pag_nav">' . $chgPage . '</a>';
				}
			}
		}
		if($currentPage < $numberOfPages - $remNumlinks)
		{
			$output .= ' ... <a href="/library/sortingRows/' . $numberOfPages . '" class="a_pag_nav">L</a>';
		}
		/*
		for($i = 1; $i < $numberOfPages; $i++)
		{
			$output .= '<a href="/library/' . $i . '" class="a_pag_nav">' . $i .' </a>';
		}
		*/
		return $output;
	}
	
	function client_page_nav($numlinks, $currentPage, $numberOfPages)
	{
		$output = '';
		
		$chgCurrentPage = $currentPage;
		
		$remNumlinks = floor($numlinks/2);
		
		if($currentPage < $remNumlinks+2)
		{
			$firstchgCurrentPage = 1;
		}
		else
		{
			$firstchgCurrentPage = $currentPage - $remNumlinks;
			
			$output .= '<span ref="/library/sortingRows/" class="a_pag_nav">F</span> ...';
		}
		for($i = 0; $i < $numlinks; $i++)
		{
			$chgPage = $i+$firstchgCurrentPage;
			
			if($chgPage > $numberOfPages)
			{
				break;
			}
			else
			{
				if($chgPage == $currentPage)
				{
					$output .= " $chgPage ";
				}
				else
				{
					$output .=	'<span ref="/library/sortingRows/' . $chgPage . '" class="a_pag_nav">' . $chgPage . '</span>';
				}
			}
		}
		if($currentPage < $numberOfPages - $remNumlinks)
		{
			$output .= ' ... <span ref="/library/sortingRows/' . $numberOfPages . '" class="a_pag_nav">L</span>';
		}
		/*
		for($i = 1; $i < $numberOfPages; $i++)
		{
			$output .= '<a href="/library/' . $i . '" class="a_pag_nav">' . $i .' </a>';
		}
		*/
		return $output;
	}
	
	function withUpdateButtonDisplay($num_id, $dbToken)
	{
		$output = '';
		
		$query = "
			SELECT 
				users.name,
				books.nameOfBooks,
				books.favouriteSubject,
				books.favouriteSport,
				books.hobbies,
				books.num_id,
				subjects.subjectName
			FROM 
				chaitanya_useraccounts.books
			LEFT JOIN
				users
			ON
				books.user = users.id
			JOIN
				subjects
			ON
				books.favouriteSubject = subjects.id
			WHERE
				books.num_id = $num_id
			LIMIT
				1
		";
		$result = mysqli_query($dbToken, $query);
		
		if(!$result)
		{
			$errTxt = mysqli_error($dbToken);	
			
			print_r($errTxt);
			
			error_submission($query, $dbToken, __LINE__, __FILE__);
		}
		
		if($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$output .= 
				'
					<div class="div_border_on">
					
						<div >
							' . $row['name'];
				$output	.= '</div>';
						/*
						if(isset($_SESSION['user']))
						{	
							$output .= '<div>
								<a href="'.$p->edit_nav_page['href'].'/'.$row['id'].'">
									<img class="'.$p->edit_img['class'].'"/>
								</a>
							</div>';
						}*/
					$output .= '
					<button class="toggle" name="toggle" type="button">Show/Hide</button> 
					<input name="commentNumber" type="hidden" value="'.$num_id.'">
					<div>
						FavouriteSubject :	<span contenteditable="true" name="favouriteSubject">'.$row['subjectName'].'</span>
						<div style="float:right;">
							FavouriteSport : <span contenteditable="true" name="favouriteSport">'.$row['favouriteSport'].'</span>
						</div>
					</div>';
					/*
						If the user login he can see edit button and delete button
					*/
					$row['nameOfBooks'] = trim($row['nameOfBooks']);
					$output .= '
						<p name="booksTakenName" contenteditable="true" class="content">'.$row['nameOfBooks'] . '</p>
						<div class="hobbies">Hobbies : <span name="hobbies" contenteditable="true">' . $row['hobbies'] . '</span></div>
						
						<button class="updateButton">Update</button>
						<div class="hiddenDivForButton"></div>
				</div>';
			}
		}
		return $output;
	}
	

?>
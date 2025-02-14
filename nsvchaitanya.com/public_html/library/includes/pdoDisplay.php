<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	
	$dAction = 'del';
	
	$eAction = 'edit';
	
	// phpinfo();exit;
	
	$db = new PDO('mysql:host=127.0.0.1:3306;dbname=chaitanya_useraccounts', 'chaitanya', 'Chaitanya');
	
	$numPerPage = 4;
	
	$query = '
		SELECT
			COUNT(*)
		AS
			numberOfRecords 	
		FROM 
			chaitanya_useraccounts.books
		';
	$result = $db->query($query);
	
	if(!$result)
	{
		$errTxt = $db->errorInfo();	
		
		print_r($errTxt);
		
		error_submission($query, $p->dbToken, __LINE__, __FILE__);
	}
	else
	{
		$row = $result->fetch(PDO::FETCH_ASSOC);
		
		$numberOfRecords = $row['numberOfRecords'];
		
		$numberOfPages = ceil($numberOfRecords/$numPerPage);
	}
	
	$startAt = $numPerPage * ($currentPage - 1);
	
	$query = "
		SELECT 
			users.name,
			books.nameOfBooks,
			books.favouriteSubject,
			books.favouriteSport,
			books.hobbies,
			books.id,
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
		ORDER BY
			books.nameOfBooks ASC
		LIMIT
			{$startAt}, 4	
	";
	
	$result = $db->query($query);
	
	if(!$result)
	{
		$errTxt = $db->errorInfo();	
		
		print_r($errTxt);
		
		error_submission($query, $p->dbToken, __LINE__, __FILE__);
	}
	else
	{
	}

	if($result)
	{
		$num_rows = $result->rowCount();
		
		if($num_rows > 0)
		{
			$i = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC))
			{
				$p->output .= 
				'
					<div class="' .$p->bord_con_class['class']. '">
					
						<div >
							' . $row['name'];
				$p->output	.= '</div>';	
						if(isset($_SESSION['user']))
						{	
							$p->output .= '<div>
								<a href="'.$p->edit_nav_page['href'].'/'.$row['id'].'">
									<img class="'.$p->edit_img['class'].'"/>
								</a>
							</div>';
						}
					$p->output .= '
					<button name="toggle" type="button">Show/Hide</button> 
					<div>
						FavouriteSubject :	'.$row['subjectName'].'
						<div style="float:right;">
							FavouriteSport : '.$row['favouriteSport'].'
						</div>
					</div>';
					/*
						If the user login he can see edit button and delete button
					*/
					$p->output .= '
						<p class="'.$p->content['class'].'">
						' . $row['nameOfBooks'] . '
						</p>
						Hobbies : ' . $row['hobbies'] . '
				</div>';
				$i++;
			}
		}
	}
	
	/*
		It displays the details the player
	*/
	
	$p->title = 'Guest Book Comments';
	
	$p->output .= '<div class="'.$p->pag_nav_class['class'].'">';
	
	$numlinks = 4;
	
	$p->output .= page_nav($numlinks, $currentPage, $numberOfPages);
	
	$p->output .= '</div></main>';
	
	$p->bodyScripts[]['code'] = '
		var menuElement = document.getElementById("menu");
		
		var divHiddenElement = document.getElementById("div_hid_menu");
		
		divHiddenElement.addEventListener("click", menuToggle, true);
		/*
			Click event is added to that element and menuToggle is called when clicked
		*/
		function menuToggle()
		{
			if(menuElement.className == "menu_off" || menuElement.className == "menu")
			{
				menuElement.className = "menu_on";
			}
			else
			{
				menuElement.className = "menu_off";
			}
		}
		/*
			menu_off has display : none so that menu is invisible and now if menu_on is the class menu is visible
		*/

		$(":button").addClass("show_hide_button");
		/*
		$(":button").on("click", function(){
			
				var sibDiv = $(this).siblings("div");
				
				var curState = $(sibDiv).css("display");
				
				if(curState == "block")
				{
					$(sibDiv).hide();
					//.toggleClass("div_border_off");
				}
				else
				{
					$(sibDiv).show();
				}
			});
			*/
		
		$(":button").each(function(){$(this).on("click", function(){$(this).siblings(".content").slideToggle(600);})});
		/*
			Adds click event listener and on one click on button div_border slide up and on dbl click on 
		*/
	';	
?>
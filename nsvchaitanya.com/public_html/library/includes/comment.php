<?php
	if(isset($_POST['submit']))
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
			MAX(dateUpdated) as dateUpdated
		FROM
			chaitanya_useraccounts.books
		WHERE
			num_id = $commentNumber
		LIMIT
			1
		";
		
		$result = mysqli_query($p->dbToken, $query);

		$row = mysqli_fetch_assoc($result);
		
		$query = "
			SELECT 
				user,
				age,
				dateCreated
			FROM 
				`chaitanya_useraccounts`.`books`
			WHERE
				books.dateUpdated = '{$row['dateUpdated']}' AND books.num_id = $commentNumber
			LIMIT
				1
		";
		
		$result = mysqli_query($p->dbToken, $query);

		$row = mysqli_fetch_assoc($result);
		
		$query = "
			INSERT INTO 
				`chaitanya_useraccounts`.`books` (
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
					`dateUpdated`
				)
				VALUES(
					(SELECT MAX(id)+1 FROM `chaitanya_useraccounts`.`books` p),
					$commentNumber,
					{$row['user']},
					{$row['age']},
					0,
					{$_POST['favouriteSubject']},
					'$hobbies',
					'{$_POST['favouriteSport']}',
					'{$_POST['booksTakenName']}',
					'{$row['dateCreated']}',
					(SELECT NOW())
				);	
			";
		/*
		$query = "
			UPDATE
				`chaitanya_useraccounts`.`books`
			SET
				`favouriteSubject` = '{$_POST['favouriteSubject']}',
				`hobbies` = '$hobbies',
				`favouriteSport` = '{$_POST['favouriteSport']}',
				`nameOfBooks` = '{$_POST['booksTakenName']}'
			WHERE
				id = '$commentNumber'
		";
		*/
		$result = mysqli_query($p->dbToken, $query);
	
		$errTxt = mysqli_error($p->dbToken);	
		
		print_r($errTxt);
	
	}
	$query = "
		SELECT
			MAX(dateUpdated) as dateUpdated
		FROM
			chaitanya_useraccounts.books
		WHERE
			num_id = $commentNumber
	";
	$result = mysqli_query($p->dbToken, $query);

	$row = mysqli_fetch_assoc($result);

	$query = "
		SELECT 
			users.name,
			books.nameOfBooks,
			books.favouriteSubject,
			books.favouriteSport,
			books.hobbies,
			books.id,
			subjects.subjectName,
			books.user,
			books.age
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
			books.dateUpdated = '{$row['dateUpdated']}' AND books.num_id = $commentNumber
		LIMIT
			1
	";
	
	$result = mysqli_query($p->dbToken, $query);
	
	$errTxt = mysqli_error($p->dbToken);	
	
	print_r($errTxt);
	
	
	if($result)
	{
		$num_rows = mysqli_num_rows($result);
		
		if($num_rows > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				
				$p->output .= 
				'
					<div class="' .$p->bord_con_class['class']. '">
					
						<div>
							' . $row['name'];
					$p->output	.= '</div>';
				
					$p->output .= ' 
						<div>
							<form action="/library/comment/'."$commentNumber".'" method="post" id="form">
							FavouriteSubject :	<input name="favouriteSubject" type="text" readonly id="favouriteSubject" value="'.$row['subjectName'].'"/>
								<div style="float:right;">
									FavouriteSport : <input name="favouriteSport" readonly type="text" id="favouriteSport" value="'.$row['favouriteSport'].'"/>
								</div>
						</div>';
					/*
						If the user login he can see edit button and delete button
					*/
					$p->output .= '
						<p class="'.$p->content['class'].'">
							<textarea name="booksTakenName" id="nameOfBooks">
								'.$row['nameOfBooks'].'
							</textarea>
						</p>
						Hobbies : <input name="hobbies" type="text" id="hobbies" readonly value="' . $row['hobbies'] . '"/>
						<button type="button" id="btn" name="submit">
							Submit
						</button>
						</form>
				</div>';
			}
		}
	}
	
	$p->bodyScripts[]['code'] = 
	'	
		buttonElement = document.getElementById("btn");
		
		buttonElement.addEventListener("click", sendData);
		
		var page = "/library/'.$commentNumber.'";
		
		function sendData()
		{
			var formElement = document.getElementById("form");
			
			var formData = new FormData(formElement);
			
			formData.append("favouriteSubject", "'.$row['subjectName'].'");
			
			url = "";
			
			for(var i = 0; i < document.forms[0].elements.length-1; i++)
			{
				url += formElement.elements[i].name;
				
				url += "=";
				
				url += formElement.elements[i].value.trim();
				
				url += "&";
			}
			
			url += "submit=";
			
			var request = new XMLHttpRequest();
			
			request.open("POST", page, true);
			
			request.setRequestHeader("JSREQ", "1");
			
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			request.onreadystatechange = function () {
							if(request.readyState == 4)
							{
								console.log(request.responseText);
								$("'.$p->bord_con_class['class'].'").html(request.responseText);
							}
			};
			
			request.send(url);
		}
		/*
		function cnstValue(id)
		{
			$("#id").attr("readonly", "true");
			$("#id").css("border", "0px");
			$("#id").css("background", "inherit");
		}
		function editValue(id)
		{
			$("#id").removeAttr("readonly");
			$("#id").css("border", "2px");
			$("#id").css("background", "white");
		}
		*/
		$("#favouriteSubject").focus(function(){
					$("#favouriteSubject").removeAttr("readonly");
					$("#favouriteSubject").css("border", "2px");
					$("#favouriteSubject").css("background", "white");});
		
		$("#favouriteSport").focus(function(){
					$("#favouriteSport").removeAttr("readonly");
					$("#favouriteSport").css("border", "2px");
					$("#favouriteSport").css("background", "white");});
		
		$("#hobbies").focus(function(){
					$("#hobbies").removeAttr("readonly");
					$("#hobbies").css("border", "2px");
					$("#hobbies").css("background", "white");});
		
		$("#nameOfBooks").focus(function(){
					$("#nameOfBooks").removeAttr("readonly");
					$("#nameOfBooks").css("border", "2px");
					$("#nameOfBooks").css("background", "white");});
		
		$("#favouriteSubject").blur(function(){
							$("#favouriteSubject").attr("readonly", "true");
							$("#favouriteSubject").css("border", "0px");
							$("#favouriteSubject").css("background", "skyblue");
							sendData();
						});
		$("#favouriteSport").blur(function(){
							$("#favouriteSport").attr("readonly", "true");
							$("#favouriteSport").css("border", "0px");
							$("#favouriteSport").css("background", "skyblue");
							sendData();
						});
		
		$("#hobbies").blur(function(){
							$("#hobbies").attr("readonly", "true");
							$("#hobbies").css("border", "0px");
							$("#hobbies").css("background", "skyblue");
							sendData();
						});
		$("#nameOfBooks").blur(function(){
							$("#nameOfBooks").attr("readonly", "true");
							$("#nameOfBooks").css("border", "0px");
							$("#nameOfBooks").css("background", "moccasin");
							sendData();
						});
		
	';
	
?>
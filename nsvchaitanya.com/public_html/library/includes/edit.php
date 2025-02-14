<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	
/*
In cludes function files
*/
	$query = "
	SELECT
		* 
	FROM
	`chaitanya_useraccounts`.`books`
	WHERE
	`books`.`id` = $editId";
	
/*
If condition that is user wants to edit the code and gets the details of the player
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

	$result = mysqli_fetch_assoc($result);
/*
Details of the student are caught in variable
*/	
	$p->output .= editingForm($result['user'], $result['age'], $result['favouriteSport'], $result['due'], $result['nameOfBooks'], $editId);
/*
User is given a form to fill details and edit the changes
*/	
	$p->output_footer .= 
			"<script>
				var formElement = document.getElementById('form');
				
				formElement.elements[3][" . $result['favouriteSubject'] . "].selected = true;
				
				switch('".$result['favouriteSport']."')
				{
					case 'cricket':
					{
						formElement.elements[4].checked = true;
						break;
					}
					case 'Football':
					{
						formElement.elements[5].checked = true;
						break;
					}
					case 'Hockey':
					{
						formElement.elements[6].checked = true;
						break;
					}
					case 'Kabaddi':
					{
						formElement.elements[7].checked = true;
						break;
					}
				}
				var a = '".$result['hobbies']."';
				
				var b = a.split(',');console.log(b);
				b.forEach(function(element){
					switch(element)
					{
						case 'Reading':
						{
							formElement.elements[8][2].selected = true;
							break;
						}
						case 'Playing':
						{
							formElement.elements[8][1].selected = true;
							break;
						}
						case 'Listening to music':
						{
							formElement.elements[8][3].selected = true;
							break;
						}
						case 'Watching movies':
						{
							formElement.elements[8][4].selected = true;
							break;
						}
						case 'Trekking':
						{
							formElement.elements[8][5].selected = true;
							break;
						}
						case 'Hiking':
						{
							formElement.elements[8][6].selected = true;
							break;
						}
					}
				});
			</script>";

?>
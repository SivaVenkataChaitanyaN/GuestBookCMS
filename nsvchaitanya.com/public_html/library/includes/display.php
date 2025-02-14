<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	
	$dAction = 'del';
	
	$eAction = 'edit';
	
	$db = new mysqli('127.0.0.1', 'chaitanya', 'Chaitanya', 'chaitanya_useraccounts');
	
	$numPerPage = 4;
	
	$query = "
		SELECT
			count(*) as numberOfRecords
		FROM
			books
	";
	
	$result = mysqli_query($p->dbToken, $query);
	
	$row = mysqli_fetch_assoc($result);
	
	$numberOfRecords = $row['numberOfRecords'];
	
	$numberOfPages = ceil($numberOfRecords/$numPerPage);

	$startAt = $numPerPage * ($currentPage - 1);
	
	$startAt++;
	
	for($i = $startAt; $i<$startAt+4;$i++)
	{
		if(isset($_SESSION['user']))
		{
			$p->output .= userDisplay($i, $p->dbToken);
			/*
				With form html data
			*/
		}
		else
		{
			$p->output .= display($i, $p->dbToken);
			/*
				Without form
			*/
		}
	}
	
	$p->title = 'Guest Book Comments';
	
	$p->output .= '<div class="'.$p->pag_nav_class['class'].'">';
	
	$numlinks = 4;
	
	$p->output .= page_nav($numlinks, $currentPage, $numberOfPages);
	
	$p->output .= '</div></main>';
	
	
	$p->bodyScripts[]['code'] = '
		var page = "/library/submit/";
		
		var menuElement = document.getElementById("menu");
		
		var divHiddenElement = document.getElementById("div_hid_menu");
		
		divHiddenElement.addEventListener("click", menuToggle, true);
		/*
			Click event is added to that element and menuToggle is called when clicked
		*/
		
		function sendData(editedElement)
		{
			var caughtFormElement = editedElement.closest(".form");
			
			formData = new FormData(caughtFormElement);
			
			var dataToSend = new URLSearchParams(formData).toString();
			
			$.ajax({
				type: "POST",
				url: "/library/submit/",
				headers:{"JSREQ": "1"},
				data: dataToSend,
				success : function(response) {
					var output = JSON.parse(response);
					
					var parentDivBox = editedElement.closest(".div_border_on");
					
					parentDivBox.outerHTML = output["html"];
					
					eval(output["java"]);
				}
			});
			/*
			var request = new XMLHttpRequest();
			
			request.open("POST", page, true);
			
			request.setRequestHeader("JSREQ", "1");
			
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			request.responseType = "text";
			
			request.onreadystatechange = function () {
							if(request.readyState == 4)
							{
								var editableDiv = editedElement.closest(".div_border_on");
								
								$(editableDiv).replaceWith(request.response);
								
								// $(editableDiv).html(request.response);
							}
			};
			request.send(dataToSend);
			*/
		}
		
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
		
		
		$(":button").each(function(){$(this).on("click", function(){$(this).siblings(".content").slideToggle(600);})});
		/*
			Adds click event listener and on one click on button div_border slide up and on dbl click on 
		*/
		
		eventCreation();
	';	

?>
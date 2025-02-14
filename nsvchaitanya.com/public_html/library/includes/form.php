<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	/*
		If the element it is indicating that form is submitted
	*/
	$p->title = 'Submitting Comments';
	
	if(isset($_POST['age']))
	{
		echo 'You already submitted';
	}
	/*
		Either form is displayed
	*/
	else
	{
		$p->output .= buildingForm();
	}
	$p->output .= '</main>';
	
	$p->bodyScripts[]['code'] = 
	'
		var canSend;
		
		function checkName()
		{
			var errMsg = "";
			
			var curId = $("#id").val();
			
			errMatch = curId.match(/[^0-9 ]+/g);
			
			curId = curId.replace(/[^0-9 ]+/g, " ").replace(/\s+/, " ").replace(/^\s+|\s+$/, "");
			
			$("#id").val(curId);
			
			if(errMatch != null)
			{
				errMsg = "Only Numerics";
			}
			
			else if(curId.length == 0)
			{ 
				errMsg = "Required"; 
			}
			
			if(errMsg != "")
			{ 
				$(".span_id_error").html(errMsg).show(); 
				canSend = false; 
			}
			else
			{ 
				canSend = true; 
			}
		}
		
		$("#id").on("blur", checkName);
		
		$("#id").on("focus", function(){$(".span_id_error").hide();});
		
		function checkAge()
		{
			var errMsg = "";
			
			var curAge = $("#age").val();
			
			var errMatch = curAge.match(/[^0-9]+/g);
			
			curAge = curAge.replace(/[^0-9]+/g, " ").replace(/\s+/, " ").replace(/^\s+|\s+$/, "");
			
			$("#age").val(curAge);
			
			if(errMatch != null)
			{
				errMsg = "Only Numerics";
			}
			
			else if(curAge.length == 0)
			{ 
				errMsg = "Required"; 
			}
			
			else if(curAge.length > 3)
			{
				errMsg = "Length < 4";
				
				$("#age").val("");
			}
			if(errMsg != "")
			{ 
				$(".span_age_error").html(errMsg).show();
				
				canSend = false; 
			}
			else
			{ 
				canSend = true; 
			}
		}
		
		$("#age").on("blur", checkAge);
		
		$("#age").on("focus", function(){$(".span_age_error").hide();});
		
		function checkBooks()
		{
			var errMsg = "";
			
			var curBooks = $("#booksTaken").val();
			
			if(curBooks.length == 0)
			{ 
				errMsg = "Required"; 
			}
			if(errMsg != "")
			{ 
				$(".span_books_error").html(errMsg).show(); 
				
				canSend = false; 
			}
			else
			{ 
				canSend = true; 
			}
		}
		$("#booksTaken").on("blur", checkBooks);
		
		$("#booksTaken").on("focus", function(){$(".span_books_error").hide();});
		
		function checkSubject()
		{
			var errMsg = "";
			
			var curSubjectValue = $("#subject").val();
			
			if(curSubjectValue == 0)
			{ 
				errMsg = "Required"; 
			}
			if(errMsg != "")
			{ 
				$(".span_subject_error").html(errMsg).show(); 
				
				canSend = false; 
			}
			else
			{ 
				canSend = true; 
			}
		}
		$("#subject").on("blur", checkSubject);
		
		$("#subject").on("focus", function(){$(".span_subject_error").hide();});
		
		function checkHobbies()
		{
			var errMsg = "";
			
			var curHobbiesValue = $("#hobbies").val();
			
			if(curHobbiesValue.length == 0 || curHobbiesValue == 0)
			{ 
				errMsg = "Required"; 
			}
			if(errMsg != "")
			{ 
				$(".span_hobbies_error").html(errMsg).show(); 
				
				canSend = false; 
			}
			else
			{ 
				canSend = true; 
			}
		}
		$("#hobbies").on("mouseleave", checkHobbies);
		
		$("#hobbies").on("mouseenter", function(){$(".span_hobbies_error").hide();});
		
		function checkSport()
		{
			var formElement = document.getElementById("form");
			
			var errMsg = "";
			
			var curSportBool = "false";
			
			for(var i = 4;i < 7;i++)
			{
				if(formElement.elements[i].checked)
				{
					if(curSportBool == "true")
					{
						break;
					}
					curSportBool = "true";
				}
			}
			if(curSportBool == "false")
			{ 
				errMsg = "Required"; 
			}
			if(errMsg != "")
			{ 
				$(".sport_error").html(errMsg).show(); 
				
				canSend = false; 
			}
			else
			{ 
				canSend = true; 
			}
		}
		$(".radio_element").on("mouseleave", checkSport);
		
		$(".radio_element").on("mouseenter", function(){$(".sport_error").hide();});
		
		$("#slideToggle").on("mouseenter", function(){$("#hobbies").css("height", "70px");});
		
		$("#hobbies").on("mouseleave", function(){$("#hobbies").css("height", "20px");});
		
		function submissionCheck()
		{
			checkName();
			checkBooks();
			checkAge();
			if(canSend)
			{
				$("#btn").attr("type", "submit");
			}
		}
		$("#btn").on("click", submissionCheck);
	';
?>
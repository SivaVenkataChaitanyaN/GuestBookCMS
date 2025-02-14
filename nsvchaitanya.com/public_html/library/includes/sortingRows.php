<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	

	$query = "
		SELECT 
			count(*) as numberOfRecords 
		FROM 
			`domain`
	";
	
	if(isset($pageNumber))
	{
		$currentPage = $pageNumber;
	}
	else
	{
		$currentPage = 1;
	}
	
	$numPerPage = 30;
	
	$result = mysqli_query($p->dbToken, $query);
	
	$row = mysqli_fetch_assoc($result);
	
	$numberOfRecords = $row['numberOfRecords'];
	
	$numberOfPages = ceil($numberOfRecords/$numPerPage);

	$startAt = $numPerPage * ($currentPage - 1);
	
	if(isset($_POST['tableColumn'])&& isset($_POST['order']))
	{
		if($_POST['order'])
		{
			$order = "DESC";
		}
		else
		{
			$order = "ASC";
		}
		
		$query = "
			SELECT 
				* 
			FROM 
				`domain` 
			ORDER BY 
				{$_POST['tableColumn']} 
			{$order}
			LIMIT
				{$startAt}, 30
		";
		
	}
	else
	{
		$query = "
			SELECT 
				*
			FROM 
				`domain`
			LIMIT
				{$startAt}, 30
		";
	}
	
	$result = mysqli_query($p->dbToken, $query);
	
	$flag = 1;
	
	while($row = mysqli_fetch_assoc($result))
	{
		if($flag)
		{
			foreach($row as $k => $v)
			{
				$p->output .= $k;
				
				$p->output .= '###';
			}
			
			$p->output .= '&&&';
			
			foreach($row as $k => $v)
			{
				$p->output .= $v;
				
				$p->output .= '###';
			}
			
			$p->output .= '&&&';
			
			$flag = 0;
		}
		else
		{
			foreach($row as $v)
			{
				$p->output .= $v;
				
				$p->output .= '###';
			}
			
			$p->output .= '&&&';
		}
	}
	
	$p->output .= '<div class="div_pag_nav">';
	
	$numlinks = 4;
	
	$p->output .= client_page_nav($numlinks, $currentPage, $numberOfPages);
	
	$p->output .= '</div></main>';
	
	
	$p->bodyScripts[]['code'] = '
				var j = 0;
		
		var previousElement;
		
		var choice = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		
		var decision = 0;
		
		var pageNumber = 1;
		
		function creationOfTable(content)
		{
			/*
				To get page numbers in main element
			*/
			var pageElement = document.getElementsByClassName("div_pag_nav")[0];
			
			if(content == "")
			{
				var mainContent = document.querySelector("main").textContent;
				
				var rows = mainContent.split("&&&");
			
				var headerRow = rows[0].split("###");
				
				var htmlContent = "<button id="+"server"+">Server</button><span id="+"client"+">Client</span>";
				
				/*
					To hold table element html code
				*/
				htmlContent += "<table><thead><tr>";
				/*
					HeaderRow contains table header elements
				*/
				for(var i = 0; i < headerRow.length-1;i++)
				{
					htmlContent += "<th>";
					
					htmlContent += headerRow[i];
					
					htmlContent += "<img src="+"/library/images/arrow.png"+" class="+"icon_asc"+" />";
					
					htmlContent += "</th>";
				}
				htmlContent += "</tr></thead><tbody>";
				
				/*
					To create rows in table 
				*/
				for(var k = 1;k < rows.length - 1;k++)
				{
					var columns = rows[k].split("###");
					
					htmlContent += "<tr>";
					
					for(var m = 0; m < columns.length-1;m++)
					{
						htmlContent += "<th>";
						
						htmlContent += columns[m];
						
						htmlContent += "</th>";
					}
					htmlContent += "</tr>";
					
				}
				
				htmlContent += "</tbody></table>";
				/*
					Add page navigation html code back to main element html code
				*/
				htmlContent += "<div class="+"div_pag_nav"+">";
				
				htmlContent += pageElement.innerHTML;
				
				htmlContent += "</div>";
				
				document.querySelector("main").innerHTML = htmlContent;
			}
			else
			{
				var mainContent = content;
				
				var rows = mainContent.split("&&&");
				
				/*
					To create rows in table 
				*/
				for(var k = 1;k < rows.length - 1;k++)
				{
					var columns = rows[k].split("###");
					
					htmlContent += "<tr>";
					
					for(var m = 0; m < columns.length-1;m++)
					{
						htmlContent += "<th>";
						
						htmlContent += columns[m];
						
						htmlContent += "</th>";
					}
					htmlContent += "</tr>";
					
				}
				
				$("tbody").html(htmlContent);
				
				var navigationalContent = rows[k];
				
				document.getElementsByClassName("div_pag_nav")[0].outerHTML = navigationalContent;
				
				if(decision == 0)
				{
					var theadChildren = document.querySelector("thead").children[0];
				
					theadChildren.children[previousElement].children[0].style.visibility = "hidden";
				
					theadChildren.children[0].children[0].style.visibility = "visible";
				
					previousElement = 0;
				}
			}
		}
		
		creationOfTable("");
		
		function sorted (clickedElement)
		{
			var content = "";
			
			/*$("table").css("animation", "clickEffect 25s ease-in-out");*/
			
			$("table").css("opacity", "0.1");
			/*
				To get on which column user clicked
			*/
			if(clickedElement == undefined)
			{
				clickedElement = this.innerText;
			}
			
			switch(clickedElement)
			{
				case "GlobalRank":
				{
					j = 0;
					
					break;
				}
				case "TldRank":
				{
					j = 1;
					
					break;
				}
				case "Domain":
				{
					j = 2;
					
					break;
				}
				case "TLD":
				{
					j = 3;
					
					break;
				}
				case "RefSubNets":
				{
					j = 4;
					
					break;
				}
				case "RefIPs":
				{
					j = 5;
					
					break;
				}
				case "IDN_Domain":
				{
					j = 6;
					
					break;
				}case "IDN_TLD":
				{
					j = 7;
					
					break;
				}
				case "PrevGlobalRank":
				{
					j = 8;
					
					break;
				}
				case "PrevTldRank":
				{
					j = 9;
					
					break;
				}
				case "PrevRefSubNets":
				{
					j = 10;
					
					break;
				}
				case "PrevRefIPs":
				{
					j = 11;
					
					break;
				}
			}
			var theadChildren = document.querySelector("thead").children[0];
			
			if(previousElement == undefined)
			{
				theadChildren.children[j].children[0].style.visibility = "visible";
				
				previousElement = j;
			}
			else
			{
				theadChildren.children[previousElement].children[0].style.visibility = "hidden";
				
				theadChildren.children[j].children[0].style.visibility = "visible";
				
				previousElement = j;
			}
			
			theadChildren.children[j].children[0].style.transform = "rotate(1turn)";
			/*
				Based on j value, Appropriate children value is taken
				Case 0: For first time 
				Case 1: After arrangement
				Case 2: For reverse arrangement
			*/
			if(decision == 1)
			{
				var page = "/library/sortingRows/"+pageNumber;
				
				var request = new XMLHttpRequest();
			
				request.open("POST", page, true);
			
				request.setRequestHeader("JSREQ", "1");
			
				request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				
				request.onreadystatechange = function () {
							if(request.readyState == 4)
							{
								creationOfTable(request.response);
								
								eventLis();
							}
				};
				
				var dataToSend = "tableColumn="+clickedElement+"&order="+choice[j];
				
				request.send(dataToSend);
				
				$("table").css("opacity", "1");
				
				if(choice[j])
				{
					theadChildren.children[j].children[0].style.transform = "rotate(0.5turn)";
					
					choice[j] = 0;
				}
				else
				{
					choice[j] = 1;
				}
			}
			else
			{
				
				var keys = new Array();
				
				var values = new Array();
				
				var tbodyChildren = document.querySelector("tbody").children;
				
				if(choice[j] == 0)
				{
					var match = new Array();
					
					for(var i = 0;i<30;i++)
					{
						keys.push(tbodyChildren[i].innerHTML);
						match.push(tbodyChildren[i].children[j].innerHTML);
						values.push(tbodyChildren[i].children[j].innerHTML);
					}
					/*
						To differentiate numbers and alphabets
					*/
					
					if(isNaN(parseInt(values[0])))
					{
						values.sort();
					}
					else
					{
						values.sort(function(a,b){return a-b;});
					}
					/*
						Content and reverse Content contains data of rows arrangement
					*/
					
					values.forEach(function(element) {
						var indx = match.indexOf(element);
						
						match[indx] = "";
						
						var rows = "<tr>";
						
						rows += keys[indx];
						
						rows += "</tr>";
						
						content += rows;
						
					});
					
					choice[j] = 1;
				}
				else
				{
					theadChildren.children[j].children[0].style.transform = "rotate(0.5turn)";
					
					var rmatch = new Array();
			
					var values1 = new Array();
			
					for(var i = 0;i<30;i++)
					{
						keys.push(tbodyChildren[i].innerHTML);
						rmatch.push(tbodyChildren[i].children[j].innerHTML);
						values.push(tbodyChildren[i].children[j].innerHTML);
					}
					values1 = values.reverse();
					
					content = "";
					
					values1.forEach(function(element) {

						var indx = rmatch.indexOf(element);
						
						rmatch[indx] = "";
						
						var rows = "<tr>";
						
						rows += keys[indx];
						
						rows += "</tr>";
						
						content += rows;
					});
					
					previousContent = content;
					
					choice[j] = 0;
				}
				
				document.querySelector("tbody").innerHTML = content;
				
				$("table").css("opacity", "1");
			}
		}
		
		function events(){
			var b  = document.querySelector("thead").children[0].children;
			
			for(var n = 0;n < 12;n++)
			{
				b[n].addEventListener("click", sorted);
			}
			
		}
		/*events();*/
		
		$("main").on("click", "thead", (element) =>{sorted(element.target.innerText);});
		/*
			Ajax call
		*/
		function link()
		{
			if($(this).html() == "F")
			{
				pageNumber = 1;
			}
			else if($(this).html() == "L")
			{
				pageNumber = 34;
			}
			else
			{
				pageNumber = $(this).html();
			}
			
			var page = "/library/sortingRows/" + pageNumber;
			
			var request = new XMLHttpRequest();
			
			request.open("POST", page, true);
			
			request.setRequestHeader("JSREQ", "1");
			
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			request.onreadystatechange = function () {
							if(request.readyState == 4)
							{
								creationOfTable(request.response);
								eventLis();
							}
			};
			var theadChildren = document.querySelector("thead").children[0];
			
			if(decision)
			{
				var order;
				if(choice[j])
				{
					order = 0;
				}
				else
				{
					order = 1;
				}
				
				var dataToSend = "tableColumn="+theadChildren.children[previousElement].innerText+"&order="+order;
				
				request.send(dataToSend);
			}
			else
			{
				request.send(null);
			}
		}
		
		function eventLis(){
			$(".div_pag_nav").children().each(
				function()
				{
					$(this).on("click", link);
				}
			);
		}
		eventLis();
		
		$("main").on("click", "button", (element) =>{
			if(element.target.innerHTML == "Server")
			{
				decision = 1;
				document.getElementById("server").outerHTML = "<span id="+"server"+">Server</span>";
				document.getElementById("client").outerHTML = "<button id="+"client"+">Client</button>";
			}
			if(element.target.innerHTML == "Client")
			{
				decision = 0;
				document.getElementById("client").outerHTML = "<span id="+"client"+">Client</span>";
				document.getElementById("server").outerHTML = "<button id="+"server"+">Server</button>";
			}
		});
	
		
	';
?>
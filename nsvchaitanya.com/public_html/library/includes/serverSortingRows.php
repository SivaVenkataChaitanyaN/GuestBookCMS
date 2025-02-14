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
	
	$query = "
		SELECT 
			*
		FROM 
			`domain`
		LIMIT
			{$startAt}, 30
	";
	
	
	$result = mysqli_query($p->dbToken, $query);
	
	// $error = mysqli_error($p->dbToken);
	
	// print_r($error);exit;
	
	$flag = 1;
	
	$p->output .= '
		<table class="table_style">
	';
	
	while($row = mysqli_fetch_assoc($result))
	{
		if($flag)
		{
			$p->output .= '<thead><tr>
			';
			
			foreach($row as $k => $v)
			{
				$p->output .= 
				'
					<th id="'.$k.'">
						'.$k.'
					</th>
					
				';
			}
			$p->output .= '</tr></thead><tbody>';
			
			$p->output .= '<tr>
			';
			
			foreach($row as $k => $v)
			{
				$p->output .= 
				'
					<th>
						'.$v.'
					</th>
					
				';
			}
			$p->output .= '</tr>';
			
			$flag = 0;
		}
		else
		{
			$p->output .= '<tr>';
			
			foreach($row as $v)
			{
				$p->output .= 
				'
					<th>
						'.$v.'
					</th>
				';
			}
			
			$p->output .= '</tr>';
		}
	}
	$p->output .= '</tbody></table>';
	
	$p->output .= '<div class="'.$p->pag_nav_class['class'].'">';
	
	$numlinks = 4;
	
	$p->output .= sortingRows_page_nav($numlinks, $currentPage, $numberOfPages);
	
	$p->output .= '</div></main>';
	
	
	$p->bodyScripts[]['code'] = '
		var decision = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		
		
		
		var content = new Array();
		
		var rContent = new Array();
		
		var j = 0;
		
		function sorted ()
		{
			console.log(decision);
			
			switch(this.innerText)
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
			console.log(j);
			/*
				Based on j value, Appropriate children value is taken
				Case 0: For first time 
				Case 1: After arrangement
				Case 2: For reverse arrangement
			*/
			switch(decision[j])
			{
				case 0:
				{
					var keys = new Array();
					var values = new Array();
					var match = new Array();
					var rmatch = new Array();
					
					var tbodyChildren = document.querySelector("tbody").children;
					
					for(var i = 0;i<30;i++)
					{
						keys.push(tbodyChildren[i].innerHTML);
						match.push(tbodyChildren[i].children[j].innerHTML);
						rmatch.push(tbodyChildren[i].children[j].innerHTML);
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
					
					content[j] = "";
					
					rContent[j] = "";
					
					values.forEach(function(element) {
						var indx = match.indexOf(element);
						
						match[indx] = "";
						
						var rows = "<tr>";
						
						rows += keys[indx];
						
						rows += "</tr>";
						
						content[j] += rows;
						
					});
					
					values1 = values.reverse();
					
					values1.forEach(function(element) {
						var indx = rmatch.indexOf(element);
						
						rmatch[indx] = "";
						
						var rows = "<tr>";
						
						rows += keys[indx];
						
						rows += "</tr>";
						
						rContent[j] += rows;
						
					});
					
					document.querySelector("tbody").innerHTML = content[j];
					
					decision[j]++;
					
					console.log(content[j]);
					console.log(rContent[j]);
					
					break;
					
					
				}
				
				case 1:
				{
					console.log(rContent[j]);
					
					document.querySelector("tbody").innerHTML = rContent[j];
					
					decision[j]++;
					
					break;
				}
				
				case 2:
				{
					document.querySelector("tbody").innerHTML = content[j];
					
					decision[j]--;
					
					break;
				}
				
			}
		}
		function events(){
			var b  = document.querySelector("thead").children[0].children;
			for(var n = 0;n < 12;n++)
			{
				b[n].addEventListener("click", sorted);
			}
			
		}
		events();
	';
?>
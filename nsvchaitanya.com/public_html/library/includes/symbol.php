<?php
	$fileContent = file_get_contents("C:/Users/Chaitanya/Documents/Learn/raw/symbol.txt");
	
	$p->output .= $fileContent;
	
	$p->bodyScripts[]['code'] = '
		var fileContent = document.getElementById("main_width").innerText;
		
		fileContent = fileContent.substring(fileContent.indexOf(" ")+1, fileContent.length);
		
		var lines = fileContent.split(",");
		
		var company = new Array();
		
		company.push("");
		
		var iterator = 1;
		
		var flag = 1;
		
		var content = "";
		
		var basic;
		
		lines.forEach(function(v){
			if(iterator == 1)
			{
				if(company.indexOf(v) == -1)
				{
					company.push(v);
				}
				
				var i = company.indexOf(v);
				
				content += i+",";
				
				iterator++;
			}
			else if(iterator == 2)
			{
				if(flag)
				{
					basic = Date.parse(v);
					
					flag = 0;
				}
				
				content += (Date.parse(v) - basic)+",";
				
				iterator++;
			}
			else
			{
				v = v.split(" ");
				
				content += v[0]+"\n";
				
				if(company.indexOf(v[1]) == -1)
				{
					company.push(v[1]);
				}
				
				var i = company.indexOf(v[1]);
				
				content += i+",";
				
				iterator = 2;
			}
		});
		console.log(content);
	';
?>
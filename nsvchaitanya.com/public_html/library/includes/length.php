<?php
	$fileContent = file_get_contents("C:/Users/Chaitanya/Documents/Learn/raw/length.txt");
	
	$p->output .= $fileContent;
	
	$p->bodyScripts[]['code'] = '
		var fileContent = document.getElementById("main_width").innerText;
		
		var lines = fileContent.split(",");
		
		var content = "";
		
		var species = new Array();
		
		species.push("");
		
		var iterator = 1;
		
		lines.forEach(function(v){
			
			v = v.split(":");
			
			if(v[0] == " \"species\"")
			{
				if(species.indexOf(v[1]) == -1)
				{
					species.push(v[1]);
				}
				
				var i = species.indexOf(v[1]);
				
				content += i+"\n";
			}
			else
			{
				content += v[1]+",";
			}
		});
		
		console.log(content);
	';
?>
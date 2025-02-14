<?php
	$fileContent = file_get_contents("C:/Users/Chaitanya/Documents/Learn/raw/series.txt");
	
	$p->output .= $fileContent;
	
	$p->bodyScripts[]['code'] = '
		
		var fileContent = document.getElementById("main_width").innerText;
		
		var lines = fileContent.split(",");
	
		var iterator = 0;
		
		var content = "";
		
		lines.forEach(function(v)
		{
			if(iterator == 0)
			{
				iterator++;
			}
			else
			{
				var values = v.split(":");
				
				content += values[1];
				
				iterator++;
				
				switch(iterator)
				{
					case 2:
					{
						content += ",";
						
						break;
					}
					case 3:
					{
						content = content.trim();
						
						content = content.substring(0, content.length - 2);
						
						content += "\n";
						
						iterator = 0;
						
						break;
					}
				}
			}
		});
		
		content = content.trim();
		
		content = content.substring(0, content.length - 1);
		
		content = content.trim();
		
		content = content.substring(0, content.length - 1);
		
		content = content += "\n";
		
		console.log(content);
	
	';
?>
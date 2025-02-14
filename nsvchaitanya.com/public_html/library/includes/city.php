<?php
	$fileContent = file_get_contents("C:/Users/Chaitanya/Documents/Learn/raw/city.txt");
	
	$p->output .= $fileContent;
	
	$p->bodyScripts[]['code'] = '
		var fileContent = document.getElementById("main_width").innerText;
		
		fileContent = fileContent.substring(fileContent.indexOf(" ")+1, fileContent.length);
		var lf;
		var iterator = 1;
		
		var content = "";
		
		while(fileContent.indexOf(",") > 0)
		{
			var index = fileContent.indexOf(",");
			
			if(iterator == 5)
			{
				lf = fileContent;
				
				var sindex = fileContent.indexOf(" ");
				
				if(sindex > 0)
				{
					content += fileContent.substring(index+1, sindex);
				
					content += "\n";
				
					fileContent = fileContent.substring(sindex+1, fileContent.length);
				}
				else
				{
					index = fileContent.indexOf(",");
					
					content += fileContent.substring(index+1, fileContent.length);
					
					fileContent = "";
				}
				iterator = 1;
			}
			else
			{
				fileContent = fileContent.substring(index+1, fileContent.length);
				
				iterator++;
			}
		}
		console.log(content);
		
	';	
?>
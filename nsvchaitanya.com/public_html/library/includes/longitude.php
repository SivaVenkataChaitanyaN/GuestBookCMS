<?php
	$fileContent = file_get_contents("C:/Users/Chaitanya/Documents/Learn/raw/longitude.txt");
	
	$p->output .= $fileContent;
	
	$p->bodyScripts[]['code'] = '
		var fileContent = document.getElementById("main_width").innerText;
		
		var lines = fileContent.split(" ");
		
		lines.shift();
		
		console.log(lines);
		
		var content = ""; 
		
		lines.forEach(function(v)
		{
			content += v;
			
			content += "\n";
		});
		
		console.log(content);
	';	
?>
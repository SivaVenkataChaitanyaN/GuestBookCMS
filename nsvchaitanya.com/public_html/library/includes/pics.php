<?php
	/*
	$content = file_get_contents("unimportant.txt");
	
	preg_match_all('/href="(.*?)"/', $content, $matches);
	
	$fileContent = "";
	
	foreach($matches[1] as $key=>$value)
	{
		$fileContent .= $value . "\n";
	}
	
	file_put_contents("unimportant/unimportant.txt",  $fileContent);
	
	// $content = file_get_contents("");
	
	// file_put_contents("unimportant5.txt",  $content);*/
	
	$fileName = "unimportant";
	
	for($i = 4;$i < 5;$i++)
	{
		$createdFileName = $fileName . $i . '.txt';
		
		$content = file_get_contents($createdFileName);
		
		preg_match_all('/src="(.*?)"/', $content, $matches);
		
		$imgList = array();
		
		foreach($matches[1] as $link)
		{
			if($pos = strrpos($link, '.'))
			{
				$fileExtension = substr($link, $pos+1);
				
				if($fileExtension == 'jpg' || $fileExtension == 'png')
				{
					array_push($imgList, $link);
				}
			}
		}
		
		
		mkdir('C:\\wamp64\\www\\testing.in\\public_html\\images\\dic_' . $i, 0777, TRUE);
		
		foreach($imgList as $key=>$value)
		{
			file_put_contents('C:/wamp64/www/testing.in/public_html/images/dic_'.$i.'/img_'.$key.'.jpg', file_get_contents($value));
		}
	}
	
?>
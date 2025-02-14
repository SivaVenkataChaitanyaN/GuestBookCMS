<?php
	$output = '';

	$cfgFile = 'C:/wamp64/www/cap.org/public_html/login.php';
	
	$content = file_get_contents($cfgFile);
	
	$tokens = token_get_all($content);
	
	foreach($tokens as $curKey=>$curVal)
	{
		if($curVal[0] === T_COMMENT)
		{
			$comment = $tokens[$curKey - 1][1] . $curVal[1];
			
			$comment = preg_replace('/(\/\*|\*\/)/', '', $comment);
			
			$comment = preg_replace('/\s+$/', '', $comment);
			
			$comment = preg_replace('/^\t{3}/m', "", $comment);
			
			$output .= str_replace('S>', $curVal[2] . '>' , $comment); 
		}			
	}
	
	echo $output;
?>	

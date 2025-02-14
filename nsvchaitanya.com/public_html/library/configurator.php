<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/test/configuration.php';
	/*
		S>Prevoius element key in post element is stored  
	*/
	
	$prevArrayKey = '';
	/*
		S>Number of levels of previous key  
	*/
	$prevArrayLevels;
	/*
		S>Configuration File
	*/
	$output = '';
	
	/*
		S>starting of configuration file
	*/
	
	$output .= '<?php
	class Configuration
	{
		public
	';
	/*
		S>Creating array based on key 
	*/
	function createArray($key, $value, $nlevel)
	{
		$output = '';
		
		$tabsInside = 0;
		
		/*
			Until levels are one, it keeps creating array inside array
		*/
		while($nlevel != 1)
		{
			// $output .= createSpace('Array', $tabsInside);
			
			$key = explode(':', $key, 2);
			
			$output .= "'".$key[0]."'".'=>array(';
			
			$key = $key[1];
			
			$nlevel--;
			
			$tabsInside++;
		}
		/*
			S>If level is one that means to add value to created array since
			key variable is created
		*/
		/*
			S>Since POST gives string of boolean value and integer
				which is not advised because it causes problem to Form
				So, Boolean values are stored as boolean not String
		*/
		if($nlevel == 1)
		{
			$output .= "'".$key."'".'=>';
			
			if($value == 'true')
			{
				$output .= "true";
			}
			elseif($value == 'false')
			{
				$output .= "false";
			}
			elseif(is_numeric($value))
			{
				$output .= $value;
			}
			else
			{
				$output .= "'".$value."'";
			}
		}
		
		return $output;
	}
	/*
		S>If key has more than it belongs Array category and
			Call createArray function
			
			IF it has one level it is just variable not array,
			No creating array
	*/
	function createFirstElement($key, $value, $levels)
	{
		$output = '';

		if($levels > 1)
		{
			$key = explode(':', $key, 2);
			
			$output .= '$'.$key[0].' = array(';
			
			$output .= createArray($key[1], $value, $levels-1);
		}
		else
		{
			$output .= '$';
			
			if($value == 'true')
			{
				$output .= $key.'='."true";
			}
			elseif($value == 'false')
			{
				$output .= $key.'='."false";
			}
			elseif(is_numeric($value))
			{
				$output .= $key.'='.$value;
			}
			else
			{
				$output .= $key.'='."'".$value."'";
			}
		}
		return $output;
	}
	/*
		S>Check with elements how many parts of key are equal to 
			Prevoius Array
	*/
	function checkWithPreviousArray($key, $prevArrayKey, $level, $prevLevel)
	{
		if($level <= $prevLevel)
		{
			$levels = $level;
		}
		else
		{
			$levels = $prevLevel;
		}
		
		$key = explode(':', $key);
		
		$prevArrayKey = explode(':', $prevArrayKey);
		
		for($i = 0; $i<= $levels; $i++)
		{
			if($key[$i] != $prevArrayKey[$i])
			{
				return $i;
				break;
			}
		}
		
	}
	/*
		S>For first element prevArrayKey is empty
	*/
	foreach($_POST as $key=>$value)
	{
		/*
			S>Gives you number of levels of key
		*/
		$levels = count(explode(':', $key));
		/*
			S>For first element of POST element it is true
		*/
		if(empty($prevArrayKey))
		{
			$prevArrayKey = $key;
			
			$prevArrayLevels = $levels;
			
			$output .= createFirstElement($key, $value, $levels);
		}
		
		else
		{
			$numOfPartsMatch = checkWithPreviousArray($key, $prevArrayKey, $levels, $prevArrayLevels);
			/*
				S>It gives you which level to write next key
			*/
			$whichlevel = $prevArrayLevels - $numOfPartsMatch - 1;
			/*
				S>No Parts are matched then it means it's time for new array 
					prevoius array or variable is ended 
			*/
			if($numOfPartsMatch == 0)
			{
				/*
					S>Based on previous array levels, array is ended,
						For variable it is not included because
						$prevArrayLevels = 1
				*/
				for($i = 1;$i < $prevArrayLevels;$i++)
				{
					$output .= '),';
				}
				/*
					S>Before creating sec array there is a text which cannot extracted 
						From form
									AND
						For define we add different texture
				*/
				
				$checkWriteUp = explode(':', $key, 2);
				
				if($checkWriteUp[0] == 'sec')
				{
					$output = rtrim($output, ',');
					
					$text = ';
					function __construct($sec)
					{
						/*
							To remove error
						*/
						define("DOC_ROOT", "bg8buy-d0g8");
							/*
								S> FLAG - HOST is Development Server 
							*/
						define("IS_DEVELOPMENT_SERVER", (bool) preg_match("/cap\.org\.in\/www/", DOC_ROOT));
						
							/*
								S> FLAG - HOST is Test Server 
							*/
						define("IS_TEST_SERVER", (bool) preg_match("/(alpha|beta)\./", $_SERVER["HTTP_HOST"]));
						
							/*
								S> FLAG - HOST is Production Server
							*/
						define("IS_PRODUCTION_SERVER", !IS_DEVELOPMENT_SERVER && !IS_TEST_SERVER);
						
						self::defineConstants();

						$this->sec = array(
					';
					
					$output .= preg_replace('/"/', '\'', $text);
					
					$prevArrayKey = $key;
			
					$prevArrayLevels = $levels;
					
					/*
						S>After adding text creating array for element
					*/
					
					$output .= createArray($checkWriteUp[1], $value, $levels-1);
				
				}
				elseif($checkWriteUp[0] == 'define')
				{
					/*
						S>When u adding text containing function we add semi colon
					*/
					$output = rtrim($output, ',');
					
					$output .= ';}private function defineConstants(){';
					
					$output .= 'define('."'$checkWriteUp[1]'".', '."'$value'".');';
					
					$prevArrayKey = $key;
				
					$prevArrayLevels = $levels;
				}
				else
				{
					$prevArrayKey = $key;
				
					$prevArrayLevels = $levels;
					
					/*
						S>It is a new element
					*/
					
					$output .= createFirstElement($key, $value, $levels);
				}
				/*
					S>For variable 
				*/
				if($levels == 1)
				{
					$output .= ',';
				}
			}
			/*
				S>If same array elements are on same level
			*/
			elseif($whichlevel == 0)
			{
				$prevArrayKey = $key;
				
				$prevArrayLevels = $levels;
				
				$key = explode(':', $key, $numOfPartsMatch+1);
				
				if($key[0] == 'define')
				{
					if($value == 'true')
					{
						$output .= 'define('."'$key[1]'".', '."true".');';
					}
					elseif($value == 'false')
					{
						$output .= 'define('."'$key[1]'".', '."false".');';
					}
					else
					{
						$output .= 'define('."'$key[1]'".', '."'$value'".');';
					}
				}
				else
				{
					$relevel = count(explode(':', $key[$numOfPartsMatch]));
					
					$output .= ', ';
					
					$output .= createArray($key[$numOfPartsMatch], $value, $relevel);
				}
			}
			/*
				S>If same array elements but they are on different level
			*/
			else
			{
				$prevArrayKey = $key;
				
				$prevArrayLevels = $levels;
				
				/*
					S>Difference in levels balanced by closing array
				*/
				
				for($i = 0; $i < $whichlevel;$i++)
				{
					$output .= '),';
				}
				/*
					S>Start building array with unmatched elements 
						because matched are constructed by previous key
				*/
				$key = explode(':', $key, $numOfPartsMatch+1);
				
				$relevel = count(explode(':', $key[$numOfPartsMatch]));
				
				$output .= createArray($key[$numOfPartsMatch], $value, $relevel);
				
			}
			
		}
	}
	
	$text = '
			if(IS_DEVELOPMENT_SERVER)
			{
				define("HOST_PROTOCOL", "http");
			}
			else 
			{
				define("HOST_PROTOCOL", "https");
			}
		}
	}
	?>';
	
	$output .= preg_replace('/"/', '\'', $text);
	
	$fileOutput = file_get_contents(rtrim($_SERVER['DOCUMENT_ROOT'], '/')."/test/configuration.php");
	
	file_put_contents(rtrim($_SERVER['DOCUMENT_ROOT'], '/')."/test/back_configuration.php", $fileOutput);
	
	file_put_contents(rtrim($_SERVER['DOCUMENT_ROOT'], '/')."/test/configuration.php", $output);
	
	$test = '';
	
	$c = new configuration($test);
	
	/*
		S>Get all object variables
	*/
	
	$objVar = get_object_vars($c);
	
	/*
		S>Gives you constants
	*/
	
	$reConstants = get_defined_constants(true);
	/*
		S>Every element in post is used to get variables 
			entered in configuration file
	*/
	foreach($_POST as $key=>$value)
	{
		$keyParts = explode(':', $key);
		
		$v = '';
		
		/*
			S>If key parts first element is define constants 
				then it is verified against constants defined
				in reConstants variable
		*/
		if($keyParts[0] == 'define')
		{
			$val = $reConstants['user'][$keyParts[1]];
			
			if($value != $val)
			{
				echo $key;
			}
			
		}
		/*
			S>Go through object with first part keyParts 
				and value is stored until goes all keyParts
				and finally give you value in page for 
				selected POST element
		*/
		else
		{
			for($i = 0;$i < count($keyParts);$i++)
			{
				/*
					S>IF value is empty, we must compare with 
						Object vars 
				*/
				if(empty($v))
				{
					$v = $objVar[$keyParts[$i]];
				}
				else
				{
					$v = $v[$keyParts[$i]];
				}
			}
			if(gettype($v) == 'boolean')
			{
				if($v == NULL)
				{
					$v = 'false';
				}
				else
				{
					$v = 'true';
				}
			}
			if($value != $v)
			{
				echo $key;
			}
		}
	}
?>
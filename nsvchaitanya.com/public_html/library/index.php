<?php
	session_start();
	
	$scriptName = '';
		/*
			Defaultly scriptname as display because if urlParts[2] is empty
		*/
	$output_footer = '';
		/*
			Url partitioned at '/' because to find out numerical and use it as page number
		*/
	
	$currentPage = 1;
		/*
			Taken intial page as 1
		*/
	
		//include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/template.php';
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/page_viewclass.php';
		
		//if(!isset($_COOKIE['name']))
		//setcookie('name', 'chaitanya', 0, '/library');
		//$_SESSION['viewCount']++;
	$p = new Page;
		/*To use template elements*/
	$extPath = '';
	
	$r = count($p->urlParts);
	
	switch($r)
	{
		case 3:
		{
			if(preg_match('/[0-9]+/', $p->urlParts[2]))
			{
				$currentPage = $p->urlParts[2];
				
				$scriptName = '';
			}
			else
			{
				$scriptName = $p->urlParts[2];
			}
			break;
		}
		case 4:
		{
			if(preg_match('/[0-9]+/', $p->urlParts[3]))
			{
				if($p->urlParts[2] == 'comment')
				{
					$commentNumber = $p->urlParts[3];
					
					$scriptName = $p->urlParts[2];
				}
				if($p->urlParts[1] == 'library')
				{
					$commentNumber = $p->urlParts[3];
					
					$currentPage = $p->urlParts[2];
				}
				if($p->urlParts[2] == 'sortingRows')
				{
					$pageNumber = $p->urlParts[3];
					
					$scriptName = $p->urlParts[2];
				}
				if($p->urlParts[2] == 'clientSortingRows')
				{
					$pageNumber = $p->urlParts[3];
					
					$scriptName = $p->urlParts[2];
				}
				else
				{
					$editId = $p->urlParts[3];
					
					$fileNumber = $p->urlParts[3];
					
					$scriptName = $p->urlParts[2];
				}
			}
			else
			{
				$scriptName = $p->urlParts[3];
				
				$extPath = $p->urlParts[2].'/';
			}
			break;
		}
		case 5:
		{
			$scriptName = $p->urlParts[4];
			
			$extPath = $p->urlParts[2].'/'.$p->urlParts[3].'/';
			
			break;
		}
		case 6:
		{
			if(preg_match('/[0-9]+/', $p->urlParts[5]))
			{
				$userEditId = $p->urlParts[5];
				
				$scriptName = $p->urlParts[4];
				
				$extPath = $p->urlParts[2].'/'.$p->urlParts[3].'/';
			}
			break;	
		}
	}
	
	$scriptName = (empty($scriptName) ? 'display' : $scriptName) . '.php';
	
		/*
			If name is empty it goes to display otherwises it goes to scriptname.php 
		*/
	
	$scriptPath = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/'.$extPath;
		/*
			Editing the path of file  
		*/
	$scriptPathName = $scriptPath . $scriptName;
		/*
			It concatating the both name and path 
		*/
		//include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/view.php';
	if(file_exists($scriptPathName))
	{
		/*
			Include script
		*/
		include $scriptPathName;	

	}
	else
	{
		/*
			If the script file does not exist redirect to index page 
		*/
		header('Location: http://' . $_SERVER['HTTP_HOST'] . '/library/');
	}
	
	$v = new View($p);	
	
	// print_r($v->outputre);
	print_r(preg_replace('/\s+/', ' ', $v->outputre));
?>
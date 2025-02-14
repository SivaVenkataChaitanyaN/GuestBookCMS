<?php
	$user_acc_nav = array(
			'signout'=>array(
				'href'=>'/library/users/signout'
			),
			
			'login'=>array(
				'href'=>'/library/users/login'
			)
	);
	
	$head = 
	'<html>
		<head>';
	foreach($link as $links)
	{
		$head .= '<link ';
		
		foreach($links as $attr=>$val)
		{
			$head .= "$attr='$val'";
		}
		
		$head .='/>';
	}
	
	$body = '
	<body>
		<header>
		<div class="' .$menu_class['class']. '">
			<div class="' .$hid_menu_class['class']. '" id="' .$hid_menu_class['id']. '">
			</div>
			<!-- Logo -->
			<nav>
			<!--navigation bar consists of menu which highlights when mouse hovers-->
			<ul ';
				foreach($topMenu as $keys=>$val)
				{
					if($keys == 'items')
					{
						$body .='>';
						foreach($val as $key=>$vals)
						{
							foreach($vals as $k=>$v)
							{
								if($k == 'href')
								{
									$body .= '<li><a '.$k.'='.$v.'>';
								}
								else
								{
									$body .= ''.$v.'</a></li>';
								}
							}
						}
					}
					else
					{
						$body .= $keys. '=' ."'$val'";
					}
				}
	if(isset($_SESSION['user']))
	{	
		$body .= '
			<li>
				<a href="'.$user_acc_nav['signout']['href'].'">
					Signout
				</a>
			</li>';
	}
	else
	{
		$body .=	'
			<li>
				<a href="'.$user_acc_nav['login']['href'].'">
					Login
				</a>
			</li>';
	}
	$body .= '
				</ul>
			</nav>
		</div>
	</header>
		<div class="'.$dummy_class['class'].'">
		</div>
	<main id="'.$main['id'].'">';
	
	
	foreach($bodyScripts as $bv)
	{
		foreach($bv as $bScriptKey=>$bScripts)
		{
			if($bScriptKey == 'code')
			{
				$output_footer .= '<script type="text/javascript">' . $bScripts . '</script>';
			}
			else
			{
				$output_footer .= '<script type="text/javascript"  ';
				
				$output_footer .= $bScriptKey . '"=' . $bScripts . '" ';
				
				$output_footer .= '></script>';
			}
		}
	}
	
	foreach($footer as $ke=>$va)
	{
		$output_footer .= '
			<footer '.$ke.'="'.$va.'"></footer>';
	}
	$output_footer .='
		</body>
	</html>';

	/*
		If GET element with associative JSREQ exists 
	*/
	$head .= '
	<style>
		.edit_delete{
			height:25px;
		}
	</style>
	<title>' . $title . '</title>
	</head>';
	
	
	if(isset($_SERVER['HTTP_JSREQ']))
	{
	}
	else
	{
		$outputr = array($head, $body, $output, $output_footer);
		
		foreach($outputr as $r)
		{
			$outputre .= $r;
		}
		/*
			It prints including header and footer
		*/
	}
?>
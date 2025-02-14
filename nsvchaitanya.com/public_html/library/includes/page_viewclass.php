<?php
	class Page{
		
		public $title = '';
		
		public $output_footer;
		
		public $link = array(
			0=>array(
				'rel'=>'stylesheet',
				'href'=>"/library/library/style.css",
				'type'=>'text/css'
			),
			1=>array(
				'rel'=>'stylesheet',
				'href'=>'https://fonts.googleapis.com/css?family=Pacifico'
			)
		);
		public $bodyScripts = array(
		
		);	
		
		public $stylElement = '';
		
		public $topMenu = array(
			'class'=>'menu',
			'id'=>'menu',
			'items'=>array(
				1=>array(
					'href'=>'/library/',
					'displayText'=>'Home'
				),
				2=>array(
					'href'=>'/library/form',
					'displayText'=>'Form'
				),
				3=>array(
					'href'=>'/library/',
					'displayText'=>'Help'
				),
				4=>array(
					'href'=>'/library/',
					'displayText'=>'About'
				)
			)
		);
			
		public $output = '';
		
		public $outputre = '';
		
		public $dbToken,  $urlParts;
		
		public $newDbToken;
	
		public $edit_nav_page = array(
			'href' => '/library/edit'
		);
		
		public $page_nav = array(
			'class'=>'a_pag_nav',
			
			'display'=>array(
				'href'=>array(
					1=>'/library/',
					2=>'library/1'
				)
			),
			
			'edit'=>array(
				'href'=>array(
					1=>'library/edit/',
					2=>'/library/edit/1'
				)
			)
		);
			
		public $menu_class = array(
			'class' => 'div_menu'
		);
		
		public $hid_menu_class = array(
			'class' => 'div_hid_menu',
			'id' => 'div_hid_menu'
		);
		
		public $dummy_class = array(
			'class' => 'div_dummy'
		);
		public $bord_con_class = array(
			'class' => 'div_border_on'
		);
		public $pag_nav_class = array(
			'class' => 'div_pag_nav'
		);
		public $main = array(
			'id' =>'main_width'
		);
		public $content = array(
			'class'=>'content'
		);
		
		public $footer = array(
			'class'=>'footer',
		);
		
		public $edit_img = array(
			'class' => 'img_edit'
		);
		public $user_acc_nav = array(
			'signout'=>array(
				'href'=>'/library/users/signout'
			),
			
			'login'=>array(
				'href'=>'/library/users/login'
			)
		);
		public function __construct(){
			$this->bodyScripts[] = array('src'=>'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
			
			$this->bodyScripts[]['src'] = '/library/library/scripts.js';
			
			$this->dbToken = mysqli_connect(
				'127.0.0.1', 
				'chaitanya', 
				'Chaitanya', 
				'chaitanya_useraccounts'
			);
			
			$this->urlParts = $_SERVER['REQUEST_URI'];
			
			if(preg_match('/\?/', $this->urlParts))
			{
				$this->urlParts = explode('?', $this->urlParts);
				
				$this->urlParts = $this->urlParts[0];
			}
			
			$this->urlParts = explode('/', rtrim($this->urlParts, '/'));
		}
	}
	class View{
		public $head = 
		'<!DOCTYPE html>
			<html lang="en">
				<head>';
			
		public $body = '';
		
		public $outputr, $outputre;
		
		function __construct($pO)
		{
			foreach($pO->link as $links)
			{
				$this->head .= '<link ';
				
				foreach($links as $attr=>$val)
				{
					$this->head .= "$attr='$val'"." ";
				}
				
				$this->head .='/>';
			}
				/*Creating the style sheets*/
			$this->body = '
				<header>
				<div class="' .$pO->menu_class['class']. '">
					<div class="' .$pO->hid_menu_class['class']. '" id="' .$pO->hid_menu_class['id']. '">
					</div>
					<!-- Logo -->
					<nav>
					<!--navigation bar consists of menu which highlights when mouse hovers-->
					<ul ';
						foreach($pO->topMenu as $keys=>$val)
						{
							if($keys == 'items')
							{
								$this->body .='>';
								foreach($val as $key=>$vals)
								{
									foreach($vals as $k=>$v)
									{
										if($k == 'href')
										{
											$this->body .= '<li><a '.$k.'='.$v.'>';
										}
										else
										{
											$this->body .= ''.$v.'</a></li>';
										}
									}
								}
							}
							else
							{
								$this->body .= $keys. '=' . "'$val'"." ";
							}
						}
			if(isset($_SESSION['user']))
			{	
				$this->body .= '
					<li>
						<a href="'.$pO->user_acc_nav['signout']['href'].'">
							Signout
						</a>
					</li>';
			}
			else
			{
				$this->body .=	'
					<li>
						<a href="'.$pO->user_acc_nav['login']['href'].'">
							Login
						</a>
					</li>';
			}
			$this->body .= '
						</ul>
					</nav>
				</div>
			</header>
				<div class="'.$pO->dummy_class['class'].'">
				</div>
			<main id="'.$pO->main['id'].'">';
				/*Creating the Menu bar*/
			
			foreach($pO->bodyScripts as $bv)
			{
				foreach($bv as $bScriptKey=>$bScripts)
				{
					if($bScriptKey == 'code')
					{
						$pO->output_footer .= '<script>' . $bScripts . '</script>';
					}
					else
					{
						$pO->output_footer .= '<script ';
						
						$pO->output_footer .= $bScriptKey . '="' . $bScripts . '" ';
						
						$pO->output_footer .= '></script>';
					}
				}
			}
				/*Inserting the javascript*/
			foreach($pO->footer as $ke=>$va)
			{
				$pO->output_footer .= '
					<footer '.$ke.'="'.$va.'"></footer>';
			}
			$pO->output_footer .='
				</body>
			</html>';
				/*
					If GET element with associative JSREQ exists 
				*/
			$this->head .= '
			<title>' . $pO->title . '</title>
			<style>
			';
			$pO->stylElement .= 
			'
				.edit_delete{
					height:25px;
			}';
			
			$this->head = $this->head . $pO->stylElement;
			
			$this->head .= '</style></head><body>';
			
			if(isset($_POST['title']))
			{
				$this->outputre .= '
				<html>
					<head>
					</head>
					<body>' . 
						$pO->output .'
						<script>
							$("body").on("dblclick", ".div_border_on", {"p":6, "two":9}, function(eve){
							
							var t = eve.data.p; var a = eve.data.two;
							
							console.log(1, 23, 45);
							console.log(t, a);
							console.log(eve);
							$(this).css("background","red");
							});
							//$(".div_border_on").off("dblclick", function(){$(this).css("background", "red");});
							//$(".div_border_on").on("dblclick", function(){$(this).css("background", "teal");});
						</script>
					</body>
				</html>';
			}
			
			else if(isset($_SERVER['HTTP_JSREQ']))
			{
				$this->outputre .=$pO->output;
				
				/*
					It prints including header and footer
				*/
			}
			else
			{				
				$this->outputr = array($this->head, $this->body, $pO->output, $pO->output_footer);
				
				foreach($this->outputr as $this->r)
				{
					$this->outputre .=$this->r;
				}
				/*
					It prints including header and footer
				*/
			}
		}
	}
?>

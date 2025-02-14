<?php	
	$title = '';
	
	$link = array(
		0=>array(
			'rel'=>'stylesheet',
			'href'=>"/library/library/style.css",
			'type'=>'text/css'
		),
		1=>array(
			'rel'=>'stylesheet',
			'href'=>'https://fonts.googleapis.com/css?family=MonotypeCorsiva'
		)
	);
	
	$bodyScripts = array();
	
	$bodyScripts[] = array('src'=>'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js');
	
	$bodyScripts[]['src'] = 'nsvchaitanya.com/library/library/scripts.js';
	
	$topMenu = array(
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
				'href'=>'/library/edit',
				'displayText'=>'Edit'
			),
			4=>array(
				'href'=>'/library/',
				'displayText'=>'Help'
			),
			5=>array(
				'href'=>'/library/',
				'displayText'=>'About'
			)
		)
	);
	
	$output = '';
	
	$outputre = '';
	
	$dbToken = mysqli_connect(
			'127.0.0.1', 
			'chaitanya', 
			'Chaitanya', 
			'chaitanya_useracoounts'
		);
		
	
	$urlParts = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
	
	$edit_nav_page = array(
		'href' => '/library/edit'
	);
	
	$page_nav = array(
		
		'class'=>'a_pag_nav',
		
		'display'=>array(
			'href'=>array(
				1=>'/library/',
				2=>'library/1'
			)
		),
		'edit'=>array(
			'href'=>array(
				2=>'/library/edit/1',
				1=>'library/edit/'
			)
		)
	
	);
	
	$menu_class = array(
			'class' => 'div_menu'
	);
	
	$hid_menu_class = array(
			'class' => 'div_hid_menu',
			'id' => 'div_hid_menu'
	);
	
	$dummy_class = array(
			'class' => 'div_dummy'
	);
	$bord_con_class = array(
			'class' => 'div_border'
	);
	$pag_nav_class = array(
			'class' => 'div_pag_nav'
	);
	$main = array(
			'id' =>'main_width'
	);
	$content = array(
		'class'=>'content'
	);
	
	$footer = array(
		'class'=>'footer',
	);
	
	$edit_img = array(
		'class' => 'img_edit'
	);
?>
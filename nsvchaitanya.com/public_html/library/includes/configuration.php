<?php
	class Configuration
	{
		public
	$domain = array('title'=>'Cap.Org.In', 'url'=>'www.cap.org.in'),$adminEmail='admin@cap.org.in',$dbPass = array('admin'=>'Kxm~~!zpONO90%[zS', 'reader'=>'oU{K+&xZtndXlD9?'),$recordLogs = array('user'=>false, 'site'=>false),$userImage = array('file'=>'user.png', 'thumbHeight'=>'50px', 'thumbWidth'=>'50px'),$isDev=false,$isTest=false,$site = array('label'=>'CAPORG', 'title'=>'Cap Org', 'org'=>'Caporg', 'title_no_space'=>'CapOrg', 'keywords'=>'CapOrg,caporg,Cap Org,cap org', 'description'=>'CapOrg - '),$logo = array('alt-text'=>'caporg logo', 'title'=>'CapOrg Home/Root', 'link-url'=>'/', 'size'=>'small', 'hasStyle'=>true, 'small'=>array('img-file'=>'/images/logo.svg', 'width'=>92, 'height'=>92, 'class'=>'img-logo'),'large'=>array('img-file'=>'/images/logo.svg', 'width'=>156, 'height'=>157, 'class'=>'img_logo_large'),'mail'=>array('img-file'=>'/images/logo.png'),),$include = array('login'=>true, 'sidebar'=>true, 'cleanoutput'=>true, 'toptitle'=>true, 'gTrans'=>true, 'bannerTop'=>false, 'footbar'=>true, 'bookmarker'=>true, 'meta'=>array('g-login'=>false),'styles'=>array('local'=>false, 'global'=>true, 'alocal'=>false, 'aglobal'=>false, 'rtf'=>false),'scripts'=>array('local'=>false, 'global'=>true, 'alocal'=>false, 'aglobal'=>false, 'g-login'=>false, 'rtf'=>false, 'gMap'=>false, 'gre'=>false),'record'=>array('viewed'=>false, 'visited'=>true),),$socialLogin=true,$createVersions=true,$itemsPerPage=25,$queryPrepCount=0,$queryCount=0;
					function __construct($sec)
					{
						/*
							To remove error
						*/
						define('DOC_ROOT', 'bg8buy-d0g8');
							/*
								S> FLAG - HOST is Development Server 
							*/
						define('IS_DEVELOPMENT_SERVER', (bool) preg_match('/cap\.org\.in\/www/', DOC_ROOT));
						
							/*
								S> FLAG - HOST is Test Server 
							*/
						define('IS_TEST_SERVER', (bool) preg_match('/(alpha|beta)\./', $_SERVER['HTTP_HOST']));
						
							/*
								S> FLAG - HOST is Production Server
							*/
						define('IS_PRODUCTION_SERVER', !IS_DEVELOPMENT_SERVER && !IS_TEST_SERVER);
						
						self::defineConstants();

						$this->sec = array(
					'home'=>array('app'=>'home', 'label'=>'CAPORG', 'short-title'=>'Cap Org', 'title'=>'CAP Organisation', 'library'=>'/library/', 'root'=>'/', 'db'=>'caporg_site', 'vdb'=>'caporg_sitev', 'template'=>array('page'=>'', 'sub-menu'=>''),),'site'=>array('app'=>'site', 'label'=>'CAPORG', 'short-title'=>'Cap Org', 'title'=>'CAP Organisation', 'library'=>'/library/', 'root'=>'/', 'db'=>'caporg_site', 'vdb'=>'caporg_sitev', 'template'=>array('page'=>'', 'sub-menu'=>''),),'users'=>array('app'=>'users', 'label'=>'USERS', 'short-title'=>'Users', 'title'=>'Users', 'library'=>'/users/', 'root'=>'/users/', 'db'=>'caporg_users', 'vdb'=>'caporg_users', 'template'=>array('page'=>'', 'sub-menu'=>''),),);}private function defineConstants(){define('DOC_ROOT', 'bg8buy-d0g8');define('IS_DEVELOPMENT_SERVER', false);define('IS_TEST_SERVER', false);define('IS_PRODUCTION_SERVER', true);define('ID_SEARCH_SITE', 'bg8buy-d0g8');define('ID_SEARCH_WEB', 'b3an63-bj35');define('ID_GMAP_KEY', 'AIzaSyBHF0YyKtItqveoCQM4S9C6ou6u66Ta8eE');define('ID_GRE_CLIENT', '6LcFsnIUAAAAAFpgS8gYNtNn9JM8T6JDyey2cSzs');define('ID_GRE_SERVER', '6LcFsnIUAAAAADPCaA5CetTIoGvGmf9JvTb4gy-P');define('ID_GUSER_CLIENT', '530398479174-kj9q3hl9l749gnu8q0bptmuk33fqvhk3.apps.googleusercontent.com');define('ID_GUSER_SECRET', 'pUXK-yyRKbY2Q-IOep81jqBw');define('ENABLE_LOCAL_LOGIN', true);define('FLAG_RECORD_USERLOGS', true);define('ENABLE_SOCIAL_LOGIN', true);define('HOST_PREFIX', 'caporg_');define('TIME_ZONE', 'America/Chicago');define('HOST_PROTOCOL', 'https');
			if(IS_DEVELOPMENT_SERVER)
			{
				define('HOST_PROTOCOL', 'http');
			}
			else 
			{
				define('HOST_PROTOCOL', 'https');
			}
		}
	}
	?>
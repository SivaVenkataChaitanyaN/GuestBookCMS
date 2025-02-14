<?php
	trait now{
		public function some(){
			echo 'HII';
		}
	}
	
	trait second{
		public function noth(){
			echo 'Bye';
		}
	}
	
	class test{
		use now, second;
		function __construct()
		{
			
		}
	}
	
	$o = new test();
	$o->some();
	$o->noth();
?>
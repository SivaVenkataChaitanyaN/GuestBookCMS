<?php
	Abstract Class A{
		abstract protected function test();
	}
	Class B extends A{
		public function sameName(){
			echo 456;
		}
		public $B = 12;
		
		protected function test(){
			echo 'Protected to Public function is abstracted';
			
			// echo 'Protected function is abstracted';
		}
		
		public function protectedTest(){
			$this->test();
		}
	}
	Class C extends B{
		protected function test(){
			echo 'Lower Visiblity is not possible';
			// echo 'Lower Visiblity is possible';
		}
		
		public function callPrivateTest(){
			$this->test();
		}
	}
	// $c  = new C;
	// $c->callPrivateTest();
	// $b = new B;
	// echo $b->sameName();
	// echo $b->B;
	// $b->protectedTest();
	
	interface i{
		public function itest();
	}
	
	Class D implements i{
		public function itest(){
			echo 'Public Classes are possible
			Private Classes are not possible';
		}
	}
	
	Class E extends D{
		public function itest(){
			echo 'Overriding is possible';
		}
	}
	
	// $d = new D;
	// $d->itest();
	// $e = new E;
	// $e->itest();
	
	trait G{
		private function tTest(){echo 'private';}
	}
	Class F{
		use G;
		public function tTest()
		{			
			echo 'public';
		}
		public function calltTest()
		{
			$this->tTest();
		}
	}
	$f = new F;
	$f->calltTest();
	
?>
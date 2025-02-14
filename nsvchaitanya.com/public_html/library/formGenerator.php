<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/test/configuration.php';
	
	Class View {
			/*
				S> Link atrributes
			*/
		public 
			$link = array(
				0=>array(
					'rel'=>'stylesheet',
					'href'=>'/library/style.css',
					'type'=>'text/css'
				)
			);
			/*
				S> Contains html code of head and its child elements
			*/
		public $head = '';
			/*
				S> Contains html code of body and its child elements
			*/
		public $body = '';
			/*
				S> Contains javascript 
			*/
		public $bodyScripts = array(
			'src'=>'',
			'code'=>''
		);
			/*
				S> Footer of html document
			*/
		public $footer = '';
		
		public function __construct()
		{
				
				/*
					S> holds child elements of head 
				*/
			$this->head = '
			<!DOCTYPE html>
				<html>
					<head>
			';
				/*
					S> Creates link elements with attributes
						given in the array
				*/
			foreach($this->link as $attr)
			{
				$this->head .= '<link ';
				
				foreach($attr as $key=>$val)
				{
					$this->head .= "$key='$val'" . " ";
				}
				
				$this->head .= '/>';
			}
				/*
					S> Holds body elemnts and its child elements
				*/
			$this->body .= '
					<body>';
			/*
				consists header of documnet and dummy div so 
				that elements do not go under header
			*/		
			
			$this->body .= '
				<header class="header">
				</header>
				<div class="div_dummy">
				</div>
			';
			
			$this->footer .= '
				</body>
			</html>';
			
			
		}
		
		/*
			S> If element is string or number or boolean then 
				it generates form code for element
		*/
		public function returnText($key, $value, $label, $inputName)
		{
			$output = '';
			if(!is_array($value))
			{
				if(gettype($value) == 'boolean')
				{
					$keyt = $key . 't';
					$keyf = $key . 'f';
					$$keyt = '';
					$$keyf = '';
					$value ? ($$keyt = 'checked') : ($$keyf = 'checked');
					$output .= '
						<div class="div_form">
							'.$label.'	
						</div>
						
						<input name="'.$inputName.'" '.$$keyt.' class="radio_button_margin" value="true" type="radio">
							True
						</input>
						
						<input name="'.$inputName.'" '.$$keyf.' class="radio_button_margin" value="false" type="radio">
							False
						</input>
					';
				}
				else if(gettype($value) == 'integer')
				{
					$output .= '
						<div class="div_form">
								'.$label.'
							</div>
							
							<input name="'.$inputName.'" class="input_properties" value="'.$value.'" type="number" placeholder="Domain Title"/>
							
					';
				}
				else
				{
					$output .= '
						<div class="div_form">
								'.$label.'
							</div>
							
							<input name="'.$inputName.'" class="input_properties" value="'.$value.'" type="text" placeholder=""/>
							
					';
				}
				return $output;
			}
		}
		/*
			S>If element is array then it goes forEach loop
				until it encounters string or boolean or number
		*/
		public function forEachLoop($key, $value, $label, $inputName)
		{
			$output = '';
			/*
				S>If value is array then it is first loop otherwise other loop
			*/
			foreach($value as $k=>$v)
			{
				/*
					S>Label is redefined because as it is array for 
						elements in array label is changed by 
						adding array's key
					S>In else part, it is considered as child's 
						label by adding array's key
				*/
				if(is_array($v))
				{
					$relabel = $label . " " . $k;

					$reinputName = $inputName . ":" . $k;

					$output .= $this->forEachLoop($k, $v, $relabel, $reinputName);
				}
				else
				{
					$elelabel = $label . " " . $k;

					$eleinputName = $inputName . ":" . $k;

					$output .= $this->returnText($k, $v, $elelabel, $eleinputName);
				}
			}
			return $output;
		}
		public function Form($c)
		{
			/*
				S> Login Form
			*/
			$output = '<div class="div_dummy"></div>
				<div class="div_form_border">
					<form action="/test/configurator" method="post" class="login_form" id="loginForm">';
					
			$res = get_object_vars($c);
			
			foreach($res as $key=>$value)
			{
				if(is_array($value))
				{
					$output .= $this->forEachLoop($key, $value, $key, $key);
				}
				else
				{
					$output.= $this->returnText($key, $value, $key, $key);
				}
			}
			
			$reConstants = get_defined_constants(true);
			
			foreach($reConstants['user'] as $key=>$value)
			{
				$output .= $this->returnText($key, $value, $key, $key);
			}
			
			echo $output;
		}
		
	}	
	/*
		S> Total html is collected in this element
	*/
	$output = '';
	
	$test = '';
	
	$v = new View;
	
	$c = new configuration($test);
	
	$v->body .= $v->Form($c);
	
	/*
		Combine all elements to complete total html element
	*/
	$output .= $v->head . $v->body . $v->footer;
	
	/*
		Print html document
	*/
	echo $output;
?>
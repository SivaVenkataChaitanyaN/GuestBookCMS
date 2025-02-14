<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/configuration.php';

	/*
		S> If element is string or number or boolean then 
			it generates form code for element
	*/
	function returnText($key, $value, $label, $inputName)
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
						<label>
							'.$label.'	
						</label>
					
						<input name="'.$inputName.'" '.$$keyt.' class="radio_button_margin" value="true" type="radio">
							True
						</input>
						
						<input name="'.$inputName.'" '.$$keyf.' class="radio_button_margin" value="false" type="radio">
							False
						</input>
					</div>
				';
			}
			else if(gettype($value) == 'integer')
			{
				$output .= '
					<div class="div_form">
						<label>
							'.$label.'
						</label>
						
						<input name="'.$inputName.'" class="input_properties" value="'.$value.'" type="number" placeholder="Domain Title"/>
					</div>	
				';
			}
			else
			{
				$output .= '
					<div class="div_form">
						<label>
							'.$label.'
						</label>
						
						<input name="'.$inputName.'" class="input_properties" value="'.$value.'" type="text" placeholder=""/>
					</div>	
				';
			}
			return $output;
		}
	}
	/*
		S>If element is array then it goes forEach loop
			until it encounters string or boolean or number
	*/
	function forEachLoop($key, $value, $label, $inputName)
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

				$output .= forEachLoop($k, $v, $relabel, $reinputName);
			}
			else
			{
				$elelabel = $label . " " . $k;

				$eleinputName = $inputName . ":" . $k;

				$output .= returnText($k, $v, $elelabel, $eleinputName);
			}
		}
		return $output;
	}
	function Form($c)
	{
		/*
			S> Login Form
		*/
		$output = '<div class="div_dummy"></div>
			<div class="div_form_border">
				<form action="/library/configurator" method="post" class="login_form" id="loginForm">';
				
		$res = get_object_vars($c);
		
		foreach($res as $key=>$value)
		{
			if(is_array($value))
			{
				$output .= forEachLoop($key, $value, $key, $key);
			}
			else
			{
				$output.= returnText($key, $value, $key, $key);
			}
		}
		
		$reConstants = get_defined_constants(true);
		
		foreach($reConstants['user'] as $key=>$value)
		{
			$key = 'define:' . $key;
			
			$output .= returnText($key, $value, $key, $key);
		}
		
		$output .= '
			<div class="div_form">
				<button type="submit" id="btn">
					Submit
				</button>
			</div>';
		
		
		return $output;
	}
		
		
	/*
		S> Total html is collected in this element
	*/
	$output = '';
	
	$test = '';
	
	$c = new configuration($test);
	
	$p->output .= Form($c);
	
?>
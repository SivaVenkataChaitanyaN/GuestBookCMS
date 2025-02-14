<?php
	$p->output .= '<p>This is my testing</p>
					<p>How is it going.KHARTOUM: At least 18 Indians were among the 23 people killed and over 130 injured in a horrific LPG tanker blast at a ceramic factory in Sudan, the Indian mission said here on Wednesday.</p>
					<img src="/library/images/dogs.png"/>'
/*
print_r($_SERVER);exit();
	$id = 'A78CB906';
	$control = 0;
	$amount = 20;
	$conn = new mysqli('127.0.0.1', 'chaitanya', 'Chaitanya', 'chaitanya_useraccounts');
	$sql = "SELECT * FROM nishanth WHERE ID = '$id'";
	$result = $conn->query($sql);
	if($result->num_rows > 0 )
	{
		$row = $result->fetch_assoc();
		if($control == 0)
		{
			$check = $row['BALANCE_AMOUNT'] - $amount;
			
			if($check > 0)
			{
				$sql = "UPDATE	nishanth
							SET
						BALANCE_AMOUNT = $check
						WHERE
							ID = '$id' " ;
							
				$result = $conn->query($sql);
			}
			else
			{
				echo "Balance Insufficient";
			}
			/*if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} 
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}*//*
		}
		else
		{
			$newValue = $row['BALANCE_AMOUNT'] + $amount;
			
			$sql = "UPDATE nishanth
						SET
						BALANCE_AMOUNT = $newValue
					WHERE 
						ID = '$id' ";
			$result = $conn->query($sql);	
		}
		
	}
	else
	{
		echo "User Doesnot Exist";
	}
	$conn->close();
  */  

/*
	$ar = array(3, 4, 6, 3, 6, 4, 10, 10, 10, 4);
	$g = array();
	foreach($ar as $v)
	{
		if(array_key_exists($v, $g))
		{
			$t = $g[$v];
			$t++;
			$g[$v] = $t;
		}
		else
		{
			$g[$v] = 1;
		}
	}
	print_r($g);
	// $arr = array('1BM16CS053'=>5, '1BM16CS058'=>2, '1BM16CS051'=>8);
	// asort($arr);
	// print_r($arr);
	// print_r($GLOBALS);
	//phpinfo(INFO_ENVIRONMENT);
	
	/*
	function test($a = 10, $b=20, $c=$a*$b)
	{
		echo $c;
	}
	test(1, 2, 3);*/
	/*
	$i = 'a';
	$extractArray = array('i'=>1, 'am'=>2, 'happy'=>3, 'and'=>4, 'annoyed'=>5);
	$y = extract($extractArray, EXTR_PREFIX_INVALID, 'yes');
	echo $i;
	$hii = 'How';
	$are = 'you';
	$vars = array('hii', 'are');
	$com = compact('hii', $vars);
	print_r($com);
	list($City, , $damn) = array('Tenali', 'is', 'beautiful');
	
	echo $City, 'is', $damn;*/
	
?>

<?php
	/*
	try{
		$query = "
			SELECT
				*
			FROM
				farmers
		";
		
		$result = mysqli_query($p->dbToken, $query);
		
		if(!$result)
		{
			$error = "Incorrect Query";
			
			throw new Exception($error);
		}
		$query = "
			SELEC
				*
			FROM
				farmers
		";
		
		$result = mysqli_query($p->dbToken, $query);
		
		print_r($result);
		
		if(!$result)
		{
			$error = "Incorrect Query 2";
			
			throw new Exception($error);
		}
		
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
	finally
	{
		echo 'Hello World';
	}*/
?>
<?php		
	/*
	$result = dns_get_record("www.google.co.in", DNS_A);
	print_r($result);
	
	$r = function_exists('_connect');
	echo $r;
	
	$a = new PDO('oci:dbname=//localhost:1521/orcl', 'SYSTEM', 'Chaitanya99');
	
	if(!$a)
	{
	}
	else
	{
		/*
		$attributes = array(
		"AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
		"ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
		"TIMEOUT"
		);

		foreach ($attributes as $val) {
			echo "PDO::ATTR_$val: ";
			echo $a->getAttribute(constant("PDO::ATTR_$val")) . "\n";
		}
		*//*
	}*/
?>

<?php
	/*
	//echo file_get_contents('https://api.stopforumspam.org/api?&ip=' . urlencode($_SERVER['REMOTE_ADDR']));
//exit;	
	$hand = curl_init('https://api.stopforumspam.org/api?&ip=' . urlencode($_SERVER['REMOTE_ADDR']));
	
	curl_setopt($hand, CURLOPT_RETURNTRANSFER, true);
	print_r($hand);
	$result = curl_exec($hand);
	
	curl_close($hand);
	
	echo $result;
exit;
*/
?>


<?php
	/*
	$subject = 'Hiii98';
	
	$functionsToTest = array(
		'a'=>'is_a',
		'array'=>'is_array',
		'bool'=>'is_bool',
		'callable'=>'is_callable',
		'dir'=>'is_dir',
		'double'=>'is_double',
		'executable'=>'is_executable',
		'file'=>'is_file',
		'finite'=>'is_finite',
		'float'=>'is_float',
		'infinite'=>'is_infinite',
		'int'=>'is_int',
		'integer'=>'is_integer',
		'link'=>'is_link',
		'long'=>'is_long',
		'nan'=>'is_nan',
		'null'=>'is_null',
		'numeric'=>'is_numeric',
		'object'=>'is_object',
		'readable'=>'is_readable',
		'real'=>'is_real',
		'resource'=>'is_resource',
		'scalar'=>'is_scalar',
		'soap_fault'=>'is_soap_fault',
		'string'=>'is_string',
		'subclass_of'=>'is_subclass_of',
		'tainted'=>'is_tainted',
		'uploaded_file'=>'is_uploaded_file',
		'writable'=>'is_writable',
		'writeable'=>'is_writeable',
	);
	
	foreach($functionsToTest as $curType=>$curFunction)
	{
		if(call_user_func($curFunction, $subject))
		{
			$result['is_'][$curType] = "'$subject'".' is a '.$curType;
		}
		else
		{
			$result['is_'][$curType] = "'$subject'".' is not a '.$curType;
		}
	}
	
	/*$functionsToTest = array(
		'alnum'=>'ctype_alnum',
		'alpha'=>'ctype_alpha',
		'cntrl'=>'ctype_cntrl',
		'digit'=>'ctype_digit',
		'graph'=>'ctype_graph',
		'lower'=>'ctype_lower',
		'print'=>'ctype_print',
		'punct'=>'ctype_punct',
		'space'=>'ctype_space',
		'upper'=>'ctype_upper',
		'xdigit'=>'ctype_xdigit'
	);
	
	foreach($functionsToTest as $curType=>$curFunction)
	{
		if(call_user_func($curFunction, $subject))
		{
			$result['ctype_'][$curType] = "'$subject'".' is a '.$curType;
		}
		else
		{
			$result['ctype_'][$curType] = "'$subject'".' is not a '.$curType;
		}
	}
	print_r($result);*/
?>


<?php
	/*
	$a = testDie() or die('It was died');
	
	echo $password;
	
	function testDie()
	{
		return null;
	}*/
?>
<?php
	/*
	$p->output .= 
		'<script>
			var a = {"widget": {
				"debug": "on",
				"window": {
					"title": "Sample Konfabulator Widget",
					"name": "main_window",
					"width": 500,
					"height": 500
				},
				"image": { 
					"src": "Images/Sun.png",
					"name": "sun1",
					"hOffset": 250,
					"vOffset": 250,
					"alignment": "center"
				},
				"text": {
					"data": "Click Here",
					"size": 36,
					"style": "bold",
					"name": "text1",
					"hOffset": 250,
					"vOffset": 100,
					"alignment": "center",
					"onMouseUp": "sun1.opacity = (sun1.opacity / 100) * 90;"
				}
			}};
			console.log(typeof(a));
		</script>';
	*/
?>
<?php
	/*$p->output .= 
		'
		<canvas id="canvas" width="500" height="500">
		</canvas>
		
		<form oninput="result.value=parseInt(a.value)*parseInt(b.value)">
			<input type="range" name="a" value="50" />
			*
			<input type="number" name="b" value="10" />
			=
			<output name="result">500</output>
		</form>
		<meter id="fuel" name="fuel" min="0" max="100" low="15" high="88"  value="90">
			
		</meter>
		<datalist id="colorlist">
			<option value="Orange">
			<option value="Blue">
			<option value="Red">
		</datalist>
		<input list="colorlist" name="color"/>
		<button>
			Attach/Detach
		</button>
		<p>
			Hello
		</p>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
		</script>
		<script type="text/javascript">
			$("p").on("click", function(){console.log("Yes");});
			var p = false;
			var t;
			$(":button").on("click", function(){
				if(p)
				{
					$(":button").after(t);
					p = false;
				}
				else
				{
					p = true;
					t = $("p");
					$("p").remove();
				}
			});
		</script>';
	$p->bodyScripts[]['code'] = '
		var canvas = document.getElementById("canvas");
		var canvasContext = canvas.getContext("2d");
		// canvasContext.fillStyle = "blue";
		// canvasContext.fillRect(10, 10, 100,100);
		// canvasContext.fillStyle = "red";
		// canvasContext.fillRect(10, 55, 100,100);
		// canvasContext.clearRect(20, 35, 50, 50);
		// canvasContext.strokeRect(30, 40, 35, 35);
		// canvasContext.moveTo(125, 35);
		// canvasContext.lineTo(145, 10);
		// canvasContext.lineTo(126, 36);
		// canvasContext.moveTo(126, 36);
		// canvasContext.lineTo(145, 10);
		// canvasContext.lineTo(127, 37);
		// canvasContext.moveTo(124, 34);
		// canvasContext.lineTo(145, 10);
		// canvasContext.lineTo(125, 35);
		// canvasContext.lineTo(125, 10);
		// canvasContext.lineTo(124, 34);
		// canvasContext.arc(125, 105, 20, 0, Math.PI, true);
		
		canvasContext.beginPath();
		
		canvasContext.moveTo(70, 69);
		
		canvasContext.lineTo(65, 65);
		
		canvasContext.moveTo(180, 69);
		
		canvasContext.lineTo(185, 65);
		
		canvasContext.moveTo(145, 69);
		
		canvasContext.lineTo(105, 69);
		
		canvasContext.moveTo(125, 105);
		
		canvasContext.moveTo(75, 75);
		
		canvasContext.lineTo(100, 75);
		
		canvasContext.lineTo(87, 100);
		
		canvasContext.moveTo(150, 75);
		
		canvasContext.lineTo(175, 75);
		
		canvasContext.lineTo(162, 100);
		
		canvasContext.fill();
		
		canvasContext.moveTo(200, 110); 
		
		canvasContext.arc(125, 110, 75, 0, Math.PI*2);
		
		canvasContext.moveTo(168, 120);
		
		canvasContext.arc(128, 120, 40, 0, Math.PI);
		
		// canvasContext.arc(125, 110, 75, 0, Math.PI, false);
		
		canvasContext.stroke();
		
		canvasContext.strokeRect(70, 69, 35, 35);
		
		canvasContext.strokeRect(145, 69, 35, 35);
	';
		
	/*
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	
	$dAction = 'del';
	
	$eAction = 'edit';
	
	$dbToken =	mysqli_connect('127.0.0.1', 'chaitanya', 'Chaitanya', 'chaitanya_useracoounts');
	
	$numPerPage = 4;
	
	$query = '
		SELECT
			COUNT(*)
		AS
			numberOfRecords 	
		FROM 
			chaitanya_useracoounts.books
		';
	
	$result = mysqli_query($dbToken, $query);
	
	if(!$result)
	{
		$errTxt = mysqli_error($dbToken);	
		
		print_r($errTxt);
		
		error_submission($query, $dbToken, __LINE__, __FILE__);
	}
	else
	{
	}
	
	if($result)
	{
		$row = mysqli_fetch_assoc($result);
		
		$numberOfRecords = $row['numberOfRecords'];
		
		$numberOfPages = ceil($numberOfRecords/$numPerPage);
	}
	
	$startAt = $numPerPage * ($currentPage - 1);
	
	$query = "
		SELECT 
			users.name,
			books.nameOfBooks,
			books.favouriteSubject,
			books.favouriteSport,
			books.hobbies,
			books.id,
			subjects.subjectName
		FROM 
			chaitanya_useracoounts.books
		LEFT JOIN
			users
		ON
			books.user = users.id
		JOIN
			subjects
		ON
			books.favouriteSubject = subjects.id
		ORDER BY
			books.nameOfBooks ASC
		LIMIT
			{$startAt}, 4	
	";
	
	$result = mysqli_query($dbToken, $query);
	
	
	if(!$result)
	{
		$errTxt = mysqli_error($dbToken);	
		
		print_r($errTxt);
		
		error_submission($query, $dbToken, __LINE__, __FILE__);
	}
	else
	{
	}
	$p->output .= '<button class="submitJava">Send</button>';
	if($result)
	{
		$num_rows = mysqli_num_rows($result);
		
		if($num_rows > 0)
		{
			$i = 0;
			while($row = mysqli_fetch_assoc($result))
			{
				$p->output .= 
				'
					<div class="' .$p->bord_con_class['class']. '">
					
						<div >
							' . $row['name'];
				$p->output	.= '</div>';	
						if(isset($_SESSION['user']))
						{	
							$p->output .= '<div>
								<a href="'.$p->edit_nav_page['href'].'/'.$row['id'].'">
									<img class="'.$p->edit_img['class'].'"/>
								</a>
							</div>';
						}
					$p->output .= '
					<button name="toggle" type="button" class="show_hide_button">Show/Hide</button> 
					<div>
						FavouriteSubject :	'.$row['subjectName'].'
						<div style="float:right;">
							FavouriteSport : '.$row['favouriteSport'].'
						</div>
					</div>';*/
					/*
						If the user login he can see edit button and delete button
					*/
					/*$p->output .= '
						<p class="'.$p->content['class'].'">
						' . $row['nameOfBooks'] . '
						</p>
						Hobbies : ' . $row['hobbies'] . '
				</div>';
				$i++;
			}
		}
	}
	*/
	/*
		It displays the details the player
	*/
	/*
	$p->title = 'Guest Book Comments';
	
	$p->output .= '<div class="'.$p->pag_nav_class['class'].'">';
	
	$numlinks = 4;
	
	$p->output .= page_nav($numlinks, $currentPage, $numberOfPages);
	
	$p->output .= '</div></main>';
	
	$p->output .= '
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
		</script>
		<script>
		/*
			$(":button").on("click", sendJava);
			function sendJava()
			{
				$.ajax({
					data :{"title":"data"},
					type: "POST",
					success : function(response) {
						$("head").html("");
						$("body").html(response);
					}
				});
			}
		*/
		/*
		</script>
	';*/	
?>
<?php
	$values = array(
		0=>array(
				0=>23,
				1=>0,
				2=>3,
				3=>'Reading,Watching movies',
				4=>'Cricket',
				5=>'India called off a meeting between Swaraj and Qureshi on the sidelines of the UN General Assembly in New York in September'
			),
		1=>array(
				0=>18,
				1=>0,
				2=>2,
				3=>'Playing,Watching movies',
				4=>'Football',
				5=>'Amarinder Singh has invited Chaudhry Pervaiz Elahi, the speaker of the Assembly in India'
			),
		2=>array(
				0=>20,
				1=>0,
				2=>1,
				3=>'Reading,Listening to music,Hiking',
				4=>'Hockey',
				5=>'the two countries had strained after the terror attacks by Pakistan-based groups in 2016'
			),
		3=>array(
	        0=>25,
			1=>0,
			2=>2,
			3=>'Playing,Trekking',
			4=>'Cricket',
			5=>'The India-Pakistan ties nose-dived in recent years with no bilateral talks taking place. The ties between two countries '
		)
	);
	
	
	
	$dbToken = mysqli_connect('127.0.0.1', 'chaitanya', 'Chaitanya', 'chaitanya_useraccounts' );
	
	$i = 0;
	$j = 0;
	
	while($j < 60)
	{	
		$query = "
			INSERT INTO 
				`books` (
					`id`,
					`user`,
					`age`,
					`due`,
					`favouriteSubject`,
					`hobbies`,
					`favouriteSport`,
					`nameOfBooks`,
					`dateCreated`,
					`dateUpdated`
				) 
				VALUES (
					(SELECT MAX(p.id)+1 FROM `chaitanya_useraccounts`.`books` p),
					$i,
					'{$values[$i][0]}',
					'{$values[$i][1]}',
					'{$values[$i][2]}',
					'{$values[$i][3]}',
					'{$values[$i][4]}',
					'{$values[$i][5]}',
					NOW(),
					CURRENT_TIMESTAMP
				);
			";
		$result = mysqli_query($dbToken, $query);
		$i++;
		$j++;
		if($i == 4)
		{
			$i = 0;
		}
		
	}
	if(!$result)
	{
		$errTxt = mysqli_error($dbToken);	
		
		print_r($errTxt);
		
	}
?>
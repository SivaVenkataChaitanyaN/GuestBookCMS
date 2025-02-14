<?php
	function builtForm($firstLabel, $secondLabel, $firstType, $secondType, $part){
		$output = 
				'<div class="div_background">
				<form action="/library/setup" method="post" class="form_style" id="form">
					<div class="div_holder">
						<div class="div_space">
							'.$firstLabel.'
							<input name="'.$firstLabel.'" value="" type="'.$firstType.'" class="input_style" placeholder="' .$firstLabel.':"/>
						</div>
					</div>
					<div class="div_holder">
						<div class="div_space">
							'.$secondLabel.'
							<input name = "'.$secondLabel.'" value="" type="'.$secondType.'" class="input_style" placeholder="'.$secondLabel.':"/>
						</div>
					</div>
					<div class="div_space">
						<button type="submit" name="submit" value="'.$part.'" id="btn">
							Submit
						</button>
					</div>
				</form>
			</div>';
			
		return $output;
	}
	if(isset($_POST['submit']))
	{
		if($_POST['submit'] == 1)
		{
			
			$dbToken = mysqli_connect('127.0.0.1', $_POST['Username'], $_POST['Password']);
			
			if(!$dbToken)
			{
				$p->output .= builtForm('Username', 'Password', 'text', 'password', 1);
			}
			
			else
			{
				$p->newDbToken = array(
									'127.0.0.1',
									$_POST['Username'],
									$_POST['Password']
				);
				$content = serialize($p->newDbToken);
				
				file_put_contents('C:\wamp64\www\nsvchaitanya.com\files\password.txt', $content);
				
				$p->output .= builtForm('Databasename', 'Tableprefix', 'text', 'text', 2);
			}
		}
		else
		{
			$content = file_get_contents('C:\wamp64\www\nsvchaitanya.com\files\password.txt');
			
			$content = unserialize($content);
			
			$dbToken = mysqli_connect($content[0], $content[1], $content[2]);
			
			$database = $content[1].'_'.$_POST['Databasename'];
			
			$tableFullName = $database.'.'.$_POST['Tableprefix'].'books';
			
			$query[0] = 
				"
					CREATE DATABASE IF NOT EXISTS
						$database;";
			$query[1] = "		
					CREATE TABLE $tableFullName(
						  `id` int(11) NOT NULL,
						  `user` int(11) NOT NULL,
						  `age` int(4) NOT NULL,
						  `due` int(1) NOT NULL,
						  `favouriteSubject` int(1) NOT NULL,
						  `hobbies` set('Playing','Reading','Listening to music','Watching movies','Trekking','Hiking') COLLATE utf8_unicode_ci NOT NULL,
						  `favouriteSport` enum('Cricket','Football','Hockey') COLLATE utf8_unicode_ci NOT NULL,
						  `nameOfBooks` text COLLATE utf8_unicode_ci NOT NULL,
						  `dateCreated` datetime NOT NULL,
						  `dateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
						) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
			$query[2] = "
						INSERT INTO $tableFullName (`id`, `user`, `age`, `due`, `favouriteSubject`, `hobbies`, `favouriteSport`, `nameOfBooks`, `dateCreated`, `dateUpdated`) VALUES
						(0, 2, 45, 0, 1, 'Playing,Reading,Listening to music', 'Football', 'According to two people familiar with the matter, who asked not to be identified, the case pertains to jeweller Nirav Modi, who is already being investigated by the federal investigation agency ', '2018-02-13 00:23:00', '2018-02-27 15:59:36'),
						(1, 2, 45, 0, 2, 'Reading,Listening to music,Watching movies', 'Football', 'According to two people familiar with the matter, who asked not to be identified, the case pertains to jeweller Nirav Modi, who is already being investigated by the federal investigation agency ', '2018-02-13 00:23:00', '2018-02-14 18:50:11');";
						
			$query[3] = "

						ALTER TABLE $tableFullName
						  ADD PRIMARY KEY (`id`) USING BTREE,
						  ADD KEY `age` (`age`) USING BTREE,
						  ADD KEY `user` (`user`),
						  ADD KEY `numberOfBook` (`favouriteSubject`);
						  
					";
			
			foreach($query as $v)
			{
				$result = mysqli_query($dbToken, $v);
				
				$errTxt = mysqli_error($dbToken);	
			
				print_r($errTxt);	

			}
		}
	}
	else
	{
		$p->output .= builtForm('Username', 'Password', 'text', 'password', 1);
	}
?>
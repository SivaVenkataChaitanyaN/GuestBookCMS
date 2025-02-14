<?php

	$dbToken = mysqli_connect('127.0.0.1', 'root', '');
	
	$query[0] = "
		CREATE USER 'stem'@'localhost' IDENTIFIED BY PASSWORD '*4A571E3B875F37949419CF8572FC3B2FCDB81D0D';";
		
	$query[1] = "GRANT ALL PRIVILEGES ON *.* TO 'stem'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;";
	
	$query[2] = "
	GRANT ALL PRIVILEGES ON `stem`.* TO 'stem'@'localhost';";
	
	$query[3] = "
	GRANT ALL PRIVILEGES ON `stem\_%`.* TO 'stem'@'localhost';";
	
	$query[4] = "
		CREATE DATABASE IF NOT EXISTS `stem`;";
		
	$query[5] = "
		CREATE TABLE `stem`.`books` (
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
		
	$query[6] = "	
		INSERT INTO `stem`.`books` (`id`, `user`, `age`, `due`, `favouriteSubject`, `hobbies`, `favouriteSport`, `nameOfBooks`, `dateCreated`, `dateUpdated`) VALUES
		(0, 2, 45, 0, 1, 'Playing,Reading,Listening to music', 'Football', 'According to two people familiar with the matter, who asked not to be identified, the case pertains to jeweller Nirav Modi, who is already being investigated by the federal investigation agency ', '2018-02-13 00:23:00', '2018-02-27 15:59:36'),
		(1, 2, 45, 0, 2, 'Reading,Listening to music,Watching movies', 'Football', 'According to two people familiar with the matter, who asked not to be identified, the case pertains to jeweller Nirav Modi, who is already being investigated by the federal investigation agency ', '2018-02-13 00:23:00', '2018-02-14 18:50:11');";

	$query[7] = "
		ALTER TABLE `stem`.`books`
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
?>
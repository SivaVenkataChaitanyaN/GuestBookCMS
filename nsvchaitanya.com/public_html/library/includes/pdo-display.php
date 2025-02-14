<?php
	$serverName = 'CHAITANYADABBA\CHAITANYA';
	
	$connection = array("Database"=>"test", "UID"=>"sa", "PWD"=>"Chaitanya99");
	
	$conn = sqlsrv_connect($serverName, $connection);

	// $conn = new PDO('sqlsrv:Server=localhost;Database=test', 'sa', 'Chaitanya99');
	
	if(!$conn)
	{
		echo 'no';
	}
	else
	{
		/*
			CREATE LOGIN stem
				WITH PASSWORD = 'Chaitanya99'
			CREATE USER stem FOR LOGIN stem
			
			ALTER SERVER ROLE [dbcreator] ADD MEMBER [stem]
			GO
			
			CREATE USER [stem] FOR LOGIN [stem]
			GO
		*/
		$query[0] = "CREATE DATABASE stem";
		
		$query[1] = "USE stem";
		
		$query[2] = "
				CREATE TABLE books(
					id int primary key not null,
					users int not null,
					age int not null,
					due int not null,
					favouriteSubject int not null,
					favouriteSport varchar(10) not null CHECK(favouriteSport IN('Cricket','Football','Hockey')),
					nameOfBooks text NOT NULL,
					dateCreated datetime NOT NULL
			);";
			
		$query[3] = "
			INSERT INTO books
				VALUES('1','2','45', '0', '2', 'Cricket', 'According', '2018-02-13 00:23:00');
			";
		
			foreach($query as $v)
			{
				$result = sqlsrv_query($conn, $v);
				
				$errors = sqlsrv_errors();
				
				print_r($errors);
			}
	}
?>
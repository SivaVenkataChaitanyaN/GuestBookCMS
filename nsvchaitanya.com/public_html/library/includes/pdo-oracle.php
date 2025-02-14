<?php
	//$conn = oci_connect('system', 'Chaitanya99', 'localhost/orcl');
	
	
	
	//phpinfo();exit;
	
	///$conn = new PDO('oci:dbhome=127.0.0.1/orcl', 'system', 'Chaitanya99');
	$conn = new PDO('oci:dbname=//127.0.0.1/orcl', 'SYSTEM', 'Chaitanya99');
	
	echo $conn;exit;
	
	/*
	CREATE USER stem IDENTIFIED BY Chaitanya99;
	GRANT CONNECT TO stem;
	GRANT CONNECT, RESOURCE, DBA TO stem;
	GRANT CREATE SESSION TO stem;
	GRANT UNLIMITED TABLESPACE TO stem;
	$query[0] = "
		CREATE TABLE leave(
			id int primary key not null,
			users int not null,
			age int not null,
			due int not null,
			favouriteSubject int not null,
			favouriteSport varchar(10) not null CHECK(favouriteSport IN('Cricket','Football','Hockey')),
			nameOfBooks varchar(25) NOT NULL,
			dateCreated date NOT NULL
		);";
	$query[1] = "
		INSERT INTO leave
			VALUES('0','2','45', '0', '2', 'Cricket', 'According', '13-MAR-2018');
	";
	*/
	if(!$conn)
	{
		echo 'Connection Error';
	}
	else
	{
		echo 'succesful';
	}
?>
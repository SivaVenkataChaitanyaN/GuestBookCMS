<?php
	$conn = new PDO('pgsql:host=localhost;dbname=postgres', 'postgres', 'Chaitanya');
	
	$query[0] = "
		CREATE USER stem WITH
			LOGIN
			NOSUPERUSER
			CREATEDB
			NOCREATEROLE
			INHERIT
			NOREPLICATION
			CONNECTION LIMIT -1
			VALID UNTIL '2020-07-30T12:41:13+05:30' 
			PASSWORD 'Chaitanya';"
	;
	
	$query[1] = "
		CREATE DATABASE stem
		WITH 
		OWNER = stem
		ENCODING = 'UTF8'
		CONNECTION LIMIT = -1;"
	;
	
	foreach($query as $v)
	{
		$conn->query($v);
	}
	
	
	$conn = new PDO('pgsql:host=localhost;dbname=stem', 'stem', 'Chaitanya');
	
	$query[0] = "
		CREATE TABLE books (
		  id int NOT NULL,
		  users int NOT NULL,
		  age int NOT NULL,
		  due int NOT NULL,
		  favouriteSubject int NOT NULL,
		  nameOfBooks text NOT NULL,
		  dateCreated date NOT NULL,
		  dateUpdated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);"
	;
	
	$query[1] = "
		INSERT INTO books 
			(id, users, age, due, favouriteSubject, nameOfBooks, dateCreated, dateUpdated)
		VALUES(0, 2, 45, 0, 1, 'According to two people familiar with the matter, who asked not to be identified, the case pertains to jeweller Nirav Modi, who is already being investigated by the federal investigation agency ', '2018-02-13', '2018-02-27 15:59:36')
	";
	
	foreach($query as $v)
	{
		$conn->query($v);
	}
	
?>
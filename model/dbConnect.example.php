<?php

	$host = ''; 
	$db = '';
	$user = '';
	$password = '';
	$charset = '';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false  ];
	try { 
	//Try to connect to database
	$connection = new PDO($dsn, $user, $password, $options);
	} catch (PDOException $e){ 
	//if not connected succesfully, give me an error message
		echo $e->getMessage();
	}
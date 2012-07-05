<?php
	
	function connectDB()
	{
		$host = "localhost";
		$user = "codeview";
		$pass = "pUpR4YR8eCdvnqEc";
		$connect = mysql_connect($host, $user, $pass);
		
		if (!$connect){
			die("Error connecting to database: " . mysql_error());
		}
		
		return $connect;
	}
	
	function getProjects()
	{
		$connect = connectDB();
		$result = false;
		
		if ($connect){
			$statement = "SELECT * FROM `projects` WHERE 1";
			
			//$mysql_select_db("codeview", $connect);
			$result = mysql_query($statement);
		}
		
		mysql_close($connect);
		
		return mysql_fetch_array($result);
	}
?>
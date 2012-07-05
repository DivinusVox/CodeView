<?php
	
	function connectDB()
	{
		$host = "localhost";
		$db = "codeview";
		$user = "codeview";
		$pass = "pUpR4YR8eCdvnqEc";
		$connect = mysql_connect($host, $user, $pass);
		
		if (!$connect){
			die("Error connecting to database: " . mysql_error());
		}
	}
	
	function getProjects()
	{
		connectDB();
		
		if ($connect){
			$statement = "SELECT * FROM `projects` WHERE 1";
			
			$mysql_select_db($db, $connect);
			$result = mysql_query($statement);
		}
		
		mysql_close($conmect);
		
		return mysql_fetch_array($result);
	}
?>
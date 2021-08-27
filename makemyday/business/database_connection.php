<?php

	$Server_Address = "127.0.0.1";
	$Username = "root";
	$Password = "";
	$Database_Name = "makemyday";
	
	$Create_Connection = mysqli_connect($Server_Address, $Username, $Password, $Database_Name);
	
	if($Create_Connection == false)
	{
		echo "Debugging Error Number : ".mysqli_connect_errno()."<br>";
		echo "Debugging Error Text : ".mysqli_connect_error()."<br>";
	}
	
	ini_set('display_errors', 0);
	
?>
<?php
	include "database_connection.php";
	$id=$_GET['id'];
	$pid=$_GET['pid'];
	echo $id." ".$pid;
	function add_data()
	{
		$query="";
		if(!mysqli_query($Create_Connection,$query))
		{

		}
	}


?>


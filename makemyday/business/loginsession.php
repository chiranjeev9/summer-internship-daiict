<?php
	
	ini_set('error_reporting', 0);

	session_start();
	
	include "database_connection.php";
	try
	{
	if(is_null($_SESSION['CUser_ID']))
	{
		//echo "Session Time out";
		echo "<script> location.href='login.php';</script>";
	}
	else
	{
		$Get_User_Details = mysqli_query($Create_Connection, "SELECT * FROM `userm` WHERE `emailid` = '".$_SESSION['CUser']."'");
	
		$Show_User_Details = mysqli_fetch_array($Get_User_Details);
			if($Show_User_Details['gender'] == 'Male')
			{
				$Avatar = 'img/male.png';
			}
			else
			{
				$Avatar = 'img/female.png';
			}
			$Name = $Show_User_Details['firstname']." ".$Show_User_Details['lastname'];
			$CUserid = $Show_User_Details['userid'];
		
	}
}
catch(Exception $e){;}
?>
<?php

	session_start();

	include "business/database_connection.php";
		
		$Email = trim(strip_tags($_POST['Email']));
		$Password = strip_tags($_POST['Password']);

		$Login = mysqli_query($Create_Connection, "SELECT * FROM `userm` WHERE `usertype` = 'Vendor' AND (`emailid` = '".$Email."' AND `password` = '".$Password."')");
		
		$Send_Response = array();
		
		if(mysqli_num_rows($Login) == 1)
		{
			$_SESSION['VUser'] = $Email;
			
			$Send_Response['Status_Type'] = "LOGIN_SUCCESSFUL";
			$Send_Response['Status_Message'] = "";
		}
		else
		{
			$Send_Response['Status_Type'] = "LOGIN_FAILED";
			$Send_Response['Status_Message'] = "Your login details do not match with any user.";
		}
		
		echo json_encode($Send_Response);
	
	
	
	mysqli_close($Create_Connection);
	
?>
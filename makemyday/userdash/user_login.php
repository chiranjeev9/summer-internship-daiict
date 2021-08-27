<?php

	session_start();

	include "../business/database_connection.php";
		
		$Email = trim(strip_tags($_POST['Email']));
		$Password = strip_tags($_POST['Password']);
		$utype="";
		$Login = mysqli_query($Create_Connection, "SELECT * FROM `userm` WHERE `emailid` = '".$Email."' AND `password` = '".$Password."'");
		
		$Send_Response = array();
		
		if(mysqli_num_rows($Login) == 1)
		{
			$_SESSION['CUser'] = $Email;
			while($res=mysqli_fetch_array($Login))
			{
				$utype=$res['usertype'];
				
				if($utype == 'User')
				{
				$_SESSION['CUser_ID']=$res['userid'];
				$Send_Response['Status_Type'] = "LOGIN_SUCCESSFUL_USER";
				$Send_Response['Status_Message'] = "";	
				}
				else
				{
				$Send_Response['Status_Type'] = "LOGIN_FAILED";
				$Send_Response['Status_Message'] = "Your login details do not match with any user.";
				}
				
			}

			
		}
		else
		{
			$Send_Response['Status_Type'] = "LOGIN_FAILED";
			$Send_Response['Status_Message'] = "Your login details do not match with any user.";
		}
		
		echo json_encode($Send_Response);
	
	
	
	mysqli_close($Create_Connection);
	
?>
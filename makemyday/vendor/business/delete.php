<?php
	session_start();
	
		include "database_connection.php";
		if($_POST['Type'] == "Country")
		{
			$countryid = $_POST['countryid'];
			$countryname = $_POST['countryname'];
			$isactive_status=0;
			$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			//$Fetch_country_Name = $country[1];
			$Send_Response = array();
			if($rowcount == 0)
			{
					$Send_Response['Status_Type'] = "COUNTRY_DOES_NOT_EXISTS";
					$Send_Response['Status_Message'] = "'".$countryname."' does not exists.";
			}
			else
			{
			
				$Add_Data = "UPDATE `countrym` SET isactive='0' where countryid='".$countryid."' ";

				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "COUNTRY_DELETED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$countryname."' deleted successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "COUNTRY_DELETION_FAILED";
					$Send_Response['Status_Message'] = "Failed to delete '".$countryname."' country.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "State")
		{
			$stateid = $_POST['stateid'];
			$statename = $_POST['statename'];
			$countryname = $_POST['countryname'];
			$countryid=0;
			$isactive_status=0;
			$conres=mysqli_query($Create_Connection,"SELECT * from `countrym` where countryname='".$countryname."'");
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["countryname"] == $countryname)
    			{
    				$countryid=$row["countryid"];
    			}
    		}


			$Check = mysqli_query($Create_Connection, "SELECT * FROM `statem` where statename='".$statename."' and countryid = '".$countryid."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			
			//$Fetch_country_Name = $country[1];
			
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount == 0)
			{
				$Send_Response['Status_Type'] = "STATE_DOES_NOT_EXISTS";
				$Send_Response['Status_Message'] = "'".$statename."' does not exists.\n\nPlease select a state or correct country.";			
			}
			else
			{
				$Add_Data = "UPDATE `statem` SET isactive='".$isactive_status."' where stateid='".$stateid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "STATE_DELETED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$statename."' deleted successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "STATE_DELETION_FAILED";
					$Send_Response['Status_Message'] = "Failed to delete '".$statename."' state.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "City")
		{
			$cityid = $_POST['cityid'];
			$cityname = $_POST['cityname'];
			$statename = $_POST['statename'];
			$stateid=0;
			$isactive_status=0;
			$conres=mysqli_query($Create_Connection,"SELECT * from `statem` where statename='".$statename."'");
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["statename"] == $statename)
    			{
    				$stateid=$row["stateid"];
    			}
    		}


			$Check = mysqli_query($Create_Connection, "SELECT * FROM `citym` where cityname='".$cityname."' and stateid = '".$stateid."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			
			//$Fetch_country_Name = $country[1];
			
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount == 0)
			{
				$Send_Response['Status_Type'] = "CITY_DOES_NOT_EXISTS";
				$Send_Response['Status_Message'] = "'".$cityname."' does exists.\n\nPlease select city or state.";			
			}
			else
			{
				$Add_Data = "UPDATE `citym` SET isactive='".$isactive_status."' where cityid='".$cityid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "CITY_DELETED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$cityname."' deleted successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "CITY_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to delete '".$cityname."' city.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "Area")
		{
			$areaid = $_POST['areaid'];
			$areaname = $_POST['areaname'];
			$cityname = $_POST['cityname'];
			$cityid=0;
			$isactive_status=0;
			$conres=mysqli_query($Create_Connection,"SELECT * from `citym` where cityname='".$cityname."'");
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["cityname"] == $cityname)
    			{
    				$cityid=$row["cityid"];
    			}
    		}


			$Check = mysqli_query($Create_Connection, "SELECT * FROM `aream` where areaname='".$areaname."' and cityid = '".$cityid."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			
			//$Fetch_country_Name = $country[1];
			
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount == 0)
			{
				$Send_Response['Status_Type'] = "AREA_DOES_NOT_EXISTS";
				$Send_Response['Status_Message'] = "'".$areaname."' does exists.\n\nPlease select valid area and city.";			
			}
			else
			{
				$Add_Data = "UPDATE `aream` SET isactive='".$isactive_status."' where areaid='".$areaid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "AREA_DELETED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$areaname."' deleted successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "AREA_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to delete '".$areaname."' area.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}

		mysqli_close($Create_Connection);
?>


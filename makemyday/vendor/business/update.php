<?php
	session_start();
	
		include "database_connection.php";
		if($_POST['Type'] == "Country")
		{
			$countryid = $_POST['countryid'];
			$countryname = $_POST['countryname'];
			
			$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			
			//$Fetch_country_Name = $country[1];
			
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "COUNTRY_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$countryname."' already exists.\n\nPlease enter a different country.";			
			}
			else
			{
				$Add_Data = "UPDATE `countrym` SET countryname='".$countryname."' where countryid='".$countryid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "COUNTRY_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$countryname."' updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "COUNTRY_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update '".$countryname."' country.\n\nPlease try again later.";
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
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "STATE_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$statename."' already exists.\n\nPlease enter a different state.";			
			}
			else
			{
				$Add_Data = "UPDATE `statem` SET statename='".$statename."', countryid='".$countryid."' where stateid='".$stateid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "STATE_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$statename."' updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "STATE_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update '".$statename."' state.\n\nPlease try again later.";
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
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "CITY_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$cityname."' already exists.\n\nPlease enter a different city.";			
			}
			else
			{
				$Add_Data = "UPDATE `citym` SET cityname='".$cityname."', stateid='".$stateid."' where cityid='".$cityid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "CITY_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$cityname."' updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "CITY_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update '".$cityname."' city.\n\nPlease try again later.";
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
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "AREA_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$areaname."' already exists.\n\nPlease enter a different area.";			
			}
			else
			{
				$Add_Data = "UPDATE `aream` SET areaname='".$areaname."', cityid='".$cityid."' where areaid='".$areaid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "AREA_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$areaname."' updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "AREA_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update '".$areaname."' area.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}

		mysqli_close($Create_Connection);
?>


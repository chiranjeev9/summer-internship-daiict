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
        else if($_POST['Type'] == "Category")
		{
			$categoryid = $_POST['categoryid'];
			$categoryname = $_POST['categoryname'];
			$isactive_status=0;
			$Check = mysqli_query($Create_Connection, "SELECT * FROM `categorym` where categoryname='".$categoryname."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			//$Fetch_country_Name = $country[1];
			$Send_Response = array();
			if($rowcount == 0)
			{
					$Send_Response['Status_Type'] = "CATEGORY_DOES_NOT_EXISTS";
					$Send_Response['Status_Message'] = "'".$categoryname."' does not exists.";
			}
			else
			{
			
				$Add_Data = "UPDATE `categorym` SET isactive='0' where categoryid='".$categoryid."' ";

				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "CATEGORY_DELETED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$categoryname."' deleted successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "CATEGORY_DELETION_FAILED";
					$Send_Response['Status_Message'] = "Failed to delete '".$categoryname."' country.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "Subcategory")
		{
			$subcategoryid = $_POST['subcategoryid'];
			$subcategoryname = $_POST['subcategoryname'];
			$categoryname = $_POST['categoryname'];
			$categoryid=0;
			$isactive_status=0;
			$conres=mysqli_query($Create_Connection,"SELECT * from `categorym` where categoryname='".$categoryname."'");
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["categoryname"] == $categoryname)
    			{
    				$categoryid=$row["categoryid"];
    			}
    		}


			$Check = mysqli_query($Create_Connection, "SELECT * FROM `subcategorym` where subcategoryname='".$subcategoryname."' and categoryid = '".$categoryid."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			
			//$Fetch_country_Name = $country[1];
			
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount == 0)
			{
				$Send_Response['Status_Type'] = "SUBCATEGORY_DOES_NOT_EXISTS";
				$Send_Response['Status_Message'] = "'".$subcategoryname."' does not exists.\n\nPlease select a subcategory or correct category.";			
			}
			else
			{
				$Add_Data = "UPDATE `subcategorym` SET isactive='".$isactive_status."' where subcategoryid='".$subcategoryid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "SUBCATEGORY_DELETED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$subcategoryname."' deleted successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "SUBCATEGORY_DELETION_FAILED";
					$Send_Response['Status_Message'] = "Failed to delete '".$subcategoryname."' state.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "Product")
		{
			$productid=$_POST['productid'];
			$productname = $_POST['productname'];
			$subcategoryname=$_POST['subcategoryname'];
			$brandname = $_POST['brandname'];
			$price = $_POST['price'];
			$tax = $_POST['tax'];
			$priceunit = $_POST['priceunit'];
			$description = $_POST['description'];
			$tag = $_POST['tag'];
			$userid=$_SESSION['User_ID'];
			$isactive_status=0;
			//Fetch countryid from country table
			$conres=mysqli_query($Create_Connection,"SELECT * from `subcategorym` where subcategoryname='".$subcategoryname."'");
			$subcategoryid = 0;
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["subcategoryname"] == $subcategoryname)
    			{
    				$subcategoryid=$row["subcategoryid"];
    			}
    		}

			//$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$res=mysqli_query($Create_Connection, "SELECT * FROM `productm` where productname='".$productname."' and productbrand='".$brandname."' and price=".$price." and priceunit='".$priceunit."' and tax=".$tax." and productdescription='".$description."' and tag='".$tag."' and userid=".$userid." and subcategoryid='".$subcategoryid."'");
			$rowcount=mysqli_num_rows($res);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			//$Fetch_country_Name = $country[1];
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount < 1)
			{
				$Send_Response['Status_Type'] = "PRODUCT_DOES_NOT_EXISTS";
				$Send_Response['Status_Message'] = "'".$productname."' does not exists.\n\nPlease enter a different product.";			
			}
			else
			{
				$Add_Data = "UPDATE `productm` set isactive=".$isactive_status." where productid=".$productid." ";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "PRODUCT_DELETED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$productname."' product deleted successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "PRODUCT_DELETION_FAILED";
					$Send_Response['Status_Message'] = "Failed to delete '".$productname."' product.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		if($_POST['Type'] == "Occation")
		{
			$occationid = $_POST['Occationid'];
			$occationname = $_POST['Occationname'];
			$isactive_status=0;
			$Check = mysqli_query($Create_Connection, "SELECT * FROM `occationm` where occationname='".$occationname."'");
			$rowcount=mysqli_num_rows($Check);
			//$occation = mysqli_fetch_array($Check, MYSQLI_NUM);
			//$Fetch_occation_Name = $occation[1];
			$Send_Response = array();
			if($rowcount == 0)
			{
					$Send_Response['Status_Type'] = "OCCATION_DOES_NOT_EXISTS";
					$Send_Response['Status_Message'] = "'".$occationname."' does not exists.";
			}
			else
			{
			
				$Add_Data = "UPDATE `occationm` SET isactive='0' where occationid='".$occationid."' ";

				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "OCCATION_DELETED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$occationname."' deleted successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "OCCATION_DELETION_FAILED";
					$Send_Response['Status_Message'] = "Failed to delete '".$occationname."' occation.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		mysqli_close($Create_Connection);
?>


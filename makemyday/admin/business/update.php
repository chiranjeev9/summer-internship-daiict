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
         else if($_POST['Type'] == "Category")
		{
			$categoryid = $_POST['categoryid'];
			$categoryname = $_POST['categoryname'];
			
			$Check = mysqli_query($Create_Connection, "SELECT * FROM `categorym` where categoryname='".$categoryname."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			
			//$Fetch_country_Name = $country[1];
			
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "CATEGORY_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$categoryname."' already exists.\n\nPlease enter a different category.";			
			}
			else
			{
				$Add_Data = "UPDATE `categorym` SET categoryname='".$categoryname."' where categoryid='".$categoryid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "CATEGORY_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$categoryname."' updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "CATEGORY_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update '".$categoryname."' category.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		/*else if($_POST['Type'] == "Category")
		{
			$categoryid = $_POST['categoryid'];
			$categoryname = $_POST['categoryname'];
			
			$Check = mysqli_query($Create_Connection, "SELECT * FROM `categorym` where categoryname='".$categoryname."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			
			//$Fetch_country_Name = $country[1];
			
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "CATEGORY_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$categoryname."' already exists.\n\nPlease enter a different category.";			
			}
			else
			{
				$Add_Data = "UPDATE `categorym` SET categoryname='".$categoryname."' where categoryid='".$categoryid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "CATEGORY_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$categoryname."' updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "CATEGORY_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update '".$categoryname."' category.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}*/
		else if($_POST['Type'] == "Subcategory")
		{
			$subcategoryid = $_POST['subcategoryid'];
			$subcategoryname = $_POST['subcategoryname'];
			$categoryname = $_POST['categoryname'];
			$categoryid=0;
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
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "SUBCATEGORY_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$subcategoryname."' already exists.\n\nPlease enter a different subcategory.";			
			}
			else
			{
				$Add_Data = "UPDATE `subcategorym` SET subcategoryname='".$subcategoryname."', categoryid='".$categoryid."' where subcategoryid='".$subcategoryid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "SUBCATEGORY_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$subcategoryname."' updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "SUBCATEGORY_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update '".$subcategoryname."' subcategory.\n\nPlease try again later.";
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
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "PRODUCT_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$productname."' already exists.\n\nPlease enter a different product.";			
			}
			else
			{
				$Add_Data = "UPDATE `productm` set productname='".$productname."', subcategoryid=".$subcategoryid.", productbrand='".$brandname."', price=".$price.", priceunit='".$priceunit."', tax=".$tax.", productdescription='".$description."', tag='".$tag."', userid=".$userid." where productid=".$productid." ";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "PRODUCT_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$productname."' product updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "PRODUCT_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update '".$productname."' product.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "Occation")
		{
			$occationid = $_POST['Occationid'];
			$occationname = $_POST['Occationname'];
			
			$Check = mysqli_query($Create_Connection, "SELECT * FROM `occationm` where occationname='".$occationname."'");
			$rowcount=mysqli_num_rows($Check);
			//$occation = mysqli_fetch_array($Check, MYSQLI_NUM);
			
			//$Fetch_occation_Name = $occation[1];
			
			$Send_Response = array();
			
			//if($Fetch_occation_Name == $occationname)
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "OCCATION_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$occationname."' already exists.\n\nPlease enter a different occation.";			
			}
			else
			{
				$Add_Data = "UPDATE `occationm` SET occationname='".$occationname."' where occationid='".$occationid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "OCCATION_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$occationname."' updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "OCCATION_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update '".$occationname."' occation.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "Order")
		{
			$orderid = $_POST['orderid'];
			$orderstatus = $_POST['statustype'];
			
			$Check = mysqli_query($Create_Connection, "SELECT * FROM `ordert` where orderid='".$orderid."'");
			$rowcount=mysqli_num_rows($Check);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			
			//$Fetch_country_Name = $country[1];
			
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount <=0)
			{
				$Send_Response['Status_Type'] = "ORDER_DOES_NOT_EXISTS";
				$Send_Response['Status_Message'] = "'".$orderid."' does not exists.\n\nPlease enter a different order.";			
			}
			else
			{
				$Add_Data = "UPDATE `ordert` SET orderstatus='".$orderstatus."' where orderid='".$orderid."' ";
			
				$Fire_Update_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "ORDER_UPDATED_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$orderid."' updated successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "ORDER_UPDATION_FAILED";
					$Send_Response['Status_Message'] = "Failed to update order status.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		mysqli_close($Create_Connection);
?>


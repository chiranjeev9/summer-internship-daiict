<?php
		session_start();
		include "database_connection.php";
		
		if($_POST['Type'] == "Country")
		{
			$countryname = $_POST['countryname'];
		
			//$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$res=mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$rowcount=mysqli_num_rows($res);
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
				$Add_Data = "INSERT INTO `countrym` (`countryname`) VALUES ('".mysqli_real_escape_string($Create_Connection, $countryname)."')";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "COUNTRY_ADDING_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$countryname."' country added successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "COUNTRY_ADDING_FAILED";
					$Send_Response['Status_Message'] = "Failed to add '".$countryname."' country.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
	
		else if($_POST['Type'] == "State")
		{
			$statename = $_POST['Statename'];
			$countryname=$_POST['Countryname'];
		
			//Fetch countryid from country table
			$conres=mysqli_query($Create_Connection,"SELECT * from `countrym` where countryname='".$countryname."'");
			$countryid = 0;
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["countryname"] == $countryname)
    			{
    				$countryid=$row["countryid"];
    			}
    		}

			//$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$res=mysqli_query($Create_Connection, "SELECT * FROM `statem` where statename='".$statename."' and countryid='".$countryid."'");
			$rowcount=mysqli_num_rows($res);
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
				$Add_Data = "INSERT INTO `statem` (`statename`,`countryid`) VALUES ('".mysqli_real_escape_string($Create_Connection, $statename)."','".$countryid."')";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "STATE_ADDING_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$statename."' state added successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "STATE_ADDING_FAILED";
					$Send_Response['Status_Message'] = "Failed to add '".$statename."' state.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}

		else if($_POST['Type'] == "City")
		{
			$cityname = $_POST['Cityname'];
			$statename=$_POST['Statename'];
		
			//Fetch countryid from country table
			$conres=mysqli_query($Create_Connection,"SELECT * from `statem` where statename='".$statename."'");
			$stateid = 0;
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["statename"] == $statename)
    			{
    				$stateid=$row["stateid"];
    			}
    		}

			//$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$res=mysqli_query($Create_Connection, "SELECT * FROM `citym` where cityname='".$cityname."' and stateid='".$stateid."'");
			$rowcount=mysqli_num_rows($res);
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
				$Add_Data = "INSERT INTO `citym` (`cityname`,`stateid`) VALUES ('".mysqli_real_escape_string($Create_Connection, $cityname)."','".$stateid."')";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "CITY_ADDING_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$cityname."' city added successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "CITY_ADDING_FAILED";
					$Send_Response['Status_Message'] = "Failed to add '".$cityname."' city.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "Area")
		{
			$areaname = $_POST['Areaname'];
			$cityname=$_POST['Cityname'];
		
			//Fetch countryid from country table
			$conres=mysqli_query($Create_Connection,"SELECT * from `citym` where cityname='".$cityname."'");
			$cityid = 0;
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["cityname"] == $cityname)
    			{
    				$cityid=$row["cityid"];
    			}
    		}

			//$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$res=mysqli_query($Create_Connection, "SELECT * FROM `aream` where areaname='".$areaname."' and cityid='".$cityid."'");
			$rowcount=mysqli_num_rows($res);
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
				$Add_Data = "INSERT INTO `aream` (`areaname`,`cityid`) VALUES ('".mysqli_real_escape_string($Create_Connection, $areaname)."','".$cityid."')";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "AREA_ADDING_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$areaname."' area added successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "AREA_ADDING_FAILED";
					$Send_Response['Status_Message'] = "Failed to add '".$areaname."' area.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		if($_POST['Type'] == "Category")
		{
			$categoryname = $_POST['categoryname'];
		
			//$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$res=mysqli_query($Create_Connection, "SELECT * FROM `categorym` where categoryname='".$categoryname."'");
			$rowcount=mysqli_num_rows($res);
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
				$Add_Data = "INSERT INTO `categorym` (`categoryname`) VALUES ('".mysqli_real_escape_string($Create_Connection, $categoryname)."')";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "CATEGORY_ADDING_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$categoryname."' category added successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "CATEGORY_ADDING_FAILED";
					$Send_Response['Status_Message'] = "Failed to add '".$categoryname."' category.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "Subcategory")
		{
			$subcategoryname = $_POST['Subcategoryname'];
			$categoryname=$_POST['Categoryname'];
		
			//Fetch countryid from country table
			$conres=mysqli_query($Create_Connection,"SELECT * from `categorym` where categoryname='".$categoryname."'");
			$categoryid = 0;
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["categoryname"] == $categoryname)
    			{
    				$categoryid=$row["categoryid"];
    			}
    		}

			//$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$res=mysqli_query($Create_Connection, "SELECT * FROM `subcategorym` where subcategoryname='".$subcategoryname."' and categoryid='".$categoryid."'");
			$rowcount=mysqli_num_rows($res);
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
				$Add_Data = "INSERT INTO `subcategorym` (`subcategoryname`,`categoryid`) VALUES ('".mysqli_real_escape_string($Create_Connection, $subcategoryname)."','".$categoryid."')";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "SUBCATEGORY_ADDING_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$subcategoryname."' subcategory added successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "SUBCATEGORY_ADDING_FAILED";
					$Send_Response['Status_Message'] = "Failed to add '".$subcategoryname."' subcategory.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "Product")
		{
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
			$res=mysqli_query($Create_Connection, "SELECT * FROM `productm` where productname='".$productname."' and subcategoryid='".$subcategoryid."'");
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
				$Add_Data = "INSERT INTO `productm` (`productname`,`subcategoryid`,`productbrand`,`price`,`tax`,`priceunit`,`productdescription`,`tag`,`userid`) VALUES ('".mysqli_real_escape_string($Create_Connection, $productname)."',".$subcategoryid.",'".$brandname."',".$price.",".$tax.",'".$priceunit."','".$description."','".$tag."',".$userid.")";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "PRODUCT_ADDING_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$productname."' product added successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "PRODUCT_ADDING_FAILED";
					$Send_Response['Status_Message'] = "Failed to add '".$productname."' product.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		else if($_POST['Type'] == "Gallery")
		{
			$productname = $_POST['productname'];
			$imagetitle=$_POST['imagetitle'];
			$photo = $_POST['photo'];
			$userid=$_SESSION['User_ID'];
		
			//Fetch countryid from country table
			$conres=mysqli_query($Create_Connection,"SELECT * from `productm` where productname='".$productname."'");
			$productid = 0;
			while($row=mysqli_fetch_array($conres))
    		{
    			if($row["productname"] == $productname)
    			{
    				$productid=$row["productid"];
    			}
    		}
    		$file_name = $_FILES[$photo]['name'];
     		$file_type = $_FILES[$photo]['type'];
     		$file_tem_loc = $_FILES[$photo]['tmp_name'];
    		$file_store = "../product_image/".$file_name;
     		move_uploaded_file($file_tem_loc, $file_store);
			//$Check = mysqli_query($Create_Connection, "SELECT * FROM `countrym` where countryname='".$countryname."'");
			$res=mysqli_query($Create_Connection, "SELECT * FROM `gallerym` where productid='".$productid."' and imagepath='".$file_name."'");
			$rowcount=mysqli_num_rows($res);
			//$country = mysqli_fetch_array($Check, MYSQLI_NUM);
			//$Fetch_country_Name = $country[1];
			$Send_Response = array();
			
			//if($Fetch_country_Name == $countryname)
			if($rowcount > 0)
			{
				$Send_Response['Status_Type'] = "PHOTO_ALREADY_EXISTS";
				$Send_Response['Status_Message'] = "'".$file_name."' already exists.\n\nPlease enter a different photo.";			
			}
			else
			{
				$Add_Data = "INSERT INTO `productm` (`productname`,`subcategoryid`,`productbrand`,`price`,`tax`,`priceunit`,`productdescription`,`tag`,`userid`) VALUES ('".mysqli_real_escape_string($Create_Connection, $productname)."',".$subcategoryid.",'".$brandname."',".$price.",".$tax.",'".$priceunit."','".$description."','".$tag."',".$userid.")";
			
				$Fire_Insert_Query = mysqli_query($Create_Connection, $Add_Data);

				if(mysqli_affected_rows($Create_Connection) == 1)
				{
					$Send_Response['Status_Type'] = "PRODUCT_ADDING_SUCCESSFUL";
					$Send_Response['Status_Message'] = "'".$productname."' product added successfully.";
				}
				else
				{
					$Send_Response['Status_Type'] = "PRODUCT_ADDING_FAILED";
					$Send_Response['Status_Message'] = "Failed to add '".$productname."' product.\n\nPlease try again later.";
				}
			}
			
			echo json_encode($Send_Response);
		}
		mysqli_close($Create_Connection);
?>


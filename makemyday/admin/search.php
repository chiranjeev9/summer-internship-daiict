<?php

	session_start();

	include "business/database_connection.php";
	
	if($_POST['Type'] == "Search_Country_Data")
	{
		$Country_Name = trim(strip_tags($_POST['Country_Name']));
		
		$Prepare_Search_Query = "SELECT * FROM `countrym` WHERE `countryname` LIKE '%$Country_Name%' ORDER BY `countryid` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Country <u><b>".$Country_Name."</b></u></h1></center>";
		}
		else
		{
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$Country_ID = $Get_Search_Data['countryid'];
				$Country_Name =  $Get_Search_Data['countryname'];
				
				echo '
                              <tr>
                                <td>'.$Country_ID.'</td>
                                <td>'.$Country_Name.'</td>
                                <td><i class="fas fa-edit"> Edit</i></td>
                              </tr>
                        ';
			}
			
		}
	}
	
	else if($_POST['Type'] == "Display_State_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `statem` ORDER BY `stateid` ";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For State <u><b>".$State_Name."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>State Name</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$State_ID = $Get_Search_Data['stateid'];
				$State_Name =  $Get_Search_Data['statename'];
				
				echo '<tr>';
				echo '<td>'.$State_Name.'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_State('.$State_ID.',\''.$State_Name.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_State('.$State_ID.',\''.$State_Name.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Search_Vendor_Data")
	{
		$Vendor_Name = trim(strip_tags($_POST['Vendor_Name']));
		
		$Prepare_Search_Query = "SELECT * FROM `vendor_master` WHERE `Vendor_Name` LIKE '%$Vendor_Name%' ORDER BY `Vendor_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Vendor <u><b>".$Vendor_Name."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Vendor</th><th>Address</th><th>Phone Number</th><th>City</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$Vendor_ID = $Get_Search_Data['Vendor_ID'];
				$Vendor_Name =  $Get_Search_Data['Vendor_Name'];
				
				$Get_City_Name = mysqli_query($Create_Connection, "SELECT `City_Name` FROM `city_master` WHERE `City_ID` = '".$Get_Search_Data['City_ID']."'");
				
				$City_Name = mysqli_fetch_array($Get_City_Name, MYSQLI_ASSOC);
				
				$Show_City_Name = $City_Name['City_Name'];
				
				echo '<tr id='.$Vendor_ID.'>';
				echo '<td id="vname_'.$Vendor_ID.'" contenteditable="true">'.$Vendor_Name.'</td><td id="vaddr_'.$Vendor_ID.'" contenteditable="true">'.$Get_Search_Data['Vendor_Address'].'</td><td id="vno_'.$Vendor_ID.'" contenteditable="true">'.$Get_Search_Data['Vendor_Ph_No'].'</td><td id="vcity_'.$Vendor_ID.'" contenteditable="true">'.$Show_City_Name.'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Vendor('.$Vendor_ID.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Vendor('.$Vendor_ID.',\''.$Vendor_Name.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Display_Vendor_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `vendor_master` ORDER BY `Vendor_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Vendor <u><b>".$Vendor_Name."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Vendor</th><th>Address</th><th>Phone Number</th><th>City</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$Vendor_ID = $Get_Search_Data['Vendor_ID'];
				$Vendor_Name =  $Get_Search_Data['Vendor_Name'];
				
				$Get_City_Name = mysqli_query($Create_Connection, "SELECT `City_Name` FROM `city_master` WHERE `City_ID` = '".$Get_Search_Data['City_ID']."'");
				
				$City_Name = mysqli_fetch_array($Get_City_Name, MYSQLI_ASSOC);
				
				$Show_City_Name = $City_Name['City_Name'];
				
				echo '<tr id='.$Vendor_ID.'>';
				echo '<td id="vname_'.$Vendor_ID.'" contenteditable="true">'.$Vendor_Name.'</td><td id="vaddr_'.$Vendor_ID.'" contenteditable="true">'.$Get_Search_Data['Vendor_Address'].'</td><td id="vno_'.$Vendor_ID.'" contenteditable="true">'.$Get_Search_Data['Vendor_Ph_No'].'</td><td id="vcity_'.$Vendor_ID.'" contenteditable="true">'.$Show_City_Name.'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Vendor('.$Vendor_ID.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Vendor('.$Vendor_ID.',\''.$Vendor_Name.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Search_Spare_Parts_Data")
	{
		$Spare_Parts_Name = trim(strip_tags($_POST['Spare_Parts_Name']));
		
		$Prepare_Search_Query = "SELECT * FROM `spare_parts_master` WHERE `S_P_Name` LIKE '%$Spare_Parts_Name%' ORDER BY `S_P_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Spare Part <u><b>".$Spare_Parts_Name."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Spare Part</th><th>City</th><th>Quantity</th><th>Rate</th><th>Amount</th><th>Purchase Date</th><th>Fleet Number</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$Spare_Parts_ID = $Get_Search_Data['S_P_ID'];
				$Spare_Parts_Name =  $Get_Search_Data['S_P_Name'];
				
				echo '<tr>';
				echo '<td>'.$Spare_Parts_Name.'</td><td>'.$Get_Search_Data['S_P_City'].'</td><td>'.$Get_Search_Data['S_P_Quantity'].'</td><td>'.$Get_Search_Data['S_P_Rate'].'</td><td>'.$Get_Search_Data['S_P_Amount'].'</td><td>'.$Get_Search_Data['S_P_Purchase_Date'].'</td><td>'.$Get_Search_Data['Fleet_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Spare_Parts('.$Spare_Parts_ID.',\''.$Spare_Parts_Name.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Spare_Parts('.$Spare_Parts_ID.',\''.$Spare_Parts_Name.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Display_Spare_Parts_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `spare_parts_master` ORDER BY `S_P_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Spare Part <u><b>".$Spare_Parts_Name."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Spare Part</th><th>City</th><th>Quantity</th><th>Rate</th><th>Amount</th><th>Purchase Date</th><th>Fleet Number</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$Spare_Parts_ID = $Get_Search_Data['S_P_ID'];
				$Spare_Parts_Name =  $Get_Search_Data['S_P_Name'];
				
				echo '<tr>';
				echo '<td>'.$Spare_Parts_Name.'</td><td>'.$Get_Search_Data['S_P_City'].'</td><td>'.$Get_Search_Data['S_P_Quantity'].'</td><td>'.$Get_Search_Data['S_P_Rate'].'</td><td>'.$Get_Search_Data['S_P_Amount'].'</td><td>'.$Get_Search_Data['S_P_Purchase_Date'].'</td><td>'.$Get_Search_Data['Fleet_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Spare_Parts('.$Spare_Parts_ID.',\''.$Spare_Parts_Name.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Spare_Parts('.$Spare_Parts_ID.',\''.$Spare_Parts_Name.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Search_Company_Data")
	{
		$Company_Name = trim(strip_tags($_POST['Company_Name']));
		
		$Prepare_Search_Query = "SELECT * FROM `insurance_master` WHERE `Company_Name` LIKE '%$Company_Name%' ORDER BY `Insurance_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Company <u><b>".$Company_Name."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Company Name</th><th>Company Address</th><th>Company Phone Number</th><th>Fleet Number</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$Company_ID = $Get_Search_Data['Insurance_ID'];
				$Company_Name =  $Get_Search_Data['Company_Name'];
				
				echo '<tr id="irow_'.$Company_ID.'">';
				echo '<td id="iname_'.$Company_ID.'" contenteditable="true">'.$Company_Name.'</td><td id="iaddress_'.$Company_ID.'" contenteditable="true">'.$Get_Search_Data['Company_Address'].'</td><td id="inum_'.$Company_ID.'" contenteditable="true">'.$Get_Search_Data['Company_Contact'].'</td><td id="i_flt_no_'.$Company_ID.'" contenteditable="true">'.$Get_Search_Data['Fleet_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Insurance('.$Company_ID.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Company('.$Company_ID.',\''.$Company_Name.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Display_Insurance_Data")
	{
		$Company_Name = trim(strip_tags($_POST['Company_Name']));
		
		$Prepare_Search_Query = "SELECT * FROM `insurance_master` ORDER BY `Insurance_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found</h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Company Name</th><th>Company Address</th><th>Company Phone Number</th><th>Fleet Number</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$Company_ID = $Get_Search_Data['Insurance_ID'];
				$Company_Name =  $Get_Search_Data['Company_Name'];
				
				echo '<tr id="irow_'.$Company_ID.'">';
				echo '<td id="iname_'.$Company_ID.'" contenteditable="true">'.$Company_Name.'</td><td id="iaddress_'.$Company_ID.'" contenteditable="true">'.$Get_Search_Data['Company_Address'].'</td><td id="inum_'.$Company_ID.'" contenteditable="true">'.$Get_Search_Data['Company_Contact'].'</td><td id="i_flt_no_'.$Company_ID.'" contenteditable="true">'.$Get_Search_Data['Fleet_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Insurance('.$Company_ID.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Company('.$Company_ID.',\''.$Company_Name.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Search_Fleet_Data")
	{
		$Fleet_Type = trim(strip_tags($_POST['Fleet_Type']));
		
		if($Fleet_Type == '*')
		{
			$Search_Query = "SELECT * FROM `fleet_master` ORDER BY `Fleet_No` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet</th><th>Branch Number</th><th>Insurance Number</th><th>RTO Number</th><th>Fleet Weight</th><th>Chasis Number</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{
				$Fleet_No = $Get_Data['Fleet_No'];
				$Fleet_Type =  $Get_Data['Fleet_Type'];
				
				echo '<tr>';
				echo '<td>'.$Fleet_Type.'</td><td>'.$Get_Data['Branch_ID'].'</td><td>'.$Get_Data['Insurance_ID'].'</td><td>'.$Get_Data['RTO_ID'].'</td><td>'.$Get_Data['Fleet_Weight'].'</td><td>'.$Get_Data['Chasis_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Fleet('.$Fleet_No.',\''.$Fleet_Type.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Fleet('.$Fleet_No.',\''.$Fleet_Type.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `fleet_master` WHERE `Fleet_Type` LIKE '%$Fleet_Type%' ORDER BY `Fleet_No` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_Type."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet</th><th>Branch Number</th><th>Insurance Number</th><th>RTO Number</th><th>Fleet Weight</th><th>Chasis Number</th><th>Perform Actions</th></tr></thead>";
				
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					$Fleet_No = $Get_Search_Data['Fleet_No'];
					$Fleet_Type =  $Get_Search_Data['Fleet_Type'];
					
					echo '<tr id="frow_'.$Fleet_No.'" data-id='.$Fleet_No.'>';
				echo '<td id="fname_'.$Fleet_No.'" contenteditable="true">'.$Fleet_Type.'</td><td id="bid_'.$Fleet_No.'" contenteditable="true">'.$Get_Search_Data['Branch_ID'].'</td><td id="rto_id_'.$Fleet_No.'" contenteditable="true">'.$Get_Search_Data['RTO_ID'].'</td><td id="weight_'.$Fleet_No.'" contenteditable="true">'.$Get_Search_Data['Fleet_Weight'].'</td><td id="c_num_'.$Fleet_No.'" contenteditable="true">'.$Get_Search_Data['Chasis_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Fleet('.$Fleet_No.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Fleet('.$Fleet_No.',\''.$Fleet_Type.'\')">Delete</u></td>';
				echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Fleet_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `fleet_master` ORDER BY `Fleet_No` DESC";
	
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_Type."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet</th><th>Branch Number</th><th>RTO Number</th><th>Fleet Weight</th><th>Chasis Number</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$Fleet_No = $Get_Search_Data['Fleet_No'];
				$Fleet_Type =  $Get_Search_Data['Fleet_Type'];
				
				echo '<tr id="frow_'.$Fleet_No.'" data-id='.$Fleet_No.'>';
				echo '<td id="fname_'.$Fleet_No.'" contenteditable="true">'.$Fleet_Type.'</td><td id="bid_'.$Fleet_No.'" contenteditable="true">'.$Get_Search_Data['Branch_ID'].'</td><td id="rto_id_'.$Fleet_No.'" contenteditable="true">'.$Get_Search_Data['RTO_ID'].'</td><td id="weight_'.$Fleet_No.'" contenteditable="true">'.$Get_Search_Data['Fleet_Weight'].'</td><td id="c_num_'.$Fleet_No.'" contenteditable="true">'.$Get_Search_Data['Chasis_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Fleet('.$Fleet_No.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Fleet('.$Fleet_No.',\''.$Fleet_Type.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Search_RTO_Data")
	{
		$Fleet_No = trim(strip_tags($_POST['Fleet_No']));
		
		if($Fleet_No == '*')
		{
			$Search_Query = "SELECT * FROM `rto_master` ORDER BY `RTO_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{
				$RTO_ID = $Get_Data['RTO_ID'];
				$Fleet_Number = $Get_Data['Fleet_No'];
				
				echo '<tr>';
				echo '<td>'.$Fleet_Number.'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_RTO('.$RTO_ID.', \''.$Fleet_Number.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_RTO('.$RTO_ID.', \''.$Fleet_Number.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `rto_master` WHERE `Fleet_No` = '".$Fleet_No."' ORDER BY `RTO_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_No."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Perform Actions</th></tr></thead>";
				
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					$RTO_ID = $Get_Search_Data['RTO_ID'];
					$Fleet_Number = $Get_Search_Data['Fleet_No'];
					
					echo '<tr>';
					echo '<td>'.$Fleet_Number.'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_RTO('.$RTO_ID.', \''.$Fleet_Number.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_RTO('.$RTO_ID.', \''.$Fleet_Number.'\')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_RTO_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `rto_master` ORDER BY `RTO_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_No."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Perform Actions</th></tr></thead>";
				
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					$RTO_ID = $Get_Search_Data['RTO_ID'];
					$Fleet_Number = $Get_Search_Data['Fleet_No'];
					
					echo '<tr>';
					echo '<td>'.$Fleet_Number.'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_RTO('.$RTO_ID.', \''.$Fleet_Number.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_RTO('.$RTO_ID.', \''.$Fleet_Number.'\')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_Breakdown_Data")
	{
		$Fleet_No = trim(strip_tags($_POST['Fleet_No']));
		
		if($Fleet_No == '*')
		{
			$Search_Query = "SELECT * FROM `breakdown_master` ORDER BY `Breakdown_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Driver ID</th><th>Date</th><th>Amount</th><th>Description</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{
				$Breakdown_ID = $Get_Data['Breakdown_ID'];
				$Fleet_Number = $Get_Data['Fleet_No'];
				
				echo '<tr>';
				echo '<td>'.$Fleet_Number.'</td><td>'.$Get_Data['Driver_ID'].'</td><td>'.$Get_Data['Breakdown_Date'].'</td><td>'.$Get_Data['Breakdown_Amount'].'</td><td>'.$Get_Data['Description'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Breakdown('.$Breakdown_ID.', \''.$Fleet_Number.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Breakdown('.$Breakdown_ID.', \''.$Fleet_Number.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `breakdown_master` WHERE `Fleet_No` = '".$Fleet_No."' ORDER BY `Breakdown_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_No."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Driver ID</th><th>Date</th><th>Amount</th><th>Description</th><th>Perform Actions</th></tr></thead>";
				
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					$Breakdown_ID = $Get_Search_Data['Breakdown_ID'];
					$Fleet_Number = $Get_Search_Data['Fleet_No'];
					
					echo '<tr>';
					echo '<td>'.$Fleet_Number.'</td><td>'.$Get_Search_Data['Driver_ID'].'</td><td>'.$Get_Search_Data['Breakdown_Date'].'</td><td>'.$Get_Search_Data['Breakdown_Amount'].'</td><td>'.$Get_Search_Data['Description'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Breakdown('.$Breakdown_ID.', \''.$Fleet_Number.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Breakdown('.$Breakdown_ID.', \''.$Fleet_Number.'\')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Breakdown_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `breakdown_master` ORDER BY `Breakdown_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_No."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Driver ID</th><th>Date</th><th>Amount</th><th>Description</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$Breakdown_ID = $Get_Search_Data['Breakdown_ID'];
				$Fleet_Number = $Get_Search_Data['Fleet_No'];
				
				echo '<tr>';
				echo '<td>'.$Fleet_Number.'</td><td>'.$Get_Search_Data['Driver_ID'].'</td><td>'.$Get_Search_Data['Breakdown_Date'].'</td><td>'.$Get_Search_Data['Breakdown_Amount'].'</td><td>'.$Get_Search_Data['Description'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Breakdown('.$Breakdown_ID.', \''.$Fleet_Number.'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Breakdown('.$Breakdown_ID.', \''.$Fleet_Number.'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Search_Service_Data")
	{
		$Fleet_No = trim(strip_tags($_POST['Fleet_No']));
		
		if($Fleet_No == '*')
		{
			$Search_Query = "SELECT * FROM `service_master` ORDER BY `Service_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Service Date</th><th>Next Service Date</th><th>Amount</th><th>Description</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{
				$Service_ID = $Get_Data['Service_ID'];
				$Fleet_Number = $Get_Data['Fleet_No'];
				
				echo '<tr>';
				echo '<td>'.$Fleet_Number.'</td><td>'.$Get_Data['Service_Date'].'</td><td>'.$Get_Data['Next_Service_Date'].'</td><td>'.$Get_Data['Service_Amount'].'</td><td>'.$Get_Data['Description'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Service('.$Service_ID.', '.$Fleet_Number.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Service('.$Service_ID.', '.$Fleet_Number.')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `service_master` WHERE `Fleet_No` = '".$Fleet_No."' ORDER BY `Service_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_No."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Service Date</th><th>Next Service Date</th><th>Amount</th><th>Description</th><th>Perform Actions</th></tr></thead>";
				
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					$Service_ID = $Get_Search_Data['Service_ID'];
					$Fleet_Number = $Get_Search_Data['Fleet_No'];
					
					echo '<tr>';
					echo '<td>'.$Fleet_Number.'</td><td>'.$Get_Search_Data['Service_Date'].'</td><td>'.$Get_Search_Data['Next_Service_Date'].'</td><td>'.$Get_Search_Data['Service_Amount'].'</td><td>'.$Get_Search_Data['Description'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Service('.$Service_ID.', '.$Fleet_Number.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Service('.$Service_ID.', '.$Fleet_Number.')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Service_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `service_master` ORDER BY `Service_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_No."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Service Date</th><th>Next Service Date</th><th>Amount</th><th>Description</th><th>Perform Actions</th></tr></thead>";
				
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					$Service_ID = $Get_Search_Data['Service_ID'];
					$Fleet_Number = $Get_Search_Data['Fleet_No'];
					
					echo '<tr>';
					echo '<td>'.$Fleet_Number.'</td><td>'.$Get_Search_Data['Service_Date'].'</td><td>'.$Get_Search_Data['Next_Service_Date'].'</td><td>'.$Get_Search_Data['Service_Amount'].'</td><td>'.$Get_Search_Data['Description'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Service('.$Service_ID.', '.$Fleet_Number.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Service('.$Service_ID.', '.$Fleet_Number.')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_Attendance_Data")
	{
		$Emp_ID = trim(strip_tags($_POST['Emp_ID']));
		
		if($Emp_ID == '*')
		{
			$Search_Query = "SELECT * FROM `attendence_master` ORDER BY `Attendence_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Employee Number</th><th>Present Days</th><th>Absent Days</th><th>Total Days</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{
				$Attendance_ID = $Get_Data['Attendence_ID'];
				$Employee_Number = $Get_Data['Employee_ID'];
				
				echo '<tr>';
				echo '<td>'.$Employee_Number.'</td><td>'.$Get_Data['Present_Day'].'</td><td>'.$Get_Data['Absent_Day'].'</td><td>'.$Get_Data['Total_Day'].'</td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `attendence_master` WHERE `Employee_ID` = '".$Emp_ID."' ORDER BY `Attendence_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Employee Number <u><b>".$Emp_ID."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Employee Number</th><th>Present Days</th><th>Absent Days</th><th>Total Days</th></tr></thead>";
				
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					echo '<tr>';
					echo '<td>'.$Employee_Number.'</td><td>'.$Get_Search_Data['Present_Day'].'</td><td>'.$Get_Search_Data['Absent_Day'].'</td><td>'.$Get_Search_Data['Total_Day'].'</td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Attendance_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `attendence_master` ORDER BY `Attendence_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Employee Number <u><b>".$Emp_ID."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Employee Number</th><th>Present Days</th><th>Absent Days</th><th>Total Days</th></tr></thead>";
			
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				echo '<tr>';
				echo '<td>'.$Get_Search_Data['Employee_ID'].'</td><td>'.$Get_Search_Data['Present_Day'].'</td><td>'.$Get_Search_Data['Absent_Day'].'</td><td>'.$Get_Search_Data['Total_Day'].'</td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Search_PP_Data")
	{
		$PP_Name = trim(strip_tags($_POST['PP_Name']));
		$City_ID = trim(strip_tags($_POST['City_ID']));
		
		if($PP_Name == '*')
		{
			$Search_Query = "SELECT * FROM `petrolpump_master` ORDER BY `PetrolPump_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th><th>City</th><th>Phone Number</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{
				$PP_ID = $Get_Data['PetrolPump_ID'];
				
				$Get_City_Name = mysqli_query($Create_Connection, "SELECT `City_Name` FROM `city_master` WHERE `City_ID` = '".$Get_Data['City_ID']."'");
				
				$City_Name = mysqli_fetch_array($Get_City_Name, MYSQLI_ASSOC);
				
				$Show_City_Name = $City_Name['City_Name'];
				
				echo '<tr>';
				echo '<td>'.$Get_Data['PetrolPump_Name'].'</td><td>'.$Show_City_Name.'</td><td>'.$Get_Data['PetrolPump_Ph_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_PP('.$PP_ID.', \''.$Get_Data['PetrolPump_Name'].'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_PP('.$PP_ID.', \''.$Get_Data['PetrolPump_Name'].'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `petrolpump_master` WHERE `PetrolPump_Name` LIKE '%$PP_Name%' ORDER BY `PetrolPump_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Petrol Pump <u><b>".$PP_Name."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th><th>City</th><th>Phone Number</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					$PP_ID = $Get_Search_Data['PetrolPump_ID'];
					
					$Get_City_Name = mysqli_query($Create_Connection, "SELECT `City_Name` FROM `city_master` WHERE `City_ID` = '".$Get_Search_Data['City_ID']."'");
					
					$City_Name = mysqli_fetch_array($Get_City_Name, MYSQLI_ASSOC);
					
					$Show_City_Name = $City_Name['City_Name'];
					
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['PetrolPump_Name'].'</td><td>'.$Show_City_Name.'</td><td>'.$Get_Search_Data['PetrolPump_Ph_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_PP('.$PP_ID.', \''.$Get_Search_Data['PetrolPump_Name'].'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_PP('.$PP_ID.', \''.$Get_Search_Data['PetrolPump_Name'].'\')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Petrolpump_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `petrolpump_master` ORDER BY `PetrolPump_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Petrol Pump <u><b>".$PP_Name."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th><th>City</th><th>Phone Number</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					$PP_ID = $Get_Search_Data['PetrolPump_ID'];
					
					$Get_City_Name = mysqli_query($Create_Connection, "SELECT `City_Name` FROM `city_master` WHERE `City_ID` = '".$Get_Search_Data['City_ID']."'");
					
					$City_Name = mysqli_fetch_array($Get_City_Name, MYSQLI_ASSOC);
					
					$Show_City_Name = $City_Name['City_Name'];
					
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['PetrolPump_Name'].'</td><td>'.$Show_City_Name.'</td><td>'.$Get_Search_Data['PetrolPump_Ph_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_PP('.$PP_ID.', \''.$Get_Search_Data['PetrolPump_Name'].'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_PP('.$PP_ID.', \''.$Get_Search_Data['PetrolPump_Name'].'\')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_LR_Data")
	{
		$LR_Vendor_Name = trim(strip_tags($_POST['LR_Vendor_Name']));
		
		if($PP_Name == '*')
		{
			$Search_Query = "SELECT * FROM `lr_master` ORDER BY `LR_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Description</th><th>From Vendor ID</th><th>To Vendor ID</th><th>Challan ID</th><th>Arrival ID</th><th>Amount</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{
				$LR_ID = $Get_Data['LR_ID'];
				
				echo '<tr>';
				echo '<td>'.$Get_Data['LR_Description'].'</td><td>'.$Get_Data['LR_From_Vendor_Name'].'</td><td>'.$Get_Data['LR_To_Vendor_Name'].'</td><td>'.$Get_Data['Challan_ID'].'</td><td>'.$Get_Data['Arrival_ID'].'</td><td>'.$Get_Data['LR_Amount'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_LR('.$LR_ID.', " ")">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_LR('.$LR_ID.', " ")">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			/* $Prepare_Search_Query = "SELECT * FROM `petrolpump_master` WHERE `PetrolPump_Name` LIKE '%$PP_Name%' ORDER BY `PetrolPump_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Petrol Pump <u><b>".$PP_Name."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th><th>City</th><th>Phone Number</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{
					$PP_ID = $Get_Search_Data['PetrolPump_ID'];
					
					$Get_City_Name = mysqli_query($Create_Connection, "SELECT `City_Name` FROM `city_master` WHERE `City_ID` = '".$Get_Search_Data['City_ID']."'");
					
					$City_Name = mysqli_fetch_array($Get_City_Name, MYSQLI_ASSOC);
					
					$Show_City_Name = $City_Name['City_Name'];
					
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['PetrolPump_Name'].'</td><td>'.$Show_City_Name.'</td><td>'.$Get_Search_Data['PetrolPump_Ph_No'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_PP('.$PP_ID.', \''.$Get_Search_Data['PetrolPump_Name'].'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_PP('.$PP_ID.', \''.$Get_Search_Data['PetrolPump_Name'].'\')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			} */
		}
	}
	
	else if($_POST['Type'] == "Display_LR_Data")
	{
		$Search_Query = "SELECT * FROM `lr_master` ORDER BY `LR_ID` DESC";
		$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
		
		echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Description</th><th>From Vendor ID</th><th>To Vendor ID</th><th>Challan ID</th><th>Arrival ID</th><th>Amount</th></tr></thead>";
		
		while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
		{
			$LR_ID = $Get_Data['LR_ID'];
			
			echo '<tr id='.$LR_ID.'>';
			echo '<td id="lr_desc_'.$LR_ID.'" contenteditable="true">'.$Get_Data['LR_Description'].'</td><td id="lr_frm_vnd_'.$LR_ID.'" contenteditable="true">'.$Get_Data['LR_From_Vendor_Name'].'</td><td id="lr_to_vnd_'.$LR_ID.'" contenteditable="true">'.$Get_Data['LR_To_Vendor_Name'].'</td><td id="lr_ch_id_'.$LR_ID.'" contenteditable="true">'.$Get_Data['Challan_ID'].'</td><td id="lr_arr_id_'.$LR_ID.'" contenteditable="true">'.$Get_Data['Arrival_ID'].'</td><td id="lr_amt_'.$LR_ID.'" contenteditable="true">'.$Get_Data['LR_Amount'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_LR('.$LR_ID.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_LR('.$LR_ID.', " ")">Delete</u></td>';
			echo '</tr>';
		}
		
		echo "</table>";
	}
	
	else if($_POST['Type'] == "Search_Arrival_Data")
	{
		$Customer_Name = trim(strip_tags($_POST['Customer_Name']));
		
		if($Customer_Name == '*')
		{
			$Search_Query = "SELECT * FROM `arrival_master` ORDER BY `Arrival_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>LR ID</th><th>Arrival Date</th><th>Arrival Time</th><th>Customer</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{	
				echo '<tr>';
				echo '<td>'.$Get_Data['LR_ID'].'</td><td>'.$Get_Data['Arrival_TO_Date'].'</td><td>'.$Get_Data['Arrival_TO_Time'].'</td><td>'.$Get_Data['Arrival_TO_Receive_Customer_Name'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Customer('.$Get_Data['Arrival_ID'].', \''.$Get_Data['Arrival_TO_Receive_Customer_Name'].'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Customer('.$Get_Data['Arrival_ID'].', \''.$Get_Data['Arrival_TO_Receive_Customer_Name'].'\')">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `arrival_master` WHERE `Arrival_TO_Receive_Customer_Name` LIKE '%$Customer_Name%' ORDER BY `Arrival_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Customer <u><b>".$Customer_Name."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>LR ID</th><th>Arrival Date</th><th>Arrival Time</th><th>Customer</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['LR_ID'].'</td><td>'.$Get_Search_Data['Arrival_TO_Date'].'</td><td>'.$Get_Search_Data['Arrival_TO_Time'].'</td><td>'.$Get_Search_Data['Arrival_TO_Receive_Customer_Name'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Customer('.$Get_Search_Data['Arrival_ID'].', \''.$Get_Search_Data['Arrival_TO_Receive_Customer_Name'].'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Customer('.$Get_Search_Data['Arrival_ID'].', \''.$Get_Search_Data['Arrival_TO_Receive_Customer_Name'].'\')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Arrival_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `arrival_master` ORDER BY `Arrival_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Customer <u><b>".$Customer_Name."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>LR ID</th><th>Arrival Date</th><th>Arrival Time</th><th>Customer</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['LR_ID'].'</td><td>'.$Get_Search_Data['Arrival_TO_Date'].'</td><td>'.$Get_Search_Data['Arrival_TO_Time'].'</td><td>'.$Get_Search_Data['Arrival_TO_Receive_Customer_Name'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Customer('.$Get_Search_Data['Arrival_ID'].', \''.$Get_Search_Data['Arrival_TO_Receive_Customer_Name'].'\')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Customer('.$Get_Search_Data['Arrival_ID'].', \''.$Get_Search_Data['Arrival_TO_Receive_Customer_Name'].'\')">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_Challan_Data")
	{
		$Fleet_No = trim(strip_tags($_POST['Fleet_No']));
		
		$Prepare_Search_Query = "SELECT * FROM `challan_master` WHERE `Fleet_No` = '".$Fleet_No."' ORDER BY `Challan_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_No."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Driver ID</th><th>Challan From City</th><th>Challan To City</th><th>Challan From Vendor</th><th>Challan To Vendor</th><th>Challan Date</th><th>Perform Actions</th></tr></thead>";
		
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{				
				$id = $Get_Search_Data['Challan_ID'];
				
				echo '<tr id="chrow_'.$id.'" data-id='.$id.'>';
				echo '<td id="ch_flt_no_'.$id.'" contenteditable="true">'.$Get_Search_Data['Fleet_No'].'</td><td id="ch_drv_id_'.$id.'" contenteditable="true">'.$Get_Search_Data['Driver_ID'].'</td><td id="ch_frm_city_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_From_City'].'</td><td id="ch_to_city_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_To_City'].'</td><td id="ch_frm_vnd_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_From_Vendor'].'</td><td id="ch_to_vnd_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_To_Vendor'].'</td><td id="ch_date_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_Date'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Challan('.$id.');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Customer();">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Display_Challan_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `challan_master` ORDER BY `Challan_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		if(mysqli_num_rows($Fire_Search_Query) < 1)
		{
			echo "<center><h1 style='font-family: Roboto;'>No Data Found For Fleet <u><b>".$Fleet_No."</b></u></h1></center>";
		}
		else
		{
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Fleet Number</th><th>Driver ID</th><th>Challan From City</th><th>Challan To City</th><th>Challan From Vendor</th><th>Challan To Vendor</th><th>Challan Date</th><th>Perform Actions</th></tr></thead>";
		
			while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
			{
				$id = $Get_Search_Data['Challan_ID'];
				
				echo '<tr id="chrow_'.$id.'" data-id='.$id.'>';
				echo '<td id="ch_flt_no_'.$id.'" contenteditable="true">'.$Get_Search_Data['Fleet_No'].'</td><td id="ch_dr_id_'.$id.'" contenteditable="true">'.$Get_Search_Data['Driver_ID'].'</td><td id="ch_frm_city_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_From_City'].'</td><td id="ch_to_city_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_To_City'].'</td><td id="ch_frm_vnd_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_From_Vendor'].'</td><td id="ch_to_vnd_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_To_Vendor'].'</td><td id="ch_date_'.$id.'" contenteditable="true">'.$Get_Search_Data['Challan_Date'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Challan('.$id.');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Customer();">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
	}
	
	else if($_POST['Type'] == "Search_Driver_Data")
	{
		$Driver_Name = trim(strip_tags($_POST['Driver_Name']));
		
		if($Driver_Name == '*')
		{
			$Search_Query = "SELECT * FROM `driver_master` ORDER BY `Driver_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Age</th><th>Phone</th><th>Gender</th><th>Address</th><th>Landmark</th><th>Nearby Road</th><th>City</th><th>Driver Photo</th><th>License Photo</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{	
				echo '<tr>';
				echo '<td>'.$Get_Data['First_Name'].'</td><td>'.$Get_Data['Last_Name'].'</td><td>'.$Get_Data['Date of Birth'].'</td><td>'.$Get_Data['Age'].'</td><td>'.$Get_Data['Mobile_No'].'</td><td>'.$Get_Data['Gender'].'</td><td>'.$Get_Data['Address'].'</td><td>'.$Get_Data['Landmark'].'</td><td>'.$Get_Data['Road'].'</td><td>'.$Get_Data['City_ID'].'</td><td>'.$Get_Data['Driver_Photo'].'</td><td>'.$Get_Data['License_Photo'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Driver('.$Get_Data['Driver_ID'].', \''.$Get_Data['First_Name'].'\', \''.$Get_Data['Last_Name'].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Driver('.$Get_Data['Driver_ID'].', \''.$Get_Data['First_Name'].'\', \''.$Get_Data['Last_Name'].'\');">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `driver_master` WHERE `First_Name` LIKE '%$Driver_Name%' OR `Last_Name` LIKE '%Driver_Name%' ORDER BY `Driver_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Driver <u><b>".$Driver_Name."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Age</th><th>Phone</th><th>Gender</th><th>Address</th><th>Landmark</th><th>Nearby Road</th><th>City</th><th>Driver Photo</th><th>License Photo</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['First_Name'].'</td><td>'.$Get_Search_Data['Last_Name'].'</td><td>'.$Get_Search_Data['Date of Birth'].'</td><td>'.$Get_Search_Data['Age'].'</td><td>'.$Get_Search_Data['Mobile_No'].'</td><td>'.$Get_Search_Data['Gender'].'</td><td>'.$Get_Search_Data['Address'].'</td><td>'.$Get_Search_Data['Landmark'].'</td><td>'.$Get_Search_Data['Road'].'</td><td>'.$Get_Search_Data['City_ID'].'</td><td>'.$Get_Search_Data['Driver_Photo'].'</td><td>'.$Get_Search_Data['License_Photo'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Driver('.$Get_Search_Data['Driver_ID'].', \''.$Get_Search_Data['First_Name'].'\', \''.$Get_Search_Data['Last_Name'].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Driver('.$Get_Search_Data['Driver_ID'].', \''.$Get_Search_Data['First_Name'].'\', \''.$Get_Search_Data['Last_Name'].'\');">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Driver_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `driver_master` ORDER BY `Driver_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Driver <u><b>".$Driver_Name."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Age</th><th>Phone</th><th>Gender</th><th>Address</th><th>Landmark</th><th>Nearby Road</th><th>City</th><th>Driver Photo</th><th>License Photo</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['First_Name'].'</td><td>'.$Get_Search_Data['Last_Name'].'</td><td>'.$Get_Search_Data['Date of Birth'].'</td><td>'.$Get_Search_Data['Age'].'</td><td>'.$Get_Search_Data['Mobile_No'].'</td><td>'.$Get_Search_Data['Gender'].'</td><td>'.$Get_Search_Data['Address'].'</td><td>'.$Get_Search_Data['Landmark'].'</td><td>'.$Get_Search_Data['Road'].'</td><td>'.$Get_Search_Data['City_ID'].'</td><td>'.$Get_Search_Data['Driver_Photo'].'</td><td>'.$Get_Search_Data['License_Photo'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Driver('.$Get_Search_Data['Driver_ID'].', \''.$Get_Search_Data['First_Name'].'\', \''.$Get_Search_Data['Last_Name'].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Driver('.$Get_Search_Data['Driver_ID'].', \''.$Get_Search_Data['First_Name'].'\', \''.$Get_Search_Data['Last_Name'].'\');">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_Product_Data")
	{
		$PN = trim(strip_tags($_POST['PN']));
		
		if($PN == '*')
		{
			$Search_Query = "SELECT * FROM `product_master` ORDER BY `Product_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th><th>Price</th><th>Category</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{	
				echo '<tr>';
				echo '<td>'.$Get_Data['Product_Name'].'</td><td>'.$Get_Data['Product_Price'].'</td><td>'.$Get_Data['Category_ID'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Product('.$Get_Data['Product_ID'].', \''.$Get_Data['Product_Name'].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Product('.$Get_Data['Product_ID'].', \''.$Get_Data['Product_Name'].'\');">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `product_master` WHERE `Product_Name` LIKE '%$PN%' ORDER BY `Product_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Product <u><b>".$PN."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th><th>Price</th><th>Category</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['Product_Name'].'</td><td>'.$Get_Search_Data['Product_Price'].'</td><td>'.$Get_Search_Data['Category_ID'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Product('.$Get_Search_Data['Product_ID'].', \''.$Get_Search_Data['Product_Name'].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Product('.$Get_Search_Data['Product_ID'].', \''.$Get_Search_Data['Product_Name'].'\');">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Product_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `product_master` ORDER BY `Product_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Product <u><b>".$PN."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th><th>Price</th><th>Category</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['Product_Name'].'</td><td>'.$Get_Search_Data['Product_Price'].'</td><td>'.$Get_Search_Data['Category_ID'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Product('.$Get_Search_Data['Product_ID'].', \''.$Get_Search_Data['Product_Name'].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Product('.$Get_Search_Data['Product_ID'].', \''.$Get_Search_Data['Product_Name'].'\');">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_Category_Data")
	{
		$CN = trim(strip_tags($_POST['CN']));
		
		if($CN == '*')
		{
			$Search_Query = "SELECT * FROM `category_master` ORDER BY `Category_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_ASSOC))
			{	
				echo '<tr>';
				echo '<td>'.$Get_Data['Category'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Category('.$Get_Data['Category_ID'].', \''.$Get_Data['Category'].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Category('.$Get_Data['Category_ID'].', \''.$Get_Data['Category'].'\');">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `category_master` WHERE `Category` LIKE '%$CN%' ORDER BY `Category_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Category <u><b>".$CN."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['Category'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Category('.$Get_Search_Data['Category_ID'].', \''.$Get_Search_Data['Category'].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Category('.$Get_Search_Data['Category_ID'].', \''.$Get_Search_Data['Category'].'\');">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Category_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `category_master` ORDER BY `Category_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Category <u><b>".$CN."</b></u></h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Name</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_ASSOC))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data['Category'].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Category('.$Get_Search_Data['Category_ID'].', \''.$Get_Search_Data['Category'].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Category('.$Get_Search_Data['Category_ID'].', \''.$Get_Search_Data['Category'].'\');">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_Sales_Data")
	{
		$VN = trim(strip_tags($_POST['VN']));
		
		if($VN == '*')
		{
			$Search_Query = "SELECT * FROM `sales_master` ORDER BY `Sales_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Order Date</th><th>Order Status</th><th>Vendor</th><th>Product</th><th>Quantity</th><th>Rate</th><th>Discount</th><th>Total</th><th>Scheduled Delivery Date</th><th>Actual Delivery Date</th><th>Specifications</th><th>Order Type</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_NUM))
			{	
				echo '<tr>';
				echo '<td>'.$Get_Data[1].'</td><td>'.$Get_Data[2].'</td><td>'.$Get_Data[3].'</td><td>'.$Get_Data[4].'</td><td>'.$Get_Data[5].'</td><td>'.$Get_Data[6].'</td><td>'.$Get_Data[7].'</td><td>'.$Get_Data[8].'</td><td>'.$Get_Data[9].'</td><td>'.$Get_Data[10].'</td><td>'.$Get_Data[11].'</td><td>'.$Get_Data[12].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Vendor('.$Get_Data[0].', \''.$Get_Data[3].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Vendor('.$Get_Data[0].', \''.$Get_Data[3].'\');">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `sales_master` WHERE `Vendor_Name` LIKE '%$VN%' ORDER BY `Sales_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Vendor <u><b>".$VN."</b></u> In Sales Book</h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Order Date</th><th>Order Status</th><th>Vendor</th><th>Product</th><th>Quantity</th><th>Rate</th><th>Discount</th><th>Total</th><th>Scheduled Delivery Date</th><th>Actual Delivery Date</th><th>Specifications</th><th>Order Type</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data[1].'</td><td>'.$Get_Search_Data[2].'</td><td>'.$Get_Search_Data[3].'</td><td>'.$Get_Search_Data[4].'</td><td>'.$Get_Search_Data[5].'</td><td>'.$Get_Search_Data[6].'</td><td>'.$Get_Search_Data[7].'</td><td>'.$Get_Search_Data[8].'</td><td>'.$Get_Search_Data[9].'</td><td>'.$Get_Search_Data[10].'</td><td>'.$Get_Search_Data[11].'</td><td>'.$Get_Search_Data[12].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Vendor('.$Get_Search_Data[0].', \''.$Get_Search_Data[3].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Vendor('.$Get_Search_Data[0].', \''.$Get_Search_Data[3].'\');">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Sales_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `sales_master` ORDER BY `Sales_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Vendor <u><b>".$VN."</b></u> In Sales Book</h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Order Date</th><th>Order Status</th><th>Vendor</th><th>Product</th><th>Quantity</th><th>Rate</th><th>Discount</th><th>Total</th><th>Scheduled Delivery Date</th><th>Actual Delivery Date</th><th>Specifications</th><th>Order Type</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
				{				
					echo '<tr>';
					echo '<td>'.$Get_Search_Data[1].'</td><td>'.$Get_Search_Data[2].'</td><td>'.$Get_Search_Data[3].'</td><td>'.$Get_Search_Data[4].'</td><td>'.$Get_Search_Data[5].'</td><td>'.$Get_Search_Data[6].'</td><td>'.$Get_Search_Data[7].'</td><td>'.$Get_Search_Data[8].'</td><td>'.$Get_Search_Data[9].'</td><td>'.$Get_Search_Data[10].'</td><td>'.$Get_Search_Data[11].'</td><td>'.$Get_Search_Data[12].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Vendor('.$Get_Search_Data[0].', \''.$Get_Search_Data[3].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_Vendor('.$Get_Search_Data[0].', \''.$Get_Search_Data[3].'\');">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_Purchase_Data")
	{
		$PN = trim(strip_tags($_POST['PN']));
		
		if($PN == '*')
		{
			$Search_Query = "SELECT * FROM `purchase_master` ORDER BY `Purchase_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Purchase Number</th><th>Product Name</th><th>Vendor Name</th><th>Purchase Date</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_NUM))
			{	
				echo '<tr>';
				echo '<td>'.$Get_Data[1].'</td><td>'.$Get_Data[2].'</td><td>'.$Get_Data[3].'</td><td>'.$Get_Data[4].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `purchase_master` WHERE `Product_Name` LIKE '%$PN%' ORDER BY `Purchase_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Product <u><b>".$PN."</b></u> In Purchases Book</h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Purchase Number</th><th>Product Name</th><th>Vendor Name</th><th>Purchase Date</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
				{		$id = $Get_Search_Data[0];		
					echo '<tr id='.$id.'>';
					echo '<td id="pno_'.$id.'" contenteditable="true">'.$Get_Search_Data[1].'</td><td id="pname_'.$id.'" contenteditable="true">'.$Get_Search_Data[2].'</td><td id="vname_'.$id.'" contenteditable="true">'.$Get_Search_Data[3].'</td><td id="pdate_'.$id.'" contenteditable="true">'.$Get_Search_Data[4].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Purchase('.$id.');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Purchase_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `purchase_master` ORDER BY `Purchase_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Product <u><b>".$PN."</b></u> In Purchases Book</h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Purchase Number</th><th>Product Name</th><th>Vendor Name</th><th>Purchase Date</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
				{
					$id = $Get_Search_Data[0];
					
					echo '<tr id='.$id.'>';
					echo '<td id="pno_'.$id.'" contenteditable="true">'.$Get_Search_Data[1].'</td><td id="pname_'.$id.'" contenteditable="true">'.$Get_Search_Data[2].'</td><td id="vname_'.$id.'" contenteditable="true">'.$Get_Search_Data[3].'</td><td id="pdate_'.$id.'" contenteditable="true">'.$Get_Search_Data[4].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_Purchase('.$id.');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_Sales_Return_Data")
	{
		$PN = trim(strip_tags($_POST['PN']));
		
		if($PN == '*')
		{
			$Search_Query = "SELECT * FROM `sales_return_master` ORDER BY `Sales_Return_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Sales Return Date</th><th>Product Name</th><th>Product Price</th><th>Vendor Name</th><th>Vendor City</th><th>Checked By</th><th>Approved By</th><th>Remarks</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_NUM))
			{	
				echo '<tr>';
				echo '<td>'.$Get_Data[1].'</td><td>'.$Get_Data[2].'</td><td>'.$Get_Data[3].'</td><td>'.$Get_Data[4].'</td><td>'.$Get_Data[5].'</td><td>'.$Get_Data[6].'</td><td>'.$Get_Data[7].'</td><td>'.$Get_Data[8].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `sales_return_master` WHERE `Product_Name` LIKE '%$PN%' ORDER BY `Sales_Return_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Product <u><b>".$PN."</b></u> In Sales Return Book</h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Sales Return Date</th><th>Product Name</th><th>Product Price</th><th>Vendor Name</th><th>Vendor City</th><th>Checked By</th><th>Approved By</th><th>Remarks</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
				{				
					$id = $Get_Search_Data[0];
			
					echo '<tr id='.$id.'>';
					echo '<td id="sr_date_'.$id.'" contenteditable="true">'.$Get_Search_Data[1].'</td><td id="sr_pname_'.$id.'" contenteditable="true">'.$Get_Search_Data[2].'</td><td id="sr_pprice_'.$id.'" contenteditable="true">'.$Get_Search_Data[3].'</td><td id="sr_vname_'.$id.'" contenteditable="true">'.$Get_Search_Data[4].'</td><td id="sr_vcity_'.$id.'" contenteditable="true">'.$Get_Search_Data[5].'</td><td id="sr_chk_by_'.$id.'" contenteditable="true">'.$Get_Search_Data[6].'</td><td id="sr_appr_by_'.$id.'" contenteditable="true">'.$Get_Search_Data[7].'</td><td id="sr_remarks_'.$id.'" contenteditable="true">'.$Get_Search_Data[8].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_SR('.$id.');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Sales_Return_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `sales_return_master` ORDER BY `Sales_Return_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Product <u><b>".$PN."</b></u> In Sales Return Book</h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Sales Return Date</th><th>Product Name</th><th>Product Price</th><th>Vendor Name</th><th>Vendor City</th><th>Checked By</th><th>Approved By</th><th>Remarks</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
				{	$id = $Get_Search_Data[0];
			
					echo '<tr id='.$id.'>';
					echo '<td id="sr_date_'.$id.'" contenteditable="true">'.$Get_Search_Data[1].'</td><td id="sr_pname_'.$id.'" contenteditable="true">'.$Get_Search_Data[2].'</td><td id="sr_pprice_'.$id.'" contenteditable="true">'.$Get_Search_Data[3].'</td><td id="sr_vname_'.$id.'" contenteditable="true">'.$Get_Search_Data[4].'</td><td id="sr_vcity_'.$id.'" contenteditable="true">'.$Get_Search_Data[5].'</td><td id="sr_chk_by_'.$id.'" contenteditable="true">'.$Get_Search_Data[6].'</td><td id="sr_appr_by_'.$id.'" contenteditable="true">'.$Get_Search_Data[7].'</td><td id="sr_remarks_'.$id.'" contenteditable="true">'.$Get_Search_Data[8].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_SR('.$id.');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_Purchase_Return_Data")
	{
		$PN = trim(strip_tags($_POST['PN']));
		
		if($PN == '*')
		{
			$Search_Query = "SELECT * FROM `purchase_return_master` ORDER BY `Purchase_Return_ID` DESC";
			$Fire_Query = mysqli_query($Create_Connection, $Search_Query);
			
			echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Purchase Date</th><th>Purchase Return Date</th><th>Product Name</th><th>Product Price</th><th>Vendor Name</th><th>Vendor City</th><th>Perform Actions</th></tr></thead>";
			
			while($Get_Data = mysqli_fetch_array($Fire_Query, MYSQLI_NUM))
			{	
				echo '<tr>';
				echo '<td>'.$Get_Data[1].'</td><td>'.$Get_Data[2].'</td><td>'.$Get_Data[3].'</td><td>'.$Get_Data[4].'</td><td>'.$Get_Data[5].'</td><td>'.$Get_Data[6].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer">Delete</u></td>';
				echo '</tr>';
			}
			
			echo "</table>";
		}
		else
		{
			$Prepare_Search_Query = "SELECT * FROM `purchase_return_master` WHERE `Product_Name` LIKE '%$PN%' ORDER BY `Purchase_Return_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Product <u><b>".$PN."</b></u> In Purchase Return Book</h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Purchase Date</th><th>Purchase Return Date</th><th>Product Name</th><th>Product Price</th><th>Vendor Name</th><th>Vendor City</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
				{				
					$id = $Get_Search_Data[0];
					
					echo '<tr id='.$id.'>';
					echo '<td id="pdate_'.$id.'" contenteditable="true">'.$Get_Search_Data[1].'</td><td id="pr_date_'.$id.'" contenteditable="true">'.$Get_Search_Data[2].'</td><td id="pr_pname_'.$id.'" contenteditable="true">'.$Get_Search_Data[3].'</td><td id="pr_price_'.$id.'" contenteditable="true">'.$Get_Search_Data[4].'</td><td id="pr_vname_'.$id.'" contenteditable="true">'.$Get_Search_Data[5].'</td><td id="pr_vcity_'.$id.'" contenteditable="true">'.$Get_Search_Data[6].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_PR('.$id.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
		}
	}
	
	else if($_POST['Type'] == "Display_Purchase_Return_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `purchase_return_master` ORDER BY `Purchase_Return_ID` DESC";
		
			$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
			
			if(mysqli_num_rows($Fire_Search_Query) < 1)
			{
				echo "<center><h1 style='font-family: Roboto;'>No Data Found For Product <u><b>".$PN."</b></u> In Purchase Return Book</h1></center>";
			}
			else
			{
				echo "<table id='example1' class='table table-bordered table-striped' align='center'><thead><tr><th>Purchase Date</th><th>Purchase Return Date</th><th>Product Name</th><th>Product Price</th><th>Vendor Name</th><th>Vendor City</th><th>Perform Actions</th></tr></thead>";
			
				while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
				{	
					$id = $Get_Search_Data[0];
					
					echo '<tr id='.$id.'>';
					echo '<td id="pdate_'.$id.'" contenteditable="true">'.$Get_Search_Data[1].'</td><td id="pr_date_'.$id.'" contenteditable="true">'.$Get_Search_Data[2].'</td><td id="pr_pname_'.$id.'" contenteditable="true">'.$Get_Search_Data[3].'</td><td id="pr_price_'.$id.'" contenteditable="true">'.$Get_Search_Data[4].'</td><td id="pr_vname_'.$id.'" contenteditable="true">'.$Get_Search_Data[5].'</td><td id="pr_vcity_'.$id.'" contenteditable="true">'.$Get_Search_Data[6].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_PR('.$id.')">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer">Delete</u></td>';
					echo '</tr>';
				}
				
				echo "</table>";
			}
	}
	
	else if($_POST['Type'] == "Search_User_Data")
	{
		$U = trim(strip_tags($_POST['U']));
		
		$Prepare_Search_Query = "SELECT * FROM `user_master` WHERE `User_ID` = '".$U."' ORDER BY `User_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		echo "<table id='example1' class='table table-bordered table-striped' align='center' style='table-layout: fixed;'><thead><tr><th>First Name</th><th>Last Name</th><th>User Type</th><th>Gender</th><th>Designation</th><th>Address</th><th>City</th><th>State</th><th>Branch</th><th>Phone Number</th><th>Email Address</th><th>Perform Actions</th></tr></thead>";
		
		while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
		{				
			echo '<tr>';
			echo '<td>'.$Get_Search_Data[1].'</td><td>'.$Get_Search_Data[2].'</td><td>'.$Get_Search_Data[3].'</td><td>'.$Get_Search_Data[4].'</td><td>'.$Get_Search_Data[5].'</td><td>'.$Get_Search_Data[6].'</td><td>'.$Get_Search_Data[7].'</td><td>'.$Get_Search_Data[8].'</td><td>'.$Get_Search_Data[9].'</td><td>'.$Get_Search_Data[10].'</td><td style="word-wrap: break-word">'.$Get_Search_Data[11].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_User('.$Get_Search_Data[0].', \''.$Get_Search_Data[1].'\', \''.$Get_Search_Data[2].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_User('.$Get_Search_Data[0].', \''.$Get_Search_Data[1].'\', \''.$Get_Search_Data[2].'\');">Delete</u></td>';
			echo '</tr>';
		}
		
		echo "</table>";
	}
	
	else if($_POST['Type'] == "Display_User_Data")
	{
		$Prepare_Search_Query = "SELECT * FROM `user_master` ORDER BY `User_ID` DESC";
		
		$Fire_Search_Query = mysqli_query($Create_Connection, $Prepare_Search_Query);
		
		echo "<table id='example1' class='table table-bordered table-striped' align='center' style='table-layout: fixed;'><thead><tr><th>First Name</th><th>Last Name</th><th>User Type</th><th>Gender</th><th>Designation</th><th>Address</th><th>City</th><th>State</th><th>Branch</th><th>Phone Number</th><th>Email Address</th><th>Perform Actions</th></tr></thead>";
		
		while($Get_Search_Data = mysqli_fetch_array($Fire_Search_Query, MYSQLI_NUM))
		{				
			echo '<tr>';
			echo '<td>'.$Get_Search_Data[1].'</td><td>'.$Get_Search_Data[2].'</td><td>'.$Get_Search_Data[3].'</td><td>'.$Get_Search_Data[4].'</td><td>'.$Get_Search_Data[5].'</td><td>'.$Get_Search_Data[6].'</td><td>'.$Get_Search_Data[7].'</td><td>'.$Get_Search_Data[8].'</td><td>'.$Get_Search_Data[9].'</td><td>'.$Get_Search_Data[10].'</td><td style="word-wrap: break-word">'.$Get_Search_Data[11].'</td><td><i class="fa fa-pencil"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Update_User('.$Get_Search_Data[0].', \''.$Get_Search_Data[1].'\', \''.$Get_Search_Data[2].'\');">Update</u>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;&nbsp;<u style="cursor: pointer" onClick="$.fn.Delete_User('.$Get_Search_Data[0].', \''.$Get_Search_Data[1].'\', \''.$Get_Search_Data[2].'\');">Delete</u></td>';
			echo '</tr>';
		}
		
		echo "</table>";
	}
	
	mysqli_close($Create_Connection);
	
?>
<html>
	<body>
		<form method="POST" action="">
			Country Name:<input type="Text" name="txtcountry">
			<input type="submit" name="Save" value="Save">
			<input type="submit" name="Update" value="Update">
			<input type="submit" name="Delete" value="Delete">
			<input type="reset" name="Cancel"	>

		</form>
	</body>
</html>
<?php
include "admin/business/database_connection.php";

if(isset($_POST['Save']))
{
	$cname=$_POST['txtcountry'];
	echo $cname;
	$Add_Data = "INSERT INTO `countrym` (`countryname`) VALUES ('".$cname."')";
			
	$q = mysqli_query($Create_Connection, $Add_Data);
	if($q==true)
	{
		echo "Inserted successfully";
	}
	else
	{
		echo "Insertion failed";	
	}
}
else if(isset($_POST['Update']))
{
	echo "Update Button";	
	$cname=$_POST['txtcountry'];
	echo $cname;
	$Add_Data = "update `countrym` set `countryname` = '".$cname."' where countryid=11";
			
	$q = mysqli_query($Create_Connection, $Add_Data);
	if($q==true)
	{
		echo "Inserted successfully";
	}
	else
	{
		echo "Insertion failed";	
	}
}
else if(isset($_POST['Delete']))
{
	echo "Delete Button";		
}
?>
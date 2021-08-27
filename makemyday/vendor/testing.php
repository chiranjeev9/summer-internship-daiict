<?php
	include "business/database_connection.php";
	$cname="Australia";
	$sql = "SELECT * FROM countrym WHERE countryname='".$cname."'";
	$result = mysqli_query($Create_Connection,$sql);
	$cnt=mysqli_num_rows($result);
	$cid=0;
    while($row1=mysqli_fetch_array($result))
    {
    	if($row1["countryname"] == $cname)
    	{
    		$cid=$row1["countryid"];
    	}
    	else if($cid==0)
    	{
    		echo "No data found";
    	}
    }
    echo $cid;

                          
?>
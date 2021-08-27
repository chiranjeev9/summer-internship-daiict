<?php  
//action.php
include "business/db_connection.php";

$input = filter_input_array(INPUT_POST);

$countryname = mysqli_real_escape_string($Create_Connection, $input["countryname"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE countrym 
 SET countryname = '".$countryname."'
 WHERE countryid = '".$input["countryid"]."'
 ";

 mysqli_query($Create_Connection, $query);
}
if($input["action"] === 'delete')
{
 $query = "
 UPDATE countrym
 SET isactive = 0
 WHERE id = '".$input["countryid"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>
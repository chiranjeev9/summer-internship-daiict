<!DOCTYPE html>
<html>
<head>
	<title>Uploading file</title>
</head>
<body>
<form action="#" method="POST" enctype="multipart/form-data">
	<label>Upload files</label>
	<p><input type="file" name="file"></p>
	<p><input type="submit" name="upload" value="Upload Image"></p>
	
</form>
</body>
</html>
<?php
if (isset($_POST['upload'])) {

     $file_name = $_FILES['file']['name'];
     $file_type = $_FILES['file']['type'];
     $file_tem_loc = $_FILES['file']['tmp_name'];
     $file_store = "img/".$file_name;

     move_uploaded_file($file_tem_loc, $file_store);

     echo "Successfully Uploded";
}else
{
	echo "Could not upload the file";
}


?>
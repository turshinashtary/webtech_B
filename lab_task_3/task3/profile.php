<!DOCTYPE html>
<html>
<head>

	<style type="text/css">
    label
    {
    	width: 170px;
    	display: inline-block;
    	text-align: left;
    	
    }
	.error
	{
		color: red;
	}
</style>

</head>
<body>


<?php
$target_dir = "C:\xampp\htdocs\webtech labtask\Lab task 3\task3\Upload";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$UploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"]) && isset($_POST["fileToUpload"]) ) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $UploadOk = 0;
}


if ($_FILES["fileToUpload"]["size"] > 4000000) {
  echo "Sorry, your file is too large.";
  $UploadOk = 0;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $UploadOk = 0;
}


if ($UploadOk == 0) {
  echo "Sorry, your file was not Uploaded.";

} else {
  if (move_Uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been Uploaded.";
  } else {
    echo "Sorry, there was an error Uploading your file.";
  }

	$proPic=$_FILES["fileToUpload"]["tmp_name"];



}
?>



<fieldset style="width:400px; height: 400px ">
	<legend><h3>Profile Picture</h3></legend> 

	<form method="POST"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

  		
  	<?php 

		if(isset($_POST["submit"]))
		{
			$proPic="C:\xampp\htdocs\webtech labtask\Lab task 3\task3\Upload".$_FILES["fileToUpload"]["name"];
		}
		else
		{
			$proPic="profile.PNG";
		}

    ?> 
    

<img src="<?= $proPic; ?>"width="100" height="100"/>
  		

  		

  		
  		<br>
		<input type="file" value="Choose a file" name="fileToUpload" >
 
		<hr align=center  size=1>
		<input type="submit" value="Submit" name="submit">
		
	 
	</form>

</fieldset>








</body>
</html>
<?php  
require_once '../model/model.php';


if (isset($_POST['updateproduct'])) {
	$data['name'] = $_POST['name'];
	$data['type'] = $_POST['type'];
	$data['quantity'] = $_POST['quantity'];
	
	$data['image'] = basename($_FILES["image"]["name"]);

	$target_dir = "../uploads/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);


  if (updateproduct($_POST['id'], $data)) {
  	echo 'Successfully updated!!';
  	
  	header('Location: ../showproduct.php?id=' . $_POST["id"]);
  }
} else {
	echo 'You are not allowed to access this page.';
}


?>
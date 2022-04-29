<?php 

require_once 'controller/productInfo.php';
$product = fetchproduct($_GET['id']);


 



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="controller/updateproduct.php" method="POST" enctype="multipart/form-data">
 <legend> <h1>Edit Product</h1></legend>
  <label for="name">Name:</label><br>
  <input value="<?php echo $product['Name'] ?>" type="text" id="name" name="name"><br>
  <label for="type">Type:</label><br>
  <input value="<?php echo $product['Type'] ?>" type="text" id="surname" name="surname"><br>
  <label for="quantity">Quantity:</label><br>
  <input value="<?php echo $product['Quantity'] ?>" type="text" id="username" name="username"><br>
  <input type="file" name="image"><br><br>
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateproduct" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>


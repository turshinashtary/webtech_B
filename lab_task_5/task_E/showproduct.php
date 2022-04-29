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

<table>
	<tr>
		<th>Name</th>
		<th>Type</th>
		<th>Quantity</th>
		<th>Image</th>
	</tr>
	<tr>
		<td><a href="showproduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Name'] ?></a></td>
		<td><a href="showproduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Type'] ?></a></td>
		<td><a href="showproduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Quantity'] ?></a></td>
		<td><img width="100px" src="uploads/<?php echo $product['image'] ?>"></td>
	</tr>

</table>


</body>
</html>
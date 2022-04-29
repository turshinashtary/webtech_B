<?php  
require_once 'controller/productInfo.php';

$products = fetchAllproducts();


   



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
<legend> <h1>All Product</h1></legend>
	<thead>
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Quantity</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $i => $product): ?>
		
		
			<tr>
				<td><a href="showproduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Name'] ?></a></td>
				<td><?php echo $product['Type'] ?></td>
				<td><?php echo $product['Quantity'] ?></td>
				<td><img width="100px" src="uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['Name'] ?>"></td>
				<td><a href="editproduct.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="controller/deleteproduct.php?id=<?php echo $product['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
			
			
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>
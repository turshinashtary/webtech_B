
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<?php 
   

?>

<table>
	<thead>
		<tr>
			<th>User_id</th>
			<th>Name</th>
			<th>Type</th>
			<th>Quantity</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedproducts as $i => $product): ?>
			<tr>
				<td><a href="../showproduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['ID'] ?></a></td>
				<td><?php echo $product['Name'] ?></td>
				<td><?php echo $product['Type'] ?></td>
		       <td><?php echo $product['Quantity'] ?></td>
				<td><a href="../editproduct.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="deleteproduct.php?id=<?php echo $product['ID'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>
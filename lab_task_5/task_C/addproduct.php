<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   
   

 <form action="controller/createproduct.php" method="POST" enctype="multipart/form-data">
  <legend style="color:cyan;"> <h1>Add Product</h1></legend>
 <table border="1">
            <tr>
                <td>Name</td>
				<td>:<input type="text" id="name" name="name" ><br>
				</tr>
				<tr>
				<td>Type</td>
				<td>:<input type="text" id="type" name="type" ><br>
				</tr>
				<tr>
				<td>Quantity</td>
				<td>:<input type="text" id="quantity" name="quantity" ><br>
				</tr>
				<tr>
                <td>:<input type="file" name="image"><br><br>
				</tr>
				</table>
  <input type="submit" name = "createproduct" value="Create">
  <input type="reset"> 
</form> 

</body>
</html>


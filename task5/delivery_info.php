<?php

	$message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["orderid"]))  
      {  
           $error = "<label class='text-danger'>Enter ID</label>";  
      }
      else if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter nsme</label>";  
      }  
      else if(empty($_POST["productid"]))  
      {  
           $error = "<label class='text-danger'>Enter product id</label>";  
      }  
      else if(empty($_POST["productname"]))  
      {  
           $error = "<label class='text-danger'>Enter product name</label>";  
      }
	  else if(empty($_POST["price"]))  
      {  
           $error = "<label class='text-danger'>Enter price</label>";  
      }
      else if(empty($_POST["address"]))  
      {  
           $error = "<label class='text-danger'>Enter address</label>";  
      } 
      else if(empty($_POST["daddress"]))  
      {  
           $error = "<label class='text-danger'>Enter delivery address</label>";  
      } 
       
      else  
      {  
           if(file_exists('cdata.json'))  
           {  
                $current_data = file_get_contents('cdata.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'orderid' => $_POST["orderid"],  
                     'name' => $_POST["name"],  
                     'productid' => $_POST["productid"],  
                     'productname' => $_POST["productname"], 
                     'price' => $_POST["price"],					 
                     'address' => $_POST["address"] 
                     					 
		   );  

                
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  

                
                if(file_put_contents('cdata.json', $final_data))  
                {  
                     $message = "<label class='text-success'>File saved Successfully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  

?>
<html>
    <body>
    <?php include('manager_dashboard.php')?>
    <fieldset>
        <p>Delivery Info</p><hr>
        <table border="1">
            <tr>
                <td>Order id</td>
				<td>:<input name="orderid"  type="text" ><br>
				</tr>
				<tr>
                <td>Customer Name</td>
				<td>:<input name="name"  type="text" ><br>
				</tr>
				<tr>
                <td>Product id</td>
				<td>:<input name="productid"  type="text" ><br>
				</tr>
				<tr>
                <td>Product Name</td>
				<td>:<input name="productname"  type="text" ><br>
				</tr>
				<tr>
                <td>Total Price</td>
				<td>:<input name="price"  type="text" ><br>
				</tr>
				<tr>
                <td>Address</td>
				<td>:<input name="address"  type="text" ><br>
				</tr>
				<tr>
                <td>Delivery Address</td>
				<td>:<input name="daddress"  type="text" ><br>
            </tr>
            
        </table>
		<input type="submit" name="submit" value="save" class="btn btn-info" />  
    </fieldset>
	
	<?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
    </body>
</html>
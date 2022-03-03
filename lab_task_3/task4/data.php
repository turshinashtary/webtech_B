<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
</head>
<body>
<div class="container">
<div class="table-responsive"> 
<table class="table table-bordered"> 
<tr>  
 <th>Name</th> 
 <th>E-mail</th>  
 <th>User name</th>   
 <th>Gender</th>   
 <th>Date of birth</th>   
 </tr>  
 <?php   
 $data = file_get_contents("data.json");  
                          
 $data = json_decode($data, true);  
 foreach($data as $row)  
 {  
  echo '<tr>
  <td>'.$row["name"].'</td>
   <td>'.$row["e-mail"].'</td>
   <td>'.$row["username"].'</td>
   <td>'.$row["gender"].'</td>
   <td>'.$row["dob"].'</td>
   </tr>';  
  }  
 ?>  
 </table>
 </div>
</div>


</body>
</html>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {
  color: #FF0000;
}
p1{
  color: green;
}
p2{
  color: red;
}
</style>
</head>
<body>  

<?php



$currpass = $newpass = $retypenewpass = "";
$currpassErr = $newpassErr = $retypenewpassErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["currpass"])) 
  {
    $currpassErr = "Current Password is required";
    //$currpass="";
    }
	else 
	{
		$currpass = test_input($_POST["currpass"]);
		if ($currpass!="abc@1234")
		{
			$currpassErr = "Invalid Password";
			$currpass="";
		}
	}
  
  
  
  if (empty($_POST["newpass"])) 
  {
    $newpassErr="Password is required";
	$newpass="";
  }
   
  else 
  {
    $newpass = test_input($_POST["newpass"]);
    if($newpass=$currpass)
  {
    $newpassErr = "New Password is required";
	$newpass="";
  }
    
  }  
     if (empty($_POST["retypenewpass"])) 
  {
    $retypenewpassErr = "Password is required";
	$retypenewpass="";
  } 
  else 
  {
    $retypenewpass = test_input($_POST["retypenewpass"]);
    if($newpass!=$retypenewpass)
  {
    $retypenewpassErr= "New password does not match";
	$retypenewpass="";
  }
    
  }
}
  
 

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <fieldset>
  <legend><strong>CHANGE PASSWORD</strong></legend> 
  
  Current Password:<input type="text" name="currpass" value="<?php echo $currpass;?>">
  <span class="error">* <?php echo $currpassErr;?></span>
  <br><br>

  <p1>New Password:</p1><input type="text" name="newpass" value="<?php echo $newpass;?>">
  <span class="error">* <?php echo $newpassErr;?></span>
  <br><br>
  
  <p2>Retype New Password:</p2> <input type="text" name="retypenewpass" value="<?php echo $retypenewpass;?>">
  <span class="error">* <?php echo $retypenewpassErr;?></span>
  <br>
  <hr>
  
  
  <input type="submit" name="submit" value="Submit">  

  </fieldset>
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $newpass;
echo "<br>";
echo $retypenewpass;
echo "<br>";
?>

</body>
</html>
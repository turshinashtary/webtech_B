<?php
	$username="";
	$err_username="";
	$pass="";
	$err_pass="";
    $email="";
    $err_email="";
 
	
	
	$hasError=false;
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
    
		

        if(empty($_POST["username"])){
			$hasError=true;
			$err_username="Information Required*";
		}
		elseif (strlen($_POST["username"]) <=6)
		{
			$hasError = true;
			$err_username = "User Name must be greater than 6 characters*";
		}
		else if(strpos($_POST["username"]," "))
		{
			$err_username = "no space is allowed*";
		}	
		else
		{
			$username = $_POST["username"];
		}

        if(empty($_POST["pass"])){
			$hasError=true;
			$err_pass="Password Required*";
		}
		elseif (strlen($_POST["pass"]) <=8)
		{
			$hasError = true;
			$err_pass = "Password must be greater than 8 characters*";
		}
		
		else
		{
			$pass = $_POST["pass"];
		}


		


        if(empty($_POST["email"]))
		{
			$hasError=true;
			$err_email="Email is Required*";
		}
		else if(!strpos($_POST["email"],"@"))
		{
			$err_email = "Invalid Email*";
		}
		else
		{
			$email = $_POST["e-mail"];
		}


		if(!$hasError){
		
			echo $_POST["username"]."<br>";
			echo $_POST["pass"]."<br>";
            echo $_POST["email"]."<br>";
           

			}
		}
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
	<body>

<!--- Navabr Start--->

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Organic Food Management System</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto w-100 justify-content-end">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
    </div>
</nav>




		<form action="" method="post">
        <fieldset>
        <legend style="color:cyan;"> <h1>Forget Password</h1></legend>
			<table>
				

				<tr>
					<td align="right">Username</td>
					<td>:<input name="username" value="<?php echo $username;?>" type="text"placeholder="Your User Name"><br>
					<span style="color:cyan;"><?php echo $err_username;?></span></td>
				</tr>

				<tr>
					<td align="right">Password</td>
					<td>:<input name="pass" value="<?php echo $pass;?>" type="password"placeholder="Password"><br>
					<span style="color:cyan;"><?php echo $err_pass;?></span></td>
				</tr>

				<label>Forget Password? <a href="forgetpassword.php">Password Reset</a> </label>

				<tr>
					<td><input type="submit" value="login"></td>
				</tr>
			</table>
            </fieldset>
		</form>
	</body>
</html>
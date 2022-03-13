<?php
	session_start();
	$uname="";
	$pass="";

	if (isset($_POST['username'])) {
		if ($_POST['username']==$uname && $_POST['pass']==$pass) {
			$_SESSION['username']=$uname;
			

		}else{
			$msg = "Username or password invalid";
		}
	}


?>

<html>
<head>
<title>Manager login</title>
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
          <a class="nav-link" href="registrationpage.php">Registration</a>
        </li>
      </ul>
    </div>
    </div>
</nav>







<form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
        <fieldset>
        <legend style="color:cyan;"> <h1>Manager Login</h1></legend>
			<table>
				

				<tr>
					<td align="right">Username</td>
					<td>:<input name="username"  type="text" placeholder="Your User Name" ><br>
				</tr>

				<tr>
					<td align="right">Password</td>
					<td>:<input name="pass"  type="password" placeholder="Password""><br>
				</tr>

			

		
				
			</table>
			</div>
                   <a href="manager_dashboard.php" class="btn btn-primary">Login</a>
                 </div><br>
			<label>Forget Password? <a href="forgetpassword.php">Password Reset</a> </label>
            </fieldset>
		</form>
		
	</body>
</html>
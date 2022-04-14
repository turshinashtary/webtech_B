<?php
	session_start();

?>

<html>
<head>
<title>Manager login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
	<body>

<!--- Navabr Start--->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
          <a class="nav-link" href="managersignup.php">Registration</a>
        </li>
      </ul>
    </div>
    </div>
</nav>


<!-- Login System-->
<?php
    
      include 'dbcon.php';
      if(isset($_POST['submit']))
      {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username_search = "select * from chef where username='$username'";
        $query = mysqli_query($con,$username_search);

        $username_count = mysqli_num_rows($query);

        if($username_count)
        {
          $username_pass = mysqli_fetch_assoc($query);

          $db_pass = $username_pass['password'];

		  $pass_decode = password_verify($password, $db_pass);
          
          $_SESSION['fullname'] = $username_pass['fullname'];
          $_SESSION['userid'] = $username_pass['userid'];
           
          if($pass_decode)
          {
            	echo "Login complete";
            	header('location: ../task5\manager_dashboard.php');
          }
          else
          {
             echo "Wrong Password";
          }

        }
        else
        {
          echo "Invalid username";
        }
      }

    ?>

<!-- Login Code end-->




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
					<td>:<input name="password"  type="password" placeholder="Password""><br>
				</tr>

			

				<tr>
					<td><input type="submit" name="submit" value="Login"></td>
				</tr>
			</table>
			<label>Forget Password? <a href="forgetpassword.php">Password Reset</a> </label>
            </fieldset>
		</form>
	</body>
</html>
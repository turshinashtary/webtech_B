<?php
	$fullname="";
	$err_fullname="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
    $confirm_pass="";
    $err_confirm_pass="";
    $email="";
    $err_email="";
    $phone="";
    $err_phone="";
    $address="";
    $err_address="";
    $birthdate="";
    $err_birthdate="";
	
	
	$hasError=false;
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{

        //User name//
        if(empty($_POST["uname"])){
			$hasError=true;
			$err_uname="-User Name Required-";
		}
		elseif (strlen($_POST["uname"]) <=6)
		{
			$hasError = true;
			$err_uname = "-User Name must be greater than 6 characters-";
		}
		else if(strpos($_POST["uname"]," "))
		{
			$err_uname = "-no space is allowed-";
		}	
		else
		{
			$uname = $_POST["uname"];
		}

        //Password//
        if(empty($_POST["pass"])){
			$hasError=true;
			$err_pass="-Password Required-";
		}
		elseif (strlen($_POST["pass"]) <=8)
		{
			$hasError = true;
			$err_pass = "-Password must be greater than 8 characters-";
		}
		else if(strpos($_POST["pass"],"#"||"?"))
		{
			$err_pass = "-Dont use those special characters in your password-";
		}	
		else
		{
			$pass = $_POST["pass"];
		}

		//Confirm Password//
		if(empty($_POST["confirm_pass"]))
		{
			$hasError=true;
			$err_confirm_pass="-Password Required-";
		}

		elseif($pass != $confirm_pass)
		{
			$hasError=true;	
   			$err_confirm_pass ="-Password and Confirm password should not be different-";  
		}
		if($pass ==  $confirm_pass)
        {
            if( ctype_upper($pass) && ctype_lower($pass) && is_numeric($pass) )
            {
               $pass = $_POST["pass"];
            }

            else
            {
                 $err_pass="-Password should contain atleast one uppercase,lower case and numeric-";
            }
        }

        //Email//
        if(empty($_POST["email"]))
		{
			$hasError=true;
			$err_email="-Email is Required-";
		}
		else if(!strpos($_POST["email"],"@"))
		{
			$err_email = "*-Invalid Email-";
		}
		else
		{
			$email = $_POST["email"];
		}

        //Phone//
        if(!empty($_POST["phone"]))
		{
			$hasError=true;
			$err_phone="-Phone number is Required-";
		}
		
		else
		{
			$phone = $_POST["phone"];
		}

        //Address//
        if(empty($_POST["address"])){
			$hasError=true;
			$err_address="-Address is Required-";
		}
		else
		{
			$address = $_POST["address"];
		}
		
		if(!$hasError){
			echo $_POST["fullname"]."<br>";
			echo $_POST["username"]."<br>";
			echo $_POST["pass"]."<br>";
            echo $_POST["confirm_pass"]."<br>";
            echo $_POST["email"]."<br>";
            echo $_POST["phone"]."<br>";
            echo $_POST["address"]."<br>";
            echo $_POST["birthdate"]."<br>";

			}
		}
?>
<html>
<head>
<title>Manager Signup</title>
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
          <a class="nav-link" href="managerlogin.php">Login</a>
        </li>
      </ul>
    </div>
    </div>
</nav>

<!-- Database Connection Start-->
<?php
    include 'dbcon.php';
    if(isset($_POST['submit']))
    {
      $fullname = mysqli_real_escape_string($con,$_POST['fullname']);
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $email = mysqli_real_escape_string($con,$_POST['email']);
      $password = mysqli_real_escape_string($con,$_POST['password']);
      $repassword = mysqli_real_escape_string($con,$_POST['repassword']);
      $phone = mysqli_escape_string($con,$_POST['phone']);
      $dob = date('y-m-d', strtotime($_POST['date']));
      $address = mysqli_escape_string($con,$_POST['address']);

	  $pass = password_hash($password, PASSWORD_BCRYPT);
	  $repass = password_hash($repassword, PASSWORD_BCRYPT);

      $usernamequery = "select * from chef where username='$username'";
      $query = mysqli_query($con,$usernamequery);

      $unamecount = mysqli_num_rows($query);

      if($unamecount>0)
      {
        ?>
          <script>
          alert("Username has been Taken!");
          </script>
        <?php
      }
      else
      {
        if($password === $repassword)
        {
          $insetquery = "insert into chef(username, fullname, email, password, repassword, phone, address, dob) values('$username','$fullname','$email','$pass','$repass', '$phone', '$address', '$dob')";

          $iquery = mysqli_query($con, $insetquery);
          if($con)
              {
                  ?>
                  <script>
                      alert("Registration complete! Go to Login Page");
                      </script>
                      <?php
                       header('location: ../lab_task_6\managerlogin.php');
              }
              else
              {
                  ?>
                  <script>
                      alert("Something Wrong! DO it again. Thank you");
                      </script>
                      <?php
              }
        }else{
          echo "Password are not matching!";
        }
      }
    }

?>


<!-- Database End -->




		<form action="" method="post">
        <fieldset>
        <legend>Manager Signup</legend>
			<table>
            <tr>
					<td align="right">Full Name</td>
					<td>:<input name="fullname" type="text" ><br>
					<span style="color:red;"></span></td>
				</tr>

				<tr>
					<td align="right">Username</td>
					<td>:<input name="username" type="text" ><br>
					<span style="color:red;"></span></td>
				</tr>

				<tr>
					<td align="right">Password</td>
					<td>:<input name="password" type="password" ><br>
					<span style="color:red;"></span></td>
				</tr>

                <tr>
					<td align="right">Confirm Password</td>
					<td>:<input name="repassword" type="password" ><br>
					<span style="color:red;"></span></td>
				</tr>

                <tr>
					<td align="right">Email</td>
					<td>:<input name="email" type="text" ><br>
					<span style="color:red;"></span></td>
				</tr>

                <tr>
					<td align="right">Phone</td>
					<td>:<input name="phone" type="number" placeholder="Number"  ><br>
					<span style="color:red;"></span></td>
				</tr>

                <tr>
					<td align="right">Address</td>
					<td>:<input name="address" type="text" placeholder="Street Address" ><br>
					<span style="color:red;"></span></td>
				</tr>
                    <tr>
                         <td align="right">DOB</td>
                         <td>: <input type="date" name="date" placeholder="dd/mm/yyyy" ></td>
                    </tr>
				<tr>
					<td><input type="submit" name="submit" value="Registration"></td>
				</tr>
			</table>
            </fieldset>
            <label>Already Have Account? <a href="managerlogin.php">Manager Login</a> </label>
		</form>
	</body>
</html>
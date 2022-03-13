 
<?php

 
$flag=1;
$nameErr = $emailErr = $genderErr = $dobErr = $name = $email = $dob = $gender = "";
$username = $password = "";
$userNameErr = $passErr = $confirmpassErr = $confirmpass = "";
 
if(isset($_POST["submit"]))  
 { 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $flag=0;
  } 
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$name)) {
      $nameErr = "Only letters white space, period & dash allowed";
      $name ="";
      $flag=0;
    }
    else if (str_word_count($name)<2) {
      $nameErr = "At least two words needed";
      $name ="";
      $flag=0;
    }
  
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $flag=0;
  } 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email ="";
      $flag=0;
    }
  

  if (empty($_POST["DOB"])) {
    $dobErr = "DOB is required";
    $flag=0;
  } 

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $flag=0;
  } 

  if (empty($_POST["username"])) {
    $userNameErr = "UserName is required";
    $flag=0;
  } 
    if (!preg_match("/^[a-zA-Z-._]*$/",$username)) {
      $userNameErr = "Only alpha numeric characters, period, dash or underscore allowed";
      $username ="";
      $flag=0;
    }
    else if (strlen($username)<2) {
      $userNameErr = "At least two charecters needed";
      $username ="";
      $flag=0;
    }
  
  
  if (empty($_POST["Password"])) {
    $passErr = "Password is required";
    $flag=0;
  } 
    if (strlen($password)<8) {
      $passErr = "Password must be 8 charecters";
      $password ="";
      $flag=0;
    }
    else if (!preg_match("/[@,#,$,%]/",$password)) {
      $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
      $password ="";
      $flag=0;
    }
  
  if (empty($_POST["confirmpass"])) {
    $confirmpassErr = "Retype The Current Password";
    $flag=0;
  } 
    if (strcmp($password, $confirmpass)==1) {
      $confirmpassErr = "Password & Retyped Password Dosen't Match";
      $confirmpass ="";
      $flag=0;
    }
   
 if ($flag==1) {
  if(isset($_POST["submit"]))  
    {
  if(file_exists('data.json'))
    {
      $current_data = file_get_contents('data.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array(  
                 'name'               =>     $_POST['name'],
                 'email'          =>     $_POST["email"],
                 'username'          =>     $_POST["username"],
                 
                 'gender'          =>     $_POST["gender"],  
                 'dateOfBirth'     =>     $_POST["DOB"]  
                );  
            $array_data[] = $new_data;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('data.json', $final_data))  
            {  
                 $message = "<h2>saved Successfully</h2>";  
            }  
        }  
        else  
        {  
           $error = 'JSON File not exits';  
        }  
    }
 }
}
}


?>

<html>
<head>
<title>Manager Registration</title>
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
          <a class="nav-link" href="login.php">Login</a>
        </li>
		<li>
          <a class="nav-link" href="registrationpage.php">Registration</a>
        </li>
        <li>
          <a class="nav-link" href="contactus.php">Contact Us</a>
        </li>
      </ul>
    </div>
    </div>
</nav>
<form action="" method="post">
        <fieldset>
        
			<br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Registration Form</h3><br />                 
                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?> 
<br />					 
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><hr>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><hr>
  User Name: <input type="text" name="username">
  <span class="error">* <?php echo $userNameErr;?></span>
  <br><hr>
  Password: <input type="Password" name="Password">
  <span class="error">* <?php echo $passErr;?></span>
  <br><hr>
  Confirm Password: <input type="Password" name="confirmpass">
  <span class="error">* <?php echo $confirmpassErr;?></span>
  <br><hr>
  <fieldset>
  <legend>Gender</legend>
 
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  </fieldset>
  <hr>
  <fieldset>
  <legend>Date Of Birth</legend>
  <input type="date" name="DOB">
  <span class="error">* <?php echo $dobErr;?></span>
  <br></fieldset><hr>
  <input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset">  
  
  <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?> 
</form>
</div>  
 <br />
 </fieldset>
            <label>Already Have Account? <a href="managerlogin.php">Manager Login</a> </label>
		</form>

</body>
</html>
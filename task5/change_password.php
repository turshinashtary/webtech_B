<?php
$new_pass="";
$err_new_pass="";
$confirm_pass="";
$err_confirm_pass="";

$hasError=false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //New Password//
    if(empty($_POST["new_pass"])){
        $hasError=true;
        $err_new_pass="-Password Required-";
    }
    elseif (strlen($_POST["new_pass"]) <=8)
    {
        $hasError = true;
        $err_new_pass = "-Password must be greater than 8 characters-";
    }
    else if(strpos($_POST["new_pass"],"#"||"?"))
    {
        $err_new_pass = "-Dont use those special characters in your password-";
    }	
    else
    {
        $new_pass = $_POST["new_pass"];
    }

    //Confirm Password//
		if(empty($_POST["confirm_pass"]))
		{
			$hasError=true;
			$err_confirm_pass="-Required-";
		}

		elseif($pass != $confirm_pass)
		{
			$hasError=true;	
   			$err_confirm_pass ="-Password and Confirm password should not be different-";  
		}
}
?>
<html>
    <body>
    <?php include('manager_dashboard.php')?>

    <fieldset>
        <p>Change Password</p><hr>
        <table>
                <tr>
					<td align="right">New Password</td>
					<td>:<input name="new_pass" value="<?php echo $new_pass;?>" type="new_pass"><br>
					<span style="color:red;"><?php echo $err_new_pass;?></span></td>
				</tr>

                <tr>
					<td align="right">Confirm Password</td>
					<td>:<input name="confirm_pass" value="<?php echo $confirm_pass;?>" type="password"><br>
					<span style="color:red;"><?php echo $err_confirm_pass;?></span></td>
				</tr>
                <tr>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
				
				<?php
    include 'dbcon.php';
    if(isset($_POST['submit']))
    {
      $new_pass = mysqli_real_escape_string($con,$_POST['newpass']);
      $confirm_pass = mysqli_real_escape_string($con,$_POST['confirmpass']);
      
      $new_passquery = "select * from cpass where newpass='$new_pass'";
      $query = mysqli_query($con,$new_passquery);

      $new_passcount = mysqli_num_rows($query);

      
        if($new_pass === $confirm_pass)
        {
          $insetquery = "insert into cpass(newpass, confirmpass) values('$new_pass','$confirm_pass')";

          $iquery = mysqli_query($con, $insetquery);
          if($con)
              {
                  ?>
                  <script>
                      alert("Password Changed");
                      </script>
                      <?php
                       header('location: ../task5\managerlogin.php');
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
    

?>

        </table>
    </fieldset>
    </body>
</html>
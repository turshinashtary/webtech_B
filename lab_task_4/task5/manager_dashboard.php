<?php

 session_start(); 
?>

<html>

    <head></head>
    <body>
        <table align="right" border="1">
            <tr>
                <td colspan="5" style="width: 100%;"></td>
                <td align="right" style="width: 10px;"><a href="manager_dashboard.php">Home</a></td>
                <td align="right" style="width: 10px;"><a href="index.php">LogOut</a></td>
            </tr>
        </table>
        <fieldset>
        <center> <h1>Welcome! Have a nice day.</h1></center>
            
        </fieldset>
        <fieldset>
            <b>DashBoard:</b>
            <table border="1">
                <tr>
                    <td><a href="change_password.php">Change Password</a></td>
                    <td><a href="delivery_info.php">Delivery Info</a></td>
                    <td><a href="manage_account.php">Manage Account</a></td>
					<td><a href="manage_profile.php">Manager Profile</a></td>
                </tr>
            </table>
        </fieldset>
    </body>
</html>
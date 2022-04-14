<html>
    <body>
    <?php include('manager_dashboard.php')?>
    <fieldset>
        <center><h1>Manage Account</h1><hr></center>
        <center>
            <table class="content-table" border="1" width=6%;>
                <thead>
                    <tr>
                        <td align="center"> Name </td>
						<td>:<input name="name"  type="text" ><br>
						</tr>
						<tr>
                        <td align="center"> E-mail </td>
						<td>:<input name="e-mail"  type="text" ><br>
						</tr>
						<tr>
                        <td align="center"> User Name </td>
						<td>:<input name="username"  type="text" ><br>
						</tr>
						<tr>
                        <td align="center"> Gender </td>
						<td>:<input name="grnder"  type="text" ><br>
						</tr>
						<tr>
                        <td align="center"> Date of Birth </td>
                        <td>:<input name="dob"  type="text" ><br>
                    </tr>
                </thead>
                  
                
            </table>

              <input type="submit" name="submit" value="save" class="btn btn-info" />
            </center>
    </fieldset>
	
    </body>
</html>
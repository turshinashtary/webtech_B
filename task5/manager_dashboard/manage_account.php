<html>
    <body>
    <?php include('manager_dashboard.php')?>
    <fieldset>
        <p>Manage Customer</p><hr>
<center>
            <table class="content-table" border="2" width=65%;>
                <thead>
                    <tr>
                        <td align="center"> User ID </td>
                        <td align="center"> Full Name </td>
                        <td align="center"> User Name </td>
                        <td align="center"> Email </td>
                        <td align="center"> Phone </td>
                        <td align="center"> Address </td>
                        <td align="center"> DOB </td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        include '../dbcon.php';

                        $selectquery = "select * from customer";
                        $query = mysqli_query($con,$selectquery);
                        $nums = mysqli_num_rows($query);

                        while($res = mysqli_fetch_array($query))
                        {
                            ?>
                            <tr>
                                <td><?php echo $res['userid'] ?></td>
                                <td><?php echo $res['fullname'] ?></td>
                                <td><?php echo $res['username'] ?></td>
                                <td><?php echo $res['email'] ?></td>
                                <td><?php echo $res['phone'] ?></td>
                                <td><?php echo $res['address'] ?></td>
                                <td><?php echo $res['dob'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>


            </center>



    </fieldset>
    </body>
</html>
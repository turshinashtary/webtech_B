
<!DOCTYPE html>
<html>
<style>
th,td {
  padding: 5px;
}
</style>
<body>



<form action=""> 
  <select name="customers" onchange="showCustomer(this.value)">
    <option value="">Select a customer:</option>
    <option value="1">C1</option>
    <option value="2">C2</option>
    <option value="3">C3</option>
  </select>
</form>
<br>
<div id="txtHint">customer info will be listed here...</div>

<script>
function showCustomer(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET", "customer_info.php?q="+str);
  xhttp.send();
}
</script>
<?php
$mysqli = new mysqli("localhost", "root", "", "dbms");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT customerid, customername, email, address, city, phone
FROM customerinfo WHERE customerid = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname, $email, $adr, $city, $phn);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>CustomerID</th>";
echo "<td>" . $cid . "</td>";
echo "<th>CustomerName</th>";
echo "<td>" . $cname . "</td>";
echo "<th>Email</th>";
echo "<td>" . $email . "</td>";
echo "<th>Address</th>";
echo "<td>" . $adr . "</td>";
echo "<th>City</th>";
echo "<td>" . $city . "</td>";
echo "<th>Phone</th>";
echo "<td>" . $phn . "</td>";
echo "</tr>";
echo "</table>";

?>
</body>
</html>

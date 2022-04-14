<?php 
session_start();
if (isset($_SESSION['username'])) {
	echo "<h1>Welcome to your dashborad ". $_SESSION['username']. "</h1>";
}else{
	header("location:login.php");
}

?>
<a href="logout.php">Logout</a>
<!DOCTYPE html>
<html>
<head>


<title> User's information</title>
<link rel="stylesheet" href="style.css">
<style>
body{
text-align: center;
font-size: 23px;
}
</style>
</head>

<body>
<h1>User's information</h1>

<?php
session_start();
require "connection.php";
echo "Welcome ".$_SESSION["username"]. "! Welcome to our game!";
echo "<br>Your personal information...<br>";

$sql="SELECT * FROM game where username='$_SESSION[username]'";
//select all from the users table of the loged in user
$result=$con->query($sql);
		
		if ($result->num_rows> 0){
			while($row= $result->fetch_assoc()){
			echo "<br>Username: ".$row["username"]. "<br>Password: " .$row["password"]. "<br>Win: ".$row["win"]. "<br>Lose: " .$row["lose"]. "<br>Age: " .$row["age"]. "<br>Gender: ".$row["gender"].
			"<br>Latitude: ".$row["locatLat"]."<br>Longitude: ".$row["locatLng"]."</br>";
			
			}
		}		


?>

<p>
<br><input type="button" class="button" value="Back User Page" onclick="window.location.href='userPage.html'"/></br></p>

</body>
</html>

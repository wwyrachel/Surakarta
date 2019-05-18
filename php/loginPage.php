<!DOCTYPE html>
<html>
<head>


<title> User Login</title>
<link rel="stylesheet" href="style.css">
<style>
body{
text-align: center;
}
</style>
</head>

<body>
<h1>User Login</h1>

<?php 
session_start();
if (isset($_POST["Login"])){
	require "connection.php";
	$username=$_POST["username"];
	$pass=$_POST["pass"];
	
	
	if (empty($username) || empty($pass)){
		echo "Username and Password are required!!";
		}
		
	if(!empty($_POST["username"]) && !empty($_POST["pass"])  ){
		$sql="SELECT * FROM game where username='$_POST[username]' AND password='$_POST[pass]'";
		$result=$con->query($sql);
		while($row= $result->fetch_assoc()){
			
			
		if ($result->num_rows> 0){
			$_SESSION["username"] = $username;
			header("Location: userPage.html");
			
			
		}
		else{
			echo "Incorrect Username or Password...";
		}
		//if ($result->num_rows<0){
			//echo"no";
			//echo "Incorrect Username or Password...";
			
			//}
		}
		//echo "Incorrect Username or Password...";
		
	}	
	
}

if (isset($_GET["logout"])){
	session_unregister("username");
}
?>

<form action= "loginPage.php" method= "post">
Username: <input type= "text" name="username">
<br>
Password: <input type= "password" name="pass">
<br>


<input type="submit" name="Login" value="Login">
</form>


<p>
<br><input type="button" class= "button" value="Back to Main" onclick="window.location.href='mainPage.html'"/></br></p>
</html>
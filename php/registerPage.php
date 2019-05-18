<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
body{
text-align: center;
}
</style>
   
</head>
<body>
<h3>Registration Page</h3>
 
  
<?php
if (isset($_POST["Register"])){
	require "connection.php";
	$username=$_POST["username"];
	$pass=$_POST["pass"];
	$pass1=$_POST["pass1"];
	$age=$_POST["age"];
	$gender= $_POST["gender"];
	$locatLat= $_POST["lat"];
	$locatLng= $_POST["lng"];
	
	if ((!empty($pass) || empty($pass1)) AND $pass != $pass1){
		echo "Password and Confirmed Password are not the same!!<br>";
	}
	else{
		if (empty($username) || empty($pass)){
		echo "Username, Password and Name are required!!";
		}
		
	else{
		$sql=("INSERT INTO game(win, lose, username, password, gender, age, locatLat, locatLng)
		VALUES( '0', '0', '$username', '$pass','$gender', '$age', '$locatLat', '$locatLng')");
		//insert the user information into users table in the database
		if($con->query($sql)==TRUE){
			echo"Successfully registered!";
			}
			else{
				echo"Error!";
			}
		}
	}
	
		
}

?>

  
  <form name="myform" action= "registerPage.php" method= "post">
  Username: <input type= "text" name="username">
  <br>
  Password: <input type= "password" name="pass">
  <br>
  Confirm Password: <input type= "password" name="pass1">
  <br>
  Age: <input type= "text" name="age">
  <br>
  Gender: <input type= "text" name="gender">
  <br>
  
   
  


	
	Location: <input type="text" id="searchBox" size="50px">
	<input type= "hidden" name="lat" value="">
  <br>
  <input type= "hidden" name="lng" value="">
  <br>
    <div id="map"></div>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAoQXUPPZAxR8PH1exvt_2Rmy7-VPlPyE&libraries=places">
    </script>
    <script>
      
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map,
		draggable: true
    });
	
	var search = new google.maps.places.SearchBox(document.getElementById("searchBox"));
		
	google.maps.event.addListener(search, "places_changed", function(){
	    var newPlace= search.getPlaces();
		
		var bounds = new google.maps.LatLngBounds();
		var place, n, locatLat, locatLng;
		
		
		for (n=0; place=newPlace[n]; n++){
		   console.log(n);
		   bounds.extend(place.geometry.location);
		   marker.setPosition(place.geometry.location);
		   console.log("lat: "+place.geometry.location.lat()+"\nlng: "+place.geometry.location.lng());
		   document.myform.lat.value= place.geometry.location.lat();
		   document.myform.lng.value= place.geometry.location.lng();
		   
		}
		
		
		//bounds.extend(newPlace[0].geometry.location);
		//marker.setPosition(newPlace[0].geometry.location);
		
		
		map.fitBounds(bounds);
		map.setZoom(13);
		
		
		
	});	
      
    </script>
	
	<input type="submit" name="Register" value="Register">
    </form>
	
	<p>
<br><input type="button" class= "button" value="Back to Main" onclick="window.location.href='mainPage.html'"/></br></p>
    
</body>
</html>
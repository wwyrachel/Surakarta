<!DOCTYPE html>
<html>
  <head>
    <style>
	header{
	font-size: 35px;
	color: #444444;
	margin: 20px
}

	body {
	
	
	font-family: Century Gothic, Arial;
	margin: 0 auto;
	text-align: center;
	
}
	
       #map {
        height: 600px;
        width: 100%;
       }
	   .button{
	background-color: white;
	border: 2px solid black; 
	padding: 7px 12px;
	cursor: pointer;
	transition-duration: 0.4s;
	
}

.button:hover{
	background-color:#444444;
	color: white;
	
	
}

    </style>
</head>
<body>
<header>User Locations</header>

<?php 


	require "connection.php";
	
	
		
	$sql="SELECT username, age,gender, win, lose, (win-lose)as score, locatLat, locatLng FROM game";
	//use a sql to retrieved the matching book record and sort by book title
	$result=$con->query($sql);
	echo "<table align='center' table border=1>
	<tr>
	<th>Username </th>
	<th>Age </th>
	<th>Gender </th>
	<th>Win </th>
	<th>Lose </th>
	<th>Score </th>
	<th>Latitude </th>
	<th>Longitude </th>
	
	</tr>";
	
	
	
	if ($result->num_rows> 0){
		
		echo "<p>Found " .$result->num_rows. " players...<p>";
		while($row= $result->fetch_assoc()){
			echo"<tr>";
			echo "<td>".$row["username"]. "</td>";
			echo "<td>".$row["age"]. "</td>";
			echo "<td>".$row["gender"]. "</td>";
			echo "<td>".$row["win"]. "</td>";
			echo "<td>".$row["lose"]. "</td>";
			echo "<td>".$row["score"]. "</td>";
			echo "<td>".$row["locatLat"]. "</td>";
			echo "<td>".$row["locatLng"]. "</td>";
			
			echo "</tr>";
		}
	}
	else{
		echo "<br>No such record";
	}


	$sql="SELECT locatLat FROM game";
	//use a sql to retrieved the matching book record and sort by book title
	$result=$con->query($sql);
	echo "<table align='center' table border=1>
	<tr>
	
	
	</tr>";
	
	
	$x=0;
	
	if ($result->num_rows> 0){
		
		
		while($row= $result->fetch_assoc()){
			
			$data[$x] =$row;
			$x++;
		}
	}
	else{
		echo "<br>No such record";
	}
	
	$lati=array();
	$s=0;
	
	for ($k=0; $k<count($data); $k++){
		foreach($data[$k] as $x => $x_value) {
			
			$lati[$s]=$x_value;
			$s++;
			//echo $s;
			echo "<br>";
			}
	}
	
	
	
	
	
	$sql="SELECT locatLng FROM game";
	//use a sql to retrieved the matching book record and sort by book title
	$result=$con->query($sql);
	
	
	$x1=0;
	
	if ($result->num_rows> 0){
		
		
		while($row= $result->fetch_assoc()){
			
			$data1[$x1] =$row;
			$x1++;
		}
	}
	else{
		echo "<br>No such record";
	}
	
	$lngn=array();
	$s1=0;
	
	for ($k1=0; $k1<count($data1); $k1++){
		foreach($data1[$k1] as $x1 => $x_value1) {
			
			$lngn[$s1]=$x_value1;
			$s1++;
			
			}
	}
	
	
	$sql4="SELECT (win-lose) as score FROM game";
	//use a sql to retrieved the matching book record and sort by book title
	$result4=$con->query($sql4);
	
	
	$x4=0;
	
	if ($result4->num_rows> 0){
		
		
		while($row= $result4->fetch_assoc()){
			
			$data4[$x4] =$row;
			$x4++;
		}
	}
	else{
		echo "<br>No such record";
	}
	
	$score=array();
	$s4=0;
	
	for ($k4=0; $k4<count($data4); $k4++){
		foreach($data4[$k4] as $x4 => $x_value4) {
			
			$score[$s4]=$x_value4;
			$s4++;
			
			}
	}
	
	
	$sql5="SELECT username FROM game";
	//use a sql to retrieved the matching book record and sort by book title
	$result5=$con->query($sql5);
	
	
	$x5=0;
	
	if ($result5->num_rows> 0){
		
		
		while($row= $result5->fetch_assoc()){
			
			$data5[$x5] =$row;
			$x5++;
		}
	}
	else{
		echo "<br>No such record";
	}
	
	$username_arr=array();
	$s5=0;
	
	for ($k5=0; $k5<count($data5); $k5++){
		foreach($data5[$k5] as $x5 => $x_value5) {
			
			$username_arr[$s5]=$x_value5;
			$s5++;
			
			}
	}
	
	
	



?>

  
  
    <div id="map"></div>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=*api key*&libraries=places">
    </script>
    <script>
      
   
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 9,
        center: {lat: 22.181379, lng: 114.105869}
    });
	
	var name0= "<?php echo $username_arr[0] ?>";
	var name1= "<?php echo $username_arr[1] ?>";
	var name2= "<?php echo $username_arr[2] ?>";
	var name3= "<?php echo $username_arr[3] ?>";
	var name4= "<?php echo $username_arr[4] ?>";
	var name5= "<?php echo $username_arr[5] ?>";
	var name6= "<?php echo $username_arr[6] ?>";
	
	
	
	var score0= "<?php echo $score[0] ?>";
	var score1= "<?php echo $score[1] ?>";
	var score2= "<?php echo $score[2] ?>";
	var score3= "<?php echo $score[3] ?>";
	var score4= "<?php echo $score[4] ?>";
	var score5= "<?php echo $score[5] ?>";
	var score6= "<?php echo $score[6] ?>";
	
	var lat0= "<?php echo $lati[0] ?>";
	var lat1= "<?php echo $lati[1] ?>";
	var lat2= "<?php echo $lati[2] ?>";
	var lat3= "<?php echo $lati[3] ?>";
	var lat4= "<?php echo $lati[4] ?>";
	var lat5= "<?php echo $lati[5] ?>";
	var lat6= "<?php echo $lati[6] ?>";
	
	
	
	var lngn0= "<?php echo $lngn[0] ?>";
	var lngn1= "<?php echo $lngn[1] ?>";
	var lngn2= "<?php echo $lngn[2] ?>";
	var lngn3= "<?php echo $lngn[3] ?>";
	var lngn4= "<?php echo $lngn[4] ?>";
	var lngn5= "<?php echo $lngn[5] ?>";
	var lngn6= "<?php echo $lngn[6] ?>";
	
	
	
    addMarker({lat: Number(lat0), lng: Number(lngn0)},name0+", score: "+score0);
	addMarker({lat: Number(lat1), lng: Number(lngn1)}, name1+", score: "+score1);
	addMarker({lat: Number(lat2), lng: Number(lngn2)}, name2+", score: "+score2);
	addMarker({lat: Number(lat3), lng: Number(lngn3)},name3+", score: "+score3);
	addMarker({lat: Number(lat4), lng: Number(lngn4)}, name4+", score: "+score4);
	addMarker({lat: Number(lat5), lng: Number(lngn5)}, name5+", score: "+score5);
	addMarker({lat: Number(lat6), lng: Number(lngn6)}, name6+", score: "+score6);
	
	
	function addMarker(coordinate, content1){
	var marker = new google.maps.Marker({
        position: coordinate,
        map: map,
		draggable: true
    });
	
	var infoWindow = new google.maps.InfoWindow({
		content: content1
	});
	
	marker.addListener("click", function(){
		infoWindow.open(map, marker);
	});
	
	}
	
	
	
    </script>
	
	<p>
<br><input type="button" class= "button" value="Back to Main" onclick="window.location.href='mainPage.html'"/></br></p>
  </body>
</html>

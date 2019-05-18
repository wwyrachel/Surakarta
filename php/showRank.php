<!DOCTYPE html>
<html lang="en-US">
<head>
<title>About</title>
</head>
<body>

<link rel="stylesheet" href="style.css">
<style>
body{
text-align: center;
}
</style>
<h1>Rankings</h1>
<?php 


	require "connection.php";
	
	
		
	$sql="SELECT gender, count(*) as count FROM game GROUP BY gender";
	$sql2="SELECT username, win FROM game ORDER BY win DESC LIMIT 5";
	$sql3="SELECT username, (win-lose) as score FROM game ORDER BY score DESC LIMIT 5";
	$sql4="SELECT username, (win+lose) as participation FROM game ORDER BY participation DESC";
	$sql5="SELECT username, (win-lose) as score FROM game WHERE gender='Male' ORDER BY score DESC LIMIT 5";
	$sql6="SELECT username, (win-lose) as score FROM game WHERE gender='Female' ORDER BY score DESC LIMIT 5";
	$sql7="SELECT username, (win-lose) as score FROM game WHERE age BETWEEN 0 AND 20 ORDER BY score DESC LIMIT 5";
	$sql8="SELECT username, (win-lose) as score FROM game WHERE age BETWEEN 21 AND 60 ORDER BY score DESC LIMIT 5";
	$sql9="SELECT username, (win-lose) as score FROM game WHERE age BETWEEN 61 AND 100 ";
	
	
	
	
	$result=$con->query($sql);
	$result2=$con->query($sql2);
	$result3=$con->query($sql3);
	$result4=$con->query($sql4);
	$result5=$con->query($sql5);
	$result6=$con->query($sql6);
	$result7=$con->query($sql7);
	$result8=$con->query($sql8);
	$result9=$con->query($sql9);
	?>
	
<div id="barchart_score" align='center' style="width: 900px; height: 370px;"></div>
<p><p>
<div id="barchart_malescore" align='center' style="width: 900px; height: 370px;"></div>
<p><p>
<div id="barchart_femalescore" align='center' style="width: 900px; height: 370px;"></div>
<p><p>

<div id="barchart_age0" align='center' style="width: 900px; height: 370px;"></div>

<p><p>
<div id="barchart_age21" align='center' style="width: 900px; height: 370px;"></div>
<p><p>
<div id="barchart_age61" align='center' style="width: 900px; height: 370px;"></div>
<p><p>
<div id="barchart_win" align='center' style="width: 900px; height: 370px;"></div>
<p><p>
<div id="barchart_active" align='center' style="width: 900px; height: 370px;"></div>
<p><p>
<div id="piechart_gender" align='center' style="width: 900px; height: 370px;"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawGenderChart);
	google.charts.setOnLoadCallback(drawWinChart);
	google.charts.setOnLoadCallback(drawScoreChart);
	google.charts.setOnLoadCallback(drawScoreMaleChart);
	google.charts.setOnLoadCallback(drawScoreFemaleChart);
	google.charts.setOnLoadCallback(drawScoreAge0Chart);
	google.charts.setOnLoadCallback(drawScoreAge21Chart);
	google.charts.setOnLoadCallback(drawScoreAge61Chart);
	
	google.charts.setOnLoadCallback(drawActiveChart);
	//-------------------------------------------------------
	function drawScoreChart() {
      var data = google.visualization.arrayToDataTable([
        ["Username", "Scroe(Number of winning matches-lossing matches)" ],
        <?php
		while($row= $result3->fetch_assoc()){
			echo "['".$row["username"]."', ".$row["score"]."],";
             			
		}
		
		?>
		
      ]);

	 

      var options = {
        title: "Top 5 player with the highest score",
        width: 600,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
		colors: ['#f6b5b5', '#f6b5b5', '#f6b5b5', '#f6b5b5', '#f6b5b5'],
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_score"));
      chart.draw(data, options);
  }
  
  //---------------------------------------------------------------------------
  
  function drawScoreMaleChart() {
      var data = google.visualization.arrayToDataTable([
        ["Username", "Scroe(Number of winning matches-lossing matches)" ],
        <?php
		while($row= $result5->fetch_assoc()){
			echo "['".$row["username"]."', ".$row["score"]."],";
             			
		}
		
		?>
		
      ]);

	 

      var options = {
        title: "Top 5 male player with the highest score",
        width: 600,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
		colors: ['#b5f6d3', '#b5f6d3', '#b5f6d3', '#b5f6d3', '#b5f6d3'],
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_malescore"));
      chart.draw(data, options);
  }
  
   //---------------------------------------------------------------------------
  
  function drawScoreFemaleChart() {
      var data = google.visualization.arrayToDataTable([
        ["Username", "Scroe(Number of winning matches-lossing matches)" ],
        <?php
		while($row= $result6->fetch_assoc()){
			echo "['".$row["username"]."', ".$row["score"]."],";
             			
		}
		
		?>
		
      ]);

	 

      var options = {
        title: "Top 5 female player with the highest score",
        width: 600,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
		colors: ['#b5d3f6', '#b5d3f6', '#b5d3f6', '#b5d3f6', '#b5d3f6'],
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_femalescore"));
      chart.draw(data, options);
  }
  
  //--------------------------------------------------------------
   function drawScoreAge0Chart() {
      var data = google.visualization.arrayToDataTable([
        ["Username", "Scroe(Number of winning matches-lossing matches)" ],
        <?php
		while($row= $result7->fetch_assoc()){
			echo "['".$row["username"]."', ".$row["score"]."],";
             			
		}
		
		?>
		
      ]);

	 

      var options = {
        title: "Top 5 player between 0 and 20 years old",
        width: 600,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_age0"));
      chart.draw(data, options);
  }
  
  //--------------------------------------------------------------
   function drawScoreAge21Chart() {
      var data = google.visualization.arrayToDataTable([
        ["Username", "Scroe(Number of winning matches-lossing matches)" ],
        <?php
		while($row= $result8->fetch_assoc()){
			echo "['".$row["username"]."', ".$row["score"]."],";
             			
		}
		
		?>
		
      ]);

	 

      var options = {
        title: "Top 5 player between 21 and 60 years old",
        width: 600,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
		colors: ['#cfb5f6', '#cfb5f6', '#cfb5f6', '#cfb5f6', '#cfb5f6'],
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_age21"));
      chart.draw(data, options);
  }
  
  
  //--------------------------------------------------------------
   function drawScoreAge61Chart() {
      var data = google.visualization.arrayToDataTable([
        ["Username", "Scroe(Number of winning matches-lossing matches)" ],
        <?php
		while($row= $result9->fetch_assoc()){
			echo "['".$row["username"]."', ".$row["score"]."],";
	
			
             			
		}
		
		?>
		
		
      ]);

	 

      var options = {
        title: "Top 5 player between 61 and 100 years old",
        width: 600,
        height: 400,
        bar: {groupWidth: "25%"},
        legend: { position: "none" },
		colors: ['#d94d1a', '#d94d1a', '#d94d1a', '#d94d1a', '#d94d1a'],
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_age61"));
      chart.draw(data, options);
  }
  
  
  //--------------------------------------------------------------
    function drawWinChart() {
      var data = google.visualization.arrayToDataTable([
        ["Username", "Number of matches" ],
        <?php
		while($row= $result2->fetch_assoc()){
			echo "['".$row["username"]."', ".$row["win"]."],";
             			
		}
		
		?>
		
      ]);

	 

      var options = {
        title: "Top 5 play with the number of winning matches",
        width: 600,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_win"));
      chart.draw(data, options);
  }
  
  //----------------------------------------------------------
  function drawActiveChart() {
      var data = google.visualization.arrayToDataTable([
        ["Username", "Number of matches" ],
        <?php
		while($row= $result4->fetch_assoc()){
			echo "['".$row["username"]."', ".$row["participation"]."],";
             			
		}
		
		?>
		
      ]);

	 

      var options = {
        title: "Top 10 player joining the highest number of matches",
        width: 600,
        height: 400,
        bar: {groupWidth: "75%"},
        legend: { position: "none" },
		colors: ['#802d0f', '#802d0f', '#802d0f', '#802d0f', '#802d0f'],
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_active"));
      chart.draw(data, options);
  }
  
  //---------------------------------------------------------------------
function drawGenderChart() {
      var data = google.visualization.arrayToDataTable([
        ["Gender", "Number" ],
        <?php
		while($row= $result->fetch_assoc()){
			echo "['".$row["gender"]."', ".$row["count"]."],";
             			
		}
		
		?>
      ]);
      
	  
      var options = {
        title: "Percentage of male and female players",
       
      };
      var chart = new google.visualization.PieChart(document.getElementById("piechart_gender"));
      chart.draw(data, options);
  }
  
  
  </script>

<p>
<br><input type="button" class="button" value="Back to Main" onclick="window.location.href='mainPage.html'"/></br></p>

</body>
</html>

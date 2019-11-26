<?php include('admin_header.php');?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>     	

  <div class="content-wrapper">

	<center>
		<a href="weather.php"><button type="button" class="btn btn-primary">Back</button></a>
	</center>

<?php
error_reporting(0);
// $get = json_decode(file_get_contents('http://ip-api.com/json/'),true);
// date_default_timezone_set($get['timezone']);
$city = $_GET['q'];
 $string = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=ebcf5230b3446f334fe3fa2fd2d4ce24";
 
 $data = json_decode(file_get_contents($string),true);
 
 $temp = $data['main']['temp'];
 
 $icon = $data['weather'][0]['icon'];
 $visibility = $data['visibility'];
 $visibilitykm = $visibility / 1000;
 $country =  "<h1 class='w3-xxxlarge w3-animate-zoom'><b>".$data['name'].",".$data['sys']['country']."</h1></b>";
 
 $logo = "<img src='http://openweathermap.org/img/w/".$icon.".png'>";
 $desc = "<b><p>".$data['weather'][0]['description']."</p></b>";
 
 $temperature =  "<b>Temp:".$temp."°C</b><br>";
 $clouds = "<b>Clouds:".$data['clouds']['all']."%</b><br>";
 $humidity = "<b>Humidity:".$data['main']['humidity']."%</b><br>";
 $windspeed = "<b>Wind Speed:".$data['wind']['speed']."m/s</b><br>";
 $pressure = "<b>Pressure:".$data['main']['pressure']."hpa</b><br>";
 $visibility =  "<b>Visibility:".$visibilitykm."Km</b><br>";
 $sunrise = "<b>Sunrise:".date('h:i A', $data['sys']['sunrise'])."</b><br>";
 $sunset = "<b>Sunset:".date('h:i A', $data['sys']['sunset'])."</b>";
 
 
?>
<div class="well">
	<div class="w3-display-container w3-wide">
		<div class="row">
			<div class="col-sm-6">
				<div class="jumbotron w3-display-topmiddle w3-margin-top">
				<?php 
					echo $country;
					echo $logo; 
					echo "<h2>".$desc."</h1>";
				?>	
				</div>	
			</div>
			<div class="col-sm-6">
				<div class="w3-display-middle w3-margin-top w3-padding-top">
					<div class="w3-animate-left w3-margin-top"><br><br><br>
						<h2 class="w3-xlarge">
						<?php echo $temperature; ?>
						<?php echo $clouds; ?>
						<?php echo $humidity; ?>
						<?php echo $$windspeed; ?>
						<?php echo $pressure; ?>
						<?php echo $$visibility; ?>
						<?php echo $sunrise; ?>
						<?php echo $sunset; ?>
						</h2>
					</div>
				</div>		
			</div>	
		</div>	
	</div>
</div>
<?php include('admin_footer.php');?>
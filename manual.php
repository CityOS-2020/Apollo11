<?php

if(isset($_POST['counter_temp'])){
	if($_POST['inc_temp']=="Increase"){
		$counter_temp = $_POST['counter_temp']+1;
	}
	else if($_POST['dec_temp']== 'Decrease'){
		$counter_temp = $_POST['counter_temp']+1;
	}
	else{
		$counter_temp = 20;
	}}


	else if(isset($_POST['counter_hum'])){
	if($_POST['inc_hum']=="Increase"){
		$counter_hum = $_POST['counter_hum']+1;
	}
	else if($_POST['dec_temp']== 'Decrease'){
		$counter_hum = $_POST['counter_hum']+1;
	}
	else{
		$counter_hum = 20;
	}
}

else if(isset($_POST['counter_earth'])){
	if($_POST['inc_earth']=="Increase"){
		$counter_earth = $_POST['counter_earth']+1;
	}
	else if($_POST['dec_temp']== 'Decrease'){
		$counter_earth = $_POST['counter_earth']+1;
	}
	else{
		$counter_earth = 20;
	}
}


else if(isset($_POST['counter_wat'])){
	if($_POST['inc_wat']=="Increase"){
		$counter_wat = $_POST['counter_wat']+1;
	}
	else if($_POST['dec_wat']== 'Decrease'){
		$counter_wat = $_POST['counter_wat']+1;
	}
	else{
		$counter_wat = 20;
	}
}

else if(isset($_POST['counter_door'])){
	if($_POST['inc_door']=="Increase"){
		$counter_door = $_POST['counter_door']+1;
	}
	else if($_POST['dec_door']== 'Decrease'){
		$counter_door = $_POST['counter_door']+1;
	}
	else{
		$counter_door = 20;
	}
}

else if(isset($_POST['counter_wind'])){
	if($_POST['inc_wind']=="Increase"){
		$counter_wind = $_POST['counter_wind']+1;
	}
	else if($_POST['dec_door']== 'Decrease'){
		$counter_wind = $_POST['counter_wind']+1;
	}
	else{
		$counter_wind = 20;
	}
}

else if(isset($_POST['counter_wash'])){
	if($_POST['inc_wash']=="Increase"){
		$counter_wash = $_POST['counter_wash']+1;
	}
	else if($_POST['dec_wash']== 'Decrease'){
		$counter_wash = $_POST['counter_wash']+1;
	}
	else{
		$counter_wash = 20;
	}
}

?>

<html>
<head>
<title>Test</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="manual.css">
<script type="text/javascript" src="on.off.js"></script>
</head>
<body>
<h1>Welcome to smart GreenGarden</h1>
<div id="main_nav">
	<table width="80%">
		<tr>
			<td id="auto" width="50%"><a href="index.php">Auto</a></td>
			<td id="manuel" width="50%"><a href="manual.php">Manual</a></td>
		</tr>
	</table>
</div>
<div id="main_div">
	<table width="80%">
		<tr>
			<td id="first" width="20%">
				<a href="">Internal temperature</a><br>
				<div id="inside_temp">
				<h2 class="inside_temp">20 ° C</h2>
				<h2 class="inside_temp1"><?php echo 20;?> ° C</h2><br>
				</div>
				<form method="POST" accept="manual.php">
					<br><br><br><br>
					<input class="submit" name="inc_temp" type="submit" value="Increase">
					<input class="submit" name="dec_temp" type="submit" value="Decrease">
					<input type="hidden" name="counter_temp" value="<?php echo $counter_temp; ?>">
				</form>

			</td>
			<td width="20%">
				<a href="">Humidity</a><br>
				<div id="inside_temp">
				<h2 class="inside_temp">60%</h2>
				<h2 class="inside_temp1"><?php echo 60;?>%</h2><br>
				</div>
				<form method="POST" accept="manual.php">
					<br><br><br><br>
					<input class="submit" name="inc_hum" type="submit" value="Increase">
					<input class="submit" name="dec_hum" type="submit" value="Decrease">
					<input type="hidden" name="counter_hum" value="<?php echo $counter_hum; ?>">
				</form>
			</td>
			<td id="last" width="20%">
			<a href="">Soil moisture</a><br>
			<div id="inside_temp">
				<h2 class="inside_temp">30%</h2>
				<h2 class="inside_temp1"><?php echo 30;?>%</h2><br>
				</div>
				<form method="POST" accept="manual.php">
					<br><br><br><br>
					<input class="submit" name="inc_earth" type="submit" value="Increase">
					<input class="submit" name="dec_earth" type="submit" value="Decrease">
					<input type="hidden" name="counter_earth" value="<?php echo $counter_earth; ?>">
				</form>
			</td>
			<td id="first" width="20%">
				<a href="">The water level</a><br>
				<div id="inside_temp">
				<h2 class="inside_temp">90%</h2>
				<h2 class="inside_temp1"><?php echo 90;?>%</h2><br>
				</div>
				<form method="POST" accept="manual.php">
					<br><br><br><br>
					<input class="submit" name="inc_wat" type="submit" value="Increase">
					<input class="submit" name="dec_wat" type="submit" value="Decrease">
					<input type="hidden" name="counter_wat" value="<?php echo $counter_wat; ?>">
				</form>
			</td>
		</tr>
	</table>
</div>
<div id="second_div">
	<table width="80%">
		<tr>
			<td width="20%">
				<a href="">Battery</a><br>
				<div id="inside_temp">
				<h2 class="inside_temp">100%</h2>
				<h2 class="inside_temp1"><?php echo '100';?>%</h2><br>
				</div>
				<form method="POST" accept="manual.php">
					<br><br><br><br>
					<input class="submit" name="inc_door" type="submit" value="Charge">
					<input class="submit" name="dec_door" type="submit" value="Stop">
					<input type="hidden" name="counter_door" value="<?php echo $counter_door; ?>">
				</form>
			</td>
			<td width="20%">
				<a href="">Doors</a><br>
				<div id="inside_temp">
				<h2 class="inside_temp">Open</h2>
				<h2 class="inside_temp1"><?php echo ' ';?>Open</h2><br>
				</div>
				<form method="POST" accept="manual.php">
					<br><br><br><br>
					<input class="submit" name="inc_door" type="submit" value="Open">
					<input class="submit" name="dec_door" type="submit" value="Close">
					<input type="hidden" name="counter_door" value="<?php echo $counter_door; ?>">
				</form>
			</td>
			<td id="last" width="20%">
			<a href="">Clapper</a><br>
				<div id="inside_temp">
				<h2 class="inside_temp">Closed</h2>
				<h2 class="inside_temp1">Closed</h2><br>
				</div>
				<form method="POST" accept="manual.php">
					<br><br><br><br>
					<input class="submit" name="inc_wind" type="submit" value="Open">
					<input class="submit" name="dec_wind" type="submit" value="Close">
					<input type="hidden" name="counter_wind" value="<?php echo $counter_wind; ?>">
				</form>
			</td>
			<td width="20%">
			<a href="">Washing</a><br>
				<div id="inside_temp">
				<h2 class="inside_temp">OFF</h2>
				<h2 class="inside_temp1"></h2><br>
				</div>
				<form method="POST" accept="manual.php">
					<br><br><br><br>
					<input class="submit" name="inc_wash" type="submit" value="On">
					<input class="submit" name="dec_wash" type="submit" value="Off">
					<input type="hidden" name="counter_wash" value="<?php echo $counter_wash; ?>">
				</form>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
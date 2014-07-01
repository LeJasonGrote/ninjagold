<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel='stylesheet' type="text/css" href="assets/css/style.css">
	<title>Ninja Gold3</title>
</head>
<body>
	<form action="welcome/process_money" method="post">
		<h3>Your Gold<div class="your_gold"> <?= $this->session->userdata('total_gold') ?> </div></h3>
		<div class="box">
			<h2>Farm</h2>
			<p>(earns 10-20 gold)</p>
			<input type="submit" name="farm" value="Find Gold">
		</div>
		<div class="box">
			<h2>Cave</h2>
			<p>(earns 5-10 gold)</p>
			<input type="submit" name="cave" value="Find Gold">
		</div>
		<div class="box">
			<h2>House</h2>
			<p>(earns 2-5 gold)</p>
			<input type="submit" name="house" value="Find Gold">
		</div>
		<div class="box">
			<h2>Casino</h2>
			<p>(earns/takes 0-50 gold)</p>
			<input type="submit" name="casino" value="Find Gold">
		</div>
	</form>
	<h2>Activities</h2>
	<div class="activities">
		<?php 
		foreach ($activities as $index => $array) {
			?> <p> <?= $array['activity'] ?> <?= $array['created_on'] ?> </p>  
		<?php } ?>
	</div>
	<form action="welcome/destroy">
		<input type="submit" value="reset">

	</form>
</body>
</html>
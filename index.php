<?php
date_default_timezone_set('America/Los_Angeles');
$mydir = $_SERVER['DOCUMENT_ROOT'];
$folders = [];

foreach(glob("$mydir/*", GLOB_ONLYDIR) as $dir) {
	$field = str_replace("$mydir/", '', $dir);
	$folders[$field] = $dir;
}

function chooseStyle($dayStyle = "css/screen.css", $nightStyle = "css/n_screen.css") {
	global $computer;
	if(date("H") >= 8 && date("H") < 18 ) {
		$computer = "images/MyComputerLaptop.png";
		return $dayStyle;
	} else {
		$computer = "images/N_MyComputerLaptop.png";
		return $nightStyle;
	}
}
$currentStyle = chooseStyle();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>localhost</title>
	<link rel="stylesheet" href="<?=$currentStyle?>">
</head>
<body>
	<div class="mainHead">
		<div class="folders">
		<ul>
			<?php foreach($folders as $folder => $link) : ?>
			<li><a href="<?=$folder?>"><?=$folder?></a></li>
			<?php endforeach; ?>
			<li><em><?= "Current Hour " . date("H");?></em></li>
			<li><a href="phpinfo.php"><strong>phpinfo()</strong></a></li>
		</ul>
	</div>
	<div class="arrow-down"></div>
		<p>localhost</p>
		<img src="<?=$computer?>" alt="My Computer">
	</div>
</body>
</html>


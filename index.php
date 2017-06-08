<?php 
	session_start(); 
	include_once '/php/connection-info.php'; 
	if(!isset($_SESSION['user'])) {
		header("Location: /php/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Glasbena lestvica</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="with=device-with, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="/css/index-style.css">
  	<script src="/js/jquery-3.2.1.min.js"></script>
  	<script src="/js/index.js"></script>
</head>
<body>
	<div id="nav">
		<div id="nav-container">
			<ul id="ul_navigation">
				<li><a href="../index.php">Home</a></li>
				<li><a href="/php/top10.php">Top 10 of the week</a></li>
				<li><a href="/php/music_chart.php">Music Chart</a></li>
				<?php if($_SESSION['user_admin'] == 1) echo '<li><a href="/php/admin_website.php">Manage Webiste</li></a>'; ?>
				<li><a href="/php/logout.php">Log Out</a></li>
			</ul>
			<?php echo 'Welcome: '.$_SESSION['user'] ?>
		</div>
	</div>
	<div id="space"></div>
</body>
</html>
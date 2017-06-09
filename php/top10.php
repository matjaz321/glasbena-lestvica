<?php 
	session_start(); 
	include_once 'connection-info.php'; 
	if(!isset($_SESSION['user'])) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Glasbena lestvica</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="with=device-with, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="../css/index-style.css">
  	<script src="../js/jquery-3.2.1.min.js"></script>
  	<script src="../js/index.js"></script>
</head>
<body>
	<div id="nav">
		<div id="nav-container">
			<ul id="ul_navigation">
				<li><a href="../index.php">Home</a></li>
				<li><a href="top10.php">Top 10 of the week</a></li>
				<li><a href="music_chart.php">Music Chart</a></li>
				<?php if($_SESSION['user_admin'] == 1) echo '<li><a href="admin_website.php">Manage Webiste</li></a>'; ?>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
			<?php echo 'Welcome: '.$_SESSION['user'] ?>
		</div>
	</div>
	<div id="space"></div>

<div id="table-content">
	<table border="1">
		<tr>
			<td>
				
			</td>
			<td>
				Title
			</td>
			<td>
				Artist
			</td>
			<td>
				Description
			</td>
		</tr>
		<?php
			include 'connection-info.php';
			$query = "SELECT g.opis AS 'opis_glasbe', naslov, ime, priimek FROM glasbe g INNER JOIN izvajalci i ON i.id = g.izvajalec_id ORDER BY (ocena_poz) DESC LIMIT 10";
			$result = mysqli_query($conn, $query);
			$i = 1;
			while ($row = mysqli_fetch_array($result)) {
				echo '<tr><td>'.$i.'</td><td>'.$row['naslov'].'</td><td>'.$row['ime'].' '.$row['priimek'].'</td><td>'.$row['opis_glasbe'].'</td></tr>';
				$i++;
			}

		?>
	</table>
</div>
</body>
</html>
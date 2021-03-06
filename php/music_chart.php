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

<div id="content">

	<div class="filter-panel">
		<div id="filter-content">
			<h3>Filter By Music Category</h3>
			<div id="filters">
				<ul>
				<?php
					include_once 'connection-info.php';
					$query = "SELECT ime FROM zvrsti";
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result)){
						$string = '?'.strtolower($row['ime']);
						echo '<li>'.'<a href="'.$string.'">'.$row['ime'].'</a>'.'</li>';
					}
				?>
				</ul>
			</div>
		</div>
	</div>
<div id="content-table">
	<table id="table" border="1">
		<tr>
			<td>
				Title
			</td>
			<td>
				Arist
			</td>
			<td>
				Description
			</td>
			<td>
				Vote
			</td>
		</tr>
		<?php
			include 'connection-info.php';

			$zvrsti = "SELECT ime FROM zvrsti";
			$result_zvrsti = mysqli_query($conn, $zvrsti);
			
			while($row_zvrsti = mysqli_fetch_array($result_zvrsti)){
				if(empty($_SERVER["QUERY_STRING"])){
					$query = "SELECT i.ime, i.priimek,  g.naslov, g.opis, g.id FROM glasbe g INNER JOIN izvajalci i ON i.id = g.izvajalec_id";
					$result = mysqli_query($conn, $query);
					
					while ($row = mysqli_fetch_array($result)) {
						echo '<tr><td>'.$row['naslov'].'</td><td>'.$row['ime'].' '.$row['priimek'].'</td><td>'.$row['opis'].'</td>';
						$query2 = "SELECT id FROM ocene WHERE (uporabnik_id='".$_SESSION['user_id']."' AND glasba_id='".$row['id']."')";
						$result2 = mysqli_query($conn, $query2);
						if(mysqli_num_rows($result2) > 0){
							echo '<td>You already voted </td></tr>';
						}else {
							echo '<td>'.'<form method="POST" action="validation.php">'.'<input type="hidden" name="glasba_id" value="'.$row['id'].'"'.'/>'.'<input type="radio" name="vote" value="1" required>'.'<img src="../images/like.png" alt="like picture" width="30px">'.'<input type="radio" name="vote" value="-1" required>'.'<img src="../images/dislike.png" alt="dislike picture" width="30px">'.'<button type="submit" name="submit_vote" value="Vote">Vote</button>'.'</form>'.'</td></tr>';
						}
					}
				}
				else if($_SERVER["QUERY_STRING"] == strtolower($row_zvrsti['ime'])) {
					$query = "SELECT i.ime, i.priimek,  g.naslov, g.opis, g.id FROM zvrsti z INNER JOIN glasba_zvrsti gz ON z.id=gz.zvrst_id INNER JOIN glasbe g ON g.id=gz.glasba_id INNER JOIN izvajalci i ON i.id = g.izvajalec_id WHERE z.ime = '".$row_zvrsti['ime']."'";
					$result = mysqli_query($conn, $query);
					if($result){
						while ($row = mysqli_fetch_array($result)) {
							echo '<tr><td>'.$row['naslov'].'</td><td>'.$row['ime'].' '.$row['priimek'].'</td><td>'.$row['opis'].'</td>';
							$query2 = "SELECT id FROM ocene WHERE (uporabnik_id='".$_SESSION['user_id']."' AND glasba_id='".$row['id']."')";
						$result2 = mysqli_query($conn, $query2);
							if(mysqli_num_rows($result2) > 0){
								echo '<td>You already voted </td></tr>';
							}else {
								echo '<td>'.'<form method="POST" action="validation.php">'.'<input type="hidden" name="glasba_id" value="'.$row['id'].'"'.'/>'.'<input type="radio" name="vote" value="1" required>'.'<img src="../images/like.png" alt="like picture" width="30px">'.'<input type="radio" name="vote" value="-1" required>'.'<img src="../images/dislike.png" alt="dislike picture" width="30px">'.'<button type="submit" name="submit_vote" value="Vote">Vote</button>'.'</form>'.'</td></tr>';
							}
						}
					}else {
						echo '<tr><td>No results</td></tr>';
					}
				}
			}
		?>
	</table>
</div>
</div>
</body>
</html>
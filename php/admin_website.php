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

<div id="admin-content">
	<div id="panel">
		<ul id="admin_website_nav">
			<li><a href="javascript: void(0)" id="new_song">Add new Song</a></li>
			<li><a href="javascript: void(0)" id="new_music_category">Add new Music Category</a></li>
			<li><a href="javascript: void(0)" id="new_artist">Add new Artist</a></li>
			<li><a href="javascript: void(0)" id="view_users">View list of all users</a></li>
			<li><a href="#">View list of music chart</a></li>
		</ul>
	</div>
</div>

<div id="hidden_add_new_song" class="toggle" style="display:none">
  <div class="form">
    <form class="register_form" method="post" action="insert.php">
      <input type="text" placeholder="Title of song" name="title" required="required" />
      <input type="text" placeholder="Length" name="length" required="required"/>
      <input type="text" placeholder="Description of song" name="description" required="required"/>
      <select name="izvajalec">
      <?php
      	include_once 'connection-info.php';
      	$query = "SELECT ime, priimek, id FROM izvajalci";
      	$result = mysqli_query($conn, $query);
      	while($row = mysqli_fetch_array($result)){
      		echo '<option value="'.$row['id'].'">'.$row['ime'].' '.$row['priimek'].'</option>';
      	}
      ?>
      </select>
      <select name="zvrst">
      <?php
      	include_once 'connection-info.php';
      	$query = "SELECT ime, id FROM zvrsti";
      	$result = mysqli_query($conn, $query);
      	while($row = mysqli_fetch_array($result)){
      		echo '<option value="'.$row['id'].'">'.$row['ime'].'</option>';
      	}
      ?>
      </select>
      <button name="new_song">Insert new music</button>
    </form>
  </div>
</div> 
<div id="hidden_add_new_artist" class="toggle" style="display:none">
  <div class="form">
    <form class="register_form" method="post" action="insert.php">
      <input type="text" placeholder="Name of artist or group" name="artist_name" required="required" />
      <input type="text" placeholder="Last name (Not required)" name="last_name"/>
      <textarea name="description" placeholder="Description of artist" required="required" maxlength="300"></textarea>
      <input type="number" placeholder="Year of artist birth" name="artist_year_birth" required="required"/>
      <button name="new_artist">Add new artist</button>
    </form>
  </div>
</div> 

<div id="hidden_add_new_category" class="toggle" style="display:none">
  <div class="form">
    <form class="register_form" method="post" action="insert.php">
      <input type="text" placeholder="Name of category" name="category" required="required" />
      <textarea name="description" placeholder="Description of Category" required="required" maxlength="250"></textarea>
      <button name="new_music_category">Add new Music Category</button>
    </form>
  </div>
</div> 

<div id="hidden_show_users_table" class="toggle" style="display:none">
  <table>
  	<tr>
  		<td>
  			First Name
  		</td>
  		<td>
  			Last Name
  		</td>
  		<td>
  			Email Address
  		</td>
  		<td>
  			Telephone Number
  		</td>
  	</tr>
  	<?php
  		$query = "SELECT ime, priimek, email, tel_stevilka FROM uporabniki";
  		$result = mysqli_query($conn, $query);		 		
  		while ($row = mysqli_fetch_array($result)) {
  			echo '<tr><td>'.$row['ime'].'</td><td>'.$row['priimek'].'</td><td>'.$row['email'].'</td><td>'.$row['tel_stevilka'].'</td></tr>';
  		}
  	?>
  </table>
</div> 
</body>
</html>
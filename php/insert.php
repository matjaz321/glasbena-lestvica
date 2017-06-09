<?php
	include_once 'connection-info.php';

	if(isset($_POST['new_artist'])) {
		$query = "INSERT INTO izvajalci (ime, priimek, opis, let_rojstva) VALUES ('".$_POST['artist_name']."', '".$_POST['last_name']."', '".$_POST['description']."', '".$_POST['artist_year_birth']."')";
		$result = mysqli_query($conn, $query);
		if($result){
			header("Location: admin_website.php");
			echo '<div>Successfully inserted into database</div>';
		}else {
			echo '<script>alert("Error!")</script>';
		}
	}

	else if(isset($_POST['new_song'])){
		$query = "INSERT INTO glasbe (naslov, dolzina, opis, izvajalec_id, ocena_poz, ocena_neg) VALUES ('".$_POST['title']."','".$_POST['length']."', '".$_POST['description']."', '".$_POST['izvajalec']."', ' ', ' ')";
		$result = mysqli_query($conn, $query);
		
		$glasba_id = "SELECT id FROM glasbe ORDER BY id DESC LIMIT 1";
		$result2 = mysqli_query($conn, $glasba_id);
		$row = mysqli_fetch_array($result2);

		$query2 = "INSERT INTO glasba_zvrsti (zvrst_id, glasba_id) VALUES ('".$_POST['zvrst']."', '".$row['id']."')";
		mysqli_query($conn, $query2); 

		if($result){
			header("Location: admin_website.php");
			echo '<div>Successfully inserted into database</div>';
		}else {
			echo '<script>alert("Error!")</script>';
		}
	}

	else if(isset($_POST['new_music_category'])) {
		$query = "INSERT INTO zvrsti (ime, opis) VALUES ('".$_POST['category']."', '".$_POST['description']."')";
		$result = mysqli_query($conn, $query);
		if($result){
			header("Location: admin_website.php");
			echo '<div>Successfully inserted into database</div>';
		}else {
			echo '<script>alert("Error!")</script>';
		}
	}
?>
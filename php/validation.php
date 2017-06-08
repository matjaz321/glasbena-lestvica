<?php
	include_once 'connection-info.php';
	session_start();

	if (isset($_POST['register_submit'])) {
		$username = $_POST['username'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$tel_number = $_POST['tel_number'];
		$password = $_POST['password'];
		$repeated_password = $_POST['repeated_password'];
		$email = $_POST['email'];

		if($password == $repeated_password) {
			$query = "SELECT * FROM uporabniki WHERE username='$username'";
			$result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result) > 0) {
				echo '<script> alert("Username already exists... Try another username") </script>';
				header("Location: login.php");
			}
			else {
				$password = md5($password);
				$query = "INSERT INTO uporabniki (username, ime, priimek, email, tel_stevilka, geslo) VALUES ('$username', '$first_name', '$last_name', '$email', '$tel_number', '$password')";
				$result = mysqli_query($conn, $query);

				if($result){
					$_SESSION['user'] = $username;
					$query = "SELECT id FROM uporabniki WHERE ime = '$username'";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_row($result);
					$_SESSION['user_id'] = $row[0];
					header("Location: ../index.php");
				}else{
					echo '<script> alert("Something went wrong try again...") </script>';
					header("Location: login.php");
				}
			}
		}
	}
	else if(isset($_POST['login_submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT geslo, admin, id FROM uporabniki WHERE username='$username'";
		$result = mysqli_query($conn, $query);
		
		$row = mysqli_fetch_row($result);
		
		if(md5($password) == $row[0]){
			echo "Login successfull";
			$_SESSION['user'] = $username;
			$_SESSION['user_admin'] = $row[1];
			$_SESSION['user_id'] = $row[2];
			header("Location: ../index.php");
		}else {
			header("Location: login.php");
			echo '<script> alert("Username or password is incorrect! Try again!") </script>';
		}
	}
	else if(isset($_POST['submit_vote'])) {
		$query = "INSERT INTO ocene (uporabnik_id, glasba_id, vrednost) VALUES ('".$_SESSION['user_id']."', '".$_POST['glasba_id']."', '".$_POST['vote']."')";
		$result = mysqli_query($conn, $query);
		if($result){
			header("Location: music_chart.php");
			echo '<script> alert("Thank you for voting!");</script>';
		}

		$query = "SELECT * FROM glasbe";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)){
			$query2 = "SELECT COUNT(vrednost) FROM ocene WHERE glasba_id='".$row['id']."' AND vrednost=1";
			$result2 = mysqli_query($conn, $query2);
			while($row2 = mysqli_fetch_array($result2)){
				$query3 = "UPDATE glasbe SET ocena_poz='".$row2[0]."' WHERE id='".$row['id']."'";
				$result3 = mysqli_query($conn, $query3);
			}

			$query4 = "SELECT COUNT(vrednost) FROM ocene WHERE glasba_id='".$row['id']."' AND vrednost=-1";
			$result4 = mysqli_query($conn, $query4);
			while($row3 = mysqli_fetch_array($result4)){
				$query5 = "UPDATE glasbe SET ocena_neg='".$row3[0]."' WHERE id='".$row['id']."'";
				$result5 = mysqli_query($conn, $query5);
			}
		}
	}
?>
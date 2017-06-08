<?php include '../index.php'; ?>

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
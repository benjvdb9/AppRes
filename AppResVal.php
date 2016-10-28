<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="AppResIn.css">
		<title>validation des reservations</title>
	</head>
	
	<body>
		<b><h1>VALIDATION DES RESERVATIONS</h1></b><br /><br />
		
		<table>
			<tr>
				<th>Destination</th>
				<th>$_SESSION["reservation"]->GetDestination()</th>
			</tr>
			<tr>
				<th>Nombre de places</th>
				<th></th>
			</tr>
			<?php
			session_start();
			$_SESSION["reservation"]->SaveData2();
			$start= 0;
			$end= $_SESSION["reservation"]->GetSeats();
			while ($start != $end){
				echo '<tr>
					<th>Nom</th>
					<th>$_SESSION["reservation"]->GetNames()[$start]</th>
				</tr>
				<tr>
					<th>Age</th>
					<th></th>
				</tr>';
				$start++;
			}
			?>
			<tr>
				<th>Assurance annulation</th>
				<th></th>
			</tr>
		</table>
	</body>
</html>
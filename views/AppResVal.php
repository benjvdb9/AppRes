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
				<th><?php print($_SESSION['reservation']->GetDestination()) ?></th>
			</tr>
			<tr>
				<th>Nombre de places</th>
				<th><?php print($_SESSION['reservation']->GetSeats()) ?></th>
			</tr>
			<?php
			$start= 0;
			$end= $_SESSION['reservation']->GetSeats();
			$arr= $_SESSION['reservation']->GetNames();
			$arr2= $_SESSION['reservation']->GetAges();
			while ($start != $end){
				echo '<tr>
					<th>Nom</th>
					<th>'.$arr[$start].'</th>
				</tr>
				<tr>
					<th>Age</th>
					<th>'.$arr2[$start].'</th>
				</tr>';
				$start++;
			}
			?>
			<tr>
				<th>Assurance annulation</th>
				<th><?php print($_SESSION['reservation']->GetWarranty()) ?></th>
			</tr>
		</table>
		
		<form method="post">
			<button type="submit" name="Page" value="3">Etape suivante</button>
			<button type="submit" name="Page" value="1">Retour à la page précédente</button>
		</form>
	</body>
</html>
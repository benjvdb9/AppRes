﻿<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="AppResIn.css">
		<title>Detail des reservations</title>
	</head>
	
	<body>
		<b><h1>DETAIL DES RESERVATIONS</h1></b><br /><br />
		<form method="post" name="ResDet">
			<table>
				<tr>
					<th><br/></th>
					<th></th>
				</tr>
				<?php
				$count= $_SESSION['reservation']->getSeats();
				while($count > 0){
					echo '
					<tr>
						<th>Nom</th>
						<th><input type="text" name= nom[]/></th>
					</tr>
					<tr>
						<th>Age</th>
						<th><input type="text" name= age[]/></th>
					</tr>
					<tr>
						<th><br /></th>
						<th></th>
					</tr>';
					$count = $count - 1;
					}
				?>
			</table>
			<br />
			<button type="submit" name="Page" value="2">Etape suivante</button>
			<button type="submit" name="Page" value="0">Retour à la page précédente</button>
			<input type="submit" name="Reset" value="Annuler la réservation" value="1"/>
		</form>
	</body>
</html>
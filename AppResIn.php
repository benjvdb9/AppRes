<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="AppResIn.css">
		<title>Reservation</title>
	</head>
	
	<body>
		<b><h1>RESERVATION</h1></b><br /><br />
		Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.<br />
		Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.<br /><br />
		
		<form method="post" action="AppResDet.php">
			<table>
				<tr>
					<th>Destination</th>
					<th><input type="text" name="destination" /></th>
				</tr>
				<tr>
					<th>Nombre de places</th>
					<th><input type="text" name="seats" /></th>
				</tr>
				<tr>
					<th>Assurance annulation</th>
					<th><input type="checkbox" name="warranty" /></th>
				</tr>
			</table><br />
			<input type="submit" value="Etape suivante" />
			<input type="reset" value="Annuler la réservation" />
		</form>
	</body>
</html>
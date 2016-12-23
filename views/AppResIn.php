<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="./views/AppResIn.css" />
		<title>Reservation</title>
	</head>
	
	<body>
		<div id="Admin">
			<div id="form">
				<form method="post">
					<input type="password" name="psw" placeholder="Admin" /><br />
					<button type="submit" name="Page" value="5">modifier réservations</button>
				</form>
			</div>
			<b><h1>RESERVATION</h1></b><br /><br />
		</div>
		
		Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros.<br />
		Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.<br /><br />
		
		<?php 
		$dest= str_replace("'", "&#39;", $_SESSION['reservation']->getDestination());
		$seat= $_SESSION['reservation']->getSeats();
		$warr= $_SESSION['reservation']->getWarranty();
		?>
		<form method="post">
			<table>
				<tr>
					<th>Destination</th>
					<th><input type="text" name="destination" value='<?php echo $dest; ?>' /></th>
				</tr>
				<tr>
					<th>Nombre de places</th>
					<th><input type="text" name="seats" value='<?php echo $seat; ?>' /></th>
				</tr>
				<tr>
					<th>Assurance annulation</th>
					<th><input type="checkbox" name="warranty" <?php if($warr == 'OUI') echo 'checked'; ?> /></th>
				</tr>
			</table><br />
			<button type="submit" name="Page" value="1">Etape suivante</button>
			<input type="submit" name="Reset" value="Annuler la réservation" value="1"/>
		</form>
	</body>
</html>
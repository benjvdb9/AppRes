<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="AppResIn.css">
		<title>Detail des reservations</title>
	</head>
	
	<body>
		<b><h1>DETAIL DES RESERVATIONS</h1></b><br /><br />
		<form method="post" name="ResDet" action="AppResVal.php">
			<table>
				<tr>
					<th><br/></th>
					<th></th>
				</tr>
				<?php
				while($count > 0){
				echo '
				<tr>
					<th>Nom</th>
					<th><input type="text" name= nom[]/></th>
				</tr>
				<tr>
					<th>Age</th>
					<th><input type="text" /></th>
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
			<input type="submit" value="Etape suivante" />
			<input type="button" value="Retour à la page précédente" onclick="javascript:history.back();" />
			<input type="button" value="Annuler la réservation" onclick=ResetReservation() />
		</form>
	</body>
</html>
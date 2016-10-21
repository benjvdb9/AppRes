<html>
	<head>
		<link rel="stylesheet" href="AppResIn.css">
		<title>Detail des reservations</title>
	</head>
	
	<body>
		<b><h1>DETAIL DES RESERVATIONS</h1></b><br /><br />
		<form method="post" name="ResDet">
			<table>
				<?php
					$count = $_POST["seats"];
					while($count > 0){
				?>
				<tr>
					<th>Nom</th>
					<th><input type="text" /></th>
				</tr>
				<tr>
					<th>Age</th>
					<th><input type="text" /></th>
				</tr>
				<?php
					$count -= 1;
				}
				?>
			</table>
			<br />
			<input type="submit" value="Etape suivante" />
			<input type="button" value="Retour à la page précédente" />
			<input type="button" value="Annuler la réservation" />
		</form>
	</body>
</html>
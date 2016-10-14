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
					echo <tr>
						echo <th>Nom</th>
						echo <th><input type="text" /></th>
					echo </tr>
					echo <tr>
						echo <th>Age</th>
						echo <th><input type="text" /></th>
					echo</tr>
				?>
				<input type="submit" value="Etape suivante" />
				<input type="button" value="Retour à la page précédente" />
				<input type="button" value="Annuler la réservation" />
				</table>
		</form>
	</body>
</html>
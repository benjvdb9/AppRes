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
				<input type="button" value="Retour � la page pr�c�dente" />
				<input type="button" value="Annuler la r�servation" />
				</table>
		</form>
	</body>
</html>
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
				echo 'test';
				session_start();
				$_SESSION["destination"] = $_POST["destination"];
				$_SESSION["seats"] = $_POST["seats"];
				$_SESSION["warranty"] = $_POST["warranty"]
				$count = $_SESSION["seats"];
				?>
				<tr>
					<th>Nom</th>
					<th><input type="text" /></th>
				</tr>
				<tr>
					<th>Age</th>
					<th><input type="text" /></th>
				</tr>
			</table>
			<br />
			<input type="submit" value="Etape suivante" />
			<input type="button" value="Retour à la page précédente" onclick="parent.location='AppResIn.php'"/>
			<input type="button" value="Annuler la réservation" />
		</form>
	</body>
</html>
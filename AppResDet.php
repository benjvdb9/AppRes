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
				session_start();
				$_SESSION["destination"] = $_POST["destination"];
				$_SESSION["seats"] = $_POST["seats"];
				$_SESSION["warranty"] = $_POST["warranty"];
				$count = 5;
				while($count > 0){
				echo '<tr>
					<th>Nom</th>
					<th><input type="text" name= nom[]/></th>
				</tr>
				<tr>
					<th>Age</th>
					<th><input type="text" /></th>
				</tr>';
					$count = $count - 1;
					}
				?>
			</table>
			<br />
			<input type="submit" value="Etape suivante" />
			<input type="button" value="Retour à la page précédente" onclick="parent.location='AppResIn.php'"/>
			<input type="button" value="Annuler la réservation" />
		</form>
	</body>
</html>
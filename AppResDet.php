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
				$count = $_SESSION["seats"];
				while($count > 0){
				echo '<tr>    /*utiliser isset pour verifier si il y a des résultats avant de passer à la page suivante*/
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
			<input type="submit" value="Retour à la page précédente" href="#null" onclick="javascript:history.back();"/>
			<input type="button" value="Annuler la réservation" onclick="parent.location='AppResIn.php'/>
		</form>
	</body>
</html>
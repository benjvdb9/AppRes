<html>
	<?php
	session_start();
	include 'ResClass.php';
	$_SESSION["reservation"] = new ResClass;
	$_SESSION["reservation"]->SaveData1();
	
	function ResetReservation(){
		echo TEST
		$_SESSION["reservation"]->ResetData();
		$URL= 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'].'/../AppResIn';
		header("Location: echo $URL];");
		exit();
	}
	?>

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
				$count = $_SESSION["reservation"]->GetSeats();
				/*$_SESSION["destination"] = $_POST["destination"];
				$_SESSION["seats"] = $_POST["seats"];
				$_SESSION["warranty"] = $_POST["warranty"];
				$count = $_SESSION["seats"];*/  /*utiliser isset pour verifier si il y a des résultats avant de passer à la page suivante*/
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
			<input type="button" value="Annuler la réservation" onclick="ResetReservation()" />
		</form>
	</body>
</html>
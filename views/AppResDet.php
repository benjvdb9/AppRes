<html>
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
				$count= $this->model->getSeats();
				while($count > 0){
					echo '
					<tr>
						<th>Nom</th>
						<th><input type="text" name= nom[]/></th>
					</tr>
					<tr>
						<th>Age</th>
						<th><input type="text" name= age[]/></th>
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
			<button type="submit" name="Page" value="2">Etape suivante</button>
			<input type="button" value="Retour à la page précédente" onclick="javascript:history.back();" />
			<input type="button" value="Annuler la réservation" onclick="$this->controller->ResetRes()" />
		</form>
	</body>
</html>
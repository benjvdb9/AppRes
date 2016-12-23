<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="./views/AppResIn.css">
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
				$i =0;
				$count= $_SESSION['reservation']->getSeats();
				while($i < $count){
					$test = $_SESSION['reservation']->getNames();
					if (!isset($test[$i]))
					{
						$name= '';
						$age=  "";
					}
					else
					{
						$name = htmlspecialchars($_SESSION['reservation']->getNames()[$i]);
						$age = htmlspecialchars($_SESSION['reservation']->getAges()[$i]);
						
						var_dump($name);
					}

					echo '
					<tr>
						<th>Nom</th>
						<th><input type="text" name= nom[] value="'.$name.'"></th>
					</tr>
					<tr>
						<th>Age</th>
						<th><input type="text" name= age[] value="'.$age.'"></th>
					</tr>
					<tr>
						<th><br /></th>
						<th></th>
					</tr>';
					$i ++;
					}
				?>
			</table>
			<br />
			<button type="submit" name="Page" value="2">Etape suivante</button>
			<button type="submit" name="Page" value="0">Retour à la page précédente</button>
			<input type="submit" name="Reset" value="Annuler la réservation" value="1"/>
		</form>
	</body>
</html>
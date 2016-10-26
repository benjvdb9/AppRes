<html>
	<head>
		<link rel="stylesheet" href="AppResIn.css">
		<title>validation des reservations</title>
	</head>
	
	<body>
		<?php include 'ResClass.php'; ?>
		<b><h1>VALIDATION DES RESERVATIONS</h1></b><br /><br />
		
		<table>
			<tr>
				<th>Destination</th>
				<th></th> 
			</tr>
			<tr>
				<th>Nombre de places</th>
				<th></th>
			</tr>
			<?php
			session_start(); 
			$count= $_SESSION["seats"];
			while ($count > 0){
				echo '<tr>
					<th>Nom</th>
					<th></th>
				</tr>
				<tr>
					<th>Age</th>
					<th></th>
				</tr>';
				$count--;
			}
			<tr>
				<th>Assurance annulation</th>
				<th></th>
			</tr>
		</table>
	</body>
</html>
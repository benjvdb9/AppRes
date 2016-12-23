<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="./views/AppResIn.css" />
		<title>Edit</title>
	</head>
	
	<body>
		<b><h1>Modification de réservation N°<?php echo "$this->controller->ID" ?></h1></b><br /><br />
		<?php
		$dest = $_SESSION['reservation']->getDestination();
		$seat = $_SESSION['reservation']->getSeats();
		$warr = $_SESSION['reservation']->getWarranty();
		$names= $_SESSION['reservation']->getNames();
		$ages = $_SESSION['reservation']->getAges();
		?>
		<form method="post">
			<tr>
				<th>Destination</th>
				<th><input type="text" name="dest" value="<?php echo $dest ?>"></th>
			</tr>
			<tr>
				<th>Seats</th>
				<th><input type="text" name="seat" value="<?php echo $seat ?>"></th>
			</tr>
			<tr>
				<th>Warranty</th>
				<th><input type="text" name="warr" value="<?php echo $warr ?>"></th>
			</tr>
			
			<?php
			$i=0;
			foreach ($names as $name) {
				<tr>
					<th>Name</th>
					<th><input type="text" name="name" value="<?php echo $name ?>"></th>
				</tr>
				<tr>
					<th>Age</th>
					<th><input type="text" name="age" value="<?php echo $ages[$i] ?>"></th>
				</tr>
			}
			?>
		</form>
	</body>
</html>
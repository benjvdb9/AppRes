<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="./views/AppResIn.css">
		<title>Admin</title>	
	</head>
	
	<body>
		
		<table>
			<tr>
				<th>ID</th>
				<th>Destination</th>
				<th>Seats</th>
				<th>Warranty</th>
				<th>Names/Ages</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<tr>
				<td><br /></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		<?php
		$query = "SELECT * FROM AppResDB";
		$results = $this->controller->mysqli->query($query) or die("Query failed1");
		
		$i=0;
		foreach ($results as $elem) {
			$ID   = $elem['ID'];
			$dest = $elem['Destination'];
			$seat = $elem['Seats'];
			$warr = $elem['Warranty'];
			
			$sql2 = "SELECT * FROM People WHERE ID=$ID";
			$results2 = $this->controller->mysqli->query($sql2) or die("Query failed2");
			
			$info= '';
			foreach ($results2 as $elm) {
				$info .= $elm['Name'] . ':         ';
				$info .= $elm['Age']  . '<br />';
			}
			$results2->close();
			
			echo	"<tr>
						<td>$ID</td>
						<td>$dest</td>
						<td>$seat</td>
						<td>$warr</td>
						<td>$info</td>
						<form method='post'>
							<td><button type='submit' name='edit' value='$ID'>Edit</button></td>
							<td><button type='submit' name='del' value='$ID'>Delete</button></td>
						</form>
					</tr>
					<tr>
						<td><br /></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>";
		}
		$results->close();
		?>
		</table>
	</body>
</html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="AppResIn.css" />
		<title>Confirmation</title>
	</head>
	
	<body>
		<b><h1>CONFIRMATION DES RESERVATIONS</h1></b><br /><br />
		Votre demande a bien été enregistrée.<br />
		Merci de bien vouloir verser la somme de <?php echo $this->controller->CalcPrice(); ?> euros sur le compte 000-000000-00.<br /><br />
		
		<form method="post">
			<button type="submit" name="Page" value="0">Retour à la page d'accueil</button>
		</form>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="../script/jquery.js"></script>
		<script type="text/javascript" src="../script/index.js"></script>
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="../css/index.css">
		<title>EpicHope - Inscription</title>
		<meta charset="utf-8">
	</head>
	<body>
<!-- BDD Connecting Process -->
		<?php
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=epichope', 'root', 'Rabbit');
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
		?>
<!-- END -->
		<form action="sign.php" method="POST">
			Nom d'utilisateur :
			<input type="text" name="signlogin" placeholder="(50 Caractères Max)">
			Mot de Passe :
			<input type="password" name="signpass" placeholder="(50 Caractères Max)">
		 	Confirmation du	Mot de Pass :
			<input type="password" name="signpassval" placeholder="Vérification">
			<input type="submit" value="S'enregistrer">
		</form>
		<?php
			if (isset($_POST['signlogin']) && isset($_POST['signpass']) && isset($_POST['signpassval']) && $_POST['signpass'] == $_POST['signpassval'])
			{
				$value1 = $_POST['signlogin'];
				$value2 = $_POST['signpass'];
				$value3 = "000.png";
				
				$exist = $bdd->query("SELECT * FROM user WHERE login ='".$value1."'");
				$excheck = $exist->fetch();

				if ($excheck['login'] != NULL)
				{
					header("Location: ./sign.php");
				}

				else
				{
					$signreq = $bdd->prepare("INSERT INTO user (login, pass, propic) VALUES (?, ?, ?)");
					$signreq->bindParam(1, $value1);
					$signreq->bindParam(2, $value2);
					$signreq->bindParam(3, $value3);
					$signreq->execute();

					session_start();
					$_SESSION['login'] = $value1;
					$_SESSION['pass'] = $value2;
					$_SESSION['propic'] = $value3;
					$_SESSION['logged'] = true;
					header("Location: ../index.php");
				}
			}
		?>
	</body>
</html>

<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="../script/jquery.js"></script>
		<script type="text/javascript" src="../script/index.js"></script>
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.css">
		<link type="text/css" rel="stylesheet" href="../css/index.css">
		<title>EpicHope - Accueil</title>
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
		<?php session_start(); ?>
		<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true): ?>
			<img src="../img/<?php echo $_SESSION['propic'];?>">
			<h3>Salut <?php echo $_SESSION['login'];?></h3>
			<a href="./function/logout.php">Se déconnecter</a>

		<?php else: ?>
			<form action="./function/connect.php" method="POST">
				<input type="text" name="login" placeholder="Nom d'utilisateur">
				<input type="password" name="pass" placeholder="Mot de passe">
				<input type="submit" value="Se connecter">
				<a href="./function/sign.php">S'enregistrer</a>
			</form>

		<?php endif; ?>
	</body>
</html>

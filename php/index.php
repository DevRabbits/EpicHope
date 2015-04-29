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

		<div class="imgpres col-md-offset-1 col-md-10">
			<img src="../img/back.png">
		</div>
		<div class="epicnav col-md-offset-1 col-md-10">
			<div class="navpart"><h3>Accueil</h3></div>
			<div class="navpart"><h3>Carte</h3></div>
			<div class="navpart"><h3>Boutique</h3></div>
			<div class="navpart"><h3>Forum</h3></div>
			<div class="navpart"><h3>Contact</h3></div>
			<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true): ?>
			<div class="navpart"><a href="./function/logout.php"><h3>Se déconnecter</h3></a></div>
			<?php endif; ?>
		</div>
		<div class="main col-md-offset-1 col-md-10">
			<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true): ?>
				<div class="procard col-md-offset-1 col-md-5">
					<img src="../img/<?php echo $_SESSION['propic'];?>">
					<h2><strong><?php echo $_SESSION['login'];?></strong></h2><br></br>
				</div>
				<div class="rescard col-md-5">
					<p>Ressources disponibles</p>
				</div>
			<?php else: ?>
				<div class="connectform">
					<form action="./function/connect.php" method="POST">
						<input type="text" name="login" placeholder="Nom d'utilisateur"><br></br>
						<input type="password" name="pass" placeholder="Mot de passe"><br></br>
						<input type="submit" value="Se connecter"><br></br>
						<a href="./function/sign.php">S'enregistrer</a>
					</form>
				</div>
			<?php endif; ?>
		</div>
		<div class="emptydiv col-md-12"></div>
	</body>
</html>

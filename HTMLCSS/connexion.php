<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GrindHouseLeather</title>
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/entypo.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" media="screen" href="assets/css/entypo.css" />
</head>

<body>

<!-- Header Début -->
<div id="header">
	<a href="index.php"><img src="assets/images/ghl_titre.png"></a>
	<div id="panier_barre" data-icon="p"></div>
	<div id="connexion_barre"><a href="connexion.php">Voir ou Créer un compte</a></div>
</div>
<!-- Header Début -->

<!-- Conteneur principal Début -->
<div class="container">
	<div class="nav">
		<div id="nav_logo">
			<a href="index.php"><img src="assets/images/ghl_logo.png"></a>
		</div>
		<ul id="nav">
			<li>
				<a href="catalogue.php?&type_p=2">Femme</a>
			</li>
			<li>
				<a href="catalogue.php?&type_p=2">Homme</a>
			</li>
			<li>
				<a href="catalogue.php?&type_p=2">Voyage</a>
			</li>
		</ul>
	</div>


	<!-- Demi-colonnes Début -->
	<div class="container_inscription">
		<div id="container_titre_inscription">
			<p id="titre_inscription">Inscription</p>
		</div>
		<form class="inscription_form">
			<p><label for="identifiant">Adresse email :</label></p>
			<p><input type="email" name="email" class="inscription_form_champs" value=""/></p><br/>
		</form>
		<div class="inscription_bouton"><a href="inscription.php">Créez votre compte</a></div>
	</div>
	<div class="container_inscription">
		<div id="container_titre_inscription">
			<p id="titre_inscription">Connexion</p>
		</div>
		<form class="inscription_form">
			<p><label for="email">Adresse email :</label></p>
			<p><input type="email" name="email" class="inscription_form_champs" value=""/></p><br/>
			<p><label for="password">Mot de passe :</label></p>
			<p><input type="password" name="password" class="inscription_form_champs" value=""/></p><br/>
		</form>
		<div class="inscription_bouton"><a href="connexion.php">Connectez-vous</a></div>
		<div class="inscription_bouton"><a href="connexion.php">Mot-de-passe oublié ?</a></div>
	</div>
	<!-- Demi-colonnes Fin -->

</div>
<!-- Conteneur principal Fin -->


<div class="clear"></div>

<!-- Footer Début -->
<div class="footer">
	<div class="footer_text">
		© 2013 GrindHouse Leather - 
		Conditions générales - 
		Nous contacter
	</div>
</div>
<!-- Footer Fin-->


</body>
</html>
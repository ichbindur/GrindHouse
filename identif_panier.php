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

<!-- Panier Début -->

	<div class="container_panier">
		<div class="container_panier_contraste">
			<div id="nav_panier">
				<ul>
					<li><a href="panier.php">1 Résumé</a></li>
					<li id="nav_panier_encours">2 Identifiez-vous</li>
					<li>3 Adresse</li>
					<li>4 Frais de port</li>
					<li>5 Paiement</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Demi-colonnes Début -->
	<div class="container_inscription">
		<div id="container_titre_inscription">
			<p id="titre_inscription">Inscription</p>
		</div>
		<form class="inscription_form" name="bernardo" action="inscription.php" method="POST">
			<p><label for="identifiant">Adresse email :</label></p>
			<p><input type="email" name="email" class="inscription_form_champs"/></p><br/>
                        <div class="inscription_bouton"><a href="#" onclick="document.forms['bernardo'].submit();">Créez votre compte</a></div>
		</form>
		
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


	<div class="clear"></div>

<!-- Panier Fin -->

<!-- Retour shopping & Continuer -->
<div>&nbsp</div>
<a href="index.php"><input class="retour_shopping" type="submit" value="Retour au shopping"/></a>
<a href="adresse_panier.php"><input class="btn_continuer" type="submit" value="Continuer"/></a>

<div class="clear"></div>

</div>
<!-- Conteneur principal Fin -->


<div class="clear"></div>

<!-- Footer Début -->
<div class="footer">
	<div class="footer_text">
		© 2013 GrindHouse Leather - 
		Conditions générales - 
		<a href="contact.php">Nous contacter</a>
	</div>
</div>
<!-- Footer Fin-->


</body>
</html>
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
					<li><a href="identif_panier.php">2 Identifiez-vous</a></li>
					<li><a href="adresse_panier.php">3 Adresse</a></li>
					<li id="nav_panier_encours">4 Frais de port</li>
					<li>5 Paiement</li>
				</ul>
			</div>
		</div>
		<div>&nbsp</div>
		<div class="container_panier_contraste text_center">Sélectionnez un mode de livraison :</div>
		<div class="container_adresse_panier left">
			<p class="container_panier_contraste">Adresse de livraison :</p>
			<div>&nbsp</div>
			<p>9 Lotissement Pietralba <br/>
			20214 Calenzana <br/>
			France <br/>
			Téléphone : 04.95.62.80.39 <br/>
			Email : lea.journiac@gmail.com!
			</p>
			<div>&nbsp</div>
		</div>
		<div>&nbsp</div>

		<div class="container_adresse_panier right livraison_panier">
			<div>&nbsp</div>
			<ul>
				<li>Livraison suivi :</li>
				<li>Express :</li>
				<li>Livraison point relais :</li>
			</ul>
			</p>
			<div>&nbsp</div>
		</div>
		<div class="clear"></div>
	</div>

	<div>&nbsp</div>

	<div id="totalttc_panier">
		<p>TOTAL TTC &nbsp&nbsp 0.00€</p>
	</div>
	<div class="clear"></div>

<!-- Panier Fin -->

<!-- Retour shopping & Continuer -->
<div>&nbsp</div>
<a href="index.php"><input class="retour_shopping" type="submit" value="Retour au shopping"/></a>
<a href="paiement_panier.php"><input class="btn_continuer" type="submit" value="Continuer"/></a>

<div class="clear"></div>

</div>
<!-- Conteneur principal Fin -->


<div class="clear"></div>

<!-- Footer Début -->
<div class="footer2">
	<div class="footer_text">
		© 2013 GrindHouse Leather - 
		Conditions générales - 
		<a href="contact.php">Nous contacter</a>
	</div>
</div>
<!-- Footer Fin-->


</body>
</html>
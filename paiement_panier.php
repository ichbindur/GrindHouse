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
					<li><a href="fraisp_panier.php">4 Frais de port</a></li>
					<li id="nav_panier_encours">5 Paiement</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container_panier">
		<div class="container_paiementcb_panier">
			<div class="container_panier_contraste text_center">Paiement par carte bancaire</div>
			<div>&nbsp</div>

			<form class="form_paiementcb_panier left" action="">
				<label for="nom">Nom du titulaire de la carte</label><br/>
				<input type="text" name="nom" /><br/>
				<label for="num">Numéro de la carte</label><br/>
				<input type="text" name="num" /><br/>
				<label for="crypto">Numéro de cryptogramme*</label><br/>
				<input type="text" name="crypto" maxlength="3"/><br/>
				<p id="crypto_paiementcb_panier">*Il est composé de 3 chiffres pour les cartes Bleues, Visa et Mastercard, et de 4 chiffres pour les American Express</p>
			<div>&nbsp</div>
			</form>

			<div id="img_cb"><img src="assets/images/cb.png" alt=""></div>
			<div>&nbsp</div>
			<form class="form_paiementcb_panier right" action="">
				<label for="dateexp">Date d'expiration</label><br/>
				<input type="date" max="2020-12-31" min="2013-10-28" name="dateexp">
			</form>
			<div class="clear"></div>
			<a href="#"><input class="btn_continuer" type="submit" value="Valider"/></a>
			<div class="clear"></div>
		</div>
	</div>

	<div class="container_panier">
		<div id="paypal_panier"><img src="assets/images/paypal.png" alt=""></div>
		<p>Paiement par PayPal</p>
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
<a href="#"><input class="btn_continuer" type="submit" value="Terminer"/></a>

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
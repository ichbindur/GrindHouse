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
		<table id="table_panier">
			<tr>
				<td width="6%">Supprimer</td>
				<td width="20%">Produits</td>
				<td width="20%">Description</td>
				<td width="6%">Dispo.</td>
				<td width="12%">Ref.</td>
				<td width="12%">Prix unitaire</td>
				<td width="4%">Qté</td>
				<td width="20%">Total</td>
			</tr>
			<tr>
				<td width="6%">X</td>
				<td width="20%"><img src="assets/images/sac.jpg"></td>
				<td width="20%">Sac très compliqué</td>
				<td width="6%"><img src="assets/images/checked.png"></td>
				<td width="12%">#0000</td>
				<td width="12%">1000€</td>
				<td width="4%">1</td>
				<td width="20%">1000€</td>
			</tr>
			<tr>
				<td width="6%">X</td>
				<td width="20%"><img src="assets/images/sac.jpg"></td>
				<td width="20%">Sac très compliqué</td>
				<td width="6%"><img src="assets/images/checked.png"></td>
				<td width="12%">#0000</td>
				<td width="12%">1000€</td>
				<td width="4%">1</td>
				<td width="20%">1000€</td>
			</tr>
		</table>
	</div>

	<div>&nbsp</div>

	<div class="container_panier">
		<ul id="total_panier">
			<li>Total panier</li>
			<li>1 article(s)</li>
			<li>0.00€</li>
		</ul>
	<div class="clear"></div>	
	</div>

	<div>&nbsp</div>

	<div class="container_panier">
		<div class="container_panier_contraste">
			<form id="form_promo_panier" action="">
				<label for="promo">Code promotionnel </label>
				<input type="text" name="promo"/>
				<input type="submit" value="OK" />
			</form>
		</div>
		<div>&nbsp</div>
		<div id="avantages_panier">
			<p>Avantages : //€</p>
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
<a href="#"><input class="btn_continuer" type="submit" value="Terminer"/></a>

<div class="clear"></div>

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
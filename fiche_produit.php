<?php
include 'class/Produit.php';
$id = $_GET['xd'];
$Produit = new Produit();
$Produit = $Produit->select($id);
 ?>

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

<!-- Fiche Produit Début -->

	<div class="container_fproduit">
		<div id="container_titre_fproduit">
			<p id="titre_fproduit"><?php echo $Produit['nom']; ?></p>
		</div>
		<div class="container_photo_produit">
			<img src="./Photo/<?php echo $Produit['dossier_photo']; ?>">
		</div>
		<div class="container_photo_produit">
			<div class="info_fproduit">
				<p id="marque_fproduit">Marque du produit</p>
				<p id="prix_fproduit">0.00€</p>
				<p id="ref_fproduit">#0000</p>
			</div>
			<div class="container_presentation_fproduit">
				<p id="presdesc_fproduit">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac hendrerit diam. Nullam ornare vulputate enim, quis facilisis ante posuere vitae. Nunc velit justo, egestas sit amet nulla euismod, condimentum pulvinar libero. </p>
				<label>
					<select id="select_fproduit" name="qt">
						<option selected>Choisir la quantité</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select>
				</label>
				<input id="bouton_submit_fproduit" type="submit" value="Ajouter au panier"/>
				<div class="clear"></div>
				<div class="container_description_fproduit">
					<p id="presdesc_fproduit">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac hendrerit diam.</p>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
<!-- Fiche Produit Fin -->
<!-- Retour shopping -->
<a href="index.php"><input class="retour_shopping" type="submit" value="Retour au shopping"/></a>

</div>
<!-- Conteneur principal Fin -->


<div class="clear"></div>

<!-- Footer Début -->
<div class="footer2">
	<div class="footer_text">
		© 2013 GrindHouse Leather - 
		Conditions générales - 
		Nous contacter
	</div>
</div>
<!-- Footer Fin-->


</body>
</html>
<?php include 'inscriptionUtilisateur.php'; ?>
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

<!-- Mon compte Début -->

	<div class="container_moncompte">
		<div class="container_panier_contraste">
			<div id="nav_panier">
				<h3 id="titre_moncompte">Mon Compte</h3>
			</div>
		</div>
		<div class="container_menu_moncompte">
			<ul id="menu_catalogue">
				<li>
					<a href="moncompte.php"><p style="margin-left: 2px;font-size: 18px;">Mon Compte</p></a>
				</li>
				<li>
					<a href="moncompte_informations.php"><p style="margin-left: 2px;font-size: 18px;">Informations</p></a>
						<ul>
							<li><a href="moncompte_modif.php">Modifications</a></li>
							<li><a href="moncompte_mdp.php">Mot-de-passe</a></li>
						</ul>
				</li>
				<li>
					<a href="moncompte_commandes.php"><p style="margin-left: 2px;font-size: 18px;">Mes commandes</p></a>
					<ul>
						<li><a href="moncompte_historique.php">Historique</a></li>
						<li><a href="moncompte_suivic.php">Suivi de commande</a></li>
					</ul>
				</li>
				<li>
					<a href="moncompte_remboursement.php"><p style="margin-left: 2px;font-size: 18px;">Remboursement</p></a>
				</li>
			</ul>
		</div>
		<div class="container_infos_moncompte">
			<div class="container_adresse_panier left">
					<p class="container_panier_contraste">Adresse de livraison :</p>
					<div>&nbsp</div>
					<p>9 Lotissement Pietralba <br/>
					20214 Calenzana <br/>
					France <br/>
					Téléphone : 04.95.62.80.39 <br/>
					Email : lea.journiac@gmail.com
					</p>
				<div>&nbsp</div>
			</div>
			<div class="container_historique_moncompte right">
					<p class="container_panier_contraste" style="text-align:center">Historique de commande :</p>
					<div>&nbsp</div>
					<p>#ID 21/10/2013 0.00€</p><br/>
					<p>#ID 21/10/2013 0.00€</p><br/>
					<p>#ID 21/10/2013 0.00€</p><br/>
					<p>#ID 21/10/2013 0.00€</p><br/>
			</div>
		</div>
		<div class="clear"></div>
		<a href="#"><img id="vp_pub_moncompte" src="assets/images/vp.jpg"></a>
		<div class="clear"></div>
	</div>

<!-- Mon compte Fin -->

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
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
				<a href="catalogue.php?&type_p=1">Homme</a>
			</li>
			<li>
				<a href="catalogue.php?&type_p=4">Voyage</a>
			</li>
		</ul>
	</div>

	<div id="slide">
		<a href="#"><img src="assets/images/slider.jpg"></a>
	</div>

	<div class="container_catalogue">
		<div class="container_menu_catalogue">
			<ul id="menu_catalogue">
				<li>
					<a href="#"><p style="margin-left: 2px;font-size: 18px;">Femme</p></a>
						<ul>
							<li><a href="#">Sacs cabat</a></li>
	                        <li><a href="#">Sacs besace</a></li>
	                        <li><a href="#">Sacs pochette</a></li>
	                        <li><a href="#">Sacs cartable</a></li>
	                        <li><a href="#">Sacs à dos</a></li>
	                        <li><a href="#">Sacs de sport</a></li>
	                        <li><a href="#">Porte-feuilles</a></li>
						</ul>
				</li>
				<li>
					<a href="#"><p style="margin-left: 2px;font-size: 18px;">Homme</p></a>
						<ul>
							<li><a href="#">Sacs besace</a></li>
							<li><a href="#">Sacs de sport</a></li>
	                        <li><a href="#">Sacs à dos</a></li>
	                        <li><a href="#">Porte-feuilles</a></li> 
						</ul>
				</li>
				<li>
					<a href="#"><p style="margin-left: 2px;font-size: 18px;">Voyage</p></a>
				</li>
			</ul>
		</div>
		<div class="search_catalogue">
			<input type="submit" value="Trier par prix" class="sort_by">
			<input type="submit" value="Trier par nouveautés" class="sort_by">
			<input type="text" name="recherche" class="recherche_catalogue" value="Recherche..."/>
			<input type="submit" value="OK"/>
			<div class="clear"></div>
		</div>
		<div class="catalogue">

                        <?php include 'ListeProduit.php';?>
		</div>
	</div>
</div>

<div class="clear"></div>

<div class="footer">
	<div class="footer_text">
		© 2013 GrindHouse Leather - 
		Conditions générales - 
		<a href="contact.php">Nous contacter</a>
	</div>
</div>



</body>
</html>
<?php 
/**************************************************/
//Zone de connexion
/**************************************************/
include './Class/Utilisateur.php';
if (isset($_POST['email']) && $_POST['email'] != ""){
    $user = new Utilisateur();
    try{
        $user->selectWMail($_POST['email']);
    }catch(Exception $e){
        echo '<script>alert("nom mais tu n existe pas!!");</script>';
    }
    if($user->mdp == MD5($_POST['password'])){
        echo '<script>alert("Connecté");</script>';
        $_SESSION['ID'] = $user->id_user;
        $_SESSION['Nom'] = $user->nom;
        $_SESSION['Statut'] = $user->is_admin;
        $_SESSION['Mail'] = $user->email;        
    }
}
//Fin de zone
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
				<a href="catalogue.php?&type_p=1">Homme</a>
			</li>
			<li>
				<a href="catalogue.php?&type_p=4">Voyage</a>
			</li>
		</ul>
	</div>

	<!-- Slider Début -->
	<div id="slide">
		<a href="#"><img src="assets/images/slider.jpg"></a>
	</div>
	<!-- Slider Fin -->

	<!-- Demi-colonnes Début -->
	<div class="demi_col">
		<div class="demi_col_titre">Femme</div>
		<div class="images"><img src="assets/images/sac.jpg"></div>
		<div>
		<p class="demi_col_tdescription">Sac sceau</p>
		<p class="demi_col_description">
			Description brève d'un sac en forme sceau, 100% cuir.
		</p>
		</div>

		<div class="demi_col_prix">100€</div>
		<div class="images"><img src="assets/images/sac.jpg"></div>
		<div class="demi_col_prix">10€</div>
	</div>
	<div class="demi_col">
		<div class="demi_col_titre">Homme</div>
		<div class="images"><img src="assets/images/sac.jpg"></div>
		<div class="demi_col_prix">1000€</div>
		<div class="images"><img src="assets/images/sac.jpg"></div>
		<div class="demi_col_prix">9999€</div>
	</div>
	<!-- Demi-colonnes Fin -->
</div>
<!-- Conteneur principal fin -->


<div class="clear"></div>


<!-- Footer Début -->
<div class="footer">
	<div class="footer_text">
		© 2013 GrindHouse Leather - 
		Conditions générales - 
		Nous contacter
	</div>
</div>
<!-- Footer Fin -->



</body>
</html>
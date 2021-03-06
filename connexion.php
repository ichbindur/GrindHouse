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

<?php
////////////////////////////////
     //AJOUT DU HEADER
////////////////////////////////
include 'header.php';?>

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
        die ('<script>alert("Cette email n\'existe pas !");</script>');
    }
    if($user->mdp == MD5($_POST['password'])){
        $_SESSION['ID'] = $user->id_user;
        $_SESSION['Nom'] = $user->nom;
        $_SESSION['Statut'] = $user->is_admin;
        $_SESSION['Mail'] = $user->email;
       // header('Location: index.php');
    }
}
//Fin de zone
?>

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
		<form class="inscription_form" method="POST" name="connexion">
                    <p><label for="email">Adresse email :</label></p>
                    <p><input type="email" name="email" class="inscription_form_champs" value=""/></p><br/>
                    <p><label for="password">Mot de passe :</label></p>
                    <p><input type="password" name="password" class="inscription_form_champs" value=""/></p><br/>
                    <div class="inscription_bouton"><input type="submit" value="Connectez vous" name="submit4" id="submit4"/></div>
                    <div class="inscription_bouton"><a href="connexion.php">Mot-de-passe oublié ?</a></div>
		</form>
	</div>
	<!-- Demi-colonnes Fin -->

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
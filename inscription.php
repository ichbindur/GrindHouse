<?php include 'inscriptionUtilisateur.php';
      include 'Commande2.php';
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

	<div class="" id="inscription_form_titre">
		<h1>Créez votre compte sur GrindHouse Leather</h1>
	</div>
	<div id="inscription_form">
		<form action="" method="POST" name="inscriptionUtilisateur">
                <p>
                    <input type="hidden" name="mail" value="<?php echo $_POST['email']; ?>"/>	
	            <label for="nom">Nom :</label>
	            <input type="text" name="nom" class="champs" value=""/>
	        </p>
	        <p>
	            <label for="prenom">Prénom :</label>
	            <input type="text" name="prenom" class="champs" value=""/>
            </p>
            <p>
	            <label for="password">Mot de passe :</label>
	            <input type="password" name="paswd" class="champs" value=""/>
            </p>
            <p>
	            <label for="password">Confirmation du mot de passe :</label>
	            <input type="password" name="paswdConfirm" class="champs" value="">
	        </p>
	        <p>
	            <label for="cp">Code postal :</label>
	            <input type="text" name="cp" class="champs" value="">
	        </p>
	        <p>
	            <label for="adresse">Adresse :</label>
	            <input type="text" name="adresse" class="champs" value="">
	        </p>
	        <p>
	            <label for="complement">Complément d'adresse :</label>
	            <input type="text" name="adresseComp" class="champs" value="">
	        </p>
	        <p>
	            <label for="ville">Ville :</label>
	            <input type="text" name="ville" class="champs" value="">
	        </p>
	        <p>
	            <label for="pays">Pays :</label>
	            <input type="text" name="pays" class="champs" value="">
	        </p>
	        <p>
	            <label for="tel">Numéro de téléphone :</label>
	            <input type="text" name="telephone" class="champs" value="">
	        </p>
	        <p id="inscription_form_submit"> 
                    <input type="submit" id="submit" name="submit" value="S'inscrire" onClick="checkInfo()"/>
                </p>
		</form>
	</div>

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
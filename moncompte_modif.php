<?php include ('./inscriptionUtilisateur.php');?>
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
        <!-- Conteneur principal Début -->  
        <div>
            <fieldset>
                <legend>Modification des informations</legend>
                <form method="POST">
                    nom<input type="text" id="modNom" name="modNom" value="<?php if(isset($user) && $user->nom != "") echo $user->nom; ?>"/>
                    prenom<input type="text" id="modPrenom" name="modPrenom" value="<?php if(isset($user) && $user->prenom != "") echo $user->prenom; ?>"/>
                    mail<input type="text" id="modMail" name="modMail" value="<?php if(isset($user) && $user->email != "") echo $user->email; ?>"/>
                    adresse<input type="text" id="modAdresse" name="modAdresse" value="<?php if(isset($user) && $user->adresse_postale != "") echo $user->adresse_postale; ?>"/>
                    compadresse<input type="text" id="modAdresseComp" name="modAdresseComp" value="<?php if(isset($user) && $user->complement_adresse != "") echo $user->complement_adresse; ?>"/>
                    ville<input type="text" id="modVille" name="modVille" value="<?php if(isset($user) && $user->ville != "") echo $user->ville; ?>"/>
                    cp<input type="text" id="modCp" name="modCp" value="<?php if(isset($user) && $user->cp != "") echo $user->cp; ?>"/>
                    pays<input type="text" id="modPays" name="modPays" value="<?php if(isset($user) && $user->pays != "") echo $user->pays; ?>"/>
                    telephone<input type="text" id="modTel" name="modTel" value="<?php if(isset($user) && $user->telephone != "") echo $user->telephone; ?>"/>
                    <input type="submit" name="submi3" id="submit3"/>
                </form>
            </fieldset>
        </div>
        <!-- Conteneur principal Fin -->
</div>


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
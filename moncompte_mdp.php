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
             <legend>Modification du mot de passe</legend>
             <form method="POST">
                 <label>Tapez votre ancien mot de passe : </label><input type="password" id="modMdpAncien" name="modMdpAncien"/>
                 <label>Tapez votre nouveau mot de passe : </label><input type="password" id="modMdp" name="modMdp"/>
                 <label>Retapez votre mot de passe : </label><input type="password" id="modMdpConf" name="modMdpConf"/>
                 <input type="submit" name="submit4" id="submit4"/>
             </form>
        </fieldset>
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
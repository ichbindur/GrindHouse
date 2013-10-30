<?php include("./Class/Utilisateur.php"); ?>
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
include 'header.php';
$modifUser = new Utilisateur();
$modifUser->select($_SESSION['ID']);
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
                <legend><h1>Modification des informations</h1></legend>
                <form method="POST">
                   <p>
                    <label>Nom :</label><input type="text" id="modNom" name="modNom" value="<?php if(isset($modifUser) && $modifUser->nom != "") echo $modifUser->nom; ?>"/>
                   </p>
                   <p>
                    <label>Prenom :</label><input type="text" id="modPrenom" name="modPrenom" value="<?php if(isset($modifUser) && $modifUser->prenom != "") echo $modifUser->prenom; ?>"/>
                   </p>
                   <p>
                    <label>Email :</label><input type="text" id="modMail" name="modMail" value="<?php if(isset($modifUser) && $modifUser->email != "") echo $modifUser->email; ?>"/>
                    </p>
                    <p>
                    <label>Adresse :</label><input type="text" id="modAdresse" name="modAdresse" value="<?php if(isset($modifUser) && $modifUser->adresse_postale != "") echo $modifUser->adresse_postale; ?>"/>
                   </p>
                   <p>
                    <label>Complément d'adresse :</label><input type="text" id="modAdresseComp" name="modAdresseComp" value="<?php if(isset($modifUser) && $modifUser->complement_adresse != "") echo $modifUser->complement_adresse; ?>"/>
                    </p>
                    <p>
                    <label>Ville :</label><input type="text" id="modVille" name="modVille" value="<?php if(isset($modifUser) && $modifUser->ville != "") echo $modifUser->ville; ?>"/>
                   </p>
                   <p>
                    <label>Code postale :</label><input type="text" id="modCp" name="modCp" value="<?php if(isset($modifUser) && $modifUser->cp != "") echo $modifUser->cp; ?>"/>
                   </p>
                   <p>
                    <label>Pays :</label><input type="text" id="modPays" name="modPays" value="<?php if(isset($modifUser) && $modifUser->pays != "") echo $modifUser->pays; ?>"/>
                    </p>
                    <p>
                    <label>Telephone :</label><input type="text" id="modTel" name="modTel" value="<?php if(isset($modifUser) && $modifUser->telephone != "") echo $modifUser->telephone; ?>"/>
                    </p>
                    <p>
                    <input type="submit" name="submi3" id="submit3"/>
                    </p>
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
<?php
/* * *********************************************** */
//Zone modification des infos information
/* * *********************************************** */

if (isset($_POST['modNom']) && $_POST['modNom'] != "") {
    if ($modifUser->nom != trim($_POST['modNom']))
        $modifUser->nom = trim($_POST['modNom']);
    if ($modifUser->prenom != trim($_POST['modPrenom']) && $_POST['modPrenom'] != "")
        $modifUser->prenom = trim($_POST['modPrenom']);
    if ($modifUser->email != trim($_POST['modMail']) && $_POST['modMail'] != "")
        $modifUser->email = trim($_POST['modMail']);
    if ($modifUser->adresse_postale != trim($_POST['modAdresse']) && $_POST['modAdresse'] != "")
        $modifUser->adresse_postale = trim($_POST['modAdresse']);
    if ($modifUser->complement_adresse != trim($_POST['modAdresseComp']) && $_POST['modAdresseComp'] != "")
        $modifUser->complement_adresse = trim($_POST['modAdresseComp']);
    if($modifUser->ville != trim($_POST['modVille']) && $_POST['modVille'] != "")
        $modifUser->ville = trim($_POST['modVille']);
    if($modifUser->cp != trim($_POST['modCp']) && $_POST['modCp'] != "")
        $modifUser->cp = trim($_POST['modCp']);
    if ($modifUser->pays != trim($_POST['modPays']) && $_POST['modPays'] != "")
        $modifUser->pays = trim($_POST['modPays']);
    if($modifUser->telephone != trim($_POST['modTel']) && $_POST['modTel'] != "")
        $modifUser->telephone = trim($_POST['modTel']);
    
    $modifUser->update($user->id_user);
}
//Fin de zone?>
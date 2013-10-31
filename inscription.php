<?php include 'inscriptionUtilisateur.php';
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

<?php
////////////////////////////////
     //AJOUT DU HEADER
////////////////////////////////
include 'header.php';?>
<script>
    function checkInfo() {
        var valide = true;
        if (document.getElementById("nom").value.length < 3) {
            document.getElementById("nom").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("nom").style.border = '';
        if (document.getElementById("prenom").value.length < 3) {
            document.getElementById("prenom").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("prenom").style.border = '';
        if (document.getElementById("mail").value == '') {
            document.getElementById("mail").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("mail").style.border = '';
        if (document.getElementById("paswd").value.length < 3 || document.getElementById("paswd").value !== document.getElementById("paswdConfirm").value) {
            document.getElementById("paswd").style.border = '2px solid red';
            document.getElementById("paswdConfirm").style.border = '2px solid red';
            valide = false;
        } else {
            document.getElementById("paswd").style.border = '';
            document.getElementById("paswdConfirm").style.border = '';
        }
        if (document.getElementById('adresse').value.length < 05) {
            document.getElementById("adresse").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("adresse").style.border = '';
        if (document.getElementById("cp").value.length < 5 || document.getElementById("cp").value.length > 5) {
            document.getElementById('cp').style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("cp").style.border = '';
        if (document.getElementById("pays").value.length < 3) {
            document.getElementById("pays").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("pays").style.border = '';
        if (valide) {
            document.forms["inscriptionUtilisateur"].submit();
        }
   }
</script>
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
            <input type="submit" name="submit" value="S'inscrire" onClick="checkInfo()" class="submit" />
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
		<a href="contact.php">Nous contacter</a>
	</div>
</div>
<!-- Footer Fin-->


</body>
</html>
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
	<div id="mode_admin">Mode Admin</div>
	<div class="clear"></div>
</div>
<!-- Header Début -->


<!-- Conteneur principal Début -->
<div class="container_bo">
	<img id="logo_bo" src="assets/images/ghl_logo.png">
	<div id="nav_bo">
		<img class="nav_bo" src="assets/images/bo_produit.png">
		<img class="nav_bo" src="assets/images/bo_client.png">
		<img class="nav_bo" src="assets/images/bo_transporteur.png">
	</div>
</div>
<!-- Conteneur principal fin -->





</body>
</html>
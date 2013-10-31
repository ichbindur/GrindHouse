<!-- Header Début -->
<?php         session_start(); ?>
<div id="header">
	<a href="index.php"><img src="assets/images/ghl_titre.png"></a>
        <a href='panier.php'><div id="panier_barre" data-icon="p"></div></a>
        <div id="connexion_barre">
            
            <?php if (isset($_SESSION['Nom'])&& $_SESSION['Nom'] !=''){?>
                    <a href="moncompte.php">
                <?php echo 'Bienvenue '.$_SESSION['Nom'] ;?>
                <form id="form_header" action="header.php" method="post">
                <input id="deconnexion" name="deconnexion" type="submit" value="Déconnexion" />
                </form>
                <?php if(isset($_POST['deconnexion'])){
                          session_destroy();
                          header ('Location: index.php');
                          }
                }else{?>
                <a href="connexion.php">Voir ou Créer un compte<?php } ?></a>
            
       </div>
</div>
<!-- Conteneur principal Début -->
<div class="container_bo">
	<div id="nav_bo">
		<a href="Produit_BackOffice.php" title="Gestion des produits"><img class="nav_bo" src="assets/images/bo_produit.png"></a>
		<a href="utilisateur_backoffice.php" title="Gestion des clients"><img class="nav_bo" src="assets/images/bo_client.png"></a>
		<a href="Transporteur_BackOffice.php" title="Gestion des transporteurs"><img class="nav_bo" src="assets/images/bo_transporteur.png"></a>
	</div>
</div>
<!-- Conteneur principal fin -->
<!-- Header Fin -->
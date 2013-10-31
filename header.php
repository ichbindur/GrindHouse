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
<!-- Header Fin -->

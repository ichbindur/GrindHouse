<?php if(session_id() == "")
     session_start(); ?>
<!-- Header Début -->
<div id="header">
	<a href="index.php"><img src="assets/images/ghl_titre.png"></a>
	<div id="panier_barre" data-icon="p"></div>
        <div id="connexion_barre"> 
            <?php if (!empty($_SESSION)&& isset($_SESSION['Non'])){?>
                    <a href="moncompte.php">
                <?php echo 'Bienvenue '.$_SESSION['Nom'] ; 
            }else{?>
                <a href="connexion.php">Voir ou Créer un compte<?php } ?></a></div>
</div>
<!-- Header Fin -->

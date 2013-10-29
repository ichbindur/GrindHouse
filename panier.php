<!doctype html>
<?php
session_start();
include 'Class/Produit.php';
 ?>
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
				<a href="catalogue.php?&type_p=2">Homme</a>
			</li>
			<li>
				<a href="catalogue.php?&type_p=2">Voyage</a>
			</li>
		</ul>
	</div>

<!-- Panier Début -->

	<div class="container_panier">
		<div class="container_panier_contraste">
			<div id="nav_panier">
				<ul>
					<li id="nav_panier_encours">1 Résumé</li>
					<li>2 Identifiez-vous</a></li>
					<li>3 Adresse</a></li>
					<li>4 Frais de port</li>
					<li>5 Paiement</li>
				</ul>
			</div>
		</div>
		<table id="table_panier">
                    <?php if(isset($_SESSION['Panier']) && $_SESSION['Panier'] != ''){
			echo '<tr>
				<td width="6%">Supprimer</td>
				<td width="20%">Produits</td>
				<td width="20%">Description</td>
				<td width="6%">Dispo.</td>
				<td width="12%">Ref.</td>
				<td width="12%">Prix unitaire</td>
				<td width="4%">Qté</td>
				<td width="20%">Total</td>
			</tr>';                        
                                $produit = new Produit();
                                $articleTotal =0;
                                $prixTotal = 0;
                                $prixAvantage = 0; 
                                foreach ($_SESSION['Panier'] as $item => $nb) {
                                    $produit->select($item);
                                    if($produit->stock > 0)
                                        $stock = '<img src="assets/images/checked.png">';
                                    else $stock = 'Indisponible';
                                    echo '<tr>
                                            <td width="6%">'. $produit->nom .'</td>
                                            <td width="20%"><img src="./Photo/'. $produit->dossier_photo .'"></td>
                                            <td width="20%">'. $produit->description .'</td>
                                            <td width="6%">'. $stock .'</td>
                                            <td width="12%">'. $produit->reference .'</td>
                                            <td width="12%">'. $produit->prix_ht*1.196 .'</td>
                                            <td width="4%">'. $nb .'</td>
                                            <td width="20%">'. $produit->prix_ht*1.196*$nb .'</td>
                                    </tr>';
                                    $articleTotal += $nb;
                                    $prixTotal += $produit->prix_ht*1.196*$nb;
                                }
                                //$produit->select($_SESSION[''])
                        }?>

<!--			<tr>
				<td width="6%">X</td>
				<td width="20%"><img src="assets/images/sac.jpg"></td>
				<td width="20%">Sac très compliqué</td>
				<td width="6%"><img src="assets/images/checked.png"></td>
				<td width="12%">#0000</td>
				<td width="12%">1000€</td>
				<td width="4%">1</td>
				<td width="20%">1000€</td>
			</tr>
			<tr>
				<td width="6%">X</td>
				<td width="20%"><img src="assets/images/sac.jpg"></td>
				<td width="20%">Sac très compliqué</td>
				<td width="6%"><img src="assets/images/checked.png"></td>
				<td width="12%">#0000</td>
				<td width="12%">1000€</td>
				<td width="4%">1</td>
				<td width="20%">1000€</td>
			</tr>-->
		</table>
	</div>

	<div>&nbsp</div>

	<div class="container_panier">
		<ul id="total_panier">
			<li>Total panier</li>
			<li><?php echo $articleTotal; ?> article(s)</li>
			<li><?php echo $prixTotal; ?>€</li>
		</ul>
	<div class="clear"></div>
	</div>

	<div>&nbsp</div>

	<div class="container_panier">
		<div class="container_panier_contraste">
			<form id="form_promo_panier" action="">
				<label for="promo">Code promotionnel </label>
				<input type="text" name="promo"/>
				<input type="submit" value="OK"/>
			</form>
		</div>
		<div>&nbsp</div>
		<div id="avantages_panier">
			<p>Avantages :<?php/********TODO : CALCULER L'AVANTAGE********/?> //€</p>
		</div>
		<div class="clear"></div>
	</div>

	<div>&nbsp</div>

	<div id="totalttc_panier">
		<p>TOTAL TTC &nbsp&nbsp <?php echo $prixTotal - $prixAvantage; ?>€</p>
	</div>
	<div class="clear"></div>
<!-- Panier Fin -->


<!-- Retour shopping & Continuer -->
<div>&nbsp</div>
<a href="index.php"><input class="retour_shopping" type="submit" value="Retour au shopping"/></a>
<a href="identif_panier.php"><input class="btn_continuer" type="submit" value="Continuer"/></a>

<div class="clear"></div>

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
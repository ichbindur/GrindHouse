<!doctype html>
<?php
include 'Class/Type.php';
include 'Class/Categorie.php';
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

<?php
////////////////////////////////
     //AJOUT DU HEADER
////////////////////////////////
include 'header.php';?>

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

	<div id="slide">
		<a href="#"><img src="assets/images/slider.jpg"></a>
	</div>

	<div class="container_catalogue">
		<div class="container_menu_catalogue">
			<ul id="menu_catalogue">
                            <?php
                            $type = new Type();
                            $categorie = new Categorie();
                            $menuType = $type->selectall();
                            $menuCat = $categorie->selectall();
                            for($i = 0; $i < count($menuType); $i++){
                                echo '<li>
					<a href="#"><p style="margin-left: 2px;font-size: 18px;">'. $menuType[$i]['nom'] .'</p></a>
						<ul>';
                                for($j = 0; $j < count($menuCat); $j++){
                                    if($menuCat[$j]['type_p'] == $menuType[$i]['id_type']){
                                        echo '<li><a href="./catalogue.php?type_p='.$menuCat[$j]['type_p'].'&cat='.$menuCat[$j]['id_categorie'].'">'. $menuCat[$j]['nom'] .'</a></li>';
                                    }
                                }
                                echo '</ul></li>';
                            }
                            
                            ?>
			</ul>
		</div>
		<div class="search_catalogue">
                    <form method="POST">
			<input type="submit" value="Trier par prix" class="sort_by" name="triprix">
			<input type="submit" value="Trier par nouveautés" class="sort_by" name="tridate">
			<input type="text" name="recherche" class="recherche_catalogue" value="Recherche..."/>
			<input type="submit" value="OK"/>
			<div class="clear"></div>
                    </form>
		</div>
		<div class="catalogue">
                        <?php include 'ListeProduit.php';?>
		</div>
	</div>
</div>

<div class="clear"></div>

<div class="footer">
	<div class="footer_text">
		© 2013 GrindHouse Leather - 
		Conditions générales -
		<a href="contact.php">Nous contacter</a>
	</div>
</div>

</body>
</html>

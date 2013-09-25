<?php
include ('./class/Produit.php');
$prod = new Produit();
//$prod->connexion();

if(isset($_POST['reference'], $_POST['nom'], $_POST['prix_ht'], $_POST['description'], $_POST['poids'], $_POST['dim_larg'], $_POST['dim_long'], $_POST['is_venteprivee'],
        $_POST['promo'], $_POST['promo_vp'], $_POST['stock'])){
    
    echo "Test";
    $prod = new Produit();
    $prod->setreference($_POST['reference']);
    $prod->setnom($_POST['nom']);
    $prod->setprix_ht($_POST['prix_ht']);
    $prod->setdescription($_POST['description']);
    $prod->setpoids($_POST['poids']);
    $prod->setdim_larg($_POST['dim_larg']);
    $prod->setdim_long($_POST['dim_long']);
    $prod->setis_venteprivee($_POST['is_venteprivee']);
    $prod->setpromotion($_POST['promo']);
    $prod->setpromotion_vp($_POST['promo_vp']);
    $prod->setstock($_POST['stock']);
    $prod->setdossier_photo($_POST['dossier_photo']);
    
    $prod->insert();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Back_Office</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <SCRIPT> 
            function dropAdd()
            {        
                var elements = document.getElementsByClassName('pg_notify');
                for (var i = 0; i < elements.length; i++)
                {
                    elements[i].style.display = 'none';
                }
            }
        </SCRIPT>
    </head>
    <body onLoad="dropAdd">
        <form id="form" method="POST" enctype="application/x-www-form-urlencoded">
            <div>	
		<label for="identifiant">Référence:</label>
                    <input type="text" id="reference" name="reference" value=""><br/>
            </div>
				
            <div>
		<label>Nom:</label>
		<input type="text" id="nom" name="nom" value=""><br/>
            </div>	
				
            <div>	
		<label>Prix HT:</label>
		<input type="text" id="prix_ht" name="prix_ht" value=""/>
            </div>
				
            <div>
		<label>Description:</label>
		<input type="text" id="description" name="description" value=""/>
            </div>
				
            <div>
		<label>Poids (gramme):</label>
		<input type="text" id="poids" name="poids" value=""/>
            </div>
				
            <div>
		<label>Vente privée:</label>
                    <span>
                        <input type="radio" name="is_venteprivee" value="1"/>Oui
			<input type="radio" name="is_venteprivee" value="0"/>Non
                    </span>                    
            </div>
				
            <div>
		<label>Promotion(%):</label>
                <input type="text" id="promo" name="promo"/>
            </div>
				
            <div>
		<label>Promotion vente privés:</label>
                <input type="text" id="promo_vp" name="promo_vp"/>
            </div>
            
            <div>
		<label>Nombres de produit en stock:</label>
                <input type="text" id="stock" name="stock"/>
            </div>
            
            <div>
		<label>Dimension largeur(cm):</label>
                <input type="text" id="dim_larg" name="dim_larg"/>
            </div>
            
            <div>
		<label>Dimension longueur(cm):</label>
                <input type="text" id="dim_long" name="dim_long"/>
            </div>            
            
            <div>
		<label>Dossier photo:</label>
                <input type="text" id="dossier_photo" name="dossier_photo"/>
            </div>
				
            <div id="button">
		<input type="submit" id="add" name="validation" value="Ajouter"/>
            </div>
	</form></br></br>
        <form id="form2" method="POST" enctype="application/x-www-form-urlencoded">
            <div>	
		<label for="identifiant">Liste des produits:</label>
                <?php
                    require_once "./phpGrid/conf.php";
                    $dg = new C_DataGrid('SELECT * FROM produit','id_produit','produit');
                    $dg->set_dimension(1500,600);
                    $dg->display();
                ?>
            </div>
        </form>
                            
    </body>
</html>
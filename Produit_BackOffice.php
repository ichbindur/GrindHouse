<html>
    <head>
        <title>Back_Office</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    </head>
    <body>
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
		<label>Poids:</label>
		<input type="text" id="poids" name="poids" value=""/>
            </div>
				
            <div>
		<label>Vente privée:</label>
                    <span>
                        <input type="radio" name="vente_prive"/>Oui
			<input type="radio" name="vente_prive"/>Non
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
		<input type="submit" id="bouton" name="soumission" value="Soumettre"/>
            </div>
	</form>
    </body>

<?php

if(isset($_POST['reference'], $_POST['nom'], $_POST['prix_ht'], $_POST['description'], $_POST['poids'], $_POST['dim_larg'], $_POST['dim_larg'], $_POST['dim_larg']))
{
    include Produit.php;
    $lol = new Produit();
    $lol->insert();
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

</html>
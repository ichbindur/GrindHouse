<html>
    <head>
        <title>Back_Office</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    </head>
    <body>
        <form id="form" enctype="application/x-www-form-urlencoded">
            <div>
                <label>Avoir:</label>
                <span>
                    <input type="radio" name="is_avoir"/>Oui
                    <input type="radio" name="is_avoir"/>Non
                </span>                    
            </div>
				
            <div>
                <label>Demande:</label>
                <input type="text" id="txt_demande" name="txt_demande"><br/>
            </div>	
				
            <div>	
                <label>Statut:</label>
                <input type="text" id="statut" name="statut"/>
            </div>
				
            <div>
                <label>Date du remboursement:</label>
                <input type="date" id="description" name="description"/>
            </div>
				
            <div>
                <label>Poids:</label>
                <input type="text" id="poids" name="poids"/>
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
</html>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

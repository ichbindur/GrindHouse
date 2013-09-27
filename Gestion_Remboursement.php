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
                <label>Client:</label>
                <input type="text" id="user" name="user"><br/>
            </div>	
				
            <div>	
                <label>Produit:</label>
                <input type="text" id="id_produit" name="id_produit"/>
            </div>
				
            <div>
                <label>Demande:</label>
                <textarea id="txt_demande" name="txt_demande"></textarea>
            </div>
				
            <div>
                <label>Statut:</label>
                <select>
                    <option>En attente</option>
                    <option>En cours</option>
                    <option>Refusé</option>
                    <option>Effectué</option>
                </select>
            </div>
            
            <div>
                <label>Date de remboursement:</label>
                <input type="date" id="date_remboursement" name="date_remboursement"/>
            </div>
            
            <!--DATE!!!!!!!!!!!!!!!!!!!!-->
               
				
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

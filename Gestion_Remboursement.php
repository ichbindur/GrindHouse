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
                <label>D:</label>
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

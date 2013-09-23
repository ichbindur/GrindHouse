<?php
if (isset($_POST['nom']))
    echo 'le cheval sautillant';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Page d'accueil de GrindHouse Leather</h1>
<form action="POST">
    <input type="text" id="nom" name="nom"/>
    <input type="text" id="prenom" name="prenom"/>
    <input type="submit" id="submit" name="submit"/>
</form>
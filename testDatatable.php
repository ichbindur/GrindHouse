<h1>Test de l'addon datatable</h1>

<?php
include './Class/Utilisateur.php';
require_once "./phpGrid/conf.php"; 

$dg = new C_DataGrid('SELECT * FROM produit','id_produit','produit');
$dg->display();
?>
<div id='produit'>
</div>
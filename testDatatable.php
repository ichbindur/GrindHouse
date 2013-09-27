<h1>Test de l'addon datatable</h1>
<SCRIPT> 
    function dropAdd(){        
        var elements = document.getElementsByClassName('pg_notify');
        for (var i = 0; i < elements.length; i++){
            elements[i].style.display = 'none';
        }
    }
</SCRIPT>
<?php
include './Class/Utilisateur.php';
require_once "./phpGrid/conf.php"; 

$dg = new C_DataGrid('SELECT * FROM produit','id_produit','produit');
$dg->set_col_img('dossier_photo','./Photo/');
$dg->display();
?>
<body onload='dropAdd()'></body>
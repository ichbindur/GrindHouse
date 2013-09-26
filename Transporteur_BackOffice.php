<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include ('./class/Transporteur.php');
// test si les champs sont bien remplis
if(isset($_POST['nom'],$_POST['description'],$_POST['prix'],$_FILES['image'])){
    $NewTrans = new Transporteur();
    $NewTrans->setnom($_POST['nom']);
    $NewTrans->setdescription($_POST['description']);
    chmod("/Photo/Transporteur", 733);
    if ($_FILES['image']['error'] > 0) $erreur = "Erreur lors du transfert";
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    // récupere l'extension
    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
    if ( in_array($extension_upload,$extensions_valides) );
    $Path = "Photo/Transporteur/{$_POST['nom']}.{$extension_upload}";
    if(!file_exists($Path)){
        $Path = "./".$Path;
        move_uploaded_file($_FILES['image']['tmp_name'],$Path);
        echo "déplacement réussis";
        $NewTrans->setimage($Path );
        $NewTrans->insert();
    }else{
        echo 'Le fichier existe déjà';
    }
    
}
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style_Transporteur.css"/>
        <script src="phpGrid/js/i18n/jquery-1.9.0.min.js"></script>
        <SCRIPT type="text/javascript" src="js/gestion_transporteur.js"> </script>
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
    <body onLoad="dropAdd()">
        <input type="button" name="UpdateDelete" value="Modifier/Supprimer"/>
        <input type="button" name="Ajouter" value="Ajouter"/>
        <form action="" method="post" enctype="multipart/form-data" name="ajoutTransporteur">
            <div>
                <label for="nom">Entrer le nom de votre transporteur<label/> <input type="text" name="nom"/>
            </div>
            <div>
                <label for="description">Entrer la description du transporteur<label/> <textarea name="description"></textarea>
            </div>
            <div>
                <input type="hidden" name="MAX_FILE_SIZE" value="12345" />
                <label for="image">Insérer la photo<label/><input type="file" name="image"/>
            </div>
            <input type="submit" value="Valider"/>
        </form>
        <!--<form name="modif_supprTransporteur">-->
            <label>Liste transporteur :</label>
            <div>
            <?php
                require_once "./phpGrid/conf.php";
                $dg = new C_DataGrid('SELECT * FROM transporteur','id_transporteur','transporteur');          $dg->enable_edit('FORM');
                $dg->set_dimension(1500,600);
                $dg->display();
                // fonction qui récup l'id transporteur en fonction de la ligne sélectionner et lance la fonction afficher cacher
                $OnSelectRow = <<<ONSELECTROW
                    jQuery("#getselected").click(function(){
                    var selr = jQuery('#grid').jqGrid('getGridParam','selrow'); 
                                if(selr) alert(selr); 
                                else alert("No selected row"); 
                                return false; 
ONSELECTROW;
                    //echo '<script>alert("blabla"'. $OnSelectRow, $idTrans .')</script>';
                    // ajout de l'event qui permet d'afficher le php grid correspondant au transporteur sélectionné
                    // $dg->add_event("jqGridSelectRow", $OnSelectRow);
                ?>
        <!--</form>-->
            </div>
            <?php
                // pour chaque transporteur création d'un php grid avec sa grille de tarif
            $Transporteur = new Transporteur();
            $Transporteur<-selectall();
            foreach ($Transporteur as $value) {
                   $NewGrille = new Grille();
                   $NewGrille<-selectTrans($Transporteur<-getid_transporteur());
                   ?> 
                   <div class="afficher_cacher"><?php
                        require_once "./phpGrid/conf.php";
                        $dg = new C_DataGrid('SELECT * FROM grille where id_transporteur='.$Transporteur<-getid_transporteur().'','id_grille','grille');
                        $dg->enable_edit('FORM');
                        $dg->set_dimension(1500,600);
                        $dg->display();?> 
                   </div> <?php
                }
            ?>
        </body>
</html>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include ('./class/Transporteur.php');
if(isset($_POST['nom'],$_POST['description'],$_POST['prix'],$_FILES['image'])){
    $NewTrans = new Transporteur();
    $NewTrans->setnom($_POST['nom']);
    $NewTrans->setdescription($_POST['description']);
    $NewTrans->setprix($_POST['prix']);
    if ($_FILES['image']['error'] > 0) $erreur = "Erreur lors du transfert";
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    // récupere l'extension
    $extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
    if ( in_array($extension_upload,$extensions_valides) );
    $Path = "Photo/Transporteur/{$_POST['nom']}.{$extension_upload}";
    if(!file_exists($Path)){
        $Path = "./".$Path;
        $resultat = move_uploaded_file($_FILES['image']['tmp_name'],$Path);
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
    </head>
    <body>
        <input type="button" name="UpdateDelete" value="Modifier/Supprimer"/>
        <input type="button" name="Ajouter" value="Ajouter"/>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nom">Entrer le nom de votre transporteur<label/> <input type="text" name="nom"/>
            </div>
            <div>
                <label for="description">Entrer la description du transporteur<label/> <textarea name="description"></textarea>
            </div>
            <div>
                <label for="prix">Entrer le prix de base <label/><input type="number" name="prix"/>
            <div/>
            <div>
                <input type="hidden" name="MAX_FILE_SIZE" value="12345" />
                <label for="image">Insérer la photo<label/><input type="file" name="image"/>
            <div/>
            <input type="submit" value="Valider"/>
        </form>
    </body>
</html>
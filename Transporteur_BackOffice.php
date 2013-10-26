<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include ('./class/Transporteur.php');
include './Class/Utilisateur.php';
require_once "./phpGrid/conf.php";

// test si les champs sont bien remplis
$NewTrans = new Transporteur();
if(isset($_POST['nom'],$_POST['description'],$_FILES['image'])){
    $NewTrans->setnom($_POST['nom']);
    $NewTrans->setdescription($_POST['description']);
    $NewTrans->setimage($_FILES['image']);
    
    //------AJOUT DE L'IMAGE SUR LE SERVEUR------//
    $fileName = $_FILES["image"]["name"]; 
    $fileTmpLoc = $_FILES["image"]["tmp_name"];
    $pathAndName = './Photo/Transporteur/'.$fileName;
    move_uploaded_file($fileTmpLoc,$pathAndName);
    $NewTrans->setimage($fileName);
    
    //------AJOUT DU NOUVEAU TRANSPORTEUR------//
    $NewTrans->insert();
}
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="stylesheet" type="text/css" href="./DataTables/extras/TableTools/media/css/TableTools.css">
        <link rel="stylesheet" type="text/css" href="./DataTables/extras/Editor/media/css/dataTables.editor.css">
        <link rel="stylesheet" type="text/css" href="css/style_Transporteur.css"/>
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/bootstrap.css'/>
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/jquery.dataTables.css'/>
        
        <script type='text/javascript' src='http://code.jquery.com/jquery-2.0.3.min.js'></script>
        <script type='text/javascript' src='./datatables/media/js/jquery.dataTables.js'></script>
        <script type="text/javascript" charset="utf-8" src="./DataTables/extras/TableTools/media/js/TableTools.js"></script>
	<script type="text/javascript" charset="utf-8" src="./DataTables/extras/Editor/media/js/dataTables.editor.js"></script>
        <script>
                $(document).ready(function() {
                    // Create the form
                    var editor = new $.fn.dataTable.Editor({
                        "ajaxUrl": "TransporteurBackOffice.php",
                        "domTable": "#transporteur"
                    });

                    editor.add( [
                        {
                            "label": "id_transporteur",
                            "name": "id_transporteur"
                        }, {
                            "label": "nom",
                            "name": "nom"
                        }, {
                            "label": "image:",
                            "name": "image"
                        }, {
                            "label": "description:",
                            "name": "description"
                        }
                    ] );

                    // New record
                    $('button.editor_create').on('click', function (e) {
                        e.preventDefault();

                        editor.create(
                            'Create new record',
                            {
                                "label": "Add",
                                "fn": function () {
                                    editor.submit();
                                }
                            }
                        );
                    } );

                    // Edit record
                    $('#transporteur').on('click', 'a.editor_edit', function (e) {
                        e.preventDefault();

                        editor.edit(
                            $(this).parents('tr')[0],
                            'Edit record',
                            {
                                "label": "Update",
                                "fn": function () { editor.submit(); }
                            }
                        );
                    } );

                    // Delete a record
                    $('#transporteur').on('click', 'a.editor_remove', function (e) {
                        e.preventDefault();

                        editor.message( "Are you sure you want to remove this row?" );
                        editor.remove(
                            $(this).parents('tr')[0],
                            'Delete row',
                            {
                                "label": "Update",
                                "fn": function () {
                                    editor.submit();
                                }
                            }
                        );
                    } );
                    // DataTables init
                    $('#transporteur').dataTable( {
                        "sAjaxSource": "TransporteurBackOffice.php",
                        "aoColumns": [
                            { "mDataProp": "id_transporteur" },
                            { "mDataProp": "nom" },
                            { "mDataProp": "image" },
                            { "mDataProp": "description"}
                        ],
        "oTableTools": {
            "sRowSelect": "single",
            "aButtons": [
                { "sExtends": "editor_create", "editor": editor },
                { "sExtends": "editor_edit",   "editor": editor },
                { "sExtends": "editor_remove", "editor": editor }
            ]
        }
                    } );
                } );
                
            </script>
            
    </head>
    <body>
<!--        <input type="button" name="UpdateDelete" value="Modifier/Supprimer"/>
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
            <input type="submit" value="Valider"/>-->
        </form></br></br>
        <div>
            <table id='transporteur'>
                <thead>
                    <tr>
                        <th>id_transporteur</th>
                        <th>nom</th>
                        <th>image</th>
                        <th>description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $Trans = new Transporteur();
                        $TransTab = $Trans->selectall();
                        for ($i=0 ; $i < count($TransTab) ; $i++) {
                    ?>
                    <tr>
                        <td>  <?php echo $TransTab[$i]['id_transporteur']; ?> </td>
                        <td>  <?php echo $TransTab[$i]['nom']; ?> </td>
                        <td>  <?php echo $TransTab[$i]['image']; ?> </td>
                        <td>  <?php echo $TransTab[$i]['description']; ?> </td>
                        <td><button onclick="supprimer($TransTab[$i]['id_transporteur']);">Supprimer</button> </td>
                        <td><button onclick="modifier($TransTab[$i]['id_transporteur']);">Modifier</button> </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </body>
</html>
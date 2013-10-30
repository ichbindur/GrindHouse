<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include './class/Transporteur.php';
include './Class/Utilisateur.php';

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
    $NewTrans->setimage('./Photo/Transporteur/'.$fileName);
    
    //------AJOUT DU NOUVEAU TRANSPORTEUR------//
    $NewTrans->insert();
}
if(isset($_POST['nom2'],$_POST['description2'],$_POST['image2'])){    
    $NewTrans->nom = $_POST['nom2'];
    $NewTrans->description = $_POST['description2'];
    $updateProd->setdossier_photo($_FILES['image2']["name"]);
    $fileName = $_FILES["image2"]["name"];
    $fileTmpLoc = $_FILES["image2"]["tmp_name"];
    $pathAndName = 'Photo/Transporteur/' . $fileName;
    move_uploaded_file($fileTmpLoc, $pathAndName);
    $NewTrans->image('./Photo/Transporteur/' .$fileName);
    $NewTrans->update($_POST['id_transporteur2']);
}
?>
<html>
    <head>
        <title>GHL / Transporteurs</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <script type='text/javascript' src='./js/jquery.js'></script>
        <script type='text/javascript' src='./datatables/media/js/jquery.dataTables.js'></script>
        <script type="text/javascript" src="./js/bootstrap.js"></script>
        <link rel="stylesheet" href="./css/bootstrap.css"  media="screen" />        
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/bootstrap.css'/>
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/jquery.dataTables.css'/>
        <link rel="stylesheet" type='text/css' href='./assets/css/style.css'/>
        <link rel="icon" href="assets/favicon.ico"/>
    </head>
    <script>
        function confirmation(id) {
            var conf = confirm("Voulez-vous vraiment supprimer cette entrée?");
            var url = document.URL.split('?');
            if (conf)
                window.location = url[0] + "?action=supprimer&id=" + id;
        }
    </script>
    <body>
        <?php
        if (isset($_GET['action'])) {
            $id = (int) $_GET['id'];
            $action = $_GET['action'];
            if ($id > 0 && !empty($action)) {
                switch ($action) {
                    case 'modifier':
                        break;

                    case 'supprimer': $NewTrans->delete($id);
                        break;
                    default: echo "<p>Cette action n'est pas disponible</p>";
                        break;
                }
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data" name="ajoutTransporteur" class="produit_form" id="produit_form">
            <h1 class="h1_bo">Ajout de nouveaux transporteurs</h1>
        <ul class="nav_gestion">
            <li><a href="produit_backoffice.php">Gestion des produits</a></li>
            <li><a href="utilisateur_backoffice.php">Gestion des clients</a></li>
            <li><a href="transporteur_backoffice.php">Gestion des transporteurs</a></li>
        </ul>
            Entrez le nom de votre transporteur<input type="text" name="nom"/>
            Entrez la description du transporteur<textarea name="description"></textarea>
                <input type="hidden" name="MAX_FILE_SIZE" value="12345" />
                <input type="file" name="image"/>
                <input type="submit" value="Valider"/>
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
                        <td>  <img src="<?php echo $TransTab[$i]['image']; ?>"/> </td>
                        <td>  <?php echo $TransTab[$i]['description']; ?> </td>
                        <td width="5px"><a class="btn btn-primary" onclick="confirmation(<?php echo $TransTab[$i]['id_transporteur'] ?>);"/>Supprimer</a></td>
                        <td>
                            <div class="modal hide fade" id="infos" style="overflow-y:auto;">
                                <div class="modal-header"> <a href="#" class="close" data-dismiss="modal">×</a>
                                    <h3>Modification d'un produit</h3>
                                </div>
                                <div class="modal-body">
                                    <form id="form" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" id="id_transporteur2" name="id_transporteur2" value="<?php echo $TransTab[$i]['id_transporteur']; ?>"/>
                                        <div>	
                                            <label for="identifiant">Nom:</label>
                                            <input type="text" id="nom2" name="nom2" value="<?php echo $TransTab[$i]['nom']; ?>"/><br/>
                                        </div>

                                        <div>
                                            <label>Description:</label>
                                            <input type="textarea" id="description2" name="description2" value="<?php echo $TransTab[$i]['description']; ?>"/><br/>
                                        </div>	
                                        <div>
                                            <label>Ajouter photo:</label>
                                            <input type="file" id="image2" name="image2" value=""/>
                                        </div>

                                        <div id="button">
                                            <input type="submit" id="validation2" name="validation2" value="Ajouter"/>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <a class="btn btn-primary" data-toggle="modal" href="#infos" >Modifier</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </table>
        <script>
        $(document).ready(function() {
            $('#produit').dataTable({});
        });
        </script>
        </div>
        </body>
</html>
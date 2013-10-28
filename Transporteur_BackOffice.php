<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include ('./class/Transporteur.php');
// test si les champs sont bien remplis
if (isset($_POST['nom'], $_POST['description'], $_FILES['image'])) {
    $NewTrans = new Transporteur();
    $NewTrans->setnom($_POST['nom']);
    $NewTrans->setdescription($_POST['description']);
    chmod("/Photo/Transporteur", 733);
    if ($_FILES['image']['error'] > 0)
        $erreur = "Erreur lors du transfert";
    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
    // récupere l'extension
    $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
    if (in_array($extension_upload, $extensions_valides))
        ;
    $Path = "Photo/Transporteur/{$_POST['nom']}.{$extension_upload}";
    if (!file_exists($Path)) {
        $Path = "./" . $Path;
        move_uploaded_file($_FILES['image']['tmp_name'], $Path);
        echo "déplacement réussis";
        $NewTrans->setimage($Path);
        $NewTrans->insert();
    } else {
        echo 'Le fichier existe déjà';
    }
}
if (isset($_POST['nom2'], $_POST['description2'])) {
    $updateTrans = new Transporteur();
    $updateTrans->id_transporteur = $_POST['reference2'];
    $updateTrans->nom = $_POST['nom2'];
    $updateTrans->description = $_POST['description2'];
    chmod("./Photo/Transporteur", 733);
    if ($_FILES['dossier_photo2']['error'] > 0)
        $erreur = "Erreur lors du transfert";
    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
    // récupere l'extension
    $extension_upload = strtolower(substr(strrchr($_FILES['dossier_photo2']['name'], '.'), 1));
    if (in_array($extension_upload, $extensions_valides))
        ;
    $Path = "/Photo/Transporteur/{$_POST['nom2']}.{$extension_upload}";
    if (!file_exists($Path)) {
        $Path = "." . $Path;
        move_uploaded_file($_FILES['dossier_photo2']['tmp_name'], $Path);
        echo "déplacement réussis";
        $updateTrans->image = $Path;
    }else echo 'Erreur lors du transfert de l\'image. ';
    echo $updateTrans->id_transporteur;
    $updateTrans->update($updateTrans->id_transporteur);
}
if(isset($_GET['action'], $_GET['id'])){
    if($_GET['action'] == 'supprimer'){
        $deleteTrans = new Transporteur();
        $deleteTrans->delete($_GET['id']);
    }
}
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <script type='text/javascript' src='./js/jquery.js'></script>
        <script type='text/javascript' src='./datatables/media/js/jquery.dataTables.js'></script>
        <script type="text/javascript" src="./js/bootstrap.js"></script>
        <!--<script type="text/javascript" src="./bootstrap-modal-master/js/bootstrap-modal.js"></script>-->
        <link rel="stylesheet" href="./css/bootstrap.min.css"  media="screen" /> -->
        <link rel="stylesheet" href="./bootstrap-modal-master/css/bootstrap-modal.css"  media="screen" /> 
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/bootstrap.css'/>
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/jquery.dataTables.css'/>
    </head>
    <script>
        function confirmation(id){
            var conf = confirm("Voulez-vous vraiment supprimer cette entrée?");
            var url = document.URL.split('?');
            if (conf)
                window.location = url[0] + "?action=supprimer&id=" + id;
        }
    </script>
    <body>
        <form action="" method="post" enctype="multipart/form-data" name="ajoutTransporteur">
            <div>
                <label for="nom">Entrer le nom de votre transporteur<label/> <input type="text" name="nom"/>
                    <label for="description">Entrer la description du transporteur<label/> <textarea name="description"></textarea>
                        <input type="hidden" name="MAX_FILE_SIZE" value="12345" />
                        <label for="image">Insérer la photo<label/><input type="file" name="image"/>
                            <input type="submit" value="Valider"/>
                            </div>
                            </form>

                            <table id='produit' class='display'>
                                <thead>
                                    <tr>
                                        <th>id_transporteur</th>
                                        <th>Nom</th>
                                        <th>Image</th>
                                        <th>Description</th>      
                                        <th>Supprimer</th>
                                        <th>Modifier</th>                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $transporteur = new Transporteur();
                                    $arrayTransporteur = $transporteur->selectall();
                                    foreach ($arrayTransporteur as $row) {
                                        ?>
                                        <tr>
                                            <td width="10px">  <?php echo $row['id_transporteur']; ?></td>
                                            <td width="30px">  <?php echo $row['nom']; ?></td>
                                            <td width="150px"> <img src='<?php echo $row['image']; ?>' width="100%"/></td>
                                            <td width="10px">  <?php echo $row['description']; ?></td>   
                                            <td width="5px"><a class="btn btn-primary" onclick="confirmation(<?php echo $row['id_transporteur'] ?>);"/>Supprimer</a></td>
                                            <td>
                                                <div class="modal hide fade" id="infos">
                                                    <div class="modal-header"> <a href="#" class="close" data-dismiss="modal">×</a>
                                                        <h3>Modification d'un transporteur</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="form" method="POST" enctype="multipart/form-data">
                                                            <div>	
                                                                <label for="identifiant">Id du Transporteur:</label>
                                                                <input type="text" id="reference2" name="reference2" value="<?php echo $row['id_transporteur']; ?>" readonly/><br/>
                                                            </div>

                                                            <div>
                                                                <label>Nom:</label>
                                                                <input type="text" id="nom2" name="nom2" value="<?php echo $row['nom']; ?>"/><br/>
                                                            </div>	

                                                            <div>
                                                                <label>Ajouter photo:</label>
                                                                <input type="file" id="dossier_photo2" name="dossier_photo2" value=""/>
                                                            </div>

                                                            <div>
                                                                <label>Description:</label>
                                                                <textarea id="description2" name="description2"><?php echo $row['description']; ?></textarea>
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
                            </body>
                            </html>

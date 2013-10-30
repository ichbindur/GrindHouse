<?php
include ('./class/Produit.php');
include ('./Class/ACategorie.php');
include ('./Class/Categorie.php');
include ('./Class/Type.php');

$prod = new Produit();

if (isset($_POST['reference'], $_POST['nom'], $_POST['prix_ht'], $_POST['description'], $_POST['poids'], $_POST['dim_larg'], $_POST['dim_long'], $_POST['is_venteprivee'], $_POST['promo'], $_POST['promo_vp'], $_POST['stock'], $_POST["categorie"])) {
    $prod = new Produit();
    $prod->setreference($_POST['reference']);
    $prod->setnom($_POST['nom']);
    $prod->setprix_ht($_POST['prix_ht']);
    $prod->setdescription($_POST['description']);
    $prod->setpoids($_POST['poids']);
    $prod->setdim_larg($_POST['dim_larg']);
    $prod->setdim_long($_POST['dim_long']);
    $prod->setis_venteprivee($_POST['is_venteprivee']);
    $prod->setpromotion($_POST['promo']);
    $prod->setpromotion_vp($_POST['promo_vp']);
    $prod->setstock($_POST['stock']);
    $prod->settype_p = $_POST['type_p'];
    $prod->setdossier_photo($_FILES['dossier_photo']["name"]);

    //------AJOUT DE L'IMAGE SUR LE SERVEUR------//

    $fileName = $_FILES["dossier_photo"]["name"];
    $fileTmpLoc = $_FILES["dossier_photo"]["tmp_name"];
    $pathAndName = 'Photo/' . $fileName;
    move_uploaded_file($fileTmpLoc, $pathAndName);
    $prod->setdossier_photo($fileName);
    //------AJOUT DU NOUVEAU PRODUIT------//
    $prod->insert();
    //------AJOUT DES CATEGORIES------//    
    $categorie = new ACategorie();
    $categorie->id_produit = $prod->id_produit;
    for ($i = 0; $i < count($_POST['categorie']); $i ++) {
        $categorie->id_categorie = $_POST['categorie'][$i];
        $categorie->insert();
    }
}

if (isset($_POST['reference2'], $_POST['nom2'], $_POST['prix_ht2'], $_POST['description2'], $_POST['poids2'], $_POST['dim_larg2'], $_POST['dim_long2'], $_POST['is_venteprivee2'], $_POST['promo2'], $_POST['promo_vp2'], $_POST['stock2'], $_POST['type_p2'])) {
    $updateProd = new Produit();
    $updateProd->setreference($_POST['reference2']);
    $updateProd->setnom($_POST['nom2']);
    $updateProd->setprix_ht($_POST['prix_ht2']);
    $updateProd->setdescription($_POST['description2']);
    $updateProd->setpoids($_POST['poids2']);
    $updateProd->setdim_larg($_POST['dim_larg2']);
    $updateProd->setdim_long($_POST['dim_long2']);
    $updateProd->setis_venteprivee($_POST['is_venteprivee2']);
    $updateProd->setpromotion($_POST['promo2']);
    $updateProd->setpromotion_vp($_POST['promo_vp2']);
    $updateProd->setstock($_POST['stock2']);
    $updateProd->setdossier_photo($_FILES['dossier_photo2']["name"]);
    $fileName = $_FILES["dossier_photo2"]["name"];
    $fileTmpLoc = $_FILES["dossier_photo2"]["tmp_name"];
    $pathAndName = 'Photo/' . $fileName;
    move_uploaded_file($fileTmpLoc, $pathAndName);
    $prod->setdossier_photo($fileName);
    $updateProd->type_p = $_POST['type_p2'];
    $updateProd->update($_POST['id_produit2']);
}
if (isset($_GET['action'], $_GET['id'])) {
    if ($_GET['action'] == 'supprimer') {
        $deleteProd = new Produit();
        $deleteProd->delete($_GET['id']);
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Back_Office</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <script type='text/javascript' src='./js/jquery.js'></script>
        <script type='text/javascript' src='./datatables/media/js/jquery.dataTables.js'></script>
        <script type="text/javascript" src="./js/bootstrap.js"></script>
        <link rel="stylesheet" href="./css/bootstrap.css"  media="screen" />        
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/bootstrap.css'/>
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/jquery.dataTables.css'/>
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

                    case 'supprimer': $prod->delete($id);
                        break;
                    default: echo "<p>Cette action n'est pas disponible</p>";
                        break;
                }
            }
        }
        ?>
        <form id="form" method="POST" enctype="multipart/form-data">
            <div>	
                <label for="identifiant">Référence:</label>
                <input type="text" id="reference" name="reference" value=""/><br/>
            </div>

            <div>
                <label>Nom:</label>
                <input type="text" id="nom" name="nom" value=""/><br/>
            </div>	

            <div>	
                <label>Prix HT:</label>
                <input type="text" id="prix_ht" name="prix_ht" value=""/>
            </div>
            
            <div>	
                <label>Type</label>
                <input type="text" id="type_p" name="type_p" value=""/>
            </div>
            <!--
                        <div>	
                            <label>Type</label>
                            <input type="text" id="type_p" name="type_p" value=""/>
                        </div>-->

            <div>
                <label>Description:</label>
                <textarea id="description" name="description"></textarea>
            </div>

            <div>
                <label>Poids (gramme):</label>
                <input type="text" id="poids" name="poids" value=""/>
            </div>

            <div>
                <label>Vente privée:</label>
                <span>
                    <input type="radio" name="is_venteprivee" value="1"/>Oui
                    <input type="radio" name="is_venteprivee" value="0"/>Non
                </span>                    
            </div>

            <div>
                <label>Promotion(%):</label>
                <input type="text" id="promo" name="promo"/>
            </div>

            <div>
                <label>Promotion vente privés:</label>
                <input type="text" id="promo_vp" name="promo_vp"/>
            </div>

            <div>
                <label>Nombres de produit en stock:</label>
                <input type="text" id="stock" name="stock"/>
            </div>

            <div>
                <label>Dimension largeur(cm):</label>
                <input type="text" id="dim_larg" name="dim_larg"/>
            </div>

            <div>
                <label>Dimension longueur(cm):</label>
                <input type="text" id="dim_long" name="dim_long"/>
            </div>            

            <div>
                <label>Dossier photo:</label>
                <input type="file" id="dossier_photo" name="dossier_photo"/>
            </div>

            <div>
                <label>Categorie:</label>
                <?php
                $cat = new Categorie();
                $categorie = $cat->selectAll();
                foreach ($categorie as $row) {
                    echo '<input type="checkbox" id="categorie" name="categorie" value="' . $row['id_categorie'] . '"/>' . $row['nom'] . '<br>';
                }
                ?>
            </div>

            <div>
                <label>Type de sac:</label>
                <?php                
                $type = new Type();
                $allType = $type->selectAll();
                echo '<select name="type_p">';
                foreach ($allType as $row) {
                    echo '<option value="' . $row['id_type'] . '">' . $row['nom'] . '</option>';
                }
                echo '</select>';
                ?>
            </div> 

            <div id="button">
                <input type="submit" id="validation" name="validation" value="Ajouter"/>
            </div>

        </form></br></br>

        <div id="img">	
            <label for="identifiant">Liste des produits:</label>
        </div>

        <table id='produit' class='display'>
            <thead>
                <tr>
                    <th>id_produit</th>
                    <th>Référence</th>
                    <th>Nom</th>
                    <th>Prix HT</th>
                    <th>Categorie</th>
                    <th>Description</th>
                    <th>Poids</th>
                    <th>Type</th>                    
                    <th>Categorie</th>                    
                    <th>Vente privée</th>
                    <th>Promotion</th>
                    <th>Promotion vente privée</th>
                    <th>Stock</th>
                    <th>Dimension largeur</th>
                    <th>Dimension longueur</th>
                    <th>Image</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                $prod = $prod->selectall();
                foreach ($prod as $row) {
                    $type = new Type();
                    $categorie = new Categorie();
                    if (isset($row['type_p']) && $row['type_p'] != 0)
                        $type->select($row['type_p']);
                    $cats = $categorie->selectallWProduit($row['id_produit']);
                    ?>
                    <tr>
                        <td width="10px">  <?php echo $row['id_produit']; ?></td>
                        <td width="30px">  <?php echo $row['reference']; ?></td>
                        <td width="30px">  <?php echo $row['nom']; ?></td>
                        <td width="5px">  <?php echo $row['prix_ht'] * 1.196; ?></td>
                        <td width="30px">  
                            <?php
                            switch ($row['type_p']) {
                                case 1:
                                    echo 'homme';
                                    break;
                                case 2:
                                    echo 'femme';
                                    break;
                                case 3:
                                    echo 'commun';
                                    break;
                                case 4:
                                    echo 'voyage';
                                    break;
                            }
                            ?></td>                        
                        <td width="10px">  <?php echo $row['description']; ?></td>
                        <td width="5px">  <?php echo $row['poids']; ?></td>
                        <td width="6px">  <?php if ($type->nom != '') echo $type->nom; ?></td>
                        <td width="10px">  <?php if (count($cats) > 0) foreach ($cats as $value) {
                                echo $value['nom'] . '<br>';
                            } ?></td>
                        <td width="5px">  <?php echo $row['is_venteprivee']; ?></td>
                        <td width="10px">  <?php echo $row['promotion']; ?></td>
                        <td width="20px">  <?php echo $row['promotion_vp']; ?></td>
                        <td width="5px">  <?php echo $row['stock']; ?></td>
                        <td width="30px">  <?php echo $row['dim_larg']; ?></td>
                        <td width="30px">  <?php echo $row['dim_long']; ?></td>
                        <td width="150px"> <img src='./Photo/<?php echo $row['dossier_photo']; ?>' width="100%"/></td>
                        <td width="5px"><a class="btn btn-primary" onclick="confirmation(<?php echo $row['id_produit'] ?>);"/>Supprimer</a></td>
                        <td>
                            <div class="modal hide fade" id="infos" style="overflow-y:auto;">
                                <div class="modal-header"> <a href="#" class="close" data-dismiss="modal">×</a>
                                    <h3>Modification d'un produit</h3>
                                </div>
                                <div class="modal-body">
                                    <form id="form" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" id="id_produit2" name="id_produit2" value="<?php echo $row['id_produit']; ?>"/>
                                        <div>	
                                            <label for="identifiant">Référence:</label>
                                            <input type="text" id="reference2" name="reference2" value="<?php echo $row['reference']; ?>"/><br/>
                                        </div>

                                        <div>
                                            <label>Nom:</label>
                                            <input type="text" id="nom2" name="nom2" value="<?php echo $row['nom']; ?>"/><br/>
                                        </div>	
                                        <div>	
                                            <label>Prix HT:</label>
                                            <input type="text" id="prix_ht2" name="prix_ht2" value="<?php echo $row['prix_ht'] ?>"/>
                                        </div>

                                        <div>	
                                            <label>Type:</label>
                                            <?php
                                            switch ($row['type_p']) {
                                                //homme
                                                case 1:
                                                    echo '<select name="type_p2">
                                                           <option selected="selected" value=1>Homme</option>
                                                           <option value=2>Femme</option>
                                                           <option value=3>Commun</option>
                                                           <option value=4>Voyage</option>
                                                            </select>';
                                                    break;
                                                case 2:
                                                    echo '<select name="type_p2">
                                                           <option value=1>Homme</option>
                                                           <option selected="selected" value=2>Femme</option>
                                                           <option value=3>Commun</option>
                                                           <option value=4>Voyage</option>
                                                            </select>';
                                                    break;
                                                case 3:
                                                    echo '<select name="type_p2">
                                                           <option value=1>Homme</option>
                                                           <option value=2>Femme</option>
                                                           <option selected="selected" value=3>Commun</option>
                                                           <option value=4>Voyage</option>
                                                            </select>';
                                                    break;
                                                case 4:
                                                    echo '<select name="type_p2">
                                                           <option value=1>Homme</option>
                                                           <option value=2>Femme</option>
                                                           <option value=3>Commun</option>
                                                           <option selected="selected" value=4>Voyage</option>
                                                            </select>';
                                                    break;
                                            }
                                            ?>
                                        </div>
                                        <div>
                                            <label>Description:</label>
                                            <textarea id="description2" name="description2"><?php echo $row['description']; ?></textarea>
                                        </div>

                                        <div>
                                            <label>Poids (gramme):</label>
                                            <input type="text" id="poids2" name="poids2" value="<?php echo $row['poids']; ?>"/>
                                        </div>

                                        <div>
                                            <label>Vente privée:</label>
                                            <span>
                                                <?php
                                                if ($row['is_venteprivee']) {
                                                    echo '<input type="radio" name="is_venteprivee2" value="1" checked="checked"/>Oui
                                                <input type="radio" name="is_venteprivee2" value="0"/>Non';
                                                } else{
                                                    echo '<input type="radio" name="is_venteprivee2" value="1"/>Oui
                                                    <input type="radio" name="is_venteprivee2" value="0" checked="checked"/>Non';
                                                }
                                                ?>
                                            </span>                    
                                        </div>

                                       <div>
                                            <label>Categorie:</label>
                                            <?php
                                            $cat = new Categorie();
                                            $categorie2 = $cat->selectAll();
                                            foreach ($categorie2 as $cat) {
                                                echo '<input type="checkbox" id="categorie2" name="categorie2" value="' . $cat['id_categorie'] . '"/>' . $cat['nom'];
                                            }
                                            
                                            ?>
                                        </div>

                                        <div>
                                            <label>Promotion(%):</label>
                                            <input type="text" id="promo2" name="promo2" value="<?php echo $row['promotion']; ?>"/>
                                        </div>

                                        <div>
                                            <label>Promotion vente privés:</label>
                                            <input type="text" id="promo_vp2" name="promo_vp2" value="<?php echo $row['promotion_vp']; ?>"/>
                                        </div>

                                        <div>
                                            <label>Nombres de produit en stock:</label>
                                            <input type="text" id="stock2" name="stock2" value="<?php echo $row['stock']; ?>"/>
                                        </div>

                                        <div>
                                            <label>Dimension largeur(cm):</label>
                                            <input type="text" id="dim_larg2" name="dim_larg2" value="<?php echo $row['dim_larg']; ?>"/>
                                        </div>

                                        <div>
                                            <label>Dimension longueur(cm):</label>
                                            <input type="text" id="dim_long2" name="dim_long2" value="<?php echo $row['dim_long']; ?>"/>
                                        </div>            

                                        <div>
                                            <label>Ajouter photo:</label>
                                            <input type="file" id="dossier_photo2" name="dossier_photo2" value=""/>
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
        <script>
        $(document).ready(function() {
            $('#produit').dataTable({});
        });
        </script>
    </body>
</html>

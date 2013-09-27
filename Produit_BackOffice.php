<?php
include ('./class/Produit.php');
$prod = new Produit();

if (isset($_POST['reference'], $_POST['nom'], $_POST['prix_ht'], $_POST['description'], $_POST['poids'], $_POST['dim_larg'], $_POST['dim_long'], $_POST['is_venteprivee'], $_POST['promo'], $_POST['promo_vp'], $_POST['stock'])) {
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
    $prod->setdossier_photo($_FILES['dossier_photo']);


    //------AJOUT DE L'IMAGE SUR LE SERVEUR------//

    $fileName = $_FILES["dossier_photo"]["name"];
    $fileTmpLoc = $_FILES["dossier_photo"]["tmp_name"];
    $pathAndName = 'Photo/' . $fileName;
    move_uploaded_file($fileTmpLoc, $pathAndName);
    $prod->setdossier_photo($fileName);
    
    //------SUPPRESSION D'UN PRODUIT SUR LE SERVEUR------//
    
    
    //------AJOUT DU NOUVEAU PRODUIT------//

    $prod->insert();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Back_Office</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <script type='text/javascript' src='./js/jquery.js'></script>
        <script type='text/javascript' src='./datatables/media/js/jquery.dataTables.js'></script>
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/bootstrap.css'/>
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/jquery.dataTables.css'/>
    </head>
    <body>
        <?php
        if(isset($_GET['action']))
        {
            $id=(int)$_GET['id'];
            $action=$_GET['action'];
            if($id > 0 && !empty($action))
            {
                switch($action)
                {
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
                <input type="text" id="reference" name="reference" value=""><br/>
            </div>

            <div>
                <label>Nom:</label>
                <input type="text" id="nom" name="nom" value=""><br/>
            </div>	

            <div>	
                <label>Prix HT:</label>
                <input type="text" id="prix_ht" name="prix_ht" value=""/>
            </div>

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
                    <th>Description</th>
                    <th>Poids</th>
                    <th>Vente privée</th>
                    <th>Promotion</th>
                    <th>Promotion vente privée</th>
                    <th>Stock</th>
                    <th>Dimension largeur</th>
                    <th>Dimension longueur</th>
                    <th>Image</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $prod = $prod->selectall();
                    foreach ($prod as $row) {
                ?>
                    <tr>
                        <td width="10px">  <?php echo $row['id_produit']; ?></td>
                        <td width="30px">  <?php echo $row['reference']; ?></td>
                        <td width="30px">  <?php echo $row['nom']; ?></td>
                        <td width="5px">  <?php echo $row['prix_ht'] * 1.196; ?></td>
                        <td width="10px">  <?php echo $row['description']; ?></td>
                        <td width="5px">  <?php echo $row['poids']; ?></td>
                        <td width="5px">  <?php echo $row['is_venteprivee']; ?></td>
                        <td width="10px">  <?php echo $row['promotion']; ?></td>
                        <td width="20px">  <?php echo $row['promotion_vp']; ?></td>
                        <td width="5px">  <?php echo $row['stock']; ?></td>
                        <td width="30px">  <?php echo $row['dim_larg']; ?></td>
                        <td width="30px">  <?php echo $row['dim_long']; ?></td>
                        <td width="150px"> <img src='./Photo/<?php echo $row['dossier_photo']; ?>' width="100%"/></td>
                        <td width="5px"><a href="?action=supprimer&id=<?php echo $row['id_produit'] ?>">Supprimer</a></td></td>
                        <td width="5px"><a href="?action=modifier"></a></td>
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
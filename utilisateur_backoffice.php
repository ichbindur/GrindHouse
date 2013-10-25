<?php
$user = new Utilisateur();
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
<html>
    <head>
        <title>Utilisateur Back_Office</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <script type='text/javascript' src='./js/jquery.js'></script>
        <script type='text/javascript' src='./datatables/media/js/jquery.dataTables.js'></script>
        <script type="text/javascript" src="./js/bootstrap.js"></script>
        <link rel="stylesheet" href="./css/bootstrap.min.css"  media="screen" /> -->
        <link rel="stylesheet" href="./bootstrap-modal-master/css/bootstrap-modal.css"  media="screen" /> 
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
<table id='produit' class='display'>
            <thead>
                <tr>
                    <th>id_utilisateur</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Mail</th>
                    <th>Code postale</th>
                    <th>Pays</th>
                    <th>Date d'inscription</th>
                    <th>Vente privée</th>
                    <th>Administrateur</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                $user = $user->selectall();
                foreach ($user as $row) {
                    ?>
                    <tr>
                        <td width="10px">  <?php echo $row['id_utilisateur']; ?></td>
                        <td width="30px">  <?php echo $row['nom']; ?></td>
                        <td width="30px">  <?php echo $row['prenom']; ?></td>
                        <td width="50px">  <?php echo $row['email'] * 1.196; ?></td>
                        <td width="10px">  <?php echo $row['cp']; ?></td>
                        <td width="10px">  <?php echo $row['pays']; ?></td>
                        <td width="10px">  <?php if($row['is_venteprivee'])
                                                    echo 'oui';
                                                else echo 'non';
                            ?></td>
                        <td width="10px">  <?php if($row['is_admin'])
                                                    echo 'oui';
                                                else echo 'non';
                            ?></td></td>
                        <td width="20px">  <?php echo $row['promotion_vp']; ?></td>                        
                        <td width="5px"><a class="btn btn-primary" onclick="confirmation(<?php echo $row['id_utilisateur'] ?>);"/>Supprimer</a></td>
                        <td>
                            <div class="modal hide fade" id="infos" style="overflow-y:auto;">
                                <div class="modal-header"> <a href="#" class="close" data-dismiss="modal">×</a>
                                    <h3>Modification d'un produit</h3>
                                </div>
                                <div class="modal-body">
                                    <form id="form" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" id="id_user2" name="id_user2" value="<?php echo $row['id_produit']; ?>"/>
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
                                            <?php switch ($row['type_p']) {
                                                //homme
                                                case 1:
                                                    echo '<select name="type_p2">
                                                           <option selected="selected" value=1>Homme</option>
                                                           <option value=2>Femme</option>
                                                           <option value=3>Commun</option>
                                                            </select>';
                                                    break;
                                                case 2:
                                                    echo '<select name="type_p2">
                                                           <option value=1>Homme</option>
                                                           <option selected="selected" value=2>Femme</option>
                                                           <option value=3>Commun</option>
                                                            </select>';
                                                    break;
                                                case 3:
                                                    echo '<select name="type_p2">
                                                           <option value=1>Homme</option>
                                                           <option value=2>Femme</option>
                                                           <option selected="selected" value=3>Commun</option>
                                                            </select>';
                                                    break;
                                            }                                            
                                            ?>
                                            <input type="text" id="prix_ht2" name="type_p" value="<?php echo $row['type_p'] ?>"/>
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
                                                }
                                                else
                                                    echo '<input type="radio" name="is_venteprivee2" value="1"/>Oui
                                                <input type="radio" name="is_venteprivee2" value="0" checked="checked"/>Non';
                                                ?>
                                            </span>                    
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
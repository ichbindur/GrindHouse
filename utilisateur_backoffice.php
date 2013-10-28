<?php
include 'Class/Utilisateur.php';
$user = new Utilisateur();
if (isset($_GET['action'])) {
    $id = (int) $_GET['id'];
    $action = $_GET['action'];
    if ($id > 0 && !empty($action)) {
        switch ($action) {
            case 'modifier':
                break;

            case 'supprimer': $user->delete($id);
                break;
            default: echo "<p>Cette action n'est pas disponible</p>";
                break;
        }
    }
}
if(isset($_POST['sauvegarde'])){
    for ($i = 0; $i < intval($_POST['nbUser']); $i++){
        $user = new Utilisateur();
        if(isset($_POST['checkAdmin_'.$i])){            
            $user->select($_POST['checkAdmin_'.$i]);
            if($user->is_admin == 0){
                $user->is_admin = 1;
                $user->update($user->id_user);
            }
        }
        if(isset($_POST['checkvp_'.$i])){
            $user->select($_POST['checkAdmin_'.$i]);
            if($user->is_venteprivee == 0){
                $user->is_venteprivee = 1;
                $user->update($user->id_user);
            }
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
        function afficheAdmin(id) {
            document.getElementById('checkAdmin_' + id.toString()).style.display = "inline";
        }
    </script>
    <form method="POST">
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
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user = $user->selectall();
                $cptUser = 0;
                foreach ($user as $row) {
                    $cptUser ++;
                    ?>
                    <tr>
                        <td width="10px">  <?php echo $row['id_user']; ?></td>
                        <td width="30px">  <?php echo $row['nom']; ?></td>
                        <td width="30px">  <?php echo $row['prenom']; ?></td>
                        <td width="50px">  <?php echo $row['email']; ?></td>
                        <td width="10px">  <?php echo $row['cp']; ?></td>
                        <td width="10px">  <?php echo $row['pays']; ?></td>
                        <td width="10px">  <?php echo $row['date_inscription']; ?></td>
                        <td width="10px">  <?php
                            if ($row['is_venteprivee'])
                                echo 'oui <input type="checkbox" value="'.$row['id_user'].'" name="checkvp_' . $cptUser . '" checked/>';
                            else
                                echo 'non <input type="checkbox" value="'.$row['id_user'].'" name="checkvp_' . $cptUser . '"/>';
                            ?></td>
                        <td width="10px">  <?php
                            if ($row['is_admin'])
                                echo '<a onclick="afficheAdmin(' . $cptUser . ')">oui</a>&nbsp;&nbsp;<input style="display: none;" value="'.$row['id_user'].'" type="checkbox" name="checkAdmin_' . $cptUser . '" id="checkAdmin_' . $cptUser . '" checked/>';
                            else
                                echo '<a onclick="afficheAdmin(' . $cptUser . ')">non</a>&nbsp;&nbsp;<input style="display: none;" value="'.$row['id_user'].'" type="checkbox" name="checkAdmin_' . $cptUser . '" id="checkAdmin_' . $cptUser . '"/>';
                            ?></td>
                        <td width="5px"><a class="btn btn-primary" onclick="confirmation(<?php echo $row['id_user'] ?>);"/>Supprimer</a></td>                        
                    </tr>                
<?php } ?>
            </tbody>
        </table>
        <INPUT type="hidden" value="<?php echo $cptUser; ?>" id="nbUser" name="nbUser"/>
        <input type="submit" value="Sauvegarder" name="sauvegarde"/>
    </form>
    <script>
        $(document).ready(function() {
            $('#produit').dataTable({});
        });
    </script>
</body>
</html>
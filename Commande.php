<?php
session_start();
//Remplissage factice du panier
$panier = array(
    //Id du produit puis nombre de produit demander
    '1' => '1',
    '5' => '3'
);
$_SESSION['ID'] = 12;
$_SESSION['Panier'] = $panier;
//Fin de la zone factice
include './Class/Utilisateur.php';
include './Class/Produit.php';
include './Class/Transporteur.php';
require_once "./phpGrid/conf.php";
echo 'session ===== ' . $_SESSION['ID'];
/* * ****************************************************** */
//S'effectue après validation du panier
/* * ****************************************************** */
/* * ****************************************************** */
//Zone d'a&ffichage des elements du panier pour confirmation
/* * ****************************************************** */
/*if (isset($_SESSION['ID']) && $_SESSION['ID'] != "" && isset($_POST['submit'])) {
    echo 'session exist '.$_SESSION['ID'].' ';
    $auth = true;
}
else
    $auth = false;*/

if (isset($_SESSION['Panier']) && !empty($_SESSION['Panier']) && !isset($_POST['submit'])) {
    $auth = true;
    $elts = $_SESSION['Panier'];
    /* $conditionID = 'WHERE id_Produit IN (';
      $cpt = 0;
      foreach ($elts as $key=>$elt){
      $conditionID = $conditionID . (string)$key;
      if($cpt < count($elts) - 1)
      $conditionID = $conditionID . ', ';
      $cpt ++;
      }
      $conditionID = $conditionID . ')';
     */
    $solde_ht = 0;
    $solde_TTC = 0;
    echo'<form method="POST" action="Commande2.php"><table><tr><th>Référence</th><th>Nom</th><th>Prix</th><th>Description</th><th>Photo</th></tr>';
    foreach ($elts as $key => $elt) {
        /*         * ****************************************************** */
        //TODO : Tester si un avoir est disponible pour cet utilisateur
        /*         * ****************************************************** */
        $prod = new Produit();
        $prod->select($key);
        $solde_ht += $prod->prix_ht;
        $solde_TTC += $prod->prix_ht * 1.196;
        echo '<tr><td>' . $prod->reference . '</td>';
        echo '<td>' . $prod->nom . '</td>';
        echo '<td>' . $prod->prix_ht * 1.196 . '</td>';
        echo '<td>' . $prod->description . '</td>';
        echo '<td><img src="./Photo/' . $prod->dossier_photo . '" /></td></tr>';
    }
    echo '<tr><td colspan="4"><center>Total HT</center></td><td><center>' . $solde_ht . '</center></td></tr>';
    echo '<tr><td colspan="4"><center>Total TTC</center></td><td><center>' . $solde_TTC . '</center></td></tr>';
    echo '</table>';
    echo '<a href=\'pagedepanier.php\'>Annuler la commande et revenir au panier</a>';
    echo '<input type=\'submit\' name=\'submit\' id=\'submit\' value=\'Confirmer la commande\'/>';
    echo '</form>';
}
//Fin de zone
/* * ****************************************************** */
//Zone commande confirmé
/* * ****************************************************** */
/*if (isset($_POST['submit'])) {
    if ((!isset($_SESSION['ID']) || empty($_SESSION['ID'])) && (!isset($_POST['connMail']) || !isset($_POST['nom']))) {
        echo 'if1';
        //header('Location : ', './auth.php');
        //echo "<script>alert('Faut se connecter oh!');</script>";
        $auth = false;
    } else if (isset($_POST['connMail']) && isset($_POST['nom'])){
        //echo 'if2' . $_SESSION['ID'], $_POST['connMail'], $_POST['nom'];
        $auth = true;
    }else $auth = true;
}
if (isset($_POST['connMail']) && $_POST['connMail'] != "") {
    echo 'if4';
    $user = new Utilisateur();
    try {
        $user->selectWMail($_POST['connMail']);
    } catch (Exception $e) {
        echo '<script>alert("nom mais tu n existe pas!!");</script>';
    }    
    if (isset($user->mdp) && $user->mdp == MD5($_POST['connMdp'])) {
        echo '<script>alert("Connecté");</script>';
        $_SESSION['ID'] = $user->id_user;
        $_SESSION['Nom'] = $user->nom;
        $_SESSION['Statut'] = $user->is_admin;
        $_SESSION['Mail'] = $user->email;
    }else{
        echo('Erreur Login/Mot de pass');
    }
}else if (isset($_POST['nom']) && $_POST['nom'] != "") {
        echo 'if3';
        $newUser = new Utilisateur();
        if ($newUser->checkMail($_POST['mail'])) {
            $newUser->nom = mysql_real_escape_string($_POST['nom']);
            $newUser->prenom = mysql_real_escape_string($_POST['prenom']);
            $newUser->email = mysql_real_escape_string($_POST['mail']);
            $newUser->mdp = MD5($_POST['paswd']);
            $newUser->adresse_postale = mysql_real_escape_string($_POST['adresse']);
            $newUser->complement_adresse = mysql_real_escape_string($_POST['adresseComp']);
            $newUser->cp = $_POST['cp'];
            $newUser->pays = mysql_real_escape_string($_POST['pays']);
            $newUser->date_inscription = date('Y-m-d');
            $newUser->insert();
        }
        else
            echo '<script>alert("deja le mail gros!");</script>';
    }
//Fin de zone
/*******************************************************************/
//Zone utilisateur enregistré
/*******************************************************************/
/*
if($auth == TRUE){
    $allTransporteur = new Transporteur();
    $result = $allTransporteur->selectAll();
    echo gettype($result);
    echo '<table>';
    echo '<tr>';
    echo '<th></th>';
    echo '<th>Transporteur</th>';
    echo '<th>Description</th>';
    echo '<th>Prix</th>';
    echo '</tr>';
    //while ($row = mysql_fetch_array($result)){
    for ($i = 0 ; $i < count($result); $i ++){
        print $result[$i]['nom'];
        echo '<tr><td>';
        echo '<img src="'.$result[$i]['image'].'"/>';
        echo '</td><td>';
        echo $result[$i]['nom'];
        echo '</td><td>';
        echo $result[$i]['description'];
        echo '</td><td>';
        echo $result[$i]['prix'];
        echo '</td><td>';
        echo '<input type="radio" name="selectRow" value="'.$result[$i]['id_transporteur'].'"/>';
        echo '</td></tr>';
        }
    
}
?>*/?>
<!--<div id='inscription'>
    <table>
        <tr>
            <td>
                <h2>Nouvel utilisateur?</h2>
                <h3>Inscrivez vous!</h3>
                <form name="inscriptionUtilisateur" method="POST"></br>
                    nom<input type="text" id="nom" name="nom"/></br>
                    prenom<input type="text" id="prenom" name="prenom"/></br>
                    mail<input type="text" id="mail" name="mail"/></br>
                    pass<input type="password" id="paswd" name="paswd"/>    </br>
                    passconf<input type="password" id="paswdConfirm" name="paswdConfirm"/></br>
                    adresse<input type="text" id="adresse" name="adresse"/></br>
                    compadresse<input type="text" id="adresseComp" name="adresseComp"/></br>
                    cp<input type="text" id="cp" name="cp"/></br>
                    pays<input type="text" id="pays" name="pays"/></br>
                    <input type="submit" id="submit2" name="submit2"/></br>
                </form>
            </td>
            <td>
                <form method="POST">
                    <input type="text" id="connMail" name="connMail"/></br>
                    <input type="password" name="connMdp" id="connMdp"/></br>
                    <input type="submit" name="submit3" id="submit3"/>
                </form>
            </td>
        </tr>
    </table>
</div>
<script>
    //function afficheInsription() {
        if (<?php //echo $auth; ?> == 0) {
            alert('inline');
            document.getElementById('inscription').style.display = 'inline';
        }
        else
            document.getElementById('inscription').style.display = 'none';
    //}
    //window.onload = afficheInsription();
</script>-->


<?php
include("./Class/Utilisateur.php");
//session_start();
if(isset($_SESSION['Nom']) && $_SESSION['Nom'] != ""){
    $user = new Utilisateur();
    $user->select($_SESSION['ID']);
    echo '<table><tr><td>';
    echo 'Votre Nom';
    echo '</td><td>';
    echo $user->nom;
    echo '</td></tr><tr><td>';
    echo 'Votre prénom';
    echo '</td><td>';
    echo $user->prenom;
    echo '</td></tr><tr><td>';
    echo '</td></tr><tr><td>';
    echo 'Votre adresse mail';
    echo '</td><td>';
    echo $user->email;
    echo '</td></tr><tr><td>';
    echo '</td></tr><tr><td>';
    echo 'Votre adresse';
    echo '</td><td>';
    echo $user->adresse_postale;
    if($user->complement_adresse != "")
        echo '<br>' . $user->complement_adresse;
    echo '<br>' . $user->cp;
    echo '<br>' . $user->pays;
    echo '</td></tr><tr><td>';
    echo 'Votre date d\'inscription';
    echo '</td><td>';
    echo $user->date_inscription;
    echo '</td></tr></table>';          
}else{
    echo '<h1>margoulette hunter!!</h1>';
    //TODO : redirection vers page authentification même si cela ne devrais jamais arrivé!
}

if (isset($_SESSION['UserID']))
    echo 'vous êtes déjà inscrit sur ce site!';
if (isset($_POST['nom']) && $_POST['nom'] != ""){
    $newUser = new Utilisateur();
    if($newUser->checkMail($_POST['mail'])){
        echo 'le cheval sautillant';
        //$newUser = new Utilisateur();
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
    }else echo '<script>alert("deja le mail gros!");</script>';
}
else if (isset($_POST['connMail']) && $_POST['connMail'] != ""){
    $user = new Utilisateur();
    echo"zdvfaevzerv";
    try{
        $user->selectWMail($_POST['connMail']);
    }catch(Exception $e){
        echo '<script>alert("nom mais tu n existe pas!!");</script>';
    }
    if($user->mdp == MD5($_POST['connMdp'])){
        echo"azefazf222";
        echo '<script>alert("Connecté");</script>';

        $_SESSION['ID'] = $user->id_user;
        $_SESSION['Nom'] = $user->nom;
        $_SESSION['Statut'] = $user->is_admin;
        $_SESSION['Mail'] = $user->email;
        foreach($_SESSION as $cell){
            echo $cell;           
        }
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>function checkInfo(){
    //if(document.getElementById("nom").Text !== "")
    //alert('c est bon tu le fera plus tard');
}</script>
<h1>Page d inscription de GrindHouse Leather</h1>
<div>
<form name="inscriptionUtilisateur" method="POST">
    nom<input type="text" id="nom" name="nom"/>
    prenom<input type="text" id="prenom" name="prenom"/>
    mail<input type="text" id="mail" name="mail"/>
    pass<input type="password" id="paswd" name="paswd"/>    
    passconf<input type="password" id="paswdConfirm" name="paswdConfirm"/>
    adresse<input type="text" id="adresse" name="adresse"/>
    compadresse<input type="text" id="adresseComp" name="adresseComp"/>
    cp<input type="text" id="cp" name="cp"/>
    pays<input type="text" id="pays" name="pays"/>
    <input type="submit" id="submit" name="submit" onClick="checkInfo()"/>
</form>
</div>
<div>
    <form method="POST">
        <input type="text" id="connMail" name="connMail"/>
        <input type="password" name="connMdp" id="connMdp"/>
        <input type="submit" name="submit2" id="submit2"/>
    </form>
</div>
<div>
    <INPUT type="button" id="afficher_infos" onclick="afficheInfos();"
</div>
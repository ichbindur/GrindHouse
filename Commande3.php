<?php
include 'Class/Utilisateur.php';
session_start();
if (isset($_POST['nom']) && isset($_POST['mail'])) {
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
        $_SESSION['ID'] = $newUser->id_user;
        $_SESSION['Nom'] = $newUser->nom;
        $_SESSION['Statut'] = $newUser->is_admin;
        $_SESSION['Mail'] = $newUser->email;
    }
    else
        header('Location: ./Commande2.php?action=back');
}else if (isset($_POST['connMail']) && isset($_POST['connMdp'])) {
    if ($_POST['connMail'] != '' && $_POST['connMdp'] != '') {
        $user = new Utilisateur();
        try {
            $user->selectWMail($_POST['connMail']);
        } catch (Exception $e) {
            echo 'Erreur de connexion : '.$e;
        }
        if ($user->mdp == MD5($_POST['connMdp'])) {
            $_SESSION['ID'] = $user->id_user;
            $_SESSION['Nom'] = $user->nom;
            $_SESSION['Statut'] = $user->is_admin;
            $_SESSION['Mail'] = $user->email;
        }else{
            header('Location: ./Commande2.php?action=back2');
        }
    }
}
if(isset($_POST['valideModif'])){
    $userModifAdr = new Utilisateur();
    $userModifAdr->select($_SESSION['ID']);
    $userModifAdr->nom = $_POST['nom2'];
    $userModifAdr->prenom = $_POST['prenom2'];
    $userModifAdr->adresse_postale = $_POST['adresse_postale2'];    
    $userModifAdr->complement_adresse = $_POST['complement_adresse2'];    
    $userModifAdr->ville = $_POST['ville2'];        
    $userModifAdr->cp = $_POST['cp2'];    
    $userModifAdr->pays = $_POST['pays2'];    
    $userModifAdr->update($_SESSION['ID']);
}
/*******************************************************************/
//Affichage de l'adresse de l'utilisateuir
/*******************************************************************/
if(isset($_SESSION['ID']) && isset($_SESSION['Panier'])){
    $userAchat = new Utilisateur();
    $userAchat->select($_SESSION['ID']);
    echo $userAchat->nom .' '. $userAchat->prenom .'</br>';
    echo $userAchat->adresse_postale.'</br>';
    if($userAchat->complement_adresse != ''){
        echo $userAchat->complement_adresse.'</br>';
    } 
    echo $userAchat->cp.'</br>';
    echo $userAchat->ville.'</br>';
    echo $userAchat->pays.'</br>';
}
?>
<script>    
    function afficheModifInfos(){
       document.getElementById('modifInfos').style.display = 'inline';
    }
</script>
<form method="POST" action="./Commande4.php">
    Ces informations sont elles corectes?
    <input type="submit" value="Oui" name="adrOk"/>
</form>
<input type="button" value="Non" name="adrPasOk" onclick="afficheModifInfos();"/>

<div id="modifInfos" style="display: none;"/>
    <form method="POST">
        <input type="text" name="nom2" value="<?php echo $userAchat->nom; ?>"/>
        <input type="text" name="prenom2" value="<?php echo $userAchat->prenom; ?>"/>        
        <input type="text" name="adresse_postale2" value="<?php echo $userAchat->adresse_postale; ?>"/>        
        <input type="text" name="complement_adresse2" value="<?php echo $userAchat->complement_adresse; ?>"/>        
        <input type="text" name="ville2" value="<?php echo $userAchat->ville; ?>"/>        
        <input type="text" name="cp2" value="<?php echo $userAchat->cp; ?>"/>        
        <input type="text" name="pays2" value="<?php echo $userAchat->pays; ?>"/>
        <input type="submit" name="valideModif"/>
    </form>
</div>
<?php
include 'Class/Utilisateur.php';

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
    echo '<script>alert("début de connexion");</script>';    
    if ($_POST['connMail'] != '' && $_POST['connMdp'] != '') {
        $user = new Utilisateur();
        try {
            $user->selectWMail($_POST['connMail']);
        } catch (Exception $e) {
            echo 'Erreur de connexion : '.$e;
        }
        if ($user->mdp == MD5($_POST['connMdp'])) {
            echo '<script>alert("Connecté");</script>';
            $_SESSION['ID'] = $user->id_user;
            $_SESSION['Nom'] = $user->nom;
            $_SESSION['Statut'] = $user->is_admin;
            $_SESSION['Mail'] = $user->email;
        }
    }
}else{
    /*********************************************************/
    //REDIRECTION VERS LA PAGE D ACCUEIL AVEC PARAMETRE GET PERMETTANT D4INDIQUER L4ERREUR
    /*********************************************************/
    header('Location: /index.php');
}
if(isset($_SESSION['ID']) && isset($_SESSION['Panier'])){
    echo '<script>alert("Affichage des information adresse")</script>';
    $userAchat = new Utilisateur();
    $userAchat->select($_SESSION['ID']);
    echo $userAchat->nom;
}
?>

<?php
include_once("./Class/Utilisateur.php");
/* * *********************************************** */
//Zone affichage information
/* * *********************************************** */
if (isset($_SESSION['Nom']) && $_SESSION['Nom'] != "") {
    $user = new Utilisateur();
    $user->select($_SESSION['ID']);
    echo '<fieldset><legend>Information utilisateur :</legend><table><tr><td>';
    echo 'Votre Nom';
    echo '</td><td>';
    echo $user->nom;
    echo '</td></tr><tr><td>';
    echo 'Votre prénom';
    echo '</td><td>';
    echo $user->prenom;
    echo '</td></tr><tr><td>';
    echo '</td></tr><tr><td>';
    echo 'Votre email';
    echo '</td><td>';
    echo $user->email;
    echo '</td></tr><tr><td>';
    echo '</td></tr><tr><td>';
    echo 'Votre adresse';
    echo '</td><td>';
    echo $user->adresse_postale;
    if ($user->complement_adresse != "")
        echo '<br>' . $user->complement_adresse;
    echo '<br>' . $user->cp;
    echo '<br>' . $user->pays;
    echo '</td></tr><tr><td>';
    echo 'Votre date d\'inscription';
    echo '</td><td>';
    echo $user->date_inscription;
    echo '</td></tr><tr><td></table></fieldset>';
}else {
    //TODO : redirection vers page authentification même si cela ne devrais jamais arrivé!
}
//FIn de zone
?>

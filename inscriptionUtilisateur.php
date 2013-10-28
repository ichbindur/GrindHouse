
<?php
session_start();
include("./Class/Utilisateur.php");
include("./Class/JetonMotDePasse.php");

/**************************************************/
//Zone affichage information
/**************************************************/
if(isset($_SESSION['Nom']) && $_SESSION['Nom'] != ""){
    $user = new Utilisateur();
    $user->select($_SESSION['ID']);
    echo '<fieldset><legend>Information utilisateur</legend><table><tr><td>';
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
    echo '</td></tr><tr><td></table></fieldset>';          
}else{
    //TODO : redirection vers page authentification même si cela ne devrais jamais arrivé!
}
//FIn de zone

/**************************************************/
//Zone inscription
/**************************************************/

if (isset($_SESSION['UserID']))
    echo 'vous êtes déjà inscrit sur ce site!';
if (isset($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['paswd']) && $_POST['nom'] != ""){
    $newUser = new Utilisateur();
    if ($_POST['paswd'] == $_POST['paswdConfirm'] ){
        if($newUser->checkMail($_POST['mail'])){
            $newUser->nom = mysql_real_escape_string($_POST['nom']);
            $newUser->prenom = mysql_real_escape_string($_POST['prenom']);
            $newUser->email = mysql_real_escape_string($_POST['mail']);
            $newUser->mdp = MD5($_POST['paswd']);
            $newUser->adresse_postale = mysql_real_escape_string($_POST['adresse']);
            $newUser->complement_adresse = mysql_real_escape_string($_POST['adresseComp']);
            $newUser->ville = mysql_real_escape_string($_POST['ville']);
            $newUser->cp = $_POST['cp'];
            $newUser->pays = mysql_real_escape_string($_POST['pays']);
            $newUser->date_inscription = date('Y-m-d');
            $newUser->telephone = mysql_real_escape_string($_POST['telephone']);
            $newUser->insert(); ?>
            <script language="JavaScript">
                window.location='InscrWin.php'
            </script>
            <?php 
        }else echo '<script>alert("deja le mail gros!");</script>';
    }else echo '<script>alert("Le mot de passe entré ne correspond pas à celui confirmé !");</script>'; 
           
        }
//Fin de zone
/**************************************************/
//Zone modification des infos information
/**************************************************/
if(isset($_POST['modNom']) && $_POST['modNom'] != ""){
    if($user->nom != trim($_POST['modNom']))
        $user->nom = trim($_POST['modNom']);
    if($user->prenom != trim($_POST['modPrenom']) && $_POST['modPrenom'] != "")
        $user->prenom = trim($_POST['modPrenom']);
    if($user->email != trim($_POST['modMail']) && $_POST['modMail'] != "")
        $user->email = trim($_POST['modMail']);
    if($user->adresse_postale != trim($_POST['modAdresse']) && $_POST['modAdresse'] != "")
        $user->adresse_postale = trim($_POST['modAdresse']);
    if($user->complement_adresse != trim($_POST['modAdresseComp']) && $_POST['modAdresseComp'] != "")
        $user->complement_adresse = trim($_POST['modAdresseComp']);
    if($user->cp != trim($_POST['modCp']) && $_POST['modCp'] != "")
        $user->cp = trim($_POST['modCp']);
    if($user->pays != trim($_POST['modPays']) && $_POST['modPays'] != "")
        $user->pays = trim($_POST['modPays']);
    if($user->telephone != trim($_POST['modTelephone']) && $_POST['modTelephone'] != "")
        $user->telephone = trim($_POST['modTelephone']);
    
    $user->update($user->id_user);
}
//Fin de zone

/**************************************************/
//Zone modification du mot de passe
/**************************************************/
if(isset($_POST['modMdpAncien']) && $_POST['modMdpAncien'] != ""){
    if(MD5($_POST['modMdpAncien']) == $user->mdp){
        if(MD5($_POST['modMdp']) != $user->mdp){
            if($_POST['modMdp'] == $_POST['modMdpConf']){
                $user->mdp = MD5($_POST['modMdp']);
                $user->update($user->id_user);
            }else echo '<script>alert("Les mot de passe ne sont pas identiques")</script>';  
        }else echo '<script>alert("Ce mot de passe est le même que l ancien")</script>';
    }
}
//Fin de zone

/**************************************************/
//Zone mot de passe perdu jeton
/**************************************************/
if(isset($_POST['jeton']) && $_POST['jeton'] != ""){
    $guid = new JetonMotDePasse();    
    try{
        $guid->selectWGuid($_POST['jeton']);
        if($guid->is_used == 0){
            $userMdp = new Utilisateur();
            echo '<script>alert("'. $guid->adresse_user .'")</script>';
            $userMdp->selectWMail(trim($guid->adresse_user));
            if($_POST['modMdpLost'] == $_POST['modMdpConfLost']){
                    $userMdp->mdp = MD5($_POST['modMdpLost']);
                    $userMdp->update($userMdp->id_user);
                    $guid->is_used = 1;
                    $guid->update($guid->is_used);
                }else echo '<script>alert("Les mot de passe ne sont pas identiques")</script>';
        }else echo '<script>alert("Votre jeton n est pas valide");</script>';
    }catch(Exception $e){
        echo '<script>alert("Votre jeton n est pas valide");</script>';
    }
}
//Fin de zone

/**************************************************/
//Zone demande pour mot de passe perdu
/**************************************************/
if(isset($_POST['mailLost']) && $_POST['mailLost'] != ""){
    $userMdp = new Utilisateur();
    try{
        $userMdp->selectWMail($_POST['mailLost']);    
        if($userMdp->email != ""){
            $newGuid = new JetonMotDePasse();
            $newGuid->adresse_user = $_POST['mailLost'];
            $newGuid->createGuid();
            $to = $userMdp->email;
            $subjet = 'GrindHouse Leather Mot de passe perdu';
            $msg = 'Bonjour, \r\n';
            //TODO : Bien faire le message
            $msg += 'Suite à votre demande de changement de mot de passe nous vous envoyons.... \r\n';
            $msg += $newGuid->guid_jeton;
            $headers = 'From: GrindHouse Leather <grindhouseleather@ghl.com>'."\r\n";
            mail($to, $subjet, $msg, $headers);
            $newGuid->insert();
            echo $newGuid->guid_jeton;    
        }else echo '<script>alert("L adresse mail est invalide");</script>';
    }catch(Exception $e){
        echo '<script>alert("L adresse mail est invalide");</script>';
    }     
}
//Fin de zone
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<input type="hidden" value="0" id="session"/>
<!--<h1>Page d inscription de GrindHouse Leather</h1>
<div>
    <fieldset>
        <legend>Inscription</legend>
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
    </fieldset>
</div>-->
<div>
    <fieldset>
        <legend>Connexion</legend>
        <form method="POST">
            <input type="text" id="connMail" name="connMail"/>
            <input type="password" name="connMdp" id="connMdp"/>
            <input type="submit" name="submit2" id="submit2"/>
        </form>
    </fieldset>
</div>
<div>
    <fieldset>
        <legend>Modification des informations</legend>
        <form method="POST">
            nom<input type="text" id="modNom" name="modNom" value="<?php if(isset($user) && $user->nom != "") echo $user->nom; ?>"/>
            prenom<input type="text" id="modPrenom" name="modPrenom" value="<?php if(isset($user) && $user->prenom != "") echo $user->prenom; ?>"/>
            mail<input type="text" id="modMail" name="modMail" value="<?php if(isset($user) && $user->email != "") echo $user->email; ?>"/>
            adresse<input type="text" id="modAdresse" name="modAdresse" value="<?php if(isset($user) && $user->adresse_postale != "") echo $user->adresse_postale; ?>"/>
            compadresse<input type="text" id="modAdresseComp" name="modAdresseComp" value="<?php if(isset($user) && $user->complement_adresse != "") echo $user->complement_adresse; ?>"/>
            cp<input type="text" id="modCp" name="modCp" value="<?php if(isset($user) && $user->cp != "") echo $user->cp; ?>"/>
            pays<input type="text" id="modPays" name="modPays" value="<?php if(isset($user) && $user->pays != "") echo $user->pays; ?>"/>
            <input type="submit" name="submi3" id="submit3"/>
        </form>
    </fieldset>
</div>
<div>
    <fieldset>
        <legend>Modification du mot de passe</legend>
        <form method="POST">
            <input type="password" id="modMdpAncien" name="modMdpAncien"/>
            <input type="password" id="modMdp" name="modMdp"/>
            <input type="password" id="modMdpConf" name="modMdpConf"/>
            <input type="submit" name="submit4" id="submit4"/>
        </form>
    </fieldset>
</div>
<div>
    <fieldset>
        <legend>Mot de passe perdu demande de changement</legend>
        <form method="POST">            
            Mot de passe perdu? 
            <input type="text" name="mailLost" id ="mailLost"/>
            <input type="submit" name="submit6" Value="Jeton" id="submit6"/>
        </form>
    </fieldset>
</div>
<div>
    <fieldset>
        <legend>Mot de passe perdu</legend>
        <form method="POST">
            jeton<input type="text" id="jeton" name="jeton"/>
            <input type="password" id="modMdpLost" name="modMdpLost"/>
            <input type="password" id="modMdpConfLost" name="modMdpConfLost"/>
            <input type="submit" name="submit5" id="submit5"/>
        </form>
    </fieldset>
</div>

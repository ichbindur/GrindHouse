<?php
session_start();

include 'Class/Produit.php';
include 'Class/Transporteur.php';
include 'Class/Utilisateur.php';
include 'Class/Commande.php';
include 'Class/ACommande.php';


$contentForPdf = '<page>';
/*********************************************************/
//Récapitulatif de commande / Facture
/*********************************************************/
if(isset($_SESSION['Panier'], $_SESSION['ID'])){
    $coutTotal = 0;
    $contentForPdf .= '<table>'
    . '<tr>
        <th>Nom</th>
        <th>Photo</th>    
        <th>Quantité</th>    
        <th>Prix HT</th>
        <th>Prix TTC</th>
    </tr>';
    echo '<table>'
    . '<tr>
        <th>Nom</th>
        <th>Photo</th>    
        <th>Quantité</th>    
        <th>Prix HT</th>
        <th>Prix TTC</th>
    </tr>';
    foreach ($_SESSION['Panier'] as $item => $nb) {
        $prod = new Produit();
        $prod->select($item);
        $contentForPdf .='<tr>'
        . '<td>'. $prod->nom . '</td>'
        . '<td><img src="./Photo/'.$prod->dossier_photo .'"/></td>'
        . '<td>'. $nb .'</td>'
        . '<td>' . $prod->prix_ht * $nb . '</td>'
        . '<td>' . $prod->prix_ht * $nb * 1.196. '</td>'
        . '</tr>';
        echo '<tr>'
        . '<td>'. $prod->nom . '</td>'
        . '<td><img src="./Photo/'.$prod->dossier_photo .'"/></td>'
        . '<td>'. $nb .'</td>'
        . '<td>' . $prod->prix_ht * $nb . '</td>'
        . '<td>' . $prod->prix_ht * $nb * 1.196. '</td>'
        . '</tr>';
        $coutTotal .= $prod->prix_ht * $nb * 1.196;
    }
    $total = intval($_SESSION['Transporteur'][1]) + $coutTotal;
    $contentForPdf .='<tr><td colspan="3"></td>'
    . '<td>Cout transporteur</td>'
    . '<td>'. $_SESSION['Transporteur'][1] .'</td></tr>'
    . '<tr><td colspan="3"></td>'
    . '<td>Total</td>'
    . '<td>'. $total .'</td></tr>'
    . '</table>';
    echo '<tr><td colspan="3"></td>'
    . '<td>Cout transporteur</td>'
    . '<td>'. $_SESSION['Transporteur'][1] .'</td></tr>'
    . '<tr><td colspan="3"></td>'
    . '<td>Total</td>'
    . '<td>'. $total .'</td></tr>'
    . '</table>';
    $_SESSION['coutTotal'] = $total;
/*******************************************************************/
//Affichage de l'adresse de l'utilisateuir
/*******************************************************************/

    $userAchat = new Utilisateur();
    $userAchat->select($_SESSION['ID']);
    $contentForPdf .= $userAchat->nom .' '. $userAchat->prenom .'<br>';
    echo $userAchat->nom .' '. $userAchat->prenom .'<br>';
    $contentForPdf .= $userAchat->adresse_postale.'<br>';
    echo $userAchat->adresse_postale.'<br>';
    if($userAchat->complement_adresse != ''){
        $contentForPdf .= $userAchat->complement_adresse.'<br>';
        echo $userAchat->complement_adresse.'<br>';
    } 
    $contentForPdf .= $userAchat->cp.'<br>';
    echo $userAchat->cp.'<br>';
    $contentForPdf .= $userAchat->ville.'<br>';
    echo $userAchat->ville.'<br>';
    $contentForPdf .= $userAchat->pays.'<br>';
    echo $userAchat->pays.'<br>';    
/*******************************************************************/
//Affichage de l'adresse de l'utilisateuir
/*******************************************************************/
    $trans = new Transporteur();
    $trans->select($_SESSION['Transporteur'][0]);
    $contentForPdf .= $trans->nom;
    echo $trans->nom;
    $contentForPdf .= '</page>';
    $_SESSION['Facture'] = $contentForPdf;
    
    /******************************************************************/
    //Gestion commande/Stock
    /******************************************************************/
    if(!isset($_SESSION['commendeOk']) && isset($_SESSION['ID'])){
        $newCommande = new Commande();
        $newCommande->date_commande = date('Y-m-d');
        $newCommande->etat = 'Commande non traité';
        echo 'commande';
        $newCommande->insert();
        foreach ($_SESSION['Panier'] as $item => $nb) {
            $prod = new Produit();
            $acommande = new ACommande();
            $prod->select($item);
            $acommande->id_produit = $prod->id_produit;
            $acommande->nb_produit = $nb;
            $acommande->id_transporteur = $_SESSION['Transporteur'][0];
            $acommande->id_user = $_SESSION['ID'];
            $acommande->id_commande = $newCommande->id_commande;
            echo '  acommande';
            $acommande->insert();
            $prod->stock -= $nb;
            echo '  prod';
            $prod->update($prod->id_produit);
        }
        $_SESSION['commendeOk'] = TRUE;
    }
}
?>
</br>
<input type="button" name="facture" value="Exporter la facture?" onclick="javascript:window.open('./exportPdf.php?action=export','Export PDF'); "/>



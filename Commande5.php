<script>
    function paypal(){
        
    }
</script>
<?php
include 'Class/Produit.php';
session_start();
if(!isset($_SESSION['ID'])){
    header('Location: ./index.php');
}else if ($_SESSION['ID'] == ''){
    header('Location: ./index.php');
}
if(isset($_POST['choixTrans'])){
    $infoTrans = explode('&', $_POST['choixTrans']);
    $_SESSION['Transporteur'] = $infoTrans;
}else{
    header('Location : ./index.php');
}
/*********************************************************/
//Confirmation de commande
/*********************************************************/
if(isset($_SESSION['Panier'], $_SESSION['ID'])){
    $coutTotal = 0;
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
        echo '<tr>'
        . '<td>'. $prod->nom . '</td>'
        . '<td><img src="./Photo/'.$prod->dossier_photo .'"/></td>'
        . '<td>'. $nb .'</td>'
        . '<td>' . $prod->prix_ht * $nb . '</td>'
        . '<td>' . $prod->prix_ht * $nb * 1.196. '</td>'
        . '</tr>';
        $coutTotal += $prod->prix_ht * $nb * 1.196;
    }
    $total = intval($infoTrans[1]) + $coutTotal;
    echo '<tr><td colspan="3"></td>'
    . '<td>Cout transporteur</td>'
    . '<td>'. $infoTrans[1] .'</td></tr>'
    . '<tr><td colspan="3"></td>'
    . '<td>Total</td>'
    . '<td>'. $total .'</td></tr>'
    . '</table>';
    $_SESSION['coutTotal'] = $total;
}
?>
<input type="button" value="Confirmer la commande" onclick="javascript:location.href='Commande6.php'"/>
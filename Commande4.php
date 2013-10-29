<script>  
    function checkRadio(cpt){
        var conf = false;
        for(var i = 0; i < cpt; i ++ ){
            if(document.getElementById('choixTrans'+ i.toString()).checked){
                document.forms['formTrans'].submit();
                conf = true;
                break;
            }else conf = false;
        }
        if(!conf)
            alert('Veuillez selectionner un transporteur.');
    }
</script>
<?php
include 'Class/Transporteur.php';
include 'Class/Grille.php';
session_start();
if(!isset($_SESSION['ID'])){
    header('Location: ./index.php');
}else if ($_SESSION['ID'] == ''){
    header('Location: ./index.php');
}else if(!isset($_SESSION['PoidTotal'])){
    header('Location: ./index.php');
}else if($_SESSION['PoidTotal'] == ''){
    header('Location: ./index.php');
}
$Transporteur = new Transporteur();
$result = $Transporteur->selectall();
$cpt = 0;
echo '<table>'
    . '<form method="POST" id="formTrans" action="Commande5.php">'
        . '<tr>'
            . '<th>Transporteur</th>'
            . '<th>Description</th>'
            . '<th>Prix</th>'
            . '<th>Choix</th>'
        . '</tr>';
foreach($result as $row){
    $prix = new Grille();
    $prix->selectTransWPoids($row['id_transporteur'], $_SESSION['PoidTotal']);
    echo '<tr>'
            . '<td>' . $row['nom']. '</br><img src="'.$row['image'].'"/></td>'
            . '<td>' . $row['description'] . '</td>'
            . '<td>' . $prix->prix . '</td>'
            . '<td><input type="radio" name="choixTrans" id="choixTrans'.$cpt.'" value="' . $row['id_transporteur'] . '&'. $prix->prix .'"/></td>'
        . '</tr>';
    $cpt ++;
}
echo '</table>';
echo '<input type="button" name="confirmTrans" value="Valider" onclick="checkRadio('.$cpt.');"/>';
echo '</form>';
echo 'fin';
?>

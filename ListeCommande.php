<?php include_once ("./Class/Commande.php");
    include_once ("./Class/ACommande.php");
    include_once ("./Class/Produit.php");
    if (isset($_SESSION['ID'])) {
            if ($_SESSION['ID'] != '') {
                $commande = new Commande();
                $allCommande = $commande->selectallWUser($_SESSION['ID']);
                if (!empty($allCommande)) {
                    echo '<table>';
                    foreach ($allCommande as $rows) {
                        $cpt = 0;
                        $acommande = new ACommande();
                        $allACommande = $acommande->selectallWUser($rows['id_commande']);
                        echo '<tr><td rowspan="'.count($allACommande).'"/>';
                        echo 'Identifiant de la commande : '.$rows['id_commande'];
                        echo '<br>Etat : '.$rows["etat"];
                        echo '</td>';
                        foreach ($allACommande as $itemRows) {
                            if($cpt != 0)
                                echo '<tr>';
                            echo '<td>';
                            $prod = new Produit();
                            $prod->select($itemRows['id_produit']);
                            echo $prod->nom. '<br>';
                            echo $prod->prix_ht * 1.196.'€';
                            echo '</td>';                    
                            echo '</tr>';
                            $cpt ++;
                        }
                    }
                    echo '</table>';
                }
            }
        } ?>

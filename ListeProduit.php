<?php
include 'class/Produit.php';
if (isset($_GET['type_p']) && isset($_GET['cat'])) {
    $type_p = $_GET['type_p'];
    $cat = $_GET['cat'];
    $Produit = new Produit();
    if (isset($_POST['recherche'])) {
        if ($_POST['recherche'] != '' && $_POST['recherche'] != 'Recherche...') {
            $filtre = "AND description like '%" . $_POST['recherche'] . "%' OR nom like '%" . $_POST['recherche'] . "%' OR reference like '%" . $_POST['recherche'] . "%'";
            $ProduitTab = $Produit->selecttype_pcatWFiltre($type_p, $cat, $filtre);
        }
        else
            $ProduitTab = $Produit->selecttype_pcat($type_p, $cat);
    }
    else
        $ProduitTab = $Produit->selecttype_p($type_p, $cat);
    if (count($ProduitTab) > 0) {
        for ($i = 0; $i < count($ProduitTab); $i++) {
            ?>
            <div class="produit_catalogue">
                <a href="fiche_produit.php?&xd=<?php echo $ProduitTab[$i]['id_produit']; ?> " ><img src='./Photo/<?php echo $ProduitTab[$i]['dossier_photo']; ?>'/></a>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="produit_catalogue" style="width:800px;">
            <span>Aucun produit disponible pour ces critères</span>
        </div>
        <?php
    }
} else if (isset($_GET['type_p'])) {
    $type_p = $_GET['type_p'];
    $Produit = new Produit();
    if (isset($_POST['recherche'])) {
        if ($_POST['recherche'] != '' && $_POST['recherche'] != 'Recherche...') {
            $filtre = "AND description like '%" . $_POST['recherche'] . "%' OR nom like '%" . $_POST['recherche'] . "%' OR reference like '%" . $_POST['recherche'] . "%'";
            $ProduitTab = $Produit->selecttype_pWFiltre($type_p, $filtre);
        }
        else
            $ProduitTab = $Produit->selecttype_p($type_p);
    }
    else
        $ProduitTab = $Produit->selecttype_p($type_p);
    if (count($ProduitTab) > 0) {
        for ($i = 0; $i < count($ProduitTab); $i++) {
            ?>
            <div class="produit_catalogue">
                <a href="fiche_produit.php?&xd=<?php echo $ProduitTab[$i]['id_produit']; ?> " ><img src='./Photo/<?php echo $ProduitTab[$i]['dossier_photo']; ?>'/></a>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="produit_catalogue" style="width:800px;">
            <span>Aucun produit disponible pour ces critères</span>
        </div>
        <?php
    }
} else {
    $Produit = new Produit();
    if (isset($_POST['recherche'])) {
        if ($_POST['recherche'] != '' && $_POST['recherche'] != 'Recherche...') {
            $filtre = "description like '%" . $_POST['recherche'] . "%' OR nom like '%" . $_POST['recherche'] . "%' OR reference like '%" . $_POST['recherche'] . "%'";
            echo '<script>alert(' . $filtre . ')</script>';
            $ProduitTab = $Produit->selectWFiltre($filtre);
        }
        else
            $ProduitTab = $Produit->selectall();
    }
    else
        $ProduitTab = $Produit->selectall();
    if (count($ProduitTab) > 0) {
        for ($i = 0; $i < count($ProduitTab); $i++) {
            ?>
            <div class="produit_catalogue">
                <a href="fiche_produit.php?&xd=<?php echo $ProduitTab[$i]['id_produit']; ?> " ><img src='./Photo/<?php echo $ProduitTab[$i]['dossier_photo']; ?>'/></a>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="produit_catalogue" style="width:800px;">
            <span>Aucun produit disponible pour ces critères</span>
        </div>
        <?php
    }
}
?>
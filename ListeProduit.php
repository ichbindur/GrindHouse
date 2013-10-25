<?php 
include 'class/Produit.php';
$type_p = $_GET['type_p'];
$Produit = new Produit();
$ProduitTab = $Produit->selecttype_p($type_p);
for ($i=0 ; $i < count($ProduitTab) ; $i++) { ?>
    <div class="produit_catalogue">
        <img src='./Photo/<?php echo $ProduitTab[$i]['dossier_photo']; ?>'/>
    </div>
<?php }
?>
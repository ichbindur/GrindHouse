<?php
$type_p = $_GET['type_d'];
$Produit = new Produit();
$ProduitTab = $Produit->selecttype_p($type_p);
for ($i=0 ; $i < count($ProduitTab) ; $i++) { ?>
   <img src='./Photo/<?php echo $ProduitTab[$i]['dossier_photo']; ?>' width="100%"/>
<?php } 
?>
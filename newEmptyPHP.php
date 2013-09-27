<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Back_Office</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>        
        <script type='text/javascript' src='./js/jquery.js'></script>
        <script type='text/javascript' src='./datatables/media/js/jquery.dataTables.js'></script>
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/bootstrap.css'/>
        <link rel="stylesheet" type='text/css' href='./datatables/media/css/jquery.dataTables.css'/>
    </head>
    <body>
       <?php
       include './Class/Produit.php';
       ?>
       <table id='produit' cellpadding="0" cellspacing="0" border="0" class="bordered-table zebra-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Référence</th>
                    <th>Prix HT</th>
                    <th>Prix TTC</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $produit = new Produit();
                $produit = $produit->selectall();
                foreach ($produit as $row) {
                    ?>
                    <tr class="odd gradeX">
                        <td> <img src='./Photo/Transporteur<?php echo $row['dossier_photo']; ?>'></td>
                        <td>  <?php echo $row['nom']; ?></td>
                        <td>  <?php echo $row['reference']; ?></td>
                        <td>  <?php echo $row['prix_ht']; ?></td>
                        <td>  <?php echo $row['prix_ht'] * 1.196; ?></td>
                        <td>  <?php echo $row['description']; ?></td>
                        
                    </tr>                
                <?php } ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#produit').dataTable({
                    "sDom": "<'row'<'span8'l><'span8'f>r>t<'row'<'span8'i><'span8'p>>"
                });
            });
        </script>
    </body>
</html>
    
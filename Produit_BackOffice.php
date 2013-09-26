<?php
include ('./class/Produit.php');
$prod = new Produit();
//$prod->connexion();

if(isset($_POST['reference'], $_POST['nom'], $_POST['prix_ht'], $_POST['description'], $_POST['poids'], $_POST['dim_larg'], $_POST['dim_long'], $_POST['is_venteprivee'],
        $_POST['promo'], $_POST['promo_vp'], $_POST['stock']))
{
    $prod = new Produit();
    $prod->setreference($_POST['reference']);
    $prod->setnom($_POST['nom']);
    $prod->setprix_ht($_POST['prix_ht']);
    $prod->setdescription($_POST['description']);
    $prod->setpoids($_POST['poids']);
    $prod->setdim_larg($_POST['dim_larg']);
    $prod->setdim_long($_POST['dim_long']);
    $prod->setis_venteprivee($_POST['is_venteprivee']);
    $prod->setpromotion($_POST['promo']);
    $prod->setpromotion_vp($_POST['promo_vp']);
    $prod->setstock($_POST['stock']);
    $prod->setdossier_photo($_FILES['dossier_photo']);
    
    
    //------AJOUT DE L'IMAGE SUR LE SERVEUR------//
    
    $fileName = $_FILES["dossier_photo"]["name"]; 
    $fileTmpLoc = $_FILES["dossier_photo"]["tmp_name"];
    $pathAndName = 'Photo/'.$fileName;
    move_uploaded_file($fileTmpLoc,$pathAndName);
    $prod->setdossier_photo($fileName);
    
    //------AJOUT DU NOUVEAU PRODUIT------//
    
    $prod->insert();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Back_Office</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <SCRIPT  type="text/javascript"> 
            function dropAdd()
            {        
                var elements = document.getElementsByClassName('pg_notify');
                for (var i = 0; i < elements.length; i++)
                {
                    elements[i].style.display = 'none';
                }
            }
            function DeleteRow()
            {
                var row = $('#tt').datagrid('getSelected');
                if (row)
                {
                    alert('Item ID:'+row.itemid+"\nPrice:"+row.listprice);
                }
            }
        </SCRIPT>
        <style>
            .image_css img{width: 100%;}
        </style>
    </head>
    <body onLoad="dropAdd()">
        <form id="form" method="POST" enctype="multipart/form-data">
            <div>	
		<label for="identifiant">Référence:</label>
                <input type="text" id="reference" name="reference" value=""><br/>
            </div>
				
            <div>
		<label>Nom:</label>
		<input type="text" id="nom" name="nom" value=""><br/>
            </div>	
				
            <div>	
		<label>Prix HT:</label>
		<input type="text" id="prix_ht" name="prix_ht" value=""/>
            </div>
				
            <div>
		<label>Description:</label>
                <textarea id="description" name="description"></textarea>
            </div>
				
            <div>
		<label>Poids (gramme):</label>
		<input type="text" id="poids" name="poids" value=""/>
            </div>
				
            <div>
		<label>Vente privée:</label>
                    <span>
                        <input type="radio" name="is_venteprivee" value="1"/>Oui
			<input type="radio" name="is_venteprivee" value="0"/>Non
                    </span>                    
            </div>
				
            <div>
		<label>Promotion(%):</label>
                <input type="text" id="promo" name="promo"/>
            </div>
				
            <div>
		<label>Promotion vente privés:</label>
                <input type="text" id="promo_vp" name="promo_vp"/>
            </div>
            
            <div>
		<label>Nombres de produit en stock:</label>
                <input type="text" id="stock" name="stock"/>
            </div>
            
            <div>
		<label>Dimension largeur(cm):</label>
                <input type="text" id="dim_larg" name="dim_larg"/>
            </div>
            
            <div>
		<label>Dimension longueur(cm):</label>
                <input type="text" id="dim_long" name="dim_long"/>
            </div>            
            
            <div>
		<label>Dossier photo:</label>
                <input type="file" id="dossier_photo" name="dossier_photo"/>
            </div>
				
            <div id="button">
		<input type="submit" id="validation" name="validation" value="Ajouter"/>
            </div>
	</form></br></br>
        <form id="form2" method="POST" enctype="application/x-www-form-urlencoded">
            <div id="img">	
		<label for="identifiant">Liste des produits:</label>
                <?php
                    require_once "./phpGrid/conf.php";
                    $dg = new C_DataGrid('SELECT * FROM produit','id_produit','produit');
                    $dg->set_col_title("id_produit", "ID Produit");
                    $dg -> set_col_width("id_produit", 100);
                    $dg->set_col_title("reference", "Référence");
                    $dg -> set_col_width("reference", 70);
                    $dg->set_col_title("nom", "Nom");
                    $dg->set_col_title("prix_ht", "Prix hors taxe");
                    $dg -> set_col_width("prix_ht", 90);
                    $dg->set_col_title("description", "Description");
                    $dg -> set_col_width("description", 500);
                    $dg->set_col_title("poids", "Poids");
                    $dg -> set_col_width("poids", 60);
                    $dg->set_col_title("is_venteprivee", "Vente privé");
                    $dg -> set_col_width("is_venteprivee", 85);
                    $dg->set_col_title("promotion", "Promotion");
                    $dg -> set_col_width("promotion", 70);
                    $dg->set_col_title("promotion_vp", "Promotion vente privé");
                    $dg -> set_col_width("promotion_vp", 120);
                    $dg->set_col_title("stock", "Stock");
                    $dg -> set_col_width("stock", 35);
                    $dg->set_col_title("dim_larg", "Dimension largeur");
                    $dg -> set_col_width("dim_larg", 105);
                    $dg->set_col_title("dim_long", "Dimension longueur");
                    $dg -> set_col_width("dim_long", 115);
                    $dg->set_col_title("dossier_photo", "Image");
                    $dg->set_col_width("dossier_photo", 200);
                    $dg->set_col_property('dossier_photo',array('classes'=>'image_css'));
                    $dg->set_col_img("dossier_photo", "./Photo/");
                    $dg-> enable_edit('FORM');
                    $dg->set_dimension(1600,600);
                    $dg->set_pagesize(40);
                    $dg->display();
                    ?>
                    <script type="text/javascript">
                    function test(){
                    jQuery("#getselected").click(function(){
                    var selr = jQuery('#grid').jqGrid('getGridParam','selrow');
                    if(selr) alert(selr);
                    else alert("No selected row");
                    return false;
                    });
                    }
                    jQuery("#setselection").click(function(){
                    jQuery('#grid').jqGrid('setSelection','10259');
                    return false;
                    });
                    </script>
                    <button onClick="test()"></button>
                ?>
            </div>
        </form>
                            
    </body>
</html>
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Produit
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Produit.php
* FOR MYSQL TABLE:  produit
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Produit
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $produit_pk_id;   // PrimaryKey de la table

var $id_produit;   // PrimaryKey de la table Produit
var $reference;   // Reference du produit
var $nom = array();   // Nom du produit
var $prix_ht;   // prix hors-taxe du produit
var $description;   // description du produit
var $poids;   // Poid du produit
var $is_venteprivee;   // Le produit est en vente dans la section "vente privé"
var $promotion;   // Le montant de la promotion proposé à tous les utilisateurs
var $promotion_vp;   // Le montant de la promotion appliqué dans la section "vente privé"
var $stock;   // Nombre de produit en stock
var $dim_larg;   // Largeur du produit
var $dim_long;   // Longueur du produit
var $dossier_photo;   // Dossier contenant toutes les photos du produit
protected $db;
var $database; // Instance de la base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

public function __construct()
{

    $this->connexion();

}


// **********************
// GETTER METHODS
// **********************


function getid_produit()
{
return $this->id_produit;
}

function getreference()
{
return $this->reference;
}

function getnom()
{
return $this->nom;
}

function getprix_ht()
{
return $this->prix_ht;
}

function getdescription()
{
return $this->description;
}

function getpoids()
{
return $this->poids;
}

function getis_venteprivee()
{
return $this->is_venteprivee;
}

function getpromotion()
{
return $this->promotion;
}

function getpromotion_vp()
{
return $this->promotion_vp;
}

function getstock()
{
return $this->stock;
}

function getdim_larg()
{
return $this->dim_larg;
}

function getdim_long()
{
return $this->dim_long;
}

function getdossier_photo()
{
return $this->dossier_photo;
}

// **********************
// SETTER METHODS
// **********************


function setid_produit($val)
{
$this->id_produit =  $val;
}

function setreference($val)
{
$this->reference =  $val;
}

function setnom($val)
{
$this->nom =  $val;
}

function setprix_ht($val)
{
$this->prix_ht =  $val;
}

function setdescription($val)
{
$this->description =  $val;
}

function setpoids($val)
{
$this->poids =  $val;
}

function setis_venteprivee($val)
{
$this->is_venteprivee =  $val;
}

function setpromotion($val)
{
$this->promotion =  $val;
}

function setpromotion_vp($val)
{
$this->promotion_vp =  $val;
}

function setstock($val)
{
$this->stock =  $val;
}

function setdim_larg($val)
{
$this->dim_larg =  $val;
}

function setdim_long($val)
{
$this->dim_long =  $val;
}

function setdossier_photo($val)
{
$this->dossier_photo =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function connexion()
{
    $connexion = new PDO("mysql:host=localhost;dbname=grindhouse", 'root', ''); // connexion à la BDD
    
    $this->db=$connexion;
}
function selectall()
{   
   
    $req=$this->db->prepare('SELECT * FROM produit');
    $req->execute();
    
    return $req->fetchAll();
    
   /* $req=$db->prepare('INSERT INTO table SET(reference = :v, ...)';
    $req->bindValue(':v',$valeurReference);
    $req->execute();
    */
}

function select($id)
{

$sql =  "SELECT * FROM produit WHERE produit_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_produit = $row->id_produit;

$this->reference = $row->reference;

$this->nom = $row->nom;

$this->prix_ht = $row->prix_ht;

$this->description = $row->description;

$this->poids = $row->poids;

$this->is_venteprivee = $row->is_venteprivee;

$this->promotion = $row->promotion;

$this->promotion_vp = $row->promotion_vp;

$this->stock = $row->stock;

$this->dim_larg = $row->dim_larg;

$this->dim_long = $row->dim_long;

$this->dossier_photo = $row->dossier_photo;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM produit WHERE produit_pk_id = $id;";
$result = $this->database->query($sql);
}

// **********************
// INSERT
// **********************

function insert()
{
/*$this->produit_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO produit ( id_produit,reference,nom,prix_ht,description,poids,is_venteprivee,promotion,promotion_vp,stock,dim_larg,dim_long,dossier_photo ) VALUES ( 
'$this->id_produit','$this->reference','$this->nom','$this->prix_ht','$this->description','$this->poids','$this->is_venteprivee','$this->promotion','$this->promotion_vp',
'$this->stock','$this->dim_larg','$this->dim_long','$this->dossier_photo' )";
  
 $result = $this->db->query($sql);*/
 

$req=$this->db->prepare("INSERT INTO produit SET id_produit = :id_produit ,reference = :reference,nom = :nom,
                                                 prix_ht = :prix_ht,description = :description,
                                                 poids = :poids,is_venteprivee = :is_venteprivee,
                                                 promotion = :promotion,promotion_vp = :promotion_vp,
                                                 stock = :stock,dim_larg = :dim_larg,
                                                 dim_long = :dim_long,dossier_photo =:dossier_photo");

$req->bindValue(':id_produit',$this->id_produit);
$req->bindValue(':reference',$this->reference);
$req->bindValue(':nom',$this->nom);
$req->bindValue(':prix_ht',$this->prix_ht);
$req->bindValue(':description',$this->description);
$req->bindValue(':poids',$this->poids);
$req->bindValue(':is_venteprivee',$this->is_venteprivee);
$req->bindValue(':promotion',$this->promotion);
$req->bindValue(':promotion_vp',$this->promotion_vp);
$req->bindValue(':stock',$this->stock);
$req->bindValue(':dim_larg',$this->dim_larg);
$req->bindValue(':dim_long',$this->dim_long);
$req->bindValue(':dossier_photo',$this->dossier_photo,PDO::PARAM_STR);



$req->execute();

//$this->produit_pk_id = mysql_insert_id($this->db->link);
    
/* $req=$db->prepare('INSERT INTO produit SET(reference = :v, ...)');
 $req->bindValue(':v',$valeurReference);
 $req->execute();
  */  
}

// **********************
// UPDATE
// **********************

function update($id)
{

$sql = " UPDATE produit SET  id_produit = '$this->id_produit',reference = '$this->reference',nom = '$this->nom',prix_ht = '$this->prix_ht',
description = '$this->description',poids = '$this->poids',is_venteprivee = '$this->is_venteprivee',promotion = '$this->promotion',
promotion_vp = '$this->promotion_vp',stock = '$this->stock',dim_larg = '$this->dim_larg',dim_long = '$this->dim_long',
dossier_photo = '$this->dossier_photo' WHERE produit_pk_id = $id ";

$result = $this->database->query($sql);

}


} // class : end

?>
<!-- end of generated class -->

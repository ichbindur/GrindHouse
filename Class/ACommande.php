
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        ACommande
* GENERATION DATE:  29.10.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.ACommande.php
* FOR MYSQL TABLE:  acommande
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class ACommande
{ 


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id_acommande;   // KEY ATTR. WITH AUTOINCREMENT

var $id_produit;   
var $id_commande;  
var $id_transporteur;  
var $id_user;   
var $nb_produit;  

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function ACommande()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid_acommande()
{
return $this->id_acommande;
}

function getid_produit()
{
return $this->id_produit;
}

function getid_commande()
{
return $this->id_commande;
}

function getid_transporteur()
{
return $this->id_transporteur;
}

function getid_user()
{
return $this->id_user;
}

function getnb_produit()
{
return $this->nb_produit;
}

// **********************
// SETTER METHODS
// **********************


function setid_acommande($val)
{
$this->id_acommande =  $val;
}

function setid_produit($val)
{
$this->id_produit =  $val;
}

function setid_commande($val)
{
$this->id_commande =  $val;
}

function setid_transporteur($val)
{
$this->id_transporteur =  $val;
}

function setid_user($val)
{
$this->id_user =  $val;
}

function setnb_produit($val)
{
$this->nb_produit =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM acommande WHERE id_acommande = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_acommande = $row->id_acommande;

$this->id_produit = $row->id_produit;

$this->id_commande = $row->id_commande;

$this->id_transporteur = $row->id_transporteur;

$this->id_user = $row->id_user;

$this->nb_produit = $row->nb_produit;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM acommande WHERE id_acommande = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id_acommande = ""; // clear key for autoincrement

$sql = "INSERT INTO acommande ( id_produit,id_commande,id_transporteur,id_user,nb_produit ) VALUES ( '$this->id_produit','$this->id_commande','$this->id_transporteur','$this->id_user','$this->nb_produit' )";
$result = $this->database->query($sql);
$this->id_acommande = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE acommande SET  id_produit = '$this->id_produit',id_commande = '$this->id_commande',id_transporteur = '$this->id_transporteur',id_user = '$this->id_user',nb_produit = '$this->nb_produit' WHERE id_acommande = $id ";

$result = $this->database->query($sql);



}


}
?>


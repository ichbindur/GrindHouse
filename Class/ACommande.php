
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        ACommande
* GENERATION DATE:  23.09.2013
* CLASS FILE:       ACommande.php
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

var $acommande_pk_id;   // primary key de la table

var $id_produit;   // PrimaryKey pkid de la tablme Produit
var $id_commande;   // Freign Key pkid de la tablme Commande
var $id_transporteur;   // Freign Key pkid de la tablme Transporteur
var $id_user;   // // Freign Key pkid de la tablme Utilisateur
var $nb_produit;   // nombre de produit pour la commande

var $database; // Instance de la base de donnée


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

$sql =  "SELECT * FROM acommande WHERE acommande_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


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
$sql = "DELETE FROM acommande WHERE acommande_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->acommande_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO acommande ( id_produit,id_commande,id_transporteur,id_user,nb_produit ) VALUES ( '$this->id_produit','$this->id_commande','$this->id_transporteur','$this->id_user','$this->nb_produit' )";
$result = $this->database->query($sql);
$this->acommande_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE acommande SET  id_produit = '$this->id_produit',id_commande = '$this->id_commande',id_transporteur = '$this->id_transporteur',id_user = '$this->id_user',nb_produit = '$this->nb_produit' WHERE acommande_pk_id = $id ";

$result = $this->database->query($sql);



}


}

?>

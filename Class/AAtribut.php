<?php
/* La grosse bite à DuDule*/
/* jzfoejfzoejfozejfojeifz
*
* -------------------------------------------------------
* CLASSNAME:        AAtribut
* GENERATION DATE:  23.09.2013
* CLASS FILE:       AAtribut.php
* FOR MYSQL TABLE:  aattribut
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class AAtribut
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $aatribut_pk_id;   // PrimaryKey

var $id_attribut;   // PrimaryKey to Attribut table
var $id_produit;   // ForeignKey to Produit table
var $valeur;   // Valeur de l'attribut

var $database; // Instance de la classe en base


// **********************
// CONSTRUCTOR METHOD
// **********************

function AAtribut()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid_attribut()
{
return $this->id_attribut;
}

function getid_produit()
{
return $this->id_produit;
}

function getvaleur()
{
return $this->valeur;
}

// **********************
// SETTER METHODS
// **********************


function setid_attribut($val)
{
$this->id_attribut =  $val;
}

function setid_produit($val)
{
$this->id_produit =  $val;
}

function setvaleur($val)
{
$this->valeur =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM aattribut WHERE aatribut_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_attribut = $row->id_attribut;

$this->id_produit = $row->id_produit;

$this->valeur = $row->valeur;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM aattribut WHERE aatribut_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->aatribut_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO aattribut ( id_attribut,id_produit,valeur ) VALUES ( '$this->id_attribut','$this->id_produit','$this->valeur' )";
$result = $this->database->query($sql);
$this->aatribut_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE aattribut SET  id_attribut = '$this->id_attribut',id_produit = '$this->id_produit',valeur = '$this->valeur' WHERE aatribut_pk_id = $id ";

$result = $this->database->query($sql);



}


}

?>


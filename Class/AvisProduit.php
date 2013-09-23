<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        AvisProduit
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.AvisProduit.php
* FOR MYSQL TABLE:  avisproduit
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class AvisProduit
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $avisproduit_pk_id;   // PrimaryKey de la table

var $id_produit;   // PrimaryKey de la table produit
var $id_avis;   // ForeignKey pkid de la table Avis

var $database; // Instance de la base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

function AvisProduit()
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

function getid_avis()
{
return $this->id_avis;
}

// **********************
// SETTER METHODS
// **********************


function setid_produit($val)
{
$this->id_produit =  $val;
}

function setid_avis($val)
{
$this->id_avis =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM avisproduit WHERE avisproduit_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_produit = $row->id_produit;

$this->id_avis = $row->id_avis;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM avisproduit WHERE avisproduit_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->avisproduit_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO avisproduit ( id_produit,id_avis ) VALUES ( '$this->id_produit','$this->id_avis' )";
$result = $this->database->query($sql);
$this->avisproduit_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE avisproduit SET  id_produit = '$this->id_produit',id_avis = '$this->id_avis' WHERE avisproduit_pk_id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
<!-- end of generated class -->

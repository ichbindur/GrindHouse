<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        AvisTransporteur
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.AvisTransporteur.php
* FOR MYSQL TABLE:  avistransporteur
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class AvisTransporteur
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $avistransporteur_pk_id;   // Primary key de la table

var $id_avis;   // PrimaryKey de la table Avis
var $id_transporteur;   // ForeignKey pkid de la table Transporteur

var $database; // Instance de la base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

function AvisTransporteur()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid_avis()
{
return $this->id_avis;
}

function getid_transporteur()
{
return $this->id_transporteur;
}

// **********************
// SETTER METHODS
// **********************


function setid_avis($val)
{
$this->id_avis =  $val;
}

function setid_transporteur($val)
{
$this->id_transporteur =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM avistransporteur WHERE avistransporteur_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_avis = $row->id_avis;

$this->id_transporteur = $row->id_transporteur;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM avistransporteur WHERE avistransporteur_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->avistransporteur_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO avistransporteur ( id_avis,id_transporteur ) VALUES ( '$this->id_avis','$this->id_transporteur' )";
$result = $this->database->query($sql);
$this->avistransporteur_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE avistransporteur SET  id_avis = '$this->id_avis',id_transporteur = '$this->id_transporteur' WHERE avistransporteur_pk_id = $id ";

$result = $this->database->query($sql);



}


} 

?>
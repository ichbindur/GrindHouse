<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Commande
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Commande.php
* FOR MYSQL TABLE:  commande
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Commande
{ 


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $commande_pk_id;   // PrimaryKey de la table

var $id_commande;   // Primary key de la table Commande
var $date_commande;   // Date de la commande
var $date_transporteur;   // Date de remise du colis au transporteur
var $etat;   // Etat de la commande

var $database; // Instance de la base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

function Commande()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid_commande()
{
return $this->id_commande;
}

function getdate_commande()
{
return $this->date_commande;
}

function getdate_transporteur()
{
return $this->date_transporteur;
}

function getetat()
{
return $this->etat;
}

// **********************
// SETTER METHODS
// **********************


function setid_commande($val)
{
$this->id_commande =  $val;
}

function setdate_commande($val)
{
$this->date_commande =  $val;
}

function setdate_transporteur($val)
{
$this->date_transporteur =  $val;
}

function setetat($val)
{
$this->etat =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM commande WHERE commande_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_commande = $row->id_commande;

$this->date_commande = $row->date_commande;

$this->date_transporteur = $row->date_transporteur;

$this->etat = $row->etat;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM commande WHERE commande_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->commande_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO commande ( id_commande,date_commande,date_transporteur,etat ) VALUES ( '$this->id_commande','$this->date_commande','$this->date_transporteur','$this->etat' )";
$result = $this->database->query($sql);
$this->commande_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE commande SET  id_commande = '$this->id_commande',date_commande = '$this->date_commande',date_transporteur = '$this->date_transporteur',etat = '$this->etat' WHERE commande_pk_id = $id ";

$result = $this->database->query($sql);



}


} 

?>
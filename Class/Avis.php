<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Avis
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Avis.php
* FOR MYSQL TABLE:  avis
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Avis
{ 


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $avis_pk_id;   // PrimaryKey de la table

var $id_avis;   // PrimaryKey de la table Avis
var $note;   // Note attribué a un produit
var $commentaire;   // Commentaire laissé par l'utilisateur
var $date_avis;   // Date ou l'avis à été posté

var $database; // Instance de la base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

function Avis()
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

function getnote()
{
return $this->note;
}

function getcommentaire()
{
return $this->commentaire;
}

function getdate_avis()
{
return $this->date_avis;
}

// **********************
// SETTER METHODS
// **********************


function setid_avis($val)
{
$this->id_avis =  $val;
}

function setnote($val)
{
$this->note =  $val;
}

function setcommentaire($val)
{
$this->commentaire =  $val;
}

function setdate_avis($val)
{
$this->date_avis =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM avis WHERE avis_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_avis = $row->id_avis;

$this->note = $row->note;

$this->commentaire = $row->commentaire;

$this->date_avis = $row->date_avis;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM avis WHERE avis_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->avis_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO avis ( id_avis,note,commentaire,date_avis ) VALUES ( '$this->id_avis','$this->note','$this->commentaire','$this->date_avis' )";
$result = $this->database->query($sql);
$this->avis_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE avis SET  id_avis = '$this->id_avis',note = '$this->note',commentaire = '$this->commentaire',date_avis = '$this->date_avis' WHERE avis_pk_id = $id ";

$result = $this->database->query($sql);



}


} 

?>
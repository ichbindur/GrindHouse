<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Remboursement
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Remboursement.php
* FOR MYSQL TABLE:  remboursement
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Remboursement
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $Remboursement_pk_id;   // PrimaryKey de la table

var $id_remboursement;   // PrimaryKey de la table Remboursement
var $is_avoir;   // Le remboursement est il un avoir?
var $txt_demande;   // Texte rentré par l'utilisateur expliquant les raison de la demande
var $statut;   // Statut du traitement de la demande
var $date_remboursement;   // Date ou le remboursement à été effectué

var $database; // Instance de la base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

function Remboursement()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid_remboursement()
{
return $this->id_remboursement;
}

function getis_avoir()
{
return $this->is_avoir;
}

function gettxt_demande()
{
return $this->txt_demande;
}

function getstatut()
{
return $this->statut;
}

function getdate_remboursement()
{
return $this->date_remboursement;
}

// **********************
// SETTER METHODS
// **********************


function setid_remboursement($val)
{
$this->id_remboursement =  $val;
}

function setis_avoir($val)
{
$this->is_avoir =  $val;
}

function settxt_demande($val)
{
$this->txt_demande =  $val;
}

function setstatut($val)
{
$this->statut =  $val;
}

function setdate_remboursement($val)
{
$this->date_remboursement =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM remboursement WHERE Remboursement_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_remboursement = $row->id_remboursement;

$this->is_avoir = $row->is_avoir;

$this->txt_demande = $row->txt_demande;

$this->statut = $row->statut;

$this->date_remboursement = $row->date_remboursement;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM remboursement WHERE Remboursement_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->Remboursement_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO remboursement ( id_remboursement,is_avoir,txt_demande,statut,date_remboursement ) VALUES ( '$this->id_remboursement','$this->is_avoir',
'$this->txt_demande','$this->statut','$this->date_remboursement' )";
$result = $this->database->query($sql);
$this->Remboursement_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE remboursement SET  id_remboursement = '$this->id_remboursement',is_avoir = '$this->is_avoir',txt_demande = '$this->txt_demande',statut = '$this->statut',date_remboursement = '$this->date_remboursement' WHERE Remboursement_pk_id = $id ";

$result = $this->database->query($sql);



}


} 

?>
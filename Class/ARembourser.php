
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        ARembourser
* GENERATION DATE:  23.09.2013
* CLASS FILE:       ARembourser.php
* FOR MYSQL TABLE:  arembourser
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class ARembourser
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $arembourser_pk_id;   // PrimaryKey de la table

var $id_remboursement;   // PrimaryKey pkid de la table Remboursement
var $id_produit;   // ForeignKey pkid de la table Produit
var $id_user;   // ForeignKey pkid de la table Utilisateur
var $is_accepted;   // Booleen pour l'acceptation du remboursement

var $database; // Instance de la base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

function ARembourser()
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

function getid_produit()
{
return $this->id_produit;
}

function getid_user()
{
return $this->id_user;
}

function getis_accepted()
{
return $this->is_accepted;
}

// **********************
// SETTER METHODS
// **********************


function setid_remboursement($val)
{
$this->id_remboursement =  $val;
}

function setid_produit($val)
{
$this->id_produit =  $val;
}

function setid_user($val)
{
$this->id_user =  $val;
}

function setis_accepted($val)
{
$this->is_accepted =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM arembourser WHERE arembourser_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_remboursement = $row->id_remboursement;

$this->id_produit = $row->id_produit;

$this->id_user = $row->id_user;

$this->is_accepted = $row->is_accepted;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM arembourser WHERE arembourser_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->arembourser_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO arembourser ( id_remboursement,id_produit,id_user,is_accepted ) VALUES ( '$this->id_remboursement','$this->id_produit','$this->id_user','$this->is_accepted' )";
$result = $this->database->query($sql);
$this->arembourser_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE arembourser SET  id_remboursement = '$this->id_remboursement',id_produit = '$this->id_produit',id_user = '$this->id_user',is_accepted = '$this->is_accepted' WHERE arembourser_pk_id = $id ";

$result = $this->database->query($sql);



}


} 

?>
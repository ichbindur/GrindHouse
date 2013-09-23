<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Categorie
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Categorie.php
* FOR MYSQL TABLE:  categorie
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Categorie
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $categorie_pk_id;   // PrimaryKey de la table

var $id_categorie;   // Primary key de la table Categorie
var $nom;   // Nom de la categorie

var $database; // Instance de la base de donnée


// **********************
// CONSTRUCTOR METHOD
// **********************

function Categorie()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid_categorie()
{
return $this->id_categorie;
}

function getnom()
{
return $this->nom;
}

// **********************
// SETTER METHODS
// **********************


function setid_categorie($val)
{
$this->id_categorie =  $val;
}

function setnom($val)
{
$this->nom =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM categorie WHERE categorie_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_categorie = $row->id_categorie;

$this->nom = $row->nom;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM categorie WHERE categorie_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->categorie_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO categorie ( id_categorie,nom ) VALUES ( '$this->id_categorie','$this->nom' )";
$result = $this->database->query($sql);
$this->categorie_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE categorie SET  id_categorie = '$this->id_categorie',nom = '$this->nom' WHERE categorie_pk_id = $id ";

$result = $this->database->query($sql);



}


} 

?>
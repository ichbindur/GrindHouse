<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Atribut
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Atribut.php
* FOR MYSQL TABLE:  attribut
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Atribut
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $attribut_pk_id;   // PrimaryKey de la table

var $id_attribut;   // PrimaryKey pkid de la table Attribut
var $nom;   // Nom de l'attribut

var $database; // Instance de la base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

function Atribut()
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

function getnom()
{
return $this->nom;
}

// **********************
// SETTER METHODS
// **********************


function setid_attribut($val)
{
$this->id_attribut =  $val;
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

$sql =  "SELECT * FROM attribut WHERE attribut_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_attribut = $row->id_attribut;

$this->nom = $row->nom;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM attribut WHERE attribut_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->attribut_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO attribut ( id_attribut,nom ) VALUES ( '$this->id_attribut','$this->nom' )";
$result = $this->database->query($sql);
$this->attribut_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE attribut SET  id_attribut = '$this->id_attribut',nom = '$this->nom' WHERE attribut_pk_id = $id ";

$result = $this->database->query($sql);



}


}

?>

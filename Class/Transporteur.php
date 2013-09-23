<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Transporteur
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Transporteur.php
* FOR MYSQL TABLE:  transporteur
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Transporteur
{ 


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $transporteur_pk_id;   // PrimaryKey de la table

var $id_transporteur;   // PrimaryKey de la table Transporteur
var $nom;   // Nom du transporteur
var $photo;   // Photo/Avatar du transporteur
var $description;   // Description fournis par le transporteur
var $prix;   // Prix du transport

var $database; // Instance de la base de donnée


// **********************
// CONSTRUCTOR METHOD
// **********************

function Transporteur()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid_transporteur()
{
return $this->id_transporteur;
}

function getnom()
{
return $this->nom;
}

function getphoto()
{
return $this->photo;
}

function getdescription()
{
return $this->description;
}

function getprix()
{
return $this->prix;
}

// **********************
// SETTER METHODS
// **********************


function setid_transporteur($val)
{
$this->id_transporteur =  $val;
}

function setnom($val)
{
$this->nom =  $val;
}

function setphoto($val)
{
$this->photo =  $val;
}

function setdescription($val)
{
$this->description =  $val;
}

function setprix($val)
{
$this->prix =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM transporteur WHERE transporteur_pk_id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_transporteur = $row->id_transporteur;

$this->nom = $row->nom;

$this->photo = $row->photo;

$this->description = $row->description;

$this->prix = $row->prix;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM transporteur WHERE transporteur_pk_id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->transporteur_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO transporteur ( id_transporteur,nom,photo,description,prix ) VALUES ( '$this->id_transporteur','$this->nom','$this->photo','$this->description','$this->prix' )";
$result = $this->database->query($sql);
$this->transporteur_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE transporteur SET  id_transporteur = '$this->id_transporteur',nom = '$this->nom',photo = '$this->photo',description = '$this->description',prix = '$this->prix' WHERE transporteur_pk_id = $id ";

$result = $this->database->query($sql);



}


} 

?>
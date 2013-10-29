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
var $type_p;    // Type de la categorie
protected $db;
var $database; // Instance de la base de donnée


// **********************
// CONSTRUCTOR METHOD
// **********************

function Categorie()
{

$this->database = new Database();
$this->connexion();

}

function connexion()
    {
        $connexion = new PDO("mysql:host=localhost;dbname=grindhouse", 'root', ''); // connexion à la BDD

        $this->db=$connexion;
        
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

function gettype_p()
{
return $this->type_p;
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

function settype_p($val)
{
$this->type_p =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM categorie WHERE id_categorie = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_categorie = $row->id_categorie;

$this->nom = $row->nom;

$this->type_p = $row->type_p;

}

function selectall()
    {   

        $req=$this->db->prepare('SELECT * FROM categorie');
        $req->execute();

        return $req->fetchAll();
    }

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM categorie WHERE id_categorie = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->categorie_pk_id = ""; // clear key for autoincrement

$sql = "INSERT INTO categorie (nom,type_p) VALUES ( '$this->nom','$this->type_p' )";
$result = $this->database->query($sql);
$this->categorie_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE categorie SET nom = '$this->nom',type_p = '$this->type_p' WHERE id_categorie = $id ";

$result = $this->database->query($sql);



}


} 

?>
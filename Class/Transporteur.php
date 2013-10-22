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
var $image;   // Photo/Avatar du transporteur
var $description;   // Description fournis par le transporteur
protected $db;
var $database; // Instance de la base de donnée


// **********************
// CONSTRUCTOR METHOD
// **********************

function Transporteur()
{

$this->database = new Database();
$connexion = new PDO("mysql:host=localhost;dbname=grindhouse", 'root', ''); // connexion à la BDD

$this->db=$connexion;

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

function getimage()
{
return $this->image;
}

function getdescription()
{
return $this->description;
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

function setimage($val)
{
$this->image =  $val;
}

function setdescription($val)
{
$this->description =  $val;
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

$this->image = $row->image;

$this->description = $row->description;

}
function selectall(){
    
    $req=$this->db->prepare('SELECT * FROM transporteur');
    $req->execute();
    return $req->fetchAll();
   
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

$sql = "INSERT INTO transporteur ( id_transporteur,nom,image,description ) VALUES ( '$this->id_transporteur','$this->nom','$this->image','$this->description' )";
$result = $this->database->query($sql);
$this->transporteur_pk_id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE transporteur SET  id_transporteur = '$this->id_transporteur',nom = '$this->nom',image = '$this->image',description = '$this->description' WHERE transporteur_pk_id = $id ";

$result = $this->database->query($sql);



}

}

?>
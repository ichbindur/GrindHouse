
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        ACategorie
* GENERATION DATE:  23.09.2013
* CLASS FILE:       ACategorie.php
* FOR MYSQL TABLE:  acategorie
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class ACategorie
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $acategorie_pk_id;   // clé primaire de la table

var $id_categorie;   // PrimaryKey pkid de la table categorie
var $id_produit;   // foreign key pkid de la table produit

var $database; // instance de la base de donnée


// **********************
// CONSTRUCTOR METHOD
// **********************

function ACategorie()
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

function getid_produit()
{
return $this->id_produit;
}

// **********************
// SETTER METHODS
// **********************


function setid_categorie($val)
{
$this->id_categorie =  $val;
}

function setid_produit($val)
{
$this->id_produit =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM acategorie WHERE id_acategorie = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_categorie = $row->id_categorie;

$this->id_produit = $row->id_produit;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM acategorie WHERE id_acategorie = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->acategorie_pk_id = ""; // clear key for autoincrement
$sql = "INSERT INTO acategorie (id_categorie,id_produit) VALUES ( '$this->id_produit','$this->id_categorie' )";
$result = $this->database->query($sql);
$this->id_categorie = mysql_insert_id($this->database->link);
}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE acategorie SET  id_categorie = '$this->id_categorie',id_produit = '$this->id_produit' WHERE id_acategorie = $id ";

$result = $this->database->query($sql);



}


}

?>


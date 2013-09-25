
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        JetonMotDePasse
* GENERATION DATE:  24.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.JetonMotDePasse.php
* FOR MYSQL TABLE:  jetonmotdepasse
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class JetonMotDePasse
{


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id_jeton;   // PrimaryKey de la table

var $guid_jeton;   // Guid servant à identifier le jeton
var $is_used;   // boolleen servnat à savoir si le jeton à été utilisé
var $adresse_user;   // Email de l'utilisateur

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function JetonMotDePasse()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid_jeton()
{
return $this->id_jeton;
}

function getguid_jeton()
{
return $this->guid_jeton;
}

function getis_used()
{
return $this->is_used;
}

function getadresse_user()
{
return $this->adresse_user;
}

// **********************
// SETTER METHODS
// **********************


function setid_jeton($val)
{
$this->id_jeton =  $val;
}

function setguid_jeton($val)
{
$this->guid_jeton =  $val;
}

function setis_used($val)
{
$this->is_used =  $val;
}

function setadresse_user($val)
{
$this->adresse_user =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM jetonmotdepasse WHERE id_jeton = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_jeton = $row->id_jeton;

$this->guid_jeton = $row->guid_jeton;

$this->is_used = $row->is_used;

$this->adresse_user = $row->adresse_user;

}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM jetonmotdepasse WHERE id_jeton = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id_jeton = ""; // clear key for autoincrement

$sql = "INSERT INTO jetonmotdepasse ( guid_jeton,is_used,adresse_user ) VALUES ( '$this->guid_jeton','$this->is_used','$this->adresse_user' )";
$result = $this->database->query($sql);
$this->id_jeton = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE jetonmotdepasse SET  guid_jeton = '$this->guid_jeton',is_used = '$this->is_used',adresse_user = '$this->adresse_user' WHERE id_jeton = $id ";

$result = $this->database->query($sql);



}


function selectWGuid($guid)
{

$sql =  "SELECT * FROM jetonmotdepasse WHERE guid_jeton = '$guid';";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_jeton = $row->id_jeton;

$this->guid_jeton = $row->guid_jeton;

$this->is_used = $row->is_used;

$this->adresse_user = $row->adresse_user;

}

function createGuid(){
    $this->guid_jeton = trim(com_create_guid());
}


} 

?>
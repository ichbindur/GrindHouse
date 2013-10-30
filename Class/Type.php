<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Type
* GENERATION DATE:  29.10.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Type.php
* FOR MYSQL TABLE:  type
* FOR MYSQL DB:     grindhouse
* -------------------------------------------------------
*
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Type
{ 

// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id_type;   // KEY ATTR. WITH AUTOINCREMENT

var $nom;   

var $database; 


// **********************
// CONSTRUCTOR METHOD
// **********************

function Type()
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


function getid_type()
{
return $this->id_type;
}

function getnom()
{
return $this->nom;
}

// **********************
// SETTER METHODS
// **********************


function setid_type($val)
{
$this->id_type =  $val;
}

function setnom($val)
{
$this->nom =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id = '')
{
if($id != ''){
    $sql =  "SELECT * FROM type WHERE id_type = $id;";
    $result =  $this->database->query($sql);
    $result = $this->database->result;
    $row = mysql_fetch_object($result);


    $this->id_type = $row->id_type;

    $this->nom = $row->nom; 
    }
}

function selectall()
    {   

        $req=$this->db->prepare('SELECT * FROM type');
        $req->execute();

        return $req->fetchAll();
    }

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM type WHERE id_type = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id_type = ""; // clear key for autoincrement

$sql = "INSERT INTO type ( nom ) VALUES ( '$this->nom' )";
$result = $this->database->query($sql);
$this->id_type = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE type SET  nom = '$this->nom' WHERE id_type = $id ";

$result = $this->database->query($sql);



}


} 

?>


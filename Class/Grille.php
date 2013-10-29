
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Grille
* GENERATION DATE:  25.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Grille.php
* FOR MYSQL TABLE:  grille
* FOR MYSQL DB:     grindhouse
*/

include_once("resources/class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Grille
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id_grille;   // PrimaryKey de la table

var $id_transporteur;   // ForeignKey pkid de la table transporteur
var $poids_max;   // poid maxium pour la tranche de prix
var $prix;   // prix en rapport avec le poid

var $database; // Instance de base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

function Grille()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************


function getid_grille()
{
return $this->id_grille;
}

function getid_transporteur()
{
return $this->id_transporteur;
}

function getpoids_max()
{
return $this->poids_max;
}

function getprix()
{
return $this->prix;
}

// **********************
// SETTER METHODS
// **********************


function setid_grille($val)
{
$this->id_grille =  $val;
}

function setid_transporteur($val)
{
$this->id_transporteur =  $val;
}

function setpoids_max($val)
{
$this->poids_max =  $val;
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

$sql =  "SELECT * FROM grille WHERE id_grille = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id_grille = $row->id_grille;

$this->id_transporteur = $row->id_transporteur;

$this->poids_max = $row->poids_max;

$this->prix = $row->prix;

}
function selectTrans($id_transporteur){
    
    $sql =  "SELECT * FROM grille WHERE id_grille = $id_transporteur;";
    $result =  $this->database->query($sql);
    $result = $this->database->result;
    $row = mysql_fetch_object($result);


    $this->id_grille = $row->id_grille;

    $this->id_transporteur = $row->id_transporteur;

    $this->poids_max = $row->poids_max;

    $this->prix = $row->prix;
}

function selectTransWPoids($id_transporteur, $poids){
    
    $sql =  "SELECT * FROM grille WHERE id_transporteur = $id_transporteur AND poids_max > $poids OR poids_max = (SELECT MAX(poids_max) FROM Grille WHERE id_Transporteur = $id_transporteur)LIMIT 1;";
    $result =  $this->database->query($sql);
    $result = $this->database->result;
    $row = mysql_fetch_object($result);

    if(isset($row->id_grille)){
        $this->id_grille = $row->id_grille;

        $this->id_transporteur = $row->id_transporteur;

        $this->poids_max = $row->poids_max;

        $this->prix = $row->prix;
    }
}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM grille WHERE id_grille = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id_grille = ""; // clear key for autoincrement

$sql = "INSERT INTO grille ( id_transporteur,poids_max,prix ) VALUES ( '$this->id_transporteur','$this->poids_max','$this->prix' )";
$result = $this->database->query($sql);
$this->id_grille = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE grille SET  id_transporteur = '$this->id_transporteur',poids_max = '$this->poids_max',prix = '$this->prix' WHERE id_grille = $id ";

$result = $this->database->query($sql);



}


}

?>

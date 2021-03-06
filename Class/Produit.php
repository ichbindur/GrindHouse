<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Produit
* GENERATION DATE:  23.09.2013
* CLASS FILE:       C:\wamp\www\php_class_generator/generated_classes/class.Produit.php
* FOR MYSQL TABLE:  produit
* FOR MYSQL DB:     grindhouse
*/

require_once("resources/class.database.php");
//include 'resources/class.database.php';

// **********************
// CLASS DECLARATION
// **********************

class Produit
{
// **********************
// ATTRIBUTE DECLARATION
// **********************

    var $produit_pk_id;   // PrimaryKey de la table
    var $id_produit;   // PrimaryKey de la table Produit
    var $reference;   // Reference du produit
    var $nom = array();   // Nom du produit
    var $prix_ht;   // prix hors-taxe du produit
    var $description;   // description du produit
    var $poids;   // Poid du produit
    var $is_venteprivee;   // Le produit est en vente dans la section "vente privé"
    var $promotion;   // Le montant de la promotion proposé à tous les utilisateurs
    var $promotion_vp;   // Le montant de la promotion appliqué dans la section "vente privé"
    var $stock;   // Nombre de produit en stock
    var $dim_larg;   // Largeur du produit
    var $dim_long;   // Longueur du produit
    var $dossier_photo;   // Dossier contenant toutes les photos du produit
    var $type_p;
    protected $db;
    var $database; // Instance de la base de données


// **********************
// CONSTRUCTOR METHOD
// **********************

    public function __construct()
    {

        $this->connexion();

    }


// **********************
// GETTER METHODS
// **********************


    function getid_produit()
    {
        return $this->id_produit;
    }

    function getreference()
    {
        return $this->reference;
    }

    function getnom()
    {
        return $this->nom;
    }

    function getprix_ht()
    {
        return $this->prix_ht;
    }

    function getdescription()
    {
        return $this->description;
    }

    function getpoids()
    {
        return $this->poids;
    }

    function getis_venteprivee()
    {
        return $this->is_venteprivee;
    }

    function getpromotion()
    {
        return $this->promotion;
    }

    function getpromotion_vp()
    {
        return $this->promotion_vp;
    }

    function getstock()
    {
        return $this->stock;
    }

    function getdim_larg()
    {
        return $this->dim_larg;
    }

    function getdim_long()
    {
        return $this->dim_long;
    }

    function getdossier_photo()
    {
        return $this->dossier_photo;
    }
    function gettype_p()
    {
        return $this->type_p;
    }

    // **********************
    // SETTER METHODS
    // **********************


    function setid_produit($val)
    {
        $this->id_produit =  $val;
    }

    function setreference($val)
    {
        $this->reference =  $val;
    }

    function setnom($val)
    {
        $this->nom =  $val;
    }

    function setprix_ht($val)
    {
        $this->prix_ht =  $val;
    }

    function setdescription($val)
    {
        $this->description =  $val;
    }

    function setpoids($val)
    {
        $this->poids =  $val;
    }

    function setis_venteprivee($val)
    {
        $this->is_venteprivee =  $val;
    }

    function setpromotion($val)
    {
        $this->promotion =  $val;
    }

    function setpromotion_vp($val)
    {
        $this->promotion_vp =  $val;
    }

    function setstock($val)
    {
        $this->stock =  $val;
    }

    function setdim_larg($val)
    {
        $this->dim_larg =  $val;
    }

    function setdim_long($val)
    {
        $this->dim_long =  $val;
    }

    function setdossier_photo($val)
    {
        $this->dossier_photo =  $val;
    }
    function settype_p($val)
    {
        $this->type_p = $val;
    }
// **********************
// SELECT METHOD / LOAD
// **********************

    function connexion()
    {
        $connexion = new PDO("mysql:host=localhost;dbname=grindhouse", 'root', ''); // connexion à la BDD

        $this->db=$connexion;
        
        $this->database = new Database();
    }
    
    function selectall()
    {   

        $req=$this->db->prepare('SELECT * FROM produit');
        $req->execute();

        return $req->fetchAll();
    }

    function select($id)
    {        
        
        $sql =  "SELECT * FROM produit WHERE id_produit = $id;";
        $result =  $this->database->query($sql);
        $result = $this->database->result;
        $row = mysql_fetch_object($result);

        if(isset($row->id_produit) && $row->id_produit != ''){
            $this->id_produit = $row->id_produit;

            $this->reference = $row->reference;

            $this->nom = $row->nom;

            $this->prix_ht = $row->prix_ht;

            $this->description = $row->description;

            $this->poids = $row->poids;

            $this->is_venteprivee = $row->is_venteprivee;

            $this->promotion = $row->promotion;

            $this->promotion_vp = $row->promotion_vp;

            $this->stock = $row->stock;

            $this->dim_larg = $row->dim_larg;

            $this->dim_long = $row->dim_long;

            $this->dossier_photo = $row->dossier_photo;
            
            $this->type_p = $row->type_p;
        }
    }
   
    // **********************
    // DELETE
    // **********************

    function delete($id)
    {
        $req=$this->db->prepare("DELETE FROM produit WHERE id_produit = :id;");
        $req->bindValue(':id',$id);
        $req->execute();
    }

    // **********************
    // INSERT
    // **********************

    function insert()
    {
        $req=$this->db->prepare("INSERT INTO produit SET id_produit = :id_produit ,reference = :reference,nom = :nom,
                                                     prix_ht = :prix_ht,description = :description,
                                                     poids = :poids,is_venteprivee = :is_venteprivee,
                                                     promotion = :promotion,promotion_vp = :promotion_vp,
                                                     stock = :stock,dim_larg = :dim_larg,
                                                     dim_long = :dim_long,dossier_photo =:dossier_photo,
                                                     type_p = :type_p");

        $req->bindValue(':id_produit',$this->id_produit);
        $req->bindValue(':reference',$this->reference);
        $req->bindValue(':nom',$this->nom);
        $req->bindValue(':prix_ht',$this->prix_ht);
        $req->bindValue(':description',$this->description);
        $req->bindValue(':poids',$this->poids);
        $req->bindValue(':is_venteprivee',$this->is_venteprivee);
        $req->bindValue(':promotion',$this->promotion);
        $req->bindValue(':promotion_vp',$this->promotion_vp);
        $req->bindValue(':stock',$this->stock);
        $req->bindValue(':dim_larg',$this->dim_larg);
        $req->bindValue(':dim_long',$this->dim_long);
        $req->bindValue(':dossier_photo',$this->dossier_photo,PDO::PARAM_STR);
        $req->bindValue(':type_p',$this->type_p);
        
        $req->execute();
        echo 'insert produit';
    }

    // **********************
    // UPDATE
    // **********************

    function update($id)
    {
        $sql = " UPDATE produit SET  id_produit = '$this->id_produit',reference = '$this->reference',nom = '$this->nom',prix_ht = '$this->prix_ht',
        description = '$this->description',poids = '$this->poids',is_venteprivee = '$this->is_venteprivee',promotion = '$this->promotion',
        promotion_vp = '$this->promotion_vp',stock = '$this->stock',dim_larg = '$this->dim_larg',dim_long = '$this->dim_long',
        dossier_photo = '$this->dossier_photo',type_p = '$this->type_p' WHERE produit_pk_id = $id ";
        $result = $this->database->query($sql);
    }
    
    function selecttype_p($type_p){
        
       $req=$this->db->prepare('SELECT * FROM produit where type_p ='. $type_p);
       $req->execute();
       return $req->fetchAll(); 
    }
    
    function selecttype_pWFiltre($type_p, $filtre){
        
       $req=$this->db->prepare('SELECT * FROM produit where type_p ='. $type_p .' '.$filtre);
       $req->execute();
       return $req->fetchAll(); 
    }
    
    function selecttype_pcatWFiltre($type_p,$cat, $filtre){
        
       $req=$this->db->prepare('SELECT * FROM produit p INNER JOIN acategorie a ON p.id_produit = a.id_produit where p.type_p = '. $type_p .' AND a.id_categorie = '. $cat .' '.$filtre);
       $req->execute();
       return $req->fetchAll(); 
    }
    
    function selecttype_pcat($type_p,$cat){
        
       $req=$this->db->prepare('SELECT * FROM produit p INNER JOIN acategorie a ON p.id_produit = a.id_produit where p.type_p = '. $type_p .' AND a.id_categorie = '. $cat);
       $req->execute();
       return $req->fetchAll(); 
    }
    
    function selectWFiltre($filtre){
        
       $req=$this->db->prepare('SELECT * FROM produit WHERE '.$filtre);
       $req->execute();
       return $req->fetchAll(); 
    }
} // class : end

?>
<!-- end of generated class -->

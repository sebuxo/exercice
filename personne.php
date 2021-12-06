<?php
require_once ( "ConnexionPDO.php" );
class Personne {
 var $connexion;
 function __construct() {
 $this->connexion = new ConnexionPDO();
 }
 function __destruct() {
 $this->connexion->close();
 unset( $this->connexion );
 }
 function ajouterPersonne( $personne_nom, $personne_prenom, $personne_age, $personne_loisirs, 
$personne_pays, $personne_carteType ){
 $data = $this->connexion->getDataBase();
 try {
 $query = " INSERT INTO personnes SET
personne_nom = :personne_nom,
personne_prenom = :personne_prenom,
personne_age = :personne_age,
personne_loisirs = :personne_loisirs,
personne_pays = :personne_pays,
personne_carteType = :personne_carteType
";
 $stmt = $data->prepare($query);
 $stmt->bindParam(':personne_nom', $personne_nom, PDO::PARAM_STR);
 $stmt->bindParam(':personne_prenom', $personne_prenom, PDO::PARAM_STR);
 $stmt->bindParam(':personne_age', $personne_age, PDO::PARAM_INT);
 $stmt->bindParam(':personne_loisirs', $personne_loisirs, PDO::PARAM_STR);
 $stmt->bindParam(':personne_pays', $personne_pays, PDO::PARAM_INT);
 $stmt->bindParam(':personne_carteType', $personne_carteType, PDO::PARAM_INT);
 $resultat = $stmt->execute();
 if (!$resultat) {
 return 0;
 } else {
 return 1;
 }
 } catch (PDOException $e) {
 echo $e->getMessage();
 }
 }

    function listePersonne(){
        try{
        $data = $this->connexion->getDataBase();
        $query = "SELECT * FROM personnes";
        $stmt = $data->prepare($query);
        return $stmt;
        }
        catch ( PDOException $e ){
        echo $e->getMessage();
        }
        }
        function getLoisirsPersonne( $personne_loisirs ){
            try{
           $liste_loisirs = explode(",",$personne_loisirs);
           $resultat = "";
           for($i=0; $i < count($liste_loisirs) ; $i++){
           $resultat .= $GLOBALS['Loisirs'][$i].",";
           }
            return substr($resultat, 0, strlen($resultat)-1);
            }catch ( PDOException $e ){
                echo $e->getMessage();
                }
            }
               
           
}








?>
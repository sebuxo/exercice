<?php
require_once("Personne.php");
if(isset($_GET["personne_id"])){
$personne = new Personne();
$stmt = $personne→getInfosPersonne($_GET["personne_id"]);
$stmt→execute();
$ligne = $stmt→fetch();
$personne_nom = $ligne["personne_nom"];
$personne_prenom = $ligne["personne_prenom"];
$personne_age = $ligne["personne_age"];
$personne_loisirs = explode(",",$ligne["personne_loisirs"]);
$personne_pays = $ligne["personne_pays"];
$personne_carteType = $ligne["personne_carteType"];
}
else{
echo "impossible de charger les informations";
$personne_nom = "";
$personne_prenom = "";
$personne_age = "";
$personne_loisirs = array();
$personne_pays = "";
$personne_carteType = "";
}
?>
<?php
error_reporting(1);
require_once( "personne.php" );
extract( $_POST, EXTR_OVERWRITE );
extract( $_GET, EXTR_OVERWRITE );
$personne = new Personne();
if( $operation == 'ajouterPersonne' ){ 
$resultat = $personne->ajouterPersonne( $personne_nom, $personne_prenom, $personne_age, implode(",",
$personne_loisirs), $personne_pays, $personne_carteType );
header("location:ajouter.php?resultat=".$resultat);
}
unset( $personne );

?>
<?php require_once("personne.php");
require_once("VG.php");
$personne = new personne();

$stmt =$personne->listePersonne();
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="modsup.css">
    <title>Ex</title>
</head>
<body>
<div class="table-responsive">
 <table class="table table-bordered table-hover">
 <caption class="text-center">Liste des personnes:</caption>
 <thead>
 <tr>
 <th>Nom</th>
 <th>Prenom</th>
 <th>Age</th>
 <th>Loisirs</th>
 <th>Pays</th>
 <th>Type de carte</th>
 <th colspan="2">Opération</th>
 </tr>
 </thead>
 <tbody>
<?php while ($ligne = $stmt->fetch()) {?>
 <tr>
 <td><?php echo $ligne["personne_nom"]; ?></td>
 <td><?php echo $ligne["personne_prenom"]; ?></td>
 <td><?php echo $ligne["personne_age"]; ?></td>
 <td><?php echo $personne->getLoisirsPersonne($ligne["personne_loisirs"]); ?></td>
 <td><?php echo $GLOBALS['PAYS'][$ligne["personne_pays"]]; ?></td>
 <td><?php echo $GLOBALS['CARTE_TYPE'][$ligne["personne_carteType"]]; ?></td>
 <td><a href="gestion.php?operation=supprimerPersonne&personne_id=<?php echo 
$ligne['personne_id']?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette personne?'));"> <img class="supprimer"
src="supprimer.png"/></a></td>
 <td><a href="editer.php?id=<?php echo $ligne['personne_id']?>"><img class="modifier" src="modifier.png" 
/></a></td>
 </tr>
<?php } ?>
 </table>
<?php if(isset($_GET["resultat"])){?>
<?php echo "<center><font color='red'>".$resultat = ( $_GET["resultat"] == 1)? "Operation est terminée avec 
succès!" : "une erreur est survenue lors de la derniere operation"."</font></center>"; ?> 
<?php } ?>
 </div>

    
    
</body>
</html>
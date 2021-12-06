<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Exercice</title>
</head>
<body>
<form id="personne" action="gestion.php?operation=ajouterPersonne" method="POST">
  <ul>
    <li><label for="nom">Nom
    <input  id="personne_nom" name ="personne_nom" type="text" placeholder="" required autocomplete="off" value="" >
    </label></li>
    <li><label for="prenom">Prenom</label>
  <input id="personne_prenom" name="personne_prenom" type="text" required >
  </li>
    <li><label for="age">Age</label>
  <input type="number" name="personne_age" id="personne_age"  required>
  </li>
    <li>
    <label for="loisir">Loisirs</label>
  <input type="checkbox" name="personne_loisirs[]" value="1"   >Sport
  <input type="checkbox" name="personne_loisirs[]" value="2"   >Lecture
  <input type="checkbox" name="personne_loisirs[]" value="3"   >Voyage
  </li>
    <li><label for="pays">Pays</label>
  <select name="personne_pays" id="personne_pays" required >
    <option value="">Veuillez choisir le pays</option >
    <option value="1" selected>Maroc</option>
    <option value="2" selected>France</option>
    <option value="3" selected>Italie</option>
    <option value="4" selected>Canada</option>
  </select>
  </li>
    <li><label for="TypeC">Type de la carte</label>
  <ol>
    <li><input type="radio" name="personne_carteType" id="visa" value="1" >
    <label for="visa">VISA</label>
    </li>
    <li>
      <input type="radio" id="platinum" name="personne_carteType" value="2">
      <label for=platinum>platinum</label>
    </li>
    <li><input type="radio" name="personne_carteType" id="mastercard" value="3" >
    <label for="mastercard">mastercard</label>
    </li>
  </ol>
  
  </li>
  <input  class="sub" type="submit" value="Submit">
  </ul>

<?php if(isset($_GET["resultat"])){?>
<?php echo "<font color='cyan'>".$resultat = ( $_GET["resultat"] == 1)? "Operation est terminée avec succès!" : 
"une erreur est survenue lors de la derniere operation"."</font>"; ?> 
<?php } ?>

</form> 

</body>
</html>
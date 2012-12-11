<!-- Nom du fichier : lister.php -->
<html>
<body>
<?php // Voyons maintenant en PHP
include("fonctions.php");
//
// Listage complet du fichier
//
// Notre fichier s'appelle utilisateurs.txt
$Fnm = "data/utilisateurs.txt";
// Ouvrir le fichier en lecture
if (file_exists($Fnm)) { 
	$tableau = file($Fnm);
	echo "<table>";
	for($i=0;$i<sizeof($tableau);$i++){
		$infos=explode("#",$tableau[$i]);
		echo "<tr>";
		echo "<td>".($i+1)."</td>";
		echo "<td>".$infos[0]." ".$infos[1]."</td>";
		echo "<td><a href='formulaire.php?num=".($i+1)."'>Modifier</a></td>";
		echo "<td><a href='afficher.php?num=".($i+1)."'>Afficher</a></td>";
		echo "<td><a href='formulaire.php?mode=S&num=".($i+1)."'>Supprimer</a></td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
<input type="button" onClick="location.href='index.php'" value="Menu">
</body>
</html>
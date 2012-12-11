<!-- Nom du fichier : rechercher.php -->
<?php // voyons maintenant en PHP
//
// Recherche dans le fichier
//
include("fonctions.php");
?>
<html>
<body><form name="frm" method="post" action="rechercher.php">
Rechercher : <input type="text" name="quoi">&nbsp;
<input type="submit" value="Ok">&nbsp;
<input type="button" onClick="location.href='index.php'" value="Menu">
</form>
<?php
if(@$_POST["quoi"]!=""){
	// Notre fichier s'appelle utilisateurs.txt
	$Fnm = "data/utilisateurs.txt";
	// Ouvrir le fichier en lecture
	if (file_exists($Fnm)) { 
		$tableau = file($Fnm);
		echo "<table>";
		for($i=0;$i<sizeof($tableau);$i++){
			if(strpos(strtolower($tableau[$i]),strtolower(@$_POST["quoi"]))>-1){
				$infos=explode("#",$tableau[$i]);
				echo "<tr>";
				echo "<td>".($i+1)."</td>";
				echo "<td>".$infos[0]." ".$infos[1]."</td>";
				echo "<td><a href='formulaire.php?num=".($i+1)."'>Modifier</a></td>";
				echo "<td><a href='afficher.php?num=".($i+1)."'>Afficher</a></td>";
				echo "<td><a href='formulaire.php?mode=S&num=".($i+1)."'>Supprimer</a></td>";
				echo "</tr>";
			}
		}
		echo "</table>";
	}
}
?>
</body>
</html>

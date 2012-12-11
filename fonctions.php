<?php
// Nom du fichier : fonctions.php
//
// La fonction qui lit une ligne
//
function litligne($numero) {
	// Notre fichier s'appelle utilisateurs.txt
	 $Fnm = "data/utilisateurs.txt";
	// Ouvrir le fichier en lecture
	if (file_exists($Fnm)) { 
		$tableau = file($Fnm);
		return $tableau[$numero-1];
	}else{
		return "";
	}
}	
//
// La fonction qui ajoute une ligne
//
function ajouter($ligne){
	// Notre fichier s'appelle utilisateurs.txt
	$Fnm = "data/utilisateurs.txt";
	// Ouvrir le fichier en écriture
	if (file_exists($Fnm)) { 
 		 $inF = fopen($Fnm,"a"); //Mode Append
 	}else{
 		 $inF = fopen($Fnm,"w"); // Le créer
 	}
  fputs($inF,$ligne);
  fclose($inF);
}
//
// La fonction qui remplace une ligne
//
function remplacer($ligne,$place){
	// Notre fichier s'appelle utilisateurs.txt
	$Fnm = "data/utilisateurs.txt";
	// Ouvrir le fichier en écriture
	if (file_exists($Fnm)) { 
 		$tableau = file($Fnm);
 	}
 	$tableau[$place-1]=$ligne;
 	$inF = fopen($Fnm,"wb"); // Le créer
 	for($i=0;$i<sizeof($tableau);$i++){if($tableau[$i]!=''){fputs($inF,$tableau[$i]);}}
  fclose($inF);
}
//
// La fonction qui supprime une ligne
//
function supprimer($place){
	// Il suffit de remplacer par vide
	remplacer('',$place);
}
?>
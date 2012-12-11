<!-- Nom du fichier : afficher.php -->
<?php // voyons maintenant en PHP
include("fonctions.php");
//
// Un paramètre a-t-il été transmis dans l'URL ?
//
$num=@$_GET["num"];
if($num==""){$num=0;} // Si aucun paramètre, alors on positionne num à zéro
// Si un paramètre a été transmis, on lit la ligne
if($num!=0){ // On récupère les données
	$infos=explode("#",litligne($num));
	$wprenom=$infos[0];
	$wnom=$infos[1];
	$wlogin=$infos[2];
	$wmdp=$infos[3];
	$wphoto=$infos[4];
}
?>
<html>
<body>
Prénom : <?php echo $wprenom;?><br>
Nom : <?php echo $wnom;?><br>
Login : <?php echo $wlogin;?><br>
Mot de passe : <?php echo $wmdp;?><br>
Photo : <img src="photos/<?php echo $wphoto;?>"><br>
<input type="button" value="Retour" onClick="history.back()">&nbsp;
<input type="button" onClick="location.href='index.html'" value="Menu">
</body>
</html>

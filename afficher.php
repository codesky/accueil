<!-- Nom du fichier : afficher.php -->
<?php // voyons maintenant en PHP
include("fonctions.php");
//
// Un param�tre a-t-il �t� transmis dans l'URL ?
//
$num=@$_GET["num"];
if($num==""){$num=0;} // Si aucun param�tre, alors on positionne num � z�ro
// Si un param�tre a �t� transmis, on lit la ligne
if($num!=0){ // On r�cup�re les donn�es
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
Pr�nom : <?php echo $wprenom;?><br>
Nom : <?php echo $wnom;?><br>
Login : <?php echo $wlogin;?><br>
Mot de passe : <?php echo $wmdp;?><br>
Photo : <img src="photos/<?php echo $wphoto;?>"><br>
<input type="button" value="Retour" onClick="history.back()">&nbsp;
<input type="button" onClick="location.href='index.html'" value="Menu">
</body>
</html>

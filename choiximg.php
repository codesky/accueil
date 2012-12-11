<!-- Nom du fichier : choiximg.php -->
<!--  Module qui scrute le dossier des images et les propose à l'utilisateur -->
<html>
<title>Choix Image</title>
<head>
<script type="text/javascript">
function valide(lien)
{opener.document.frm.photo.value=lien;self.close();}
</script>
</head>
<body>
<?php
// Chargement des images en mémoire
$photos=array();
$nbphotos=0;
$rep = "./photos/"; // C'est le dossier de nos images
$dir = opendir($rep);
while ($f = readdir($dir)) {
   if(is_file($rep.$f)) {
   		$ext = strtolower(substr($f, strrpos($f, '.') + 1));
   		// Si c'est une image, on la stocke et on la compte
      if(($ext=="jpg")||($ext=="jpeg")||($ext=="gif")||($ext=="png")){
      	$photos[$nbphotos]=$f;
      	$nbphotos++;
      }
   }
} 
// Boucle de tri
for($i=0;$i<=$nbphotos;$i++){
	for($j=$i;$j<$nbphotos;$j++){
		if($photos[$i]>$photos[$j]){
			$tmp=$photos[$i];$photos[$i]=$photos[$j];$photos[$j]=$tmp;
		}
	}
}
// boucle d'affichage
for($i=0;$i<$nbphotos;$i++){
	echo "<a style='cursor:pointer' onClick=valide('";
	echo $photos[$i]."') title='".$photos[$i]."'>";
	echo "<img src='".$rep.$photos[$i]."' width=60>";
	echo "</a>";
}
?>
</body>
</html>
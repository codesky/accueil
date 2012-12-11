<?php // Voyons maintenant en PHP
// Nom du fichier : formulaire.php
include("fonctions.php");
//
// Un paramètre a-t-il été transmis dans l'URL ?
//
$num=@$_GET["num"];
if($num==""){$num=@$_POST["num"];}
if($num==""){$num=0;} // Si aucun paramètre, alors on positionne num à zéro
// Si un paramètre a été transmis, on lit la ligne
if($num!=0){ // On récupère les données
	$infos=explode("#",litligne($num));
	$wprenom=$infos[0];
	$wnom=$infos[1];
	$wlogin=$infos[2];
	$wmdp=$infos[3];
	$wphoto=$infos[4];
}else{
	$wprenom="";
	$wnom="";
	$wlogin="";
	$wmdp="";
	$wphoto="";
}
// Le formulaire a-t-il été validé ou est-ce une suppression ?
if((@$_POST["submit"]=="Valider")or(@$_GET["mode"]=="S")){
	$chaine = @$_POST["prenom"]."#";
	$chaine .= @$_POST["nom"]."#";
	$chaine .= @$_POST["login"]."#";
	$chaine .= @$_POST["mdp"]."#";
	$chaine .= @$_POST["photo"]."\n";
	if($num==0){
		ajouter($chaine);Header("location:index.php");
	}else{
		if(@$_GET["mode"]=="S"){
			supprimer($num);
		}else{
			remplacer($chaine,$num);
		}
		Header("location:lister.php");
	}
}
?>
<html>
<head>
<script language="javascript">
function choix()
{
		window.open("choiximg.php","Image","top=0,left=0,width=400,height=300,scrollbars=yes");
}
</script>	
</head>
<body>
<form name="frm" method="post" action="formulaire.php">
<input type="hidden" name="num" value="<?php echo $num;?>">
Prénom : <input type="text" name="prenom" value="<?php echo $wprenom;?>"><br>
Nom : <input type="text" name="nom" value="<?php echo $wnom;?>"><br>
Login : <input type="text" name="login" value="<?php echo $wlogin;?>"><br>
Mot de passe : <input type="password" name="mdp" value="<?php echo $wmdp;?>"><br>
Photo : <input readonly type="text" name="photo" value="<?php echo $wphoto;?>">
<img style="cursor:pointer" src="rep.gif" onClick="choix()" title="Choisir une image"><br>
<input type="reset" value="Réinitialiser">&nbsp;
<input type="submit" name="submit" value="Valider">&nbsp;
<input type="button" onClick="location.href='index.php'" value="Menu">
</form>
</body>
</html>

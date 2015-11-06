<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?> 
<?php include('PHP/login.php'); ?>
<!doctype html>
<!--[if lte IE 6]> <html class="no-js ie6 ie67 ie678" lang="fr"> <![endif]-->
<!--[if lte IE 7]> <html class="no-js ie7 ie67 ie678" lang="fr"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 ie678" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
<title>EuroBookMaker - Administration</title>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=10">
<meta name="viewport" content="width=device-width; initial-scale=1.0">

<link href='http://fonts.googleapis.com/css?family=Cantarell:400,700|Exo+2:400,600|Molengo|Convergence' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="CSS/knacss.css" />
<link rel="stylesheet" href="CSS/responsive-tabs.css" />
<link rel="stylesheet" href="CSS/style.css" />

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
<link rel="shortcut icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico" />

<script src="javascript/jquery-1.7.1.min.js"></script>
<script src="javascript/jquery-ui-1.8.18.custom.min.js"></script>
<script src="javascript/search.js"></script>	


</head>
<body id="page_admin">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<?php include("PHP/admin_functions.php"); ?>

<div id="content">
<div class="center">
<!-- Message displayed if the user is not logged in or not an administrator -->
<?php

if (!isset($_SESSION['username']))
{
	echo "<div class=\"error_message\">Vous n'êtes pas connecté : pour accéder à cette page,vous devez vous connecter avec votre nom d'utilisateur et votre mot de passe, ou vous enregistrer comme nouveau membre.</div>";
?>
	<script>
	setTimeout("window.location='index.php'",3000);
	</script>
<?php
}
else
{
	$access = $bdd->prepare('SELECT isadmin FROM euro_user WHERE username = ?');
	$access->execute(array($_SESSION['username']));
	$accessdata = $access->fetch();
	if ($accessdata['isadmin'] == 0)
	{
		echo "<div class=\"error_message\">Accès refusé<br> Vous allez être redirigé vers la page d'accueil.</div>";
?>
	<script>
	setTimeout("window.location='index.php'",3000);
	</script>
<!-- End of the message displayed when the user is not logged in or not an admin -->
<?php
	}
	else
	{
?>


<div id="horizontalTab">

<ul>
        <li><a href="#tab-1">MAJ Poules</a></li>
        <li><a href="#tab-2">MAJ Finales</a></li>
        <li><a href="#tab-3">MAJ Gagnants</a></li>
        <li><a href="#tab-4">USERS</a></li>
    </ul>
    
    <!-- Loop to display each match with inputs to enter the score -->
   <div id="tab-1">
       <h3>Mise à jour des matchs de poule</h3>
           <div class="autogrid2">
	   	    
	 <div>
	<h2 class="h3-like"><a href="#">Groupe A</a></h2>
	
	<form id="match1_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match1_team1">Brésil</label>
	<input type="number" id="score_match1_team1" name="score_match1_team1" value="3" disabled="disabled"> - 
	<input type="number" id="score_match1_team2" name="score_match1_team2" value="1" disabled="disabled">
	<label for="score_match1_team2">Croatie</label>
	<input type="hidden" value="3" name="edit_score_match1_team1" id="edit_score_match1_team1">
	<input type="hidden" value="1" name="edit_score_match1_team2" id="edit_score_match1_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match1" 
	name="reset_match1" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet1" name="block_bet1" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match2_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match2_team1">Mexique</label>
	<input type="number" id="score_match2_team1" name="score_match2_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match2_team2" name="score_match2_team2" value="0" disabled="disabled">
	<label for="score_match2_team2">Cameroun</label>
	<input type="hidden" value="1" name="edit_score_match2_team1" id="edit_score_match2_team1">
	<input type="hidden" value="0" name="edit_score_match2_team2" id="edit_score_match2_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match2" 
	name="reset_match2" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet2" name="block_bet2" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match17_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match17_team1">Brésil</label>
	<input type="number" id="score_match17_team1" name="score_match17_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match17_team2" name="score_match17_team2" value="0" disabled="disabled">
	<label for="score_match17_team2">Mexique</label>
	<input type="hidden" value="0" name="edit_score_match17_team1" id="edit_score_match17_team1">
	<input type="hidden" value="0" name="edit_score_match17_team2" id="edit_score_match17_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match17" 
	name="reset_match17" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet17" name="block_bet17" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match18_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match18_team1">Cameroun</label>
	<input type="number" id="score_match18_team1" name="score_match18_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match18_team2" name="score_match18_team2" value="4" disabled="disabled">
	<label for="score_match18_team2">Croatie</label>
	<input type="hidden" value="0" name="edit_score_match18_team1" id="edit_score_match18_team1">
	<input type="hidden" value="4" name="edit_score_match18_team2" id="edit_score_match18_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match18" 
	name="reset_match18" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet18" name="block_bet18" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match33_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match33_team1">Cameroun</label>
	<input type="number" id="score_match33_team1" name="score_match33_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match33_team2" name="score_match33_team2" value="4" disabled="disabled">
	<label for="score_match33_team2">Brésil</label>
	<input type="hidden" value="1" name="edit_score_match33_team1" id="edit_score_match33_team1">
	<input type="hidden" value="4" name="edit_score_match33_team2" id="edit_score_match33_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match33" 
	name="reset_match33" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet33" name="block_bet33" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match34_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match34_team1">Croatie</label>
	<input type="number" id="score_match34_team1" name="score_match34_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match34_team2" name="score_match34_team2" value="3" disabled="disabled">
	<label for="score_match34_team2">Mexique</label>
	<input type="hidden" value="1" name="edit_score_match34_team1" id="edit_score_match34_team1">
	<input type="hidden" value="3" name="edit_score_match34_team2" id="edit_score_match34_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match34" 
	name="reset_match34" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet34" name="block_bet34" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	</div><!--end Groupe A-->
	
	<div>
	<h2 class="h3-like"><a href="#">Groupe B</a></h2>
	
	<form id="match3_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match3_team1">Espagne</label>
	<input type="number" id="score_match3_team1" name="score_match3_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match3_team2" name="score_match3_team2" value="5" disabled="disabled">
	<label for="score_match3_team2">Pays-Bas</label>
	<input type="hidden" value="1" name="edit_score_match3_team1" id="edit_score_match3_team1">
	<input type="hidden" value="5" name="edit_score_match3_team2" id="edit_score_match3_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match3" 
	name="reset_match3" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet3" name="block_bet3" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match4_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match4_team1">Chili</label>
	<input type="number" id="score_match4_team1" name="score_match4_team1" value="3" disabled="disabled"> - 
	<input type="number" id="score_match4_team2" name="score_match4_team2" value="1" disabled="disabled">
	<label for="score_match4_team2">Australie</label>
	<input type="hidden" value="3" name="edit_score_match4_team1" id="edit_score_match4_team1">
	<input type="hidden" value="1" name="edit_score_match4_team2" id="edit_score_match4_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match4" 
	name="reset_match4" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet4" name="block_bet4" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match19_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match19_team1">Australie</label>
	<input type="number" id="score_match19_team1" name="score_match19_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match19_team2" name="score_match19_team2" value="3" disabled="disabled">
	<label for="score_match19_team2">Pays-Bas</label>
	<input type="hidden" value="2" name="edit_score_match19_team1" id="edit_score_match19_team1">
	<input type="hidden" value="3" name="edit_score_match19_team2" id="edit_score_match19_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match19" 
	name="reset_match19" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet19" name="block_bet19" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match20_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match20_team1">Espagne</label>
	<input type="number" id="score_match20_team1" name="score_match20_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match20_team2" name="score_match20_team2" value="2" disabled="disabled">
	<label for="score_match20_team2">Chili</label>
	<input type="hidden" value="0" name="edit_score_match20_team1" id="edit_score_match20_team1">
	<input type="hidden" value="2" name="edit_score_match20_team2" id="edit_score_match20_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match20" 
	name="reset_match20" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet20" name="block_bet20" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match35_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match35_team1">Australie</label>
	<input type="number" id="score_match35_team1" name="score_match35_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match35_team2" name="score_match35_team2" value="3" disabled="disabled">
	<label for="score_match35_team2">Espagne</label>
	<input type="hidden" value="0" name="edit_score_match35_team1" id="edit_score_match35_team1">
	<input type="hidden" value="3" name="edit_score_match35_team2" id="edit_score_match35_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match35" 
	name="reset_match35" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet35" name="block_bet35" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match36_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match36_team1">Pays-Bas</label>
	<input type="number" id="score_match36_team1" name="score_match36_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match36_team2" name="score_match36_team2" value="0" disabled="disabled">
	<label for="score_match36_team2">Chili</label>
	<input type="hidden" value="2" name="edit_score_match36_team1" id="edit_score_match36_team1">
	<input type="hidden" value="0" name="edit_score_match36_team2" id="edit_score_match36_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match36" 
	name="reset_match36" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet36" name="block_bet36" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	</div><!--end Groupe B-->
	
	<div>
	<h2 class="h3-like"><a href="#">Groupe C</a></h2>
	
	<form id="match5_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match5_team1">Colombie</label>
	<input type="number" id="score_match5_team1" name="score_match5_team1" value="3" disabled="disabled"> - 
	<input type="number" id="score_match5_team2" name="score_match5_team2" value="0" disabled="disabled">
	<label for="score_match5_team2">Grèce</label>
	<input type="hidden" value="3" name="edit_score_match5_team1" id="edit_score_match5_team1">
	<input type="hidden" value="0" name="edit_score_match5_team2" id="edit_score_match5_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match5" 
	name="reset_match5" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet5" name="block_bet5" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match6_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match6_team1">C. Ivoire</label>
	<input type="number" id="score_match6_team1" name="score_match6_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match6_team2" name="score_match6_team2" value="1" disabled="disabled">
	<label for="score_match6_team2">Japon</label>
	<input type="hidden" value="2" name="edit_score_match6_team1" id="edit_score_match6_team1">
	<input type="hidden" value="1" name="edit_score_match6_team2" id="edit_score_match6_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match6" 
	name="reset_match6" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet6" name="block_bet6" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match21_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match21_team1">Colombie</label>
	<input type="number" id="score_match21_team1" name="score_match21_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match21_team2" name="score_match21_team2" value="1" disabled="disabled">
	<label for="score_match21_team2">C. Ivoire</label>
	<input type="hidden" value="2" name="edit_score_match21_team1" id="edit_score_match21_team1">
	<input type="hidden" value="1" name="edit_score_match21_team2" id="edit_score_match21_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match21" 
	name="reset_match21" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet21" name="block_bet21" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match22_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match22_team1">Japon</label>
	<input type="number" id="score_match22_team1" name="score_match22_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match22_team2" name="score_match22_team2" value="0" disabled="disabled">
	<label for="score_match22_team2">Grèce</label>
	<input type="hidden" value="0" name="edit_score_match22_team1" id="edit_score_match22_team1">
	<input type="hidden" value="0" name="edit_score_match22_team2" id="edit_score_match22_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match22" 
	name="reset_match22" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet22" name="block_bet22" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match37_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match37_team1">Japon</label>
	<input type="number" id="score_match37_team1" name="score_match37_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match37_team2" name="score_match37_team2" value="4" disabled="disabled">
	<label for="score_match37_team2">Colombie</label>
	<input type="hidden" value="1" name="edit_score_match37_team1" id="edit_score_match37_team1">
	<input type="hidden" value="4" name="edit_score_match37_team2" id="edit_score_match37_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match37" 
	name="reset_match37" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet37" name="block_bet37" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match38_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match38_team1">Grèce</label>
	<input type="number" id="score_match38_team1" name="score_match38_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match38_team2" name="score_match38_team2" value="1" disabled="disabled">
	<label for="score_match38_team2">C. Ivoire</label>
	<input type="hidden" value="2" name="edit_score_match38_team1" id="edit_score_match38_team1">
	<input type="hidden" value="1" name="edit_score_match38_team2" id="edit_score_match38_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match38" 
	name="reset_match38" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet38" name="block_bet38" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	</div><!--end Groupe E-->
	
	<div>
	<h2 class="h3-like"><a href="#">Groupe D</a></h2>
	
	<form id="match7_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match7_team1">Uruguay</label>
	<input type="number" id="score_match7_team1" name="score_match7_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match7_team2" name="score_match7_team2" value="3" disabled="disabled">
	<label for="score_match7_team2">C. Rica</label>
	<input type="hidden" value="1" name="edit_score_match7_team1" id="edit_score_match7_team1">
	<input type="hidden" value="3" name="edit_score_match7_team2" id="edit_score_match7_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match7" 
	name="reset_match7" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet7" name="block_bet7" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match8_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match8_team1">Angleterre</label>
	<input type="number" id="score_match8_team1" name="score_match8_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match8_team2" name="score_match8_team2" value="2" disabled="disabled">
	<label for="score_match8_team2">Italie</label>
	<input type="hidden" value="1" name="edit_score_match8_team1" id="edit_score_match8_team1">
	<input type="hidden" value="2" name="edit_score_match8_team2" id="edit_score_match8_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match8" 
	name="reset_match8" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet8" name="block_bet8" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match23_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match23_team1">Uruguay</label>
	<input type="number" id="score_match23_team1" name="score_match23_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match23_team2" name="score_match23_team2" value="1" disabled="disabled">
	<label for="score_match23_team2">Angleterre</label>
	<input type="hidden" value="2" name="edit_score_match23_team1" id="edit_score_match23_team1">
	<input type="hidden" value="1" name="edit_score_match23_team2" id="edit_score_match23_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match23" 
	name="reset_match23" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet23" name="block_bet23" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match24_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match24_team1">Italie</label>
	<input type="number" id="score_match24_team1" name="score_match24_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match24_team2" name="score_match24_team2" value="1" disabled="disabled">
	<label for="score_match24_team2">C. Rica</label>
	<input type="hidden" value="0" name="edit_score_match24_team1" id="edit_score_match24_team1">
	<input type="hidden" value="1" name="edit_score_match24_team2" id="edit_score_match24_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match24" 
	name="reset_match24" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet24" name="block_bet24" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match39_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match39_team1">C. Rica</label>
	<input type="number" id="score_match39_team1" name="score_match39_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match39_team2" name="score_match39_team2" value="0" disabled="disabled">
	<label for="score_match39_team2">Angleterre</label>
	<input type="hidden" value="0" name="edit_score_match39_team1" id="edit_score_match39_team1">
	<input type="hidden" value="0" name="edit_score_match39_team2" id="edit_score_match39_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match39" 
	name="reset_match39" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet39" name="block_bet39" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match40_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match40_team1">Italie</label>
	<input type="number" id="score_match40_team1" name="score_match40_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match40_team2" name="score_match40_team2" value="1" disabled="disabled">
	<label for="score_match40_team2">Uruguay</label>
	<input type="hidden" value="0" name="edit_score_match40_team1" id="edit_score_match40_team1">
	<input type="hidden" value="1" name="edit_score_match40_team2" id="edit_score_match40_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match40" 
	name="reset_match40" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet40" name="block_bet40" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	</div><!--end Groupe D-->
	
	<div>
	<h2 class="h3-like"><a href="#">Groupe E</a></h2>
	
	<form id="match9_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match9_team1">Suisse</label>
	<input type="number" id="score_match9_team1" name="score_match9_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match9_team2" name="score_match9_team2" value="1" disabled="disabled">
	<label for="score_match9_team2">Equateur</label>
	<input type="hidden" value="2" name="edit_score_match9_team1" id="edit_score_match9_team1">
	<input type="hidden" value="1" name="edit_score_match9_team2" id="edit_score_match9_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match9" 
	name="reset_match9" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet9" name="block_bet9" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match10_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match10_team1">France</label>
	<input type="number" id="score_match10_team1" name="score_match10_team1" value="3" disabled="disabled"> - 
	<input type="number" id="score_match10_team2" name="score_match10_team2" value="0" disabled="disabled">
	<label for="score_match10_team2">Honduras</label>
	<input type="hidden" value="3" name="edit_score_match10_team1" id="edit_score_match10_team1">
	<input type="hidden" value="0" name="edit_score_match10_team2" id="edit_score_match10_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match10" 
	name="reset_match10" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet10" name="block_bet10" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match25_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match25_team1">Suisse</label>
	<input type="number" id="score_match25_team1" name="score_match25_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match25_team2" name="score_match25_team2" value="5" disabled="disabled">
	<label for="score_match25_team2">France</label>
	<input type="hidden" value="2" name="edit_score_match25_team1" id="edit_score_match25_team1">
	<input type="hidden" value="5" name="edit_score_match25_team2" id="edit_score_match25_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match25" 
	name="reset_match25" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet25" name="block_bet25" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match26_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match26_team1">Honduras</label>
	<input type="number" id="score_match26_team1" name="score_match26_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match26_team2" name="score_match26_team2" value="2" disabled="disabled">
	<label for="score_match26_team2">Equateur</label>
	<input type="hidden" value="1" name="edit_score_match26_team1" id="edit_score_match26_team1">
	<input type="hidden" value="2" name="edit_score_match26_team2" id="edit_score_match26_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match26" 
	name="reset_match26" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet26" name="block_bet26" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match41_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match41_team1">Honduras</label>
	<input type="number" id="score_match41_team1" name="score_match41_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match41_team2" name="score_match41_team2" value="3" disabled="disabled">
	<label for="score_match41_team2">Suisse</label>
	<input type="hidden" value="0" name="edit_score_match41_team1" id="edit_score_match41_team1">
	<input type="hidden" value="3" name="edit_score_match41_team2" id="edit_score_match41_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match41" 
	name="reset_match41" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet41" name="block_bet41" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match42_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match42_team1">Equateur</label>
	<input type="number" id="score_match42_team1" name="score_match42_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match42_team2" name="score_match42_team2" value="0" disabled="disabled">
	<label for="score_match42_team2">France</label>
	<input type="hidden" value="0" name="edit_score_match42_team1" id="edit_score_match42_team1">
	<input type="hidden" value="0" name="edit_score_match42_team2" id="edit_score_match42_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match42" 
	name="reset_match42" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet42" name="block_bet42" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	</div><!--end Groupe E-->
	
	<div>
	<h2 class="h3-like"><a href="#">Groupe F</a></h2>
	
	<form id="match11_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match11_team1">Argentine</label>
	<input type="number" id="score_match11_team1" name="score_match11_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match11_team2" name="score_match11_team2" value="1" disabled="disabled">
	<label for="score_match11_team2">Bosnie</label>
	<input type="hidden" value="2" name="edit_score_match11_team1" id="edit_score_match11_team1">
	<input type="hidden" value="1" name="edit_score_match11_team2" id="edit_score_match11_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match11" 
	name="reset_match11" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet11" name="block_bet11" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match12_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match12_team1">Iran</label>
	<input type="number" id="score_match12_team1" name="score_match12_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match12_team2" name="score_match12_team2" value="0" disabled="disabled">
	<label for="score_match12_team2">Nigeria</label>
	<input type="hidden" value="0" name="edit_score_match12_team1" id="edit_score_match12_team1">
	<input type="hidden" value="0" name="edit_score_match12_team2" id="edit_score_match12_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match12" 
	name="reset_match12" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet12" name="block_bet12" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match27_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match27_team1">Argentine</label>
	<input type="number" id="score_match27_team1" name="score_match27_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match27_team2" name="score_match27_team2" value="0" disabled="disabled">
	<label for="score_match27_team2">Iran</label>
	<input type="hidden" value="1" name="edit_score_match27_team1" id="edit_score_match27_team1">
	<input type="hidden" value="0" name="edit_score_match27_team2" id="edit_score_match27_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match27" 
	name="reset_match27" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet27" name="block_bet27" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match28_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match28_team1">Nigeria</label>
	<input type="number" id="score_match28_team1" name="score_match28_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match28_team2" name="score_match28_team2" value="0" disabled="disabled">
	<label for="score_match28_team2">Bosnie</label>
	<input type="hidden" value="1" name="edit_score_match28_team1" id="edit_score_match28_team1">
	<input type="hidden" value="0" name="edit_score_match28_team2" id="edit_score_match28_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match28" 
	name="reset_match28" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet28" name="block_bet28" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match43_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match43_team1">Bosnie</label>
	<input type="number" id="score_match43_team1" name="score_match43_team1" value="3" disabled="disabled"> - 
	<input type="number" id="score_match43_team2" name="score_match43_team2" value="1" disabled="disabled">
	<label for="score_match43_team2">Iran</label>
	<input type="hidden" value="3" name="edit_score_match43_team1" id="edit_score_match43_team1">
	<input type="hidden" value="1" name="edit_score_match43_team2" id="edit_score_match43_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match43" 
	name="reset_match43" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet43" name="block_bet43" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match44_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match44_team1">Nigeria</label>
	<input type="number" id="score_match44_team1" name="score_match44_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match44_team2" name="score_match44_team2" value="3" disabled="disabled">
	<label for="score_match44_team2">Argentine</label>
	<input type="hidden" value="2" name="edit_score_match44_team1" id="edit_score_match44_team1">
	<input type="hidden" value="3" name="edit_score_match44_team2" id="edit_score_match44_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match44" 
	name="reset_match44" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet44" name="block_bet44" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	</div><!--end Groupe F-->
	    
	    </div><!--end autogrid2-->
	    <p class="up"><a href="#container">&uarr;&nbsp;Haut de page</a></p>
   </div><!--end tab-1 -->
 
   
   <div id="tab-2">
       <h3>Mise à jour des finales</h3>
	    <div class="autogrid2">
	    
	    <div>
	    <h2 class="h3-like"><a href="#">Huitièmes de finale</a></h2>
	    
	    <form id="match49_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match49_team1">Brésil</label>
	<input type="number" id="score_match49_team1" name="score_match49_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match49_team2" name="score_match49_team2" value="1" disabled="disabled">
	<label for="score_match49_team2">Chili</label>
	<input type="hidden" value="1" name="edit_score_match49_team1" id="edit_score_match49_team1">
	<input type="hidden" value="1" name="edit_score_match49_team2" id="edit_score_match49_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 49 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation49" id="prolongation49" checked="true" disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 49 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 49 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match49_team1" value="3" disabled="disabled"> - 
	<input type="number" id="score_tab_match49_team2" name="score_tab_match49_team2" value="2" disabled="disabled">
	<input type="hidden" value="3" name="edit_score_tab_match49_team1" id="edit_score_tab_match49_team1">
	<input type="hidden" value="2" name="edit_score_tab_match49_team2" id="edit_score_tab_match49_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match49" 
	name="reset_match49" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet49" name="block_bet49" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match50_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match50_team1">Colombie</label>
	<input type="number" id="score_match50_team1" name="score_match50_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match50_team2" name="score_match50_team2" value="0" disabled="disabled">
	<label for="score_match50_team2">Uruguay</label>
	<input type="hidden" value="2" name="edit_score_match50_team1" id="edit_score_match50_team1">
	<input type="hidden" value="0" name="edit_score_match50_team2" id="edit_score_match50_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 50 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation50" id="prolongation50"  disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 50 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 50 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match50_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match50_team2" name="score_tab_match50_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match50_team1" id="edit_score_tab_match50_team1">
	<input type="hidden" value="" name="edit_score_tab_match50_team2" id="edit_score_tab_match50_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match50" 
	name="reset_match50" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet50" name="block_bet50" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match51_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match51_team1">Pays-Bas</label>
	<input type="number" id="score_match51_team1" name="score_match51_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match51_team2" name="score_match51_team2" value="1" disabled="disabled">
	<label for="score_match51_team2">Mexique</label>
	<input type="hidden" value="2" name="edit_score_match51_team1" id="edit_score_match51_team1">
	<input type="hidden" value="1" name="edit_score_match51_team2" id="edit_score_match51_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 51 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation51" id="prolongation51"  disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 51 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 51 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match51_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match51_team2" name="score_tab_match51_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match51_team1" id="edit_score_tab_match51_team1">
	<input type="hidden" value="" name="edit_score_tab_match51_team2" id="edit_score_tab_match51_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match51" 
	name="reset_match51" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet51" name="block_bet51" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match52_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match52_team1">C. Rica</label>
	<input type="number" id="score_match52_team1" name="score_match52_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match52_team2" name="score_match52_team2" value="1" disabled="disabled">
	<label for="score_match52_team2">Grèce</label>
	<input type="hidden" value="1" name="edit_score_match52_team1" id="edit_score_match52_team1">
	<input type="hidden" value="1" name="edit_score_match52_team2" id="edit_score_match52_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 52 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation52" id="prolongation52" checked="true" disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 52 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 52 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match52_team1" value="5" disabled="disabled"> - 
	<input type="number" id="score_tab_match52_team2" name="score_tab_match52_team2" value="3" disabled="disabled">
	<input type="hidden" value="5" name="edit_score_tab_match52_team1" id="edit_score_tab_match52_team1">
	<input type="hidden" value="3" name="edit_score_tab_match52_team2" id="edit_score_tab_match52_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match52" 
	name="reset_match52" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet52" name="block_bet52" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match53_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match53_team1">France</label>
	<input type="number" id="score_match53_team1" name="score_match53_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match53_team2" name="score_match53_team2" value="0" disabled="disabled">
	<label for="score_match53_team2">Nigeria</label>
	<input type="hidden" value="2" name="edit_score_match53_team1" id="edit_score_match53_team1">
	<input type="hidden" value="0" name="edit_score_match53_team2" id="edit_score_match53_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 53 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation53" id="prolongation53"  disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 53 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 53 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match53_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match53_team2" name="score_tab_match53_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match53_team1" id="edit_score_tab_match53_team1">
	<input type="hidden" value="" name="edit_score_tab_match53_team2" id="edit_score_tab_match53_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match53" 
	name="reset_match53" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet53" name="block_bet53" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match54_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match54_team1">Allemagne</label>
	<input type="number" id="score_match54_team1" name="score_match54_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match54_team2" name="score_match54_team2" value="1" disabled="disabled">
	<label for="score_match54_team2">Algérie</label>
	<input type="hidden" value="2" name="edit_score_match54_team1" id="edit_score_match54_team1">
	<input type="hidden" value="1" name="edit_score_match54_team2" id="edit_score_match54_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 54 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation54" id="prolongation54" checked="true" disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 54 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 54 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match54_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match54_team2" name="score_tab_match54_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match54_team1" id="edit_score_tab_match54_team1">
	<input type="hidden" value="" name="edit_score_tab_match54_team2" id="edit_score_tab_match54_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match54" 
	name="reset_match54" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet54" name="block_bet54" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match55_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match55_team1">Argentine</label>
	<input type="number" id="score_match55_team1" name="score_match55_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match55_team2" name="score_match55_team2" value="0" disabled="disabled">
	<label for="score_match55_team2">Suisse</label>
	<input type="hidden" value="1" name="edit_score_match55_team1" id="edit_score_match55_team1">
	<input type="hidden" value="0" name="edit_score_match55_team2" id="edit_score_match55_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 55 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation55" id="prolongation55" checked="true" disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 55 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 55 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match55_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match55_team2" name="score_tab_match55_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match55_team1" id="edit_score_tab_match55_team1">
	<input type="hidden" value="" name="edit_score_tab_match55_team2" id="edit_score_tab_match55_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match55" 
	name="reset_match55" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet55" name="block_bet55" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match56_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match56_team1">Belgique</label>
	<input type="number" id="score_match56_team1" name="score_match56_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match56_team2" name="score_match56_team2" value="1" disabled="disabled">
	<label for="score_match56_team2">Etats-Unis</label>
	<input type="hidden" value="2" name="edit_score_match56_team1" id="edit_score_match56_team1">
	<input type="hidden" value="1" name="edit_score_match56_team2" id="edit_score_match56_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 56 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation56" id="prolongation56" checked="true" disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 56 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 56 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match56_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match56_team2" name="score_tab_match56_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match56_team1" id="edit_score_tab_match56_team1">
	<input type="hidden" value="" name="edit_score_tab_match56_team2" id="edit_score_tab_match56_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match56" 
	name="reset_match56" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet56" name="block_bet56" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	</div><!--end Huitièmes-->
	
	<div>
	<h2 class="h3-like"><a href="#">Quarts de finale</a></h2>
		
	<form id="match57_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match57_team1">Brésil</label>
	<input type="number" id="score_match57_team1" name="score_match57_team1" value="2" disabled="disabled"> - 
	<input type="number" id="score_match57_team2" name="score_match57_team2" value="1" disabled="disabled">
	<label for="score_match57_team2">Colombie</label>
	<input type="hidden" value="2" name="edit_score_match57_team1" id="edit_score_match57_team1">
	<input type="hidden" value="1" name="edit_score_match57_team2" id="edit_score_match57_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 57 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation57" id="prolongation57"  disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 57 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 57 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match57_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match57_team2" name="score_tab_match57_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match57_team1" id="edit_score_tab_match57_team1">
	<input type="hidden" value="" name="edit_score_tab_match57_team2" id="edit_score_tab_match57_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match57" 
	name="reset_match57" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet57" name="block_bet57" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match58_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match58_team1">France</label>
	<input type="number" id="score_match58_team1" name="score_match58_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match58_team2" name="score_match58_team2" value="1" disabled="disabled">
	<label for="score_match58_team2">Allemagne</label>
	<input type="hidden" value="0" name="edit_score_match58_team1" id="edit_score_match58_team1">
	<input type="hidden" value="1" name="edit_score_match58_team2" id="edit_score_match58_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 58 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation58" id="prolongation58"  disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 58 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 58 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match58_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match58_team2" name="score_tab_match58_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match58_team1" id="edit_score_tab_match58_team1">
	<input type="hidden" value="" name="edit_score_tab_match58_team2" id="edit_score_tab_match58_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match58" 
	name="reset_match58" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet58" name="block_bet58" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match59_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match59_team1">Pays-Bas</label>
	<input type="number" id="score_match59_team1" name="score_match59_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match59_team2" name="score_match59_team2" value="0" disabled="disabled">
	<label for="score_match59_team2">C. Rica</label>
	<input type="hidden" value="0" name="edit_score_match59_team1" id="edit_score_match59_team1">
	<input type="hidden" value="0" name="edit_score_match59_team2" id="edit_score_match59_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 59 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation59" id="prolongation59" checked="true" disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 59 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 59 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match59_team1" value="4" disabled="disabled"> - 
	<input type="number" id="score_tab_match59_team2" name="score_tab_match59_team2" value="3" disabled="disabled">
	<input type="hidden" value="4" name="edit_score_tab_match59_team1" id="edit_score_tab_match59_team1">
	<input type="hidden" value="3" name="edit_score_tab_match59_team2" id="edit_score_tab_match59_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match59" 
	name="reset_match59" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet59" name="block_bet59" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match60_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match60_team1">Argentine</label>
	<input type="number" id="score_match60_team1" name="score_match60_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match60_team2" name="score_match60_team2" value="0" disabled="disabled">
	<label for="score_match60_team2">Belgique</label>
	<input type="hidden" value="1" name="edit_score_match60_team1" id="edit_score_match60_team1">
	<input type="hidden" value="0" name="edit_score_match60_team2" id="edit_score_match60_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 60 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation60" id="prolongation60"  disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 60 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 60 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match60_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match60_team2" name="score_tab_match60_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match60_team1" id="edit_score_tab_match60_team1">
	<input type="hidden" value="" name="edit_score_tab_match60_team2" id="edit_score_tab_match60_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match60" 
	name="reset_match60" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet60" name="block_bet60" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	
	<h2 class="h3-like"><a href="#">Demi-finales</a></h2>
	
	<form id="match61_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match61_team1">Allemagne</label>
	<input type="number" id="score_match61_team1" name="score_match61_team1" value="7" disabled="disabled"> - 
	<input type="number" id="score_match61_team2" name="score_match61_team2" value="1" disabled="disabled">
	<label for="score_match61_team2">Brésil</label>
	<input type="hidden" value="7" name="edit_score_match61_team1" id="edit_score_match61_team1">
	<input type="hidden" value="1" name="edit_score_match61_team2" id="edit_score_match61_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 61 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation61" id="prolongation61"  disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 61 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 61 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match61_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match61_team2" name="score_tab_match61_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match61_team1" id="edit_score_tab_match61_team1">
	<input type="hidden" value="" name="edit_score_tab_match61_team2" id="edit_score_tab_match61_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match61" 
	name="reset_match61" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet61" name="block_bet61" value="Débloquer">
	</fieldset>
	</form>
	
		<hr>
	<form id="match62_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match62_team1">Argentine</label>
	<input type="number" id="score_match62_team1" name="score_match62_team1" value="0" disabled="disabled"> - 
	<input type="number" id="score_match62_team2" name="score_match62_team2" value="0" disabled="disabled">
	<label for="score_match62_team2">Pays-Bas</label>
	<input type="hidden" value="0" name="edit_score_match62_team1" id="edit_score_match62_team1">
	<input type="hidden" value="0" name="edit_score_match62_team2" id="edit_score_match62_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 62 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation62" id="prolongation62" checked="true" disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 62 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 62 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match62_team1" value="4" disabled="disabled"> - 
	<input type="number" id="score_tab_match62_team2" name="score_tab_match62_team2" value="2" disabled="disabled">
	<input type="hidden" value="4" name="edit_score_tab_match62_team1" id="edit_score_tab_match62_team1">
	<input type="hidden" value="2" name="edit_score_tab_match62_team2" id="edit_score_tab_match62_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match62" 
	name="reset_match62" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet62" name="block_bet62" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	
	<h2 class="h3-like"><a href="#">Finale</a></h2>
		
	<form id="match64_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match64_team1">Allemagne</label>
	<input type="number" id="score_match64_team1" name="score_match64_team1" value="1" disabled="disabled"> - 
	<input type="number" id="score_match64_team2" name="score_match64_team2" value="0" disabled="disabled">
	<label for="score_match64_team2">Argentine</label>
	<input type="hidden" value="1" name="edit_score_match64_team1" id="edit_score_match64_team1">
	<input type="hidden" value="0" name="edit_score_match64_team2" id="edit_score_match64_team2">
		<br>
	<label for="prolongation<br />
<b>Notice</b>:  Undefined variable: 64 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>133</b><br />
">Prolongations</label>
	<input type="checkbox" name="prolongation64" id="prolongation64" checked="true" disabled="disabled"><br>
		<label for="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 64 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>135</b><br />
">Tirs au but</label>
	<input type="number" id="score_tab_match<br />
<b>Notice</b>:  Undefined variable: 64 in <b>/home/assayah/www/Brazil/admin.php</b> on line <b>136</b><br />
_team1" name="score_tab_match64_team1"  disabled="disabled"> - 
	<input type="number" id="score_tab_match64_team2" name="score_tab_match64_team2"  disabled="disabled">
	<input type="hidden" value="" name="edit_score_tab_match64_team1" id="edit_score_tab_match64_team1">
	<input type="hidden" value="" name="edit_score_tab_match64_team2" id="edit_score_tab_match64_team2">
		<br>
	<input type="submit" class="admin_updates_edit btn-vert" id="reset_match64" 
	name="reset_match64" value="Editer"> 
	<input type="submit" class="admin_updates_block btn-vert" id="block_bet64" name="block_bet64" value="Débloquer">
	</fieldset>
	</form>
	<hr>
	</div><!--end Finale-->
	    
	    </div><!--end autogrid2-->
	    <p class="up"><a href="#container">&uarr;&nbsp;Haut de page</a></p>
   </div><!--end tab-2 -->
   <!-- End Loop to display each match with inputs to enter the score-->
   
 
 <!-- Loop to display all potential qualified teams and choose the ones that will win in the group stage -->  
   <div id="tab-3">
       <h3>Mise à jour des gagnants</h3>
 	    <div class="autogrid2">
	    
	   <div>
<h2 class="h3-like">Huitièmes de finale</h2>
<form id="update_huitieme1" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team1">Premier Groupe A</label>
<select id="update_huitieme_team1" name="update_huitieme_team1">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme1" value="Envoyer" id="submit_huitieme1">
</fieldset>
</form>
<form id="update_huitieme2" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team2">Second Groupe B</label>
<select id="update_huitieme_team2" name="update_huitieme_team2">
<option value="first"></option>
<option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme2" value="Envoyer" id="submit_huitieme2">
</fieldset>
</form>
<form id="update_huitieme3" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team3">Premier Groupe C</label>
<select id="update_huitieme_team3" name="update_huitieme_team3">
<option value="first"></option>
<option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme3" value="Envoyer" id="submit_huitieme3">
</fieldset>
</form>
<form id="update_huitieme4" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team4">Second Groupe D</label>
<select id="update_huitieme_team4" name="update_huitieme_team4">
<option value="first"></option>
<option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme4" value="Envoyer" id="submit_huitieme4">
</fieldset>
</form>
<form id="update_huitieme5" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team5">Premier Groupe B</label>
<select id="update_huitieme_team5" name="update_huitieme_team5">
<option value="first"></option>
<option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme5" value="Envoyer" id="submit_huitieme5">
</fieldset>
</form>
<form id="update_huitieme6" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team6">Second Groupe A</label>
<select id="update_huitieme_team6" name="update_huitieme_team6">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme6" value="Envoyer" id="submit_huitieme6">
</fieldset>
</form>
<form id="update_huitieme7" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team7">Premier Groupe D</label>
<select id="update_huitieme_team7" name="update_huitieme_team7">
<option value="first"></option>
<option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme7" value="Envoyer" id="submit_huitieme7">
</fieldset>
</form>
<form id="update_huitieme8" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team8">Second Groupe C</label>
<select id="update_huitieme_team8" name="update_huitieme_team8">
<option value="first"></option>
<option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme8" value="Envoyer" id="submit_huitieme8">
</fieldset>
</form>
<form id="update_huitieme9" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team9">Premier Groupe E</label>
<select id="update_huitieme_team9" name="update_huitieme_team9">
<option value="first"></option>
<option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme9" value="Envoyer" id="submit_huitieme9">
</fieldset>
</form>
<form id="update_huitieme10" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team10">Second Groupe F</label>
<select id="update_huitieme_team10" name="update_huitieme_team10">
<option value="first"></option>
<option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme10" value="Envoyer" id="submit_huitieme10">
</fieldset>
</form>
<form id="update_huitieme11" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team11">Premier Groupe G</label>
<select id="update_huitieme_team11" name="update_huitieme_team11">
<option value="first"></option>
<option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme11" value="Envoyer" id="submit_huitieme11">
</fieldset>
</form>
<form id="update_huitieme12" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team12">Second Groupe H</label>
<select id="update_huitieme_team12" name="update_huitieme_team12">
<option value="first"></option>
<option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme12" value="Envoyer" id="submit_huitieme12">
</fieldset>
</form>
<form id="update_huitieme13" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team13">Premier Groupe F</label>
<select id="update_huitieme_team13" name="update_huitieme_team13">
<option value="first"></option>
<option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme13" value="Envoyer" id="submit_huitieme13">
</fieldset>
</form>
<form id="update_huitieme14" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team14">Second Groupe E</label>
<select id="update_huitieme_team14" name="update_huitieme_team14">
<option value="first"></option>
<option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme14" value="Envoyer" id="submit_huitieme14">
</fieldset>
</form>
<form id="update_huitieme15" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team15">Premier Groupe H</label>
<select id="update_huitieme_team15" name="update_huitieme_team15">
<option value="first"></option>
<option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme15" value="Envoyer" id="submit_huitieme15">
</fieldset>
</form>
<form id="update_huitieme16" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team16">Second Groupe G</label>
<select id="update_huitieme_team16" name="update_huitieme_team16">
<option value="first"></option>
<option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_huitieme16" value="Envoyer" id="submit_huitieme16">
</fieldset>
</form>
</div><!--end Huitièmes-->

<div>
<h2 class="h3-like">Quarts de finale</h2>
<form id="update_quarter1" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team1">Gagnant Huitième 1</label>
<select id="update_quarter_team1" name="update_quarter_team1">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_quarter1" value="Envoyer" id="submit_quarter1">
</fieldset>
</form>
<form id="update_quarter2" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team2">Gagnant Huitième 3</label>
<select id="update_quarter_team2" name="update_quarter_team2">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_quarter2" value="Envoyer" id="submit_quarter2">
</fieldset>
</form>
<form id="update_quarter3" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team3">Gagnant Huitième 2</label>
<select id="update_quarter_team3" name="update_quarter_team3">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_quarter3" value="Envoyer" id="submit_quarter3">
</fieldset>
</form>
<form id="update_quarter4" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team4">Gagnant Huitième 4</label>
<select id="update_quarter_team4" name="update_quarter_team4">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_quarter4" value="Envoyer" id="submit_quarter4">
</fieldset>
</form>
<form id="update_quarter5" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team5">Gagnant Huitième 5</label>
<select id="update_quarter_team5" name="update_quarter_team5">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_quarter5" value="Envoyer" id="submit_quarter5">
</fieldset>
</form>
<form id="update_quarter6" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team6">Gagnant Huitième 7</label>
<select id="update_quarter_team6" name="update_quarter_team6">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_quarter6" value="Envoyer" id="submit_quarter6">
</fieldset>
</form>
<form id="update_quarter7" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team7">Gagnant Huitième 6</label>
<select id="update_quarter_team7" name="update_quarter_team7">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_quarter7" value="Envoyer" id="submit_quarter7">
</fieldset>
</form>
<form id="update_quarter8" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team8">Gagnant Huitième 8</label>
<select id="update_quarter_team8" name="update_quarter_team8">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_quarter8" value="Envoyer" id="submit_quarter8">
</fieldset>
</form>


<h2 class="h3-like">Demi-finales</h2>
<form id="update_semi1" method="POST" action="admin.php">
<fieldset>
<label for="update_semi_team1">Gagnant Quart 1</label>
<select id="update_semi_team1" name="update_semi_team1">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_semi1" value="Envoyer" id="submit_semi1">
</fieldset>
</form>
<form id="update_semi2" method="POST" action="admin.php">
<fieldset>
<label for="update_semi_team2">Gagnant Quart 3</label>
<select id="update_semi_team2" name="update_semi_team2">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_semi2" value="Envoyer" id="submit_semi2">
</fieldset>
</form>
<form id="update_semi3" method="POST" action="admin.php">
<fieldset>
<label for="update_semi_team3">Gagnant Quart 2</label>
<select id="update_semi_team3" name="update_semi_team3">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_semi3" value="Envoyer" id="submit_semi3">
</fieldset>
</form>
<form id="update_semi4" method="POST" action="admin.php">
<fieldset>
<label for="update_semi_team4">Gagnant Quart 4</label>
<select id="update_semi_team4" name="update_semi_team4">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_semi4" value="Envoyer" id="submit_semi4">
</fieldset>
</form>

<h2 class="h3-like">Finale</h2>
<form id="update_final1" method="POST" action="admin.php">
<fieldset>
<label for="update_final_team1">Gagnant Demi 1</label>
<select id="update_final_team1" name="update_final_team1">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_final1" value="Envoyer" id="submit_final1">
</fieldset>
</form>
<form id="update_final2" method="POST" action="admin.php">
<fieldset>
<label for="update_final_team2">Gagnant Demi 2</label>
<select id="update_final_team2" name="update_final_team2">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-vert" name="submit_final2" value="Envoyer" id="submit_final2">
</fieldset>
</form>
</div><!--end Huitièmes-->
	    
	    </div><!--end autogrid2-->          
	    <p class="up"><a href="#container">&uarr;&nbsp;Haut de page</a></p>
   </div><!--end tab-3 -->
   <!-- End Loop to display all potential qualified teams and choose the ones that will win in the group stage -->
 
 
   <!-- Loop to display all users in a table and be able to delete them -->     
   <div id="tab-4">

           <div id="search_user" class="mtm mbm"><label for="search_users">Recherche Utilisateur: </label><input id="search_users"></div>

           <table id="admin_users" class="striped alternate">
<caption>
<h2 class="h3-like">Utilisateurs</h2></caption>
<thead>
<tr>
<th class="first">Nom</th>
<th>Points</th>
<th>Top 4</th>
<th>Supprimer</th>
</tr>
</thead>
<tbody>
<tr>
<td class="first">alex</td>
<td>38</td>
<td> France -  Allemagne -  Italie -  Brésil</td>
<td><form id="delete_user1" method="POST" action="admin.php">
<input type="hidden" id="delete_alex" name="delete_alex" 
value="alex"> <input type="submit" class="submit btn-vert" id="submit_delete_user_alex" 
name="submit_delete_user_alex" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">aurelien</td>
<td>25</td>
<td> Brésil -  Argentine -  Espagne -  Italie</td>
<td><form id="delete_user2" method="POST" action="admin.php">
<input type="hidden" id="delete_aurelien" name="delete_aurelien" 
value="aurelien"> <input type="submit" class="submit btn-vert" id="submit_delete_user_aurelien" 
name="submit_delete_user_aurelien" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Beary</td>
<td>31</td>
<td> Brésil -  Espagne -  Argentine -  Allemagne</td>
<td><form id="delete_user3" method="POST" action="admin.php">
<input type="hidden" id="delete_Beary" name="delete_Beary" 
value="Beary"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Beary" 
name="submit_delete_user_Beary" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Bruno</td>
<td>42</td>
<td> France -  Brésil -  Italie -  Argentine</td>
<td><form id="delete_user4" method="POST" action="admin.php">
<input type="hidden" id="delete_Bruno" name="delete_Bruno" 
value="Bruno"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Bruno" 
name="submit_delete_user_Bruno" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Catherine</td>
<td>35</td>
<td> Espagne -  Brésil -  Allemagne -  Argentine</td>
<td><form id="delete_user5" method="POST" action="admin.php">
<input type="hidden" id="delete_Catherine" name="delete_Catherine" 
value="Catherine"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Catherine" 
name="submit_delete_user_Catherine" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">cedric</td>
<td>32</td>
<td> France -  Allemagne -  Brésil -  Italie</td>
<td><form id="delete_user6" method="POST" action="admin.php">
<input type="hidden" id="delete_cedric" name="delete_cedric" 
value="cedric"> <input type="submit" class="submit btn-vert" id="submit_delete_user_cedric" 
name="submit_delete_user_cedric" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">clementv</td>
<td>36</td>
<td> Espagne -  Brésil -  Allemagne -  Portugal</td>
<td><form id="delete_user7" method="POST" action="admin.php">
<input type="hidden" id="delete_clementv" name="delete_clementv" 
value="clementv"> <input type="submit" class="submit btn-vert" id="submit_delete_user_clementv" 
name="submit_delete_user_clementv" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Djipi</td>
<td>0</td>
<td> Brésil -  Allemagne -  France -  Espagne</td>
<td><form id="delete_user8" method="POST" action="admin.php">
<input type="hidden" id="delete_Djipi" name="delete_Djipi" 
value="Djipi"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Djipi" 
name="submit_delete_user_Djipi" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">domi</td>
<td>38</td>
<td> Espagne -  Brésil -  Allemagne -  Argentine</td>
<td><form id="delete_user9" method="POST" action="admin.php">
<input type="hidden" id="delete_domi" name="delete_domi" 
value="domi"> <input type="submit" class="submit btn-vert" id="submit_delete_user_domi" 
name="submit_delete_user_domi" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">emanuele</td>
<td>21</td>
<td> -  -  - </td>
<td><form id="delete_user10" method="POST" action="admin.php">
<input type="hidden" id="delete_emanuele" name="delete_emanuele" 
value="emanuele"> <input type="submit" class="submit btn-vert" id="submit_delete_user_emanuele" 
name="submit_delete_user_emanuele" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Franckinho</td>
<td>14</td>
<td> Brésil -  Argentine -  Allemagne -  Uruguay</td>
<td><form id="delete_user11" method="POST" action="admin.php">
<input type="hidden" id="delete_Franckinho" name="delete_Franckinho" 
value="Franckinho"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Franckinho" 
name="submit_delete_user_Franckinho" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">fufu</td>
<td>32</td>
<td>Brésil - Argentine - Allemagne - Espagne</td>
<td><form id="delete_user12" method="POST" action="admin.php">
<input type="hidden" id="delete_fufu" name="delete_fufu" 
value="fufu"> <input type="submit" class="submit btn-vert" id="submit_delete_user_fufu" 
name="submit_delete_user_fufu" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Grissouris</td>
<td>36</td>
<td> France -  Brésil -  Argentine -  Italie</td>
<td><form id="delete_user13" method="POST" action="admin.php">
<input type="hidden" id="delete_Grissouris" name="delete_Grissouris" 
value="Grissouris"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Grissouris" 
name="submit_delete_user_Grissouris" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">guigui</td>
<td>33</td>
<td> France -  Espagne -  Brésil -  Nigeria</td>
<td><form id="delete_user14" method="POST" action="admin.php">
<input type="hidden" id="delete_guigui" name="delete_guigui" 
value="guigui"> <input type="submit" class="submit btn-vert" id="submit_delete_user_guigui" 
name="submit_delete_user_guigui" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">ionesco</td>
<td>0</td>
<td> -  -  - </td>
<td><form id="delete_user15" method="POST" action="admin.php">
<input type="hidden" id="delete_ionesco" name="delete_ionesco" 
value="ionesco"> <input type="submit" class="submit btn-vert" id="submit_delete_user_ionesco" 
name="submit_delete_user_ionesco" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Joel</td>
<td>38</td>
<td> Brésil -  Argentine -  France -  Espagne</td>
<td><form id="delete_user16" method="POST" action="admin.php">
<input type="hidden" id="delete_Joel" name="delete_Joel" 
value="Joel"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Joel" 
name="submit_delete_user_Joel" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Joffrey</td>
<td>40</td>
<td> France -  Espagne -  Brésil -  Argentine</td>
<td><form id="delete_user17" method="POST" action="admin.php">
<input type="hidden" id="delete_Joffrey" name="delete_Joffrey" 
value="Joffrey"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Joffrey" 
name="submit_delete_user_Joffrey" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Jp</td>
<td>30</td>
<td> Brésil -  France -  Allemagne -  Argentine</td>
<td><form id="delete_user18" method="POST" action="admin.php">
<input type="hidden" id="delete_Jp" name="delete_Jp" 
value="Jp"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Jp" 
name="submit_delete_user_Jp" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">jscslover</td>
<td>4</td>
<td> Brésil -  Pays-Bas -  France -  Espagne</td>
<td><form id="delete_user19" method="POST" action="admin.php">
<input type="hidden" id="delete_jscslover" name="delete_jscslover" 
value="jscslover"> <input type="submit" class="submit btn-vert" id="submit_delete_user_jscslover" 
name="submit_delete_user_jscslover" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">karolina</td>
<td>12</td>
<td> Allemagne -  Brésil -  France -  Portugal</td>
<td><form id="delete_user20" method="POST" action="admin.php">
<input type="hidden" id="delete_karolina" name="delete_karolina" 
value="karolina"> <input type="submit" class="submit btn-vert" id="submit_delete_user_karolina" 
name="submit_delete_user_karolina" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">laeti</td>
<td>37</td>
<td> Brésil -  Argentine -  Portugal -  Angleterre</td>
<td><form id="delete_user21" method="POST" action="admin.php">
<input type="hidden" id="delete_laeti" name="delete_laeti" 
value="laeti"> <input type="submit" class="submit btn-vert" id="submit_delete_user_laeti" 
name="submit_delete_user_laeti" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Lanka</td>
<td>40</td>
<td> Brésil -  Espagne -  France -  Italie</td>
<td><form id="delete_user22" method="POST" action="admin.php">
<input type="hidden" id="delete_Lanka" name="delete_Lanka" 
value="Lanka"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Lanka" 
name="submit_delete_user_Lanka" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Laurene</td>
<td>43</td>
<td> France -  Brésil -  Espagne -  Argentine</td>
<td><form id="delete_user23" method="POST" action="admin.php">
<input type="hidden" id="delete_Laurene" name="delete_Laurene" 
value="Laurene"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Laurene" 
name="submit_delete_user_Laurene" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Madikera</td>
<td>22</td>
<td> Brésil -  Espagne -  Allemagne -  France</td>
<td><form id="delete_user24" method="POST" action="admin.php">
<input type="hidden" id="delete_Madikera" name="delete_Madikera" 
value="Madikera"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Madikera" 
name="submit_delete_user_Madikera" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Marco</td>
<td>28</td>
<td> Brésil -  Pays-Bas -  France -  Espagne</td>
<td><form id="delete_user25" method="POST" action="admin.php">
<input type="hidden" id="delete_Marco" name="delete_Marco" 
value="Marco"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Marco" 
name="submit_delete_user_Marco" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">maximev</td>
<td>33</td>
<td> France -  Brésil -  Espagne -  Argentine</td>
<td><form id="delete_user26" method="POST" action="admin.php">
<input type="hidden" id="delete_maximev" name="delete_maximev" 
value="maximev"> <input type="submit" class="submit btn-vert" id="submit_delete_user_maximev" 
name="submit_delete_user_maximev" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Mohamed</td>
<td>26</td>
<td> France -  Italie -  Algérie -  Espagne</td>
<td><form id="delete_user27" method="POST" action="admin.php">
<input type="hidden" id="delete_Mohamed" name="delete_Mohamed" 
value="Mohamed"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Mohamed" 
name="submit_delete_user_Mohamed" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">norbert</td>
<td>0</td>
<td> Espagne -  Brésil -  Argentine -  Allemagne</td>
<td><form id="delete_user28" method="POST" action="admin.php">
<input type="hidden" id="delete_norbert" name="delete_norbert" 
value="norbert"> <input type="submit" class="submit btn-vert" id="submit_delete_user_norbert" 
name="submit_delete_user_norbert" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">paul</td>
<td>0</td>
<td> Brésil -  Espagne -  Allemagne -  Italie</td>
<td><form id="delete_user29" method="POST" action="admin.php">
<input type="hidden" id="delete_paul" name="delete_paul" 
value="paul"> <input type="submit" class="submit btn-vert" id="submit_delete_user_paul" 
name="submit_delete_user_paul" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Philippe</td>
<td>20</td>
<td> Espagne -  Brésil -  France -  Argentine</td>
<td><form id="delete_user30" method="POST" action="admin.php">
<input type="hidden" id="delete_Philippe" name="delete_Philippe" 
value="Philippe"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Philippe" 
name="submit_delete_user_Philippe" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Romain</td>
<td>30</td>
<td> Brésil -  Argentine -  France -  Italie</td>
<td><form id="delete_user31" method="POST" action="admin.php">
<input type="hidden" id="delete_Romain" name="delete_Romain" 
value="Romain"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Romain" 
name="submit_delete_user_Romain" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Samantha</td>
<td>20</td>
<td> Brésil -  Espagne -  Argentine -  Allemagne</td>
<td><form id="delete_user32" method="POST" action="admin.php">
<input type="hidden" id="delete_Samantha" name="delete_Samantha" 
value="Samantha"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Samantha" 
name="submit_delete_user_Samantha" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">svincent</td>
<td>21</td>
<td> Brésil -  Uruguay -  Argentine -  Allemagne</td>
<td><form id="delete_user33" method="POST" action="admin.php">
<input type="hidden" id="delete_svincent" name="delete_svincent" 
value="svincent"> <input type="submit" class="submit btn-vert" id="submit_delete_user_svincent" 
name="submit_delete_user_svincent" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Syndie</td>
<td>24</td>
<td> France -  Brésil -  Portugal -  Italie</td>
<td><form id="delete_user34" method="POST" action="admin.php">
<input type="hidden" id="delete_Syndie" name="delete_Syndie" 
value="Syndie"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Syndie" 
name="submit_delete_user_Syndie" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Thang</td>
<td>4</td>
<td> Brésil -  Espagne -  France -  Portugal</td>
<td><form id="delete_user35" method="POST" action="admin.php">
<input type="hidden" id="delete_Thang" name="delete_Thang" 
value="Thang"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Thang" 
name="submit_delete_user_Thang" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">Tristan</td>
<td>21</td>
<td> -  -  - </td>
<td><form id="delete_user36" method="POST" action="admin.php">
<input type="hidden" id="delete_Tristan" name="delete_Tristan" 
value="Tristan"> <input type="submit" class="submit btn-vert" id="submit_delete_user_Tristan" 
name="submit_delete_user_Tristan" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<tr>
<td class="first">xiaoyi</td>
<td>0</td>
<td> Argentine -  Allemagne -  Espagne -  Brésil</td>
<td><form id="delete_user37" method="POST" action="admin.php">
<input type="hidden" id="delete_xiaoyi" name="delete_xiaoyi" 
value="xiaoyi"> <input type="submit" class="submit btn-vert" id="submit_delete_user_xiaoyi" 
name="submit_delete_user_xiaoyi" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
</tbody>
</table>

<!-- End Loop to display all users in a table and be able to delete them -->
<p class="up"><a href="#container">&uarr;&nbsp;Haut de page</a></p>
   </div><!--end tab-4 -->
   
 </div><!--end responsivetabsDemo-->

</div><!--end center-->
</div><!--end content-->
<?php include("footer.php"); ?>
</div><!--end#container-->

 <!-- jQuery with fallback to the 1.* for old IE -->
    <!--[if lt IE 9]>
        <script src="javascript/jquery-1.11.0.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
        <script src="javascript/jquery-2.1.0.min.js"></script>
    <!--<![endif]-->

    <!-- Responsive Tabs JS -->
    <script src="javascript/jquery.responsiveTabs.min.js"></script>
    
<script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').responsiveTabs({
                rotate: false,
                startCollapsed: 'accordion',
                collapsible: 'accordion',
                setHash: true,
                activate: function(e, tab) {
                    $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
                },
                activateState: function(e, state) {
                    //console.log(state);
                    $('.info').html('Switched from <strong>' + state.oldState + '</strong> state to <strong>' + state.newState + '</strong> state!');
                }
            });

            $('#start-rotation').on('click', function() {
                $('#horizontalTab').responsiveTabs('active');
            });
            $('#stop-rotation').on('click', function() {
                $('#horizontalTab').responsiveTabs('stopRotation');
            });
            $('#start-rotation').on('click', function() {
                $('#horizontalTab').responsiveTabs('active');
            });
            $('.select-tab').on('click', function() {
                $('#horizontalTab').responsiveTabs('activate', $(this).val());
            });

        });
    </script>

</body>
</html>

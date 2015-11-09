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
<meta name="viewport" content="initial-scale=1.0">

<link href='http://fonts.googleapis.com/css?family=Exo+2:400,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="CSS/knacss-unminified.css" />
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

<script>
        $(document).ready(function() {
            $('#login p').click(function() {
                $('#login-form').slideToggle(300);
                $(this).toggleClass('close');
            });
        }); // end ready
    </script>

</head>
<body id="page_admin">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<?php include("PHP/admin_functions.php"); ?>

<div id="content">
<div class="mw1140p center">
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
    
    <div id="update_matches">
<?php

$result = $bdd->query('SELECT * FROM euro_schedule ORDER BY ISNULL(euro_schedule.group), euro_schedule.group, id');
$defaultvalue = $bdd->query('SELECT team1result, team2result, team1penalty, team2penalty FROM euro_schedule ORDER BY ISNULL(euro_schedule.group), euro_schedule.group, id');
$i = 1;
while ($data = $result->fetch())
{
	$defaultvaluedata = $defaultvalue->fetch();
	if ($i == 1)
		echo "<h2 class=\"h3-like\"><a href=\"#\">Groupe A</a></h2><div>";
	if ($i == 7)
		echo "<h2 class=\"h3-like\"><a href=\"#\">Groupe B</a></h2><div>";
	if ($i == 13)
		echo "<h2 class=\"h3-like\"><a href=\"#\">Groupe C</a></h2><div>";
	if ($i == 19)
		echo "<h2 class=\"h3-like\"><a href=\"#\">Groupe D</a></h2><div>";
	if ($i == 25)
		echo "<h2 class=\"h3-like\"><a href=\"#\">Groupe E</a></h2><div>";
	if ($i == 31)
		echo "<h2 class=\"h3-like\"><a href=\"#\">Groupe F</a></h2><div>";
	if ($i == 37)
		echo "<h2 class=\"h3-like\"><a href=\"#\">Groupe G</a></h2><div>";
	if ($i == 43)
		echo "<h2 class=\"h3-like\"><a href=\"#\">Groupe H</a></h2><div>";
	if ($i == 49)
		echo "<h2 class=\"h3-like\"><a href=\"#\">Scores à partir des huitièmes</a></h2><div>";
	if ($defaultvaluedata['team1result'] != NULL && $defaultvaluedata['team2result'] != NULL)
		$disable = true;
	if (isset($_POST['reset_match' . $i]) || $defaultvaluedata['team1result'] == NULL || $defaultvaluedata['team2result'] == NULL)
		$disable = false;
	?>
	<hr>
	<form id="match<?php echo $data['id'];?>_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match<?php echo $data['id'];?>_team1"><?php echo $data['team1']; ?></label>
	<input type="number" id="score_match<?php echo $data['id'];?>_team1" name="score_match<?php echo $data['id']; ?>_team1" <?php if ($defaultvaluedata['team1result'] != NULL) {
	echo "value=\"" . $defaultvaluedata['team1result'] . "\""; }?> <?php if ($disable) echo "disabled=\"disabled\"";?>> - 
	<input type="number" id="score_match<?php echo $data['id'];?>_team2" name="score_match<?php echo $data['id']; ?>_team2" <?php if ($defaultvaluedata['team2result'] != NULL) {
	echo "value=\"" . $defaultvaluedata['team2result'] . "\""; }?> <?php if ($disable) echo "disabled=\"disabled\""; ?>>
	<label for="score_match<?php echo $data['id'];?>_team2"><?php echo $data['team2']; ?></label>
	<input type="hidden" value="<?php echo $defaultvaluedata['team1result'];?>" name="edit_score_match<?php echo $data['id']; ?>_team1" id="edit_score_match<?php echo $data['id']; ?>_team1">
	<input type="hidden" value="<?php echo $defaultvaluedata['team2result'];?>" name="edit_score_match<?php echo $data['id']; ?>_team2" id="edit_score_match<?php echo $data['id']; ?>_team2">
	<?php 
		if ($data['group'] == NULL)
		{
	?>
	<br>
	<label for="prolongation<?php echo $$data['id']; ?>">Prolongations</label>
	<input type="checkbox" name="prolongation<?php echo $data['id']; ?>" id="prolongation<?php echo $data['id']; ?>" <?php if ($data['overtime'] == 1) echo "checked=\"true\""; ?> <?php if ($disable) echo "disabled=\"disabled\""; ?>><br>
		<label for="score_tab_match<?php echo $$data['id']; ?>">Tirs au but</label>
	<input type="number" id="score_tab_match<?php echo $$data['id'];?>_team1" name="score_tab_match<?php echo $data['id']; ?>_team1" <?php if ($defaultvaluedata['team1penalty'] != NULL) {
	echo "value=\"" . $defaultvaluedata['team1penalty'] . "\""; }?> <?php if ($disable) echo "disabled=\"disabled\"";?>> - 
	<input type="number" id="score_tab_match<?php echo $data['id'];?>_team2" name="score_tab_match<?php echo $data['id']; ?>_team2" <?php if ($defaultvaluedata['team2penalty'] != NULL) {
	echo "value=\"" . $defaultvaluedata['team2penalty'] . "\""; }?> <?php if ($disable) echo "disabled=\"disabled\""; ?>>
	<input type="hidden" value="<?php echo $defaultvaluedata['team1penalty'];?>" name="edit_score_tab_match<?php echo $data['id']; ?>_team1" id="edit_score_tab_match<?php echo $data['id']; ?>_team1">
	<input type="hidden" value="<?php echo $defaultvaluedata['team2penalty'];?>" name="edit_score_tab_match<?php echo $data['id']; ?>_team2" id="edit_score_tab_match<?php echo $data['id']; ?>_team2">
	<?php 
	}
	?>
	<br>
	<input type="submit" class="admin_updates_edit btn-rouge" id="<?php if ($disable) echo "reset_match" . $data['id']; else echo "submit_match" . $data['id'];?>" 
	name="<?php if ($disable) echo "reset_match" . $data['id']; else echo "submit_match" . $data['id'];?>" value="<?php if ($disable == 1) echo "Editer"; else echo "Envoyer";?>"> 
	<input type="submit" class="admin_updates_block btn-rouge" id="block_bet<?php echo $data['id'];?>" name="block_bet<?php echo $data['id'];?>" value="<?php if ($data['available']) echo "Bloquer"; else echo "Débloquer";?>">
	</fieldset>
	</form>
	
	<?php
	if ($i == 6 || $i == 12 || $i == 18 || $i == 24 || $i == 30 || $i == 36 || $i == 42 || $i == 48 || $i == 64)
		echo "</div>";
	$i++;
}
$result->closeCursor();
$defaultvalue->closeCursor();
?>
<!-- End Loop to display each match with inputs to enter the score-->
 
   
   <!-- Loop to display all potential qualified teams and choose the ones that will win in the group stage -->
<h3><a href="#">Mise à jour des gagnants</a></h3>
<div>
<h2 class="h3-like">Huitièmes de finale</h2>
<?php
	$huitieme = array("Premier Groupe A", "Second Groupe B",  "Premier Groupe C", "Second Groupe D",
					 "Premier Groupe B", "Second Groupe A", "Premier Groupe D", "Second Groupe C",
					 "Premier Groupe E", "Second Groupe F",  "Premier Groupe G", "Second Groupe H",
					 "Premier Groupe F", "Second Groupe E", "Premier Groupe H", "Second Groupe G");
	for ($i = 1; $i <= 16; $i++)
	{
?>
<form id="update_huitieme<?php echo $i; ?>" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team<?php echo $i; ?>"><?php echo $huitieme[$i - 1];?></label>
<select id="update_huitieme_team<?php echo $i; ?>" name="update_huitieme_team<?php echo $i; ?>">
<option value="first"></option>
<?php
$winnershuitieme = $bdd->prepare('SELECT name FROM euro_team WHERE euro_team.group = ?');
$winnershuitieme->execute(array(substr($huitieme[$i - 1], -1)));
while ($winnershuitiemedata = $winnershuitieme->fetch())
{
	echo "<option value=\"" . $winnershuitiemedata['name'] . "\">" . $winnershuitiemedata['name'] . "</option>";
}
$winnershuitieme->closeCursor();
?>
</select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme<?php echo $i;?>" value="Envoyer" id="submit_huitieme<?php echo $i;?>">
</fieldset>
</form>
<?php } ?>


<h2 class="h3-like">Quarts de finale</h2>
<?php
	$quarter = array("Gagnant Huitième 1", "Gagnant Huitième 3", "Gagnant Huitième 2", "Gagnant Huitième 4", 
					 "Gagnant Huitième 5", "Gagnant Huitième 7", "Gagnant Huitième 6", "Gagnant Huitième 8");
	for ($i = 1; $i <= 8; $i++)
	{
?>
<form id="update_quarter<?php echo $i; ?>" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team<?php echo $i; ?>"><?php echo $quarter[$i - 1];?></label>
<select id="update_quarter_team<?php echo $i; ?>" name="update_quarter_team<?php echo $i; ?>">
<option value="first"></option>
<?php
$winnersquarter = $bdd->prepare('SELECT name FROM euro_team');
$winnersquarter->execute(array(substr($quarter[$i - 1], -1)));
while ($winnersquarterdata = $winnersquarter->fetch())
{
	echo "<option value=\"" . $winnersquarterdata['name'] . "\">" . $winnersquarterdata['name'] . "</option>";
}
$winnersquarter->closeCursor();
?>
</select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_quarter<?php echo $i;?>" value="Envoyer" id="submit_quarter<?php echo $i;?>">
</fieldset>
</form>
<?php } ?>


<h2 class="h3-like">Demi-finales</h2>
<?php
	$semi = array("Gagnant Quart 1","Gagnant Quart 3", "Gagnant Quart 2", "Gagnant Quart 4");
	for ($i = 1; $i <= 4; $i++)
	{
?>
<form id="update_semi<?php echo $i; ?>" method="POST" action="admin.php">
<fieldset>
<label for="update_semi_team<?php echo $i; ?>"><?php echo $semi[$i - 1];?></label>
<select id="update_semi_team<?php echo $i; ?>" name="update_semi_team<?php echo $i; ?>">
<option value="first"></option>
<?php
$winnerssemi = $bdd->query('SELECT name FROM euro_team');
while ($winnerssemidata = $winnerssemi->fetch())
{
	echo "<option value=\"" . $winnerssemidata['name'] . "\">" . $winnerssemidata['name'] . "</option>";
}
$winnerssemi->closeCursor();
?>
</select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_semi<?php echo $i;?>" value="Envoyer" id="submit_semi<?php echo $i;?>">
</fieldset>
</form>
<?php } ?>

<h2 class="h3-like">Petite Finale</h2>
<?php
	$petitefinal = array("Perdant Demi 1", "Perdant Demi 2");
	for ($i = 1; $i <= 2; $i++)
	{
?>
<form id="update_petitefinal<?php echo $i; ?>" method="POST" action="admin.php#update_petitefinal">
<fieldset>
<label for="update_petitefinal_team<?php echo $i; ?>"><?php echo $petitefinal[$i - 1];?></label>
<select id="update_petitefinal_team<?php echo $i; ?>" name="update_petitefinal_team<?php echo $i; ?>">
<option value="first"></option>
<?php
$winnerspetitefinal = $bdd->query('SELECT name FROM euro_team');
while ($winnerspetitefinaldata = $winnerspetitefinal->fetch())
{
	echo "<option value=\"" . $winnerspetitefinaldata['name'] . "\">" . $winnerspetitefinaldata['name'] . "</option>";
}
$winnerspetitefinal->closeCursor();
?>
</select>&nbsp;
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_petitefinal<?php echo $i;?>" value="Envoyer" id="submit_petitefinal<?php echo $i;?>">
</fieldset>
</form>
<?php } ?>

<h2 class="h3-like">Finale</h2>
<?php
	$final = array("Gagnant Demi 1", "Gagnant Demi 2");
	for ($i = 1; $i <= 2; $i++)
	{
?>
<form id="update_final<?php echo $i; ?>" method="POST" action="admin.php">
<fieldset>
<label for="update_final_team<?php echo $i; ?>"><?php echo $final[$i - 1];?></label>
<select id="update_final_team<?php echo $i; ?>" name="update_final_team<?php echo $i; ?>">
<option value="first"></option>
<?php
$winnersfinal = $bdd->query('SELECT name FROM euro_team');
while ($winnersfinaldata = $winnersfinal->fetch())
{
	echo "<option value=\"" . $winnersfinaldata['name'] . "\">" . $winnersfinaldata['name'] . "</option>";
}
$winnersfinal->closeCursor();
?>
</select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_final<?php echo $i;?>" value="Envoyer" id="submit_final<?php echo $i;?>">
</fieldset>
</form>
<?php } ?>
</div>
</div>

<!-- End Loop to display all potential qualified teams and choose the ones that will win in the group stage -->


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
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme1" value="Envoyer" id="submit_huitieme1">
</fieldset>
</form>
<form id="update_huitieme2" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team2">Second Groupe B</label>
<select id="update_huitieme_team2" name="update_huitieme_team2">
<option value="first"></option>
<option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme2" value="Envoyer" id="submit_huitieme2">
</fieldset>
</form>
<form id="update_huitieme3" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team3">Premier Groupe C</label>
<select id="update_huitieme_team3" name="update_huitieme_team3">
<option value="first"></option>
<option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme3" value="Envoyer" id="submit_huitieme3">
</fieldset>
</form>
<form id="update_huitieme4" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team4">Second Groupe D</label>
<select id="update_huitieme_team4" name="update_huitieme_team4">
<option value="first"></option>
<option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme4" value="Envoyer" id="submit_huitieme4">
</fieldset>
</form>
<form id="update_huitieme5" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team5">Premier Groupe B</label>
<select id="update_huitieme_team5" name="update_huitieme_team5">
<option value="first"></option>
<option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme5" value="Envoyer" id="submit_huitieme5">
</fieldset>
</form>
<form id="update_huitieme6" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team6">Second Groupe A</label>
<select id="update_huitieme_team6" name="update_huitieme_team6">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme6" value="Envoyer" id="submit_huitieme6">
</fieldset>
</form>
<form id="update_huitieme7" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team7">Premier Groupe D</label>
<select id="update_huitieme_team7" name="update_huitieme_team7">
<option value="first"></option>
<option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme7" value="Envoyer" id="submit_huitieme7">
</fieldset>
</form>
<form id="update_huitieme8" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team8">Second Groupe C</label>
<select id="update_huitieme_team8" name="update_huitieme_team8">
<option value="first"></option>
<option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme8" value="Envoyer" id="submit_huitieme8">
</fieldset>
</form>
<form id="update_huitieme9" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team9">Premier Groupe E</label>
<select id="update_huitieme_team9" name="update_huitieme_team9">
<option value="first"></option>
<option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme9" value="Envoyer" id="submit_huitieme9">
</fieldset>
</form>
<form id="update_huitieme10" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team10">Second Groupe F</label>
<select id="update_huitieme_team10" name="update_huitieme_team10">
<option value="first"></option>
<option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme10" value="Envoyer" id="submit_huitieme10">
</fieldset>
</form>
<form id="update_huitieme11" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team11">Premier Groupe G</label>
<select id="update_huitieme_team11" name="update_huitieme_team11">
<option value="first"></option>
<option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme11" value="Envoyer" id="submit_huitieme11">
</fieldset>
</form>
<form id="update_huitieme12" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team12">Second Groupe H</label>
<select id="update_huitieme_team12" name="update_huitieme_team12">
<option value="first"></option>
<option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme12" value="Envoyer" id="submit_huitieme12">
</fieldset>
</form>
<form id="update_huitieme13" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team13">Premier Groupe F</label>
<select id="update_huitieme_team13" name="update_huitieme_team13">
<option value="first"></option>
<option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme13" value="Envoyer" id="submit_huitieme13">
</fieldset>
</form>
<form id="update_huitieme14" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team14">Second Groupe E</label>
<select id="update_huitieme_team14" name="update_huitieme_team14">
<option value="first"></option>
<option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme14" value="Envoyer" id="submit_huitieme14">
</fieldset>
</form>
<form id="update_huitieme15" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team15">Premier Groupe H</label>
<select id="update_huitieme_team15" name="update_huitieme_team15">
<option value="first"></option>
<option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme15" value="Envoyer" id="submit_huitieme15">
</fieldset>
</form>
<form id="update_huitieme16" method="POST" action="admin.php">
<fieldset>
<label for="update_huitieme_team16">Second Groupe G</label>
<select id="update_huitieme_team16" name="update_huitieme_team16">
<option value="first"></option>
<option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme16" value="Envoyer" id="submit_huitieme16">
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
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_quarter1" value="Envoyer" id="submit_quarter1">
</fieldset>
</form>
<form id="update_quarter2" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team2">Gagnant Huitième 3</label>
<select id="update_quarter_team2" name="update_quarter_team2">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_quarter2" value="Envoyer" id="submit_quarter2">
</fieldset>
</form>
<form id="update_quarter3" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team3">Gagnant Huitième 2</label>
<select id="update_quarter_team3" name="update_quarter_team3">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_quarter3" value="Envoyer" id="submit_quarter3">
</fieldset>
</form>
<form id="update_quarter4" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team4">Gagnant Huitième 4</label>
<select id="update_quarter_team4" name="update_quarter_team4">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_quarter4" value="Envoyer" id="submit_quarter4">
</fieldset>
</form>
<form id="update_quarter5" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team5">Gagnant Huitième 5</label>
<select id="update_quarter_team5" name="update_quarter_team5">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_quarter5" value="Envoyer" id="submit_quarter5">
</fieldset>
</form>
<form id="update_quarter6" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team6">Gagnant Huitième 7</label>
<select id="update_quarter_team6" name="update_quarter_team6">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_quarter6" value="Envoyer" id="submit_quarter6">
</fieldset>
</form>
<form id="update_quarter7" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team7">Gagnant Huitième 6</label>
<select id="update_quarter_team7" name="update_quarter_team7">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_quarter7" value="Envoyer" id="submit_quarter7">
</fieldset>
</form>
<form id="update_quarter8" method="POST" action="admin.php">
<fieldset>
<label for="update_quarter_team8">Gagnant Huitième 8</label>
<select id="update_quarter_team8" name="update_quarter_team8">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_quarter8" value="Envoyer" id="submit_quarter8">
</fieldset>
</form>


<h2 class="h3-like">Demi-finales</h2>
<form id="update_semi1" method="POST" action="admin.php">
<fieldset>
<label for="update_semi_team1">Gagnant Quart 1</label>
<select id="update_semi_team1" name="update_semi_team1">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_semi1" value="Envoyer" id="submit_semi1">
</fieldset>
</form>
<form id="update_semi2" method="POST" action="admin.php">
<fieldset>
<label for="update_semi_team2">Gagnant Quart 3</label>
<select id="update_semi_team2" name="update_semi_team2">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_semi2" value="Envoyer" id="submit_semi2">
</fieldset>
</form>
<form id="update_semi3" method="POST" action="admin.php">
<fieldset>
<label for="update_semi_team3">Gagnant Quart 2</label>
<select id="update_semi_team3" name="update_semi_team3">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_semi3" value="Envoyer" id="submit_semi3">
</fieldset>
</form>
<form id="update_semi4" method="POST" action="admin.php">
<fieldset>
<label for="update_semi_team4">Gagnant Quart 4</label>
<select id="update_semi_team4" name="update_semi_team4">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_semi4" value="Envoyer" id="submit_semi4">
</fieldset>
</form>

<h2 class="h3-like">Finale</h2>
<form id="update_final1" method="POST" action="admin.php">
<fieldset>
<label for="update_final_team1">Gagnant Demi 1</label>
<select id="update_final_team1" name="update_final_team1">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_final1" value="Envoyer" id="submit_final1">
</fieldset>
</form>
<form id="update_final2" method="POST" action="admin.php">
<fieldset>
<label for="update_final_team2">Gagnant Demi 2</label>
<select id="update_final_team2" name="update_final_team2">
<option value="first"></option>
<option value="Brésil">Brésil</option><option value="Croatie">Croatie</option><option value="Cameroun">Cameroun</option><option value="Mexique">Mexique</option><option value="Espagne">Espagne</option><option value="Pays-Bas">Pays-Bas</option><option value="Chili">Chili</option><option value="Australie">Australie</option><option value="Colombie">Colombie</option><option value="Grèce">Grèce</option><option value="C. Ivoire">C. Ivoire</option><option value="Japon">Japon</option><option value="Uruguay">Uruguay</option><option value="C. Rica">C. Rica</option><option value="Angleterre">Angleterre</option><option value="Italie">Italie</option><option value="Suisse">Suisse</option><option value="Equateur">Equateur</option><option value="France">France</option><option value="Honduras">Honduras</option><option value="Argentine">Argentine</option><option value="Bosnie">Bosnie</option><option value="Iran">Iran</option><option value="Nigeria">Nigeria</option><option value="Allemagne">Allemagne</option><option value="Portugal">Portugal</option><option value="Ghana">Ghana</option><option value="Etats-Unis">Etats-Unis</option><option value="Belgique">Belgique</option><option value="Algérie">Algérie</option><option value="Russie">Russie</option><option value="Corée">Corée</option></select>
<input type="submit" class="admin_updates_edit btn-rouge" name="submit_final2" value="Envoyer" id="submit_final2">
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
value="alex"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_alex" 
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
value="aurelien"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_aurelien" 
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
value="Beary"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Beary" 
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
value="Bruno"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Bruno" 
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
value="Catherine"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Catherine" 
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
value="cedric"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_cedric" 
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
value="clementv"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_clementv" 
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
value="Djipi"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Djipi" 
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
value="domi"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_domi" 
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
value="emanuele"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_emanuele" 
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
value="Franckinho"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Franckinho" 
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
value="fufu"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_fufu" 
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
value="Grissouris"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Grissouris" 
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
value="guigui"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_guigui" 
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
value="ionesco"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_ionesco" 
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
value="Joel"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Joel" 
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
value="Joffrey"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Joffrey" 
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
value="Jp"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Jp" 
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
value="jscslover"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_jscslover" 
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
value="karolina"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_karolina" 
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
value="laeti"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_laeti" 
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
value="Lanka"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Lanka" 
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
value="Laurene"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Laurene" 
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
value="Madikera"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Madikera" 
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
value="Marco"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Marco" 
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
value="maximev"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_maximev" 
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
value="Mohamed"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Mohamed" 
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
value="norbert"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_norbert" 
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
value="paul"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_paul" 
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
value="Philippe"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Philippe" 
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
value="Romain"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Romain" 
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
value="Samantha"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Samantha" 
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
value="svincent"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_svincent" 
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
value="Syndie"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Syndie" 
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
value="Thang"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Thang" 
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
value="Tristan"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_Tristan" 
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
value="xiaoyi"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_xiaoyi" 
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
<?php } }?>
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

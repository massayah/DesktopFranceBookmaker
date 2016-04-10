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
<link rel="stylesheet" href="CSS/jquery-ui.css" media="all" />
<link rel="stylesheet" href="CSS/style.css" />
<link rel="stylesheet" href="CSS/theme.css" media="all" />

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
    
    <script>
	$(function() {
		$( ".accordion" ).accordion({
				collapsible: true,
				active: false,
				autoHeight: false,
		 });
	});
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





 <div id="update">
<h1>Mise à jour des Matchs</h1>
<!-- Loop to display each match with inputs to enter the score -->
<div id="update_matches" class="accordion">
<?php

$result = $bdd->query('SELECT * FROM euro_schedule es ORDER BY ISNULL(es.group), es.group, es.id');
$defaultvalue = $bdd->query('SELECT team1result, team2result, team1penalty, team2penalty, et1.name as teamname1, et2.name as teamname2, 
es.group, tempname1, tempname2 
FROM euro_schedule es LEFT OUTER JOIN euro_team et1 ON et1.id = es.team1 LEFT OUTER JOIN euro_team et2 ON et2.id = es.team2 
ORDER BY ISNULL(es.group), es.group, es.id');
$i = 1;
while ($data = $result->fetch())
{
$defaultvaluedata = $defaultvalue->fetch();
$team1 = $defaultvaluedata['teamname1'] != NULL ? $defaultvaluedata['teamname1'] : $defaultvaluedata['tempname1'];
$team2 = $defaultvaluedata['teamname2'] != NULL ? $defaultvaluedata['teamname2'] : $defaultvaluedata['tempname2'];
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
		echo "<h2 class=\"h3-like\"><a href=\"#\">Scores à partir des huitièmes</a></h2><div>";
	if ($defaultvaluedata['team1result'] != NULL && $defaultvaluedata['team2result'] != NULL)
		$disable = true;
	if (isset($_POST['reset_match' . $i]) || $defaultvaluedata['team1result'] == NULL || $defaultvaluedata['team2result'] == NULL)
		$disable = false;
	?>
	<hr>
	<form id="match<?php echo $data['id'];?>_team1" method="POST" action="admin.php">
	<fieldset>
	<label for="score_match<?php echo $data['id'];?>_team1"><?php echo $team1; ?></label>
	<input type="number" id="score_match<?php echo $data['id'];?>_team1" name="score_match<?php echo $data['id']; ?>_team1" <?php if ($defaultvaluedata['team1result'] != NULL) {
	echo "value=\"" . $defaultvaluedata['team1result'] . "\""; }?> <?php if ($disable) echo "disabled=\"disabled\"";?>> - 
	<input type="number" id="score_match<?php echo $data['id'];?>_team2" name="score_match<?php echo $data['id']; ?>_team2" <?php if ($defaultvaluedata['team2result'] != NULL) {
	echo "value=\"" . $defaultvaluedata['team2result'] . "\""; }?> <?php if ($disable) echo "disabled=\"disabled\""; ?>>
	<label for="score_match<?php echo $data['id'];?>_team2"><?php echo $team2; ?></label>
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
	if ($i == 6 || $i == 12 || $i == 18 || $i == 24 || $i == 30 || $i == 36 || $i == 51)
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
  $huitieme = $bdd->query('SELECT tempname1, tempname2, id FROM euro_schedule WHERE id BETWEEN 37 AND 44');
 
  while($huitiemedata = $huitieme->fetch())
  {
  ?>
      <form id="update_huitieme<?php echo $huitiemedata['id'] . 1; ?>" method="POST" action="admin.php">
      <fieldset>
      <label for="update_huitieme_team<?php echo $huitiemedata['id'] . 1; ?>"><?php echo $huitiemedata['tempname1'];?></label>
      <select id="update_huitieme_team<?php echo $huitiemedata['id'] . 1; ?>" name="update_huitieme_team<?php echo $huitiemedata['id'] . 1; ?>">
      <option value="first"></option>
      <?php
	$winnershuitieme = $bdd->query('SELECT name FROM euro_team');
	while ($winnershuitiemedata = $winnershuitieme->fetch())
	{
	  echo "<option value=\"" . $winnershuitiemedata['name'] . "\">" . $winnershuitiemedata['name'] . "</option>";
	}
      $winnershuitieme->closeCursor();
      ?>
      </select>
      <input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme<?php echo $huitiemedata['id'] . 1;?>" value="Envoyer" id="submit_huitieme<?php echo $huitiemedata['id'] . 1;?>">
      </fieldset>
      </form>
      
      <form id="update_huitieme<?php echo $huitiemedata['id'] . 2; ?>" method="POST" action="admin.php">
      <fieldset>
      <label for="update_huitieme_team<?php echo $huitiemedata['id'] . 2; ?>"><?php echo $huitiemedata['tempname2'];?></label>
      <select id="update_huitieme_team<?php echo $huitiemedata['id'] . 2; ?>" name="update_huitieme_team<?php echo $huitiemedata['id'] . 2; ?>">
      <option value="first"></option>
      <?php
	$winnershuitieme2 = $bdd->query('SELECT name FROM euro_team');
	while ($winnershuitiemedata = $winnershuitieme2->fetch())
	{
	  echo "<option value=\"" . $winnershuitiemedata['name'] . "\">" . $winnershuitiemedata['name'] . "</option>";
	}
      $winnershuitieme2->closeCursor();
      ?>
      </select>
      <input type="submit" class="admin_updates_edit btn-rouge" name="submit_huitieme<?php echo $huitiemedata['id'] . 2;?>" value="Envoyer" id="submit_huitieme<?php echo $huitiemedata['id'] . 2;?>">
      </fieldset>
      </form>
 <?php } ?>


<h2 class="h3-like">Quarts de finale</h2>
<?php
  $quart = $bdd->query('SELECT tempname1, tempname2, id FROM euro_schedule WHERE id BETWEEN 45 AND 48');
 
  while($quartdata = $quart->fetch())
  {
  ?>
      <form id="update_quart<?php echo $quartdata['id'] . 1; ?>" method="POST" action="admin.php">
      <fieldset>
      <label for="update_quart_team<?php echo $quartdata['id'] . 1; ?>"><?php echo $quartdata['tempname1'];?></label>
      <select id="update_quart_team<?php echo $quartdata['id'] . 1; ?>" name="update_quart_team<?php echo $quartdata['id'] . 1; ?>">
      <option value="first"></option>
      <?php
	$winnersquart = $bdd->query('SELECT name FROM euro_team');
	while ($winnersquartdata = $winnersquart->fetch())
	{
	  echo "<option value=\"" . $winnersquartdata['name'] . "\">" . $winnersquartdata['name'] . "</option>";
	}
      $winnersquart->closeCursor();
      ?>
      </select>
      <input type="submit" class="admin_updates_edit btn-rouge" name="submit_quart<?php echo $quartdata['id'] . 1;?>" value="Envoyer" id="submit_quart<?php echo $quartdata['id'] . 1;?>">
      </fieldset>
      </form>
      
      <form id="update_quart<?php echo $quartdata['id'] . 2; ?>" method="POST" action="admin.php">
      <fieldset>
      <label for="update_quart_team<?php echo $quartdata['id'] . 2; ?>"><?php echo $quartdata['tempname2'];?></label>
      <select id="update_quart_team<?php echo $quartdata['id'] . 2; ?>" name="update_quart_team<?php echo $quartdata['id'] . 2; ?>">
      <option value="first"></option>
      <?php
	$winnersquart2 = $bdd->query('SELECT name FROM euro_team');
	while ($winnersquartdata = $winnersquart2->fetch())
	{
	  echo "<option value=\"" . $winnersquartdata['name'] . "\">" . $winnersquartdata['name'] . "</option>";
	}
      $winnersquart2->closeCursor();
      ?>
      </select>
      <input type="submit" class="admin_updates_edit btn-rouge" name="submit_quart<?php echo $quartdata['id'] . 2;?>" value="Envoyer" id="submit_quart<?php echo $quartdata['id'] . 2;?>">
      </fieldset>
      </form>
 <?php } ?>


<h2 class="h3-like">Demi-finales</h2>
<?php
  $demi = $bdd->query('SELECT tempname1, tempname2, id FROM euro_schedule WHERE id BETWEEN 49 AND 50');
 
  while($demidata = $demi->fetch())
  {
  ?>
      <form id="update_demi<?php echo $demidata['id'] . 1; ?>" method="POST" action="admin.php">
      <fieldset>
      <label for="update_demi_team<?php echo $demidata['id'] . 1; ?>"><?php echo $demidata['tempname1'];?></label>
      <select id="update_demi_team<?php echo $demidata['id'] . 1; ?>" name="update_demi_team<?php echo $demidata['id'] . 1; ?>">
      <option value="first"></option>
      <?php
	$winnersdemi = $bdd->query('SELECT name FROM euro_team');
	while ($winnersdemidata = $winnersdemi->fetch())
	{
	  echo "<option value=\"" . $winnersdemidata['name'] . "\">" . $winnersdemidata['name'] . "</option>";
	}
      $winnersdemi->closeCursor();
      ?>
      </select>
      <input type="submit" class="admin_updates_edit btn-rouge" name="submit_demi<?php echo $demidata['id'] . 1;?>" value="Envoyer" id="submit_demi<?php echo $demidata['id'] . 1;?>">
      </fieldset>
      </form>
      
      <form id="update_demi<?php echo $demidata['id'] . 2; ?>" method="POST" action="admin.php">
      <fieldset>
      <label for="update_demi_team<?php echo $demidata['id'] . 2; ?>"><?php echo $demidata['tempname2'];?></label>
      <select id="update_demi_team<?php echo $demidata['id'] . 2; ?>" name="update_demi_team<?php echo $demidata['id'] . 2; ?>">
      <option value="first"></option>
      <?php
	$winnersdemi2 = $bdd->query('SELECT name FROM euro_team');
	while ($winnersdemidata = $winnersdemi2->fetch())
	{
	  echo "<option value=\"" . $winnersdemidata['name'] . "\">" . $winnersdemidata['name'] . "</option>";
	}
      $winnersdemi2->closeCursor();
      ?>
      </select>
      <input type="submit" class="admin_updates_edit btn-rouge" name="submit_demi<?php echo $demidata['id'] . 2;?>" value="Envoyer" id="submit_demi<?php echo $demidata['id'] . 2;?>">
      </fieldset>
      </form>
 <?php } ?>


<h2 class="h3-like">Finale</h2>
<?php
  $finale = $bdd->query('SELECT tempname1, tempname2, id FROM euro_schedule WHERE id = 51');
 
  while($finaledata = $finale->fetch())
  {
  ?>
      <form id="update_finale<?php echo $finaledata['id'] . 1; ?>" method="POST" action="admin.php">
      <fieldset>
      <label for="update_finale_team<?php echo $finaledata['id'] . 1; ?>"><?php echo $finaledata['tempname1'];?></label>
      <select id="update_finale_team<?php echo $finaledata['id'] . 1; ?>" name="update_finale_team<?php echo $finaledata['id'] . 1; ?>">
      <option value="first"></option>
      <?php
	$winnersfinale = $bdd->query('SELECT name FROM euro_team');
	while ($winnersfinaledata = $winnersfinale->fetch())
	{
	  echo "<option value=\"" . $winnersfinaledata['name'] . "\">" . $winnersfinaledata['name'] . "</option>";
	}
      $winnersfinale->closeCursor();
      ?>
      </select>
      <input type="submit" class="admin_updates_edit btn-rouge" name="submit_finale<?php echo $finaledata['id'] . 1;?>" value="Envoyer" id="submit_finale<?php echo $finaledata['id'] . 1;?>">
      </fieldset>
      </form>
      
      <form id="update_finale<?php echo $finaledata['id'] . 2; ?>" method="POST" action="admin.php">
      <fieldset>
      <label for="update_finale_team<?php echo $finaledata['id'] . 2; ?>"><?php echo $finaledata['tempname2'];?></label>
      <select id="update_finale_team<?php echo $finaledata['id'] . 2; ?>" name="update_finale_team<?php echo $finaledata['id'] . 2; ?>">
      <option value="first"></option>
      <?php
	$winnersfinale2 = $bdd->query('SELECT name FROM euro_team');
	while ($winnersfinaledata = $winnersfinale2->fetch())
	{
	  echo "<option value=\"" . $winnersfinaledata['name'] . "\">" . $winnersfinaledata['name'] . "</option>";
	}
      $winnersfinale2->closeCursor();
      ?>
      </select>
      <input type="submit" class="admin_updates_edit btn-rouge" name="submit_finale<?php echo $finaledata['id'] . 2;?>" value="Envoyer" id="submit_finale<?php echo $finaledata['id'] . 2;?>">
      </fieldset>
      </form>
 <?php } ?>

</div>
</div>

<!-- End Loop to display all potential qualified teams and choose the ones that will win in the group stage -->

<p class="up"><a href="#container">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" width="60" height="60">
  <circle cx="30" cy="30" r="25" class="circle" />
  <polyline points="20,35 30,25 40,35" class="arrow" />
  </svg></a></p>

<!-- Loop to display all users in a table and be able to delete them -->
<div id="search_user"><label for="search_users">Recherche Utilisateur&nbsp;: </label><input id="search_users" ></div>
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
<?php
$users = $bdd->query('SELECT euro_user.username, points, team1, team2, team3, team4 FROM euro_user LEFT OUTER JOIN euro_top ON euro_user.username = euro_top.username WHERE euro_user.isadmin = 0');
$i = 1;
while ($userdata = $users->fetch())
{
?>
<tr>
<td class="first"><?php echo $userdata['username'] ?></td>
<td><?php echo $userdata['points']; ?></td>
<td><?php echo $userdata['team1'] . " - " . $userdata['team2'] . " - " . $userdata['team3'] . " - " . $userdata['team4']; ?></td>
<td><form id="delete_user<?php echo $i;?>" method="POST" action="admin.php">
<input type="hidden" id="delete_<?php echo $userdata['username'];?>" name="delete_<?php echo $userdata['username'];?>" 
value="<?php echo $userdata['username'] ?>"> <input type="submit" class="submit btn-rouge" id="submit_delete_user_<?php echo $userdata['username']; ?>" 
name="submit_delete_user_<?php echo $userdata['username'];?>" value="Supprimer" onclick="if(!confirm('Voulez-vous vraiment supprimer cet utilisateur ' + $(this).prev().val() + ' ?')) return false;">
</form>
</td>
</tr>
<?php
$i++;
}
$users->closeCursor();
?>
</tbody>
</table>

<!-- End Loop to display all users in a table and be able to delete them -->

<p class="up"><a href="#container">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" width="60" height="60">
  <circle cx="30" cy="30" r="25" class="circle" />
  <polyline points="20,35 30,25 40,35" class="arrow" />
  </svg></a></p>
  
   </div><!--end tab-4 -->
   

</div><!--end center-->
</div><!--end content-->
<?php } }?>
<?php include("footer.php"); ?>
</div><!--end#container-->

</body>
</html>

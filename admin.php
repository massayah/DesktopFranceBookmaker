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
 <div id="update">
<h1>Mise à jour des Matchs</h1>
<!-- Loop to display each match with inputs to enter the score -->
<div id="update_matches" class="accordion">
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

<p class="up"><a class="icon-up" href="#container">&nbsp;Haut de page</a></p>

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

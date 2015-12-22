<?php include('PHP/login.php'); ?>
<!doctype html>
<!--[if lte IE 6]> <html class="no-js ie6 ie67 ie678" lang="fr"> <![endif]-->
<!--[if lte IE 7]> <html class="no-js ie7 ie67 ie678" lang="fr"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 ie678" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
<title>Euro BookMaker - Classement</title>
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=10">
<meta name="viewport" content="initial-scale=1.0">

<link href='http://fonts.googleapis.com/css?family=Exo+2:400,600' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="CSS/knacss-unminified.css" />
<link rel="stylesheet" href="CSS/style.css" />

	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
<link rel="shortcut icon" href="favicon.ico" />
<link rel="Bookmark" href="favicon.ico" />

<script src="javascript/jquery-1.9.1.min.js"></script>
    <script src="javascript/jquery.easing.1.3.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#login p').click(function() {
                $('#login-form').slideToggle(300);
                $(this).toggleClass('close');
            });
        }); // end ready
    </script>

<script src="javascript/jquery-1.7.1.min.js"></script>
<script src="javascript/jquery-ui-1.8.18.custom.min.js"></script>
<script src="javascript/search.js"></script>

<script>
$(document).ready(function() {
	var username = "<?php echo $_SESSION['username']; ?>";
	var rank = $('#' + username).next().html();
	var top = $('#' + username).next().next().html();
	var points = $('#' + username).next().next().next().html();
	$('#my_rank').append('<tr><th class="first txtcenter">Place</th><td>' + rank + '</td></tr><tr><th class="first txtcenter">Top 4</th><td>' + top + '</td></tr><tr><th class="first txtcenter">Points</th><td>' + points + '</td></tr>');
});
</script>

</head>

<body id="page_ranking">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<div id="content">
<div class="mw1140p center mtl">
<!-- Message displayed if the user is not logged in -->
<?php
if (!isset($_SESSION['username']))
{
	echo "<div id=\"logged_error_message\">Vous n'êtes pas connecté : pour accéder à cette page,vous devez vous connecter avec votre nom d'utilisateur et votre mot de passe, ou <a href=\"register.php\">vous enregistrer comme nouveau membre</a>.</div>";
?>
	<script>
	setTimeout("window.location='index.php'",3000);
	</script>
<!-- End Message displayed if the user is not logged in -->
<?php
}
else
{

?>
<div class="center">
<!-- Display the rank only if the user is logged in and not an admin -->
<?php
if (isset($_SESSION['username']))
{
	$isadmin = $bdd->prepare('SELECT isadmin FROM euro_user WHERE username = ?');
	$isadmin->execute(array($_SESSION['username']));
	$isadmindata = $isadmin->fetch();
	if ($isadmindata['isadmin'] == 0)
	{
?>
<h1 class="h2-like">Vérifiez votre classement</h1>
<p>Les points sont générés automatiquement. Si vous constatez des anomalies, <a href="contact.php">merci de nous contacter</a>.</p>
<h2><?php echo $_SESSION['username']; ?></h2>
<table id="my_rank" class="mtl">
</table>
<?php 
	}
}
?>
<!-- End Display the rank only if the user is logged in and not an admin -->

<div id="search_user"><label for="ranking_users">Rechercher un parieur&nbsp;:&nbsp;</label><input id="ranking_users" /></div>

<!-- Display a ranking of all users based on the points they obtained when they got a bet right, there is also the display of the top 4 of all users -->
<h2 class="mtl">Utilisateurs</h2>
<table id="rank_users" class="mtl">
<thead>
<tr>
<th class="first">Place</th>
<th class="user">Parieur</th>
<th class="rank-top">Top 4</th>
<th>Points</th>
</tr>
</thead>
<tbody>

<?php
$usergroup = $bdd->prepare('SELECT team FROM euro_user WHERE username = ?');
$usergroup->execute(array($_SESSION['username']));
$usergroupdata = $usergroup->fetch();
if ($usergroupdata['team'] == "0")
	$users = $bdd->query('SELECT euro_user.username, points, team1, team2, team3, team4 FROM rugby_user LEFT OUTER JOIN euro_top ON euro_user.username = euro_top.username WHERE euro_user.isadmin = 0 ORDER BY points DESC');
else
{
	$teamuser = $usergroupdata['team'];
	$users = $bdd->prepare('SELECT euro_user.username, points, team1, team2, team3, team4 FROM euro_user LEFT OUTER JOIN euro_top ON euro_user.username = euro_top.username WHERE euro_user.isadmin = 0 AND euro_user.team = ? ORDER BY points DESC');
	if ($teamuser == "2")
		$users->execute(array(2));
	else
		$users->execute(array(1));
}
$i = 1;
$prevpoints = -1;
$prevrank = 1;
while ($userdata = $users->fetch())
{
if ($prevpoints != $userdata['points'])
	$prevrank = $i;
?>
<tr>
<td class="rank"><?php if ($prevpoints == $userdata['points']) {echo $prevrank; if ($prevrank == 1) echo "er"; else echo "ème";} else {echo $i; if ($i == 1) echo "er";else echo "ème";} ?></td>
<td class="user" id="<?php echo $userdata['username']; ?>"><?php echo $userdata['username']; ?></td>
<td class="rank-top"><?php echo $userdata['team1'] . " - " . $userdata['team2'] . " - " . $userdata['team3'] . " - " . $userdata['team4']; ?></td>
<td><?php echo $userdata['points']; ?> <span class="large-hidden"><?php if ($userdata['points'] == 1) echo "point"; else echo "points"; ?></span></td>
</tr>
<?php
$prevpoints = $userdata['points'];
$i++;
}
$users->closeCursor();
?>
</tbody>
</table>

<!-- End Display a ranking of all users based on the points they obtained when they got a bet right, there is also the display of the top 4 of all users -->

<p class="up"><a class="icon-up" href="#container">&nbsp;Haut de page</a></p>
</div><!--end center-->
</div><!--end content-->
<?php } ?>
<?php include("footer.php"); ?>
</div><!--end#container-->
</body>
</html>
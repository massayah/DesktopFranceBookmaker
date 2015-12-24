<?php include('PHP/login.php'); ?>
<?php include("head.php"); ?>
<body id="page_bet1">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<?php include("PHP/bet_functions.php"); ?>
<script src="javascript/jquery.min.js"></script>
<script src="javascript/jquery-1.4.3.min.js"></script>
<script src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script src="javascript/teams.js"></script>

<div id="content">
<div class="mw1140p center">
<!-- Message displayed if the user is not logged in -->
<?php
if (!isset($_SESSION['username']))
{
	echo "<div id=\"logged_error_message\">Vous n'êtes pas connecté : pour accéder à cette page,vous devez vous connecter avec votre nom d'utilisateur et votre mot de passe, ou vous enregistrer comme nouveau membre.</div>";
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

<h1 class="ptl">Pariez sur les Matchs de Poule.</h1>
<div id="search_team" class="mtl mbl"><label for="info_team">Rechercher une équipe&nbsp;:&nbsp;</label><input id="info_team" /></div>

<div class="panel mbl">
<h2>Accès direct</h2>

<div class="grid-3-small-1-tiny-1">
<div>
<p class="plm">1ers Matchs</p>
<p><a href="#juin10">Vendredi 10 juin</a> <a href="#juin11">Samedi 11 juin</a> <a href="#juin12">Dimanche 12 juin</a> <a href="#juin13">Lundi 13 juin</a> <a href="#juin14">Mardi 14 juin</a></p>
</div>
<div>
<p class="plm">2èmes Matchs</p>
<p> <a href="#juin15">Mercredi 15 juin</a> <a href="#juin16">Jeudi 16 juin</a> <a href="#juin17">Vendredi 17 juin</a> <a href="#juin18">Samedi 18 juin</a></p>
</div>
<div>
<p class="plm">3èmes Matchs</p>
<p> <a href="#juin19">Dimanche 19 juin</a> <a href="#juin20">Lundi 20 juin</a> <a href="#juin21">Mardi 21 juin</a> <a href="#juin22">Mercredi 22 juin</a></p>
</div>

</div><!--end grid-3-->
</div><!--end Panel-->

<div class="panel mbl">
<h2>Les paris du jour</h2>
<a href="#bet02">France/Roumanie - 13h</a>
</div><!--end Panel-->


<!-- Loop to display all matches in chronological order with a select element to select the potential winning team -->
<div class="grid-2-small-1-tiny-1">
<?php
$bets = $bdd->prepare('SELECT t1.name AS tn1, t2.name AS tn2, t1.flag AS tf1, t2.flag as tf2, es.id as sid, team1result, team2result, es.group, available, 
MONTHNAME(date) as month, DAY(date) as day, HOUR(date) as hour, MINUTE(date) as minute, win, available, t1.previous as previous1, t2.previous as previous2, 
t1.smallname AS smallname1, t2.smallname AS smallname2 
FROM euro_schedule es  LEFT OUTER JOIN euro_bet eb ON es.id = eb.match_id AND username = ? JOIN euro_team t1 ON team1 = t1.id 
JOIN euro_team t2 ON t2.id = team2  WHERE es.group IS NOT NULL ORDER BY date');
$bets->execute(array($_SESSION['username']));
while ($betsdata = $bets->fetch())
{
$team1 = $betsdata['tn1'];
$team2 = $betsdata['tn2'];
$teamresult1 = $betsdata['team1result'];
$teamresult2 = $betsdata['team2result'];
$id = $betsdata['sid'];
$hasplayed = $teamresult1 != NULL && $teamresult2 != NULL;
?>




<div class="bet-match-poule ptl pbl">
<p class="h4-like pam"><span class="couleur"><?php echo $betsdata['day']; if ($betsdata['month'] == "June") echo " Juin"; else if ($betsdata['day'] == "1" 
&& $betsdata['month'] == "July") echo "er Juillet"; else echo " Juillet";
	?></span> - <?php echo $betsdata['hour'] . ":";
	if ($betsdata['minute'] < 10)
		echo "0";
	echo $betsdata['minute']; ?> - <span class="couleur">Groupe <?php echo $betsdata['group'];?></span></p>
<div class="panel txtcenter">
<p class="ptl pbl"><img src="<?php echo $betsdata['tf1'];?>" alt="<?php echo $team1; ?>" width="50" height="50"> 
<span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs"><strong><?php echo $team1; ?></strong></span>
<span class="h4-like large-hidden mls mrs"><strong>ANG</strong></span> vs <span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs"><strong><?php echo $team2; ?></strong></span>
<span class="h4-like large-hidden mls mrs"><strong>ESP</strong></span> <img src="<?php echo $betsdata['tf2'];?>" alt="<?php echo $team2; ?>" width="50" height="50">
</p>
<p class="txtcenter h5-like mtn"><strong>
<?php
if ($hasplayed)
	echo $betsdata['team1result'] . " - " . $betsdata['team2result'];
else
	echo "non joué";
?>
</strong></p>
<?php
setLightbox($team1, $betsdata['previous1'], $betsdata['smallname1']);
setLightbox($team2, $betsdata['previous2'], $betsdata['smallname2']);
?>

		<!-- End Setting the lightbox for each team available if we click on the name of the team -->
 

<!-- Setting the lightbox for each team available if we click on the name of the team -->
<!--
 <a href="#lb_espagne" id="lightbox_espagne">Infos Roumanie</a>
		<div style="display: none;">
		<div id="lb_espagne" class="lbstyle">
		<h2 class="h3-like">Espagne</h2>
			<p><strong>Palmarès Euro 2012 : </strong><br>
			non qualifié</p>
			<h3>Matchs de Poule</h3>
			<ul class="unstyled pln">
			<li><strong>1er</strong> vs France&nbsp;:&nbsp;perdu 3 - 0</li>
			<li><strong>2ème</strong> vs Belgique&nbsp;:&nbsp;non joué</li>
			<li><strong>3ème</strong> vs Ukraine&nbsp;:&nbsp;non joué</li>
			</ul>
			<h3>Points Groupe A</h3>
			<ul class="unstyled pln">
			<li>France&nbsp;:&nbsp;<strong>3</strong></li>
			<li>Ukraine&nbsp;:&nbsp;<strong>1</strong></li>
			<li>Belgique&nbsp;:&nbsp;<strong>1</strong></li>
			<li>Malte&nbsp;:&nbsp;<strong>0</strong></li>
			</ul>
			<h3>Phase finale</h3>
			<ul class="unstyled pln">
			<li><strong>8èmes</strong>&nbsp;:&nbsp;non joué</li>
			<li><strong>quarts</strong>&nbsp;:&nbsp;non joué</li>
			<li><strong>demies</strong>&nbsp;:&nbsp;non joué</li>
			<li><strong>finale</strong>&nbsp;:&nbsp;non joué</li>
			</ul>
		</div>
		</div>
		-->
		<!-- End Setting the lightbox for each team available if we click on the name of the team -->

<div class="grid-2-small-1-tiny-1 ptl">
<div>
<form id="bet<?php echo $id; ?>" action="bet1.php#bet<?php echo $id; ?>" method="POST" class="border-bet-form">
<ul class="unstyled pln bet-choix txtleft">
			<li><label for="<?php echo $team1; ?>"><input type="radio" value="<?php echo $team1; ?>" name="select_bet<?php echo $id; ?>">&nbsp;<?php echo $team1; ?></label></li>
			<li><label for="<?php echo $team2; ?>"><input type="radio" value="<?php echo $team2; ?>" name="select_bet<?php echo $id; ?>">&nbsp;<?php echo $team2; ?></label></li>
			<li><label for="Nul"><input type="radio" name="select_bet1" value="Nul">&nbsp;Nul</label></li>
			<?php
				if ($betsdata['available'] == "1") {
			?>
			<li class="mtm"><input type="submit" class="btn-rouge mts mbs" name="save_bet<?php echo $id; ?>" id="save_bet<?php echo $id; ?>" value="Valider"></li>
			<?php } else { ?>
			<li class="pam"><strong>Paris fermés</strong></li>
			<?php } ?>
</ul></form>
</div>
<div class="pam">
<p class="big pbn">Votre choix</p>
<p class="couleur mtn"><?php 
if ($betsdata['win'] != "")
      echo $betsdata['win'];
    else
      echo "Non Parié";
?></p>
<p class="mtm big pbn">Résultat</p>
<?php
if ($teamresult1 != NULL && $teamresult2 != NULL)
{
	if ($teamresult1 > $teamresult2)
		$winningteam = $team1;
	else if ($teamresult2 > $teamresult1)
		$winningteam= $team2;
	else
	{
		if ($teamresult1 == $teamresult2 && $betsdata['group'] == null)
		{
			if ($betsdata['team1penalty'] > $betsdata['team2penalty'])
				$winningteam = $team1;
			else
				$winningteam = $team2;
				
		}
		else
			$winningteam = "Nul";
	}
	if ($winningteam == $betsdata['win'])
		echo "<p class=\"couleur mtn\">Gagné</p>";
	else
		echo "<p class=\"couleur mtn\">Perdu</p>";
}
else
{
	echo "<p class=\"couleur mtn\">Match non joué</p>";
}
?>
</div>
</div><!--end grid-2-->
</div><!--end panel-->
</div><!--end poule ang esp-->
<?php
}
?>
</div><!--end grid-2-->


<p class="up"><a class="icon-up" href="#container">&nbsp;Haut de page</a></p>
</div><!--end center-->
</div><!--end content-->
<?php } ?>
<?php include("footer.php"); ?>
</div><!--end#container-->
</body>
</html>

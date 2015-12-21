<?php include('PHP/login.php'); ?>
<?php include("head.php"); ?>
<body id="page_bet1">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<?php include("PHP/bet_functions.php"); ?>

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
$bets = $bdd->prepare('SELECT t1.name AS tn1, t2.name AS tn2, t1.flag AS tf1, t2.flag as tf2, es.id, team1result, team2result, es.group, available, 
MONTHNAME(date) as month, DAY(date) as day, HOUR(date) as hour, MINUTE(date) as minute 
FROM euro_schedule es  LEFT OUTER JOIN euro_bet eb ON es.id = eb.match_id AND username = ? JOIN euro_team t1 ON team1 = t1.id 
JOIN euro_team t2 ON t2.id = team2  WHERE es.group IS NOT NULL ORDER BY date');
$bets->execute(array($_SESSION['username']));
while ($betsdata = $bets->fetch())
{
$team1 = $betsdata['tn1'];
$team2 = $betsdata['tn2'];
?>




<div id="poule-ang-esp">
<p class="h4-like pam"><span class="couleur"><?php echo $betsdata['day']; if ($betsdata['month'] == "June") echo " Juin"; else if ($betsdata['day'] == "1" 
&& $betsdata['month'] == "July") echo "er Juillet"; else echo " Juillet";
	?></span> - <?php echo $betsdata['hour'] . ":";
	if ($betsdata['minute'] < 10)
		echo "0";
	echo $betsdata['minute']; ?> - <span class="couleur">Groupe <?php echo $betsdata['group'];?></span></p>
<div class="panel txtcenter">
<p class="mbs"><img src="<?php echo $betsdata['tf1'];?>" alt="<?php echo $team1; ?>" width="50" height="50"> 
<span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs"><?php echo $team1; ?></span>
<span class="h4-like large-hidden mls mrs">ANG</span> vs <span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs"><?php echo $team2; ?></span>
<span class="h4-like large-hidden mls mrs">ESP</span> <img src="<?php echo $betsdata['tf2'];?>" alt="<?php echo $team2; ?>" width="50" height="50">
</p>
<p class="txtcenter h2-like mtn"><strong>
<?php
if ($betsdata['team1result'] != NULL && $betsdata['team2result'] != NULL)
	echo $betsdata['team1result'] . " - " . $betsdata['team2result'];
else
	echo "non joué";
?>
</strong></p>

<a href="#lb_angleterre" id="lightbox_angleterre">Infos <?php echo $team1; ?></a>

<!-- Setting the lightbox for each team available if we click on the name of the team -->
		<div style="display: none;">
		<div id="lb_angleterre" class="lbstyle">
		<h2 class="h3-like">Angleterre</h2>
			<p><strong>Palmarès 2011</strong><br>
			Vainqueur</p>
			<h3>Points Poule A</h3>
			<ul class="unstyled pln">
			<li>Australie&nbsp;:&nbsp;<strong>3</strong></li>
			<li>Angleterre&nbsp;:&nbsp;<strong>1</strong></li>
			<li>Pay de Galles&nbsp;:&nbsp;<strong>1</strong></li>
			<li>Fidji&nbsp;:&nbsp;<strong>0</strong></li>
			<li>Uruguay&nbsp;:&nbsp;<strong>0</strong></li>
			</ul>
			<h3>Phase finale</h3>
			<ul class="unstyled pln">
			<li><strong>quarts</strong>&nbsp;:&nbsp;non joué</li>
			<li><strong>demies</strong>&nbsp;:&nbsp;non joué</li>
			<li><strong>finale</strong>&nbsp;:&nbsp;non joué</li>
			</ul>
		</div>
		</div>
		<!-- End Setting the lightbox for each team available if we click on the name of the team -->
 - <a href="#lb_espagne" id="lightbox_espagne">Infos <?php echo $team2; ?></a>

<!-- Setting the lightbox for each team available if we click on the name of the team -->
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
		<!-- End Setting the lightbox for each team available if we click on the name of the team -->

<div class="grid-2-small-1-tiny-1">
<div>
<form id="bet01" action="bet1.php#bet01" method="POST" class="border-bet-form">
<ul class="unstyled pln bet-choix txtleft">
			<li><label for="<?php echo $team1; ?>"><input type="radio" value="<?php echo $team1; ?>" name="select_bet01">&nbsp;<?php echo $team1; ?></label></li>
			<li><label for="<?php echo $team2; ?>"><input type="radio" value="<?php echo $team2; ?>" name="select_bet01">&nbsp;<?php echo $team2; ?></label></li>
			<li><label for="Nul"><input type="radio" name="select_bet01" value="Nul">&nbsp;Nul</label></li>
			<li class="pam"><strong>Paris fermés</strong></li>
</ul></form>
</div>
<div class="pam">
<p>Votre choix</p>
<p class="couleur">Angleterre</p>
<p class="mtm">Résultat</p>
<p class="couleur">Gagné</p>
<p>Perdu</p>
</div>
</div><!--end grid-2-->
</div><!--end panel-->
</div><!--end poule ang esp-->
<?php
}
?>
<div id="poule-fra-rou">
<p class="bet-jour-mois h4-like pam"><span class="couleur">Samedi 11 juin</span> - 13h - <span class="couleur">Groupe A</span></p>
<div class="panel txtcenter">
<p class="mbs"><img src="images/flags/france.png" alt="France" width="50" height="50"> <span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs">France</span><span class="h4-like large-hidden mls mrs">FRA</span> vs <span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs">Roumanie</span><span class="h4-like large-hidden mls mrs">ROU</span> <img src="images/flags/roumanie.png" alt="Roumanie" width="50" height="50">
</p>

<p class="txtcenter h2-like mtn"><strong>non joué</strong></p>

<a href="#lb_france" id="lightbox_france">Infos France</a>

<!-- Setting the lightbox for each team available if we click on the name of the team -->
		<div style="display: none;">
		<div id="lb_france" class="lbstyle">
		<h2 class="h3-like">France</h2>
			<p><strong>Palmarès 2012 : </strong><br>
			Matchs de Poule</p>
			<h3>Matchs de Poule</h3>
			<ul class="unstyled pln">
			<li><strong>1er</strong> vs Ukraine&nbsp;:&nbsp;nul 1 - 1</li>
			<li><strong>2ème</strong> vs Malte&nbsp;:&nbsp;non joué</li>
			<li><strong>3ème</strong> vs France&nbsp;:&nbsp;non joué</li>
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
		<!-- End Setting the lightbox for each team available if we click on the name of the team -->

 - <a href="#lb_roumanie" id="lightbox_roumanie">Infos Roumanie</a>

<!-- Setting the lightbox for each team available if we click on the name of the team -->
		<div style="display: none;">
		<div id="lb_roumanie" class="lbstyle">
		<h2 class="h3-like">Roumanie</h2>
			<p><strong>Palmarès 2012 : </strong><br>
			Quarts de finale</p>
			<h3>Matchs de Poule</h3>
			<ul class="unstyled pln">
			<li><strong>1er</strong> vs Belgique&nbsp;:&nbsp;nul 1 - 1</li>
			<li><strong>2ème</strong> vs France&nbsp;:&nbsp;non joué</li>
			<li><strong>3ème</strong> vs Malte&nbsp;:&nbsp;non joué</li>
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
		<!-- End Setting the lightbox for each team available if we click on the name of the team -->

<div class="grid-2-small-1-tiny-1">
<div>
<form id="bet02" action="bet1.php#bet02" method="POST" class="border-bet-form">
<ul class="unstyled pln bet-choix txtleft">
			<li><label for="France"><input type="radio" value="France" name="select_bet2">&nbsp;France</label></li>
			<li><label for="Roumanie"><input type="radio" value="Roumanie" name="select_bet2">&nbsp;Roumanie</label></li>
			<li><label for="Nul"><input type="radio" name="select_bet2" value="Nul">&nbsp;Nul</label></li>
			<li class="mtm"><input type="submit" class="btn-rouge mts mbs" name="save_bet02" id="save_bet02" value="Valider"></li>
</ul>
</form></div>
<div class="pam">
<p>Votre choix</p>
<p class="couleur">France</p>
<p class="mtm">Résultat</p>
<p class="couleur">Match non joué</p>
</div>
</div><!--end grid-2-->
</div><!--end panel-->
</div><!--end poule-fra-rou-->
</div><!--end grid-2-->


<p class="up"><a class="icon-up" href="#container">&nbsp;Haut de page</a></p>
</div><!--end center-->
</div><!--end content-->
<?php } ?>
<?php include("footer.php"); ?>
</div><!--end#container-->
</body>
</html>

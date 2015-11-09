<?php include('PHP/login.php'); ?>
<?php include("head.php"); ?>
<body id="page_bet2">
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

<h1 class="ptl">Pariez sur les Matchs Eliminatoires.</h1>
<div id="search_team" class="mtl mbl"><label for="info_team">Rechercher une équipe&nbsp;:&nbsp;</label><input id="info_team" /></div>

<div class="panel mbl">
<h2>Accès direct</h2>

<p><a href="#bet_huitiemes">Huitièmes de finale</a> <a href="#bet_quarts">Quarts de finale</a> <a href="#bet_demies">Demi-finales</a> <a href="#bet_petitefinale">Petite Finale</a> <a href="#bet_finale">Finale</a></p>
<p><a href="#">Tableau de la phase finale sur le site de la FIFA</a></p>

</div><!--end Panel-->


<div class="panel mbl">
<h2>Les paris du jour</h2>
<a href="#bet38">Angleterre - Espagne</a>
</div><!--end Panel-->


<!-- Loop to display all matches in chronological order with a select element to select the potential winning team -->

<h2 id="bet_huitiemes">Huitièmes de Finale</h2>

<div class="grid-2-small-1-tiny-1">

<div id="huitieme-1">
<p class="h4-like pam"><span class="couleur">Samedi 25 juin</span> - 15h</p>
<div class="panel txtcenter">
<p class="mbs"><img src="images/flags/angleterre.png" alt="Angleterre" width="50" height="50"> <span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs">Angleterre</span><span class="h4-like large-hidden mls mrs">ANG</span> vs <span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs">Espagne</span><span class="h4-like large-hidden mls mrs">ESP</span> <img src="images/flags/espagne.png" alt="Espagne" width="50" height="50">
</p>
<p class="txtcenter h2-like mtn"><strong>1 - 0</strong></p>

<a href="#lb_angleterre" id="lightbox_angleterre">Infos Angleterre</a>

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

 - <a href="#lb_espagne" id="lightbox_espagne">Infos Espagne</a>

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
<form id="bet37" action="bet2.php#bet37" method="POST" class="border-bet-form">
<ul class="unstyled pln bet-choix txtleft">
			<li><label for="Angleterre"><input type="radio" value="Angleterre" name="select_bet37">&nbsp;Angleterre</label></li>
			<li><label for="Espagne"><input type="radio" value="Espagne" name="select_bet37">&nbsp;Espagne</label></li>
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
</div><!--end huitieme-1-->
		

<div id="huitieme-2">
<p class="h4-like pam"><span class="couleur">Samedi 25 juin</span> - 18h</p>
<div class="panel txtcenter">
<p class="mbs"><img src="images/flags/angleterre.png" alt="Angleterre" width="50" height="50"> <span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs">Angleterre</span><span class="h4-like large-hidden mls mrs">ANG</span> vs <span class="h4-like medium-hidden small-hidden tiny-hidden mls mrs">Espagne</span><span class="h4-like large-hidden mls mrs">ESP</span> <img src="images/flags/espagne.png" alt="Espagne" width="50" height="50">
</p>

<p class="txtcenter h2-like mtn"><strong>non joué</strong></p>

<a href="#lb_angleterre" id="lightbox_angleterre">Infos Angleterre</a>

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

 - <a href="#lb_espagne" id="lightbox_espagne">Infos Espagne</a>

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
<form id="bet38" action="bet2.php#bet38" method="POST" class="border-bet-form">
<ul class="unstyled pln bet-choix txtleft">
			<li><label for="Angleterre"><input type="radio" value="Angleterre" name="select_bet38">&nbsp;Angleterre</label></li>
			<li><label for="Espagne"><input type="radio" value="Espagne" name="select_bet38">&nbsp;Espagne</label></li>
			<li class="mtm"><input type="submit" class="btn-rouge mts mbs" name="save_bet38" id="save_bet38" value="Valider"></li>
</ul></form>
</div>
<div class="pam">
<p>Votre choix</p>
<p class="couleur">Angleterre</p>
<p class="mtm">Résultat</p>
<p class="couleur">Non joué</p>
</div>
</div><!--end grid-2-->
</div><!--end panel-->
</div><!--end huitieme-2-->
		

</div><!--end grid-2-->


<p class="up"><a class="icon-up" href="#container">&nbsp;Haut de page</a></p>
</div><!--end center-->
</div><!--end content-->
<?php }?>
<?php include("footer.php"); ?>
</div><!--end#container-->
</body>
</html>

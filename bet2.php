<?php include('PHP/login.php'); ?>
<?php include("head.php"); ?>
<body id="page_bet2">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>
<?php include("PHP/bet_functions.php"); ?>

<div id="content">
<div class="center">
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

<h1>Pariez sur les Matchs Eliminatoires.</h1>
<div id="search_team" class="mtl mbl"><label for="info_team">Rechercher une équipe&nbsp;:&nbsp;</label><input id="info_team" /></div>

<div class="panel mbl">
<h2>Accès direct</h2>

<p><a href="#bet_huitiemes">Huitièmes de finale</a> <a href="#bet_quarts">Quarts de finale</a> <a href="#bet_demies">Demi-finales</a> <a href="#bet_finale">Finale</a></p>
<p><a href="#">Tableau de la phase finale sur le site de la FIFA</a></p>

</div><!--end Panel-->


<div class="panel mbl">
<h2>N'oubliez pas de parier sur :</h2>
<a href="#bet40">Belgique - Ukraine</a>
</div><!--end Panel-->


<!-- Loop to display all matches in chronological order with a select element to select the potential winning team -->

<h2 id="bet_huitiemes">Huitièmes de Finale</h2>

<div class="autogrid2">

<table class="striped alternate">
<caption>Huitième 1<br>
<img src="images/flags/France.png" alt="France" width="20" height="20"> France vs Malte <img src="images/flags/Malte.png" alt="Malte" width="20" height="20"></caption>
<tr>
<th>PARIEZ
<br>
jusqu'au<br>
mercredi 10 juin<br>
21 h

<div class="mts"><a href="#lb_france" id="lightbox_france">Infos France</a>

<!-- Setting the lightbox for each team available if we click on the name of the team -->
		<div style="display: none;">
		<div id="lb_france" class="lbstyle">
		<h2 class="h3-like">France</h2>
			<p><strong>Palmarès Euro 2012</strong><br>
			Quart de finale</p>
			<h3>Matchs de Poule</h3>
			<ul class="unstyled pln">
			<li><strong>1er</strong> vs Malte&nbsp;:&nbsp;gagné 3 - 0</li>
			<li><strong>2ème</strong> vs Ukraine&nbsp;:&nbsp;non joué</li>
			<li><strong>3ème</strong> vs Belgique&nbsp;:&nbsp;non joué</li>
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

</div>

<div class="mts"><a href="#lb_malte" id="lightbox_malte">Infos Malte</a>

<!-- Setting the lightbox for each team available if we click on the name of the team -->
		<div style="display: none;">
		<div id="lb_malte" class="lbstyle">
		<h2 class="h3-like">Malte</h2>
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

</div>

</th>
<td>
<form id="bet39" action="bet2.html#bet39" method="POST">
<ul class="unstyled pln">
			<li><label for="France"><input type="radio" value="France" name="select_bet39">&nbsp;France</label></li>
			<li><label for="Malte"><input type="radio" value="Malte" name="select_bet39">&nbsp;Malte</label></li>
			<li class="rouge">Paris fermés</li>
</ul></form></td>
</tr>
<tr>
<th>Votre choix</th>
<td>
  France</td>
</tr>
<tr>
<th>Résultat</th>
<td>
		<p class="icon-check">Gagné</p>
	</td>
</tr>
</table>

<table class="striped alternate">
<caption>Huitième 2<br>
<img src="images/flags/Belgique.png" alt="Belgique" width="20" height="20"> Belgique vs Ukraine <img src="images/flags/Ukraine.png" alt="Ukraine" width="20" height="20"></caption>
<tr>
<th>
PARIEZ
<br>
jusqu'au<br>
jeudi 11 juin<br>
18 h

<div class="mts"><a href="#lb_belgique" id="lightbox_belgique">Infos Belgique</a>

<!-- Setting the lightbox for each team available if we click on the name of the team -->
		<div style="display: none;">
		<div id="lb_belgique" class="lbstyle">
		<h2 class="h3-like">Belgique</h2>
			<p><strong>Palmarès Euro 2012 : </strong><br>
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

</div>

<div class="mts"><a href="#lb_ukraine" id="lightbox_ukraine">Infos Ukraine</a>

<!-- Setting the lightbox for each team available if we click on the name of the team -->
		<div style="display: none;">
		<div id="lb_ukraine" class="lbstyle">
		<h2 class="h3-like">France</h2>
			<p><strong>Palmarès Euro 2012 : </strong><br>
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

</div>

</th>
<td>


<form id="bet40" action="bet2.html#bet40" method="POST">
<ul class="unstyled pln">
			<li><label for="Belgique"><input type="radio" value="Belgique" name="select_bet2">&nbsp;Belgique</label></li>
			<li><label for="Ukraine"><input type="radio" value="Ukraine" name="select_bet2">&nbsp;Ukraine</label></li>
			<li class="mtm"><input type="submit" class="btn-vert mt1" name="save_bet40" id="save_bet40" value="Valider"></li>
</ul></form></td>


</tr>
<tr>
<th>Votre choix</th>
<td>
  Ukraine</td>
</tr>
<tr>
<th>Résultat</th>
<td>
		<p>Pariez</p>
	</td>
</tr>
</table>
</div><!--end autogrid2-->


<p class="up"><a class="icon-up" href="#container">&nbsp;Haut de page</a></p>
</div><!--end center-->
</div><!--end content-->
<?php }?>
<?php include("footer.php"); ?>
</div><!--end#container-->
</body>
</html>

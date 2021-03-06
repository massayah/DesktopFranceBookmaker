<?php include('PHP/login.php'); 
?>
<?php include("head.php"); ?>
<body id="page_top">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>

<?php include("PHP/set_top.php"); ?>

<div id="content">
<div class="mw1140p center mtl">
<!-- Message displayed if the user is not logged in -->
<?php
if (!isset($_SESSION['username']))
{
	echo "<div id=\"logged_error_message\" class=\"mtl\">Vous n'êtes pas connecté : pour accéder à cette page, vous devez vous connecter avec votre nom d'utilisateur et votre mot de passe, ou <a href=\"register.php\">vous inscrire comme nouveau membre.</div>";
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

<!-- Display of a table with the teams ordered by group, all teams are draggable -->
<div class="panel">
<h2 class="mtl">Votre Top 4</h2>
<div id="top4-choice" class="grid-4-small-2-tiny-1">
<?php
$gettop = $bdd->prepare('SELECT * FROM euro_top WHERE username = ?');
$gettop->execute(array($_SESSION['username']));
if ($gettop->rowCount() != 0)
{
	$gettopdata = $gettop->fetch();
	$team1 = $gettopdata['team1'];
	$team2 = $gettopdata['team2'];
	$team3 = $gettopdata['team3'];
	$team4 = $gettopdata['team4'];
}
?>
<div id="top4-choice1" class="plm">
	<h2 class="h4-like pts">1er</h2>
	<div>
		<ul class="unstyled pln">
		<?php if (isset($team1) && !empty($team1)) { ?>
			<li id="team1"><?php echo $team1; ?></li>
		<?php } else { ?>
			<li class="placeholder1"><a href="#jefaismontop">Faites votre choix</a></li>
		<?php } ?>
		</ul>
	<div id="result"></div>
	</div><!--end class ui-widget-content-->
</div><!--end id top4-choice1-->

<div id="top4-choice2" class="plm">
	<h2 class="h4-like pts">2ème</h2>
	<div>
		<ul class="unstyled pln">
		<?php if (isset($team2) && !empty($team2)) { ?>
			<li id="team2"><?php echo $team2; ?></li>
		<?php } else { ?>
			<li class="placeholder2"><a href="#jefaismontop">Faites votre choix</a></li>
		<?php } ?>
		</ul>
	</div><!--end class ui-widget-content-->
</div><!--end id top4-choice2-->

<div id="top4-choice3" class="plm">
	<h2 class="h4-like pts">3ème</h2>
	<div>
		<ul class="unstyled pln">
		<?php if (isset($team3) && !empty($team3)) { ?>
			<li id="team3"><?php echo $team3; ?></li>
		<?php } else { ?>
			<li class="placeholder3"><a href="#jefaismontop">Faites votre choix</a></li>
		<?php } ?>
		</ul>
	</div><!--end class ui-widget-content-->
</div><!--end id top4-choice3-->

<div id="top4-choice4" class="plm">
	<h2 class="h4-like pts">4ème</h2>
	<div>
		<ul class="unstyled pln">
		<?php if (isset($team4) && !empty($team4)) { ?>
			<li id="team4"><?php echo $team4; ?></li>
		<?php } else { ?>
			<li class="placeholder4"><a href="#jefaismontop">Faites votre choix</a></li>
		<?php } ?>
		</ul>
	</div>
</div><!--end id top4-choice4-->
</div><!--fin grid-->
</div><!--fin panel-->

<div class="panel grpes">
<h2 class="mtl">Les Groupes</h2>
<div class="grid-6-small-2-tiny-1">

<div class="mbl">
<h3>A</h3>
<p><img src="images/flags/albanie.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Albanie</strong></span><span class="large-hidden"><strong>ALB</strong></span></p>
<p><img src="images/flags/france.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>France</strong></span><span class="large-hidden"><strong>FRA</strong></span></p>
<p><img src="images/flags/roumanie.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Roumanie</strong></span><span class="large-hidden"><strong>ROU</strong></span></p>
<p><img src="images/flags/suisse.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Suisse</strong></span><span class="large-hidden"><strong>SUI</strong></span></p>
</div>

<div class="mbl">
<h3>B</h3>
<p><img src="images/flags/angleterre.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Angleterre</strong></span><span class="large-hidden"><strong>ANG</strong></span></p>
<p><img src="images/flags/russie.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Russie</strong></span><span class="large-hidden"><strong>RUS</strong></span></p>
<p><img src="images/flags/slovaquie.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Slovaquie</strong></span><span class="large-hidden"><strong>SLO</strong></span></p>
<p><img src="images/flags/pgalles.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>P Galles</strong></span><span class="large-hidden"><strong>PGA</strong></span></p>
</div>

<div class="mbl">
<h3>C</h3>
<p><img src="images/flags/allemagne.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Allemagne</strong></span><span class="large-hidden"><strong>ALL</strong></span></p>
<p><img src="images/flags/irlnord.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Irl du Nord</strong></span><span class="large-hidden"><strong>IRN</strong></span></p>
<p><img src="images/flags/pologne.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Pologne</strong></span><span class="large-hidden"><strong>POL</strong></span></p>
<p><img src="images/flags/ukraine.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Ukraine</strong></span><span class="large-hidden"><strong>UKR</strong></span></p>
</div>

<div class="mbl">
<h3>D</h3>
<p><img src="images/flags/croatie.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Croatie</strong></span><span class="large-hidden"><strong>CRO</strong></span></p>
<p><img src="images/flags/rtcheque.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Rép Tchèque</strong></span><span class="large-hidden"><strong>RTC</strong></span></p>
<p><img src="images/flags/espagne.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Espagne</strong></span><span class="large-hidden"><strong>ESP</strong></span></p>
<p><img src="images/flags/turquie.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Turquie</strong></span><span class="large-hidden"><strong>TUR</strong></span></p>
</div>

<div class="mbl">
<h3>E</h3>
<p><img src="images/flags/belgique.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Belgique</strong></span><span class="large-hidden"><strong>BEL</strong></span></p>
<p><img src="images/flags/italie.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Italie</strong></span><span class="large-hidden"><strong>ITA</strong></span></p>
<p><img src="images/flags/irlande.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Rép Irlande</strong></span><span class="large-hidden"><strong>IRL</strong></span></p>
<p><img src="images/flags/suede.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Suède</strong></span><span class="large-hidden"><strong>SUE</strong></span></p>
</div>

<div class="mbl">
<h3>F</h3>
<p><img src="images/flags/autriche.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Autriche</strong></span><span class="large-hidden"><strong>AUT</strong></span></p>
<p><img src="images/flags/hongrie.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Hongrie</strong></span><span class="large-hidden"><strong>HON</strong></span></p>
<p><img src="images/flags/islande.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Islande</strong></span><span class="large-hidden"><strong>ISL</strong></span></p>
<p><img src="images/flags/portugal.png" width="20" height="20" alt="" /><span class="medium-hidden small-hidden tiny-hidden mls mrs"><strong>Portugal</strong></span><span class="large-hidden"><strong>POR</strong></span></p>
</div>

</div><!--fin grid-->
</div><!--fin panel-->

<div class="panel mtl">
<h2>Comment faire</h2>
<div class="grid-2-small-1-tiny-1">

<div class="pas">
<h3>Parier</h3>
<p>Sélectionnez votre top 4 dans les 4 listes.</p>
<p>Lorsque vos choix sont faits, <strong>validez</strong>.</p>
</div>
<div class="pas">
<h3>Changer de choix</h3>
<p>Cliquez sur les 4 équipes de votre nouveau choix et <strong>validez</strong>.<br>Vous <strong>devez choisir QUATRE équipes</strong>, même si certaines ne changent pas par rapport à votre précédent choix.</p>
<h3>ATTENTION</h3>
<p>Le Top 4 doit être choisi <strong>AVANT</strong> le début de la compétition.</p>
</div>

</div><!--end grid-2-->
<p class="h2-like txtcenter">Réfléchissez bien, certaines combinaisons sont impossibles.</p>
</div><!--end panel-->

<div class="panel mtl">
<h2>Choisissez 4 équipes</h2>
<p class="pbm">Vous devez sélectionner 1 équipe par tableau, sinon la validation ne marchera pas.</p>

<?php
$result = $bdd->query('SELECT * FROM euro_team;');
?><form action="#top4-choice" method="post">
<div class="grid-4-small-2-tiny-1" id="jefaismontop">
<div>
   <label for="top-choix-1" class="mbs h4-like">1er</label><br>
   <select multiple size="20" name="top_premier">
 <?php
$i = 1;
while ($data = $result->fetch())
{
	if ($i == 1 || $i == 21)
		
	?>
	<option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
	<?php
	$i++;
}
?></select></div>
<div>
<label for="top-choix-2" class="mbs h4-like">2ème</label><br>
   <select multiple size="20" name="top_deuxieme">
<?php
$result = $bdd->query('SELECT * FROM euro_team;');
$i = 1;
while ($data = $result->fetch())
{
	if ($i == 1 || $i == 21)
		echo "";
	?>
		<option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
	<?php
	$i++;
}
?></select></div>
<div>
<label for="top-choix-3" class="mbs h4-like">3ème</label><br>
   <select multiple size="20" name="top_troisieme">

<?php
$result = $bdd->query('SELECT * FROM euro_team;');
$i = 1;
while ($data = $result->fetch())
{
	if ($i == 1 || $i == 21)
		echo "";
	?>
		<option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
	<?php
	$i++;
}
?></select></div>
<div>
<label for="top-choix-4" class="mbs h4-like">4ème</label><br>
   <select multiple size="20" name="top_quatrieme">

<?php
$result = $bdd->query('SELECT * FROM euro_team;');

$i = 1;
while ($data = $result->fetch())
{
	if ($i == 1 || $i == 21)
		echo "";
	?>
		<option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
	<?php
	$i++;
}
?></select></div>
</div><!--fin grid-->


<div class="mtl">
<?php if (isset($top4message)) echo $top4message; ?>
<p class="txtcenter mtm mbm"><input type="submit" class="btn-rouge" value="Je valide" name="topvalid" />
   </p>
   </div><!--fin div validation-->
</form>
</div><!--fin panel-->

<!-- End Display of the droppable zone for the four positions of the top -->

<p class="up"><a href="#container">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" width="60" height="60">
  <circle cx="30" cy="30" r="25" class="circle" />
  <polyline points="20,35 30,25 40,35" class="arrow" />
  </svg></a></p>

</div><!--end center-->
</div><!--end content-->
<?php } ?>
<?php include("footer.php"); ?>
</div><!--end#container-->

</body>
</html>

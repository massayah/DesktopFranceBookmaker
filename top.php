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

<div class="panel">
<h2>Comment faire</h2>
<div class="grid-2">

<div class="pam">
<h3>Parier</h3>
<p>Sélectionnez votre top 4 dans les 4 listes.</p>
<p>Lorsque vos choix sont faits, <strong>validez</strong>.</p>
</div>
<div class="pam">
<h3>Changer de choix</h3>
<p>Cliquez sur les 4 équipes de votre nouveau choix et <strong>validez</strong>.<br>Vous <strong>devez choisir QUATRE équipes</strong>, même si certaines ne changent pas par rapport à votre précédent choix.</p>
<h3>ATTENTION</h3>
<p>Le Top 4 doit être choisi <strong>AVANT</strong> le début de la compétition.</p>
</div>

</div><!--end grid-2-->
<p class="h2-like txtcenter">Réfléchissez bien, certaines combinaisons sont impossibles.</p>
</div><!--end panel-->


<!-- Display of a table with the teams ordered by group, all teams are draggable -->

<div class="panel mtl">
<h2>Choisissez</h2>

<?php
$result = $bdd->query('SELECT * FROM euro_team;');
$gettop = $bdd->prepare('SELECT * FROM euro_top WHERE username = ?');
$gettop->execute(array($_SESSION['username']));
if ($gettop->rowCount() != 0)
{
	$gettopdata = $gettop->fetch();
	$team1 = $gettopdata['team1'];
}
?><form action="#top4-choice" method="post">
<div class="grid-4-small-2-tiny-1">
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
$gettop = $bdd->prepare('SELECT * FROM euro_top WHERE username = ?');
$gettop->execute(array($_SESSION['username']));
if ($gettop->rowCount() != 0)
{
	$gettopdata = $gettop->fetch();
	$team2 = $gettopdata['team2'];
}
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
$gettop = $bdd->prepare('SELECT * FROM euro_top WHERE username = ?');
$gettop->execute(array($_SESSION['username']));
if ($gettop->rowCount() != 0)
{
	$gettopdata = $gettop->fetch();
	$team3 = $gettopdata['team3'];
}
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
$gettop = $bdd->prepare('SELECT * FROM euro_top WHERE username = ?');
$gettop->execute(array($_SESSION['username']));
if ($gettop->rowCount() != 0)
{
	$gettopdata = $gettop->fetch();
	$team4 = $gettopdata['team4'];
}
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
</div>
</div>

<div class="mtl">
<?php if (isset($top4message)) echo $top4message; ?>
<p class="txtcenter mtm mbm"><input type="submit" class="btn-rouge" value="Je valide" name="topvalid" />
   </p>
</form>
</div>
<h2 class="mtl">Votre Top 4</h2>
<div id="top4-choice" class="grid-4-small-2-tiny-1 panel">

<div id="top4-choice1" class="plm">
	<h2 class="h4-like pts">1er</h2>
	<div>
		<ul class="unstyled pln">
		<?php if (isset($team1) && !empty($team1)) { ?>
			<li id="team1"><?php echo $team1; ?></li>
		<?php } else { ?>
			<li class="placeholder1">Faites votre choix</li>
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
			<li class="placeholder2">Faites votre choix</li>
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
			<li class="placeholder3">Faites votre choix</li>
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
			<li class="placeholder4">Faites votre choix</li>
		<?php } ?>
		</ul>
	</div><!--end class ui-widget-content-->
</div><!--end id top4-choice4-->
</div><!--fin panel-->

<!-- End Display of the droppable zone for the four positions of the top -->

<p class="up"><a class="icon-up" href="#container">&nbsp;Haut de page</a></p>
</div><!--end center-->
</div><!--end content-->
<?php } ?>
<?php include("footer.php"); ?>
</div><!--end#container-->

<!-- jQuery if needed -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
			
			function DropDown(el) {
				this.dd = el;
				this.opts = this.dd.find('ul.dropdown > li');
				this.val = [];
				this.index = [];
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});

					obj.opts.children('label').on('click',function(event){
						var opt = $(this).parent(),
							chbox = opt.children('input'),
							val = chbox.val(),
							idx = opt.index();

						($.inArray(val, obj.val) !== -1) ? obj.val.splice( $.inArray(val, obj.val), 1 ) : obj.val.push( val );
						($.inArray(idx, obj.index) !== -1) ? obj.index.splice( $.inArray(idx, obj.index), 1 ) : obj.index.push( idx );
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );
				var ee = new DropDown( $('#ee') );
				var ff = new DropDown( $('#ff') );
				var gg = new DropDown( $('#gg') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-4').removeClass('active');
				});

			});

		</script>

</body>
</html>

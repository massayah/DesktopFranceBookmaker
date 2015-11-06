<div id="container">
<div id="header">
<div class="mw1140p center flex-container">
<div class="logodiv">
<a href="index.php" title="Retour Accueil"><img class="logo-standard" src="images/header.jpg" alt="Rugby Bookmaker" /><img class="logo-600-1023" src="images/header320.jpg" alt="Rugby Bookmaker" /></a>
</div><!--end logodiv-->

<?php
if (isset($_SESSION['username']))
{
	echo "<div id=\"login\"><h3 class=\"h4-like\">Bienvenue " . $_SESSION['username'] . "</h3>";
?>
<form id="header_connected_form" method="post" action="index.php">
<input type="submit" class="btn-rouge" name="logout" value="Je me déconnecte">


<?php
}
else
{
?>
<div id="login">
<p class="h4-like" title="cliquez pour faire apparaitre le formulaire">Connexion</p>
<div id="inscript" class="h4-like login-inscription"><a href="register.php" title="vers la page d'inscription">Inscription</a></div>
<div id="login-form">
<form id="header_form" method="post" action="index.php">

	<label for="usernameConnect">Votre Nom</label>
	<input type="text" id="usernameConnect" name="usernameConnect" size="10" required autofocus><br>
	<label for="passwordConnect">Mot de Passe <a href="contact.php">Oubli ?</a></label>
	<input type="password" id="passwordConnect" name="passwordConnect" size="10" required>

	<input type="submit" class="mtl btn-rouge" name="connection" value="OK">
	<?php if (isset($error)) echo "<br><span class=\"error_message\">$error</span>";} ?>
</form>	
</div><!--end login-form non connecté -->
</div><!--end login-->
<?php
if (isset($_SESSION['username']))
{
	$isadmin = $bdd->prepare('SELECT isadmin FROM euro_user WHERE username = ?');
	$isadmin->execute(array($_SESSION['username']));
	$isadmindata = $isadmin->fetch();
	if ($isadmindata[0] == 1)
	{
?>

<p><a href="admin.php">Admin</a></p>
<?php
}
$isadmin->closeCursor();
}
?>
</div><!--end center line-->
</div><!--end header-->
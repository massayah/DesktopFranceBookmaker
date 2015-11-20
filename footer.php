<div id=footer>
<div class="center">
<p class="txtcenter">Site entièrement fait par Laurène et Martine  
<?php
if (isset($_SESSION['username']))
{
	$isadmin = $bdd->prepare('SELECT isadmin FROM euro_user WHERE username = ?');
	$isadmin->execute(array($_SESSION['username']));
	$isadmindata = $isadmin->fetch();
	if ($isadmindata[0] == 1)
	{
?>

 - <a href="admin.php">Admin</a></p>
<?php
}
$isadmin->closeCursor();
}
?>
</div><!--end center-->
</div><!--end footer-->

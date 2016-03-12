<?php include('PHP/login.php'); ?>
<?php include('PHP/getRegistered.php'); ?>
<?php include("head.php"); ?>
<body id="page_register">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>

<!-- Form to register to the website -->
<div id="content">
<div class="mw1140p center mtl">
<h1 class="h2-like">Créez votre nom d'utilisateur et votre mot de passe</h1>
<form id="register_form" method="post" action="register.php">
<fieldset>
<p>
<label for="username">Nom d'utilisateur&nbsp;:</label>
<input type="text" id="username" name="username" placeholder="4 <> 10" pattern="[A-Za-z]{4,10}" required autofocus>
</p>
<p class="form-help">Entre 4 et 10 caractères.<br>Votre prénom + initiale de votre nom (ex. ZezetteX)<br>ou un pseudo reconnaissable par nous.</p>

<p class="mtl">
<label for="password">Mot de Passe&nbsp;:</label>
<input type="password" id="password" name="password" placeholder="4 <> 10" required>
</p>
<p class="form-help">Entre 4 et 10 caractères.<br>Facile à retenir.</p>

<p class="mtl">
<label for="confirmPassword">Confirmez votre Mot de Passe&nbsp;:</label>
<input type="password" id="confirmPassword" name="confirmPassword" placeholder="4 <> 10" required>
</p>

<!-- Display error messages if any -->
<?php
if (isset($erreur)) echo '<p id="register_error_message">',$erreur.'</p>';  
?>
<!-- End Display error messages if any -->

<p class="mtl">
<input type="submit" class="submit btn-rouge" name="register" value="Enregistrer">
</p>
</fieldset>
</form>
<!-- End Form to register to the website -->

<p class="up"><a href="#container">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" width="60" height="60">
  <circle cx="30" cy="30" r="25" class="circle" />
  <polyline points="20,35 30,25 40,35" class="arrow" />
  </svg></a></p>

</div><!--end center-->
</div><!--end content-->
<?php include("footer.php"); ?>
</div><!--end#container-->
</body>
</html>
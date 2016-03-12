<?php include('PHP/login.php'); ?>
<?php
if (isset($_POST['sendmail'])) {
if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['name']) && !empty($_POST['name']))) {
$mail = 'laurene.assayah@gmail.com; massayah@creasites.fr'; // Address of the receiver
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // Handling servers (see if there are problems)
{
	$new_line = "\r\n";
}
else
{
	$new_line = "\n";
}
//Messages in HTML and text format
$message_txt = htmlspecialchars($_POST['emailcontent']);
$message_html = htmlspecialchars($_POST['emailcontent']);
 
// Boundary creation
$boundary = "-----=".md5(rand());
 
// Subject definition
$subject = "Email from contact page of EuroBookMaker";
 
//Creation of the header.
$header = "From:". htmlspecialchars($_POST['name']) . "<" . htmlspecialchars($_POST['email']) . ">".$new_line;
$header.= "Reply-to:" . htmlspecialchars($_POST['name']) . "<" . htmlspecialchars($_POST['email']) .">".$new_line;
$header.= "MIME-Version: 1.0".$new_line;
$header.= "Content-Type: multipart/alternative;".$new_line." boundary=\"$boundary\"".$new_line;
 
//Creation of the message.
$message = $new_line."--".$boundary.$new_line;
//Adding the message in text format.
$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$new_line;
$message.= "Content-Transfer-Encoding: 8bit".$new_line;
$message.= $new_line.$message_txt.$new_line;

$message.= $new_line."--".$boundary.$new_line;
//Adding the message in HTML format.
$message.= "Content-Type: text/html; charset=\"UTF-8\"".$new_line;
$message.= "Content-Transfer-Encoding: 8bit".$new_line;
$message.= $new_line.$message_html.$new_line;

$message.= $new_line."--".$boundary."--".$new_line;
$message.= $new_line."--".$boundary."--".$new_line;

//Sending the email.
if (mail($mail,$subject,$message,$header))
	$messageresponse = "Votre message a bien été envoyé.<br />Merci, nous vous répondrons dans les plus brefs délais.";
else
	$messageresponse = "Message non envoyé. Réessayez ou contactez-nous par email";
}
else
	$messageresponse = "Message non envoyé : informations manquantes";
}
?>
<?php include("head.php"); ?>
<body id="page_contact">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>

<div id="content">
<div class="mw1140p center mtl">
<h1 class="h2-like">Pour tout problème avec le site, <br>contactez-nous.</h1>
<form id="contact_form" method="post" action="contact.php">
<p id="contact_message"><?php if (isset($messageresponse)) echo $messageresponse; ?></p>
<fieldset>
<p>
<label for="name">Votre Nom (ou votre pseudo si vous êtes déjà inscrit)</label><br>
<input type="text" id="name" name="name" required autofocus>
</p>
<p>
<label for="email">Votre Email</label><br>
<input type="email" id="email" name="email" required>
</p>
<p>
<label for="message">Votre Message</label><br>
<textarea id="message" name="emailcontent" required></textarea>
</p>
<p class="mtl">
<input type="submit" class="submit btn-rouge" id="sendmail" name="sendmail" value="Envoyer le message">
</p>
</fieldset>
</form>

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

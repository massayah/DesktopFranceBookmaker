<?php include('forms.php'); ?>
<?php include ('database_access.php');

// Testing if the user clicked on the submit button
if (isset($_POST['connection'])) { 

// Testing if the variables exist and are not empty
   if ((isset($_POST['usernameConnect']) && !empty($_POST['usernameConnect'])) && (isset($_POST['passwordConnect']) && !empty($_POST['passwordConnect']))) { 
	  $hasaccount = $bdd->prepare('SELECT * FROM euro_user WHERE username = ? AND password = ?');
	  $hasaccount->execute(array($_POST['usernameConnect'], md5($_POST['passwordConnect'])));
	  // Checking if there is a user with the same information username and password
	  if ($hasaccount->rowCount() != 0)
	  {
		session_start(); 
		// Setting the session variable to recognize the user on each page
         $_SESSION['username'] = $_POST['usernameConnect'];
		 // Setting the session variables if the user has already entered his top 4.
		  $result = $bdd->prepare('SELECT * FROM euro_top WHERE username = ?');
		$result->execute(array($_SESSION['username']));
		if ($result->rowCount() != 0)
		{
			$resultdata = $result->fetch();
			$_SESSION['team1'] = $resultdata['team1'];
			$_SESSION['team2'] = $resultdata['team2'];
			$_SESSION['team3'] = $resultdata['team3'];
			$_SESSION['team4'] = $resultdata['team4'];
		}
		$result->closeCursor();
         header('Location: index.php'); 
         exit(); 
	  }
	  else
	  {
		$error = 'Nom et/ou Mot de Passe incorrect';
	  }
	  $hasaccount->closeCursor();
   } 
   else { 
      $error = 'Taille incorrecte.'; 
   }  
}

// store the current time
$now = time();

// get the time the session should have expired : original 60 * 30
$limit = $now - 60 * 300;

// check the time of the last activity
if (isset($_SESSION['username']) && isset ($_SESSION['last_activity']) &&
$_SESSION['last_activity'] < $limit) {
  // if too old, clear the session array and redirect
  $_SESSION = array();
  header('Location: index.php');
  exit;
} else {
  // otherwise, set the value to the current time
  $_SESSION['last_activity'] = $now;
}

if (isset($_POST['logout']))
{
	session_unset();  
	session_destroy();    
}
?>

<?php
// Testing if the user clicked on the submit button
if (isset($_POST['topvalid'])) { 
// Testing if all the fields have been completed
   if ((isset($_POST['hiddenteam1']) && !empty($_POST['hiddenteam1'])) && (isset($_POST['hiddenteam2']) && !empty($_POST['hiddenteam2']))
	&& (isset($_POST['hiddenteam3']) && !empty($_POST['hiddenteam3'])) && (isset($_POST['hiddenteam4']) && !empty($_POST['hiddenteam4']))) {
		$exist = $bdd->prepare('SELECT * FROM euro_top WHERE username = ?');
		$exist->execute(array($_SESSION['username']));
		// Enter the top 4 into the database
		if ($exist->rowCount() == 0)
		{
			$result = $bdd->prepare('INSERT INTO euro_top (username, team1, team2, team3, team4) VALUES (:username, :team1, :team2, :team3, :team4)');
			$result->execute(array(':username' => $_SESSION['username'], ':team1' => $_POST['hiddenteam1'], ':team2' => $_POST['hiddenteam2'], 
			':team3' => $_POST['hiddenteam3'], ':team4' => $_POST['hiddenteam4'] ));
			$result->closeCursor();
		}
		else
		{
			$result = $bdd->prepare('UPDATE euro_top SET team1 = ?, team2 = ?, team3 = ?, team4 = ? WHERE username = ?');
			$result->execute(array($_POST['hiddenteam1'], $_POST['hiddenteam2'], $_POST['hiddenteam3'], $_POST['hiddenteam4'], $_SESSION['username'] ));
			$result->closeCursor();
		}
		$exist->closeCursor();
		$top4message =  "<div id=\"top_save_message\">Votre Top 4 a été sauvegardé</div>";
	}
	else
		$top4message = "<div id=\"top_error_message\">Vous devez remplir les 4 choix</div>";
}	

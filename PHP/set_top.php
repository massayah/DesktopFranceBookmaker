<?php
// Testing if the user clicked on the submit button
if (isset($_POST['topvalid'])) { 
// Testing if all the fields have been completed
   if ((isset($_POST['top_premier']) && !empty($_POST['top_premier'])) && (isset($_POST['top_deuxieme']) && !empty($_POST['top_deuxieme']))
	&& (isset($_POST['top_troisieme']) && !empty($_POST['top_troisieme'])) && (isset($_POST['top_quatrieme']) && !empty($_POST['top_quatrieme']))) {
		$check = array(1 => $_POST['top_premier'], 2 => $_POST['top_deuxieme'], 3 => $_POST['top_troisieme'], 4 => $_POST['top_quatrieme']);	
		if (count($check) == count(array_unique($check)))
		{
		$exist = $bdd->prepare('SELECT * FROM euro_top WHERE username = ?');
		$exist->execute(array($_SESSION['username']));
		// Enter the top 4 into the database
		if ($exist->rowCount() == 0)
		{
			$result = $bdd->prepare('INSERT INTO euro_top (username, team1, team2, team3, team4) VALUES (:username, :team1, :team2, :team3, :team4)');
			$result->execute(array(':username' => $_SESSION['username'], ':team1' => $_POST['top_premier'], ':team2' => $_POST['top_deuxieme'], 
			':team3' => $_POST['top_troisieme'], ':team4' => $_POST['top_quatrieme'] ));
			$result->closeCursor();
		}
		else
		{
			$result = $bdd->prepare('UPDATE euro_top SET team1 = ?, team2 = ?, team3 = ?, team4 = ? WHERE username = ?');
			$result->execute(array($_POST['top_premier'], $_POST['top_deuxieme'], $_POST['top_troisieme'], $_POST['top_quatrieme'], $_SESSION['username'] ));
			$result->closeCursor();
		}
		$exist->closeCursor();
		$top4message =  "<div id=\"top_save_message\">Votre Top 4 a été sauvegardé</div>";
		}
		else
		{
			$top4message =  "<div id=\"top_error_message\">Vos chances de gagner sont faibles avec une équipe en double ;)</div>";
		}
	}
	else
		$top4message = "<div id=\"top_error_message\">Vous devez remplir les 4 choix</div>";
}


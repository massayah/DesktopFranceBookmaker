<?php
$numbermatchsquery = $bdd->query('SELECT COUNT(id) as nombre FROM euro_schedule WHERE euro_schedule.group IS NOT NULL');
$numbermatchs = $numbermatchsquery->fetch();

for ($i = 1; $i <= $numbermatchs['nombre']; $i++)
{
	if (isset($_POST['save_bet' . $i]))
	{
		// check if the bet is blocked or not
		$possible = $bdd->prepare('SELECT available FROM euro_schedule WHERE id = ?');
		$possible->execute(array($i));
		$possibledata = $possible->fetch();
		if (isset($_POST['select_bet' . $i]) && !empty($_POST['select_bet' . $i]) && $possibledata['available'] == 1)
		{
			// save the bet of the user either by inserting it into the database if it is the first time or by updating it
			$setbet = $bdd->prepare('SELECT win FROM euro_bet WHERE username = ? and match_id = ?');
			$setbet->execute(array($_SESSION['username'], $i));
			if ($setbet->rowCount() == 0)
			{
				$insertbet = $bdd->prepare('INSERT INTO euro_bet (username, match_id, win) VALUES(:username, :match_id, :win)');
				$insertbet->execute(array(':username' => $_SESSION['username'], ':match_id' => $i, ':win' =>$_POST['select_bet' . $i]));
				$insertbet->closeCursor();
			}
			else if ($setbet->rowCount() == 1)
			{
				$updatebet = $bdd->prepare('UPDATE euro_bet SET win = ? WHERE username = ? AND match_id = ?');
				$updatebet->execute(array($_POST['select_bet' . $i], $_SESSION['username'], $i));
				$updatebet->closeCursor();
			}
			else
			{
				echo "<div id=\"bet_error_message\">Erreur: un seul pari par match</div>";
			}
			$setbet->closeCursor();
		}
		else
		{
			if ($possibledata['available'] == 0)
				echo "<div id=\"bet_error_message\">Les paris sont fermés pour ce match.</div>";
			else
				echo "<div id=\"bet_error_message\">Vous devez parier avant de sauvegarder.</div>";
		}
		$possible->closeCursor();
	}
}
function setLightbox($name, $previous, $smallname, $starplayer, $coach)
{
	$formatlightbox = str_replace(" ", "", strtolower($smallname));
	echo "<a class=\"lightbox_". $formatlightbox ."\" href=\"#lb_" . $formatlightbox . "\">Infos " . $name . "</a>";
	echo "<div style=\"display: none;\" class=\"hidelightbox\">
		  <div id=\"lb_" . $formatlightbox . "\" class=\"lbstyle\">
		  <h2 class=\"h3-like\">" . $name . "</h2>
			<h3 class=\"h4-like\">Palmarès Euro 2012</h3>" . $previous . "
			<h3 class=\"h4-like\">Entraîneur</h3>" .  $coach . "
			<h3 class=\"h4-like\">Joueur Star</h3>" . $starplayer . "
			
		</div>
		</div>";
}
?>

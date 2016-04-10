<?php

for ($i = 1; $i <= 51; $i++)
{
	if (isset($_POST['submit_match' . $i]) || isset($_POST['reset_match' . $i]))
	{
		// Setting variables if the user clicked on "submit result"
		if (isset($_POST['submit_match' . $i]))
		{
			$add = 1;
			$result1 = $_POST['score_match' . $i . '_team1'];
			$result2 = $_POST['score_match' . $i . '_team2'];
			if (isset($_POST['score_tab_match' . $i . '_team1']) && isset($_POST['score_tab_match' . $i . '_team2']))
			{
				$tab1 = $_POST['score_tab_match' . $i . '_team1'];
				$tab2 = $_POST['score_tab_match' . $i . '_team2'];
			}
		}
		// Setting variable if the user clicked on "edit result"
		if (isset($_POST['reset_match' . $i]))
		{
			$add = (-1);
			$result1 = $_POST['edit_score_match' . $i . '_team1'];
			$result2 = $_POST['edit_score_match' . $i . '_team2'];
			$setovertime = $bdd->prepare('UPDATE euro_schedule SET overtime = ? WHERE id = ?');
			$setovertime->execute(array(0, $i));
			if (isset($_POST['edit_score_tab_match' . $i . '_team1']) && isset($_POST['edit_score_tab_match' . $i . '_team2']))
			{
				$tab1 = $_POST['edit_score_tab_match' . $i . '_team1'];
				$tab2 = $_POST['edit_score_tab_match' . $i . '_team2'];
			}
		}
		if ($result1 != NULL && ( $result1 != "") && $result2 != NULL && ( $result2 != ""))
			{
				// Update score of the selected match
				$fillmatch = $bdd->prepare('UPDATE euro_schedule SET team1result = ?, team2result =  ? WHERE id = ?');
					
				if ($fillmatch->execute(array($result1, $result2, $i)) == FALSE)
					echo "Error in SQL request";
				// Update the points of the users (remove if the score was edited or add if the score was submitted and also update the points of the team in the group
				else
				{
					if (isset($_POST['prolongation' . $i]))
					{
						$setovertime = $bdd->prepare('UPDATE euro_schedule SET overtime = ? WHERE id = ?');
						$setovertime->execute(array(1, $i));
					}
						
					$resultmatch = $bdd->prepare('SELECT team1, team2 FROM euro_schedule WHERE id = ?');
					$resultmatch->execute(array($i));
					$resultmatchdata = $resultmatch->fetch();
					
					$getusers = $bdd->prepare('SELECT euro_bet.username, points FROM euro_bet JOIN euro_user ON euro_user.username = euro_bet.username WHERE win = ? AND match_id = ?');
					$addpoints = $bdd->prepare('UPDATE euro_user SET points = ? WHERE username = ?');
					
					$ispoints = $bdd->prepare('SELECT euro_schedule.group FROM euro_schedule WHERE id = ?');
					$ispoints->execute(array($i));
					$ispointsdata = $ispoints->fetch();
					if ($ispointsdata['group'] != NULL)
					{
						$teamstate = $bdd->prepare('SELECT points FROM euro_team WHERE name = ?');
						$teamstate->execute(array($resultmatchdata['team1']));
						$team1state = $teamstate->fetch();
						$teamstate->execute(array($resultmatchdata['team2']));
						$team2state = $teamstate->fetch();
						$teampoints = $bdd->prepare('UPDATE euro_team SET points = ? WHERE name = ?');
					}
					
					// if team1 won against team2
					if ($result1 > $result2)
					{
						// Add or remove points to the users that had it right
						$getusers->execute(array($resultmatchdata['team1'], $i));
						while ($getusersdata = $getusers->fetch())
						{
							$addpoints->execute(array($getusersdata['points'] + $add, $getusersdata['username']));
							$addpoints->closeCursor();
						}
						// Add points to the team 1 if result submitted
						if ($add == 1 && $ispointsdata['group'] != NULL)
							$teampoints->execute(array($team1state['points'] + 3, $resultmatchdata['team1']));
						// Remove points to team 1 if result edited
						if ($add == -1)
						{
							if ($ispointsdata['group'] != NULL)
								$teampoints->execute(array($team1state['points'] - 3, $resultmatchdata['team1']));
							$fillmatch->execute(array(NULL, NULL, $i));
						}
						if (isset($_POST['prolongation' . $i]) && $add == -1)
						{
							$setovertime->execute(array(0, $i));
							$fillmatch->execute(array(NULL, NULL, $i));
						}
					}
					// if team2 won against team1
					else if ($result1 < $result2)
					{
						// Add or remove points to the users that had it right
						$getusers->execute(array($resultmatchdata['team2'], $i));
						while ($getusersdata = $getusers->fetch())
						{
							$addpoints->execute(array($getusersdata['points'] + $add, $getusersdata['username']));
							$addpoints->closeCursor();
						}
						// Add points to team 2 if result submitted
						if ($add == 1 && $ispointsdata['group'] != NULL)
							$teampoints->execute(array($team2state['points'] + 3, $resultmatchdata['team2']));
						// Remove points to team2 if result edited
						if ($add == -1)
						{
							if ($ispointsdata['group'] != NULL)
								$teampoints->execute(array($team2state['points'] - 3, $resultmatchdata['team2']));
							$fillmatch->execute(array(NULL, NULL, $i));
						}
						if (isset($_POST['prolongation' . $i]) && $add == -1)
						{
							$setovertime->execute(array(0, $i));
							$fillmatch->execute(array(NULL, NULL, $i));
						}
						
					}
					// if there was a draw
					else
					{
						if ($ispointsdata['group'] != NULL)
						{
						// Add or remove points to the users that had it right
						$getusers->execute(array(25, $i));
						while ($getusersdata = $getusers->fetch())
						{
							$addpoints->execute(array($getusersdata['points'] + $add, $getusersdata['username']));
							$addpoints->closeCursor();
						}
						// Add points to the two teams if result was submitted
						if ($add == 1 && $ispointsdata['group'] != NULL)
						{
							$teampoints->execute(array($team1state['points'] + 1, $resultmatchdata['team1']));
							$teampoints->execute(array($team2state['points'] + 1, $resultmatchdata['team2']));
						}
						// Remove points to the two teams if result was edited
						if ($add == -1 && $ispointsdata['group'] != NULL)
						{
							$teampoints->execute(array($team1state['points'] - 1, $resultmatchdata['team1']));
							$teampoints->execute(array($team2state['points'] - 1, $resultmatchdata['team2']));
							$fillmatch->execute(array(NULL, NULL, $i));
						}
						}
						else
						{
							if (isset($tab1) && $tab1 != "" && isset($tab2) && $tab2 != "")
							{
								$filltab = $bdd->prepare('UPDATE euro_schedule SET team1penalty = ?, team2penalty = ? WHERE id = ?');
								$filltab->execute(array($tab1, $tab2, $i));	
							}
							if ($tab1 > $tab2)
							{
								// Add or remove points to the users that had it right
								$getusers->execute(array($resultmatchdata['team1'], $i));
								while ($getusersdata = $getusers->fetch())
								{
									$addpoints->execute(array($getusersdata['points'] + $add, $getusersdata['username']));
									$addpoints->closeCursor();
								}
								if ($add == -1)
								{
									$filltab->execute(array(NULL, NULL, $i));
									$fillmatch->execute(array(NULL, NULL, $i));
									$setovertime->execute(array(0, $i));
								}
							}
							else if ($tab2 > $tab1)
							{
								// Add or remove points to the users that had it right
								$getusers->execute(array($resultmatchdata['team2'], $i));
								while ($getusersdata = $getusers->fetch())
								{
									$addpoints->execute(array($getusersdata['points'] + $add, $getusersdata['username']));
									$addpoints->closeCursor();
								}
								if ($add == -1)
								{
									$filltab->execute(array(NULL, NULL, $i));
									$fillmatch->execute(array(NULL, NULL, $i));
									$setovertime->execute(array(0, $i));
								}	
							}
							else
							{
								if (isset($tab1) && $tab1 != "" && isset($tab2) && $tab2 != "")
									$filltab->execute(array(NULL, NULL, $i));
								$fillmatch->execute(array(NULL, NULL, $i));
								if (isset($_POST['prolongation' . $i]))
									$setovertime->execute(array(0, $i));
							}
							if (isset($tab1) && $tab1 != "" && isset($tab2) && $tab2 != "")
								$filltab->closeCursor();
						}
					}
					$fillmatch->closeCursor();
					if (isset($_POST['prolongation' . $i]))
						$setovertime->closeCursor();
					$getusers->closeCursor();
					$ispoints->closeCursor();
				}
			}
	}
	
	// Block the bet to keep users from editing their bets
	if (isset($_POST['block_bet' . $i]))
	{
		$state = $bdd->prepare('SELECT available FROM euro_schedule WHERE id = ?');
		$blockbet = $bdd->prepare('UPDATE euro_schedule SET available = ? WHERE id = ?');
		$state->execute(array($i));
		$statedata = $state->fetch();
		if ($statedata['available'] == 1)
			$blockbet->execute(array(0, $i));
		else
			$blockbet->execute(array(1, $i));
		$blockbet->closeCursor();
		$state->closeCursor();
	}
}


// Update the names of the teams that are qualified to go to the huitièmes
for ($i = 37; $i <= 44; $i++)
{
  for ($j = 1; $j <= 2; $j++)
  {
	if (isset($_POST['submit_huitieme' . $i .$j]))
	{
		if (isset($_POST['update_huitieme_team' . $i . $j]) && !empty($_POST['update_huitieme_team' . $i . $j]))
		{
			$idteam = $bdd->prepare('SELECT id FROM euro_team WHERE name = ?');
			$idteam->execute(array($_POST['update_huitieme_team' . $i .$j]));
			$idteamdata = $idteam->fetch();
			if ($j == 1)
			{
				/*$fixbdd = $bdd->prepare('UPDATE brazil_bet SET win = ? WHERE win = ?');
				$fixbdd->execute(array(*/
				$fillwinner = $bdd->prepare('UPDATE euro_schedule SET team1 = ? WHERE id = ?');
				$fillwinner->execute(array($idteamdata['id'], $i));
				$fillwinner->closeCursor();
			}
			else
			{
				$fillwinner = $bdd->prepare('UPDATE euro_schedule SET team2 = ? WHERE id= ?');
				$fillwinner->execute(array($idteamdata['id'], $i));
				$fillwinner->closeCursor();
			}
		}
	}
  }
}

// Update the names of the teams that are qualified to go to the quarter-finals
for ($i = 45; $i <= 48; $i++)
{
  for ($j = 1; $j <= 2; $j++)
  {
	if (isset($_POST['submit_quart' . $i .$j]))
	{
		if (isset($_POST['update_quart_team' . $i . $j]) && !empty($_POST['update_quart_team' . $i . $j]))
		{
			$idteam = $bdd->prepare('SELECT id FROM euro_team WHERE name = ?');
			$idteam->execute(array($_POST['update_quart_team' . $i .$j]));
			$idteamdata = $idteam->fetch();
			if ($j == 1)
			{
				/*$fixbdd = $bdd->prepare('UPDATE brazil_bet SET win = ? WHERE win = ?');
				$fixbdd->execute(array(*/
				$fillwinner = $bdd->prepare('UPDATE euro_schedule SET team1 = ? WHERE id = ?');
				$fillwinner->execute(array($idteamdata['id'], $i));
				$fillwinner->closeCursor();
			}
			else
			{
				$fillwinner = $bdd->prepare('UPDATE euro_schedule SET team2 = ? WHERE id= ?');
				$fillwinner->execute(array($idteamdata['id'], $i));
				$fillwinner->closeCursor();
			}
		}
	}
  }
}

// Update the names of the teams that are qualified to go to the semi-finals
for ($i = 49; $i <= 50; $i++)
{
  for ($j = 1; $j <= 2; $j++)
  {
	if (isset($_POST['submit_demi' . $i .$j]))
	{
		if (isset($_POST['update_demi_team' . $i . $j]) && !empty($_POST['update_demi_team' . $i . $j]))
		{
			$idteam = $bdd->prepare('SELECT id FROM euro_team WHERE name = ?');
			$idteam->execute(array($_POST['update_demi_team' . $i .$j]));
			$idteamdata = $idteam->fetch();
			if ($j == 1)
			{
				/*$fixbdd = $bdd->prepare('UPDATE brazil_bet SET win = ? WHERE win = ?');
				$fixbdd->execute(array(*/
				$fillwinner = $bdd->prepare('UPDATE euro_schedule SET team1 = ? WHERE id = ?');
				$fillwinner->execute(array($idteamdata['id'], $i));
				$fillwinner->closeCursor();
			}
			else
			{
				$fillwinner = $bdd->prepare('UPDATE euro_schedule SET team2 = ? WHERE id= ?');
				$fillwinner->execute(array($idteamdata['id'], $i));
				$fillwinner->closeCursor();
			}
		}
	}
  }
}

// Update the names of the teams that are qualified to go to the final
if (isset($_POST['submit_finale511']))
{
	if (isset($_POST['update_finale_team511']) && !empty($_POST['update_finale_team511']))
	{
		$idteam = $bdd->prepare('SELECT id FROM euro_team WHERE name = ?');
		$idteam->execute(array($_POST['update_finale_team511']));
		$idteamdata = $idteam->fetch();
		$fillwinner = $bdd->prepare('UPDATE euro_schedule SET team1 = ? WHERE id = 51');
		$fillwinner->execute(array($idteamdata['id']));
		$fillwinner->closeCursor();
	}
}

if (isset($_POST['submit_finale512']))
{
	if (isset($_POST['update_finale_team512']) && !empty($_POST['update_finale_team512']))
	{
		$idteam = $bdd->prepare('SELECT id FROM euro_team WHERE name = ?');
		$idteam->execute(array($_POST['update_finale_team512']));
		$idteamdata = $idteam->fetch();
		$fillwinner = $bdd->prepare('UPDATE euro_schedule SET team2 = ? WHERE id = 51');
		$fillwinner->execute(array($idteamdata['id']));
		$fillwinner->closeCursor();
	}
}

// Delete the users from the database when clicking on delete associated to the user and confirming it
$userdelete = $bdd->query('SELECT username FROM euro_user');
while ($userdeletedata = $userdelete->fetch())
{
	if (isset($_POST['submit_delete_user_' . $userdeletedata['username']]))
	{
		$delete = $bdd->prepare('DELETE FROM euro_user WHERE username = ?');
		$delete->execute(array($_POST['delete_' . $userdeletedata['username']]));
		$delete->closeCursor();
	}
}
$userdelete->closeCursor();
?>
<?php

// Getting the teams ordered by group and in each group by points to set the ranking of the team in the group
$result = $bdd->query('SELECT * FROM euro_team ORDER BY euro_team.group ASC, points DESC, id ASC');
// Loop to display all information about the teams
$i = 1;
while ($data = $result->fetch())
    {
		if ($i == 1 || $i == 5 || $i == 9 || $i == 13 || $i == 17 || $i == 21 || $i == 25 || $i == 29)
			echo "<h2 class=\"h3-like\">Groupe ". $data['group'] ."</h2><div class=\"autogrid4\">";
		?>
		
		<div class="<?php echo $data['group']; ?>">
<table class="striped alternate">
<caption id="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></caption>
<tbody>
		<tr>
		<th><img src="<?php echo $data['flag'];?>" alt="<?php echo $data['name'];?>" width="48" height="48"></th>
		<td><a id="lightbox_<?php echo str_replace(" ", "", strtolower($data['name']));?>" href="#lb_<?php echo str_replace(" ", "", strtolower($data['name']));?>">
		Infos Equipe</a>
		
		<!-- Setting the lightbox for each team available if we click on the name of the team -->
		<div style="display: none;">
		<div id="lb_<?php echo str_replace(" ", "", strtolower($data['name']));?>" class="lbstyle">
		<h2 class="h3-like"><?php echo $data['name']; ?></h2>
			<p><strong>Coach : </strong><?php echo $data['coach']; ?></p>
			<p><strong>Palmarès Mondial 2010 : </strong><?php echo $data['previous']; ?></p>
			<?php
			
				$winner = $bdd->prepare('SELECT * FROM euro_previouswinners WHERE winner = ?');
				$winner->execute(array($data['name']));
				if ($winner->rowCount() == 0)
						echo "<p><strong>N'a jamais gagné cette compétition</strong></p>";
				else
				{
					echo "<p><strong>Vainqueur en : </strong>";
					while ($winnerdata = $winner->fetch())
					{
						
						 echo $winnerdata['year'] . "  ";
					}
					echo "</p>";
				}
			?>
			<h3>Liste des 23 joueurs</h3>
			
			<table class="striped alternate infoteam">
				<tbody>
				<tr><th>Gardiens</th></tr>
						<tr>
						<td>
						<?php $gardiens = $bdd->prepare('SELECT name FROM brazil_player WHERE team_id = ? AND poste = \'Gardien\'');
							$gardiens->execute(array($data['id']));
							while ($gardiensdata = $gardiens->fetch())
							{
								echo $gardiensdata['name'] . " - ";
							}
							$gardiens->closeCursor();
							?>
						</td></tr>
				<tr><th>Défenseurs</th></tr>
						<tr>
						<td>
						<?php $defenseurs = $bdd->prepare('SELECT name FROM brazil_player WHERE team_id = ? AND poste = \'Défenseur\'');
							$defenseurs->execute(array($data['id']));
							while ($defenseursdata = $defenseurs->fetch())
							{
								echo $defenseursdata['name'] . " - ";
							}
							$defenseurs->closeCursor();
							?>
						</td></tr>
				<tr><th>Milieux</th></tr>
						<tr>
						<td>
						<?php $milieux = $bdd->prepare('SELECT name FROM brazil_player WHERE team_id = ? AND poste = \'Milieu\'');
							$milieux->execute(array($data['id']));
							while ($milieuxdata = $milieux->fetch())
							{
								echo $milieuxdata['name'] . " - ";
							}
							$milieux->closeCursor();
							?>
						</td></tr>
				<tr><th>Attaquants</th></tr>
						<tr>
						<td>
						<?php $attaquants = $bdd->prepare('SELECT name FROM brazil_player WHERE team_id = ? AND poste = \'Attaquant\'');
							$attaquants->execute(array($data['id']));
							while ($attaquantsdata = $attaquants->fetch())
							{
								echo $attaquantsdata['name'] . " - ";
							}
							$attaquants->closeCursor();
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		</div>
		<!-- End Setting the lightbox for each team available if we click on the name of the team -->
		</td></tr>
		<tr><th>Classt FIFA</th><td class="bigger"><?php echo $data['successrate']; ?></td></tr>
		<tr><th>Points</th><td class="bigger"><?php echo $data['points']; ?></td></tr>
		</tbody></table></div>
		<?php
		if ($i == 4 || $i == 8 || $i == 12 || $i == 16 || $i == 20 || $i == 24 || $i == 28 || $i == 32)
		echo "</div><p class=\"up\"><a class=\"icon-up\" href=\"#container\">&nbsp;Haut de page</a></p>";
		$i++;
		$winner->closeCursor();
    }
    $result->closeCursor();
?>

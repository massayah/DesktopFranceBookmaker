<?php

// get all the matches of the Euro with the stadiums and the date (with obtaining all fields of the date)
$result = $bdd->query('SELECT *, MONTHNAME(date) as month, DAY(date) as day, HOUR(date) as hour,
					   MINUTE(date) as minute FROM euro_schedule JOIN euro_stadium ON euro_schedule.stadium_id = euro_stadium.id ORDER BY euro_schedule.id');
				   
					   
// Loop to go through all the matches in chronological order and display the information about each match
$i = 1;
while ($data = $result->fetch())
    {
	//$stadium = $bdd->prepare('SELECT * FROM stadium WHERE id = ?');
	//$stadium->execute(array($data['stadium_id']));
	//$stadiumdata = $stadium->fetch();
	
	if ($i == 1)
		echo "
		<h2 id=\"schedule-poule1\">Premiers Matchs de Poule</h2>";
	if ($i == 17)
		echo "<h2 id=\"schedule-poule2\">Deuxièmes Matchs de Poule</h2>";
	if ($i == 33)
		echo "<h2 id=\"schedule-poule3\">Troisièmes Matchs de Poule</h2>";
	if ($i == 49)
	      echo "<h2 class=\"schedule-marge\" id=\"schedule-huits\">Huitièmes de finale</h2>";
	if ($i == 57)
		echo "<h2 class=\"schedule-marge\" id=\"schedule-quarts\">Quarts de finale</h2>";
	if ($i == 61)
		echo "<h2 class=\"schedule-marge\" id=\"schedule-demis\">Demi-finales</h2>";
	if ($i % 2 == 1)
	echo "<div class=\"autogrid2\" id=\"schedule-finales\">";
	if ($i == 63)
		echo "<div><h2 class=\"schedule-marge\" >Petite Finale</h2>";
	if ($i == 64)
		echo "<div class=\"matchfinale\"><h2 class=\"schedule-marge\">Finale</h2>";
	?>
	<table class="striped alternate">
	<?php 
	if ($i < 49){
	?>
<caption>Groupe <?php echo $data['group'];?></caption><?php } ?>
<tbody>
<tr>
<th><?php echo $data['team1'];?> - <?php echo $data['team2'];?></th><td><p class="date_fight"><?php echo $data['day']; if ($data['month'] == "June") echo " Juin"; else if ($data['day'] == "1" && $data['month'] == "July") echo "er Juillet"; else echo " Juillet";
	?>
	<br><?php echo $data['hour'] . ":";
	if ($data['minute'] < 10)
		echo "0";
	echo $data['minute']; ?>
	</p></td>
</tr>
<tr>
<th>Stade</th><td><?php echo $data['stadium'];?><br><?php echo $data['city'];?></td>
</tr>
<tr>
<th>Résultat</th><td><?php 
		if ($data['team1result'] != NULL && $data['team2result'] != NULL)
		{
			echo "<p class=\"match_result\">" . $data['team1result'] . " - " . $data['team2result'];
			if ($data['overtime'] == 1)
				echo " (a.p.)";
			echo "</p>";
			if ($data['team1penalty'] != NULL && $data['team2penalty'] != NULL)
				echo "<p class=\"match_result\">t.a.b. : " . $data['team1penalty'] . " - " . $data['team2penalty'] . "</p>";	
		}
		else
		{
	?>
	<p class="bet_button"><a href="bet.php#bet_<?php if ($i <= 16) echo "firstmatch"; else if ($i > 16 && $i <= 32) echo "secondmatch";
	else if ($i > 32 && $i <= 48) echo "thirdmatch"; else if ($i > 48 && $i <= 56) echo "huitiemes"; else if ($i > 56 && $i <= 60) 
	echo "quarts"; else if ($i > 60 && $i <= 62) echo "demies"; else if ($i == 63) echo "petitefinale"; else echo "finale";?>">Parier</a></p>
	<?php
	}
	?>
	</td>
</tr>
</tbody>
</table>
	
	<?php
	
	if ($i == 63 || $i == 64)
	echo "</div><!--fin autogrid finale-->";
	if ($i % 2 == 0)
	echo "</div><!--fin autogrid2-->";
	if ($i == 16 || $i == 32 || $i == 48 || $i == 56 || $i == 60 ||$i == 62 || $i == 64)
	{
		echo "<p class=\"up\"><a class=\"icon-up\" href=\"#container\">&nbsp;Haut de page</a></p>";
	}
	$i++;
	//$stadium->closeCursor();
    }
    
    $result->closeCursor();
?>

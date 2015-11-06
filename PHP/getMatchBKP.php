<?php

// get all the matches of the Euro with the stadiums and the date (with obtaining all fields of the date)
$result = $bdd->query('SELECT *, MONTHNAME(date) as month, DAY(date) as day, HOUR(date) as hour,
					   MINUTE(date) as minute FROM brazil_schedule ORDER BY id');

// Loop to go through all the matches in chronological order and display the information about each match
$i = 1;
while ($data = $result->fetch())
    {
	//$stadium = $bdd->prepare('SELECT * FROM stadium WHERE id = ?');
	//$stadium->execute(array($data['stadium_id']));
	//$stadiumdata = $stadium->fetch();
	if ($i == 1)
		echo "
		<h2 class=\"h3-like\">Matchs de poule</h2>
		<h2 class=\"h3-like\">Premier Match</h2>
		<div id=\"firstmatch\">";
	if ($i == 17)
		echo "<div class=\"clear\" id=\"secondmatch\">
			<h2 class=\"clear\">Deuxième Match</h2>";
	if ($i == 33)
		echo "<div class=\"clear\" id=\"thirdmatch\">
			<h2 class=\"clear\">Troisième Match</h2>";
	if ($i == 49)
	      echo "<div id=\"huitiemefinal\">
			<h1 class=\"clear\">Huitièmes de finale</h1>
			<div><span>Huitième de finale 1</span><br>";
	if ($i == 50)
		echo "<div><span>Huitième de finale 2</span><br>";
	if ($i == 51)
		echo "<div><span>Huitième de finale 3</span><br>";
	if ($i == 52)
		echo "<div><span>Huitième de finale 4</span><br>";
	if ($i == 53)
		echo "<div><span>Huitième de finale 5</span><br>";
	if ($i == 54)
		echo "<div><span>Huitième de finale 6</span><br>";
	if ($i == 55)
		echo "<div><span>Huitième de finale 7</span><br>";
	if ($i == 56)
		echo "<div><span>Huitième de finale 8</span><br>";
	if ($i == 57)
		echo "<div id=\"quarterfinal\">
			<h1 class=\"clear\">Quarts de finale</h1>
			<div><span>Quart de finale 1</span><br>";
	if ($i == 58)
		echo "<div><span>Quart de finale 2</span><br>";
	if ($i == 59)
		echo "<div><span>Quart de finale 3</span><br>";
	if ($i == 60)
		echo "<div><span>Quart de finale 4</span><br>";
	if ($i == 61)
		echo "<div id=\"semifinal\">
			<h1 class=\"clear\">Demi-finales</h1>
            <div><span>Demi-finale 1</span><br>";
	if ($i == 62)
		echo "<div><span>Demi-finale 2</span><br>";
	if ($i == 63)
		echo "<div id=\"smallfinal\">
			<h1 class=\"clear\">Petite Finale</h1><div>";
	if ($i == 64)
		echo "<div id=\"final\">
			<h1 class=\"clear\">Finale</h1><div>";
	if ($i < 33 && ($data['group'] == "A" || $data['group'] == "C"))
		echo "<div>";
	if ($i < 33 && ($data['group'] == 'B' || $data['group'] == "D"))
		echo "<div>";
	?>
	<p class="fight"><?php echo $data['team1'];?><br>VS<br>
	<?php echo $data['team2']; ?></p>
	<p class="date_fight"><?php echo $data['day']; if ($data['month'] == "June") echo " Juin"; else echo "er Juillet";
	?>
	<br><?php echo $data['hour'] . ":";
	if ($data['minute'] < 10)
		echo "0";
	echo $data['minute']; ?>
	</p>
	
	<?php 
		if ($data['team1result'] != NULL && $data['team2result'] != NULL)
		{
			echo "<p class=\"match_result\">" . $data['team1result'] . " - " . $data['team2result'];
			if ($data['overtime'] == 1)
				echo " (a.p.)";
			echo "</p>";
			if ($data['team1penalty'] != NULL && $data['team2penalty'] != NULL)
				echo "<p class=\"match_result\">t.a.b. : " . $data['team1penalty'] . " - " . $data['team2penalty'] . "</p>";	
			echo "</div>";
		}
		else
		{
	?>
	<p class="bet_button"><a href="bet.php#bet_<?php if ($i <= 8) echo "#first_match"; else if ($i > 8 && $i <= 16) echo "second_match";
	else if ($i > 16 && $i <= 24) echo "third_match"; else if ($i > 24 && $i <= 28) echo "quarter_finals"; else if ($i > 28 && $i <= 30) 
	echo "semi_finals"; else echo "final";?>">Parier</a></p>
    </div>
	<?php
	}
	if ($i == 16 || $i == 32 || $i == 48 || $i == 56 || $i == 60 ||$i == 62 || $i == 63 || $i == 64)
	{
		echo "</div><p class=\"up\"><a class=\"icon-up\" href=\"#container\">&nbsp;Haut de page</a></p>";
	}
	$i++;
	//$stadium->closeCursor();
    }
    
    $result->closeCursor();
?>

<?php
$result = $bdd->query('SELECT * FROM euro_team ORDER BY euro_team.name ASC, id ASC');
// Loop to display all information about the teams

while ($data = $result->fetch())
    {
    ?>
<a href="#<?php echo $data['name']; ?>"><?php echo $data['name']; ?></a>
<?php }
?>
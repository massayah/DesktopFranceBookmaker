<!-- Using PHP to display the menu and show the page the user is currently in with CSS -->
<?php
        $array_menu_link = array( "index.php", "top.php", "bet1.php", "bet2.php", "ranking.php", "contact.php", "http://assayah.com/Discussion" );
        $array_menu_content = array( "Accueil", "Top 4", "Poules", "Finales", "Points", "Contact", "Discussion" );
        
        $info = pathinfo($_SERVER['PHP_SELF']);
        echo "\n<div id=\"menu\" class=\"mw1140p center\">\n<nav id=\"navigation\" role=\"navigation\">\n";
        foreach($array_menu_link as $key=>$link)
        {
            echo "<a class=\"";
            if( $info['basename'] == $link )
                echo " current";
                
            echo "\" href=\"" . $link . "\">" . $array_menu_content[$key] . "</a>\n";
        }
        
        echo "</nav>\n</div>";
?>
<!-- End Using PHP to display the menu and show the page the user is currently in with CSS -->

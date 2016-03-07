<?php
$menu_data = array(
    'Accueil' => 'index.php',
    'Transfusion' => 'transfusion.php',
    'Contact' => 'contact.php',
    'Inscription' => 'inscription.php',
    'Cellule' => 'cellule.php',

    'Historique Mission' => 'historique_mission.php',
    'Don De Sang' => 'dondesang.php',


);
?>


<ul id="menu">
    <?php
    foreach($menu_data as $name => $link) {
        echo "<li><a href=\"$link\">$name</a></li>";
    }
    ?>
</ul>
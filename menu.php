<?php

function menu() {
    $menustr  = '<span style="color:black;font-weight:bold; padding:150px;">';
    $menustr .= '<a href="csapat.php">Csapatok</a>';
    $menustr .= '</span>';
    $menustr .= '<span style="color:black;font-weight:bold; padding:150px;">';
    $menustr .= '<a href="sportolo.php">Sportolók</a>';
    $menustr .= '</span>';
    $menustr .= '<span style="color:black;font-weight:bold; padding:150px;">';
    $menustr .= '<a href="liga.php">Ligák</a>';
    $menustr .= '</span>';
    $menustr .= '<span style="color:black;font-weight:bold; padding:150px;">';
    $menustr .= '<a href="meccs.php">Meccsek</a>';
    $menustr .= '</span>';
    $menustr .= '<span style="color:black;font-weight:bold; padding:150px;">';
    $menustr .= '<a href="laligacsapatok.php">LaLiga csapatok</a>';
    $menustr .= '</span>';
    
    return $menustr;
}

?>

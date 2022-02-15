<?php

echo '<h1>Stats Insee</h1>';

// CHEMIN ABSOLU DU FICHIER
$path = './data/valeurs_mensuelles.csv';

// OUVERTURE DU FICHIER SOUS FORME D'ARRAY
$fichier2 = file($path);
// var_dump($fichier2);

// PARSING DU TABLEAU
$tableau = '<table style = "text-align:center">';
$tabHead = '<thead>';
$tabBody = '<tbody>';

for($i = 0; $i < count($fichier2); $i++){
    $test = explode(';', str_replace([' - ', '"'], ['<br />',""],$fichier2[$i]));

    if ($i == 0){
        $tabHead .='<tr>';
        foreach($test as $cell){
            $tabHead .='<th>' . $cell . '</th>';
        }
        $tabHead .='</tr>';
    }
    elseif ($i > 4){
        $tabBody .='<tr>';
        foreach($test as $cell){
            $tabBody .='<td>' . $cell . '</td>';
        }
        $tabBody .='</tr>';
    }
}

$tabHead .= '</thead>';
$tabBody .= '</tbody>';
$tableau .= $tabHead . $tabBody .'</table>';

echo $tableau;

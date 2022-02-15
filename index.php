<?php

echo '<h1>Stats Insee</h1>';

/**
 * Affichage d'un tableau depuis un fichier .csv
 *
 * @param string $fichier path du fichier à ouvrir
 * @param integer $ligneEntete ligne contenant l'en-tête du tableau
 * @param integer $ligneDepart première ligne contenant les données à afficher
 * @return void
 */
function createTab(string $fichier , int $ligneEntete, int $ligneDepart){
    // OUVERTURE DU FICHIER SOUS FORME D'ARRAY
    $fichier2 = file($fichier);

    // OUVERTURE TABLEAU
    $tableau = '<table style = "text-align:center">';
    $tabHead = '<thead>';
    $tabBody = '<tbody>';

    // PARSING DU TABLEAU
    for($i = 0; $i < count($fichier2); $i++){
        $test = explode(';', str_replace([' - ', '"'], ['<br />',""],$fichier2[$i]));

        if ($i == $ligneEntete){
            $tabHead .='<tr>';
            foreach($test as $cell){
                $tabHead .='<th>' . $cell . '</th>';
            }
            $tabHead .='</tr>';
        }
        elseif ($i > $ligneDepart){
            $tabBody .='<tr>';
            foreach($test as $cell){
                $tabBody .='<td>' . $cell . '</td>';
            }
            $tabBody .='</tr>';
        }
    }
    // FERMETURE TABLEAU
    $tabHead .= '</thead>';
    $tabBody .= '</tbody>';
    $tableau .= $tabHead . $tabBody .'</table>';

    echo $tableau;
}

// CHEMIN ABSOLU DU FICHIER
$path = './data/valeurs_mensuelles.csv';

createTab($path, 0, 4);
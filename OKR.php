<?php
function createTable(int $k, int $min, int $max, array $colors) : string
{

    $table = '<table style="border-collapse: collapse; width: 100%;">';
    $table .= '<tr>';
    $table .= '<th style="border: 1px solid black; padding: 8px;">Номер</th>';
    $table .= '<th style="border: 1px solid black; padding: 8px;" colspan="1">Число</th>';
    $table .= '</tr>';

    for ($i = 1; $i <= $k; $i++) {
        $colorIx = ($i - 1) % 3; 
        $BgColor = $colors[$colorIx];

        $RandN = rand($min, $max);

        $table .= '<tr style="background-color: ' . $BgColor . ';">';
        $table .= '<td style="border: 1px solid black; padding: 8px;">' . $i . '</td>';
        $table .= '<td style="border: 1px solid black; padding: 8px;">' . $RandN . '</td>';
        $table .= '</tr>';
    }

    $table .= '</table>';

    return $table;
}



echo createTable(5, 1, 50, array('red','yellow','green'));

?>

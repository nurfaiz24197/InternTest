<!--  
     MUHAMAMAD NUR FAIZ BIN MOHAMAD TARMIZI 
     970124145111
-->
<?php
function genTable($energykWh, $currentRate)
{
    $hourInDay = 24;
    $table = '';
    for ($i = 0; $i < $hourInDay; $i++) {
        $hour = $i + 1;
        $energy = $energykWh * $hour;
        $total = round($energy * ($currentRate / 100), 2);

        $table .= '<tr>';
        $table .= '<td class="fw-bold">' . ($i + 1) . '</td>';
        $table .= '<td>' . $hour . '</td>';
        $table .= '<td>' . $energy . '</td>';
        $table .= '<td>' . $total . '</td>';
        $table .= '</tr>';
    }
    return $table;
}

function calculate($voltageV, $currentA, $currentRate)
{
    $power = $voltageV * $currentA / 1000;
    $rateRM = $currentRate / 100;

    $_SESSION["energyWh"] = $power;
    $_SESSION["rateRM"] = $rateRM;

    return;
}
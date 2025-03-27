<?php
    //1
    $x = (integer)rand(-10,10) + 1;
    $color = "red";
    if ($x == 0) {
        $color = "yellow";
    } else  if ($x > 0){
        $color = "green";
    }
    echo "<p style=\"color: $color;\">$x</p>";
    //2 и 3
    $a = (integer)rand(-10,10) + 1; echo "Числа: $a ";
    $b = (integer)rand(-10,10) + 1; echo "$b ";
    $c = (integer)rand(-10,10) + 1; echo "$c ";
    $d = (integer)rand(-10,10) + 1; echo "$d";
    $max = 0;
    $max2 = 0;
    $min = $a;
    if ($a > $b) {
        if ($a > $c) {
            $max = $a;
        }
        else { $max = $c; }
    }
    else { 
        if ($b > $c) 
        { $max = $b; } 
        else { $max = $c; } 
    }
    
    if ($a < $b) {
        if ($a < $c) {
            $min = $a;
        }
        else { $min = $c; }
    }
    else { 
        if ($b < $c) 
        { $min = $b; } 
        else { $min = $c; } 
    }
    echo "<p>Макс (из первых трёх): $max</p>";
    echo "<p>Мин (из первых трёх): $min</p>";
    echo 'Sum: '.$max+$min;
    
    if ($b > $max2) {
        $max2 = $b;
    }
    if ($c > $max2) {
        $max2 = $c;
    }
    if ($d > $max2) {
        $max2 = $d;
    }
    echo "<p>Макс (из четырёх): $max2</p>";

    // 4
?>

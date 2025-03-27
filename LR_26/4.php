<?php
function My_func() {
    static $a = 0;
    $a++;
    return $a;
}
for ($i = 0; $i < 5; $i++) echo My_func();

function &ref() {
    $a = 5;
    $b = 3; 
    if ($a > $b) return $a;
    else return $b;
}
$c = &ref();
echo $c; // Выводит 5

function A($i) { echo "a $i"; } 
function B($i) { echo "b $i"; } 
function C($i) { echo "c $i"; } 
$F = "A"; 
$F(10); 

function f($max) { 
    $i = 0; 
    $n = 1; 
    yield $n; 
    while (true) { 
        $temp = $n; 
        $n += $i; 
        $i = $temp; 
        if ($n > $max) return; 
        yield $n; 
    } 
}
foreach (f(1000) as $num) { 
    echo $num, '<br>'; 
}

function recursion($x) {
    if (is_array($x)) {
        foreach ($x as $value) recursion($value);
    } else {
        echo $x, '<br />';
    }
    return;
}
$x = array(
    array('Сервер' => 'Apache', 'Язык программирования' => 'PHP', 'СУБД' => 'MySQL'),
    array(1, 2), 
    array(7, 3, 2)
);
recursion($x);

$a = 5;
$b = function($x) use ($a) { }; 

$array1 = [1, 2, 3, 4, 5]; 
$array2 = $array1; 
$array3 = $array1;

function sqr(&$x) {
    $x = $x * $x;
}
array_walk($array1, 'sqr');
var_dump($array1);

array_walk($array2, function(&$x) {$x = $x * $x;});
var_dump($array2);

$sqr = function (&$x) {
    $x = $x * $x;
};
array_walk($array3, $sqr);
var_dump($array3);

$a = 5;
$b = fn($x) => $x + $a; // возвращает $x + 5
?>


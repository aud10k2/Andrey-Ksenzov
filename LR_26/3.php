<?php
function sum()//без аргументов
{
 $args = func_get_args();//массив переданных данных
 $s = 0;
 foreach ($args as $a) {
 if (is_numeric($a))
 $s += $a;
 else
 return 'Нечисловые данные';
 }
 return $s;
}
$x=sum(3, 5, 7);
echo $x,'<br>';
$x=sum('38 попугаев', 5);
echo $x;
?>
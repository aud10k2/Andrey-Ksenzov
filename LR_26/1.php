<?php
function sum($a, $b)
{
 if (is_numeric($a) && is_numeric($b))
 return $a+$b;
 else
 return 'Нечисловые данные';
}
$x=sum(3,5);
echo $x,'<br />';
$x=sum('38 попугаев', 5);
echo $x;
?>
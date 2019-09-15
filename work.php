<?php
$start = microtime(true);
if (isset($_GET['x'])) $x = fix_string($_GET['x']);
if (isset($_GET['y'])) $y = fix_string($_GET['y']);
if (isset($_GET['r'])) $r = fix_string($_GET['r']);
$check = false;
$fail = "";
$y = preg_replace("/,/", ".", $y);
if (!(($x == -5) || ($x == -4) || ($x == -3) || ($x == -2) || ($x == -1) || ($x == -0)
    || ($x == 1) || ($x == 2) || ($x == 3))) $fail .= "Некорректное значение X\n";
elseif ($y<-3 || $y>5 || is_nan($y)) $fail .= "Некорректное значение Y\n";
elseif (!(($r == 1) || ($r == 1.5) || ($r == 2) || ($r == 2.5) || ($r == 3))) $fail .= "Некорректное значение R";
if ($fail != "") die($fail);
if ($x>=0 && $x<=$r/2 && $y<=0 && $y>=-$r) $check=true;
elseif ($x<=0 && $y<=0 && $y>=-($x+$r)/2) $check=true;
elseif ($x<=0 && $y>=0 && $y<=sqrt($r*$r/4 - $x*$x)) $check=true;
$finish = microtime(true);
$time = number_format($finish-$start,6);
if ($check){
    echo "<center><b>Результат:</b><br>Точка (" . $x . "; " . $y . ") при r = " . $r . " лежит в заданной области<br>Текущее время: " . date("H:i:s", time() + 3600). "<br> Время выполнения скрипта: ". $time . " с</center>";
}
else {
    echo "<center><b>Результат:</b><br>Точка (" . $x . "; " . $y . ") при r = " . $r . " не лежит в заданной области<br>Текущее время: " . date("H:i:s", time() + 3600). "<br> Время выполнения скрипта: ". $time . " с</center>";
}
function fix_string($string)
{
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
}
?>

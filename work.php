<?php
$start = microtime(true);
if (isset($_GET['x'])) $x = $_GET['x'];
if (isset($_GET['y'])) $y = $_GET['y'];
if (isset($_GET['r'])) $r = $_GET['r'];
$check = false;
$fail = "";
$y = preg_replace("/,/", ".", $y);
if (!(is_numeric($x))) $fail .= "Некорректное значение X\n";
elseif ($y<-3 || $y>5 || !is_numeric($y)) $fail .= "Некорректное значение Y\n";
elseif (!is_numeric($r) || $r < 0) $fail .= "Некорректное значение R";
if ($fail != "") die($fail);
if ($x>=0 && $x<=$r/2 && $y<=0 && $y>=-$r) $check=true;
elseif ($x<=0 && $y<=0 && $y>=-($x+$r)/2) $check=true;
elseif ($x<=0 && $y>=0 && $y<=sqrt($r*$r/4 - $x*$x)) $check=true;
$finish = microtime(true);
$time = number_format($finish-$start,6);

    $dt = new DateTime("now", new DateTimeZone('Europe/Moscow'));

if ($check){
    echo "<center><b>Результат:</b><br>Точка (" . $x . "; " . $y . ") при r = " . $r . " лежит в заданной области<br>Текущее время: " . $dt->format('H:i:s'). "<br> Время выполнения скрипта: ". $time . " с</center>";
}
else {
    echo "<center><b>Результат:</b><br>Точка (" . $x . "; " . $y . ") при r = " . $r . " не лежит в заданной области<br>Текущее время: " . $dt->format('H:i:s'). "<br> Время выполнения скрипта: ". $time . " с</center>";
}

?>

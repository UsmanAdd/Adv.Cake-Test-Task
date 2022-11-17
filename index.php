<?php

require "vendor/autoload.php";
use Classes\StringTools;

$text = "Привет! Давно не виделись.";
$stringTools = new StringTools();
$result = $stringTools->revertCharacters($text);

echo "Исходная строка: ". $text . "\n";
echo "Результат: ". $result;

?>
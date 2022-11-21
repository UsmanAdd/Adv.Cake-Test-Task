<?php

$text = "Привет! Давно не виделись.";
$result = revertCharacters($text);

echo "Исходная строка: ". $text . "\n";
echo "Результат: ". $result;

function revertCharacters(string $text){
    $wordPattern = '/(\W)/mu';
    $upperCasePattern = "/[A-ZА-ЯЁ]/mu";
    $splitText = preg_split($wordPattern, $text, 0, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

    $reverseText = array_map(function ($word) use ($upperCasePattern){
        $result = "";
        $indexArrayOfUpperCases = [];
        preg_match_all('/./mu', $word, $ar);
    
        foreach ($ar[0] as $key => $letter){
            if (preg_match($upperCasePattern, $letter)){
                array_push($indexArrayOfUpperCases, $key);
            }
        }
        
        $ar[0] = array_reverse($ar[0]);
        foreach ($ar[0] as $key => $letter){
            $letter = mb_strtolower($letter);
            if (in_array($key, $indexArrayOfUpperCases)){
                $letter = mb_strtoupper($letter);
            }
            $result .= $letter;
        }

        return $result;
    }, $splitText);

    return join('', $reverseText);
}

?>
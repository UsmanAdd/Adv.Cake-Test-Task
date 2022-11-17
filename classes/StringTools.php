<?php

namespace Classes;

class StringTools {
    public function __construct()
    {
        
    }
    public function revertCharacters(string $text){
        $pattern = '/(\W)/mu';
        $splitText = preg_split($pattern, $text, 0, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

        $reverseText = array_map(function ($word){
            return $this->utf8_strrev($word);
        }, $splitText);

        return join('' ,$reverseText);
    }
    private function utf8_strrev($str){
        $indexArrayOfUpperCases = $this->getIndexArrayOfUpperCase($str);
        
        preg_match_all('/./mu', $str, $ar);
        $reverseString = join('', array_reverse($ar[0]));
        $lowerReverseString = mb_strtolower($reverseString);
        $correctReverseString = $this->strToUpperCaseByIndex($lowerReverseString, $indexArrayOfUpperCases);
        
        return $correctReverseString;
    }
    private function getIndexArrayOfUpperCase($str){
        $indexArrayOfUpperCases = [];
        $pattern = "/[A-ZА-ЯЁ]/mu";
        preg_match_all('/./mu', $str, $ar);
     
        foreach ($ar[0] as $key => $letter){
            if (preg_match($pattern, $letter)){
                array_push($indexArrayOfUpperCases, $key);
            }
        }

        return $indexArrayOfUpperCases;
    }
    private function strToUpperCaseByIndex(string $str, array $indexArray){
        $result = "";
        
        preg_match_all('/./mu', $str, $ar);
        
        foreach ($ar[0] as $key => $letter){
            if (in_array($key, $indexArray)){
                $letter = mb_strtoupper($letter);
            }
            $result .= $letter;
        }
        
        return $result;
    }
}

?>
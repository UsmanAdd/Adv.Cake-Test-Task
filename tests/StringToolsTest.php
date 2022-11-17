<?php

use Classes\StringTools;
use PHPUnit\Framework\TestCase;
class StringToolsTest extends Testcase {
    public function testReverseEmpty(){
        $text = "";
        $stringTools = new StringTools();
        $result = $stringTools->revertCharacters($text);
        $this->assertSame("", $result);
    }
    public function testReverseDot(){
        $text = ".";
        $stringTools = new StringTools();
        $result = $stringTools->revertCharacters($text);
        $this->assertSame(".", $result);
    }
    public function testReverseHello()
    {
        $text = "Hello";
        $stringTools = new StringTools();
        $result = $stringTools->revertCharacters($text);
        $this->assertSame("Olleh", $result);
    }
    public function testReverseWrongHello(){
        $text = "HeLLo";
        $stringTools = new StringTools();
        $result = $stringTools->revertCharacters($text);
        $this->assertSame("OlLEh", $result);
    }
    public function testReverseAcronym(){
        $text = "ГЛОНАСС";
        $stringTools = new StringTools();
        $result = $stringTools->revertCharacters($text);
        $this->assertEquals("ССАНОЛГ", $result);
    }
    
    public function testReversePalindrome(){
        $text = "Я иду с мечем судия";
        $stringTools = new StringTools();
        $result = $stringTools->revertCharacters($text);
        $this->assertEquals("Я уди с мечем яидус", $result);
    }
    public function testReverseText()
    {
        $text = "Привет! Давно не виделись.";
        $stringTools = new StringTools();
        $result = $stringTools->revertCharacters($text);
        $this->assertEquals("Тевирп! Онвад ен ьсиледив.", $result);
    }

}



?>
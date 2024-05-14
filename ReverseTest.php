<?php
use PHPUnit\Framework\TestCase;

require_once 'reverse.php'; // Путь к файлу с функцией reverseLettersInWords

class ReverseTest extends TestCase {
    public function testReverseLettersInWords() {
        // Проверяем базовый случай: обычная строка
        $this->assertEquals("Si 'dlOc' won", reverseLettersInWords("Is 'coLd' now"));
        
        // Проверяем строку с русскими буквами
        $this->assertEquals("отэ «Кат» \"отсорп\"", reverseLettersInWords("это «Так» \"просто\""));
        
        // Проверяем строку с миксом символов и пунктуации
        $this->assertEquals("tac, Амиз: esuOh si 'dloc' won отэ «Кат» \"отсорп\"", reverseLettersInWords("cat, Зима: houSe is 'cold' now это «Так» \"просто\""));
        
        // Проверяем пустую строку
        $this->assertEquals("", reverseLettersInWords(""));
        
        // Проверяем строку, содержащую только пунктуацию
        $this->assertEquals(", . ! ?", reverseLettersInWords(", . ! ?"));
    }
}
?>

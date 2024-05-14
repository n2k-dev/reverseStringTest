<?php
// Функция для реверсирования букв в словах с сохранением регистра и пунктуации
function reverseLettersInWords($string) {
    // Разбиваем строку на массив слов и пунктуации с учетом пробелов
    preg_match_all('/\w+|[^\w\s]+|\s+/u', $string, $matches);

    // Проходимся по каждому элементу (слову, пунктуации или пробелу)
    foreach ($matches[0] as &$item) {
        // Если это слово, переворачиваем порядок букв с сохранением регистра
        if (preg_match('/\w+/u', $item)) {
            // Переворачиваем буквы в слове, сохраняя регистр
            preg_match_all('/./u', $item, $characters);
            $reversedCharacters = array_reverse($characters[0]);
			$reversedWord = '';
            foreach ($characters[0] as $i => $char) {
                if (mb_strtolower($char) === $char) {
                    $reversedWord .= mb_strtolower($reversedCharacters[$i]);
                } else {
                    $reversedWord .= mb_strtoupper($reversedCharacters[$i]);
                }
            }
            $item = $reversedWord;
        }
    }

    // Объединяем слова, пунктуацию и пробелы обратно в строку
    return implode('', $matches[0]);
}



// Проверяем, были ли переданы данные из формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем введенную строку из формы
    $inputString = $_POST["words"];
    
    // Вызываем функцию для реверсирования слов
    $reversedString = reverseLettersInWords($inputString);
    
    // Выводим результат
    echo "<h2>Результат реверсирования:</h2>";
    echo "<p>$reversedString</p>";
}
?>

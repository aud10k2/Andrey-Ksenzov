<?php

$text = "Laravel - это фреймворк для PHP. Он прост в использовании и помогает разрабатывать приложения школьного и коммерческого уровня. Laravel включает различные функции.";

$word = 'Laravel';
$count = substr_count($text, $word);
$textHighlighted = str_replace($word, "<span style='color: red;'>$word</span>", $text);

echo "<h3>Результат задачи 1</h3>";
echo "<p>Слово '$word' встречается $count раз.</p>";
echo "<p>$textHighlighted</p>";

$paragraphs = substr_count($text, '.') + substr_count($text, '!') + substr_count($text, '?') + substr_count($text, "\n");
$sentences = preg_match_all('/[.!?]+/', $text);
$words = str_word_count($text);
$characters = strlen($text);

echo "<h3>Статистика текста</h3>";
echo "<p>Количество абзацев: $paragraphs</p>";
echo "<p>Количество предложений: $sentences</p>";
echo "<p>Количество слов: $words</p>";
echo "<p>Количество символов: $characters</p>";

$wordsArray = preg_split('/\s+/', $text);
$longestWords = [];
$maxLength = 0;

foreach ($wordsArray as $w) {
    $w = preg_replace('/[^a-zA-Zа-яА-Я0-9]+/u', '', $w);
    $length = mb_strlen($w);
    if ($length > $maxLength) {
        $maxLength = $length;
        $longestWords = [$w];
    } elseif ($length === $maxLength) {
        $longestWords[] = $w;
    }
}

echo "<h3>Самые длинные слова</h3>";
echo "<p>" . implode(', ', $longestWords) . "</p>";

$charCount = [];
for ($i = 0; $i < mb_strlen($text); $i++) {
    $char = mb_substr($text, $i, 1);
    if (isset($charCount[$char])) {
        $charCount[$char]++;
    } else {
        $charCount[$char] = 1;
    }
}

ksort($charCount);
echo "<h3>Количество символов</h3>";
foreach ($charCount as $char => $count) {
    echo "<p>'$char' встречается $count раз.</p>";
}

?>
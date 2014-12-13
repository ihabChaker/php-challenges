<?php

$words = file_get_contents("polnoe-esenin.txt");

echo json_encode(array_count_values(str_word_count(mb_strtolower($words), 1, "ёяшертыуиопюъщэжьлкйчгфдсазхцвбнмЁЯШЕРТЫУИОПЮЪЩЭЖЬЛКЙЧГФДСАЗХЦВБНМ…»«–")),JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

?>
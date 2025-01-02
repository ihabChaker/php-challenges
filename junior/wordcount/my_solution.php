<?php
$txt = file_get_contents("polnoe-esenin.txt");
print_r(json_encode(
    array_count_values(str_word_count(mb_strtolower($txt), 2, "ёяшертыуиопюъщэжьлкйчгфдсазхцвбнмЁЯШЕРТЫУИОПЮЪЩЭЖЬЛКЙЧГФДСАЗХЦВБНМ…»«–"))
    ,
    JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
));
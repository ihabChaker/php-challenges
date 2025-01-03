<?php
class YinYang
{
    static function printYinYang(int $start, int $end)
    {
        if ($start > $end) {
            echo "Invalid range bounds provided";
        }
        for ($num = $start; $num <= $end; $num++) {
            $mod3 = $num % 3 === 0;
            $mod5 = $num % 5 === 0;
            if ($mod5 and $mod3) {
                echo "Yin-Yang";
            } elseif ($mod5) {
                echo "Yin";
            } elseif ($mod3) {
                echo "Yang";
            } else {
                echo $num;
            }
        }
    }
}
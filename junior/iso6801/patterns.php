<?php
$months_to_number = [
    "Dec" => "12",
    "Nov" => "11",
    "Oct" => "10",
    "Sep" => "09",
    "Aug" => "08",
    "Jul" => "07",
    "Jun" => "06",
    "May" => "05",
    "Apr" => "04",
    "Mar" => "03",
    "Feb" => "02",
    "Jan" => "01",
];

$four_digits_year = "(\d{4})";
$two_digits_year = "(\d{2})";
$two_digits_day = "(3[0-1]|2[0-9]|1[0-9]|0[0-9])";
$two_digits_month = "(0[1-9]|1[0-2])";
$three_letters_month = "(Dec|Nov|Oct|Sep|Aug|Jul|Jun|May|Apr|Mar|Feb|Jan)";

$pattern1 = "/$two_digits_month#$two_digits_year#$two_digits_day/";
$pattern2 = "/$three_letters_month $two_digits_day, $four_digits_year/";
$pattern3 = "/$two_digits_day\*$two_digits_month\*$four_digits_year/";
$pattern4 = "/$four_digits_year-$two_digits_month-$two_digits_day/";
$pattern5 = "/$two_digits_month\/$two_digits_day\/$two_digits_year/";
$pattern6 = "/$three_letters_month $two_digits_day, $two_digits_year/";

function replace_pattern1(array $match): string
{
    return "20$match[2]-$match[1]-$match[3]";
}
function replace_pattern2(array $match): string
{
    global $months_to_number;
    return "$match[3]-{$months_to_number[$match[1]]}-$match[2]";
}
function replace_pattern3(array $match): string
{
    return "$match[3]-$match[2]-$match[1]";
}
function replace_pattern4(array $match): string
{
    return "$match[1]-$match[2]-$match[3]";
}
function replace_pattern5(array $match): string
{
    return "20$match[3]-$match[1]-$match[2]";
}

function replace_pattern6(array $match): string
{
    global $months_to_number;
    return "20$match[3]-{$months_to_number[$match[1]]}-$match[2]";
}
$pattern_callback = [
    $pattern1 => "replace_pattern1",
    $pattern2 => "replace_pattern2",
    $pattern3 => "replace_pattern3",
    $pattern4 => "replace_pattern4",
    $pattern5 => "replace_pattern5",
    $pattern6 => "replace_pattern6",
];
function convert_date_to_ISO6801($date): string
{
    global $pattern_callback;
    return preg_replace_callback_array($pattern_callback, $date);
}
?>
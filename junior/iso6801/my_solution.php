<?php
include_once("./patterns.php");
$unfomatted_dates = file("date-input.txt");
$output_file = fopen("date-output.txt", "w");
foreach ($unfomatted_dates as $_ => $unfomatted_date) {
    fwrite($output_file, convert_date_to_ISO6801($unfomatted_date));
}
fclose($output_file);
?>
<?php
require_once('/home/skampjes1/data/connect.php');
$con = db_connect();

$all_races = "";

$sql = "SELECT * FROM ffxiv_character_populations";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $race = $row['race'];
    $d2020 = $row['2020'];
    $d2021 = $row['2021'];
    $d2022 = $row['2022'];
    $d2023 = $row['2023'];
    $d2024 = $row['2024'];

    $data = "\"$race\": {";
    $data .= "\nlabel: \"$race\", ";
    $data .= "\ndata: [ ";
    $data .= "[2020, $d2020], ";
    $data .= "[2021, $d2021], ";
    $data .= "[2022, $d2022], ";
    $data .= "[2023, $d2023], ";
    $data .= "[2024, $d2024]";
    $data .= " ] },";

    $all_races .= $data;
}

echo trim($all_races, ",");

db_disconnect($con);
?>

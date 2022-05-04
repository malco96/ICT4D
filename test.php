<?php
# $ php -f test.php


//get data passed from Voice Browser

$dbname = 'heroku_8f7ce219fb9f347';
$dbuser = 'b342abd3b38c6a';
$dbpass = 'cbea95c2';
$dbhost = 'eu-cdbr-west-02.cleardb.net';

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$test_query = "SELECT * FROM farmer_information";

$result = mysqli_query($link, $test_query);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["farmer_id"]. " - Name: " . $row["name"]. " " . $row["adress"];
    }
} else {
    echo "0 results";
}
$link->close();
?>

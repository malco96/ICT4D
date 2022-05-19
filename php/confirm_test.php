<?php
# $ php -f test.php

$dbname = 'heroku_8f7ce219fb9f347';
$dbuser = 'b342abd3b38c6a';
$dbpass = 'cbea95c2';
$dbhost = 'eu-cdbr-west-02.cleardb.net';

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$user = $_GET['farmer_id'];

$test_query = "UPDATE appointment_information SET appointment_status='confirmed' WHERE farmer_id = '$user' ";

// Turn autocommit off
$link -> autocommit(FALSE);

$link -> query($test_query);

// Commit transaction
if (!$link -> commit()) {
  echo "Commit transaction failed";
  exit();
}

$link->close();
?>
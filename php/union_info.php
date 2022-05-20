<?php

$dbname = 'heroku_8f7ce219fb9f347';
$dbuser = 'b342abd3b38c6a';
$dbpass = 'cbea95c2';
$dbhost = 'eu-cdbr-west-02.cleardb.net';

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$test_query = "SELECT union_name, union_adress, union_phoneNR FROM union_information";

$result = mysqli_query($link, $test_query);

if (mysqli_num_rows($result) > 0) {
    header('Content-Type: application/xml');
    $row = mysqli_fetch_assoc($result);
    $unionname = $row["union_name"];
    $unionaddress = $row["union_adress"];
    $unionnr = $row["union_phoneNR"];
    $pass_address = '
        <vxml version = "2.1">
        <form>
            <block>
                <prompt>' . $unionname . ' '. $unionaddress. ' ' . $unionnr. '</prompt>
            </block>
        </form>
        </vxml>';
        print ($pass_address);
} else {
    echo "0 results";
}
$link->close();
?>

<?php

$dbname = 'heroku_8f7ce219fb9f347';
$dbuser = 'b342abd3b38c6a';
$dbpass = 'cbea95c2';
$dbhost = 'eu-cdbr-west-02.cleardb.net';

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$test_query = "SELECT certification_id, seed_category, label_color, species, variety, reference, lot_weight, number_of_bags, weight_of_bags, number_of_tags FROM certification_information";

$result = mysqli_query($link, $test_query);

if (mysqli_num_rows($result) > 0) {
    header('Content-Type: application/xml');
    $kilogramme = "http://webhosting.voxeo.net/208163/www/recs/kg.fr.wav"; 
    $row = mysqli_fetch_assoc($result);
    $certification_id = $row["certification_id"];
    $seed_category = $row["seed_category"];
    $label_color = $row["label_color"];
    $species = $row["species"];
    $variety = $row["variety"];
    $reference = $row["reference"];
    $lot_weight = $row["lot_weight"];
    $number_of_bags = $row["number_of_bags"];
    $weight_of_bags = $row["weight_of_bags"];
    $number_of_tags = $row["number_of_tags"];
    $pass_address = '
        <vxml version = "2.1">
        <form>
            <block>
                <prompt xml:lang="fr-fr">
                '. 'The certification ID is:' . ' ' . $certification_id . ',' . 
                ' ' . 'The seed category is:'. ' ' . $seed_category . ',' . 
                ' ' . 'The label color is:' . ' ' . $label_color . ',' . 
                ' ' . 'The species is:' . ' ' . $species . ',' . 
                ' ' . 'The variety is:' . ' ' . $variety . ',' . 
                ' ' . 'The reference is:' . ' ' . $reference . ',' . 
                ' ' . 'The lot weight is:'. ' ' . $lot_weight . ' ' . 'kilogramme' . ',' . 
                ' ' . 'The number of bags is:'. ' ' . $number_of_bags . ',' . 
                ' ' . 'The weight of the bags is:'. ' ' . $weight_of_bags . ' ' . 'kilogramme' . ',' . 
                ' ' . 'The number of tags is:'. ' ' . $number_of_tags . '
                </prompt>
            </block>
        </form>
        </vxml>';
        print ($pass_address);
} else {
    echo "0 results";
}
$link->close();
?> 

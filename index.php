<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

//connect to MYSQL database
#$con = mysql_connect("eu-cdbr-west-02.cleardb.net","b342abd3b38c6a","cbea95c2");
if (!$conn)
{
die('Could not connect: ' . mysql_error());
}
echo "The connection is established";

//open the specific database
mysql_select_db("heroku_8f7ce219fb9f347", $conn);

//insert data into the specific table
// $sql = "INSERT INTO eAfrica(ID, user, product, quantity, price, duration, date) VALUES ('$id','$user','$product', $quantity, $price, $duration, Now())";

//sanity check
if (!mysql_query($sql,$conn))
{
die('Error: ' . mysql_error());
}

//close database
mysql_close($conn);
?>
<?
require_once('conn.php');


$result = mysql_query("SELECT * FROM locations")
or die(mysql_error());

// store the record of the "example" table into $row
$row = mysql_fetch_array( $result );
// Print out the contents of the entry 

while($row = mysql_fetch_array($result)){

// CREATE HTML FILES OF ALL OF THE CITIES LISTED IN THE 'LOCATIONS' TABLE
$current_location = $row['province'];
$current_city = $row['city'];

$current_path = "../$current_location/$current_city/index.html";

// echo($current_path . "\n");
$fh = fopen($current_path, "w+");
if($fh==false)
	die("unable to create file");

}
mysql_close($dbh)
?>
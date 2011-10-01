<?
require_once('conn.php');


$result = mysql_query("SELECT * FROM locations")
or die(mysql_error());

// store the record of the "example" table into $row
$row = mysql_fetch_array( $result );
// Print out the contents of the entry 

while($row = mysql_fetch_array($result)){

mkdir( '../' . $row['province'], 0775, true);
mkdir( '../' . $row['province'] . '/' . $row['city'], 0775, true);


// MAKE A FOLDER WITHIN THIS FOLDER
//mkdir( '../' . $row['province'] . "/" . $row['province'], 0775, true);

}


mysql_close($dbh)
?>
<?

// EDIT FOR GIT TO SEE

$dbhost = 'localhost';
$dbuser = 'root';
$dbpasswd = 'root';
$db = "actafooc_pages";

$dbh = mysql_connect($dbhost, $dbuser, $dbpasswd) or die("Unable to connect to SQL server");
$my_db = @mysql_select_db($db) or die("Unable to select database");



//echo($my_db);

$result = mysql_query("SELECT * FROM locations")
or die(mysql_error());

// store the record of the "example" table into $row
$row = mysql_fetch_array( $result );
// Print out the contents of the entry 

//print_r($row['province']);

/* CREATE ARRAY FROM THE TABLE 'LOCATIONS AND MAKE A LINKS LIST OUT OF THEM'
while($row = mysql_fetch_array($result)){
	echo "<a href=\"website/" . $row['province'] . "\">" . $row['province']. " - ". $row['city'] . "</a>";
	echo "<br />";
}
*/


// MAKES FOLDERS FOR THE PROVINCES AND THEN CREATES NEW HTML FILES INSIDE OF THEIR RESPECTIVE FOLDERS FROM THE TABLE 'LOCATIONS'
echo("<ul>");
while($row = mysql_fetch_array($result)){



// CREATE HTML FILES OF ALL OF THE CITIES LISTED IN THE 'LOCATIONS' TABLE
$fh = fopen($row['province']."/". $row['city']. ".html", "w+");
if($fh==false)
	die("unable to create file");

echo($row['province']."/". $row['city']. ".html");

//	CHOMOD EXAMPLE
// chmod("website", 755); 
 
// Create UL with links to PROVINCE/CITY
	echo "<li><a href=\"" . $row['province'] ."/". $row['city'] . ".html" . "\">" . $row['province']. " - ". $row['city'] . "</a></li>";
	echo "<br />";
	
}
echo("</ul>");


//echo($row['city']);

//echo "location: ".$row['location'];
//echo " product: ".$row['product'];



/* CREATE A FILE ON THE SERVER

$fh = fopen(" myfile.html", "w+");
if($fh==false)
	die("unable to create file");

*/



?>
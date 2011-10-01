<?
// THESE ARE VALUES WHICH MUST MATCH UP WITH YOUR TABLES AND SO ON TO WORK PROPERLY

// Sub directory if at all
$root = $_SERVER['DOCUMENT_ROOT'] . '/';
$subroot = 'pages';

// Commented out because the below did not work
//$root = $_SERVER['SERVER_NAME'] . '/';
$root = $root . $subroot . '/';

// TABLE CONFIGURATIONS START//
$loctable	= 'locations';	// name of locations table in database
$loccountry	= 'country';	// name of county column in locations table
$locregion	= 'province';	// name of 'region' (province or state, ect) column in locations table
$loccity	= 'city';		// name of city column in locations table

$contenttable	= 'content';	// name of the content table in database

$productstable	= 'products';	// name of the products table in database
$productsname 	= 'name';		// name of the name column in the products table 

// TABLE CONFIGURATIONS START//
$timetable 	= 'scriptstamp';		// name of the name column in the products table 
?>
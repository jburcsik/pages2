<?
$dbhost = 'localhost';
$dbuser = 'root';
$dbpasswd = 'root';
$db = "actafooc_pages";

$dbh = mysql_connect($dbhost, $dbuser, $dbpasswd) or die("Unable to connect to SQL server");
$my_db = @mysql_select_db($db) or die("Unable to select database");
?>
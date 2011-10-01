<?

require_once('config.php');
require_once('conn.php');

// SELECT ALL FROM LOCATIONS TABLE
$scriptpassed = $_GET['scriptrun'];
$locresult = mysql_query("insert into $timetable (`script`,`lastrun`)
							values ('$scriptpassed', Auto NOW())")
or die(mysql_error());



//OVER CLOSE CONNECTOINS
mysql_close($dbh);
?>
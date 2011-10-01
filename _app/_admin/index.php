<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" ></script>
<script type="text/javascript" src="js/customlibrary.js"></script>
<script type="text/javascript" src="js/custominit.js"></script>
<script type="text/javascript" src="js/jquery.pngfix.js"></script>  
<link rel=stylesheet href="adminstyles.css" media="all" type='text/css' />
</head>
<body>
<?
require_once('../config.php');
require_once('../conn.php');
?> 
<h1>cPanel</h1>
<div class="adminscriptwrap" id="alldropdown">
	<h3>Create Drop Down (alldropdown.php)</h3>
	<span>
	<?	
	$q = mysql_query('SELECT script, max(lastrun) as max_date FROM scriptstamp WHERE script<>"" GROUP BY script')
	or die(mysql_error());
	
	$scriptinfo = mysql_fetch_array( $q ); // store the record of the locatoins table into $locrow
	while($scripinfo 	= mysql_fetch_array($q)){ // loop through locations array
	
	$datetime = strtotime($scriptinfo['lastrun']);
	echo($datetime);
	}

	?>
	</span>
	<form><button>Run</button></form>
	<p>status</p>
</div>

<div class="adminscriptwrap" id="outputsite">
	<h3>Output Site (outputsite.php)</h3>
	<span> - Last run : ##scriptName-mm/dd/yyyy##</span>
	<form><button>Run</button></form>
	<p>status</p>
</div>


<?
mysql_close($dbh);
?>
</body>
</html>
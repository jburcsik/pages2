<?
require_once('config.php');
require_once('conn.php');

//GET RANDOM ROWS FROM THE CONTENT

$intro = mysql_query(
	"SELECT * 
	FROM `content` 
	WHERE `type` = 'intro'
	order by rand()
	limit 1")
or die(mysql_error());


/* DONT KNOW WHY I CANT GET THIS TO WORK
$rad = mysql_query("SELECT count(*) FROM `content`");  
echo($rad);
$d = mysql_fetch_row($rad);  
$rand = mt_rand(0,$d[0] - 1);  
  
$r = mysql_query("SELECT `intro` FROM `type` LIMIT $rand, 1");  
$intro = $r;
*/

/* THIS WORKS BUT THE ISSUE IS THAT I ALSO NEED TO GET THE FIRST AND LAST ROW NUMBER TO MAKE THIS WORK ON SPECIFIC SETS OF DATA FROM THE TABLE, A WORK AROUND WOULD BE TO HAVE ALL THE 'TYPES' OF CONTENT DATA TO BE THEIR OWN TABLE. THIS WOULD MAKE SENSE IF THIS WERE TO BE USED FOR A NATIONAL CAMPAIGN. MORE RESEARCH IS NEEDED. UNTILL THEN THE 'ORDER BY RAND() LIMIT 1' TECHNIQUE WILL BE USED' */

/*
$getintro = mysql_query("SELECT count(*) FROM `content` WHERE `type` = 'intro'")
or die(mysql_error());
$numintro = mysql_fetch_array($intro);
$num = $num[0];
$rando = rand(1, $num);
mysql_query("SELECT count(*) FROM `content` WHERE `type` = 'intro'")
*/



$body = mysql_query(
	"SELECT * 
	FROM `content` 
	WHERE `type` = 'body'
	order by rand()
	limit 1")
or die(mysql_error());

$foot = mysql_query(
	"SELECT * 
	FROM `content` 
	WHERE `type` = 'foot'
	order by rand()
	limit 1")
or die(mysql_error());


// store the record of the "example" table into $row
$row1 = mysql_fetch_array( $intro );
$row2 = mysql_fetch_array( $body );
$row3 = mysql_fetch_array( $foot );
// Print out the contents of the entry 

echo($row1['copy'] . '<br />');
echo($row2['copy'] . '<br />');
echo($row3['copy'] . '<br />');


//CHECK IF THE COPY HAS A VARIABLE AND IF SO GO AHEAD AND REPLACE IT AND THEN PRINT IT AGAIN TO SEE THE WONDERS
if($row1['variable'] == TRUE){
echo('has variable<br/>');
$rowcopy = $row1['copy'];
$localswap = str_replace("##keywords##", "A CITY", $rowcopy);
echo($localswap . '<br/>');
}else{
echo('NO VARIABLE FOR THIS ONE' . '<br/>');
}



mysql_close($dbh)
?>
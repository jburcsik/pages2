<?

// ***   <-- this "// ***" signifies small notes that need tor be done

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// SITE CONFIGURATION START //
require_once('config.php');
require_once('conn.php');

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//	BEGIN MAIN SITE CREATION FUNCTION

// SELECT ALL FROM LOCATIONS TABLE
$locresult = mysql_query("SELECT * FROM $loctable")
or die(mysql_error());

$locrow = mysql_fetch_array( $locresult ); // store the record of the locatoins table into $locrow
	while($locrow = mysql_fetch_array($locresult)){ // loop through locations array
	$curregion = strtolower ($locrow[$locregion]); //apply variable to current region
	$curcity = strtolower ($locrow[$loccity]);	// apply variable to current city

echo($root . $curregion . '/' . $curcity . '<br /><br />');

	//CREATE FOLDERS FOR PROVINCES
	if(!is_dir($root . $curregion)){	// check if the region folder was already made
		mkdir( $root . $curregion, 0775, true); // If does not exisr create region directories
	}else{
//		echo(' already made provinces folder<br /><br />');
	}

	//CREATE FOLDERS FOR CITIES
	if(!is_dir($root . $curregion . '/' . $curcity)){ // check if the city folder already exists
		mkdir( $root . $curregion . '/' . $curcity, 0775, true); // make if does not exist create city directories
	}else{
//		echo(' already made cities folder<br /><br />');
	}
	

// GET ONE INSTANCE OF ALL THE PRODUCTS TO CREATE PAGES FOR THEM
$productstypequery = "SELECT * FROM $productstable GROUP BY $productstable.$productsname";
$productsresult	   = mysql_query($productstypequery) or die(mysql_error());
while($productsrow = mysql_fetch_array( $productsresult )){ // loop through products and make array for pages to be used then ADD regular pages to it
// PAGES TO HAVE CREATED (DEFAULT IS NUMBER OF PRODUCT TYPES - VARIATIONS CONSOLIDATED) PLUS AN INDEX AND CONTACT PAGE
$pgregular[1]   = "index";
$pgregular[2]	= 'contact';
// *** Custom  pages can be made, but need to have their own table (for content) and then added here to the config future thinking yeah!
array_push($pgregular, $productsrow['name']);
	$i=1; // defined after the loop begins so that the number of product pages can be beterminded before
	$pagestomake = count($pgregular);
	while($i<=$pagestomake)
  	{
  	
  	$makeurlfriendly = str_replace(' ', '_',strtolower($pgregular[$i]));
  	//echo($makeurlfriendly.'<br />');
  	// CREATE HTML FILES OF ALL OF THE CITIES LISTED IN THE 'LOCATIONS' TABLE
	$curpath = $root . "$curregion/$curcity/$makeurlfriendly". ".php"; // define where pages will be created EVENTUALLY MAKE A LOOP AND MAKE AN ARRAY FOR THE PAGES YOU WANT CREATED
	//echo('<br />' . $curpath);
	// SELECT ALL THE CONTENT FROM THE CONTENT TABLE	
	
	$intro = mysql_query(
	"SELECT * 
	FROM $contenttable 
	WHERE `type` = 'intro'
	order by rand()
	limit 1")
	or die(mysql_error());

	$body = mysql_query(
	"SELECT * 
	FROM $contenttable 
	WHERE `type` = 'body'
	order by rand()
	limit 1")
	or die(mysql_error());

	$foot = mysql_query(
	"SELECT * 
	FROM $contenttable 
	WHERE `type` = 'foot'
	order by rand()
	limit 1")
	or die(mysql_error());

	// store the record of the random table row into $row(n)
	$row1 = mysql_fetch_array( $intro );
	$row2 = mysql_fetch_array( $body );
	$row3 = mysql_fetch_array( $foot );
	
	//CHECK IF THE COPY HAS A VARIABLE AND IF SO GO AHEAD AND REPLACE IT AND THEN PRINT IT AGAIN TO SEE THE WONDERS
	if($row1['variable'] == TRUE){
//	echo('has variable<br/>');
	$rowcopy = $row1['copy'];
//	echo('<br />' . $curcity . ' was edited to match the appropriate message');
	$rdycopy = str_replace("##city##", $curcity, $rowcopy);
//	echo($localswap . '<br/>');
//	}else{
//	echo('NO VARIABLE FOR THIS ONE' . '<br/>');
	} // if statement ends
	
	
	// DECIDE WHAT TEMPLATE TO USE
	
	
	// echo($current_path . "\n");
	$fh = fopen($curpath, "w+"); // create pages truncate and start from beggining and create if it does not exist
	if($fh==false)
	die("unable to create file"); // or let us know it didnt work out

	//WRITE THE NEW CONTENT INTO THE RECENTLY CREATED FILE
    $rdycontent = $rdycopy . $row2['copy'] . $row3['copy'];
    $templateone = '../templates/templateone.php';
//    echo($templateone);
//    $temppath = $templateone; 
//    echo($temppath);
    $temptouse = file_get_contents($templateone);
	$pagecontent = str_replace('##PAGE_CONTENT##', $rdycontent, $temptouse);    
    
    fwrite($fh, $pagecontent);
    fclose($fh);
    
    $i++;
    } // NEW (second) while ends
   
   }

    

	} // FIRST while statement ends

//	END SITE CREATION FUNCTION
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////


mysql_close($dbh);
print('All jobs completed successfully');
?>
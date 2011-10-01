<?

// ***   <-- this "// ***" signifies small notes that need tor be done

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////


// Created connection to data base
require_once('config.php');
require_once('conn.php');

// TABLE CONFIGURATIONS END//

// CONNECT TO DATABASE
// $dbh = mysql_connect($dbhost, $dbuser, $dbpasswd) or die("Unable to connect to SQL server");
// $my_db = @mysql_select_db($db) or die("Unable to select database");

/////////////////////////////
/////////////////////////////
/////////////////////////////

$locresult = mysql_query("SELECT * FROM $loctable")
or die(mysql_error());

// CREATE THE LIBRARY FOLDER
if(!is_dir('../library')){	// check if the region folder was already made
		mkdir( '../library', 0775, true); // If does not exisr create region directories
	}else{
	}


$locrow = mysql_fetch_array( $locresult ); // store the record of the locatoins table into $locrow

  	$allcitydropdown = "";
   	$allcitydropdown = $allcitydropdown . '<select>';
	while($locrow = mysql_fetch_array($locresult)){ // loop through locations array
		$curregion = $locrow[$locregion]; //apply variable to current region
		$curcity = $locrow[$loccity];	// apply variable to current city
		$locurcity = strtolower($curcity);
		$locurregion = strtolower($curregion);
			
		$allcitydropdown = $allcitydropdown . "<option class='optionlinks' value='http://actafoo.com/pages/$locurregion/$locurcity'>$curcity</option>";
	}
   	$allcitydropdown = $allcitydropdown . '</select>';
//   	echo($allcitydropdown); 


// WRITE THE FILE TO BE INCLUDED FROM OTHER PAGES (TEMPLATES)
$fh = fopen('../library/allcitydropdown.php', "w+"); // create pages truncate and start from beggining and create if it does not exist
	if($fh==false)
	die("unable to create file"); // or let us know it didnt work out

	// sanitize the content if needed

	//WRITE THE NEW CONTENT INTO THE RECENTLY CREATED FILE
    $rdycontent = $allcitydropdown;
    fwrite($fh, $rdycontent);
    fclose($fh);
   

mysql_close($dbh);
print('Completed tasks');
?>
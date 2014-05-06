<?php
    // Send variables for the MySQL database class.
    $db = mysql_connect('localhost', 'engineUser', 'engineUserPass') or die('Could not connect: ' . mysql_error()); 
        mysql_select_db('EngineCompare2') or die('Could not select database');
 
    $query = "SELECT * FROM `scores` ORDER by `EngineName`";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
	
	$rows = array();
	
	while($r = mysql_fetch_assoc($result)) {
		$rows[] = $r;
	}
	
	echo json_encode($rows);
	
    /*$num_results = mysql_num_rows($result);  
 
    for($i = 0; $i < $num_results; $i++)
    {
         $row = mysql_fetch_array($result);
         echo $row['name'] . ": " . $row['score'] . "\n";
    }*/
?>
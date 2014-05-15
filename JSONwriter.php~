<?php 
	$db = mysql_connect('localhost', 'engineUser', 'engineUserPass') or die('Could not connect: ' . mysql_error()); 
	mysql_select_db('EngineCompare2') or die('Could not select database');

	#$jsonString = json_decode(file_get_contents('php://input'), true);
	$jsonString = json_decode($_POST['json'], true);
	
	//error_log("List POST data; ");
	//foreach($jsonString as $json)
		error_log($jsonString);
	
	$params = array('2Dsupport', '3Dsupport', 'Windows', 'Linux', 'OSX', 'iOS', 'Android', 'Console', 'NextGenConsole', 'Cost', 'Forums', 'Updates', 'OpenSource', 'Commercial', 'Tutorials', 'Documentation', 'C', 'Java', 'HTML5', 'Python');
	$params2 = array('Forums', 'Documentation', 'Tutorials', 'TimeToLearn', 'Prerequisites', 'LowEndBuild', 'DevelopmentWeight', 'BuildWeight', 'PlatformsBuiltTo', 'PlatformQuality', 'SwitchingPlatforms', 'PlatformDevelopment', 'CustomGUI', 'ChangeSource', 'Plugins', 'PurchasePrice', 'Subscription', 'Assets', 'DevelopmentExpense', '2Dsupport', '3Dsupport', 'Windows', 'Linux', 'OSX', 'iOS', 'Android', 'Console', 'NextGenConsole', 'C', 'Java', 'HTML5', 'Python', 'OpenSource', 'Commercial');
	
	//$name = $jsonString['EngineName'];
	//$twoD = $jsonString['2Dsupport'];
	error_log("EngineName Here: ".$jsonString['EngineName']);
	error_log("Var Dump Here: ".$jsonString);
	$tempQuery = "insert into scores (EngineName";
	foreach($params2 as $val)
	{
		$tempQuery .= ", ".$val;
	}
	$tempQuery .= ") values ('".$jsonString['EngineName']."'";
	foreach($params2 as $val)
	{
		$tempQuery .= ", '".$jsonString[$val]."'";
	}
	error_log($tempQuery);
	$tempQuery .= ");";
	$result = mysql_query($tempQuery) or die('Query failed: ' . mysql_error()); 
	//$query = "insert into scores (EngineName, 2Dsupport) values ('{$jsonString['{$params[0]}']}', '{$jsonString['2Dsupport']}');"; 
	//$result = mysql_query($query) or die('Query failed: ' . mysql_error()); 
?>
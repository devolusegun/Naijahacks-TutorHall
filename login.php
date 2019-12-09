<?php


/** 
 * Main file that is responsible to successfully sign-on.
 */

	chdir(dirname(__FILE__));
	
	require_once('./config.php');
	
	session_start();
	
	$db1 = new mysql($C->DB_HOST, $C->DB_USER, $C->DB_PASS, $C->DB_NAME);
	$db2 = &$db1;
		
	$network = new network();
	$network->load();
	
	$user = new user();
	$user->load();
	
	$page = new page();
	$page->load();

?>

<?php
/** 
 * 
 * NOTE: Designed for use with PHP version 4, 5 and up
 * @author @Segun-TutorHall.
 * @copyright 2019
 * @version: 1.0 
 * 
 */

/** 
 * Configuration file
 */

	$INCPATH = dirname(__FILE__).'/';
	chdir( $INCPATH );
	
	$SITE_URL = 'http://www.tutorhall.com/';
	$DOMAIN = 'http://www.tutorhall.com';

function myconOpen(){
	// MySQL SETTINGS
	$DB_HOST = 'localhost';
	$DB_USER = 'tutorhall_admin';
	$DB_PASS = '264g-1&DdT)&';
	$DB_NAME = 'tutorhall_db';
	$DB_MYEXT = 'mysql'; // 'mysqli' or 'mysql'
	
	$dbconn = new mysql($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die ("Connection failed: %s\n". $dbconn -> error);
	
	return $dbconn;
}

function myconClose($dbconn){
	$dbconn -> close();
}

?>

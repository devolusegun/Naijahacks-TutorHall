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
 * Configuration file.
 */

	$C->INCPATH = dirname(__FILE__).'/';
	chdir( $C->INCPATH );
	
	$C->SITE_URL = 'http://www.tutorhall.com/';
	$C->DOMAIN = 'http://www.tutorhall.com';

	// MySQL SETTINGS
	$C->DB_HOST = 'localhost';
	$C->DB_USER = 'tutorhall_admin';
	$C->DB_PASS = '264g-1&DdT)&';
	$C->DB_NAME = 'tutorhall_db';
	$C->DB_MYEXT = 'mysql'; // 'mysqli' or 'mysql'

?>

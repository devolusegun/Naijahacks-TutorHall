<?php
/** 
 * Main file that is responsible to successfully sign-on.
 */

chdir(dirname(__FILE__));	
include('./config.php');

$id;
$locate;
$is_logged = FALSE;
$info;
$keepmelog = 0;
$sess = array();

session_start();
$db1 = myconnOpen();

function login($uname, $pwd)
{
	if(empty($uname) ) return FALSE;
	$login = $db1->escape($uname);
	$pass = $db1->escape($pwd);
	
	// First check if there is a user with email or username
	$exist = $db1->query("SELECT iduser, password FROM users WHERE (email='".$login."' OR username='".$login."') AND active=1 LIMIT 1");
	
	//Verify password match
	if(!$obj = $db1->fetch_object()) return FALSE;
	$password = $obj->password;
	$cleartext = hash('sha512', $pass);
	if($password != $cleartext) return FALSE;
	
	$info = $locate->get_user_by_id($obj->iduser, TRUE);
	if(!$info) return FALSE;
	
	$is_logged = TRUE;
	$keepmelog = 1;
	$sess['IS_LOGGED'] = TRUE;
	$sess['LOGGED_USER'] = & $info;
	$id = $info->iduser;
	
	//Get user IP detail and update related user table in DB
	$ip = $db1->escape(ip2long($_SERVER['REMOTE_ADDR']) );
	$db1->query('UPDATE users SET previousaccess=lastaccess, ippreviousaccess=iplastaccess, lastaccess="'.time().'", iplastaccess="'.$ip.'", lastclick="'.time().'" WHERE iduser='.$id.' LIMIT 1');
	
	// Session expiry setting
	$sess['total_pageviews'] = 0;
	if($keepmelog == 1){
		$tmp = $id.'_'.$pass.'_'.md5($username.'~~'.$password.'~~'.$_SERVER['HTTP_USER_AGENT']);
		setcookie('keepmelog', $tmp, time()+60*24*60*60, '/');
	}
	return redirect('./dashboard');
	
	//OR header("Location: dashboard.php");
}

?>

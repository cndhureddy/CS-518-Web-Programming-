<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY', 'Uz1Zi6FvOYrUZV5e8CoSSTrEu'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'CI5xrBJaZI1imAWhSUA4QSSv8rXs9HyWz6JgKPMoNGl7hxlb2U'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', '	http://sukeshsangam.cs518.cs.odu.edu/example2.php'); // your app callback URL
if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$_dude=array('force_login'=>'true');
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token'],'force_login'=> $_dude['force_login']));
	//echo $url;
header( 'Location: ' . $url );
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$params = array('include_email' => 'true', 'include_entities' => 'false', 'skip_status' => 'true','force_login'=>'true');
	$user = $connection->get("account/verify_credentials",$params);
	//echo "<pre>";
	$user_name=$user->name;
	
	$display_name=$user->screen_name;
	$user_email=$user->email;
	$src=$user->profile_image_url;
	echo $user_name;
	echo "<br>";
	echo $display_name;
	echo "<br>";
	echo $user_email;
	echo "<br>";
	echo $src;
	echo "<br>";
	//echo "</pre>";
	
	$_SESSION["twitter"]="yes";
	
	header("Location: /php/twitter_login.php?user_name=".$user_name."&display_name=".$display_name."&user_email=".$user_email."&image_src=".$src." ");
	die();
	       }

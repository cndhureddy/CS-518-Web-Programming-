<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/1/2017
 * Time: 1:01 AM
 */

session_start();
session_unset();
session_destroy();
$_SESSION = array();



header('location: ../index.php');

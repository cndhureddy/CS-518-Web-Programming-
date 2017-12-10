<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 12/10/2017
 * Time: 1:45 AM
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
echo GET["user_id"];
echo GET["user_email"];
echo GET["image_src"];

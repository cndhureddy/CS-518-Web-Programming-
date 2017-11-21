<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/21/2017
 * Time: 12:30 PM
 */

include ("connect.php");
$key=$_POST["key"];

$query="SELECT user_id,display_name FROM `users` where display_name LIKE '$key%' ";

$result=$conn->query($query);
$something=array();
while($result_fetched=$result->fetch_array(MYSQLI_ASSOC)){

//$something_temp=array();
//$something_temp["user_id"]=$result_fetched[""];

array_push($something,$result_fetched);

}


echo json_encode($something);
//echo $query;


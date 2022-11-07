<?php 
$action = "borrowing";
if(isset($_GET['action'])){
    $action = $_GET['action'];
}
switch($action){
    case "borrowing":
        include "./src/views/history/borrowing.php";
        break;
    case "confirmreturn":
        include "./src/views/history/confirmreturn.php";
        break;
}

?>
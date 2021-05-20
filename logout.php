<?php
if(isset($_SESSION['log'])){

include_once("framework/config.php");
include_once("framework/sitefu.php");
include_once("header.php");
include_once("footer.php");


session_destroy();

}
else{
    include_once("login.php");

   
}





?>
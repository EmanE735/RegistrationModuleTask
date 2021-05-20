<?php
    session_start();
        
    include_once("framework/config.php");
    include_once("framework/sitefu.php");
    include_once("header.php");
    include_once("footer.php");
    if(isset($_GET['id'])){
        $id=intval($_GET['id']);
        $result=mysqli_query($con,"DELETE  FROM users WHERE u_id=$id");
        if($result){
            output_mg("User has been deleted successfully","s");
            redirect(2,"view_users.php");

        }

        else{
            output_mg("unexpected error","f");
            redirect(2,"view_users.php");

        }

    }
    else{
        output_mg("unexpected error","f");
        redirect(2,"view_users.php");
    }



?>

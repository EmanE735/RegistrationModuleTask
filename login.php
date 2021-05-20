<?php


include_once("framework/config.php");
 include_once("framework/sitefu.php");
 include_once("header.php");
include_once("footer.php");
if(isset($_POST['submit'])){

$email=validate($_POST['email'],$con);
$password=validate($_POST['password'],$con);
$password=ec_pass($password);

$result=mysqli_query($con,"SELECT * FROM users WHERE u_email='$email' and u_password='$password'");
if($result){
    if(mysqli_num_rows($result)>0){
        $_SESSION['log']="yes";
        $row=mysqli_fetch_array($result);
        $fullname=$row['u_name'];
        output_mg("welcom $fullname","s");
        redirect(2,"view_users.php");

    }
    else{
        output_mg("wrong email/password","f");
        redirect(2,"login.php");
    }

}
else{
    output_mg("unexpected error","f");
    redirect(2,"login.php");
}

}
else{

?>



<div class="container">
    <div class="card">
        <div class="innerbox" id="card">
            <div class="cardback">
                <h2>Login</h2>
                <form action="" method="post">
                <input type="email" class="input-box" placeholder="Yor Email" name="email">
                <input type="password" class="input-box" placeholder="Your Password" name="password">
                <button type="submit" id="bt" class="submit-btn" name="submit" style=" border-radius:50px ;  width: 100%;">submit</button>
            
                </form>
                
        <a class="btn btn-primary" href="registration.php" role="button" style="border: 1px solid #fff;  border-radius: 20px; background:transparent">Create an account</a>
        
            
            </div>
        </div>
    </div>
</div>

<?php
}


?>








?>
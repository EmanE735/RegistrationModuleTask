<?php
session_start();
include_once("framework/config.php");
 include_once("framework/sitefu.php");
 include_once("header.php");
include_once("footer.php");

if(isset($_POST['submit'])){
    $name=validate($_POST['name'],$con);
    $email=validate($_POST['email'],$con);
    $username=validate($_POST['username'],$con);
    $password=validate($_POST['password'],$con);
    $password=ec_pass($password);
    $cpassword=validate($_POST['cpassword'],$con);
    $cpassword=ec_pass($cpassword);
    if($name!=NULL and $email!=NULL and $username!=NULL and $password!=NULL and $cpassword!=NULL){
    if($password==$cpassword){
        $result=mysqli_query($con,"SELECT * FROM users WHERE u_email='$email'");
        if(mysqli_num_rows($result)>0){
            output_mg("this email already exist","f");
            redirect(2,"registration.php");
        }
        else{
        $result=mysqli_query($con,"INSERT INTO users(u_name,u_email,username,u_password,r_id) VALUES('$name','$email','$username','$password',2)");
        if($result){
            output_mg("one user added" ,"s");
            redirect(2,"view_users.php");

        }
        else{
            output_mg("something went wrong","f");
            redirect(2,"registration.php");
        }
    }
}

    
  
    else{
        output_mg("password not matched","f");
        redirect(2,"registration.php");
    }
}
else{
    output_mg("please fill all data","f");
    redirect(2,"registration.php");


}


}

else{
    ?>

  <div class="container">

    <div class="card">
        <div class="innerbox" id="card">
    <div class="cardfront">
        <h2>Registration</h2>
        <form action="" method="POST">
            <input type="text" class="input-box" placeholder="Your Full Name" name="name" >
            
            <input type="email" class="input-box" placeholder="Your Email" name="email" >
            <input type="text" class="input-box" placeholder="Username" name="username" >
            <input type="password" class="input-box" placeholder="Your Password" name="password">
            <input type="password" class="input-box" placeholder="Confirm Password" name="cpassword">
            <br>
            <button type="submit" id="bt" class="submit-btn" name="submit" style=" border-radius:50px ;  width: 100%;">Register</button>
          

        </form>

        <a class="btn btn-primary" href="login.php" role="button" style="border: 1px solid #fff;  border-radius: 20px; background:transparent">I've An Account</a>
       
    </div>

    
    

    

        </div>
    </div>

<?php
}



?>

    

    
    

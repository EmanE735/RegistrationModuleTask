<?php
include_once("framework/config.php");
include_once("framework/sitefu.php");
include_once("header.php");
include_once("footer.php");
    if(isset($_POST['submit'])){
        $fullname=validate($_POST['fullname'],$con);
        $email=validate($_POST['email'],$con);
        $username=validate($_POST['username'],$con);
        $password=validate($_POST['password'],$con);
        $password=ec_pass($password);
        $r_id=intval($_POST['r_id']);
        if($fullname!=NULL and  $email!=NULL and $username!=NULL and $password!=NULL and $r_id!=NULL){
            $result=mysqli_query($con,"INSERT INTO  users(u_name,u_email,username,u_password,r_id)  VALUES('$fullname','$email','$username','$password',$r_id)");
            if($result){
                output_mg("User has been added successfully","s");
                redirect(2,"view_users.php");

            }
        }
        else{
           output_mg("please fill all data","f");
            redirect(2,"add_user.php");
        }

    }
    else{
        ?>
           <a class="btn btn-primary pull-right"  href="logout.php" role="button" style="margin-top:20px; margin-right:30px;" >Logout</a>
              <div class="containe" style="width:750px; margin:auto;padding-top:30px;" >
            <form class="form_signin" method="post" action="" role="form">
            <div class="form-group">
                                       
                 <label for="exampleInputName2">Full Name</label>
                <input type="text" class="form-control" id="exampleInputName2"  placeholder="Full name" name="fullname">
                 </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                <label for="exampleInputName2">User Name</label>
                <input type="text" class="form-control" id="exampleInputName2" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password">
                </div>
                <label for="exampleInputEmail1">roles</label><br>
                <?php
                $result=mysqli_query($con,"SELECT * FROM rools");
                ?>
                <select class="form_control" name="r_id">
                <?php
                while($row=mysqli_fetch_array($result)){
                    $username=$row['username'];
                    $email=$row['u_email'];
                    $r_id=$row['r_id'];
                    $r_name=$row['r_name'];
                    ?>
                    <option value="<?php echo$r_id ?>"> <?php echo$r_name ?></option>
                    <?php 
                }
                ?>
                </select>
                <?php
                ?>
               <br>
               <br>
               <br>
               <button type="submit" class="btn btn-primary pull-left" name="submit">Add</button>
               <a class="btn btn-primary pull-left"  href="view_users.php" role="button" style=" margin-left:20px;" >Back</a>
            
            </form>
            </div>
        <?php
    }







?>
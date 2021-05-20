<?php
include_once("framework/config.php");
include_once("framework/sitefu.php");
include_once("header.php");
include_once("footer.php");

if(isset($_GET['id'])){
    $u_id=intval($_GET['id']);
      
      $result=mysqli_query($con,"SELECT * FROM users WHERE u_id=$u_id");
        if($result){
            $row=mysqli_fetch_array($result);
            $fullname=$row['u_name'];
            $email=$row['u_email'];
            $username=$row['username'];
            $password=$row['u_password'];
            $id=$row['r_id'];
            $result_r=mysqli_query($con,"SELECT * FROM rools WHERE $id=r_id");
            $row_r=mysqli_fetch_array($result_r);
            $r_name=$row_r['r_name'];
            if(isset($_POST['submit'])){
                $new_fullname=validate($_POST['fullname'],$con);
                $new_email=validate($_POST['email'],$con);
                $new_username=validate($_POST['username'],$con);
                $new_password=validate($_POST['password'],$con);
                $new_r_id=intval($_POST['r_id']);
                if($new_fullname!=NULL and  $new_email!=NULL and $new_username!=NULL and $new_password!=NULL and  $new_r_id!=NULL){
                    $result_update=mysqli_query($con,"UPDATE users SET 
                       u_name='$new_username',
                       u_email='$new_email',
                      username='$new_username',
                        u_password='$new_password',
                        r_id=$new_r_id
                        WHERE u_id=$u_id
                         ");
                         if($result){
                             output_mg("User has been edited successfully","s");
                             redirect(2,"view_users.php");
                         }

                }
                else{
                    output_mg("please fill all data","f");
                    redirect(2,"edit_users.php?u_id=$u_id");
                }

            }
            else{
                    ?>
                           
                            <a class="btn btn-primary pull-right"  href="logout.php" role="button" style="margin-top:20px; margin-right:30px;" >Logout</a>
                              <div class="containe" style="width:750px; margin:auto;padding-top:30px;" >
                            <form class="form_signin" method="post" action="" role="form">
                            <div class="form-group">
                            <label for="exampleInputName2">Full Name</label>
                             <input type="text" class="form-control" id="exampleInputName2"  name="fullname" value="<?php echo$fullname ?>">
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo$email ?>" name="email">
                                            <br>
                                        </div>
                                     <div class="form-group">
                                        <label for="exampleInputName2">UserName</label>
                                        <input type="text" class="form-control" id="exampleInputName2" value="<?php echo$username ?>" name="username">
                                        </div>
                                    <div class="form-group">
                                    
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password">
                                    </div>
                                   
                                        <?php
                                        $result=mysqli_query($con,"SELECT * FROM rools");
                                        ?>
                                        <label for="exampleInputName2">Roles</label>
                                        <select class="form_control" name="r_id">
                                        <?php
                                        while($row=mysqli_fetch_array($result)){
                                            $username=$row['username'];
                                            $email=$row['u_email'];
                                            $ru_id=$row['r_id'];
                                            $r_name=$row['r_name'];
                                            ?>
                                            <option <?php   if($ru_id==$id) echo "selected"; ?> value="<?php echo$ru_id; ?>"> <?php echo$r_name; ?></option>
                                            <?php 
                                        }
                                        ?>
                                        </select>
                                        <?php
                                        ?>
                                    <br>
                                    <br>
                                    
                                        <button type="submit" class="btn btn-primary pull-left" name="submit">Edit</button>
                                        <a class="btn btn-primary pull-left"  href="view_users.php" role="button" style=" margin-left:20px;" >Back</a>
                                    </form>
                                    </div>


                <?php
            }


        }


}else{
    output_mg("unexpected error","f");
    redirect(2,"view_users.php");
}





?>
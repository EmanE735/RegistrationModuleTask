<?php
session_start();
if(isset($_SESSION['log'])){
   

    
    include_once("framework/config.php");
    include_once("framework/sitefu.php");
    include_once("header.php");
    include_once("footer.php");
    ?>
   
    <br>

    <?php
    
    $result=mysqli_query($con,"SELECT * FROM users ");
    if($result){
            ?>
        
             <a class="btn btn-primary pull-right"  href="logout.php" role="button" style="margin-top:20px; margin-right:30px;" >Logout</a>
                  
            <div class="containe" style="width:750px; margin:auto;padding-top:50px;" >
            
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr> 
                            <th>UserName</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Edit</th>
                            <th>Delet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($result)){
                                $username=$row['username'];
                                $email=$row['u_email'];
                                $id=$row['r_id'];
                                $result_r=mysqli_query($con,"SELECT * FROM rools WHERE $id=r_id");
                                $row_r=mysqli_fetch_array($result_r);
                                $r_name=$row_r['r_name'];
                        ?>
                                <tr>
                                    <td><?php  echo$username?></td>
                                    <td><?php  echo$email?></td>
                                    <td><?php  echo$r_name?></td>
                                    <td><a href="edit_users.php?id=<?php echo $row['u_id'];?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                                    <td><a href="delet_user.php?id=<?php echo $row['u_id'] ;?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                                </tr>
                         <?php
                            }
                        ?>
                            


                    </tbody>
                </table>
                <a class="btn btn-primary pull-right"  href="add_user.php" role="button" style="margin-top:30px;" >Add User</a>
            
                </div>
            <?php

    }
    else{

    }
}
else{
    redirect(1,"registration.php");
}
    




?>
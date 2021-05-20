                                    <?php
                  
                                function validate($data ,$con)
                                    {
                                      $data=trim($data) ;
                                      $data=htmlspecialchars($data);
                                     $data= mysqli_real_escape_string($con,$data);
                                     return $data;
                                    }
                                    function ec_Pass($password){
                
                                    $password=md5($password);
                                    $password=substr($password,0,5);
                                    $password=sha1($password);
                                    $password=substr($password,0,5);
                                    return $password;
                                    }
                                    
                                    function output_mg($message,$statuse){ 
                                      if($statuse=="s"){
                                        ?>
                                        
                                        <div class="alert alert-success" style="padding: 20px 30px !important; margin: 80px 300px !important; "><?php echo $message?></div>
                                        <?php
                                      }else{
                                        ?>
                                        <div class="alert alert-danger" style="padding: 20px 30px !important; margin: 80px 300px !important;"><?php echo $message?></div>
                                      
                                        <?php
                                      }
                                    }
                                    
                                    
                                    
                                    function redirect($sec,$url){
                                      
                                      ?>
                                      <script>
                                       setTimeout(function(){ window.location.href='<?php echo $url; ?>';},<?php echo $sec*1000; ?>); 
                                        
                                        
                                      </script>
                                      <?php
                                    }

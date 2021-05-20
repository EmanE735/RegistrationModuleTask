<?php





function db_connection(){
    
    $connection=mysqli_connect("localhost","root",NULL,"regesteration");
return   $connection; 
    
}
$con=@db_connection();
if($con){
    
}
else{
    die(output_mg("connection failed","f"));
}
?>
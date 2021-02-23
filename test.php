<?php
$con = mysqli_init();
if($con){
    var_dump($con);
    echo "success";
}else{
    echo "some error";
}


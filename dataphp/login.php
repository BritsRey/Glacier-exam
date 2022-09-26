<?php
    $con = require("../conn.php");
    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        $user = $_POST['username'];
        $pass = md5($_POST['password']);
        $query = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `USERNAME` = '$user'");
        $status = "";
        if($row = mysqli_num_rows($query) >=1){
            while($data = mysqli_fetch_assoc($query)){
                if($data['PASSWORD'] === $pass){
                    $status = "success";
                    $_SESSION["USERID"] = $data['ID']; 
                    break;
                }else{
                    $status = "failed";
                }
            }
        }else{
            $status = 'empty';
        }
        echo $status;
    }

?>
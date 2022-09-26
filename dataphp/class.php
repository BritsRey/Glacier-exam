<?php
    class data{
        private $username;
        private $password;
        private $name;
        private $userid;
        private $position;
        private $email;
        private $address;
        private $company;
        private $query;
        private $type;


        function getalldata($query){
            $this->query = $query;
            $con = require('../conn.php');
            $getalldata = mysqli_query($con,$query); 
            $data=[];
            while($fetch = mysqli_fetch_assoc($getalldata)){
                $data[]=$fetch;
            }
            echo json_encode([
                'data' => $data,
            ]);
        }

        function updatedelete($query,$userid,$type){
            $this->userid = $userid;
            $this->type = $type;
            $this->query = $query;
            $con = require('../conn.php');
            $sql = mysqli_query($con,$query);
            if($type == "delete"){
                if($sql){
                    $delete2 = mysqli_query($con,"DELETE FROM `tbl_users` WHERE `ID` = $userid");
                    if($delete2){
                        echo "success";
                    }else{
                        echo "failed";
                    }
                }else{
                    echo "failed";
                }
            }else{
                if($sql){
                    echo "success";
                }else{
                    echo "failed";
                }
            }
        }

        function add($query,$name,$username,$password,$position,$address,$company,$email){
            $this->query = $query;
            $this->name = $name;
            $this->username = $username;
            $this->password = $password;
            $this->position = $position;
            $this->address = $address;
            $this->company = $company;
            $this->email = $email;
            $con = require('../conn.php');
            $sql = mysqli_query($con,$query);
            if($row = mysqli_num_rows($sql) <=0){
                $update = mysqli_query($con,"INSERT INTO `tbl_users`(`USERNAME`, `PASSWORD`) VALUES ('$username','$password')");
                if($update){
                    $last = mysqli_insert_id($con);
                    $update2 = mysqli_query($con,"INSERT INTO `tbl_users_info`(`USER_ID`, `NAME`, `POSITION`, `EMAIL`, `ADDRESS`, `COMPANY`) VALUES ($last,'$name','$position','$email','$address','$company')");
                    if($update2){
                        echo "success";
                    }else{
                        echo "failed";
                    }
                }else{
                    echo "failed";
                }
            }else{
                echo "exist";
            }
        }
    }





?>
<?php
    session_start();
    require('class.php');
    $data = new data();
    $sessionid = $_SESSION['USERID'];
    if(isset($_POST['getalldata'])){
        $data->getalldata("SELECT * FROM tbl_users INNER JOIN tbl_users_info ON tbl_users.ID = tbl_users_info.USER_ID WHERE tbl_users.ID != $sessionid");
    }else if(isset($_POST['deleteid'])){
        $id = $_POST['deleteid'];
        $data->updatedelete("DELETE FROM `tbl_users_info` WHERE `USER_ID` = $id",$id,"delete");
    }else if(isset($_POST['getdata'])){
        $id = $_POST['getdata'];
        $data->getalldata("SELECT * FROM tbl_users INNER JOIN tbl_users_info ON tbl_users.ID = tbl_users_info.USER_ID WHERE tbl_users_info.USER_ID = $id");
    }else if(isset($_POST['updateid']) && isset($_POST['name']) && isset($_POST['position']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['company'])){
        $id = $_POST['updateid'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $company = $_POST['company'];
        $data->updatedelete("UPDATE `tbl_users_info` SET `NAME`='$name',`POSITION`='$position',`EMAIL`='$email',`ADDRESS`='$address',`COMPANY`=' $company' WHERE tbl_users_info.USER_ID = $id",$id,"update");
    }else if(isset($_POST['searchdata'])){
        $search = $_POST['searchdata'];
        $data->getalldata("SELECT * FROM tbl_users INNER JOIN tbl_users_info ON tbl_users.ID = tbl_users_info.USER_ID
        WHERE tbl_users_info.NAME LIKE '%$search%' AND tbl_users.ID != $sessionid or tbl_users_info.POSITION LIKE '%$search%' AND tbl_users.ID != $sessionid or tbl_users_info.EMAIL LIKE '%$search%' AND tbl_users.ID != $sessionid or tbl_users_info.ADDRESS LIKE '%$search%' AND tbl_users.ID != $sessionid or tbl_users_info.COMPANY LIKE '%$search%' AND tbl_users.ID != $sessionid");
    }else if(isset($_POST['aname']) && isset($_POST['ausername']) && isset($_POST['apassword']) && isset($_POST['aposition']) && isset($_POST['aemail']) && isset($_POST['aaddress']) && isset($_POST['acompany'])){
        $name = $_POST['aname'];
        $usern = $_POST['ausername'];
        $pass = md5($_POST['apassword']);
        $position = $_POST['aposition'];
        $email = $_POST['aemail'];
        $address = $_POST['aaddress'];
        $company = $_POST['acompany'];
        $data->add("SELECT * FROM tbl_users WHERE `USERNAME` = '$usern'",$name,$usern,$pass,$position,$address,$company,$email);
    }




?>
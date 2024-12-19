<?php
require("./config.php");

//club 
if (isset($_POST['submitFlag'])) {
    $flag_name = $_POST['flagN'];
    $flag_url = $_POST['urlF'];


    $sqlFlag = "INSERT INTO flag (flag_name,url_flag) 
     VALUES('$flag_name','$flag_url')";

    $result = mysqli_query($conn, $sqlFlag);

    header("location:./dashboard.php");
} else {

    echo 'error';
}

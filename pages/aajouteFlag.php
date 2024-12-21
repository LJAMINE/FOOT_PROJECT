<?php
require("./config.php");

//club 
if (isset($_POST['submitFlag'])) {
    $flag_name = $_POST['flagN'];
    $flag_url = $_POST['urlF'];// tu va faire l'ajout sans validation ?


    $sqlFlag = "INSERT INTO flag (flag_name,url_flag) 
     VALUES('$flag_name','$flag_url')";

    $result = mysqli_query($conn, $sqlFlag);

    header("location:./flag_page.php");
} else {

    echo 'error';// donc,  on cas d'errur tu va afficher juste une page qui contient un message 'error' 
}

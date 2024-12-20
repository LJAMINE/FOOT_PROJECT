<?php
require("./config.php");

//club 
if (isset($_POST['submitClub'])) {
    $club_name = $_POST['clubC'];
    $club_url = $_POST['urlC'];


    $sqlFlag = "INSERT INTO club (Club_name,url_club) 
     VALUES('$club_name','$club_url')";

    $result = mysqli_query($conn, $sqlFlag);

    header("location:./club_Page.php");
} else {

    echo 'error';
}

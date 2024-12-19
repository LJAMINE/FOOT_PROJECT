<?php
include("./../pages/config.php");


//create and send data to sql----------------



    $errors = array('name' => '', 'photo' => '', 'flag' => '');




    if (empty($_POST['name'])) {                
        $errors['name'] = 'name is required <br />';
    } else {
        $name = $_POST['name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['name'] = 'name must be letters and spaces ';
        }
    }

    if (empty($_POST['rating'])) {
        $errors['rating'] = 'Rating is required <br />';
    } else {
        $rating = $_POST['rating'];
        if (!is_numeric($rating) || $rating < 0 || $rating > 100) {
            $errors['rating'] = 'Rating must be a number between 0 and 100';
        }
    }

    $position = $_POST['position'];
    if (array_filter(array: $errors)) {
        // echo 'errors in the form';

    } elseif ($position == "GK") {
        $name = $_POST['name'];
        $photo = $_POST['photo'];
        $flag = $_POST['flag'];
        $club = $_POST['club'];
        $position = $_POST['position'];
        $rating = $_POST['rating'];  
        $diving = $_POST['diving'];
        $handling = $_POST['handling'];
        $kicking = $_POST['kicking'];
        $reflexes = $_POST['reflexes'];
        $speed = $_POST['speed'];
        $positioning = $_POST['positioning'];

        // Example query
        $sql_insert = "INSERT INTO players (nom, photo,id_flag, id_club, position,rating, diving, handling, kicking, reflexes, speed, positioning)
               VALUES ('$name', '$photo', '$flag', '$club','$position', '$rating', '$diving', '$handling', '$kicking', '$reflexes', '$speed', '$positioning')";
        $result = mysqli_query($conn, $sql_insert);
    header("location:./dashboard.php");

    } else {
        // echo ' form is valid';
        $name = $_POST['name'];
        $photo = $_POST['photo'];
        $flag = $_POST['flag'];
        $club = $_POST['club'];
        $position = $_POST['position'];
        $rating = $_POST['rating'];
        $pace = $_POST['pace'];
        $shooting = $_POST['shooting'];
        $passing = $_POST['passing'];
        $dribbling = $_POST['dribbling'];
        $defending = $_POST['defending'];
        $physical = $_POST['physical'];

        // Example query
        $sql_insert = "INSERT INTO players (nom, photo,id_flag, id_club, position,rating, pace, shooting, passing, dribbling, defending, physical)
               VALUES ('$name', '$photo', '$flag', '$club','$position', '$rating', '$pace', '$shooting', '$passing', '$dribbling', '$defending', '$physical')";
        $result = mysqli_query($conn, $sql_insert);




    header("location:./dashboard.php");
    }






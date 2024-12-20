<?php
include("./../pages/config.php");

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    echo "Deleting ID: $id_to_delete";
    $sql = "DELETE FROM club WHERE id_club=$id_to_delete ";
    if (mysqli_query($conn, $sql)) {
        echo "Delete successful.";
        header("location:./club_Page.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
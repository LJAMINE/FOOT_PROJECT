<?php

include("./../pages/config.php");


$id = "";
$rating = "";
$name = "";
$photo = "";
$flag = "";
$club = "";
$position = "";
$rating = "";
$pace = "";
$shooting = "";
$passing = "";
$dribbling = "";
$defending = "";
$physical = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //show data 
    if (!isset($_GET['id'])) {
        header("location:./dashboard.php");
        exit;
        // echo 'AMINE';
    }

    $id = $_GET["id"];

    $sql = "SELECT  id,photo,nom,position,url_club,url_flag,rating,pace,shooting,passing,dribbling,defending,physical
     FROM players
    INNER JOIN club 
ON players.id_club=club.id_club
INNER JOIN flag 
ON players.id_flag=flag.id_flag
     WHERE id=$id";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    while (!$row) {
        header("location:./dashboard.php");
        exit;
    }


    $name = $row["nom"];
    $photo = $row['photo'];
    $flag = $row['flag'];
    $club = $row['club'];
    $position = $row['position'];
    $rating = $row['rating'];
    $pace = $row['pace'];
    $shooting = $row['shooting'];
    $passing = $row['passing'];
    $dribbling = $row['dribbling'];
    $defending = $row['defending'];
    $physical = $row['physical'];
} else {
    //post methd e to update 

    $id = $_POST["id"];
    $name = $_POST["name"];
    $flag = $_POST["flag"];
    $club = $_POST["club"];
    $position = $_POST["position"];
    $rating = $_POST["rating"];
    $pace = $_POST["pace"];
    $shooting = $_POST["shooting"];
    $passing = $_POST["passing"];
    $dribbling = $_POST["dribbling"];
    $defending = $_POST["defending"];
    $physical = $_POST["physical"];

    $sql = "UPDATE players 
          SET nom='$name',photo='$photo', id_flag='$flag', 
            id_club='$club',position='$position',rating='$rating',
          pace='$pace',shooting='$shooting',passing='$passing',
          dribbling='$dribbling', defending='$defending', physical='$physical'
          WHERE id=$id ";

    $result = $conn->query($sql);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .drawer {
        /* display: none; */
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #ffffff;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        width: 800px;
        max-height: 90vh;
        overflow-y: auto;
        z-index: 1000;
    }

    form #playerForm {
        /* display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px; */
    }

    form label {
        grid-column: span 2;
        font-size: 14px;
        color: #34495e;
        margin-bottom: 5px;
        font-weight: 600;
    }

    form input,
    form select,
    form button {
        width: 100%;
        padding: 12px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    form input:focus,
    form select:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 8px rgba(52, 152, 219, 0.2);
    }

    #closeme {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        margin-bottom: 15px;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    #closemynatione {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        margin-bottom: 15px;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    #closemyclub {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        margin-bottom: 15px;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    #closeme:hover {
        background-color: #c0392b;
    }

    form button[type="submit"] {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 12px;
        cursor: pointer;
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-weight: 600;
    }

    form button[type="submit"]:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <div class="drawer" id="formDrawer">
        <button id="closeme">Close</button>
        <form id="playerForm" action="edit.php" method="POST">
            <input type="hidden" name="id" value=" <?php echo htmlspecialchars($id) ?>">

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name) ?>" placeholder="Player Name">
            <?php if (!empty($errors['name'])): ?>
                <div class="error"><?php echo $errors['name']; ?></div>
            <?php endif; ?>


            <label for="photo">Photo URL</label>
            <input type="url" id="photo" name="photo" value="<?php echo htmlspecialchars($photo) ?> ">



            <label for="flag" name="flag">flag</label>
            <select id="flag" name="flag">
                <option value="1" <?php if ($flag == 1) echo "selected"; ?>>spain</option>
                <option value="2" <?php if ($flag == 2) echo "selected"; ?>>England</option>
                <option value="3">France</option>
                <option value="4">Argentina</option>
                <option value="5">Juventus</option>
                <option value="6">Bayern Munich</option>
                <option value="7">Chelsea</option>
                <option value="8">Liverpool</option>
                <option value="9">Arsenal</option>
                <option value="10">Tottenham Hotspur</option>

            </select>



            <label for="club">club</label>
            <select id="club" name="club">
                <option value="1" <?php if ($club == 1) echo "selected"; ?>>Real Madrid</option>
                <option value="2" <?php if ($club == 2) echo "selected"; ?>>FC Barcelona</option>
                <option value="3">Manchester United</option>
                <option value="4">Argentina</option>
                <option value="5">Italy</option>
                <option value="6">Germany</option>
                <option value="7">Portugal</option>
                <option value="8">Brazil</option>
                <option value="9">Netherlands</option>
                <option value="10">Belgium</option>

            </select>

            <label for="rating">Rating</label>
            <input type="number" id="rating" name="rating" value="<?php echo $rating ?>" placeholder="Overall Rating">

            <label for="positionPlayer">Position:</label>
            <select id="positionPlayer" name="position">
                <option value="ST">ST</option>
                <option value="RW">RW</option>
                <option value="LW">LW</option>
                <option value="CM">CM</option>
                <option value="RM">RM</option>
                <option value="LM">LM</option>
                <option value="CBR">CBR</option>
                <option value="CBL">CBL</option>
                <option value="LB">LB</option>
                <option value="RB">RB</option>

                <option value="GK">GK</option>

            </select>

            <div id="player-stats">
                <label for="stat1" id="label1">Pace:</label>
                <input type="number" id="stat1" name="pace" value="<?php echo $pace ?>"><br>

                <label for="stat2" id="label2">Shooting:</label>
                <input type="number" id="stat2" name="shooting" value="<?php echo $shooting ?>"><br>

                <label for="stat3" id="label3">Passing:</label>
                <input type="number" id="stat3" name="passing" value="<?php echo $passing ?>"><br>

                <label for="stat4" id="label4">Dribbling:</label>
                <input type="number" id="stat4" name="dribbling" value="<?php echo $dribbling ?>"><br>

                <label for="stat5" id="label5">Defending:</label>
                <input type="number" id="stat5" name="defending" value="<?php echo $defending ?>"><br>

                <label for="stat6" id="label6">Physical:</label>
                <input type="number" id="stat6" name="physical" value="<?php echo $physical ?>"><br>
            </div>

            <input type="submit" name="submit" value="submit">


        </form>
    </div>
</body>

<script>
    // const formDrawer = document.getElementById('formDrawer');
    // const closeme = document.getElementById('closeme');



    // closeme.addEventListener('click', () => {
    //     formDrawer.style.display = "none"
    // });
</script>

</html>
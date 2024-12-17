<?php

//connexion 
$conn = mysqli_connect('localhost', 'amine', 'test123', 'footproject');
//check the conn
if (!$conn) {
    echo 'connection error ' . mysqli_connect_error();
}

//query for all players
$sql = 'SELECT id,photo,nom,position,url_club,url_flag,rating,pace,shooting,passing,dribbling,defending,physical
FROM players
INNER JOIN club 
ON players.id_club=club.id_club
INNER JOIN flag 
ON players.id_flag=flag.id_flag
';

//make query and get result
$result = mysqli_query($conn,   $sql);

//fetch as row of array
$myplayers = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory 
mysqli_free_result($result);

// print_r($myplayers);


//create and send data to sql----------------

if (isset($_POST['submit'])) {


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
    if (array_filter($errors)) {
        // echo 'errors in the form';
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


        // echo ' form is valid2';
    }



    mysqli_close($conn);
}

//deletefunction------------------------

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    echo "Deleting ID: $id_to_delete";
    $sql = "DELETE FROM players WHERE id=$id_to_delete ";
    if (mysqli_query($conn, $sql)) {
        echo "Delete successful.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);


    if (!empty($id_to_delete)) {
        $sql = "DELETE FROM players WHERE id=$id_to_delete";
        mysqli_query($conn, $sql);
    } else {
        echo 'Error: ID to delete is not set or invalid.';
    }
    //get the query result
    $result = mysqli_query($conn, $sql);

    //fetch result in array formatt
    $plyer = mysqli_fetch_assoc($result);


    mysqli_free_result($result);
    mysqli_close($conn);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: rgb(244, 248, 248);
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            height: 500vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .sidebar button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .sidebar button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .drawer {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            width: 650px;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .drawer.active {
            display: block;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
            font-size: 14px;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        form {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px;
        }

        form label {
            grid-column: span 2;
            font-size: 14px;
            color: #34495e;
            margin-bottom: 5px;
        }

        form input,
        form select,
        form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        form input:focus,
        form select:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
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

        #closeme:hover {
            background-color: #c0392b;
        }

        form button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        form button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <button id="ajouterButton">Ajouter</button>
        <button id="logoutButton">Logout</button>
    </div>

    <div class="content">
        <h1>Welcome to the Dashboard</h1>

        <h2>Players Table</h2>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>club</th>
                    <th>flag</th>
                    <th>Rating</th>
                    <th>Pace</th>
                    <th>Shooting</th>
                    <th>Passing</th>
                    <th>Dribbling</th>
                    <th>Defending</th>
                    <th>Physical</th>
                    <th>add</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($myplayers as $player) { ?>
                    <tr>
                        <td><img src="<?php echo $player['photo']; ?>" alt="Player Image" style="width: 50px; height: 50px;"></td>
                        <td><?php echo ($player['nom'])  ?></td>
                        <td><?php echo ($player['position'])  ?></td>
                        <td><img src="<?php echo $player['url_club']; ?>" alt="Player Image" style="width: 50px; height: 50px;"></td>
                        <td><img src="<?php echo $player['url_flag']; ?>" alt="Player Image" style="width: 50px; height: 50px;"></td>
                        <td><?php echo ($player['rating'])  ?></td>
                        <td><?php echo ($player['pace'])  ?></td>
                        <td><?php echo ($player['shooting'])  ?></td>
                        <td><?php echo ($player['passing'])  ?></td>
                        <td><?php echo ($player['dribbling'])  ?></td>
                        <td><?php echo ($player['defending'])  ?></td>
                        <td><?php echo ($player['physical'])  ?></td>
                        <form action="dashboard.php" method="POST">
                            <td><input type="hidden" name="id_to_delete" value="<?php echo $player['id'] ?>"></td>
                            <td><input type="submit" name="delete" value="delete"></td>
                        </form>


                    </tr>



                <?php } ?>

            </tbody>
        </table>
    </div>

    <div class="drawer" id="formDrawer">
        <button id="closeme">Close</button>
        <form id="playerForm" action="dashboard.php" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name) ?>" placeholder="Player Name">
            <?php if (!empty($errors['name'])): ?>
                <div class="error"><?php echo $errors['name']; ?></div>
            <?php endif; ?>


            <label for="photo">Photo URL</label>
            <input type="url" id="photo" name="photo" placeholder="https://example.com/photo.png">

            <label for="flag">flag</label>
            <select id="flag" name="flag">
                <option value="1">spain</option>
                <option value="2">England</option>
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
                <option value="1">Real Madrid</option>
                <option value="2">FC Barcelona</option>
                <option value="3">Manchester United</option>
                <option value="4">Argentina</option>
                <option value="5">Italy</option>
                <option value="6">Germany</option>
                <option value="7">Portugal</option>
                <option value="8">Brazil</option>
                <option value="9">Netherlands</option>
                <option value="10">Belgium</option>

            </select>

            <label for="position">Position</label>
            <select id="positionPlayer" name="position">
                <option value="GK">GK</option>
                <option value="CBR">CBR</option>
                <option value="CBL">CBL</option>
                <option value="LB">LB</option>
                <option value="RB">RB</option>
                <option value="CM">CM</option>
                <option value="RM">RM</option>
                <option value="LM">LM</option>
                <option value="RW">RW</option>
                <option value="LW">LW</option>
                <option value="ST">ST</option>
            </select>

            <label for="rating">Rating</label>
            <input type="number" id="rating" name="rating" value="<?php echo $rating ?>" placeholder="Overall Rating">

            <label for="pace">Pace</label>
            <input type="number" id="pace" name="pace" placeholder="Pace">

            <label for="shooting">Shooting</label>
            <input type="number" id="shooting" name="shooting" placeholder="Shooting">

            <label for="passing">Passing</label>
            <input type="number" id="passing" name="passing" placeholder="Passing">

            <label for="dribbling">Dribbling</label>
            <input type="number" id="dribbling" name="dribbling" placeholder="Dribbling">

            <label for="defending">Defending</label>
            <input type="number" id="defending" name="defending" placeholder="Defending">

            <label for="physical">Physical</label>
            <input type="number" id="physical" name="physical" placeholder="Physical">

            <input type="submit" name="submit" value="submit">

            <!-- <button type="submit">Add Player</button> -->
        </form>
    </div>

    <script>
        const ajouterButton = document.getElementById('ajouterButton');
        const formDrawer = document.getElementById('formDrawer');
        const closemeButton = document.getElementById('closeme');

        ajouterButton.addEventListener('click', () => {
            formDrawer.classList.add('active');
        });

        closemeButton.addEventListener('click', () => {
            formDrawer.classList.remove('active');
        });

        const logoutButton = document.getElementById('logoutButton');
        logoutButton.addEventListener('click', () => {
            window.location.href = 'index.html';
        });
    </script>
</body>

</html>

</html>
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
WHERE position<>"GK"
';

//make query and get result
$result = mysqli_query($conn,   $sql);

//fetch as row of array
$myplayers = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory 
mysqli_free_result($result);

// print_r($myplayers);


//requete GK
$sqlGK = 'SELECT id,photo,nom,position,url_club,url_flag,rating,diving,handling,kicking,reflexes,speed,positioning
FROM players
INNER JOIN club 
ON players.id_club=club.id_club
INNER JOIN flag 
ON players.id_flag=flag.id_flag
WHERE position="GK"
';

//make query and get result
$newresult = mysqli_query($conn,   $sqlGK);

//fetch as row of array
$myplayersGK = mysqli_fetch_all($newresult, MYSQLI_ASSOC);

//free result from memory 
mysqli_free_result($newresult);


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

    $position = $_POST['position'];
    if (array_filter($errors)) {
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
}




mysqli_close($conn);

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


//------update----------------------------





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Example</title>
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f0f4f4;
            line-height: 1.6;
            color: #333;
            overflow-y: scroll;

        }

        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-top: -10px;
            font-weight: 500;
        }

        .sidebar {
            width: 180px;
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 30px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            width: 100px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .sidebar button:hover {
            background-color: #2980b9;
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .content {
            margin-left: 180px;
            padding: 20px;
        }

        .drawer {
            display: none;
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

        .drawer.active {
            display: block;
        }

        table {
            /* margin: 20px auto; */
            table-layout: fixed;
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #e0e0e0;

        }

        th {
            font-size: 12px;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }



        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
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
</head>

<body>
    <div class="sidebar">
        <button id="ajouterButton">Add player</button>
        <button id="">add nation</button>
        <button id="">add club</button>
        <button id="logoutButton">Logout</button>
    </div>

    <div class="content">
        <h1>Welcome to the Admin Dashboard</h1>

        <!-- <h2>Players Table</h2> -->
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
                    <th>update</th>
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
                        <td>
                            <form action="dashboard.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $player['id'] ?>">
                                <input type="submit" name="update" value="update">
                            </form>
                        </td>

                        <td>
                            <form action="dashboard.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $player['id'] ?>">
                                <input type="submit" name="delete" value="delete">
                            </form>
                        </td>



                    </tr>



                <?php } ?>

            </tbody>
        </table>

        <h1>GK DATA</h1>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>club</th>
                    <th>flag</th>
                    <th>Rating</th>
                    <th>diving</th>
                    <th>handling</th>
                    <th>kicking</th>
                    <th>reflexes</th>
                    <th>speed</th>
                    <th>positioning</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($myplayersGK as $player) { ?>
                    <tr>
                        <td><img src="<?php echo $player['photo']; ?>" alt="Player Image" style="width: 50px; height: 50px;"></td>
                        <td><?php echo ($player['nom'])  ?></td>
                        <td><?php echo ($player['position'])  ?></td>
                        <td><img src="<?php echo $player['url_club']; ?>" alt="Player Image" style="width: 50px; height: 50px;"></td>
                        <td><img src="<?php echo $player['url_flag']; ?>" alt="Player Image" style="width: 50px; height: 50px;"></td>
                        <td><?php echo ($player['rating'])  ?></td>
                        <td><?php echo ($player['diving'])  ?></td>
                        <td><?php echo ($player['handling'])  ?></td>
                        <td><?php echo ($player['kicking'])  ?></td>
                        <td><?php echo ($player['reflexes'])  ?></td>
                        <td><?php echo ($player['speed'])  ?></td>
                        <td><?php echo ($player['positioning'])  ?></td>
                        <td>

                            <form action="dashboard.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $player['id'] ?>">
                                <input type="submit" name="update" value="update">
                            </form>
                        </td>

                        <td>
                            <form action="dashboard.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $player['id'] ?>">
                                <input type="submit" name="delete" value="delete">
                            </form>
                        </td>



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
                <input type="number" id="stat1" name="pace"><br>

                <label for="stat2" id="label2">Shooting:</label>
                <input type="number" id="stat2" name="shooting"><br>

                <label for="stat3" id="label3">Passing:</label>
                <input type="number" id="stat3" name="passing"><br>

                <label for="stat4" id="label4">Dribbling:</label>
                <input type="number" id="stat4" name="dribbling"><br>

                <label for="stat5" id="label5">Defending:</label>
                <input type="number" id="stat5" name="defending"><br>

                <label for="stat6" id="label6">Physical:</label>
                <input type="number" id="stat6" name="physical"><br>
            </div>

            <input type="submit" name="submit" value="submit">

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


        document.getElementById('positionPlayer').addEventListener('change', function() {
            const position = this.value;

             const stats = {
                default: {
                    labels: ["Pace", "Shooting", "Passing", "Dribbling", "Defending", "Physical"],
                    names: ["pace", "shooting", "passing", "dribbling", "defending", "physical"]
                },
                GK: {
                    labels: ["Diving", "Handling", "Kicking", "Reflexes", "Speed", "Positioning"],
                    names: ["diving", "handling", "kicking", "reflexes", "speed", "positioning"]
                }
            };

            const selectedStats = stats[position] || stats.default;

             const labelElements = [
                document.getElementById('label1'),
                document.getElementById('label2'),
                document.getElementById('label3'),
                document.getElementById('label4'),
                document.getElementById('label5'),
                document.getElementById('label6')
            ];

            const inputElements = [
                document.getElementById('stat1'),
                document.getElementById('stat2'),
                document.getElementById('stat3'),
                document.getElementById('stat4'),
                document.getElementById('stat5'),
                document.getElementById('stat6')
            ];

            labelElements.forEach((label, index) => {
                label.textContent = selectedStats.labels[index];
            });

            inputElements.forEach((input, index) => {
                input.name = selectedStats.names[index];
            });
        });
    </script>
</body>

</html>

</html>
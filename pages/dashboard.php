<?php

//connexion 
include("./../pages/config.php");


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







//delete function------------------------

include("./deletePlayers.php");

//delete function------------------------



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        .drawarr {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #ffffff;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            width: 400px;
            max-height: 90vh;
            overflow-y: auto;
            z-index: 1000;
        }

        .drawarr.active {
            display: block;
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

</head>

<body>
    <div class="sidebar">
        <button id="ajouterButton">Add player</button>
        <button id="ajouternation" onclick="window.location.href='flag_Page.php'">nation</button>
        <button id="ajouterclub" onclick="window.location.href='club_Page.php'">Club</button>
        <button id="logoutButton">Logout</button>
    </div>

    <div class="content">
        <h1>Players Data</h1>

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
                        <!-- <td> -->
                        <!-- <a href="edit.php?id=<?php echo $player['id'] ?>">edit</a> -->

                        <!-- <form action="dashboard.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $player['id'] ?>">
                                <input type="submit" name="update" value="update">
                            </form> -->
                        <!-- </td> -->
                        <td>
                            <a href="edit.php?id=<?php echo $player['id']; ?>" style="text-decoration: none; color: inherit;">
                                <i class="fa-solid fa-pen-to-square" style="color: blue;"></i>
                            </a>
                        </td>


                        <td>
                            <form action="dashboard.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $player['id']; ?>">
                                <button type="submit" name="delete" style="border: none; background: none; cursor: pointer;">
                                    <i class="fa-solid fa-trash" style="color: red;"></i>
                                </button>
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
                        <!-- <td> -->

                        <!-- <a href="edit.php?id=<?php echo $player['id'] ?>">edit</a> -->

                        <!-- <input type="hidden" name="id_to_delete" value="<?php echo $player['id'] ?>">
                                <input type="submit" name="update" value="update"> -->


                        <!-- </td> -->
                        <td>
                            <a href="edit.php?id=<?php echo $player['id']; ?>" style="text-decoration: none; color: inherit;">
                                <i class="fa-solid fa-pen-to-square" style="color: blue;"></i>
                            </a>
                        </td>


                        <td>
                            <form action="dashboard.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $player['id']; ?>">
                                <button type="submit" name="delete" style="border: none; background: none; cursor: pointer;">
                                    <i class="fa-solid fa-trash" style="color: red;"></i>
                                </button>
                            </form>
                        </td>




                    </tr>



                <?php } ?>

            </tbody>
        </table>
    </div>

    <div class="drawer" id="formDrawer">
        <button id="closeme">Close</button>
        <form id="playerForm" action="ajouter.php" method="POST">
            <label for="name">Name</label>

            <input type="text" id="name" name="name" placeholder="Player Name">
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
            <input type="number" id="rating" name="rating" placeholder="Overall Rating">

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
    <!-- ----flag---------------  -->


    <div class="drawarr" id="formnationDrawer">
        <button id="closemynatione">Close</button>
        <form id="playerFormgf" action="aajouteFlag.php" method="POST">

            <label for="">flag name</label>
            <input type="text" name="flagN">

            <label for="flag">flag URL</label>
            <input type="url" id="flag" name="urlF" placeholder="https://example.com/flag.png">



            <input type="submit" name="submitFlag" value="submit">

        </form>
    </div>


    <!-- ----club------------  -->

    <!-- <div class="drawarr" id="formclubDrawer">
        <button id="closemyclub">Close</button>
        <form id="playerFormgf" action="ajouterclub.php" method="POST">

            <label for="">club name</label>
            <input type="text" name="clubC">

            <label for="club">club URL</label>
            <input type="url" id="club" name="urlC" placeholder="https://example.com/club.png">



            <input type="submit" name="submitClub" value="submit">

        </form>
    </div> -->

    <script>
        const ajouterButton = document.getElementById('ajouterButton');
        const formDrawer = document.getElementById('formDrawer');
        const closeme = document.getElementById('closeme');

        ajouterButton.addEventListener('click', () => {
            formDrawer.classList.add('active');
        });

        closeme.addEventListener('click', () => {
            formDrawer.classList.remove('active');
        });

        //nation---------------
        // const ajouternation = document.getElementById('ajouternation');
        // const formnationDrawer = document.getElementById('formnationDrawer');
        // const closemynatione = document.getElementById('closemynatione');

        // ajouternation.addEventListener('click', () => {
        //     formnationDrawer.classList.add('active');
        // });

        // closemynatione.addEventListener('click', () => {
        //     formnationDrawer.classList.remove('active');

        // });


        //----club------------
        // const ajouterclub = document.getElementById('ajouterclub');
        // const formclubDrawer = document.getElementById('formclubDrawer');
        // const closemyclub = document.getElementById('closemyclub');

        // ajouterclub.addEventListener('click', () => {
        //     formclubDrawer.classList.add('active');
        // });

        // closemyclub.addEventListener('click', () => {
        //     formclubDrawer.classList.remove('active');

        // });


        //log out----------------

        const logoutButton = document.getElementById('logoutButton');
        logoutButton.addEventListener('click', () => {
            window.location.href = 'index.php';
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
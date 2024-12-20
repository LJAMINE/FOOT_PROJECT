<?php
include("./../pages/config.php");
$sql = 'SELECT id_club,club_name,url_club
      FROM club';

$result = mysqli_query($conn,   $sql);

//fetch as row of array
$myClubs = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory 
mysqli_free_result($result);
// print_r($myClubs);

//delete 
include("./delete_club.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Club Card</title>
    <style>
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

        /* General styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* Heading style */
        h1 {
            text-align: center;
            font-size: 30px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        /* Container for the club cards */
        .container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        /* Card styling */
        .card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
        }

        .card-header h3 {
            font-size: 22px;
            color: #34495e;
            margin-bottom: 15px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Buttons inside the card */
        .card-body button {
            background-color: #3498db;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            margin: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .card-body button:hover {
            background-color: #2980b9;
        }

        /* Button and form drawer (pop-up) styling */
        #ajouterclub {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            display: block;
            margin: 20px auto;
            transition: background-color 0.3s;
        }

        #ajouterclub:hover {
            background-color: #2980b9;
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
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .drawarr.active {
            display: block;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }

        #closemyclub {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-bottom: 15px;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        #closemyclub:hover {
            background-color: #c0392b;
        }

        /* Form styling */
        form label {
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
    <a href="dashboard.php" style="text-decoration: none; color: inherit; display: inline-flex; align-items: center;">
        <i class="fa-solid fa-right-from-bracket" style="font-size: 40px; margin: 20px;"></i>
    </a>
    <button id="ajouterclub"> add club</button>

    <h1>list of teams</h1>

    <div class="container">
        <?php foreach ($myClubs as $club) { ?>
            <div class="card">
                <div class="card-header">
                    <span id="club-name"><?php echo ($club['club_name'])  ?></span>
                </div>
                <div class="card-body">
                    <img id="club-logo" src="<?php echo $club['url_club']; ?>" alt="Club Logo">
                    <div class="btn">
                        <a href="edit_club.php?id_club=<?php echo $club['id_club']; ?>" style="text-decoration: none; color: inherit;">
                            <i class="fa-solid fa-pen-to-square" style="color: blue;"></i>
                        </a>
                        <form action="club_page.php" method="POST">
                            <input type="hidden" name="id_to_delete" value="<?php echo $club['id_club']; ?>">
                            <button type="submit" name="delete" style="border: none; background: none; cursor: pointer;">
                                <i class="fa-solid fa-trash" style="color: red;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <div class="drawarr" id="formclubDrawer">
        <button id="closemyclub">Close</button>
        <form id="playerFormgf" action="ajouterclub.php" method="POST">

            <label for="">club name</label>
            <input type="text" name="clubC">

            <label for="club">club URL</label>
            <input type="url" id="club" name="urlC" placeholder="https://example.com/club.png">



            <input type="submit" name="submitClub" value="submit">

        </form>
    </div>

</body>
<script>
    const ajouterclub = document.getElementById('ajouterclub');
    const formclubDrawer = document.getElementById('formclubDrawer');
    const closemyclub = document.getElementById('closemyclub');

    ajouterclub.addEventListener('click', () => {
        formclubDrawer.classList.add('active');
    });

    closemyclub.addEventListener('click', () => {
        formclubDrawer.classList.remove('active');

    });
</script>

</html>
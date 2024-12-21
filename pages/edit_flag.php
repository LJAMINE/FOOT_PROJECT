<?php
include("./../pages/config.php");


$id_flag = "";
$flagN = "";
$urlF = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //show data 
    if (!isset($_GET['id_flag'])) {
        header("location:./flag_page.php");
        exit;// qu'il est l'utilité de exit ici ?
        // echo 'AMINE';
    }

    $id_flag = $_GET["id_flag"];


    $sql = "SELECT id_flag,flag_name,url_flag
     FROM flag
     WHERE id_flag=$id_flag";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    print_r($row);


    while (!$row) {
        header("location:./flag_page.php");
        exit;
    }



    // $name = $row["id_flag"];
    $flagN = $row['flag_name'];
    $urlF = $row['url_flag'];
} else {
    //post methd e to update 

    $id_flag = $_POST["id_flag"];
    $flagN = $_POST["flagN"];
    $urlF = $_POST["urlF"];


    $sql = "UPDATE flag 
          SET flag_name='$flagN',url_flag='$urlF'
          WHERE id_flag=$id_flag ";

    $result = $conn->query($sql);
    header("location:./flag_page.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            /* display: none; */
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

        .btn {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="drawarr" id="formclubDrawer">
        <button id="closemyclub">Close</button>
        <form id="playerFormgf" action="edit_flag.php" method="POST">
            <input type="hidden" name="id_flag" value=" <?php echo htmlspecialchars($id_flag) ?>">

            <label for="">flag name</label>
            <input type="text" name="flagN" value="<?php echo htmlspecialchars($flagN) ?>">

            <label for="flag">flag URL</label>
            <input type="text" name="urlF" value=" <?php echo htmlspecialchars($urlF) ?>">


            <input type="submit" name="submitFlag" value="submit">

        </form>
    </div>

</body>

</html>
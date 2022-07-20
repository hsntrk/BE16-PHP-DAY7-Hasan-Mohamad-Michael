<?php
session_start();


if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

require_once "components/db_connect.php";


if (isset($_POST["submit"])) {
    $car_id = $_GET["id"];
    $user_id = $_SESSION["user"];
    $date_start = $_POST["date_start"];
    $date_end = $_POST["date_end"];

    $sql = "INSERT INTO rent_info (fk_user_id, fk_car_id, rent_date_start, rent_date_end) VALUES ($user_id, $car_id, '$date_start', '$date_end' )";
    $sql2 = "UPDATE products set status = 'reserved' WHERE id = $car_id";
    $result2 = mysqli_query($connect, $sql2);
    $result = mysqli_query($connect, $sql);
    if ($result && $result2) {
        echo "Success";
        mysqli_close($connect);
        header("refresh:3; url= home.php");
    } else {
        echo "Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rent Car</title>
        <?php require_once 'components/boot.php' ?>
        <style>
        .userImage {
            width: 200px;
            height: 200px;
        }

        .hero {
            background: rgb(2, 0, 36);
            background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }
        </style>
    </head>
</head>

<body>

    <div class="container mt-3">
        <h1>Rent Car Section</h1><br>
        <form method="POST">
            <h4>Rent date start</h4><br>
            <input type="date" name="date_start"><br><br>
            <h4>Rent date end</h4><br>
            <input type="date" name="date_end"><br><br>
            <input class="btn btn-secondary" type="submit" name="submit">
        </form>
    </div>
</body>

</html>
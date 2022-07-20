<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

// Vehicle list

$sql = "SELECT * FROM products left join suppliers ON supplierId =  fk_supplierId WHERE status = 'available'";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)   > 0) {
    while ($rowp = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail' style='width:10rem' src='pictures/" . $rowp['picture'] . "'</td>
            <td>" . $rowp['name'] . "</td>
            <td>" . $rowp['rental_price'] . "</td>
            <td>" . $rowp['status'] . "</td>
            <td>" . $rowp['sup_name'] . "</td>
            <td><a class='btn btn-primary' href='rent.php?id=" . $rowp['id'] . "'>Rent this car</a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}



mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row['first_name']; ?></title>
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

<body>
    <div class="container-fluid m-0 p-0 text-center">
        <div class="hero p-4 mb-3">
            <img class="userImage rounded-circle" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
            <h2 class="text-white mt-4"><strong>&nbsp; Hi
                    <?php echo $row['first_name'] . " " . $row['last_name']; ?></strong> </h2>
        </div>
        <a href="logout.php?logout" class="btn btn-danger me-2">Sign Out</a>
        <a href="update.php?id=<?php echo $_SESSION['user'] ?>" class="btn btn-info">Update your profile</a>

    </div>
    <br>
    <div class="container">
        <p class='h2'>Vehicles</p>
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
                    <th>Picture</th>
                    <th>Model Name</th>
                    <th>Rental Price / day</th>
                    <th>Status</th>
                    <th>Supplier</th>
                    <th>Rent Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
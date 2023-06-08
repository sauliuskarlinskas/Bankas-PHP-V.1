<?php

$usersData = file_get_contents(__DIR__ . '/usersData.json');
$usersData = $usersData ? json_decode($usersData, 1) : [];
$id = (int) $_GET['id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usersData = array_map(function ($u) use ($id) {
        if ($u['id'] == $id) {
            $u['likutis'] = $_POST['likutis'];
        }
        return $u;
    }, $usersData);

    $usersData = json_encode($usersData);
    file_put_contents(__DIR__ . '/usersData.json', $usersData);
    header('Location: http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php');
    die;
}

$userData = array_filter($usersData, fn($u) => $id == $u['id']);
$userData = array_shift($userData);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>editBalance</title>

</head>

<body>
    <div class="container">
        <div class="col m-5">
            <h2>Lėšų pridėjimas</h2>
        </div>
        <div class="col m-5">
            <form action="./editBalance.php?id=<?= $userData['id'] ?>" method="post">
                <label>Pridėti lėšų</label>
                <input type="number" name="likutis" value="<?= $userData['likutis'] ?>">
                <button class="btn btn-success">Išsaugoti</button>
            </form>
        </div>
        <div class="col m-5">
            <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php" class="btn btn-info">Grįžti į pagrindinį
                puslapį</a>
        </div>
    </div>
</body>

</html>
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
    <title>editBalance</title>

</head>

<body>
    <div>
        <div>
            <h2>Lėšų pridėjimas</h2>
        </div>
        <div>
            <form>
                <label>Pridėti lėšų</label>
                <input type="number" name="likutis" value="<?=$userData['likutis'] ?>" >
                <button>Išsaugoti</button>
            </form>
        </div>


        <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php">Grįžti į pagrindinį puslapį</a>
    </div>
</body>

</html>
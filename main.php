<?php
session_start();

//$page = (int) ($_GET['p'] ?? 1);

//if (!in_array($page, [1, 2, 3])) {
//    header('Location: http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php');
//    die();
//}

$jsonFile = file_get_contents(__DIR__ . '/usersData.json');

$dataFromJson = json_decode($jsonFile, 1);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newAccount</title>

</head>

<body>
    <h1>Pagrindinis puslapis</h1>

    <nav>
        <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/newAccount.php?p=1">Naujos sąskaitos sukūrimas</a>
        <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/moneyIn.php?p=2">Pridėti lėšų</a>
        <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/moneyOut.php?p=3">Nuskaičiuoti lėšas</a>
    </nav>

    <li>
        <? echo $dataFromJson ?>

    </li>

</body>

</html>
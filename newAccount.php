<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['vardas'];
    $lastName = $_POST['pavarde'];
    $personalId = $_POST['asmensKodas'];
    $accountNumber = $_POST['saskaitosNumeris'];
    $balance = $_POST['likutis'] ?? 0;

    $usersData = file_get_contents(__DIR__ . '/usersData.json');
    $usersData = $usersData ? json_decode($usersData, 1) : [];

    $usersData[] = [
        'vardas' => $name,
        'pavarde' => $lastName,
        'asmensKodas' => $personalId,
        'saskaitosNumeris' => $accountNumber,
        'likutis' => $balance,
        'id' => rand(100000000, 999999999)
    ];
    $usersData = json_encode($usersData);
    file_put_contents(__DIR__ . '/usersData.json', $usersData);
    header('Location: http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php');
    die;
}
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
    <h1>Naujos sąskaitos sukūrimas</h1>

    <fieldset>
        <form action="http://localhost/zuikiai/Bankas%20PHP%20V.1/newAccount.php" method="post">
            <div>
                <label>Vardas</label>
                <input type="text" name="vardas">
            </div>
            <div>
                <label>Pavardė</label>
                <input type="text" name="pavarde">
            </div>
            <div>
                <label>Saskaitos numeris</label>
                <input type="number" name="saskaitosNumeris">
            </div>
            <div>
                <label>Asmens kodas</label>
                <input type="number" name="asmensKodas">
            </div>
            <div>
                <button type="submit">Sukurti naują saskaitą</button>
            </div>

        </form>
    </fieldset>

    <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php">Grįžti į pagrindinį puslapį</a>
</body>

</html>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['vardas'];
    $lastName = $_POST['pavarde'];
    $bankAcount = $_POST['saskaitosNumeris'];
    $personalCode = $_POST['asmensKodas'];
    $balance = $_POST['likutis'] ?? 0;

    file_put_contents(__DIR__ . '/usersData.json', json_encode([$name, $lastName, $bankAcount, $personalCode, $balance]));

    header('Location:http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php');
    die();

} //else {
   // if (!isset($_GET['vardas'])) {
   //     [$name, $lastName, $bankAcount, $personalCode, $balance] = json_decode(file_GET_contents(__DIR__ . '/usersData.json'));
   // } else {
   //     $name = $_GET['vardas'];
   //     $lastName = $_GET['pavarde'];
//$bankAcount = $_GET['saskaitosNumeris'];
   //     $personalCode = $_GET['asmensKodas'];
   //     $balance = $_GET['likutis'] ?? 0;
 //   }
//}
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
                <input type="text" name="saskaitosNumeris">
            </div>
            <div>
                <label>Asmens kodas</label>
                <input type="text" name="asmensKodas">
            </div>
            <div>
                <button type="submit">Sukurti naują saskaitą</button>
            </div>

        </form>
    </fieldset>

    <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php">Grįžti į pagrindinį puslapį</a>
</body>

</html>
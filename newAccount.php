<?php

$info = $_GET['info'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $personalId = $_POST['personalId'];
    $accountNumber = ['accountNumber'];
    $balance = $_POST['balance'] ?? 0;

    if (strlen($name) < 3 || strlen($lastName) < 3) {
        header('Location: ./newAccount.php?info=5');
        die;
    }

    if (!ctype_digit($personalId) || strlen(trim($personalId)) !== 11) {
        header('Location: ./newAccount.php?info=6');
        die;
    }

   

    $usersData = file_get_contents(__DIR__ . '/usersData.json');
    $usersData = $usersData ? json_decode($usersData, 1) : [];

    $usersData[] = [
        'name' => $name,
        'lastName' => $lastName,
        'personalId' => $personalId,
        'accountNumber' => rand(10000000000, 99999999999),
        'balance' => $balance,
        'id' => rand(100000000, 999999999)
    ];
    $usersData = json_encode($usersData);
    file_put_contents(__DIR__ . '/usersData.json', $usersData);
    header('Location: http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php?info=1');

    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>newAccount</title>

</head>

<body style="background-color:grey;">
    <div class="container">
        <h1 class="col m-5">Naujos sąskaitos sukūrimas</h1>
        <div class="col m-5">
            <fieldset>
                <form action="http://localhost/zuikiai/Bankas%20PHP%20V.1/newAccount.php" method="post">
                    <div>
                        <label class="form-label">Vardas</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div>
                        <label class="form-label">Pavardė</label>
                        <input type="text" name="lastName" class="form-control">
                    </div>

                    <div>
                        <label class="form-label">Asmens kodas</label>
                        <input type="number" name="personalId" class="form-control">
                    </div>
                    <div class="col m-3">
                        <button type="submit" class="btn btn-success">Sukurti naują saskaitą</button>
                    </div>

                </form>
            </fieldset>
        </div>
        <div class="col m-5">
            <?php require __DIR__ . '/infoMsg.php' ?>
        </div>
        <div>
            <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php" class="btn btn-info">Grįžti į pagrindinį
                puslapį</a>
        </div>
    </div>

</body>

</html>
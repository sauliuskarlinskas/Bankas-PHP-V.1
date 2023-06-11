<?php

$usersData = file_get_contents(__DIR__ . '/usersData.json');
$usersData = $usersData ? json_decode($usersData, 1) : [];

$userDataId = (int) $_GET['id'] ?? null;
$userData = null;
if ($userDataId) {
    foreach ($usersData as $usd) {
        if ($usd['id'] == $userDataId) {
            $userData = $usd;
            break;
        }
    }
}

$userDataId = (int) $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $amount = $_POST['amount'];
    if ($amount >= 0) {
        foreach ($usersData as &$u) {
            if ($u['id'] == $userDataId) {
                if ($u['balance'] >= $_POST['amount']) {
                    $u['balance'] -= $amount;

                }
            }
        }

        unset($u);

        $usersData = json_encode($usersData);
        file_put_contents(__DIR__ . '/usersData.json', $usersData);
        header('Location: ./withdrawMoney.php?id=' . $userDataId);
        die;
    }

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
    <title>editBalance</title>

</head>

<body style="background-color:grey;">
    <div class="container">
        <div class="col m-5">
            <h2>Lėšų nuėmimas</h2>
        </div>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Vardas</th>
                    <th scope="col">Pavardė</th>
                    <th scope="col">Asmens kodas</th>
                    <th scope="col">Saskaitos numeris</th>
                    <th scope="col">Likutis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?= $userData['name']; ?>
                    </td>
                    <td>
                        <?= $userData['lastName']; ?>
                    </td>
                    <td>
                        <?= $userData['personalId']; ?>
                    </td>
                    <td>
                        LT:
                        <?= $userData['accountNumber']; ?>
                    </td>
                    <td>
                        <?= $userData['balance']; ?>
                    </td>
                </tr>
            </tbody>
        </table>


        <div class="col m-5">
            <form action="./withdrawMoney.php?id=<?= $userData['id'] ?>" method="post">
                <label>Nuimti lėšų</label>
                <input type="number" name="amount">
                <button type="submit" class="btn btn-success">Nuimti</button>
            </form>
        </div>
        <div class="col m-5">
            <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php" class="btn btn-info">Grįžti į pagrindinį
                puslapį</a>
        </div>
    </div>
</body>

</html>
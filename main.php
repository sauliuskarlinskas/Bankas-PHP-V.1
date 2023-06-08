<?php


$usersData = file_get_contents(__DIR__ . '/usersData.json');

$usersData = $usersData ? json_decode($usersData, 1) : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newAccount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col m-5">
            <h1>Pagrindinis puslapis</h1>
        </div>
        <div class="col m-5">
            <nav>
                <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/newAccount.php?p=1" class="btn btn-info">Naujos
                    sąskaitos sukūrimas</a>

            </nav>
        </div>

        <div class="col">
            <table class="table table-dark table-striped">

                <thead>
                    <tr>
                        <th scope="col">Vardas</th>
                        <th scope="col">Pavarde</th>
                        <th scope="col">Asmens kodas</th>
                        <th scope="col">Saskaitos numeris</th>
                        <th scope="col">Likutis</th>
                    </tr>
                </thead>
                <?php foreach ($usersData as $userData): ?>
                    <tbody>
                        <tr>
                            <td>
                                <?= $userData['vardas']; ?>
                            </td>
                            <td>
                                <?= $userData['pavarde']; ?>
                            </td>
                            <td>
                                <?= $userData['asmensKodas']; ?>
                            </td>
                            <td>
                                <?= $userData['saskaitosNumeris']; ?>
                            </td>
                            <td>
                                <?= $userData['likutis']; ?>
                            </td>
                            <td>
                                <form action="./deleteAccount.php?id=<?= $userData['id'] ?>" method="post">
                                    <button type="submit" class="btn btn-danger">delete</button>
                                    <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/editBalance.php"
                                        class="btn btn-secondary">edit</a>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

</body>

</html>
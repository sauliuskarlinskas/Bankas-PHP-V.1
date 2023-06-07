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

</head>

<body>
    <h1>Pagrindinis puslapis</h1>
    <div>
        <nav>
            <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/newAccount.php?p=1">Naujos sąskaitos sukūrimas</a>

        </nav>
    </div>
    <div>
        <table>
            <?php foreach ($usersData as $userData): ?>
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
                            <button type="submit" >delete</button>
                            <a href="http://localhost/zuikiai/Bankas%20PHP%20V.1/editBalance.php">edit</a>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>

    </div>




</body>

</html>
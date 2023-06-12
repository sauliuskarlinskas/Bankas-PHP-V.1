<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usersData = file_get_contents(__DIR__ . '/usersData.json');
    $usersData = $usersData ? json_decode($usersData, 1) : [];
    $userDataId = (int) $_GET['id'];

    foreach ($usersData as $usd) {
        if ($usd['id'] == $userDataId) {
            if ($usd['balance'] === 0) {
                $usersData = array_filter($usersData, fn($u) => $u['id'] != $userDataId);
            } else {
                header('Location: ./main.php?info=2');
                die;
            }
        }
    }
    $usersData = array_filter($usersData, fn($u) => $id != $u['id']);
    $usersData = json_encode($usersData);


    file_put_contents(__DIR__ . '/usersData.json', $usersData);
    header('Location: http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php?info=3');
    die;
}


//$usersData = array_filter($usersData, fn($u) => $id != $u['id']);
//$usersData = json_encode($usersData);
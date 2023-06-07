<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usersData = file_get_contents(__DIR__ . '/usersData.json');
    $usersData = $usersData ? json_decode($usersData, 1) : [];
    $id = (int) $_GET['id'];

    $usersData = array_filter($usersData, fn($u) => $id != $u['id']);
    $usersData = json_encode($usersData);
    
    file_put_contents(__DIR__ . '/usersData.json', $usersData);
    header('Location: http://localhost/zuikiai/Bankas%20PHP%20V.1/main.php');
    die;
}
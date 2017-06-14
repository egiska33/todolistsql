<?php
require 'conectSQL.php';


$op = 'home';
if (array_key_exists('op', $_GET)) {
    $op = $_GET['op'];
}

if($op == 'task') {
    require 'header.php';
    require 'task.php';
    require 'footer.php';
}

if($op == 'new-task') {
    if (strlen($_POST['title']) > 0 && strlen($_POST['content']) > 0) {
        require 'new-task.php';
        require 'header.php';
        require 'main.php';
        require 'footer.php';
    }else {
        require 'header.php';
        require 'not-complete.php';
        require 'main.php';
        require 'footer.php';
    }
}

if($op == 'delete-task') {
    $id = $_GET['id'];
    $query = $pdo->prepare("DELETE FROM `todolist`  WHERE id = :id ");
    $query->execute(['id' => $id]);
    require 'header.php';
    require 'main.php';
    require 'footer.php';
}

if($op == 'done-task') {
    $id = $_GET['id'];
    $done_task = 'done';
    $query = $pdo->prepare("UPDATE `todolist` SET done_task = :done_task WHERE id = :id ");
    $query -> execute([
        'done_task' => $done_task,
        'id' => $id
    ]);
    require 'header.php';
    require 'main.php';
    require 'footer.php';

}

if($op== 'home') {
    require 'header.php';
    require 'main.php';
    require 'footer.php';
}



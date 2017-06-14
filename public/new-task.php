<?php
$title = '';
if (array_key_exists('title', $_POST)) {
    $title = $_POST['title'];
}
$content = '';
if (array_key_exists('content', $_POST)) {
    $content = $_POST['content'];
}
$priority = '';
if (array_key_exists('priority', $_POST)) {
    $priority = $_POST['priority'];
}
$day = '';
if (array_key_exists('day', $_POST)) {
    $day = $_POST['day'];
}
$month = '';
if (array_key_exists('month', $_POST)) {
    $month = $_POST['month'];
}
$year = '';
if (array_key_exists('year', $_POST)) {
    $year = $_POST['year'];
}
$laikas = mktime(0, 0, 0, $month, $day, $year);
$done_task = 'not_done';

$query = $pdo->prepare("INSERT INTO `todolist` SET `title` = :title, `content` = :content, `laikas` = :laikas, `priority` = :priority, `done_task` = :done_task");
$query->execute([
    'title' => $title,
    'content' => $content,
    'laikas'=> $laikas,
    'priority'=> $priority,
    'done_task'=> $done_task
]);

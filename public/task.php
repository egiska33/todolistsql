<article><section>
    <p><a href="index.php">Back to task list</a></p>
</section>
<section>
    <h3>Task info</h3>
    <?php
    $id = $_GET['id'];
    $query = $pdo->prepare("SELECT * FROM `todolist`  WHERE id = :id ");
    $query->execute(['id'=> $id]);
    $result = $query->fetch();
    ?>

    <h1><?php echo $result['title'] ?></h1>
    <p><?php echo $result['content'] ?></p>
    <p>Priority:<?php echo $result['priority'] ?> </p>
    <p>Deadline:<?php echo date('Y-m-d', $result['laikas']) ?></p>
    <ul>
        <li><a href="?op=done-task&id=<?php echo $result['id'] ?>">Mark as done</a></li>
        <li>
            <a href="?op=delete-task&id=<?php echo $result['id'] ?>">Delete</a>
        </li>
    </ul>
</section></article>
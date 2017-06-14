<article>
    <ul>
        <li>
            <a href="">Title goes here</a>
        </li>
        <?php
        $dabar = time();
        //        tikrinam ar data dar nepraejo, jei praejo pridedam klase 'urgent'
        $query = $pdo->query("SELECT * FROM `todolist` ORDER By laikas ASC ");
        $result = $query->fetchAll();
        $urgent = 'urgent';
        foreach ($result as $key=>$value) {
            if ($value['laikas']< $dabar) {
                echo '<li class="' .$urgent.' '.$value['done_task'].'">';
            } else {
                echo '<li class="' . $value['done_task'] . '">';
            }
            echo '<a href="index.php?op=task&id='.$value['id'].'">'.$value['title'].'</a></li>';
        }
        ?>

    </ul>
    <section>

        <form action="index.php?op=new-task" method="post">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title">
            </div>
            <div>
                <label for="content">Text</label>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="deadline">Deadline</label>
                <select name="day">
                    <?php
                        for ($i=1; $i<=31; $i++) {
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                </select>
                <select name="month">
                    <?php
                        for ($i=1; $i<=12; $i++) {
                            $monthName = date('F', mktime(0, 0, 0, $i, 10));
                            echo '<option value="'.$i.'">'.$monthName.'</option>';
                        }
                    ?>
                </select>
                <select name="year">
                    <?php
                        for ($i=2017; $i<=2022; $i++) {
                            echo'<option value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="priority">Priority</label>
                <label for="priority_low">
                    <input type="radio" id="priority_low" name="priority" value="low"> Low
                </label>
                <label for="priority_normal">
                    <input type="radio" id="priority_normal" name="priority" value="normal" checked> Normal
                </label>
                <label for="priority_high">
                    <input type="radio" id="priority_high" name="priority" value="high"> High
                </label>
            </div>
            <input type="submit" value="submit">
        </form>
    </section>
</article>
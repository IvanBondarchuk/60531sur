
<h2>Создание публикации</h2>
<form method="post" action="insertpub.php" enctype="multipart/form-data">

    <p><label>
            Имя публикации: <input type="text" name="name">
        </label>
    <p><label>
            Дата выпуска: <input type="datetime-local" name="created_at">
        </label>
    <p><label>
            Журнал: <select name="id_journal">
                <?php
                $result = $conn->query("SELECT * FROM journal");
                while ($row = $result->fetch()) {
                    echo '<option value='.$row['id'].'>'.$row['name'].'</option>';

                }
                ?>
            </select>
        </label>

    <p><input type="submit" value="Создать">

</form>
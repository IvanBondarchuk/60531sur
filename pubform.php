
<h2>Создание задачи</h2>
<form method="post" action="insertpub.php" enctype="multipart/form-data">

    <p><label>
            Имя публикации: <input type="text" name="name">
        </label>
    <p><label>
            Дата выпуска: <input type="datetime-local" name="deadline">
        </label>
    <p><label>
            Категория: <select name="id_journal">
                <?
                $result = $conn->query("SELECT * FROM journals");
                while ($row = $result->fetch()) {
                    echo '<option value='.$row['id'].'>'.$row['name'].'</option>';

                }
                ?>
            </select>
        </label>

    <p><input type="submit" value="Создать">

</form>
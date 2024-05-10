<?php
require "dbconnect.php";
if (strlen($_POST['name']) >= 3){

    try {
        $sql = 'INSERT INTO publications(id,id_journal,name,date_publication) VALUES(:id,:id_journal,:name,:date_publication)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->bindValue(':id_category', $_POST['id_category']);
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->bindValue(':date_publication', date('Y-m-d'));
        $stmt->execute();
        $_SESSION['msg'] = "Публикация успешно добавлена";
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления публикации: " . $error->getMessage();
    }

}
else $_SESSION['msg'] = "Ошибка добавления задачи: имя публикации должно содержать не менее 3х символов";

// перенаправление на главную страницу приложения
header('Location: http://60531sur/index.php?page=t');
exit( );
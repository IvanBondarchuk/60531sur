<?php
require "dbconnect.php";

try {
    $sql = 'DELETE FROM publications WHERE publications.id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Публикация успешно удалена";
    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка удаления публикации: " . $error->getMessage();
}
// перенаправление на главную страницу приложения
header('Location: http://60531sur/index.php?page=t');
exit( );

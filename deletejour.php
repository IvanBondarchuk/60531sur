<?php
require "dbconnect.php";

try {
    $sql = 'DELETE FROM journal WHERE journal.id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Журнал успешно удалён";
    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка удаления журнала: " . $error->getMessage();
}
// перенаправление на главную страницу приложения
header('Location: http://60531sur?page=c');
exit( );
<?php
require "dbconnect.php";

try {
    echo ("SELECT * FROM journal WHERE journal.id=".$_GET['id']);
    $result = $conn->query("SELECT * FROM journal WHERE journal.id=".$_GET['id']);
    $row = $result->fetch();
    try {
        $resource = Container::getFileUploader()->delete($row['picture_url']);
    } catch (S3Exception $e) {
        $_SESSION['msg'] = $e->getMessage();
    }
    if ($result->rowCount() == 0) throw new PDOException('Категория не найдена', 1111 );
    $sql = 'DELETE FROM journal WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Журнал успешно удален";
    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка удаления журнала: " . $error->getMessage();
}
// перенаправление на главную страницу приложения
header('Location: http://60531sur?page=c');
exit( );
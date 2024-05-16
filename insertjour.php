<?php
require "dbconnect.php";
if (strlen($_POST['name']) >= 3){
    //получение загруженного файла
    if ($file = fopen($_FILES['filename']['tmp_name'], 'r+')){
        //получение расширения
        $ext = explode('.', $_FILES["filename"]["name"]);
        $ext = $ext[count($ext) - 1];
        $filename = 'file' . rand(100000, 999999) . '.' . $ext;

        $resource = Container::getFileUploader()->store($file, $filename);
        $picture_url = $resource['ObjectURL'];
    }
    else
    {
        $picture_url = '/assets/calendar.png';
    }
    try {
        $sql = 'INSERT INTO journal(id, name) VALUES(:id,:name)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->execute();
        $_SESSION['msg'] = "Журнал успешно добавлен";
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления журнала: " . $error->getMessage();
    }
}
else $_SESSION['msg'] = "Ошибка добавления журнала: имя журнала должно содержать не менее 3х символов";

// перенаправление на страницу категорий
header('Location: http://60531sur/index.php?page=c');
exit( );
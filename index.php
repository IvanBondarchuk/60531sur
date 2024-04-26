<?php
    require "dbconnect.php";

    $result = $conn->query("SELECT * FROM publications") ;
    echo "<h2>Таблица publications</h2>";
    echo 'id'. ' '. 'id_journal'. ' '. 'name'. ' '. 'date_publication'."<br>";
    while ($row = $result->fetch()) {
        echo $row['id']. ' '. $row['id_journal']. ' '. $row['name']. ' '. $row['date_publication']."<br>";

    }
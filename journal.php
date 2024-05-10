<h1>:Журналы публикаций:</h1>
<?php
$result = $conn->query("SELECT journal.id AS id, journal.name AS jname, count(publications.id) as C FROM journal LEFT OUTER JOIN publications ON publications.id_journal=journal.id GROUP BY journal.id");

while ($row = $result->fetch()) {
//style="max-width: 18rem;"
    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-header">Количество публикаций: ' . $row['C'] . '</div>
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-7">
                    <a class="nav-link" href="/index.php?page=t" >
                        <h5 class="card-title">' . $row['jname'] . '</h5>
                    </a>
                    </div>
                    <div class="col-md-1">
                        <a href="deletejour.php?id='.$row['id'].'" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            </div>
            
        </div>
 
    ';
//    echo '<tr>';
//    echo '<td>' .  $row['id']. '</td><td>' . $row['name'] . '</td>';
//    echo '<td><a href=deletecategory.php?id='.$row['id'].'>Удалить</a></td>';
//    echo '</tr>';
}
?>



<h2>Создание журнала</h2>
<form method="post" action="insertjour.php" enctype="multipart/form-data">
    <p><label>
            Имя журнала: <input type="text" name="name">
        </label>
    <p><input type="submit" value="Создать">
</form>
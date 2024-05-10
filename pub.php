<div class="container">





    <h1>Публикации:</h1>
    <div class="list-group">




        <?php

        $result = $conn->query("SELECT *, publications.id AS id_publication, journal.name AS cname, publications.name AS tname FROM publications, journals WHERE publications.id_journal=journals.id AND task.id_user=".$_SESSION['id']);
        while ($row = $result->fetch()) {

            echo '

            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="'.$row['picture_url'].'" alt="twbs" width="32" height="32" class=flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">'.$row['tname'].'</h6>
                </div>

                <small class="opacity-50">Создана: '.$row['created_at'].'</small>
            </div>
        </a>
';


        }
        ?>
    </div class="list-group">
</div>
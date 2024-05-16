<h1>Публикации:</h1>
<?php

        $result = $conn->query("SELECT publications.id AS id, publications.name AS pname, date_publication as created_at, id_journal FROM publications LEFT OUTER JOIN journal ON publications.id_journal=journal.id GROUP BY publications.id");
        while ($row = $result->fetch()) {

            echo '

            <div class="card border-dark mb-3" >
            <div class="card-header"> ' . 'Название публикации - ' . $row['pname'] .'</div>
            <div class="card-body text-dark">
                <div class="row g-0"> 
                    <div class="col-md-10">
                    <a class="nav-link" href="/index.php?page=n" >                  
                        <p class="card-text">' . 'ID журнала - ' .$row['id_journal']  .'</>
                        <p class="card-text">' . 'Дата публикации- ' .$row['created_at']  .'</>
                        </a>          
                    </div>
                    <div class="col-md-2">
                        <a href="deletepub.php?id='.$row['id'].'" class="btn btn-danger">Удалить</a>
                    </div>                    
                </div>             
            </div>           
        </div>
';
        }
        ?>
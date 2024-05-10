<?php
    date_default_timezone_set('Asia/Yekaterinburg');
    require "dbconnect.php";
    require "auth.php";
    require "menu.php";
    echo '<main class="container" style="margin-top: 100px">';
    switch ($_GET['page']){
        case 'c':
            if (isset($_SESSION['login'])) {
                require "journ.php";
            }
            else{
                $msg = 'Войдите в систему для просмотра и создания журналов';
            }
            break;
        case 't':
            if (isset($_SESSION['login'])){
                require "pub.php";
                require "pubform.php";
            }
            else{
                $msg = 'Войдите в систему для просмотра и создания публикаций';
            }
            break;
    }
    echo '</main>';

    if(($_SESSION['msg']!='') or isset($msg)) {
        require "message.php";
        $_SESSION['msg']= '';
    }

    require "footer.php";
?>
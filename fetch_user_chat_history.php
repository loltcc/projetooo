<?php

//fetch_user_chat_history.php

include('database_connection.php');

session_start();

echo fetch_user_chat_history($_SESSION['cod_login'], $_POST['to_user_id'], $connect);

?>

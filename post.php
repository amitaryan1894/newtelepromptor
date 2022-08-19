<?php
session_start();

    $text = $_POST['text'];
     
    file_put_contents("log.html", $text, LOCK_EX);

?>
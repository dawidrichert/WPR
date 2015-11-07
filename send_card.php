<?php 
    require_once('app.php');

    $id = createMessageFile($_POST['senderName'],
                            $_POST['email'],
                            $_POST['message'],
                            isset ($_POST['cardimg']) ? $_POST['cardimg'] : '');

    sendEmail($_POST['senderName'], $_POST['email'], $id);    
?>
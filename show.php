<?php
    require_once('app.php');

    $file = isset($_GET['id']) ?  $_GET['id'] : '';
    $lines = file('messages/'.$file.".txt");
    $picture = $lines['0'];
    $senderName = $lines['1'];
    unset ($lines['0']);
    unset ($lines['1']);
    unset ($lines['2']);
    $message = "";
    foreach ($lines as $value) {
    	$message .= $value;
    }
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kartkomat</title>
      
        <link rel="icon" type="image/png" href="favicon.png" />
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <h2 class="text-center title">
                <span><?php echo $senderName; ?></span> <?php echo getFormattedWordPrzeslac($senderName); ?> Ci kartkę!</h2>
            <center>
                <img class="img-thumbnail" src='cards/full/<?php echo $picture; ?>' alt="postcard" />
                <p class="card-content">
                    <?php echo nl2br(htmlspecialchars($message)); ?>
                </p>
            </center>
        </div>    
        <footer class="footer">
            <div class="container">
                <p class="text-muted">Wykonanie: 
                    <a href="http://www.dawidrichert.com"><strong>Dawid Richert</strong></a> - (s12792)
                </p>
            </div>
        </footer>
    </body>
</html>
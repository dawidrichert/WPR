<?php
    function displayCards() {	
        if ($handle = opendir("cards/thumbs")) {
            echo "<div id='cards'>";
            // Read all files from the actual directory
            while ($file = readdir($handle))  {
                if (!is_dir($file)) {                
                    echo "<div class='radio'>
                            <label>
                                <input type='radio' name='cardimg' value='$file'>
                                <img src='cards/thumbs/$file' alt='card'>
                            </label>
                          </div>";
                }
            }
            echo "</div>";
        }	
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
            <h1 class="text-center title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Kart<span>komat</span></h1>   
            <form id="mainForm" data-toggle="validator" role="form" data-disable="false">
                <label>Wybierz kartkę:</label>
                <?php displayCards(); ?>
                <div class="form-group required">
                    <label class="control-label" for="senderName">Imię nadawcy:</label>
                    <input type="text" class="form-control" id="senderName" name="senderName" required>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="email">E-mail odbiorcy:</label>
                    <input type="email" class="form-control" id="email" name="email" size="30" required>
                </div>
                <div class="form-group required">
                    <label class="control-label" for="message">Treść wiadomości:</label>
                    <textarea type="message" class="form-control" id="message" name="message" rows="10" cols="40" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-primary" data-toggle="tooltip" title="Wypełnij wymagane pola!">
                        Wyślij kartkę <span class="glyphicon glyphicon-send" aria-hidden="true"></span> 
                    </button>
                </div>
            </form>
        </div>    
        <footer class="footer navbar-fixed-bottom">
            <div class="container">
                <p class="text-muted">Wykonanie: 
                    <a href="http://www.dawidrichert.com"><strong>Dawid Richert</strong></a> - (s12792)
                </p>
            </div>
        </footer>
        <div id="modalCardSubmitted" class="modal fade" role="dialog">
            <div class="modal-dialog">    
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Twoja kartka została wysłana pomyślnie!</h4>
                    </div>
                    <div class="modal-body text-center">
                        <img src='img/donald.png' alt="donald"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cardSubmittedOK" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/validator.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
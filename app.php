<?php
    function createMessageFile($senderName, $email, $message, $picture) {
        $id = date('YmdGis');
        $f = fopen('messages/'.$id.".txt","w+");         
        fwrite($f,$picture."\n");
        fwrite($f,$senderName."\n");
        fwrite($f,$email."\n");
        fwrite($f,htmlspecialchars($message)."\n");
        fclose($f);
        return $id;
    }

    function sendEmail($senderName, $email, $id) {
        $fromName  = 'Kartkomat';
        $fromEmail = 'info@dawidrichert.com'; 
        $appURL = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
        
        $from = "From: $fromName <$fromEmail>\r\n";
        $replay = "Reply-To: $fromEmail\r\n";
        $params = "MIME-Version: 1.0\r\n";
        $params .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $mailtext = "Cześć!\r\n\r\n"
                ."$senderName"." właśnie ".getFormattedWordPrzeslac($senderName)." Ci internetową kartkę!\r\n\r\n"
                . "Możesz ją obejrzeć po kliknięciu w link poniżej:\r\n"
                . "$appURL"."/show.php?id=$id\r\n\r\n"
                . "Pozdrawiam,\r\n"
                . "Kartkomat\r\n"
                . $appURL;

        @mail($email, "Otrzymałeś internetową kartkę", $mailtext, $from.$replay.$params);
    }

    function getFormattedWordPrzeslac($firstName) {
        $firstName = trim($firstName);
        $lastChar = substr($firstName, strlen($firstName)-1, 1);
        if ($lastChar == 'a' || $lastChar == 'A') { 
            return 'przesłała';
        }
        else { 
            return 'przesłał';
        }
    }
?>
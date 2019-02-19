<?php
/* ERROR (E) --> will exit script immediately
 * 100 = E-mail was not sent
 *  01 = No receiver provided
 *  02 = No subject provideded => please provide the NO-SUBJECT header.
    * INFORMATION NUMBER = 401
 *  03 = Standard HTML-supported option was not found nor set.
 *  04 = No message provided.
 *  05 = No e-mail extention was found
 *  06 = No $standardFrom was found.
 *  07 = StandardFrom is not on the allowed emailadresses list.
 * 
 * SUCCESS (S) --> will send an e-mail
 * 200 = E-mail sent...
 *  01 = successfully
 *  02 = unsuccesfully, because developer mode was enabled while sending the e-mail. => $dev = true;
 * 
 * CRITICAL (C) --> might exit script
 * 300 = Request was not provided correctly
 *  01 = @request $_REQUEST["NO-SUBJECT"] was set but the value wasn't "true".
 *  02 = Standard HTML-supported option was not set properly => $htmlSupported has to be true or false
 *  03 = HTML option was not provided correctly.
 *  04 = E-mail was not found on list of allowed e-mailadresses
 * 
 * INFORMATION (I) --> won't exit script
 * 400 = Not required but might be an issue
 *  01 = No subject provided
 *  02 = HTML-supported was not provided => searching for standard: not found = E 103
 *  04 = E-mail will be sent empty.
 *  05 = Waiting for input...
 * 
*/
require 'idea.php';
include 'settings.php';
// json_encode($arr);
// implode("\n",$_REQUEST)
/*echo $_SERVER['REQUEST_METHOD'];
print_r($_POST);
print_r($_REQUEST);
print_r($_GET);*/
session_start();
if (isset($_COOKIE["PHPSESSID"])) {
    $sessID = $_COOKIE["PHPSESSID"];
} else {
    header("Refresh:3");
    echo "<h1>The page will reload in three seconds.</h1>";
    exit;
}
if (!isset($_REQUEST["OK"])) {
    require_once 'page.php';
    echo "<pre>I 405</pre>";
    exit;
}
logThis($sessID . " – ".$_SERVER['REQUEST_METHOD']." => ".json_encode($_REQUEST));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-mail Service Provider Sending System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="js/main.js"></script>
</head>
<body>
    
<?php
echo "<pre>";
if (!isset($_REQUEST["TO"]) || empty($_REQUEST["TO"])) {
    echo "E 101";
    echo "</pre>";exit;
} else {
    $to = $_REQUEST["TO"];
}
if (!isset($_REQUEST["SUBJECT"]) || empty($_REQUEST["SUBJECT"])) {
    if (isset($_REQUEST["NO-SUBJECT"])) {
        if ($_REQUEST["NO-SUBJECT"] == "true") {
            $subject = "";
            echo "\nI 401";
        } else if ($_REQUEST["NO-SUBJECT"] == "false") {
            $subject = "";
            echo "\nC 301";
        } else {
            echo "E 104";
            echo "</pre>";exit;
        }
    } else {
        echo "\nE 102";
        echo "</pre>";exit;
    }
} else {
    $subject = $_REQUEST["SUBJECT"];
}
if (!isset($_REQUEST["HTML"]) || empty($_REQUEST["HTML"])) {
    echo "\nI 402";
    if (isset($htmlSupported)) {
        if ($htmlSupported == true) {
            $html = true;
        } else if ($htmlSupported == false) {
            $html = false;
        } else {
            echo "\nC 102";
            echo "</pre>";exit;
        }
    } else {
        echo "\nE 103";
        echo "</pre>";exit;
    }
} else {
    if ($_REQUEST["HTML"] == true) {
        $html = true;
    } else if ($_REQUEST["HTML"] == false) {
        $html = false;
    } else {
        echo "\nC 303";
        if (isset($htmlSupported)) {
            if ($htmlSupported == true) {
                $html = true;
            } else if ($htmlSupported == false) {
                $html = false;
            } else {
                echo "\nE 103";
                echo "</pre>";exit;
            }
        }
    }
}
if (!isset($_REQUEST["MESSAGE"]) || empty($_REQUEST["MESSAGE"])) {

    echo "\nE 104";
    echo "</pre>";exit;

} else {
    
    if ($_REQUEST["MESSAGE"] !== null && $_REQUEST["MESSAGE"] !== "") {
        $message = $_REQUEST["MESSAGE"];
    } else {
        echo "\nI 404";
        $message = "";
    }

}

if (isset($_REQUEST["FROM"]) || empty($_REQUEST["FROM"])) {
    if (allowedEmailAdresses("emails.txt", strtolower($_REQUEST["FROM"]))) {
        if (isset($emailExtention)) {
            $from = strtolower($_REQUEST["FROM"])."@".$emailExtention;
        } else {
            echo "\nE 105";
            echo "</pre>";exit;
        }
    } else {
        echo "\nC 304";
        echo "</pre>";exit;
    }
} else {
    if (isset($standardFrom)) {
        if (allowedEmailAdresses("emails.txt", strtolower($standardFrom))) {
            if (isset($emailExtention)) {
                $from = strtolower($standardFrom)."@".$emailExtention;
            } else {
                echo "\nE 105";
                echo "</pre>";exit;
            }
        } else {
            echo "\nE 107";
            echo "</pre>";exit;
        }  
    } else {
        echo "\nE 106";
        echo "</pre>";exit;
    }
}


$header = "From:".strtolower($from)." \r\n";
//$header .= "Cc:example@example.com \r\n";
if ($html == true) {
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
}
if ($dev == true) {
    $retval = true;
    echo "\nE-mail wasn\'t sent, because developer mode was enabled while sending the e-mail.";
    echo "\nS 202";
} else {
    $retval = mail ($to,$subject,$message,$header);
}
//header("Content-Type: text/plain");
if( $retval == true )
{
    echo "\nMessage sent successfully...";
    echo "\nS 201";
}
else
{
    echo "\nMessage could not be sent...\n";
}
echo "</pre>";
?>
</body>
</html>
<?php
exit;
?>

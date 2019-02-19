<?php
function allowedEmailAdresses($file="emails.txt", $check) {
    $handle = fopen($file, "r") or die("Unable to open file!");
    // Output one line until end-of-file
    $ok = false;
    $i = 0;
    $pattern = '/\s*/m';
    $replace = '';
    if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        $line = preg_replace( $pattern, $replace, $line); // remove any spaces
        if ($line == $check) {
            $ok = true;   
        }
    }
    fclose($handle);
} else {
    // error opening the file.
    echo "<pre>E 100</pre>";
    return false;
} 
    if ($ok == true) {
        return true;
    } else {
        return false;
    }
}

function logThis($log, $file="e-mails.log") {
    $myfile = fopen($file, "a") or die("Unable to open file!");
    $txt = getIP()." => ".date("D d/m/Y G:i s,u e T (P)")."\n";
    fwrite($myfile, $txt);
    $txt = $log."\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    if ($myfile == FALSE) {
        return false;
    } else {
        return true;
    }
}

function getIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

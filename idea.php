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
function getTemplates () {
    $dirs = array_filter(glob('templates/*'), 'is_dir'); // gets all dirs in templates/ .
    return $dirs;
}
/**
* @author : phoenixg
* @source : @link https://gist.github.com/phoenixg/5326222
* 参考自：
* http://darklaunch.com/2010/09/01/http-status-codes-in-php-http-header-response-code-function
* http://snipplr.com/view/68099/
*/

function HTTPStatus($num) {
    $http = array(
        100 => 'HTTP/1.1 100 Continue',
        101 => 'HTTP/1.1 101 Switching Protocols',
        200 => 'HTTP/1.1 200 OK',
        201 => 'HTTP/1.1 201 Created',
        202 => 'HTTP/1.1 202 Accepted',
        203 => 'HTTP/1.1 203 Non-Authoritative Information',
        204 => 'HTTP/1.1 204 No Content',
        205 => 'HTTP/1.1 205 Reset Content',
        206 => 'HTTP/1.1 206 Partial Content',
        300 => 'HTTP/1.1 300 Multiple Choices',
        301 => 'HTTP/1.1 301 Moved Permanently',
        302 => 'HTTP/1.1 302 Found',
        303 => 'HTTP/1.1 303 See Other',
        304 => 'HTTP/1.1 304 Not Modified',
        305 => 'HTTP/1.1 305 Use Proxy',
        307 => 'HTTP/1.1 307 Temporary Redirect',
        400 => 'HTTP/1.1 400 Bad Request',
        401 => 'HTTP/1.1 401 Unauthorized',
        402 => 'HTTP/1.1 402 Payment Required',
        403 => 'HTTP/1.1 403 Forbidden',
        404 => 'HTTP/1.1 404 Not Found',
        405 => 'HTTP/1.1 405 Method Not Allowed',
        406 => 'HTTP/1.1 406 Not Acceptable',
        407 => 'HTTP/1.1 407 Proxy Authentication Required',
        408 => 'HTTP/1.1 408 Request Time-out',
        409 => 'HTTP/1.1 409 Conflict',
        410 => 'HTTP/1.1 410 Gone',
        411 => 'HTTP/1.1 411 Length Required',
        412 => 'HTTP/1.1 412 Precondition Failed',
        413 => 'HTTP/1.1 413 Request Entity Too Large',
        414 => 'HTTP/1.1 414 Request-URI Too Large',
        415 => 'HTTP/1.1 415 Unsupported Media Type',
        416 => 'HTTP/1.1 416 Requested Range Not Satisfiable',
        417 => 'HTTP/1.1 417 Expectation Failed',
        500 => 'HTTP/1.1 500 Internal Server Error',
        501 => 'HTTP/1.1 501 Not Implemented',
        502 => 'HTTP/1.1 502 Bad Gateway',
        503 => 'HTTP/1.1 503 Service Unavailable',
        504 => 'HTTP/1.1 504 Gateway Time-out',
        505 => 'HTTP/1.1 505 HTTP Version Not Supported',
    );
 
    header($http[$num]);
 
    return
        array(
            'code' => $num,
            'error' => $http[$num],
        );
}

<?php
# = CODE STEP COMMENT
require_once 'settings.php';
/**
 * NEW ERROR CODES
 * Error
 * E108 = The provided HTML-value is unknown
 * Critical
 * C305 = that template doesn't exist.
 * C306 = The user's HTML-option was not provided.
 * C307 = not all variables were sent or they haven't been received.
 * C308 = the request will be redone, after the user has been informed, because the HTML-option has to be set to true.
 *      => Critical and not Information, because the script might be stopped.
 */

# STEP 1: get all directories
$dirs = array_filter(glob('templates/*'), 'is_dir');
if ($dev == true) { // print all directories under templates/ .
    print_r( $dirs ); 
}
# STEP 2: Check if a template form was requested
if (isset($_REQUEST["TEMPLATE_FORM"])) {
    $f = "templates/".$_REQUEST["TEMPLATE_FORM"]; // construct
    $s_dir = ""; // selected directory
    foreach ($dirs as $dir) {
        if ($dir == $f) {
            $s_dir = $dir;
            break;
        }
    }
    if ($s_dir == "") {
        die ("C305");
    } else {
        include_once $s_dir.'/info.php'; // $s_dir = templates/[template directory]

        header('Content-type: application/json'); // send it as JSON, header it as JSON.

        $json = json_encode($required_variables);

        echo $json;

        exit;
    }
}
# STEP 3: Check if anything has been submited
if (isset ($_REQUEST["SUBMIT"])) {
    $f = $_REQUEST["SUBMIT"];
    $s_dir = ""; // selected directory
# STEP 4: Check if the directory exists
    foreach ($dirs as $dir) {
        if ($dir == "templates/".$f) {
            $s_dir = $dir;
            break;
        }
    }
# No, it doesn't    
    if ($s_dir == "") {
        die ("C305");
    }
# Yes, it does
        include_once $s_dir.'/info.php'; // $s_dir = templates/[template directory]

# STEP 5: SET SETTINGS        
        $apply_html = false; // Standard HTML-option
        $html = $apply_html; // set user's HTML-option to standard HTML option
# STEP 6: CHECK IF THE USER HAS SUBMITTED AND SET HTML TO ON/OFF
        if (isset ($_REQUEST["HTML"])) {
            $h = $_REQUEST["HTML"];
            if ($h == "true") {
                $html = true;
            } else if ($h == "false") {
                $html = false;
            } else {
# UNKOWN VALUE                
                die("E108");
            }
        } else {            
            die("C306");
        }
# STEP 7: CHECK IF HTML IS REQUIRED
        if ($require_html == true) {
            if ($html == false) {
# ASK IF THE USER WOULD LIKE TO TURN ON HTML         
                echo "C308";
                exit;
            } else {
                $apply_html = true;
            }
        }
# STEP 8: CONFIGURE VARIABLES
        $v = []; // by the user filled in variables
        $x = 0;
# STEP 9: SET VARIABLES
        foreach ($required_variables as $req => $des) {
            $x++;
            if (isset ($_REQUEST['var_'.$req])) { // send data as: var_[name]
                $v[$req] = $_REQUEST['var_'.$req];
            } else {
                die("C307");
            }
        }
# STEP 10: SET E-MAIL TEMPLATE VARIABLE
        $e_mail_template = ""; // DON'T TOUCH ME!
# STEP 11: INCLUDE TEMPLATE
        include_once $s_dir.'/template.php';
# DEVELOPER FUNCTION: READABLE TEXT
        if ($dev == true) {
            // everything is sent as HTML. This just makes it better readable for the developer
            header('Content-type: text/plain');
        }
# STEP 12: ECHO RESULTS
        echo $e_mail_template;
# STEP 13: EXIT SCRIPT        
        exit;        
} else {
# STEP 14: SOMETHING ELSE IS GOING ON! SEND A 403 FORBIDDEN
    require_once 'http-status-codes.php';
    HTTPStatus(403);
# STEP 15: EXIT SCRIPT        
exit;        
}
# STEP 16: OUT OF (IF) STATEMENT
require_once 'http-status-codes.php';
HTTPStatus(403);
# STEP 17: EXIT SCRIPT
exit;
?>
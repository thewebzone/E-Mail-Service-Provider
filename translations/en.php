<?php
$_T[""] = "";

$_T["LANG_NOT_SUPPORTED"] = "That language isn't supported.";
$_T["CHOOSE_LANG"] = "Choose this language";
$_T["TPWRA3S"] = "The page will reload in three seconds.";
$_T["TITLE"] = "E-mail Service Provider Sending System";

$_T["NEMDWF"] = "No e-mail domain was found.";
$_T["NEMDWF_INSTRUCTIONS"] = "Go to emails.txt to set the e-mail domain.";

$_T["S_202"] = "Your e-mail wasn't sent, because developer mode was enabled while sending the e-mail. The following messages are a simulation of ".$_T["TITLE"];;
$_T["S_201"] = "Message sent successfully...";

$_T["MCNBS"] = "Your message could not be sent...";

$_T["E-mail"] = "E-mail";
$_T["EXAMPLE_FROM"] = "example";
$_T["EXAMPLE_TO"] = "email@address.com";
$_T["EXAMPLE_SUBJECT"] = "subject";
$_T["EXAMPLE_MSG"] = "Dear ...";
$_T["FROM"] = "From";
$_T["TO"] = "To";
$_T["SUBJECT"] = "Subject";
$_T["MSG"] = "Message";
$_T["HTML_SUPPORT"] = "This e-mail is in HTML";
$_T["HTML_SUPPORT_YES"] = "Yes";
$_T["HTML_SUPPORT_NO"] = "No";

$_T["SEND_BTN"] = "Send";

$_T["INFO_CODES"] = "Information Codes";
    // $_T["IC_"] = "";
    $_T["IC_E"] = "ERROR";
    $_T["IC_E_EXPL"] = "will exit script immediately.";
    $_T["IC_E_100"] = "E-mail was not sent.";
    $_T["IC_E_101"] = "No receiver provided.";
    $_T["IC_E_102"] = "No subject provided";
    $_T["IC_E_102_SOLUTION"] = "please provide the NO-SUBJECT header.";
    $_T["IC_E_102_IN"] = "INFORMATION NUMBER";
    $_T["IC_E_103"] = "Standard HTML-supported option was not found nor set.";
    $_T["IC_E_104"] = "No message provided.";
    $_T["IC_E_105"] = "No e-mail extension was found.";
    $_T["IC_E_106"] = 'No <span style="color: #0000ff;">var</span> <span style="color: #339966;">$standardFrom</span> was found.'; // No <span style="color: #0000ff;">var</span> <span style="color: #339966;">$standardFrom</span> was found.
    $_T["IC_E_107"] = "StandardFrom is not on the allowed e-mail addresses list.";
    $_T["IC_E_108"] = "The provided HTML-value is unknown.";

    $_T["IC_S"] = "SUCCESS";
    $_T["IC_S_EXPL"] = "will send an e-mail.";
    $_T["IC_S_200"] = "E-mail sent...";
    $_T["IC_S_201"] = "...successfully.";
    $_T["IC_S_202"] = "...unsuccessfully, because developer mode was enabled while sending the e-mail.";

    $_T["IC_C"] = "CRITICAL";
    $_T["IC_C_EXPL"] = "might exit script.";
    $_T["IC_C_300"] = "Request was not provided correctly.";
    $_T["IC_C_301"] = "was set but the value wasn't"; //  REQUEST NO-SUBJECT was set, but the value wasn't "true".
    // Standard HTML-supported option was not set properly => $_T["IC_C_302_PRE"] var $htmlSupported has to be true or false$_T["IC_C_302_POST"].
    $_T["IC_C_302"] = "Standard HTML-supported option was not set properly.";
    $_T["IC_C_302_PRE"] = ""; // not required in English.
    $_T["IC_C_302_S2"] = "has to be";
    $_T["IC_C_302_OR"] = "or";
    $_T["IC_C_302_POST"] = "."; // no text required in English.
    $_T["IC_C_303"] = "HTML option was not provided correctly.";
    $_T["IC_C_304"] = "The e-mail address was not found on the list of allowed e-mail addresses.";
    $_T["IC_C_305"] = "That template doesn't exist.";
    $_T["IC_C_306"] = "The user's HTML-option was not provided.";
    $_T["IC_C_307"] = "Not all variables were sent or they haven't been received.";
    $_T["IC_C_308"] = "The request will be redone, after the user has been informed, because the HTML-option has to be set to <span style='color: rgb(69, 113, 150);'>true</span>.";

    $_T["IC_I"] = "INFORMATION";
    $_T["IC_I_EXPL"] = "won't exit script.";
    $_T["IC_I_400"] = "Not required but might be an issue.";
    $_T["IC_I_401"] = "No subject provided.";
    // HTML-supported option was not provided. => We are now searching for the standard option. If the standard option isn't found => E 103
    $_T["IC_I_402"] = "HTML-supported option was not provided.";
    $_T["IC_I_402_S2"] = "We are now searching for the standard option. If the standard option isn't found";

    // I403 is missing, I know.
    $_T["IC_I_404"] = "Your e-mail will be sent empty.";
    $_T["IC_I_405"] = "Waiting for an input...";
?>

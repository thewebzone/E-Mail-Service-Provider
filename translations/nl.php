<?php
$_T[""] = "";

$_T["LANG_NOT_SUPPORTED"] = "Die taal wordt niet ondersteund.";
$_T["CHOOSE_LANG"] = "Kies deze taal";
$_T["TPWRA3S"] = "De pagina zal over drie seconden worden herladen.";
$_T["TITLE"] = "E-mail Service Provider Verstuur Systeem";

$_T["NEMDWF"] = "Er is geen e-maildomein gevonden.";
$_T["NEMDWF_INSTRUCTIONS"] = "Ga naar emails.txt om het e-maildomein in te stellen.";

$_T["S_202"] = "Uw e-mail is niet verzonden, omdat de ontwikkelaarsmodus is ingeschakeld. Onderstaande berichten zijn een simulatie van ".$_T["TITLE"];
$_T["S_201"] = "Bericht succesvol verzonden...";

$_T["MCNBS"] = "Uw bericht kon niet verzonden worden...";

$_T["E-mail"] = "E-mail";
$_T["EXAMPLE_FROM"] = "voorbeeld";
$_T["EXAMPLE_TO"] = "email@voorbeeld.nl";
$_T["EXAMPLE_SUBJECT"] = "onderwerp";
$_T["EXAMPLE_MSG"] = "Beste ...";
$_T["FROM"] = "Van";
$_T["TO"] = "Naar";
$_T["SUBJECT"] = "Onderwerp";
$_T["MSG"] = "Bericht";
$_T["HTML_SUPPORT"] = "Deze e-mail is in HTML";
$_T["HTML_SUPPORT_YES"] = "Ja";
$_T["HTML_SUPPORT_NO"] = "Nee";

$_T["SEND_BTN"] = "Versturen";

$_T["INFO_CODES"] = "Informatiecodes";
    // $_T["IC_"] = "";
    $_T["IC_E"] = "FOUT";
    $_T["IC_E_EXPL"] = "zal het script onmiddellijk afsluiten.";
    $_T["IC_E_100"] = "E-mail is niet verzonden.";
    $_T["IC_E_101"] = "Er is geen ontvanger opgegeven.";
    $_T["IC_E_102"] = "Er is geen onderwerp opgegeven.";
    $_T["IC_E_102_SOLUTION"] = "geef alstublieft de NO-SUBJECT header door.";
    $_T["IC_E_102_IN"] = "INFORMATIENUMMER";
    $_T["IC_E_103"] = "Standaard HTML-ondersteunde optie is niet gevonden of ingesteld.";
    $_T["IC_E_104"] = "Er is geen bericht opgegeven.";
    $_T["IC_E_105"] = "Er is geen e-mailextensie gevonden.";
    $_T["IC_E_106"] = '<span style="color: #0000ff;">var</span> <span style="color: #339966;">$standardFrom</span> is niet gevonden.'; // No <span style="color: #0000ff;">var</span> <span style="color: #339966;">$standardFrom</span> was found.
    $_T["IC_E_107"] = "StandardFrom staat niet op de lijst met toegestane e-mailadressen.";
    $_T["IC_E_108"] = "De gestuurde HTML-waarde is onbekend.";

    $_T["IC_S"] = "SUCCES";
    $_T["IC_S_EXPL"] = "zal een e-mail versturen.";
    $_T["IC_S_200"] = "De e-mail is verzonden...";
    $_T["IC_S_201"] = "...met succes.";
    $_T["IC_S_202"] = "...zonder succes, omdat de ontwikkelaarsmodus was ingeschakeld tijdens het verzenden van de e-mail.";

    $_T["IC_C"] = "ZORGWEKKEND";
    $_T["IC_C_EXPL"] = "sluit het script misschien af.";
    $_T["IC_C_300"] = "Verzoek is niet correct ingediend.";
    $_T["IC_C_301"] = "is ingesteld, maar de waarde was niet"; //  REQUEST NO-SUBJECT was set, but the value wasn't "true".
    // Standard HTML-supported option was not set properly => $_T["IC_C_302_PRE"] var $htmlSupported has to be true or false$_T["IC_C_302_POST"].
    $_T["IC_C_302"] = "Standaard HTML-ondersteunde optie is niet correct ingesteld.";
    $_T["IC_C_302_PRE"] = ""; // not required in Dutch.
    $_T["IC_C_302_S2"] = "moet";
    $_T["IC_C_302_OR"] = "of";
    $_T["IC_C_302_POST"] = " zijn."; // required in Dutch.

    $_T["IC_C_303"] = "HTML-optie is niet juist verstrekt.";
    $_T["IC_C_304"] = "Het e-mailadres is niet gevonden in de lijst met toegestane e-mailadressen.";
    $_T["IC_C_305"] = "Dat sjabloon bestaat niet.";
    $_T["IC_C_306"] = "De HTML-optie van de gebruiker is niet meegestuurd.";
    $_T["IC_C_307"] = "Niet alle variabelen zijn verzonden of de variabelen zijn niet ontvangen.";
    $_T["IC_C_308"] = "Het verzoek zal worden herhaald nadat de gebruiker is geïnformeerd, omdat de HTML-optie <span style='color: rgb(69, 113, 150);'>true</span> moet zijn.";

    $_T["IC_I"] = "INFORMATIE";
    $_T["IC_I_EXPL"] = "zal het script niet beëindigen.";
    $_T["IC_I_400"] = "Niet verplicht, maar kan wel een probleem zijn.";
    $_T["IC_I_401"] = "Er is geen onderwerp opgegeven.";
    // HTML-supported option was not provided. => We are now searching for the standard option. If the standard option isn't found => E 103
    $_T["IC_I_402"] = "De HTML-ondersteunde optie is niet verstrekt.";
    $_T["IC_I_402_S2"] = "We zoeken nu naar de standaardoptie. Als de standaardoptie niet wordt gevonden";

    // I403 is missing, I know.
    $_T["IC_I_404"] = "Uw e-mail wordt leeg verzonden.";
    $_T["IC_I_405"] = "Aan het wachten op invoer...";
?>

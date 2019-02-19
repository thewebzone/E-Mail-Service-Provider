<?php
include 'settings.php';
if (isset($emailExtention)) {
    $email = $emailExtention;
} else {
    echo "<h1>No e-mail domain was found</h1>";
    echo "<h2>Go to emails.txt to set the e-mail domain.</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-mail Service Provider</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="js/main.js"></script>
</head>
<body>
<h1 id="titel"></h1>
<div id="voorbeeld"></div>
<h1>E-mail</h1>
    <form action="/E-mail/" method="POST">
    From:        <input type="text" name="FROM" placeholder="example">@<?php echo $email; ?><br/>
    To:        <input type="email" name="TO" placeholder="email@adres.nl" /><br>
    Subject:  <input type="text" name="SUBJECT" placeholder="subject" /><br>
    Message:    <br/>
                <textarea name="MESSAGE" onchange="update()" placeholder="Dear ..." id="bericht"></textarea><br/>
    This e-mail is in HTML:<br>
    <label class="container">Yes
  <input type="radio" name="HTML" onchange="update()" id="html" value="true">
  <span class="checkmark"></span>
</label>
<label class="container">No
  <input type="radio" checked="checked" onchange="update()" name="HTML" id="html-false" value="false">
  <span class="checkmark"></span>
</label>
<input type="text" value="OK" name="OK" style="display: none;" />
<input type="submit" value="Send it">
    </form>
<h1 style="font-size: 5vw;">Information Codes</h1>
<h1>ERROR (<span style="color: #ff0000;">E</span>) --&gt; will exit script immediately</h1>
<h2>100 = E-mail was not sent</h2>
<ul>
<li>01 = No receiver provided</li>
<li>02 = No subject provideded =&gt; please provide the NO-SUBJECT header.
<ul>
<li>INFORMATION NUMBER = <span style="color: #00ff00;">I 401</span></li>
</ul>
</li>
<li>03 = Standard HTML-supported option was not found nor set.</li>
<li>04 = No message provided.</li>
<li>05 = No e-mail extension was found</li>
<li>06 = No <span style="color: #0000ff;">var</span> <span style="color: #339966;">$standardFrom</span> was found.</li>
<li>07 = StandardFrom is not on the allowed e-mail addresses list.</li>
</ul>
<h1>SUCCESS (<span style="color: #008000;">S</span>) --&gt; will send an e-mail</h1>
<h2>200 = E-mail sent...</h2>
<ul>
<li>01 = successfully</li>
</ul>
<h1>CRITICAL (<span style="color: #ff6600;">C</span>) --&gt; might exit script</h1>
<h2>300 = Request was not provided correctly</h2>
<ul>
<li>01 = <span style="color: #0000ff;">REQUEST</span> <span style="color: #339966;">NO-SUBJECT</span> was set but the value wasn't "true".</li>
<li>02 = Standard HTML-supported option was not set properly =&gt; <span style="color: #0000ff;">var</span> <span style="color: #339966;">$htmlSupported</span> has to be true or false</li>
<li>03 = HTML option was not provided correctly.</li>
<li>04 = E-mail was not found on list of allowed e-mail adresses</li>
</ul>
<h1>INFORMATION (<span style="color: #00ff00;">I</span>) --&gt; won't exit script</h1>
<h2>400 = Not required but might be an issue</h2>
<ul>
<li>01 = No subject provided</li>
<li>02 = HTML-supported was not provided =&gt; searching for standard: not found = <span style="color: #ff0000;">E 103</span></li>
<li>04 = E-mail will be sent empty.</li>
<li>05 = Waiting for input...</li>
</ul>
<div>&nbsp;</div>
</body>
</html>

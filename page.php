<?php
include_once 'settings.php';
if (isset($emailExtention)) {
    $email = $emailExtention;
} else {
    echo "<h1>".$_T["NEMDWF"]."</h1>";
    echo "<h2>".$_T["NEMDWF_INSTRUCTIONS"]."</h2>";
    exit;exit();
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-mail Service Provider</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="js/main.js"></script>
</head>

<body>
<?php
if ($changed == false) {
    echo $_T["LANG_NOT_SUPPORTED"];
}
?>
    <h1 id="titel"></h1>
    <div id="voorbeeld"></div>
    <h1>
        <?php echo $_T["E-mail"]; ?>
    </h1>
    <form action="/E-mail/" method="GET">
        <select name="lang">
            <?php 
    foreach ($langs as $l => $name) {
        if ($lang == $l) {
            echo '<option selected value="'.$l.'">'.$name.'</option>';
        } else {
            echo '<option value="'.$l.'">'.$name.'</option>';
        }
    }
  ?>
        </select><br/>
        <input style="font-size: 1vw;border: 1px solid grey;border-radius: 25px;" type="submit" value="<?php echo $_T["CHOOSE_LANG"]; ?>" />
    </form>
    <br/>
    <form action="/E-mail/" method="POST">
        <?php echo $_T["FROM"]; ?>: <input type="text" name="FROM" placeholder="<?php echo $_T["EXAMPLE_FROM"]; ?>">@
        <?php echo $email; ?><br />
        <?php echo $_T["TO"]; ?>: <input type="email" name="TO" placeholder="<?php echo $_T["EXAMPLE_TO"]; ?>" /><br>
        <?php echo $_T["SUBJECT"]; ?>: <input type="text" name="SUBJECT" placeholder="<?php echo $_T["EXAMPLE_SUBJECT"]; ?>" /><br>
        <?php echo $_T["MSG"]; ?>: <br />
        <textarea name="MESSAGE" onchange="update()" placeholder="<?php echo $_T["EXAMPLE_MSG"]; ?>" id="bericht"></textarea><br />
        <?php echo $_T["HTML_SUPPORT"]; ?>:<br>
        <label class="container">
            <?php echo $_T["HTML_SUPPORT_YES"]; ?>
            <input type="radio" name="HTML" onchange="update()" id="html" value="true">
            <span class="checkmark"></span>
        </label>
        <label class="container">
            <?php echo $_T["HTML_SUPPORT_NO"]; ?>
            <input type="radio" checked="checked" onchange="update()" name="HTML" id="html-false" value="false">
            <span class="checkmark"></span>
        </label>
        <input type="text" value="OK" name="OK" style="display: none;" />
        <input style="border: 2px solid grey;border-radius: 25px;" type="submit" value="<?php echo $_T["SEND_BTN"]; ?>">
    </form>
    <h1 style="font-size: 5vw;">
        <?php echo $_T["INFO_CODES"]; ?>
    </h1>
    <h1>
        <?php echo $_T["IC_E"]; ?> (<span style="color: #ff0000;">E</span>) --&gt;
        <?php echo $_T["IC_E_EXPL"]; ?>
    </h1>
    <h2>100 =
        <?php echo $_T["IC_E_100"]; ?>
    </h2>
    <ul>
        <li>01 =
            <?php echo $_T["IC_E_101"]; ?>
        </li>
        <li>02 =
            <?php echo $_T["IC_E_102"]; ?> =&gt;
            <?php echo $_T["IC_E_102_SOLUTION"]; ?>
            <ul>
                <li>
                    <?php echo $_T["IC_E_102_IN"]; ?> = <span style="color: #00ff00;">I 401</span></li>
            </ul>
        </li>
        <li>03 =
            <?php echo $_T["IC_E_103"]; ?>
        </li>
        <li>04 =
            <?php echo $_T["IC_E_104"]; ?>
        </li>
        <li>05 =
            <?php echo $_T["IC_E_105"]; ?>
        </li>
        <li>06 =
            <?php echo $_T["IC_E_106"]; ?>
        </li>
        <li>07 =
            <?php echo $_T["IC_E_107"]; ?>
        </li>
    </ul>
    <h1>
        <?php echo $_T["IC_S"]; ?> (<span style="color: #008000;">S</span>) --&gt;
        <?php echo $_T["IC_S_EXPL"]; ?>
    </h1>
    <h2>200 =
        <?php echo $_T["IC_S_200"]; ?>
    </h2>
    <ul>
        <li>01 =
            <?php echo $_T["IC_S_201"]; ?>
        </li>
        <li>02 =
            <?php echo $_T["IC_S_202"]; ?> =&gt; <span style="color: #0000ff;">var</span> <span style="color: #339966;">$dev</span>
            = <span style="color: rgb(69, 113, 150);">true</span>;</li>
    </ul>
    <h1>
        <?php echo $_T["IC_C"]; ?> (<span style="color: #ff6600;">C</span>) --&gt;
        <?php echo $_T["IC_C_EXPL"]; ?>
    </h1>
    <h2>300 =
        <?php echo $_T["IC_C_300"]; ?>
    </h2>
    <ul>
        <li>01 = <span style="color: #0000ff;">REQUEST</span> <span style="color: #339966;">NO-SUBJECT</span>
            <?php echo $_T["IC_C_301"]; ?> "<span style="color: rgb(69, 113, 150);">true</span>".</li>
        <li>02 =
            <?php echo $_T["IC_C_302"]; ?> =&gt; <?php echo $_T["IC_C_302_PRE"]; ?> <span style="color: #0000ff;">var</span> <span style="color: #339966;">$htmlSupported</span>
            <?php echo $_T["IC_C_302_S2"]; ?> <span style="color: rgb(69, 113, 150);">true</span> or <span style="color: rgb(69, 113, 150);">false</span><?php echo $_T["IC_C_302_POST"]; ?></li>
        <li>03 =
            <?php echo $_T["IC_C_303"]; ?>
        </li>
        <li>04 =
            <?php echo $_T["IC_C_304"]; ?>
        </li>
    </ul>
    <h1>
        <?php echo $_T["IC_I"]; ?> (<span style="color: #00ff00;">I</span>) --&gt;
        <?php echo $_T["IC_I_EXPL"]; ?>
    </h1>
    <h2>400 =
        <?php echo $_T["IC_I_400"]; ?>
    </h2>
    <ul>
        <li>01 =
            <?php echo $_T["IC_I_401"]; ?>
        </li>
        <li>02 =
            <?php echo $_T["IC_I_402"]; ?> =&gt; =&gt;
            <?php echo $_T["IC_I_402_S2"]; ?> <span style="color: #ff0000;">E 103</span></li>
        <li>04 =
            <?php echo $_T["IC_I_404"]; ?>
        </li>
        <li>05 =
            <?php echo $_T["IC_I_405"]; ?>
        </li>
    </ul>
    <div>&nbsp;</div>
</body>

</html>
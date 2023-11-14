<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formhandler</title>
</head>
<body>
    <h1>Takk for at du sendte inn</h1>
<?php
#echo "Dette er fra PHP: ";
#echo var_dump($_GET);
#echo var_dump($_POST);

$msg = "";
$sender = "";
$to = "lasse@geek.no";
$noreply = "norepy@geek.no";
if ($_GET) {
    #echo "<br>Det er data her...";
    foreach($_GET as $key => $value) {
        $msg .= "\t"."$key: $value"."\r\n";
        if ($key == "email"){
            $sender = $value;
        }
    }
}

#echo "<pre>";
#echo var_dump($msg);
#echo "</pre>";

if ($msg && $sender) {
    echo "<p>Skal prøve å sende mail...</p>";
    $msg = "Dette ble sendt inn: "."\r\n".$msg;
    if (mail($to, $sender, $msg) && mail($sender, $to, $msg)) {
        echo "<p>Mailen har blitt sendt...</p>";
    } else {
        echo "<p>Beklager, kunne sende mail, prøv igjen</p>";
    }
} else {
    echo "<p>Beklager, finner ingenting å sende, prøv igjen</p>";
}

?>
    <p><a href="index.html">Back</a></p>
</body>
</html>



<?php

require_once "db.inc.php";

require_once "functions.inc.php";

if ($argc != 3) {
    echo "Usage: ".$argv[0]." <artist> <title>\n";
    exit;
}

$l = getLyrics($argv[1], $argv[2]);

echo $l;
?>

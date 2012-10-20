<?php


if ($argc != 3) {
    echo "Usage: ".$argv[0]." <artist> <title>\n";
    exit;
}
$artist = urlencode(preg_replace('! !', '_', $argv[1])); 
$title = urlencode(preg_replace('! !', '_', $argv[2]));

$url = "http://lyrics.wikia.com/Gracenote:$artist:$title";

$f = file($url);

$l = '';

$active = false;

foreach ($f AS $line) {
    if (preg_match('!Ringtone!', $line)) {
        $l = $line;
        break;
    }
}

$l = preg_replace('!^.+?phone_right.gif.+?<p>!', '', $l);
$l = preg_replace('/<!--.+?$/', '', $l);
$l = preg_replace('!<br />!', "\n", $l);

$l = html_entity_decode($l, ENT_QUOTES);



echo $l;
?>

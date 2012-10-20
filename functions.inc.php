<?php

function getLyrics($artist, $title) {
$artist = urlencode(preg_replace('! !', '_', $artist)); 
$title = urlencode(preg_replace('! !', '_', $title));

$url = "http://lyrics.wikia.com/Gracenote:$artist:$title";

$f = file($url);

if (!$f) {
    return false; 
}

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



return $l;
}

?>

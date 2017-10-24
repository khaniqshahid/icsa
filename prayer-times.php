<?php
$file = file_get_contents('http://www.islamicfinder.org/prayer_service.php?country=ireland&city=athlone&state=29&zipcode=&latitude=53.4228&longitude=-7.9372&timezone=0&HanfiShafi=2&pmethod=3&fajrTwilight1=10&fajrTwilight2=10&ishaTwilight=0&ishaInterval=0&dhuhrInterval=2&maghribInterval=5&dayLight=1&simpleFormat=xml');

$shalat = json_decode(json_encode((array)simplexml_load_string($file)),1);

echo "<table class=prayer-times border=0>";
echo "<tr><td colspan=2>".$shalat['hijri'];

echo "<tr><td>Fajr <td>".date("g:i a", strtotime("$shalat[fajr] am"));


$dhuhr = date("H", strtotime($shalat['dhuhr']));

if($dhuhr=11) {
echo "<tr><td>Sunrise <td>".date("g:i a", strtotime("$shalat[dhuhr] am"));	
}
if($dhuhr=12) {
echo "<tr><td>Dhuhr <td>".date("g:i a", strtotime("$shalat[dhuhr] pm"));	
}

echo "<tr><td>Ashr <td>".date("g:i a", strtotime("$shalat[asr] pm"));
echo "<tr><td>Maghrib <td>".date("g:i a", strtotime("$shalat[maghrib] pm"));
echo "<tr><td>Isha <td>".date("g:i a", strtotime("$shalat[isha] pm"));
echo "</table>";

?>
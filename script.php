<?php

error_reporting(E_ALL);
set_time_limit(0);

$furnidata_txt_link = "https://swf.habbocity.me/gamedata/furnidata_2884441y959994259.txt?1616421544";

@mkdir("icon");
@mkdir("swf");

$arrRequestHeaders = array('http' => array('method' =>'GET', 'protocol_version' => 1.1, 'follow_location' => 1, 'header'=> "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"));
$data = file_get_contents($furnidata_txt_link, false,  stream_context_create($arrRequestHeaders));
$data = str_replace(["&", "<"], ["et", ""], utf8_encode($data));
echo "\nHabboCity All Furnis Downloader\nScript by PHB - https://discord.gg/xeK9EBrnaR\n\n\n";
foreach(explode('[',$data) as $premier) {
    $var = explode('",',$premier);
    $var = str_replace(['"', '],'], ['', ''], $var);

    if(!$var[2] = @str_replace("*", "_", $var[2])) continue;
    if(file_exists("icon/" . $var[2] . "_icon.png")) continue;
                
    echo "Downloading ".$var[2]."...\n";
    @copy("https://swf.habbocity.me/dcr/hof_furni/" . $var[2] . ".swf", "swf/" . $var[2] . ".swf", stream_context_create($arrRequestHeaders));
    @copy("https://swf.habbocity.me/dcr/hof_furni/icons2/" . $var[2] . "_icon.png", "icon/" . $var[2] . "_icon.png", stream_context_create($arrRequestHeaders));
}

?>
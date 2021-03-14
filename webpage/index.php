<?php
$_REQUEST = array("190M Mix", "mypicks", "playlist");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Music Viewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="viewer.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="header">

    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>


<div id="listarea">
    <ul id="musiclist">
        <?php
        foreach (glob("songs/*.mp3") as $song){
            ?>
            <li class="mp3item"> <a href="<?=$song?>"><?=basename($song)?></a>
                <?php
                $size=filesize($song);
                if ($size<=1023)
                    print "(" . $size . " b" . ")";
                elseif ($size>1023 && $size<=1048575)
                {
                    $size/=1024;
                    print "(" . round($size,2) . " kb" . ")";
                }
                else
                    {
                    $size/=1024 * 1024;
                    print "(" . round($size, 2) . " mb" . ")";
                }
                    ?></li>
        <?php } ?>

        <?php
        foreach (glob("songs/*.txt") as $text){
            ?>
            <li class="playlistitem"> <a href="<?=$text?>"><?=basename($text)?></a></li>
        <?php } ?>

    </ul>
</div>
</body>
</html>


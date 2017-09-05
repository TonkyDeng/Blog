 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Web Music</title>

<link href="css/style.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript">
        var s="<?=qqMusic($_GET['edit'])?>";
        var srcs=s.split("*");
    </script>

<script src="js/script.js"></script>
<script charset="gb2312" src="js/lrc.js"></script>
</head>


<body>
<div id="all" class="all">
	
	
	<div id="musicplayer" class="musicplayer">
		
		<audio 
		id="music"
		>
		</audio>
		
		<button id="play_button" 
				class="play_css"
				onclick="Play();">
		</button>
		
		<button id="stop_button"
				class="stop_css"
				onclick="Stop();">
		</button>

		<button 
				id="next_one" 
				class="next_one_css">		
		</button>
		<button id="previous_track"
				class="previous_track_css">
		</button>

		<span id="time" class="time_css"></span>

		<progress id="progress" 
				  class="progress_css"
				  max="100"
				  value="0" 
				  >
		</progress>

		<span id="click_progress"
	              class="progress_css" 
	              style="background:rgba(255,255,255,0);cursor: pointer;"></span>

		<button id="drag_button"
				class="drag_css"
				>
		</button>

		<span id="lrc" class="lrc_css"></span>

		<button id="volume" class="volume_css"></button>

		<span id="volume_ctrl" class="volume_ctrl_css">
			
			<progress id="progress_volume" 
					  class="progress_volume_css" 
					  value="0.5" max="1">
			</progress>
			<span id="volume_click_progress"
	              class="progress_volume_css" 
	              style="background:rgba(255,255,255,0);cursor: pointer;"></span>
			<button id="volume_drag_button"
					class="volume_drag_css">
			</button>

		</span>
	</div>
	<progress id="music_Buffer" 
			  class="music_Buffer_css"  
			  max="100">
	</progress>
    <form name="form" action="music.php" method="get">
    <input name="edit" type="text" class="musicplayer" placeholder="歌名/歌手/专辑"
           style="height:30px;width:560px;top: 360px;border: none ;color: antiquewhite;font-size: 16px;"/>
    <input name="search" type="submit" class="musicplayer"
            style="width: 40px;height: 30px;top: 360px;left: 1040px;border: none;color: antiquewhite;"/>
    </form>
</div>
</body>
</html>

<!--by dearvee on 2016 11 25-->



<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/4/22
 * Time: 18:53
 */
function urlText($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);#get html text
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $html = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($html, true);#to array
    return $json;
}
function searchText($word){
    $url='http://songsearch.kugou.com/song_search_v2?&keyword='.$word.'&pagesize=20';
    return urlText($url);
}
function listText($hash){
    $url='http://www.kugou.com/yy/write.php?r=play/getdata&hash='.$hash;
    return urlText($url);
}
function qqMusic($word)
{
    $hashs = array();
    $names = array();
    $srcs = array();
    $lrcs = array();
    $imgs = array();
    $json = searchText($word);
    foreach ($json['data']['lists'] as $inf)
        array_push($hashs, $inf['FileHash']);#get hashs


    foreach ($hashs as $hash) {
        $json = listText($hash);
        $json = $json['data'];
        array_push($names, $json['audio_name']);
        array_push($imgs, $json['img']);
        array_push($lrcs, $json['lyrics']);
        array_push($srcs, $json['play_url']);
    }
    return implode('*',$srcs);
}?>
<?php
ob_start();
session_start();
require("functions.php");
require("youtube.php");
$youtube = new youtube( $settings->apiKey );
$id = !empty($_GET['id']) ? Tpl::filter($_GET['id']) : "x";
if($id == "x"){ header("Location: /index.php "); exit(); }
$video = $youtube->videodetay( $id );
Tpl::header(" {$video[0]->snippet->title} ");
    parse_str(file_get_contents('http://www.youtube.com/get_video_info?video_id='.$video[0]->id), $video_data);
    $streams = $video_data['url_encoded_fmt_stream_map'];
    $streams = explode(',',$streams);
    $counter = 1;

    $downloads = array();
    $i = 0;
    foreach ($streams as $s) {
        
       parse_str($s, $s);

            foreach ($s as $a => $b) {
                
                $downloads[$i][$a] = $b; 
               
            }
            $i++;
    }
    echo '<iframe width="750" height="400" src="https://www.youtube.com/embed/'.$video[0]->id.'" frameborder="0" allowfullscreen></iframe><br/>';
    echo "<p align='center'><h4>{$video[0]->snippet->title}</b></h4>";
    echo '<hr />';
    for ($i=0; $i < Count($downloads); $i++) { 
        echo '<a type="button" class="btn btn-primary" target="_blank" href="dl.php?adr='.base64_encode($downloads[$i]['url']).'&name='.base64_encode($youtube->selflink($video[0]->snippet->title).".mp4").'">'.ucwords($downloads[$i]['quality']).' İndir</a> &nbsp;&nbsp;&nbsp;';
    }
    echo "<hr/>";
    echo "<p align='center'> {$video[0]->snippet->description} </p>";
Tpl::footer();

?>

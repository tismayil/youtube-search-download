<?php
require("youtube.php");
$youtube = new Youtube( $settings->apiKey );

$page = !empty($_GET['page']) ? $_GET['page'] : "";
$start = $youtube->search($q)->start( $page );
$videos = $start->videos->items;
$count = count($videos);

echo "<div class='row'>";
for( $i = 0; $i < $count ; $i++ )
{
  echo '<div class="card" style="margin-left:5px;margin-bottom:5px;width: 20rem;">';
  echo '<img class="card-img-top" src="'.$videos[$i]->snippet->thumbnails->high->url.'" alt="Card image cap">';
  echo '<div class="card-body">';
  echo '<h4 class="card-title">'.$videos[$i]->snippet->title.'</h4>';
  echo '<a href="watch.php?id='.$videos[$i]->id->videoId.'" class="btn btn-primary">İzle >></a>';
  echo '</div>';
  echo '</div>';
}

echo "</div>";
echo "<br/><br/>";
echo " <button type='button' class='btn btn-warning' onclick='window.history.back()''><< Geri</button> <a type='button' class='btn btn-success' href='?q=$q&page=".$start->videos->nextPageToken."'> İleri >></a> ";

?>

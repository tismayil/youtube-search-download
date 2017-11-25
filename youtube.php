<?php

class Youtube
{

  protected $apikey;

  function __construct( $apikey )
  {
    $this->key = $apikey;
  }

  public function b0t($url , $post = null)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if($post != null)
    {
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
    }
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $server_output = curl_exec($ch);
    curl_close ($ch);
    return $server_output;
  }

  public function search( $q )
  {
    $this->q = $q;
    return $this;
  }

  public function start( $page = null)
  {
    $q = urlencode($this->q);
    if($page != null) { $page = "&pageToken=$page"; }
    $bot = $this->b0t("https://www.googleapis.com/youtube/v3/search?part=snippet&q={$q}&type=video&videoCaption=closedCaption&maxResults=6&key={$this->key}{$page}");
    $this->videos = json_decode($bot);
    return $this;
  }

  public function videodetay( $id )
  {
    $bot = $this->b0t("https://www.googleapis.com/youtube/v3/videos?part=snippet&id={$id}&key={$this->key}");
    $item = json_decode($bot);
    return $item->items;
  }

    public static function copyfile($url,$saveto){
            $ch = curl_init ($url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
            $raw=curl_exec($ch);
            curl_close ($ch);
            if(file_exists($saveto)){
                unlink($saveto);
            }
            $fp = fopen($saveto,'x');
            fwrite($fp, $raw);
            fclose($fp);
        }


        public  function selflink($s) {
            $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
            $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
            $s = str_replace($tr,$eng,$s);
            $s = strtolower($s);
            $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
            $s = preg_replace('/\s+/', '-', $s);
            $s = preg_replace('|-+|', '-', $s);
            $s = preg_replace('/#/', '', $s);
            $s = str_replace('.', '', $s);
            $s = trim($s, '-');
            return $s;
        }

}


?>

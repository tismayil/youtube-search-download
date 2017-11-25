<?php
error_reporting(0);
require("settings.php");

class Tpl
{

  public function header( $title )
  {
    Global $settings;
    require("includes/header.php");
  }

  public function footer()
  {
    require("includes/footer.php");
  }

  public function page( $page )
  {
    require( $page );
  }

  public function filter( $g )
  {
    return htmlspecialchars($g);
  }

  public function checkget( $c )
  {
    Global $_GET;
    if(isset($_GET[$c]))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function savetag( $q )
  {
    $tagfile = "includes/searchs.bat";
    $file = file_get_contents($tagfile);
    $file = explode("\n" , $file);
    foreach($file as $a => $b)
    {
      if($q == $b)
      {
        return "";
      }
    }

    $myfile = fopen("includes/searchs.bat", "a");
    $txt = "$q\n";
    fwrite($myfile, $txt);
    fclose($myfile);
  }

  public function showtags( $file )
  {
    $return = "";
    if(file_exists($file))
    {
      $file = explode("\n" , file_get_contents($file));
      foreach($file as $a => $b)
      {
        $return .= "<a href='?q={$b}'>{$b}</a> &nbsp; ";
      }
      print $return;
    }
    return false;

  }

}


?>

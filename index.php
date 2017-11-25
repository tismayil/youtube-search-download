<?php
ob_start();
session_start();
require("functions.php");
Tpl::header("Youtube Video Arama | Anasayfa");
            if(Tpl::checkget("q"))
            {
              $q = Tpl::filter( $_GET['q'] );
              Tpl::savetag( $q );
              require( "list.php" );
            }
            else
            {
              echo '<h3> Youtube Video Arama </h3><br />';
              echo '<div style="text-align:center" align="center" class="col-md-12"><form method="GET" action="index.php"><input class="form-control" type="text" name="q" placeholder="aramak istediğinizi yazın va enter\'a basın" aria-label="Search"><br /></form></div><br/>';
              if(file_exists("includes/searchs.bat"))
              {
                Tpl::showtags( "includes/searchs.bat" );
              }
            }

Tpl::footer();
?>

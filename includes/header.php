<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> <?=$title;?> </title>
    <base href="http://<?= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </head>
  <body>
    <style media="screen">
    body {padding-top: 5rem;}
    .starter-template {padding: 3rem 1.5rem;text-align: center;}
    </style>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
     <a class="navbar-brand" href="index.php"><?=$settings->siteName;?></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarsExampleDefault">
       <ul class="navbar-nav mr-auto">
       </ul>
       <form method="GET" action="index.php" class="form-inline my-2 my-lg-0">
         <input class="form-control mr-sm-2" type="text" name="q" placeholder="Video Ismi" aria-label="Search">
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ara</button>
       </form>
     </div>
   </nav>
   <main role="main" class="container">
   <div class="starter-template">

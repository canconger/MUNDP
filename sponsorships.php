<? include("secure/loader.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= DESCRIPTION ?>">
    <meta name="author" content="<?= AUTHOR ?>">
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <link rel="icon" href="favicon.ico">

    <title><?= TITLE ?>: Sponsorships</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

  </head>

  <body>

    <? include("_includes/navigation.php"); ?>

    <div class="jumbotron executive">
        <div class="container">
            <h1>Sponsorships</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 padding-bottom-24">
              <a href= "https://www.tadim.com"><img src="../sponsors/tadım.png" height="100px" alt="Tadım"></a>
              <a href= "http://www.tavukdunyasi.com"><img src="../sponsors/tavukdünyası.jpg" height="100px" alt="Tavuk Dünyası"></a>
              <a href= "https://www.erikli.com.tr/urunlerimiz/erikli-mineral"><img src="../sponsors/jacobs.jpg" height="100px" alt="Jacobs"></a>
              <a href= "https://www.migros.com.tr"><img src="../sponsors/migros.png" height="100px" alt="Migros Online Market"></a>
            </div>
        </div>
    </div>

    <? include("_includes/footer.php"); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

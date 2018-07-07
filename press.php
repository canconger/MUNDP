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

    <title><?= TITLE ?>: Press Team</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <? include("_includes/navigation.php"); ?>

    <div class="jumbotron executive">
        <div class="container">
            <h1>Press Team</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <h2>Application for the press team is now open!</h2>
                <h3 class="margin-24"><a href="registration/press" class="btn btn-primary btn-lg">Press Registration</a></h3>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <img src="img/pictures/dp2016/IMG_1402.jpg" class="img-responsive img-thumbnail">
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <img src="img/pictures/dp2016/IMG_1432.jpg" class="img-responsive img-thumbnail">
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- /container -->

    <? include("_includes/footer.php"); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

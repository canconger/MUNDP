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

    <title><?= TITLE ?>: Special Committees</title>

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

    <div class="jumbotron venue">
        <div class="container">
            <h1>Special Committees</h1>
        </div>
    </div>

    <div class="container padding-bottom-24">
        <h2>About Special Committees</h2>
        <hr>

        <p class="padding-bottom-24">MUNDP's special committees are the most prestigious ones in the conference. The  special committees, including the french speaking OIF, have a separate agenda and deal with issues ranging from border disputes to the deployment of peacekeeping troops.</p>

        <hr>

		<div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/unsc.php" class="btn btn-primary btn-lg btn-block"><h4><strong>UNSC</strong></h4><small>United Nations Security Council</small></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/historical.php" class="btn btn-primary btn-lg btn-block"><h4><strong>HISTORICAL</strong></h4><small>Historical Committee</small></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/icj.php" class="btn btn-primary btn-lg btn-block"><h4><strong>ICJ</strong></h4><small>International Court of Justice</small></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/oif.php" class="btn btn-primary btn-lg btn-block"><h4><strong>OIF</strong></h4><small>L'organisation internationale de la Francophonie</small></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/ecosoc.php" class="btn btn-primary btn-lg btn-block"><h4><strong>ECOSOC</strong></h4><small>Economic and Social Council</small></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/ap.php" class="btn btn-primary btn-lg btn-block"><h4><strong>APQ</strong></h4><small>Advisory Panel on the Question of The Persian Gulf</small></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/arableague.php" class="btn btn-primary btn-lg btn-block"><h4><strong>ARAB LEAGUE</strong></h4><small>Arab League Committee</small></a>
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

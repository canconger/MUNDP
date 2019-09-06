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

    <title><?= TITLE ?>: Development Committees</title>

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
            <h1>Development Committees</h1>
        </div>
    </div>

    <div class="container padding-bottom-24">
        <h2>About Development Committees</h2>
        <hr>

        <p class="padding-bottom-24">These committees discuss the developmental challenges faced by the countries in the UNDP region the conference focuses on. This year, the delegates in the six development committees will focus on the array of developmental obstacles in Arab States and join the rest of their delegations at the International Summit on Sunday.</p>

		<hr>

		<div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/unoda.php" class="btn btn-primary btn-lg btn-block"><h4><strong>UNODA</strong></h4><small>United Nations Office for Disarmament Affairs</small></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/unhcr.php" class="btn btn-primary btn-lg btn-block"><h4><strong>UNHCR</strong></h4><small>United Nations High Commissioner for Refugees</small></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/ohchr.php" class="btn btn-primary btn-lg btn-block"><h4><strong>OHCHR</strong></h4><small>Office of the Unite Nations High Commissioner for Human Rights</small></a>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/unesco.php" class="btn btn-primary btn-lg btn-block"><h4><strong>UNESCO</strong></h4><small>United Nations Educational, Scientific, and Cultural Organization</small></a>
            </div>
			<div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/undppa.php" class="btn btn-primary btn-lg btn-block"><h4><strong>UNDPPA</strong></h4><small>United Nations Political and Peacebuilding Affairs</small></a>
            </div>
			<div class="col-md-6 col-sm-6 col-xs-12 margin-bottom-24">
                <a href="committees/unido.php" class="btn btn-primary btn-lg btn-block"><h4><strong>UNIDO</strong></h4><small>United Nations Industrial Development Organization</small></a>
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

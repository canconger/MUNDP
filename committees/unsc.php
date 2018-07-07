<? include("../secure/loader.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= DESCRIPTION ?>">
    <meta name="author" content="<?= AUTHOR ?>">
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <link rel="icon" href="../favicon.ico">

    <title><?= TITLE ?>: UNSC</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <? include("../_includes/navigation.php"); ?>

    <div class="jumbotron executive">
        <div class="container">
            <h1>UNSC</h1>
			<h2>United Nations Security Council</h2>
        </div>
    </div>

    <div class="container">
		<h3>Committee Description</h3>
        <p>
			The United Nations Security Council (UNSC) is one of the most influential international bodies that has ever come into existence as it is the only binding UN organ. This means that the UNSC has the right to make definitive decisions on issues threatening the security and sovereignty of nations by intervening through military, economic, or political means.
			<br><br>
			The UNSC consists of fifteen members in total five of which (France, People’s Republic of China, Russian Federation, United Kingdom, and the United States of America) are permanent members; the five permanent members posses the veto power, meaning that if any one of them votes against a clause or resolution that clause or resolution automatically fails. The other ten members are temporary and change every two years. The attendees must be knowledgeable and experienced to debate in the ad hoc format that the UNSC follows.
		</p>

		<h3>Agenda</h3>
		<p>Question of Crimea</p>
		<p>Creating measures to prevent and punsish the trading of illegal Small Arms and Light Weapons (SALWs)</p>
		<p>Question of Kosovo </p>

    <h3>Chair Reports</h3>
    <p><strong>Report 1</strong> <i>by Umut Öztürk</i><br>
      The Situation in Crimea<br>
      <a href="../reports/SC_1.pdf" class="btn btn-success btn-sm" target="_blank">Download the Report</a></p>
    <p><strong>Report 2</strong> <i>by Tan Akpek</i><br>
      Creating Measures to Prevent and Punish the Trading of Illegal Small Arms and Light Weapons (SALWS)<br>
      <a href="../reports/SC_2.pdf" class="btn btn-success btn-sm" target="_blank">Download the Report</a></p>
    <p><strong>Report 3</strong> <i>by Umut Öztürk</i><br>
      Question of Kosovo<br>
      <a href="../reports/SC_3.pdf" class="btn btn-success btn-sm" target="_blank">Download the Report</a></p>

    </div> <!-- /container -->

    <? include("../_includes/footer.php"); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

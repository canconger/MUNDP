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

    <title><?= TITLE ?>: The Koç School</title>

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
            <h1>The Koç School</h1>
        </div>
    </div>

    <div class="container padding-bottom-24">
        <h2>About The Koç School</h2>
        <hr>

        <p>VKV Koç Özel Lisesi or The Koç School in English, is located on the Asian side of İstanbul, Turkey. The school is a subsidiary of Vehbi Koç Foundation, whose founding father was one of the most celebrated philanthropists and entrepreneurs in Turkey, Vehbi Koç, and was given the World Family Planning Award by the United Nations Secretary General Boutros Boutros-Ghali in 1994.</p>
        <p>The School itself has been offering International Baccalaureate Diploma Programme to its students since 1994 and recently started offering IB Middle Years Programme. Every year, the senior students receive admissions from the most prominent colleges and universities in the United States and United Kingdom, including Harvard, Princeton, Stanford, Oxford, Cambridge, Yale, University of Chicago, Columbia and MIT.</p>
        <p class="padding-bottom-24">Koç School has been hosting MUNDP since 2001 in its campus that embraces the beautiful nature, far away from the commotion in Istanbul, and one of the best educational facilities in Turkey.</p>
    </div> <!-- /container -->

	<div class="padding-bottom-24">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="carousel-background" src="img/pictures/school-sciencebuilding.jpg">
          <div class="carousel-caption">
            <h3>Science Building</h3>
          </div>
        </div>
        <div class="item">
          <img class="carousel-background" src="img/pictures/school-winter.jpg">
          <div class="carousel-caption">
            <h3>High School Building</h3>
          </div>
        </div>
        <div class="item">
          <img class="carousel-background" src="img/pictures/school-adhall.jpg">
          <div class="carousel-caption">
            <h3>Conference Hall</h3>
          </div>
        </div>
        <div class="item">
          <img class="carousel-background" src="img/pictures/school-football.jpg">
          <div class="carousel-caption">
            <h3>Football & Athletic Field</h3>
          </div>
        </div>
        <div class="item">
          <img class="carousel-background" src="img/pictures/school-pool.jpg">
          <div class="carousel-caption">
            <h3>Pool</h3>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
	</div>

	<div class="container padding-bottom-24">

        <h2>The Campus Plan</h2>
        <hr>

		<div class="row">
			<div class="col-xs-12 col-md-9">
				<img src="../img/schoolplan.png" class="img-responsive">
			</div>
			<div class="col-xs-12 col-md-3">
				<ol>
					<li>Gate</li>
					<li>Main Gate</li>
					<li>Farm Houses</li>
					<li>Greenhouse</li>
					<li>Art Gallery Storage</li>
					<li>High School</li>
					<li>Pyramid & Student Center</li>
					<li>Library</li>
					<li>Gym</li>
					<li>Cafeteria</li>
					<li>Conference Hall</li>
					<li>Outdoors Sports Facilities</li>
					<li>Girls Dormitory</li>
					<li>Boarding Social Center</li>
					<li>Boarding Social Center</li>
					<li>Boys Dormitory</li>
					<li>Small Grocery</li>
					<li>Swimming Pools</li>
					<li>Outdoors Sports Facilities</li>
					<li>High School Transformer</li>
					<li>Emergency Material Storage</li>
					<li>Campus Housing</li>
					<li>Social Center</li>
					<li>Primary & Middle School</li>
					<li>Kindergarten</li>
					<li>Gym</li>
					<li>Library</li>
					<li>Heliport</li>
					<li>Primary & Middle School Bus Parking Lot</li>
					<li>Athletics Track</li>
					<li>Sciences Block</li>
					<li>Emergency Meeting Point</li>
					<li>Emergency Meeting Point</li>
					<li>Emergency Meeting Point</li>
					<li>Emergency Meeting Point</li>
				</ol>
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

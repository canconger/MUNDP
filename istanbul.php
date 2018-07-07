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

    <title><?= TITLE ?>: İstanbul</title>

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
            <h1>İstanbul</h1>
        </div>
    </div>

    <div class="container padding-bottom-24">
        <h2>About İstanbul</h2>
        <hr>
        
        <p>Istanbul, historically also known as Constantinople and Byzantium, is the most populous city in Turkey and the country's economic, cultural, and historic center. Istanbul is a transcontinental city in Eurasia, straddling the Bosphorus strait between the Sea of Marmara and the Black Sea. Its commercial and historical center lies on the European side and about a third of its population lives on the Asian side. The city is the administrative center of the Istanbul Metropolitan Municipality (coterminous with Istanbul Province), both hosting a population of around 14 million residents. Istanbul is one of the world's most populous cities and ranks as the world's 7th-largest city proper and the largest European city.</p>
        
        <p>Approximately 12.56 million foreign visitors arrived in Istanbul in 2015, five years after it was named a European Capital of Culture, making the city the world's fifth most popular tourist destination. The city's biggest attraction is its historic center, partially listed as a UNESCO World Heritage Site, and its cultural and entertainment hub can be found across the city's natural harbor, the Golden Horn, in the Beyoğlu district. Considered a global city, Istanbul has one of the fastest-growing metropolitan economies in the world. It hosts the headquarters of many Turkish companies and media outlets and accounts for more than a quarter of the country's gross domestic product. Hoping to capitalize on its revitalization and rapid expansion, Istanbul bid for the Summer Olympics five times in twenty years.</p>
        
        <p class="padding-bottom-24"><a href="https://en.wikipedia.org/wiki/Istanbul" target="_blank">Read more on Wikipedia</a></p>
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
          <img class="carousel-background" src="img/pictures/istanbul-maiden.jpg">
          <div class="carousel-caption">
            <h3>Maiden Tower</h3>
          </div>
        </div>
        <div class="item">
          <img class="carousel-background" src="img/pictures/istanbul-galata.jpg">
          <div class="carousel-caption">
            <h3>Galata District</h3>
          </div>
        </div>
        <div class="item">
          <img class="carousel-background" src="img/pictures/istanbul-mosque.jpg">
          <div class="carousel-caption">
            <h3>Sultanahmet Mosque</h3>
          </div>
        </div>
        <div class="item">
          <img class="carousel-background" src="img/pictures/istanbul-skyline.jpg">
          <div class="carousel-caption">
            <h3>İstanbul Skyline</h3>
          </div>
        </div>
        <div class="item">
          <img class="carousel-background" src="img/pictures/istanbul-sunset.jpg">
          <div class="carousel-caption">
            <h3>Sunset in İstanbul</h3>
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
        <h2>Attractions</h2>
        <hr>
        
        <p>The most popular attractions in the city are Hagia Sophia Museum, Sultanahmet District, Basilica Cistern, Suleymaniye Mosque, Blue Mosque, Topkapi Palace and Grand Bazaar. You can take a look at the popular places to visit in İstanbul on Tripadvisor. MUNDP 2017 attendees will be taking a ferry tour in the bosphorus.</p>
        
        <p><a href="https://www.tripadvisor.com/Attractions-g293974-Activities-Istanbul.html" target="_blank">View the full list on Tripadvisor</a></p>
        
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <img src="img/pictures/istanbul-crystal.jpg" class="img-fit img-rounded" width="100%">
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

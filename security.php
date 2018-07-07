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

    <title><?= TITLE ?>: Security</title>

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
            <h1>Security</h1>
        </div>
    </div>
      
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2>Security Notice</h2>
                <hr>
                
                <p class="text-12">Dear Advisors,<br>
                Regarding the latest events in Turkey, we would like to comfort you about the security concerns you might have. Due to İstanbul's location - which is in the northwestern region of Turkey and is not directly affected by the political turmoil in the Middle East - the adverse impacts are not considerable. The city is geographically safe since the Syrian border is approximately in 950 km proximitiy to Istanbul and moreover, The Koç School is located in one of the remote areas of İstanbul. Due to high numbers of students and staff living in the campus and approximately 2000 people travelling every weekday to the campus, the school registration takes substantial safety measures with its security staff and surveillance system. Especially in the last few years, with the opening of our new gate, we are even more confident of our safety. We can ensure that safety will not be a concern for you during your visit to the Koç School and İstanbul and you will experience a quality MUN conference.</p>
                
                <img src="img/pictures/security.jpg" class="img-responsive">
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

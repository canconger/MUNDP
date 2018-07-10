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

    <title><?= TITLE ?>: Student Officers</title>

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
            <h1>Student Officers</h1>
        </div>
    </div>

    <div class="container">
      <p>
        The student officers of MUNDP 2019 have not yet been determined.
      </p>
<!--
          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>UNODA<br><small>U.N. Office for Disarmament Affairs</small></h2>

              <div class="members">
                <h4>President<br><small>Naz Kayın</small></h4>
                <h4>Deputy President<br><small>Doğa Fadıllıoğlu</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>OHCHR<br><small>Office of the U.N. High Commissioner for Human Rights</small></h2>

              <div class="members">
                <h4>President<br><small>İrem Kaki</small></h4>
                <h4>Deputy President<br><small>Nisan Görsev</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>UNHCR<br><small>United Nations High Commissioner for Refugees</small></h2>

              <div class="members">
                <h4>President<br><small>Kaan Ertürk</small></h4>
                <h4>Deputy President<br><small>Mehmed Can Özkan</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>UNIDO<br><small>United Nations Industrial Development Organization</small></h2>

              <div class="members">
                <h4>President<br><small>Erel Moşe Şaul</small></h4>
                <h4>Deputy President<br><small>Efe Kahya</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>UN-Habitat<br><small>United Nations Human Settlements Programme</small></h2>

              <div class="members">
                <h4>President<br><small>Ege Özgüroğlu</small></h4>
                <h4>Deputy President<br><small>Gülce Uysal</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>UNODC<br><small>United Nations Office on Drugs and Crime</small></h2>

              <div class="members">
                <h4>President<br><small>Mey Abdullahoğlu</small></h4>
                <h4>Deputy President<br><small>Cansu Dilek</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>UNSC<br><small>The United Nations Security Council</small></h2>

              <div class="members">
                <h4>President<br><small>Tan Akpek</small></h4>
                <h4>Deputy President<br><small>Umut Öztürk</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>HISTORICAL<br><small>Historical Committee 1</small></h2>

              <div class="members">
                  <h4>President<br><small>Can Yeşildere</small></h4>
                  <h4>Deputy President<br><small>Lari Altaras</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>HISTORICAL<br><small>Historical Committee 2</small></h2>

              <div class="members">
                <h4>President<br><small>Eren Şerbetçi</small></h4>
                <h4>Deputy President<br><small>Carla Aysem Sipahioğlu</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>OSCE<br><small>Organization for Security and Co-Operation in Europe</small></h2>

              <div class="members">
                <h4>President<br><small>Ata Kolday</small></h4>
                <h4>Deputy President<br><small>Kerem Üzdiyen</small></h4>
                <h4>Deputy President<br><small>Mehmet Can Çetin</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>ICJ<br><small>International Court of Justice</small></h2>

              <div class="members">
                <h4>President<br><small>Ceren Kahveci</small></h4>
                <h4>Vice President<br><small>Deren Alanay</small></h4>
                <h4>Registrar<br><small>Mayra Kalaora</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>OIF<br><small>L’Organisation internationale de la Francophonie</small></h2>

              <div class="members">
                <h4>Présidente<br><small>Kaan Arıbal</small></h4>
                <h4>Vice-Présidente<br><small>Gökşen Dündar</small></h4>
                <h4>Vice-Présidente<br><small>Patricia Köhle</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>ECOSOC<br><small>Economic and Social Council</small></h2>

              <div class="members">
                <h4>President<br><small>Sinan Orhun</small></h4>
                <h4>Deputy President<br><small>Rowa Kurdi</small></h4>
                <h4>Deputy President<br><small>Tan Halacoğlu</small></h4>
              </div>
          </div>

          <div class="col-xs-12 col-md-6 text-center stofflist">
              <h2>APQ<br><small>Advisory Panel on the Question of Central Asia</small></h2>

              <div class="members">
                <h4>President<br><small>Mehmed Can Olgaç</small></h4>
                <h4>Deputy President<br><small>Defne Genç</small></h4>
              </div>
          </div>

        </div>
        <div class="row hidden">
        <h2 class="">You can apply now to become a student officer in MUNDP 2018!</h2>
        <h3 class="margin-24"><a href="registration/studentofficer" class="btn btn-primary btn-lg">Student Officer Registration</a></h3>
-->
    </div> <!-- /container -->

    <? include("_includes/footer.php"); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

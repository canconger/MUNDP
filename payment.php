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

    <title><?= TITLE ?>: Payment</title>

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
            <h1>Payment</h1>
        </div>
    </div>

    <div class="container">
        <h2>Service Fees</h2>
        <hr>

        <div class="row padding-bottom-24">
            <div class="col-xs-12 col-md-6 text-center">
                <h3>Fee Per Student<br><small>Schools from Turkey</small></h3>
                <!-- <h2>130€ - 530₺</h2> -->
                <h2>375₺</h2>
            </div>

            <div class="col-xs-12 col-md-6 text-center">
                <h3>Fee Per Student<br><small>International Schools</small></h3>
                <h2>75€</h2>
                <!-- <h2>90€ - 370₺</h2> -->
            </div>
        </div>
<!--
        <h2>Payment Information</h2>
        <hr>


        <div class="row padding-bottom-24">
            <div class="col-xs-12 col-md-6 text-center">
                <h3>For Turkish Schools</h3>
                <p>Hesap Adı: VKV Koç Özel İÖO ve Lisesi İktisadi İşletmesi</p>
                <p>Yapı ve Kredi Bankası Suadiye Şubesi (Şube Kodu: 933)</p>
                <p>Hesap No: 30059356</p>
                <p>IBAN: TR04 0006 7010 0000 0030 0593 56</p>
            </div>

            <div class="col-xs-12 col-md-6 text-center">
                <h3>For Foreign Schools</h3>
                <p>Account Owner: VKV Koc Ozel Lisesi</p>
                <p>Bank/Branch: Yapi ve Kredi Bank - Tuzla Branch</p>
                <p>Account No (EUR): 30059356</p>
                <p>IBAN: TR04 0006 7010 0000 0030 0593 56</p>
            </div>
        </div>
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

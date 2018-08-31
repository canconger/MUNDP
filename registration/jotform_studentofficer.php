<? include("../secure/loader.php"); ?>
<?
    $countriesjson = file_get_contents("../secure/json/countries.json");
    $countries = json_decode($countriesjson,true);

	$schools = DB::query("SELECT * FROM mydp_school");
	$committes = DB::query("SELECT * FROM mydp_committees");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= DESCRIPTION ?>">
    <meta name="author" content="<?= AUTHOR ?>">
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <link rel="icon" href="<?= URL ?>favicon.ico">

    <title><?= TITLE ?>: Student Officer Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/sweetalert.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>

    <? include("../_includes/navigation.php"); ?>

    <script type="text/javascript" src="https://form.jotform.com/jsform/82424969460970"></script>

    <? include("../_includes/footer.php"); ?>

  </body>
</html>

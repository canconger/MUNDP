<? include("../secure/loader.php"); ?>
<?
    $countriesjson = file_get_contents("../secure/json/countries.json");
    $countries = json_decode($countriesjson,true);

	$schools = DB::query("SELECT * FROM mydp_school");
	$positions = DB::query("SELECT * FROM mydp_positions");
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

    <title><?= TITLE ?>: OIF Registration</title>

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

    <div class="jumbotron registration">

        <div class="container">
            <h1>OIF Registration</h1>
            <? if($regisetting['oif']) { ?>
            <p>Please register as an OIF committee member from the form below.</p>

            <form action="registration.php" method="post" id="schoolform" accept-charset="UTF-8">

                <div class="register-section">

                    <h2>Information Personelle</h2>

                    <hr>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Nom et Prénom</label>
                              <input class="form-control" name="fullname" type="text" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Pays</label>
                              <select class="form-control" name="country" required>
                              <? foreach($countries as $data) { ?>
                                  <option value="<?= $data["code"] ?>" <? if($data["code"] == "TR") { echo "selected"; } ?>><?= $data["name"] ?></option>
                              <? } ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Date de Naissance</label>
                                <input class="form-control" name="birthdate" id="birthdate" type="text" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Année de l'obtention du Diplôme</label>
                              <input class="form-control" name="graduation" type="text" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Sexe</label>
                              <select class="form-control" name="sex" required>
                                  <option value="f">Femme</option>
								  <option value="m">Homme</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="register-section">

                    <h2>Renseignements Scolaires</h2>

                    <hr>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Votre École</label>
							  <select class="form-control" name="school" id="schoolselection" required>
								  <option value="0">Mon école ne figure pas sur la liste, je vais vous donner le nom de l'école.</option>
								  <? foreach($schools as $data) { ?>
								  <option value="<?= $data["id"] ?>"><?= $data["name"] ?></option>
								  <? } ?>
                              </select>
                            </div>
                        </div>
						<div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Le nom de l'école</label>
                              <input class="form-control" name="schoolname" id="schoolnameselection" type="text" placeholder="S'il vous plaît entrez le nom de l'école." required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="register-section">
                    <h2>Coordonnées</h2>

                    <hr>

					<div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Numéro de Portable <small>(S'il vous plaît incluez le code du pays.)</small></label>
                              <input class="form-control" name="phone" type="tel" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Adresse E-Mail</label>
                              <input class="form-control" name="email" type="email" required>
                            </div>
                        </div>
                    </div>
                </div>

        <div class="register-section">
          <h2>Position Preferences</h2>
          <hr>
              <div class="form-group">
          <label class="control-label">Please state the name of your partner</label>
          <input class="form-control" name="partner" type="text">
              </div>      </div>

				<div class="register-section">
                    <h2>Conseiller Recommandation serine lettre de recommantation</h2>

					<hr>

                    <p><small>S'il vous plaît demandez à votre conseiller en MUN soumettre une lettre de recommandation à <a href="mailto:recommendation@modelundp.org">recommendation@modelundp.org</a>. Les candidats sans recommandations ne seront pas considérées. S'il y a plus d'un candidats d'une école, le conseiller doit classer les élèves de sa / son e-mail.</small></p>
                    <div class="form-group">
                      <label class="control-label">*Your advisor's mail address</label>
                      <input class="form-control" name="advisor_email" type="email" required>
                    </div>
                </div>

                <div class="register-section hidden">
                    <h2>reCaptcha</h2>
                    <p><small>This helps prevent automated form submissions.</small></p>

                    <hr>

                    <!-- <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_KEY ?>"></div> !-->
                </div>

                <div class="register-section">
                    <input type="hidden" name="form" value="oif">
                    <input type="hidden" name="emailtest" value="false">
                    <div>* Champs Requis<br><br></div>
                    <button id="registerbutton" type="submit" class="btn btn-lg btn-success">Registre</button>
                </div>
            </form>
            <? } else { ?>
            <p>OIF registration is now closed for MUNDP 2018.</p>
            <? } ?>
        </div> <!-- /container -->

    </div>

    <? include("../_includes/footer.php"); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.form.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>
	<script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>

    <script>

		jQuery(function($){
		   $("#birthdate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
		});

		$(document).ready(function () {
			$('#schoolselection').change(function(){
				var option = $(this).val();

				if(option != 0)
				{
					$("#schoolnameselection").attr("disabled", true);
					$("#schoolnameselection").attr("required", true);
					$("#schoolnameselection").attr("placeholder", $(this).find(":selected").text());
				}
				else
				{
					$("#schoolnameselection").attr("disabled", true);
					$("#schoolnameselection").attr("required", true);
					$("#schoolnameselection").attr("placeholder", "Please enter the school name.");
				}
			});
		});

        function disablebutton()
        {
            $("#registerbutton").attr('disabled', true);
            $("#registerbutton").html('Processing...');
        }

        function enablebutton()
        {
            $("#registerbutton").attr('disabled', true);
            $("#registerbutton").html('Register');
        }

        var options = {
            url:        'registration.php',
            success:    function(data) {
                if(data == "ok")
                {
                    swal("Thank You", "We have received your application. You will also receive an automated email about the process.", "success");
                }
                else if(data == "mailerror")
                {
                    swal("Unknown Error", "An error occured while connecting to mail servers. Please try again later, or report this issue to: publications@modelundp.org", "error");
                    enablebutton();
                }
                else if(data == "emailinuse")
                {
                    swal("Email in Use", "The email address you provided is already is in use.", "error");
                    enablebutton();
                }
                else if(data == "empty")
                {
                    swal("Empty Fields", "Please fill all fields marked with asterix (*).", "error");
                    enablebutton();
                }
                else if(data == "captcha")
                {
                    swal("reCaptcha", "Please check your reCaptcha entry.", "error");
                    enablebutton();
                }
                else
                {
                    swal("Unknown Error", "An unknown error occured while processing your request. Please try again later, or report this issue to: publications@modelundp.org ["+data+"]", "error");
                    enablebutton();
                }
            },
            beforeSubmit: function(){
                disablebutton();
            }
        };

        // pass options to ajaxForm
        $('#schoolform').ajaxForm(options);
    </script>
  </body>
</html>

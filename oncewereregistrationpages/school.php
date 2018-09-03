<? include("../secure/loader.php"); ?>
<?
    $countriesjson = file_get_contents("../secure/json/countries.json");
    $countries = json_decode($countriesjson,true);
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

    <title><?= TITLE ?>: School Registration</title>

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
            <h1>School Registration</h1>
            <? if($regisetting['school']) { ?>
            <p>Dear Advisor,<br>Please register your school from the form below, and after the approval of the board you will have a full access to your MyDP account.</p>

            <form action="registration.php" method="post" id="schoolform" accept-charset="UTF-8">

                <div class="register-section">

                    <h2>School Information</h2>

                    <hr>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*School Name</label>
                              <input class="form-control" name="school_name" type="text" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Country</label>
                              <select class="form-control" name="school_country" required>
                              <? foreach($countries as $data) { ?>
                                  <option value="<?= $data["code"] ?>" <? if($data["code"] == "TR") { echo "selected"; } ?>><?= $data["name"] ?></option>
                              <? } ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Postal Code</label>
                              <input class="form-control" name="school_postal" type="text" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Address</label>
                              <textarea class="form-control" name="school_address" style="resize: vertical;" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Phone <small>(Please include country code.)</small></label>
                              <input class="form-control" name="school_phone" type="tel" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">Fax</label>
                              <input class="form-control" name="school_fax" type="tel">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Has your school participated in MUNDP before?</label>
                              <select class="form-control" name="school_attendedbefore" required>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="register-section">
                    <h2>Primary Advisor Information</h2>
                    <p><small>You will be able to register advisors and delegates on MyDP panel.</small></p>

                    <hr>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Advisor's Full Name</label>
                              <input class="form-control" name="advisor_fullname" type="text" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Advisor's Phone <small>(Please include country code.)</small></label>
                              <input class="form-control" name="advisor_phone" type="tel" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Advisor's E-Mail Address</label>
                              <input class="form-control" name="advisor_email" type="email" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Advisor's Birthdate</label>
                                <input class="form-control" name="advisor_birthdate" id="advisor_birthdate" type="text" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="register-section hidden">
                    <h2>reCaptcha</h2>
                    <p><small>This helps prevent automated form submissions.</small></p>

                    <hr>

                    <!-- <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_KEY ?>"></div> !-->
                </div>

                <div class="register-section">
                    <input type="hidden" name="form" value="school">
                    <input type="hidden" name="emailtest" value="false">
                    <div>* Required Fields<br><br></div>
                    <button id="registerbutton" type="submit" class="btn btn-lg btn-success">Register</button>
                </div>
            </form>
            <? } else { ?>
            <p>School registration is now closed for MUNDP 2018.</p>
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
           $("#advisor_birthdate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
        });

        function disablebutton()
        {
            $("#registerbutton").attr('disabled', true);
            $("#registerbutton").html('Processing...');
        }

        function enablebutton()
        {
            $("#registerbutton").attr('disabled', false);
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

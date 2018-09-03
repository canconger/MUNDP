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

    <title><?= TITLE ?>: Press Registration</title>

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
            <h1>Press Registration</h1>
            <? if($regisetting['press']) { ?>
            <p>Please register as a press member from the form below.</p>

            <form action="registration.php" method="post" id="schoolform" accept-charset="UTF-8">

                <div class="register-section">

                    <h2>Personal Information</h2>

                    <hr>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Full Name</label>
                              <input class="form-control" name="fullname" type="text" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Country</label>
                              <select class="form-control" name="country" required>
                              <? foreach($countries as $data) { ?>
                                  <option value="<?= $data["code"] ?>" <? if($data["code"] == "TR") { echo "selected"; } ?>><?= $data["name"] ?></option>
                              <? } ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Birthdate</label>
                                <input class="form-control" name="birthdate" id="birthdate" type="text" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Graduation Year</label>
                              <input class="form-control" name="graduation" type="text" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Sex</label>
                              <select class="form-control" name="sex" required>
                                  <option value="f">Female</option>
								  <option value="m">Male</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="register-section">

                    <h2>School Information</h2>

                    <hr>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Your School</label>
							  <select class="form-control" name="school" id="schoolselection" required>
								  <option value="0">My school is not listed on the list, I'll provide the name of the school.</option>
								  <? foreach($schools as $data) { ?>
								  <option value="<?= $data["id"] ?>"><?= $data["name"] ?></option>
								  <? } ?>
                              </select>
                            </div>
                        </div>
						<div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*School's Name</label>
                              <input class="form-control" name="schoolname" id="schoolnameselection" type="text" placeholder="Please enter the school name." required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="register-section">
                    <h2>Contact Information</h2>

                    <hr>

					<div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*Phone Number <small>(Please include country code.)</small></label>
                              <input class="form-control" name="phone" type="tel" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                              <label class="control-label">*E-Mail Address</label>
                              <input class="form-control" name="email" type="email" required>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="register-section">
                    <h2>Previous Experiences</h2>
					<p><small>Please list your last 10 MUN Experiences in reverse chronological order below. The Executive Committee gives emphasis on THIMUN Affiliated conferences.</small></p>

                    <hr>

                    <div class="row">
                        <div class="col-xs-4 col-md-3">
                            <div class="form-group">
							  <label class="control-label">Experience</small></label>
                              <select class="form-control" name="exp1-year">
                                  <option value="0">Year</option>
								  <option value="2018">2018</option>
                  <option value="2017">2017</option>
								  <option value="2016">2016</option>
								  <option value="2015">2015</option>
								  <option value="2014">2014</option>
								  <option value="2013">2013</option>
								  <option value="2012">2012</option>
								  <option value="2011">2011</option>
								  <option value="2010">2010</option>
								  <option value="2009">2009</option>
								  <option value="2008">2008</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-5">
                            <div class="form-group">
                              <label class="control-label">Conference</label>
                              <input class="form-control" name="exp1-con" type="text">
                            </div>
                        </div>
						<div class="col-xs-4 col-md-4">
                            <div class="form-group">
                              <label class="control-label">Position</label>
                              <input class="form-control" name="exp1-pos" type="text">
                            </div>
                        </div>
                    </div>

					<? for($i = 0; $i < 9; $i++) { ?>
					<div class="row">
                        <div class="col-xs-4 col-md-3">
                            <div class="form-group">
                              <select class="form-control" name="exp<?= $i+2 ?>-year">
                                  <option value="0">Year</option>
								  <option value="2018">2018</option>
                  <option value="2017">2017</option>
								  <option value="2016">2016</option>
								  <option value="2015">2015</option>
								  <option value="2014">2014</option>
								  <option value="2013">2013</option>
								  <option value="2012">2012</option>
								  <option value="2011">2011</option>
								  <option value="2010">2010</option>
								  <option value="2009">2009</option>
								  <option value="2008">2008</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-5">
                            <div class="form-group">
                              <input class="form-control" name="exp<?= $i+2 ?>-con" type="text">
                            </div>
                        </div>
						<div class="col-xs-4 col-md-4">
                            <div class="form-group">
                              <input class="form-control" name="exp<?= $i+2 ?>-pos" type="text">
                            </div>
                        </div>
                    </div>
					<? }?>
                </div>

				<div class="register-section">
                    <h2>Preferred Position</h2>

                    <hr>

					<div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
							  <label class="control-label">Please select your preferred position</label>
                              <select class="form-control" name="pref">
								<option value="8">Photographer</value>
								<option value="11">Journalist</value>
								<option value="12">Filmmaker</value>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="register-section">
                    <h2>Letter</h2>

                    <hr>

					<p><small>You are required to write below or upload a brief essay of 300 words minimum, entailing your previous journalistic/photography/filmmakingc experiences, why you think you are qualified for this position and your reasons for applying.</small></p>
					<div class="form-group">
					  <label class="control-label">*Letter of Application</label>
					  <textarea class="form-control" name="applicationletter" style="resize: vertical;" rows="10" required></textarea>
					</div>
                </div>

                <div class="register-section hidden">
                    <h2>reCaptcha</h2>
                    <p><small>This helps prevent automated form submissions.</small></p>

                    <hr>

                    <!-- <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_KEY ?>"></div> !-->
                </div>

                <div class="register-section">
                    <input type="hidden" name="form" value="press">
                    <input type="hidden" name="emailtest" value="false">
                    <div>* Required Fields<br><br></div>
                    <button id="registerbutton" type="submit" class="btn btn-lg btn-success">Register</button>
                </div>
            </form>
            <? } else { ?>
            <p>Press registration is now closed for MUNDP 2018.</p>
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

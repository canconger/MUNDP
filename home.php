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

    <title><?= TITLE ?>: Commitment to Development</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/sweetalert.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style>
	#clockdiv{
		font-family: sans-serif;
		color: #fff;
		display: inline-block;
		font-weight: 100;
		text-align: center;
		font-size: 24px;
	}

	#clockdiv > div{
		padding: 6px;
		padding-top:10px;
		/*border-radius: 3px;*/
		background: #63A5EF;
		display: inline-block;
	}

	#clockdiv div > span{
		padding: 8px;
		/*border-radius: 3px;*/
		background: #0533C4;
		/*display: inline-block;*/
	}

	.smalltext{
		padding-top: 10px;
		font-size: 16px;
	}
	</style>
  </head>

  <body>

    <? include("_includes/navigation.php"); ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->

    <div class="jumbotron info" style="margin-bottom: 0px;">
      <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-12 text-center">
                <img src="img/icon.png" height="260px">
            </div>
            <div class="col-md-10 col-xs-12">
                <h1>XX. Annual Session of MUNDP</h1>
                <p>Welcome to the XX. annual session of Model United Nations Development Programme. It will be held from 20th to 23rd of February, 2020 in Istanbul, Turkey. This year, with the hopes of organizing an astonishing conference, our Executive Board and General Committee of MUNDP 2020 are getting ready to host more than 750 students. Apply now and become a part of the memorable MUNDP experience!</p>
			      </div>
        </div>
      </div>
    </div>

    <div class="jumbotron tribute text-center hidden">
      <div class="container">
        <h2>MUNDP 2019 is OVER</h2>
        <p>We would like to thank all participants for making the MUNDP 2019 the best MUNDP ever!</p>
        <div class="row">
          <div class="col-md-4">
            <h3>MUNDP 2019 Closing Video</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <video width="320" height="240" class="embed-responsive-item" controls>
                <source src="videos/closing2017.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </div>

          <div class="col-md-4">
            <h3>MUNDP 2019 Opening Video</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <video width="320" height="240" class="embed-responsive-item" controls>
                <source src="videos/opening2017.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </div>

          <div class="col-md-4">
            <h3>MUNDP 2018 Photo Gallery</h3>
            <a href="https://www.facebook.com/pg/modelundp/photos/" target="_blank" class="btn btn-success btn-block">Facebook Photo Gallery</a>
          </div>

          <div class="col-md-4 hidden">
            <h3>MUNDP Archive</h3>
            <hr>
            <a href="http://archive.modelundp.org/2017" class="btn btn-success btn-block">MUNDP 2017</a>
            <a href="http://archive.modelundp.org/2016" class="btn btn-success btn-block disabled">MUNDP 2016</a>
            <a href="http://archive.modelundp.org/2015" class="btn btn-success btn-block disabled">MUNDP 2015</a>
            <a href="http://archive.modelundp.org/2014" class="btn btn-success btn-block disabled">MUNDP 2014</a>
          </div>
        </div>

        <br><br>
        You can contact our Secretaries General via <a href="mailto:secretariat@modelundp.org">secretariat@modelundp.org</a>. Feedback is welcomed.
      </div>
    </div>

    <div class="container padding-bottom-24">
	  <div class="row">
	  <div class="col-xs-12 col-md-8">
		<h2>A Letter from the Secretaries General</h2>
		<p class="text-justify">Dear Participants,
		  <br><br>
      As the Secretaries General, it is with utmost privilege and delight that we welcome you to the 20th annual session of Model United Nations Development Programme, an affiliate of The Hague International Model United Nations.
		  <br><br>
      This year, MUNDP will be held from the 20th to the 23rd of February at The Koç School, an establishment that has been hosting this event in Istanbul for two decades. Since its establishment in 2000, our conference has ranked among the best in Turkey and Europe, hosting over 800 participants from 40 schools and 8 countries in its last session.
		  <br><br>
      MUNDP is the sole conference worldwide which models the United Nations Development Programme (UNDP), and each year we set one of the UNDP’s developing regions, each with its own Regional Bureau, as our theme. As seen on our website, this year’s theme has been determined as the Arab States. Comprised of 22 countries with a cumulative population of approximately 350 million, the Arab States faces the fundamental issues which the agenda items in MUNDP 2020 have been designed to resolve. The UNDP has, in the recent years, been working in the Arab States to develop gender equality, ensure economic equity and growth, alleviate socio-political conflict and resolve environmental issues.
		  <br><br>
      Since the Arab Spring, many countries in the region have been in a state of political and social transition, leading to conflict between citizens and governments: a result of  a long-standing disregard of the masses. Such nations should have the goal of establishing new administrations which cater to the public’s demands and reflect the aspirations of the people. Increasing political accountability and democratic governance and combatting corruption are pertinent in the agenda of this year’s conference.
		  <br><br>
      Issues regarding gender equality are especially widespread among the Arab States, most of which harbour values based on an androcentric culture. Evidence for the limited roles available to women are reflected in statistics that show that only 25% of females are employed, which corresponds to approximately half of the average for developing nations. High maternal mortality rates accompanied by the state of female unemployment call for urgent attention, which is why issues of gender inequality should be prioritised among others.
		  <br><br>
      High unemployment rates also prevail in the public in general, with rural regions only contributing to 15% of the regions’ GDP despite encompassing around 50% of the population. Delivering a high quality education with high enrolment, increasing life expectancy and addressing health and sanitation issues are also to be priorities and discussed by the UNDP to ensure the region’s development. Cooperation between governments, Non-Governmental Organisations (NGOs) and the United Nations is crucial for the advancement of the Arab States in order to empower women, end hunger, prevent corruption, improve education and boost economic growth and social development in many countries across continents in order to salvage a region with great potential be it in terms of its rich environment, economic development and young and bright entrepreneurs.
		  <br><br>
      Acknowledging that these issues go hand in hand, UNDP has initiated a programme consisting of a set of 17 goals known as the Sustainable Development Goals (SDGs) designed to tackle these issues as a whole and aimed to be achieved by the year 2030. The idea behind these goals proposes that governments adopt the initiative to let go of their reductionist approach by which they divide issues into their component parts and tackle them separately. They should, instead, adopt a more holistic “systems approach”, as ecosystems and industrial systems should be managed through an interlinked means. The global target of achieving sustainability cannot become a reality unless this obligation is acknowledged.
		  <br><br>
      For this year’s conference, agenda items for all 6 re-selected development committees have been adjusted to put focus on the most paramount social, political and economic issues in the region. As MUNDP is widely acclaimed for its quality of agenda items, this year, our content team has once again embarked upon taking a step further to systematically link each and every agenda item to one or more of the 17 Sustainable Development Goals (SDGs) advocated by the UNDP. For the past years, our team has been working towards creating strong content that is linked to these SDGs, thus allowing for the creation of these balanced and focused agenda items, which will only work towards enhancing the quality of MUNDP and elevating it to a place among the best in Europe. That said, we are proud to integrate the progressive vision behind the Sustainable Development Goals as endorsed by the United Nations, into the follow-up Millennium Development Goals for the Post-Development Agenda.
		  <br><br>
      With this vision, we have re-adjusted our agenda to encompass these goals and 169 focused targets in total, and ultimately aim to carry the conference to a new level along with ensuring a more effective and efficient solution process. While Development Committees focus on certain developmental issues of the region, the Arab League carries the purpose of encouraging cooperation on politico-military, economic and social aspects between member states. The Arab League has been established with the goal of promoting the independence, sovereignty, affairs and interests of its 22 Member States and has made various endeavours including strengthening ties between Member States and coordinating their interests to promote political unity. One of the distinctive features of the Arab League at MUNDP is that it is attended by the heads of states of each nation, and that it follows an ad-hoc debate structure similar to that followed by the Security Council. The Arab League is a notably prestigious committee with decisions that are crucial for the region’s development, and the Secretariat expects it to be among the most productive.
      <br><br>
      Another unique feature of MUNDP is “l’Organisation Internationale de la Francophonie” (OIF). As the first bilingual MUN conference in Turkey and one of the few in the world, we are proud to host this French-speaking committee that focuses on strengthening the bonds between Francophone countries. This year, l’OIF will consist of 15 double-delegations in order to ensure enhanced cooperation and collaboration among delegates in terms of both language and context.
      <br><br>
      We as the Executive Committee are delighted to see you all in February to partake in what will hopefully be the most memorable MUNDP experience to date. While celebrating the 20th anniversary of MUNDP, be sure to lobby, debate, and prove that the solutions for the problems at hand have been delayed for no reason at all!
      <br><br>
		</p>
		<p>Yours sincerely,<br>Defne Genç<br>Beyza Sema Koç</p>
	  </div>
	  <div class="col-xs-12 col-md-4">
		<!-- <h2>MUNDP 2018 <small>is starting in</small></h2>
    <h4>22nd to 25th of February, 2018</h4>
		<div id="clockdiv" class="">
		  <div>
			<span class="days">00</span>
			<div class="smalltext">Days</div>
		  </div>
		  <div>
			<span class="hours">00</span>
			<div class="smalltext">Hours</div>
		  </div>
		  <div>
			<span class="minutes">00</span>
			<div class="smalltext">Minutes</div>
		  </div>
		  <div>
			<span class="seconds">00</span>
			<div class="smalltext">Seconds</div>
		  </div>
		</div> -->

		<br><br>

		<h2>Theme <small>of MUNDP 2020</small></h2>
		<div class="arabstates text-center">
			<h2>Arab States</h2>
		</div>

		<br>
    <a href="https://sustainabledevelopment.un.org/sdgs" target="_blank"><img src="img/global-goals-logo.jpg" class="img-responsive"></a>
    <br><br>

		<div class="row">

	  	<!-- <div class="col-xs-6 col-md-12">
				<h2>Dinner <small>at Divan Asia</small></h2>
				<p>Join us and take a seat in an elegant dinner at Divan Asia Hotel.</p>
				<? /*<img src="ig/pictures/dp2016/10479198_854805777915579_7288797789351059512_n.jpg" class="img-responsive"> */ ?> -->

				<br><br>
			</div>
		</div>
	  </div>
	  </div>
    </div><!-- /container -->

    <div class="jumbotron caribbean hidden">
      <div class="container text-center">
          <h3>This Year's Theme is:</h3>
          <h1>Arab States</h1>
      </div>
    </div>

    <? /*
    <div class="jumbotron padding-0">
          <div id="carousel-example-generic" class="carousel slide main-carousel" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              <li data-target="#carousel-example-generic" data-slide-to="3"></li>
              <li data-target="#carousel-example-generic" data-slide-to="4"></li>
              <li data-target="#carousel-example-generic" data-slide-to="5"></li>
              <li data-target="#carousel-example-generic" data-slide-to="6"></li>
              <li data-target="#carousel-example-generic" data-slide-to="7"></li>
              <li data-target="#carousel-example-generic" data-slide-to="8"></li>
              <li data-target="#carousel-example-generic" data-slide-to="9"></li>
  		      	<li data-target="#carousel-example-generic" data-slide-to="10"></li>
              <li data-target="#carousel-example-generic" data-slide-to="11"></li>
              <li data-target="#carousel-example-generic" data-slide-to="12"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img class="carousel-background" src="img/pictures/dp-ga2.jpg">
                <div class="carousel-caption">
  				        <div class="text-center visible-lg visible-md">
  					        <img class="hidden" src="img/icon.png" height="260px">
  				        </div>
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/1.jpg">
                <div class="carousel-caption">
                </div>
              </div>
  			     <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/2.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/3.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/4.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/5.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/6.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/7.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/8.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/9.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/91.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/92.jpg">
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <img class="carousel-background" src="img/pictures/photos17/93.jpg">
                <div class="carousel-caption">
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
      */?>

    <? include("_includes/footer.php"); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <script>
    $(document).ready(function(){
      swal({
        title: "Conference fees have been announced!",
        //text: " Sorry for the inconvenience ",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Take me there!",
        closeOnConfirm: false
      },
      function(){
        window.location.href = 'payment';
      });
    })

    </script> -->
    <!--
	<script>
	function getTimeRemaining(endtime) {
	  var t = Date.parse(endtime) - Date.parse(new Date());
	  var seconds = Math.floor((t / 1000) % 60);
	  var minutes = Math.floor((t / 1000 / 60) % 60);
	  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
	  var days = Math.floor(t / (1000 * 60 * 60 * 24));
	  return {
		'total': t,
		'days': days,
		'hours': hours,
		'minutes': minutes,
		'seconds': seconds
	  };
	}

	function initializeClock(id, endtime) {
	  var clock = document.getElementById(id);
	  var daysSpan = clock.querySelector('.days');
	  var hoursSpan = clock.querySelector('.hours');
	  var minutesSpan = clock.querySelector('.minutes');
	  var secondsSpan = clock.querySelector('.seconds');

	  function updateClock() {
		var t = getTimeRemaining(endtime);

		daysSpan.innerHTML = t.days;
		hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
		minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
		secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

		if (t.total <= 0) {
		  clearInterval(timeinterval);
		}
	  }

	  updateClock();
	  var timeinterval = setInterval(updateClock, 1000);
	}

	var deadline = new Date("February 22, 2018 17:00:00");
	initializeClock('clockdiv', deadline);
	</script> -->
  </body>
</html>

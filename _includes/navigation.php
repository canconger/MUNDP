<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand hidden-xs" href="<?= URL ?>home.php"><img src="<?= URL ?>img/logo.png" height="60px"></a>
      <a class="navbar-brand visible-xs" href="<?= URL ?>home.php"><img src="<?= URL ?>img/logo.png" style="margin-top: 6px;" height="50px"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

            <li><a href="<?= URL ?>home.php" class="hidden-md hidden-sm"><i class="fa fa-home" aria-hidden="true"></i> Homepage</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-map-signs" aria-hidden="true"></i> Conference <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= URL ?>executive-committee.php">Executive Committee</a></li>
                <li><a href="<?= URL ?>general-committee.php">General Committee</a></li>
                <li role="separator" class="divider.php"></li>
                <li><a href="<?= URL ?>schedule.php">Schedule</a></li>
                <li role="separator" class="divider.php"></li>
                <li><a href="<?= URL ?>stoffs.php">Student Officers</a></li>
                <li><a href="<?= URL ?>press.php">Press Team</a></li>
                <li role="separator" class="divider.php"></li>
                <li><a href="<?= URL ?>security.php">Security</a></li>
                <li><a href="<?= URL ?>transportation.php">Transportation</a></li>
                <li><a href="<?= URL ?>payment.php">Payment Information</a></li>
                <li role="separator" class="divider visible-md visible-sm"></li>
                <li><a href="<?= URL ?>contact.php" class="visible-md visible-sm">Contact</a></li>
                <li><a href="<?= URL ?>kocschool.php" class="visible-md visible-sm">The Koç School</a></li>
                <li><a href="<?= URL ?>istanbul.php" class="visible-md visible-sm">Istanbul</a></li>
                <li role="separator" class="divider"></li>
                <li class="hidden"><a href="<?= URL ?>schedule.php">Schedule</a></li>
                <li class="hidden"><a href="<?= URL ?>deadlines.php">Deadlines</a></li>
                <li><a href="<?= URL ?>materials.php">Materials</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-university" aria-hidden="true"></i> Committees <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= URL ?>special-committees.php">Special Committees</a></li>
                <li><a href="<?= URL ?>development-committees.php">Development Committees</a></li>
              </ul>
            </li>

            <li><a href="<?= URL ?>contact.php" class="hidden-md hidden-sm"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a></li>

            <li class="dropdown hidden-md hidden-sm">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-location-arrow" aria-hidden="true"></i> Venue <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= URL ?>kocschool.php">The Koç School</a></li>
                <li><a href="<?= URL ?>istanbul.php">Istanbul</a></li>
              </ul>
            </li>

            <li><a href="<?= URL ?>registration/registration.php"><strong>Registration</strong></a></li>

            <!--<li><a href="<?= URL_MYDP ?>"><strong>MyDP</strong></a></li>-->

            <li><a href=http://jmundp.org/home.php><strong style="color: #601f6d">JMUNDP</strong></a></li>

        </ul>
    </div><!--/.navbar-collapse -->
  </div>
</nav>

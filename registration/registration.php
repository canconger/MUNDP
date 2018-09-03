<? include("../secure/loader.php"); ?>
<?
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if($_POST["form"] == "status")
  {
    $listfor = DB::queryFirstRow("SELECT * FROM mydp_users WHERE email=%s",$_POST["email"]);

    if(empty($listfor["id"]))
    {
        echo "notfound";
        return;
    }
    else {
      $listpos = DB::queryFirstRow("SELECT * FROM mydp_positions WHERE id=%s",$listfor['position']);

      echo $listfor['fullname'].', we have received your application.';
      return;
    }
  }


  if($_POST["form"] == "oif")
  {
      if(!$regisetting['oif']) {
        return;
      }

      // Registration Data
      $regd["fullname"] = $_POST["fullname"];
      $regd["country"] = $_POST["country"];
      $regd["birthdate"] = $_POST["birthdate"];
      $regd["graduation"] = $_POST["graduation"];
      $regd["sex"] = $_POST["sex"];
      $regd["schoolid"] = $_POST["school"];
      $regd["schoolname"] = $_POST["schoolname"];
      $regd["phone"] = $_POST["phone"];
      $regd["email"] = $_POST["email"];
      $regd["advisor_email"] = $_POST["advisor_email"];
      $regd["partner"] = $_POST["partner"];

      $regd["position"] = "oif";

      $listfor = DB::queryFirstRow("SELECT * FROM mydp_users WHERE email=%s",$_POST["email"]);

      if(!empty($listfor["id"]))
      {
          echo "emailinuse";
          return;
      }

      foreach($regd as $id => $data)
      {
        if(empty($data) and strpos($id, 'exp') === false and strpos($id, 'school') === false)
        {
          echo "empty";
          return;
        }
      }

      include("../secure/email.php");
      include("../secure/randompass.php");

      if($_POST["emailtest"] == "true")
      {
          $emailextra = "<p><strong>Alert:</strong><br>This form is filled for testing. The information given won't be recored into the system.</p>";
      }
      else
      {
          $emailextra = "";
      }

      $password = generateStrongPassword();
      $cost = 10;
      $salt = strtr(base64_encode(mcrypt_create_iv(64, MCRYPT_DEV_URANDOM)), '+', '.');
      $salt = sprintf("$2a$%02d$", $cost) . $salt;
      $hash = crypt($password, $salt);

      $emailcontent = '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
              <meta name="viewport" content="width=device-width" />
              <style type="text/css">
          @media only screen and (min-width: 620px) {
            * [lang=x-wrapper] h1 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * [lang=x-wrapper] h2 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-8] {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            * div [lang=x-size-9] {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            * div [lang=x-size-10] {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            * div [lang=x-size-11] {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-12] {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-13] {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-14] {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-15] {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            * div [lang=x-size-16] {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            * div [lang=x-size-17] {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-20] {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-22] {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            * div [lang=x-size-24] {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            * div [lang=x-size-26] {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * div [lang=x-size-28] {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            * div [lang=x-size-30] {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            * div [lang=x-size-32] {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            * div [lang=x-size-34] {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-36] {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-40] {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            * div [lang=x-size-44] {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            * div [lang=x-size-48] {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            * div [lang=x-size-56] {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            * div [lang=x-size-64] {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          </style>
              <style type="text/css">
          body {
            margin: 0;
            padding: 0;
          }
          table {
            border-collapse: collapse;
            table-layout: fixed;
          }
          * {
            line-height: inherit;
          }
          [x-apple-data-detectors],
          [href^="tel"],
          [href^="sms"] {
            color: inherit !important;
            text-decoration: none !important;
          }
          .wrapper .footer__share-button a:hover,
          .wrapper .footer__share-button a:focus {
            color: #ffffff !important;
          }
          .btn a:hover,
          .btn a:focus,
          .footer__share-button a:hover,
          .footer__share-button a:focus,
          .email-footer__links a:hover,
          .email-footer__links a:focus {
            opacity: 0.8;
          }
          .ie .btn {
            width: 100%;
          }
          .ie .column,
          [owa] .column,
          .ie .gutter,
          [owa] .gutter {
            display: table-cell;
            float: none !important;
            vertical-align: top;
          }
          .ie .preheader,
          [owa] .preheader,
          .ie .email-footer,
          [owa] .email-footer {
            width: 560px !important;
          }
          .ie .snippet,
          [owa] .snippet,
          .ie .webversion,
          [owa] .webversion {
            width: 280px !important;
          }
          .ie .header,
          [owa] .header,
          .ie .layout,
          [owa] .layout,
          .ie .one-col .column,
          [owa] .one-col .column {
            width: 600px !important;
          }
          .ie .fixed-width.has-border,
          [owa] .fixed-width.has-border,
          .ie .has-gutter.has-border,
          [owa] .has-gutter.has-border {
            width: 602px !important;
          }
          .ie .two-col .column,
          [owa] .two-col .column {
            width: 300px !important;
          }
          .ie .three-col .column,
          [owa] .three-col .column,
          .ie .narrow,
          [owa] .narrow {
            width: 200px !important;
          }
          .ie .wide,
          [owa] .wide {
            width: 400px !important;
          }
          .ie .two-col.has-gutter .column,
          [owa] .two-col.x_has-gutter .column {
            width: 290px !important;
          }
          .ie .three-col.has-gutter .column,
          [owa] .three-col.x_has-gutter .column,
          .ie .has-gutter .narrow,
          [owa] .has-gutter .narrow {
            width: 188px !important;
          }
          .ie .has-gutter .wide,
          [owa] .has-gutter .wide {
            width: 394px !important;
          }
          .ie .two-col.has-gutter.has-border .column,
          [owa] .two-col.x_has-gutter.x_has-border .column {
            width: 292px !important;
          }
          .ie .three-col.has-gutter.has-border .column,
          [owa] .three-col.x_has-gutter.x_has-border .column,
          .ie .has-gutter.has-border .narrow,
          [owa] .has-gutter.x_has-border .narrow {
            width: 190px !important;
          }
          .ie .has-gutter.has-border .wide,
          [owa] .has-gutter.x_has-border .wide {
            width: 396px !important;
          }
          .ie .fixed-width .layout__inner {
            border-left: 0 none white !important;
            border-right: 0 none white !important;
          }
          .ie .layout__edges {
            display: none;
          }
          .mso .layout__edges {
            font-size: 0;
          }
          .layout-fixed-width,
          .mso .layout-full-width {
            background-color: #ffffff;
          }
          @media only screen and (min-width: 620px) {
            .column,
            .gutter {
              display: table-cell;
              Float: none !important;
              vertical-align: top;
            }
            .preheader,
            .email-footer {
              width: 560px !important;
            }
            .snippet,
            .webversion {
              width: 280px !important;
            }
            .header,
            .layout,
            .one-col .column {
              width: 600px !important;
            }
            .fixed-width.has-border,
            .fixed-width.ecxhas-border,
            .has-gutter.has-border,
            .has-gutter.ecxhas-border {
              width: 602px !important;
            }
            .two-col .column {
              width: 300px !important;
            }
            .three-col .column,
            .column.narrow {
              width: 200px !important;
            }
            .column.wide {
              width: 400px !important;
            }
            .two-col.has-gutter .column,
            .two-col.ecxhas-gutter .column {
              width: 290px !important;
            }
            .three-col.has-gutter .column,
            .three-col.ecxhas-gutter .column,
            .has-gutter .narrow {
              width: 188px !important;
            }
            .has-gutter .wide {
              width: 394px !important;
            }
            .two-col.has-gutter.has-border .column,
            .two-col.ecxhas-gutter.ecxhas-border .column {
              width: 292px !important;
            }
            .three-col.has-gutter.has-border .column,
            .three-col.ecxhas-gutter.ecxhas-border .column,
            .has-gutter.has-border .narrow,
            .has-gutter.ecxhas-border .narrow {
              width: 190px !important;
            }
            .has-gutter.has-border .wide,
            .has-gutter.ecxhas-border .wide {
              width: 396px !important;
            }
          }
          @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .fblike {
              background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
            }
            .tweet {
              background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
            }
            .linkedinshare {
              background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
            }
            .forwardtoafriend {
              background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
            }
          }
          @media (max-width: 321px) {
            .fixed-width.has-border .layout__inner {
              border-width: 1px 0 !important;
            }
            .layout,
            .column {
              min-width: 320px !important;
              width: 320px !important;
            }
            .border {
              display: none;
            }
          }
          .mso div {
            border: 0 none white !important;
          }
          .mso .w560 .divider {
            Margin-left: 260px !important;
            Margin-right: 260px !important;
          }
          .mso .w360 .divider {
            Margin-left: 160px !important;
            Margin-right: 160px !important;
          }
          .mso .w260 .divider {
            Margin-left: 110px !important;
            Margin-right: 110px !important;
          }
          .mso .w160 .divider {
            Margin-left: 60px !important;
            Margin-right: 60px !important;
          }
          .mso .w354 .divider {
            Margin-left: 157px !important;
            Margin-right: 157px !important;
          }
          .mso .w250 .divider {
            Margin-left: 105px !important;
            Margin-right: 105px !important;
          }
          .mso .w148 .divider {
            Margin-left: 54px !important;
            Margin-right: 54px !important;
          }
          .mso .font-avenir,
          .mso .font-cabin,
          .mso .font-open-sans,
          .mso .font-ubuntu {
            font-family: sans-serif !important;
          }
          .mso .font-bitter,
          .mso .font-merriweather,
          .mso .font-pt-serif {
            font-family: Georgia, serif !important;
          }
          .mso .font-lato,
          .mso .font-roboto {
            font-family: Tahoma, sans-serif !important;
          }
          .mso .font-pt-sans {
            font-family: "Trebuchet MS", sans-serif !important;
          }
          .mso .footer__share-button p {
            margin: 0;
          }
          @media only screen and (min-width: 620px) {
            .wrapper .size-8 {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            .wrapper .size-9 {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            .wrapper .size-10 {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            .wrapper .size-11 {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            .wrapper .size-12 {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            .wrapper .size-13 {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            .wrapper .size-14 {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            .wrapper .size-15 {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            .wrapper .size-16 {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            .wrapper .size-17 {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            .wrapper .size-18 {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            .wrapper .size-20 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            .wrapper .size-22 {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            .wrapper .size-24 {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            .wrapper .size-26 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            .wrapper .size-28 {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            .wrapper .size-30 {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            .wrapper .size-32 {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            .wrapper .size-34 {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            .wrapper .size-36 {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            .wrapper .size-40 {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            .wrapper .size-44 {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            .wrapper .size-48 {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            .wrapper .size-56 {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            .wrapper .size-64 {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          .mso .size-8,
          .ie .size-8 {
            font-size: 8px !important;
            line-height: 14px !important;
          }
          .mso .size-9,
          .ie .size-9 {
            font-size: 9px !important;
            line-height: 16px !important;
          }
          .mso .size-10,
          .ie .size-10 {
            font-size: 10px !important;
            line-height: 18px !important;
          }
          .mso .size-11,
          .ie .size-11 {
            font-size: 11px !important;
            line-height: 19px !important;
          }
          .mso .size-12,
          .ie .size-12 {
            font-size: 12px !important;
            line-height: 19px !important;
          }
          .mso .size-13,
          .ie .size-13 {
            font-size: 13px !important;
            line-height: 21px !important;
          }
          .mso .size-14,
          .ie .size-14 {
            font-size: 14px !important;
            line-height: 21px !important;
          }
          .mso .size-15,
          .ie .size-15 {
            font-size: 15px !important;
            line-height: 23px !important;
          }
          .mso .size-16,
          .ie .size-16 {
            font-size: 16px !important;
            line-height: 24px !important;
          }
          .mso .size-17,
          .ie .size-17 {
            font-size: 17px !important;
            line-height: 26px !important;
          }
          .mso .size-18,
          .ie .size-18 {
            font-size: 18px !important;
            line-height: 26px !important;
          }
          .mso .size-20,
          .ie .size-20 {
            font-size: 20px !important;
            line-height: 28px !important;
          }
          .mso .size-22,
          .ie .size-22 {
            font-size: 22px !important;
            line-height: 31px !important;
          }
          .mso .size-24,
          .ie .size-24 {
            font-size: 24px !important;
            line-height: 32px !important;
          }
          .mso .size-26,
          .ie .size-26 {
            font-size: 26px !important;
            line-height: 34px !important;
          }
          .mso .size-28,
          .ie .size-28 {
            font-size: 28px !important;
            line-height: 36px !important;
          }
          .mso .size-30,
          .ie .size-30 {
            font-size: 30px !important;
            line-height: 38px !important;
          }
          .mso .size-32,
          .ie .size-32 {
            font-size: 32px !important;
            line-height: 40px !important;
          }
          .mso .size-34,
          .ie .size-34 {
            font-size: 34px !important;
            line-height: 43px !important;
          }
          .mso .size-36,
          .ie .size-36 {
            font-size: 36px !important;
            line-height: 43px !important;
          }
          .mso .size-40,
          .ie .size-40 {
            font-size: 40px !important;
            line-height: 47px !important;
          }
          .mso .size-44,
          .ie .size-44 {
            font-size: 44px !important;
            line-height: 50px !important;
          }
          .mso .size-48,
          .ie .size-48 {
            font-size: 48px !important;
            line-height: 54px !important;
          }
          .mso .size-56,
          .ie .size-56 {
            font-size: 56px !important;
            line-height: 60px !important;
          }
          .mso .size-64,
          .ie .size-64 {
            font-size: 64px !important;
            line-height: 63px !important;
          }
          .footer__share-button p {
            margin: 0;
          }
          </style>

              <title></title>
            <!--[if !mso]><!--><style type="text/css">
          @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
          </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
          body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
          620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
          </style><meta name="robots" content="noindex,nofollow" />
          <meta property="og:title" content="My First Campaign" />
          </head>
          <!--[if mso]>
            <body class="mso">
          <![endif]-->
          <!--[if !mso]><!-->
            <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
          <!--<![endif]-->
              <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                  <div style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                    <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                    <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                  <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                    <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                  </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </div>
                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

          <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Thanks for your Application!</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">You have succesfully filled the Registration Form for MUNDP 2019.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your MyDP Login Credentials</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>Username: </strong>'.$_POST["email"].'<br><strong>Password: </strong>'.$password.'</p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                    <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                        <div>

                        </div>
                        <div style="Margin-top: 18px;">

                        </div>
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                    <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                        '.$emailextra.'
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

            </div>
          </body></html>
          ';

      $advisoremailcontent = '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
              <meta name="viewport" content="width=device-width" />
              <style type="text/css">
          @media only screen and (min-width: 620px) {
            * [lang=x-wrapper] h1 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * [lang=x-wrapper] h2 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-8] {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            * div [lang=x-size-9] {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            * div [lang=x-size-10] {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            * div [lang=x-size-11] {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-12] {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-13] {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-14] {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-15] {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            * div [lang=x-size-16] {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            * div [lang=x-size-17] {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-20] {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-22] {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            * div [lang=x-size-24] {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            * div [lang=x-size-26] {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * div [lang=x-size-28] {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            * div [lang=x-size-30] {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            * div [lang=x-size-32] {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            * div [lang=x-size-34] {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-36] {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-40] {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            * div [lang=x-size-44] {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            * div [lang=x-size-48] {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            * div [lang=x-size-56] {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            * div [lang=x-size-64] {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          </style>
              <style type="text/css">
          body {
            margin: 0;
            padding: 0;
          }
          table {
            border-collapse: collapse;
            table-layout: fixed;
          }
          * {
            line-height: inherit;
          }
          [x-apple-data-detectors],
          [href^="tel"],
          [href^="sms"] {
            color: inherit !important;
            text-decoration: none !important;
          }
          .wrapper .footer__share-button a:hover,
          .wrapper .footer__share-button a:focus {
            color: #ffffff !important;
          }
          .btn a:hover,
          .btn a:focus,
          .footer__share-button a:hover,
          .footer__share-button a:focus,
          .email-footer__links a:hover,
          .email-footer__links a:focus {
            opacity: 0.8;
          }
          .ie .btn {
            width: 100%;
          }
          .ie .column,
          [owa] .column,
          .ie .gutter,
          [owa] .gutter {
            display: table-cell;
            float: none !important;
            vertical-align: top;
          }
          .ie .preheader,
          [owa] .preheader,
          .ie .email-footer,
          [owa] .email-footer {
            width: 560px !important;
          }
          .ie .snippet,
          [owa] .snippet,
          .ie .webversion,
          [owa] .webversion {
            width: 280px !important;
          }
          .ie .header,
          [owa] .header,
          .ie .layout,
          [owa] .layout,
          .ie .one-col .column,
          [owa] .one-col .column {
            width: 600px !important;
          }
          .ie .fixed-width.has-border,
          [owa] .fixed-width.has-border,
          .ie .has-gutter.has-border,
          [owa] .has-gutter.has-border {
            width: 602px !important;
          }
          .ie .two-col .column,
          [owa] .two-col .column {
            width: 300px !important;
          }
          .ie .three-col .column,
          [owa] .three-col .column,
          .ie .narrow,
          [owa] .narrow {
            width: 200px !important;
          }
          .ie .wide,
          [owa] .wide {
            width: 400px !important;
          }
          .ie .two-col.has-gutter .column,
          [owa] .two-col.x_has-gutter .column {
            width: 290px !important;
          }
          .ie .three-col.has-gutter .column,
          [owa] .three-col.x_has-gutter .column,
          .ie .has-gutter .narrow,
          [owa] .has-gutter .narrow {
            width: 188px !important;
          }
          .ie .has-gutter .wide,
          [owa] .has-gutter .wide {
            width: 394px !important;
          }
          .ie .two-col.has-gutter.has-border .column,
          [owa] .two-col.x_has-gutter.x_has-border .column {
            width: 292px !important;
          }
          .ie .three-col.has-gutter.has-border .column,
          [owa] .three-col.x_has-gutter.x_has-border .column,
          .ie .has-gutter.has-border .narrow,
          [owa] .has-gutter.x_has-border .narrow {
            width: 190px !important;
          }
          .ie .has-gutter.has-border .wide,
          [owa] .has-gutter.x_has-border .wide {
            width: 396px !important;
          }
          .ie .fixed-width .layout__inner {
            border-left: 0 none white !important;
            border-right: 0 none white !important;
          }
          .ie .layout__edges {
            display: none;
          }
          .mso .layout__edges {
            font-size: 0;
          }
          .layout-fixed-width,
          .mso .layout-full-width {
            background-color: #ffffff;
          }
          @media only screen and (min-width: 620px) {
            .column,
            .gutter {
              display: table-cell;
              Float: none !important;
              vertical-align: top;
            }
            .preheader,
            .email-footer {
              width: 560px !important;
            }
            .snippet,
            .webversion {
              width: 280px !important;
            }
            .header,
            .layout,
            .one-col .column {
              width: 600px !important;
            }
            .fixed-width.has-border,
            .fixed-width.ecxhas-border,
            .has-gutter.has-border,
            .has-gutter.ecxhas-border {
              width: 602px !important;
            }
            .two-col .column {
              width: 300px !important;
            }
            .three-col .column,
            .column.narrow {
              width: 200px !important;
            }
            .column.wide {
              width: 400px !important;
            }
            .two-col.has-gutter .column,
            .two-col.ecxhas-gutter .column {
              width: 290px !important;
            }
            .three-col.has-gutter .column,
            .three-col.ecxhas-gutter .column,
            .has-gutter .narrow {
              width: 188px !important;
            }
            .has-gutter .wide {
              width: 394px !important;
            }
            .two-col.has-gutter.has-border .column,
            .two-col.ecxhas-gutter.ecxhas-border .column {
              width: 292px !important;
            }
            .three-col.has-gutter.has-border .column,
            .three-col.ecxhas-gutter.ecxhas-border .column,
            .has-gutter.has-border .narrow,
            .has-gutter.ecxhas-border .narrow {
              width: 190px !important;
            }
            .has-gutter.has-border .wide,
            .has-gutter.ecxhas-border .wide {
              width: 396px !important;
            }
          }
          @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .fblike {
              background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
            }
            .tweet {
              background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
            }
            .linkedinshare {
              background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
            }
            .forwardtoafriend {
              background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
            }
          }
          @media (max-width: 321px) {
            .fixed-width.has-border .layout__inner {
              border-width: 1px 0 !important;
            }
            .layout,
            .column {
              min-width: 320px !important;
              width: 320px !important;
            }
            .border {
              display: none;
            }
          }
          .mso div {
            border: 0 none white !important;
          }
          .mso .w560 .divider {
            Margin-left: 260px !important;
            Margin-right: 260px !important;
          }
          .mso .w360 .divider {
            Margin-left: 160px !important;
            Margin-right: 160px !important;
          }
          .mso .w260 .divider {
            Margin-left: 110px !important;
            Margin-right: 110px !important;
          }
          .mso .w160 .divider {
            Margin-left: 60px !important;
            Margin-right: 60px !important;
          }
          .mso .w354 .divider {
            Margin-left: 157px !important;
            Margin-right: 157px !important;
          }
          .mso .w250 .divider {
            Margin-left: 105px !important;
            Margin-right: 105px !important;
          }
          .mso .w148 .divider {
            Margin-left: 54px !important;
            Margin-right: 54px !important;
          }
          .mso .font-avenir,
          .mso .font-cabin,
          .mso .font-open-sans,
          .mso .font-ubuntu {
            font-family: sans-serif !important;
          }
          .mso .font-bitter,
          .mso .font-merriweather,
          .mso .font-pt-serif {
            font-family: Georgia, serif !important;
          }
          .mso .font-lato,
          .mso .font-roboto {
            font-family: Tahoma, sans-serif !important;
          }
          .mso .font-pt-sans {
            font-family: "Trebuchet MS", sans-serif !important;
          }
          .mso .footer__share-button p {
            margin: 0;
          }
          @media only screen and (min-width: 620px) {
            .wrapper .size-8 {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            .wrapper .size-9 {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            .wrapper .size-10 {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            .wrapper .size-11 {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            .wrapper .size-12 {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            .wrapper .size-13 {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            .wrapper .size-14 {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            .wrapper .size-15 {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            .wrapper .size-16 {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            .wrapper .size-17 {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            .wrapper .size-18 {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            .wrapper .size-20 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            .wrapper .size-22 {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            .wrapper .size-24 {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            .wrapper .size-26 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            .wrapper .size-28 {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            .wrapper .size-30 {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            .wrapper .size-32 {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            .wrapper .size-34 {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            .wrapper .size-36 {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            .wrapper .size-40 {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            .wrapper .size-44 {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            .wrapper .size-48 {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            .wrapper .size-56 {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            .wrapper .size-64 {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          .mso .size-8,
          .ie .size-8 {
            font-size: 8px !important;
            line-height: 14px !important;
          }
          .mso .size-9,
          .ie .size-9 {
            font-size: 9px !important;
            line-height: 16px !important;
          }
          .mso .size-10,
          .ie .size-10 {
            font-size: 10px !important;
            line-height: 18px !important;
          }
          .mso .size-11,
          .ie .size-11 {
            font-size: 11px !important;
            line-height: 19px !important;
          }
          .mso .size-12,
          .ie .size-12 {
            font-size: 12px !important;
            line-height: 19px !important;
          }
          .mso .size-13,
          .ie .size-13 {
            font-size: 13px !important;
            line-height: 21px !important;
          }
          .mso .size-14,
          .ie .size-14 {
            font-size: 14px !important;
            line-height: 21px !important;
          }
          .mso .size-15,
          .ie .size-15 {
            font-size: 15px !important;
            line-height: 23px !important;
          }
          .mso .size-16,
          .ie .size-16 {
            font-size: 16px !important;
            line-height: 24px !important;
          }
          .mso .size-17,
          .ie .size-17 {
            font-size: 17px !important;
            line-height: 26px !important;
          }
          .mso .size-18,
          .ie .size-18 {
            font-size: 18px !important;
            line-height: 26px !important;
          }
          .mso .size-20,
          .ie .size-20 {
            font-size: 20px !important;
            line-height: 28px !important;
          }
          .mso .size-22,
          .ie .size-22 {
            font-size: 22px !important;
            line-height: 31px !important;
          }
          .mso .size-24,
          .ie .size-24 {
            font-size: 24px !important;
            line-height: 32px !important;
          }
          .mso .size-26,
          .ie .size-26 {
            font-size: 26px !important;
            line-height: 34px !important;
          }
          .mso .size-28,
          .ie .size-28 {
            font-size: 28px !important;
            line-height: 36px !important;
          }
          .mso .size-30,
          .ie .size-30 {
            font-size: 30px !important;
            line-height: 38px !important;
          }
          .mso .size-32,
          .ie .size-32 {
            font-size: 32px !important;
            line-height: 40px !important;
          }
          .mso .size-34,
          .ie .size-34 {
            font-size: 34px !important;
            line-height: 43px !important;
          }
          .mso .size-36,
          .ie .size-36 {
            font-size: 36px !important;
            line-height: 43px !important;
          }
          .mso .size-40,
          .ie .size-40 {
            font-size: 40px !important;
            line-height: 47px !important;
          }
          .mso .size-44,
          .ie .size-44 {
            font-size: 44px !important;
            line-height: 50px !important;
          }
          .mso .size-48,
          .ie .size-48 {
            font-size: 48px !important;
            line-height: 54px !important;
          }
          .mso .size-56,
          .ie .size-56 {
            font-size: 56px !important;
            line-height: 60px !important;
          }
          .mso .size-64,
          .ie .size-64 {
            font-size: 64px !important;
            line-height: 63px !important;
          }
          .footer__share-button p {
            margin: 0;
          }
          </style>

              <title></title>
            <!--[if !mso]><!--><style type="text/css">
          @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
          </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
          body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
          620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
          </style><meta name="robots" content="noindex,nofollow" />
          <meta property="og:title" content="My First Campaign" />
          </head>
          <!--[if mso]>
            <body class="mso">
          <![endif]-->
          <!--[if !mso]><!-->
            <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
          <!--<![endif]-->
              <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                  <div style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                    <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                    <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                  <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                    <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                  </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </div>
                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

          <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Dear advisor,</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your student '.$regd["fullname"].' has applied for a position in MUNDP 2019. We kindly ask you to send a recommendation letter to <a href="mailto:recommendation@modelundp.org">recommendation@modelundp.org</a> by Dec. 18 2016. Be reminded that an application without a recommendation letter will not be taken under consideration by the Secretariat.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Also, if you have more than one student applying for the same position, you should include a ranking of these students in terms of their general performance at the bottom of the letter.
          </p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Best Regards,</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>MUNDP Secretariat</strong></p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                    <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                        <div>

                        </div>
                        <div style="Margin-top: 18px;">

                        </div>
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                    <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                        '.$emailextra.'
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

            </div>
          </body></html>
              ';

      // end

      if(!send_email($_POST["email"],"Registration",$emailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if(!send_email($_POST["advisor_email"],"Recommendation for your Student",$advisoremailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if($_POST["emailtest"] == "false" or 1 == 1)
      {
          DB::insert('mydp_users', array(
            'email' => $regd["email"],
            'hash' => $hash,
            'fullname' => $regd["fullname"],
            'phone' => $regd["phone"],
            'school' => $regd["schoolid"],
            'verified' => 0,
            'position' => 0,
            'birthdate' => $regd["birthdate"],
            'time_register' => microtime(true),
            'applicationdata' => json_encode($regd)
          ));
      }

      echo "ok";
  }

  //

  if($_POST["form"] == "icj")
  {

      if(!$regisetting['icj']) {
        return;
      }

      // Registration Data
      $regd["fullname"] = $_POST["fullname"];
      $regd["country"] = $_POST["country"];
      $regd["birthdate"] = $_POST["birthdate"];
      $regd["graduation"] = $_POST["graduation"];
      $regd["sex"] = $_POST["sex"];
      $regd["schoolid"] = $_POST["school"];
      $regd["schoolname"] = $_POST["schoolname"];
      $regd["phone"] = $_POST["phone"];
      $regd["email"] = $_POST["email"];
      $regd["advisor_email"] = $_POST["advisor_email"];

      $regd["exp1-year"] = $_POST["exp1-year"];
      $regd["exp1-con"] = $_POST["exp1-con"];
      $regd["exp1-pos"] = $_POST["exp1-pos"];

      $regd["exp2-year"] = $_POST["exp2-year"];
      $regd["exp2-con"] = $_POST["exp2-con"];
      $regd["exp2-pos"] = $_POST["exp2-pos"];

      $regd["exp3-year"] = $_POST["exp3-year"];
      $regd["exp3-con"] = $_POST["exp3-con"];
      $regd["exp3-pos"] = $_POST["exp3-pos"];

      $regd["exp4-year"] = $_POST["exp4-year"];
      $regd["exp4-con"] = $_POST["exp4-con"];
      $regd["exp4-pos"] = $_POST["exp4-pos"];

      $regd["exp5-year"] = $_POST["exp5-year"];
      $regd["exp5-con"] = $_POST["exp5-con"];
      $regd["exp5-pos"] = $_POST["exp5-pos"];

      $regd["exp6-year"] = $_POST["exp6-year"];
      $regd["exp6-con"] = $_POST["exp6-con"];
      $regd["exp6-pos"] = $_POST["exp6-pos"];

      $regd["exp7-year"] = $_POST["exp7-year"];
      $regd["exp7-con"] = $_POST["exp7-con"];
      $regd["exp7-pos"] = $_POST["exp7-pos"];

      $regd["exp8-year"] = $_POST["exp8-year"];
      $regd["exp8-con"] = $_POST["exp8-con"];
      $regd["exp8-pos"] = $_POST["exp8-pos"];

      $regd["exp9-year"] = $_POST["exp9-year"];
      $regd["exp9-con"] = $_POST["exp9-con"];
      $regd["exp9-pos"] = $_POST["exp9-pos"];

      $regd["exp10-year"] = $_POST["exp10-year"];
      $regd["exp10-con"] = $_POST["exp10-con"];
      $regd["exp10-pos"] = $_POST["exp10-pos"];

      $regd["pref1"] = $_POST["pref1"];
      $regd["pref2"] = $_POST["pref2"];
      $regd["pref3"] = $_POST["pref3"];

      $regd["applicationletter"] = $_POST["applicationletter"];

      $regd["coadvoacte"] = $_POST["coacvoacte"];
      $regd["studentofficer"] = $_POST["studentofficer"];

      $regd["position"] = "icj";

      $listfor = DB::queryFirstRow("SELECT * FROM mydp_users WHERE email=%s",$_POST["email"]);

      if(!empty($listfor["id"]))
      {
          echo "emailinuse";
          return;
      }

      foreach($regd as $id => $data)
      {
        if(empty($data) and strpos($id, 'exp') === false and strpos($id, 'school') === false and strpos($id, 'coadvoacte') === false)
        {
          echo "empty";
          return;
        }
      }

      include("../secure/email.php");
      include("../secure/randompass.php");

      if($_POST["emailtest"] == "true")
      {
          $emailextra = "<p><strong>Alert:</strong><br>This form is filled for testing. The information given won't be recored into the system.</p>";
      }
      else
      {
          $emailextra = "";
      }

      $password = generateStrongPassword();
      $cost = 10;
      $salt = strtr(base64_encode(mcrypt_create_iv(64, MCRYPT_DEV_URANDOM)), '+', '.');
      $salt = sprintf("$2a$%02d$", $cost) . $salt;
      $hash = crypt($password, $salt);

      $emailcontent = '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
              <meta name="viewport" content="width=device-width" />
              <style type="text/css">
          @media only screen and (min-width: 620px) {
            * [lang=x-wrapper] h1 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * [lang=x-wrapper] h2 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-8] {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            * div [lang=x-size-9] {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            * div [lang=x-size-10] {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            * div [lang=x-size-11] {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-12] {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-13] {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-14] {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-15] {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            * div [lang=x-size-16] {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            * div [lang=x-size-17] {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-20] {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-22] {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            * div [lang=x-size-24] {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            * div [lang=x-size-26] {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * div [lang=x-size-28] {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            * div [lang=x-size-30] {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            * div [lang=x-size-32] {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            * div [lang=x-size-34] {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-36] {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-40] {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            * div [lang=x-size-44] {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            * div [lang=x-size-48] {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            * div [lang=x-size-56] {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            * div [lang=x-size-64] {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          </style>
              <style type="text/css">
          body {
            margin: 0;
            padding: 0;
          }
          table {
            border-collapse: collapse;
            table-layout: fixed;
          }
          * {
            line-height: inherit;
          }
          [x-apple-data-detectors],
          [href^="tel"],
          [href^="sms"] {
            color: inherit !important;
            text-decoration: none !important;
          }
          .wrapper .footer__share-button a:hover,
          .wrapper .footer__share-button a:focus {
            color: #ffffff !important;
          }
          .btn a:hover,
          .btn a:focus,
          .footer__share-button a:hover,
          .footer__share-button a:focus,
          .email-footer__links a:hover,
          .email-footer__links a:focus {
            opacity: 0.8;
          }
          .ie .btn {
            width: 100%;
          }
          .ie .column,
          [owa] .column,
          .ie .gutter,
          [owa] .gutter {
            display: table-cell;
            float: none !important;
            vertical-align: top;
          }
          .ie .preheader,
          [owa] .preheader,
          .ie .email-footer,
          [owa] .email-footer {
            width: 560px !important;
          }
          .ie .snippet,
          [owa] .snippet,
          .ie .webversion,
          [owa] .webversion {
            width: 280px !important;
          }
          .ie .header,
          [owa] .header,
          .ie .layout,
          [owa] .layout,
          .ie .one-col .column,
          [owa] .one-col .column {
            width: 600px !important;
          }
          .ie .fixed-width.has-border,
          [owa] .fixed-width.has-border,
          .ie .has-gutter.has-border,
          [owa] .has-gutter.has-border {
            width: 602px !important;
          }
          .ie .two-col .column,
          [owa] .two-col .column {
            width: 300px !important;
          }
          .ie .three-col .column,
          [owa] .three-col .column,
          .ie .narrow,
          [owa] .narrow {
            width: 200px !important;
          }
          .ie .wide,
          [owa] .wide {
            width: 400px !important;
          }
          .ie .two-col.has-gutter .column,
          [owa] .two-col.x_has-gutter .column {
            width: 290px !important;
          }
          .ie .three-col.has-gutter .column,
          [owa] .three-col.x_has-gutter .column,
          .ie .has-gutter .narrow,
          [owa] .has-gutter .narrow {
            width: 188px !important;
          }
          .ie .has-gutter .wide,
          [owa] .has-gutter .wide {
            width: 394px !important;
          }
          .ie .two-col.has-gutter.has-border .column,
          [owa] .two-col.x_has-gutter.x_has-border .column {
            width: 292px !important;
          }
          .ie .three-col.has-gutter.has-border .column,
          [owa] .three-col.x_has-gutter.x_has-border .column,
          .ie .has-gutter.has-border .narrow,
          [owa] .has-gutter.x_has-border .narrow {
            width: 190px !important;
          }
          .ie .has-gutter.has-border .wide,
          [owa] .has-gutter.x_has-border .wide {
            width: 396px !important;
          }
          .ie .fixed-width .layout__inner {
            border-left: 0 none white !important;
            border-right: 0 none white !important;
          }
          .ie .layout__edges {
            display: none;
          }
          .mso .layout__edges {
            font-size: 0;
          }
          .layout-fixed-width,
          .mso .layout-full-width {
            background-color: #ffffff;
          }
          @media only screen and (min-width: 620px) {
            .column,
            .gutter {
              display: table-cell;
              Float: none !important;
              vertical-align: top;
            }
            .preheader,
            .email-footer {
              width: 560px !important;
            }
            .snippet,
            .webversion {
              width: 280px !important;
            }
            .header,
            .layout,
            .one-col .column {
              width: 600px !important;
            }
            .fixed-width.has-border,
            .fixed-width.ecxhas-border,
            .has-gutter.has-border,
            .has-gutter.ecxhas-border {
              width: 602px !important;
            }
            .two-col .column {
              width: 300px !important;
            }
            .three-col .column,
            .column.narrow {
              width: 200px !important;
            }
            .column.wide {
              width: 400px !important;
            }
            .two-col.has-gutter .column,
            .two-col.ecxhas-gutter .column {
              width: 290px !important;
            }
            .three-col.has-gutter .column,
            .three-col.ecxhas-gutter .column,
            .has-gutter .narrow {
              width: 188px !important;
            }
            .has-gutter .wide {
              width: 394px !important;
            }
            .two-col.has-gutter.has-border .column,
            .two-col.ecxhas-gutter.ecxhas-border .column {
              width: 292px !important;
            }
            .three-col.has-gutter.has-border .column,
            .three-col.ecxhas-gutter.ecxhas-border .column,
            .has-gutter.has-border .narrow,
            .has-gutter.ecxhas-border .narrow {
              width: 190px !important;
            }
            .has-gutter.has-border .wide,
            .has-gutter.ecxhas-border .wide {
              width: 396px !important;
            }
          }
          @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .fblike {
              background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
            }
            .tweet {
              background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
            }
            .linkedinshare {
              background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
            }
            .forwardtoafriend {
              background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
            }
          }
          @media (max-width: 321px) {
            .fixed-width.has-border .layout__inner {
              border-width: 1px 0 !important;
            }
            .layout,
            .column {
              min-width: 320px !important;
              width: 320px !important;
            }
            .border {
              display: none;
            }
          }
          .mso div {
            border: 0 none white !important;
          }
          .mso .w560 .divider {
            Margin-left: 260px !important;
            Margin-right: 260px !important;
          }
          .mso .w360 .divider {
            Margin-left: 160px !important;
            Margin-right: 160px !important;
          }
          .mso .w260 .divider {
            Margin-left: 110px !important;
            Margin-right: 110px !important;
          }
          .mso .w160 .divider {
            Margin-left: 60px !important;
            Margin-right: 60px !important;
          }
          .mso .w354 .divider {
            Margin-left: 157px !important;
            Margin-right: 157px !important;
          }
          .mso .w250 .divider {
            Margin-left: 105px !important;
            Margin-right: 105px !important;
          }
          .mso .w148 .divider {
            Margin-left: 54px !important;
            Margin-right: 54px !important;
          }
          .mso .font-avenir,
          .mso .font-cabin,
          .mso .font-open-sans,
          .mso .font-ubuntu {
            font-family: sans-serif !important;
          }
          .mso .font-bitter,
          .mso .font-merriweather,
          .mso .font-pt-serif {
            font-family: Georgia, serif !important;
          }
          .mso .font-lato,
          .mso .font-roboto {
            font-family: Tahoma, sans-serif !important;
          }
          .mso .font-pt-sans {
            font-family: "Trebuchet MS", sans-serif !important;
          }
          .mso .footer__share-button p {
            margin: 0;
          }
          @media only screen and (min-width: 620px) {
            .wrapper .size-8 {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            .wrapper .size-9 {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            .wrapper .size-10 {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            .wrapper .size-11 {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            .wrapper .size-12 {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            .wrapper .size-13 {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            .wrapper .size-14 {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            .wrapper .size-15 {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            .wrapper .size-16 {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            .wrapper .size-17 {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            .wrapper .size-18 {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            .wrapper .size-20 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            .wrapper .size-22 {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            .wrapper .size-24 {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            .wrapper .size-26 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            .wrapper .size-28 {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            .wrapper .size-30 {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            .wrapper .size-32 {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            .wrapper .size-34 {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            .wrapper .size-36 {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            .wrapper .size-40 {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            .wrapper .size-44 {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            .wrapper .size-48 {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            .wrapper .size-56 {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            .wrapper .size-64 {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          .mso .size-8,
          .ie .size-8 {
            font-size: 8px !important;
            line-height: 14px !important;
          }
          .mso .size-9,
          .ie .size-9 {
            font-size: 9px !important;
            line-height: 16px !important;
          }
          .mso .size-10,
          .ie .size-10 {
            font-size: 10px !important;
            line-height: 18px !important;
          }
          .mso .size-11,
          .ie .size-11 {
            font-size: 11px !important;
            line-height: 19px !important;
          }
          .mso .size-12,
          .ie .size-12 {
            font-size: 12px !important;
            line-height: 19px !important;
          }
          .mso .size-13,
          .ie .size-13 {
            font-size: 13px !important;
            line-height: 21px !important;
          }
          .mso .size-14,
          .ie .size-14 {
            font-size: 14px !important;
            line-height: 21px !important;
          }
          .mso .size-15,
          .ie .size-15 {
            font-size: 15px !important;
            line-height: 23px !important;
          }
          .mso .size-16,
          .ie .size-16 {
            font-size: 16px !important;
            line-height: 24px !important;
          }
          .mso .size-17,
          .ie .size-17 {
            font-size: 17px !important;
            line-height: 26px !important;
          }
          .mso .size-18,
          .ie .size-18 {
            font-size: 18px !important;
            line-height: 26px !important;
          }
          .mso .size-20,
          .ie .size-20 {
            font-size: 20px !important;
            line-height: 28px !important;
          }
          .mso .size-22,
          .ie .size-22 {
            font-size: 22px !important;
            line-height: 31px !important;
          }
          .mso .size-24,
          .ie .size-24 {
            font-size: 24px !important;
            line-height: 32px !important;
          }
          .mso .size-26,
          .ie .size-26 {
            font-size: 26px !important;
            line-height: 34px !important;
          }
          .mso .size-28,
          .ie .size-28 {
            font-size: 28px !important;
            line-height: 36px !important;
          }
          .mso .size-30,
          .ie .size-30 {
            font-size: 30px !important;
            line-height: 38px !important;
          }
          .mso .size-32,
          .ie .size-32 {
            font-size: 32px !important;
            line-height: 40px !important;
          }
          .mso .size-34,
          .ie .size-34 {
            font-size: 34px !important;
            line-height: 43px !important;
          }
          .mso .size-36,
          .ie .size-36 {
            font-size: 36px !important;
            line-height: 43px !important;
          }
          .mso .size-40,
          .ie .size-40 {
            font-size: 40px !important;
            line-height: 47px !important;
          }
          .mso .size-44,
          .ie .size-44 {
            font-size: 44px !important;
            line-height: 50px !important;
          }
          .mso .size-48,
          .ie .size-48 {
            font-size: 48px !important;
            line-height: 54px !important;
          }
          .mso .size-56,
          .ie .size-56 {
            font-size: 56px !important;
            line-height: 60px !important;
          }
          .mso .size-64,
          .ie .size-64 {
            font-size: 64px !important;
            line-height: 63px !important;
          }
          .footer__share-button p {
            margin: 0;
          }
          </style>

              <title></title>
            <!--[if !mso]><!--><style type="text/css">
          @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
          </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
          body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
          620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
          </style><meta name="robots" content="noindex,nofollow" />
          <meta property="og:title" content="My First Campaign" />
          </head>
          <!--[if mso]>
            <body class="mso">
          <![endif]-->
          <!--[if !mso]><!-->
            <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
          <!--<![endif]-->
              <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                  <div style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                    <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                    <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                  <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                    <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                  </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </div>
                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

          <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Thanks for your Application!</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">You have succesfully filled the Registration Form for MUNDP 2019.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your MyDP Login Credentials</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>Username: </strong>'.$_POST["email"].'<br><strong>Password: </strong>'.$password.'</p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                    <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                        <div>

                        </div>
                        <div style="Margin-top: 18px;">

                        </div>
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                    <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                        '.$emailextra.'
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

            </div>
          </body></html>
          ';
      $advisoremailcontent = '
              <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                  <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
                  <meta name="viewport" content="width=device-width" />
                  <style type="text/css">
              @media only screen and (min-width: 620px) {
                * [lang=x-wrapper] h1 {
                  font-size: 26px !important;
                  line-height: 34px !important;
                }
                * [lang=x-wrapper] h2 {
                  font-size: 20px !important;
                  line-height: 28px !important;
                }
                * div [lang=x-size-8] {
                  font-size: 8px !important;
                  line-height: 14px !important;
                }
                * div [lang=x-size-9] {
                  font-size: 9px !important;
                  line-height: 16px !important;
                }
                * div [lang=x-size-10] {
                  font-size: 10px !important;
                  line-height: 18px !important;
                }
                * div [lang=x-size-11] {
                  font-size: 11px !important;
                  line-height: 19px !important;
                }
                * div [lang=x-size-12] {
                  font-size: 12px !important;
                  line-height: 19px !important;
                }
                * div [lang=x-size-13] {
                  font-size: 13px !important;
                  line-height: 21px !important;
                }
                * div [lang=x-size-14] {
                  font-size: 14px !important;
                  line-height: 21px !important;
                }
                * div [lang=x-size-15] {
                  font-size: 15px !important;
                  line-height: 23px !important;
                }
                * div [lang=x-size-16] {
                  font-size: 16px !important;
                  line-height: 24px !important;
                }
                * div [lang=x-size-17] {
                  font-size: 17px !important;
                  line-height: 26px !important;
                }
                * div [lang=x-size-18] {
                  font-size: 18px !important;
                  line-height: 26px !important;
                }
                * div [lang=x-size-18] {
                  font-size: 18px !important;
                  line-height: 26px !important;
                }
                * div [lang=x-size-20] {
                  font-size: 20px !important;
                  line-height: 28px !important;
                }
                * div [lang=x-size-22] {
                  font-size: 22px !important;
                  line-height: 31px !important;
                }
                * div [lang=x-size-24] {
                  font-size: 24px !important;
                  line-height: 32px !important;
                }
                * div [lang=x-size-26] {
                  font-size: 26px !important;
                  line-height: 34px !important;
                }
                * div [lang=x-size-28] {
                  font-size: 28px !important;
                  line-height: 36px !important;
                }
                * div [lang=x-size-30] {
                  font-size: 30px !important;
                  line-height: 38px !important;
                }
                * div [lang=x-size-32] {
                  font-size: 32px !important;
                  line-height: 40px !important;
                }
                * div [lang=x-size-34] {
                  font-size: 34px !important;
                  line-height: 43px !important;
                }
                * div [lang=x-size-36] {
                  font-size: 36px !important;
                  line-height: 43px !important;
                }
                * div [lang=x-size-40] {
                  font-size: 40px !important;
                  line-height: 47px !important;
                }
                * div [lang=x-size-44] {
                  font-size: 44px !important;
                  line-height: 50px !important;
                }
                * div [lang=x-size-48] {
                  font-size: 48px !important;
                  line-height: 54px !important;
                }
                * div [lang=x-size-56] {
                  font-size: 56px !important;
                  line-height: 60px !important;
                }
                * div [lang=x-size-64] {
                  font-size: 64px !important;
                  line-height: 63px !important;
                }
              }
              </style>
                  <style type="text/css">
              body {
                margin: 0;
                padding: 0;
              }
              table {
                border-collapse: collapse;
                table-layout: fixed;
              }
              * {
                line-height: inherit;
              }
              [x-apple-data-detectors],
              [href^="tel"],
              [href^="sms"] {
                color: inherit !important;
                text-decoration: none !important;
              }
              .wrapper .footer__share-button a:hover,
              .wrapper .footer__share-button a:focus {
                color: #ffffff !important;
              }
              .btn a:hover,
              .btn a:focus,
              .footer__share-button a:hover,
              .footer__share-button a:focus,
              .email-footer__links a:hover,
              .email-footer__links a:focus {
                opacity: 0.8;
              }
              .ie .btn {
                width: 100%;
              }
              .ie .column,
              [owa] .column,
              .ie .gutter,
              [owa] .gutter {
                display: table-cell;
                float: none !important;
                vertical-align: top;
              }
              .ie .preheader,
              [owa] .preheader,
              .ie .email-footer,
              [owa] .email-footer {
                width: 560px !important;
              }
              .ie .snippet,
              [owa] .snippet,
              .ie .webversion,
              [owa] .webversion {
                width: 280px !important;
              }
              .ie .header,
              [owa] .header,
              .ie .layout,
              [owa] .layout,
              .ie .one-col .column,
              [owa] .one-col .column {
                width: 600px !important;
              }
              .ie .fixed-width.has-border,
              [owa] .fixed-width.has-border,
              .ie .has-gutter.has-border,
              [owa] .has-gutter.has-border {
                width: 602px !important;
              }
              .ie .two-col .column,
              [owa] .two-col .column {
                width: 300px !important;
              }
              .ie .three-col .column,
              [owa] .three-col .column,
              .ie .narrow,
              [owa] .narrow {
                width: 200px !important;
              }
              .ie .wide,
              [owa] .wide {
                width: 400px !important;
              }
              .ie .two-col.has-gutter .column,
              [owa] .two-col.x_has-gutter .column {
                width: 290px !important;
              }
              .ie .three-col.has-gutter .column,
              [owa] .three-col.x_has-gutter .column,
              .ie .has-gutter .narrow,
              [owa] .has-gutter .narrow {
                width: 188px !important;
              }
              .ie .has-gutter .wide,
              [owa] .has-gutter .wide {
                width: 394px !important;
              }
              .ie .two-col.has-gutter.has-border .column,
              [owa] .two-col.x_has-gutter.x_has-border .column {
                width: 292px !important;
              }
              .ie .three-col.has-gutter.has-border .column,
              [owa] .three-col.x_has-gutter.x_has-border .column,
              .ie .has-gutter.has-border .narrow,
              [owa] .has-gutter.x_has-border .narrow {
                width: 190px !important;
              }
              .ie .has-gutter.has-border .wide,
              [owa] .has-gutter.x_has-border .wide {
                width: 396px !important;
              }
              .ie .fixed-width .layout__inner {
                border-left: 0 none white !important;
                border-right: 0 none white !important;
              }
              .ie .layout__edges {
                display: none;
              }
              .mso .layout__edges {
                font-size: 0;
              }
              .layout-fixed-width,
              .mso .layout-full-width {
                background-color: #ffffff;
              }
              @media only screen and (min-width: 620px) {
                .column,
                .gutter {
                  display: table-cell;
                  Float: none !important;
                  vertical-align: top;
                }
                .preheader,
                .email-footer {
                  width: 560px !important;
                }
                .snippet,
                .webversion {
                  width: 280px !important;
                }
                .header,
                .layout,
                .one-col .column {
                  width: 600px !important;
                }
                .fixed-width.has-border,
                .fixed-width.ecxhas-border,
                .has-gutter.has-border,
                .has-gutter.ecxhas-border {
                  width: 602px !important;
                }
                .two-col .column {
                  width: 300px !important;
                }
                .three-col .column,
                .column.narrow {
                  width: 200px !important;
                }
                .column.wide {
                  width: 400px !important;
                }
                .two-col.has-gutter .column,
                .two-col.ecxhas-gutter .column {
                  width: 290px !important;
                }
                .three-col.has-gutter .column,
                .three-col.ecxhas-gutter .column,
                .has-gutter .narrow {
                  width: 188px !important;
                }
                .has-gutter .wide {
                  width: 394px !important;
                }
                .two-col.has-gutter.has-border .column,
                .two-col.ecxhas-gutter.ecxhas-border .column {
                  width: 292px !important;
                }
                .three-col.has-gutter.has-border .column,
                .three-col.ecxhas-gutter.ecxhas-border .column,
                .has-gutter.has-border .narrow,
                .has-gutter.ecxhas-border .narrow {
                  width: 190px !important;
                }
                .has-gutter.has-border .wide,
                .has-gutter.ecxhas-border .wide {
                  width: 396px !important;
                }
              }
              @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                .fblike {
                  background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
                }
                .tweet {
                  background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
                }
                .linkedinshare {
                  background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
                }
                .forwardtoafriend {
                  background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
                }
              }
              @media (max-width: 321px) {
                .fixed-width.has-border .layout__inner {
                  border-width: 1px 0 !important;
                }
                .layout,
                .column {
                  min-width: 320px !important;
                  width: 320px !important;
                }
                .border {
                  display: none;
                }
              }
              .mso div {
                border: 0 none white !important;
              }
              .mso .w560 .divider {
                Margin-left: 260px !important;
                Margin-right: 260px !important;
              }
              .mso .w360 .divider {
                Margin-left: 160px !important;
                Margin-right: 160px !important;
              }
              .mso .w260 .divider {
                Margin-left: 110px !important;
                Margin-right: 110px !important;
              }
              .mso .w160 .divider {
                Margin-left: 60px !important;
                Margin-right: 60px !important;
              }
              .mso .w354 .divider {
                Margin-left: 157px !important;
                Margin-right: 157px !important;
              }
              .mso .w250 .divider {
                Margin-left: 105px !important;
                Margin-right: 105px !important;
              }
              .mso .w148 .divider {
                Margin-left: 54px !important;
                Margin-right: 54px !important;
              }
              .mso .font-avenir,
              .mso .font-cabin,
              .mso .font-open-sans,
              .mso .font-ubuntu {
                font-family: sans-serif !important;
              }
              .mso .font-bitter,
              .mso .font-merriweather,
              .mso .font-pt-serif {
                font-family: Georgia, serif !important;
              }
              .mso .font-lato,
              .mso .font-roboto {
                font-family: Tahoma, sans-serif !important;
              }
              .mso .font-pt-sans {
                font-family: "Trebuchet MS", sans-serif !important;
              }
              .mso .footer__share-button p {
                margin: 0;
              }
              @media only screen and (min-width: 620px) {
                .wrapper .size-8 {
                  font-size: 8px !important;
                  line-height: 14px !important;
                }
                .wrapper .size-9 {
                  font-size: 9px !important;
                  line-height: 16px !important;
                }
                .wrapper .size-10 {
                  font-size: 10px !important;
                  line-height: 18px !important;
                }
                .wrapper .size-11 {
                  font-size: 11px !important;
                  line-height: 19px !important;
                }
                .wrapper .size-12 {
                  font-size: 12px !important;
                  line-height: 19px !important;
                }
                .wrapper .size-13 {
                  font-size: 13px !important;
                  line-height: 21px !important;
                }
                .wrapper .size-14 {
                  font-size: 14px !important;
                  line-height: 21px !important;
                }
                .wrapper .size-15 {
                  font-size: 15px !important;
                  line-height: 23px !important;
                }
                .wrapper .size-16 {
                  font-size: 16px !important;
                  line-height: 24px !important;
                }
                .wrapper .size-17 {
                  font-size: 17px !important;
                  line-height: 26px !important;
                }
                .wrapper .size-18 {
                  font-size: 18px !important;
                  line-height: 26px !important;
                }
                .wrapper .size-20 {
                  font-size: 20px !important;
                  line-height: 28px !important;
                }
                .wrapper .size-22 {
                  font-size: 22px !important;
                  line-height: 31px !important;
                }
                .wrapper .size-24 {
                  font-size: 24px !important;
                  line-height: 32px !important;
                }
                .wrapper .size-26 {
                  font-size: 26px !important;
                  line-height: 34px !important;
                }
                .wrapper .size-28 {
                  font-size: 28px !important;
                  line-height: 36px !important;
                }
                .wrapper .size-30 {
                  font-size: 30px !important;
                  line-height: 38px !important;
                }
                .wrapper .size-32 {
                  font-size: 32px !important;
                  line-height: 40px !important;
                }
                .wrapper .size-34 {
                  font-size: 34px !important;
                  line-height: 43px !important;
                }
                .wrapper .size-36 {
                  font-size: 36px !important;
                  line-height: 43px !important;
                }
                .wrapper .size-40 {
                  font-size: 40px !important;
                  line-height: 47px !important;
                }
                .wrapper .size-44 {
                  font-size: 44px !important;
                  line-height: 50px !important;
                }
                .wrapper .size-48 {
                  font-size: 48px !important;
                  line-height: 54px !important;
                }
                .wrapper .size-56 {
                  font-size: 56px !important;
                  line-height: 60px !important;
                }
                .wrapper .size-64 {
                  font-size: 64px !important;
                  line-height: 63px !important;
                }
              }
              .mso .size-8,
              .ie .size-8 {
                font-size: 8px !important;
                line-height: 14px !important;
              }
              .mso .size-9,
              .ie .size-9 {
                font-size: 9px !important;
                line-height: 16px !important;
              }
              .mso .size-10,
              .ie .size-10 {
                font-size: 10px !important;
                line-height: 18px !important;
              }
              .mso .size-11,
              .ie .size-11 {
                font-size: 11px !important;
                line-height: 19px !important;
              }
              .mso .size-12,
              .ie .size-12 {
                font-size: 12px !important;
                line-height: 19px !important;
              }
              .mso .size-13,
              .ie .size-13 {
                font-size: 13px !important;
                line-height: 21px !important;
              }
              .mso .size-14,
              .ie .size-14 {
                font-size: 14px !important;
                line-height: 21px !important;
              }
              .mso .size-15,
              .ie .size-15 {
                font-size: 15px !important;
                line-height: 23px !important;
              }
              .mso .size-16,
              .ie .size-16 {
                font-size: 16px !important;
                line-height: 24px !important;
              }
              .mso .size-17,
              .ie .size-17 {
                font-size: 17px !important;
                line-height: 26px !important;
              }
              .mso .size-18,
              .ie .size-18 {
                font-size: 18px !important;
                line-height: 26px !important;
              }
              .mso .size-20,
              .ie .size-20 {
                font-size: 20px !important;
                line-height: 28px !important;
              }
              .mso .size-22,
              .ie .size-22 {
                font-size: 22px !important;
                line-height: 31px !important;
              }
              .mso .size-24,
              .ie .size-24 {
                font-size: 24px !important;
                line-height: 32px !important;
              }
              .mso .size-26,
              .ie .size-26 {
                font-size: 26px !important;
                line-height: 34px !important;
              }
              .mso .size-28,
              .ie .size-28 {
                font-size: 28px !important;
                line-height: 36px !important;
              }
              .mso .size-30,
              .ie .size-30 {
                font-size: 30px !important;
                line-height: 38px !important;
              }
              .mso .size-32,
              .ie .size-32 {
                font-size: 32px !important;
                line-height: 40px !important;
              }
              .mso .size-34,
              .ie .size-34 {
                font-size: 34px !important;
                line-height: 43px !important;
              }
              .mso .size-36,
              .ie .size-36 {
                font-size: 36px !important;
                line-height: 43px !important;
              }
              .mso .size-40,
              .ie .size-40 {
                font-size: 40px !important;
                line-height: 47px !important;
              }
              .mso .size-44,
              .ie .size-44 {
                font-size: 44px !important;
                line-height: 50px !important;
              }
              .mso .size-48,
              .ie .size-48 {
                font-size: 48px !important;
                line-height: 54px !important;
              }
              .mso .size-56,
              .ie .size-56 {
                font-size: 56px !important;
                line-height: 60px !important;
              }
              .mso .size-64,
              .ie .size-64 {
                font-size: 64px !important;
                line-height: 63px !important;
              }
              .footer__share-button p {
                margin: 0;
              }
              </style>

                  <title></title>
                <!--[if !mso]><!--><style type="text/css">
              @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
              </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
              body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
              620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
              </style><meta name="robots" content="noindex,nofollow" />
              <meta property="og:title" content="My First Campaign" />
              </head>
              <!--[if mso]>
                <body class="mso">
              <![endif]-->
              <!--[if !mso]><!-->
                <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
              <!--<![endif]-->
                  <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                    <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                      <div style="border-collapse: collapse;display: table;">
                      <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                        <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                        </div>
                      <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                        <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                        </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      </div>
                    </div>
                    <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                    <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                      <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                        <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                      </div>
                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </div>
                    <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                      <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                      <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                        <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                          <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

              <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Dear advisor,</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your student '.$regd["fullname"].' has applied for a position in MUNDP 2019. We kindly ask you to send a recommendation letter to <a href="mailto:recommendation@modelundp.org">recommendation@modelundp.org</a> by Dec. 18 2016. Be reminded that an application without a recommendation letter will not be taken under consideration by the Secretariat.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Also, if you have more than one student applying for the same position, you should include a ranking of these students in terms of their general performance at the bottom of the letter.
              </p>
                  </div>

                        </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      </div>
                    </div>

                    <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                    <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                      <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                      <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                        <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                          <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                    <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Best Regards,</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>MUNDP Secretariat</strong></p>
                  </div>

                        </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      </div>
                    </div>

                    <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                    <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                      <div class="layout__inner" style="border-collapse: collapse;display: table;">
                      <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                        <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                          <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                            <div>

                            </div>
                            <div style="Margin-top: 18px;">

                            </div>
                          </div>
                        </div>
                      <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                        <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                          <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                            '.$emailextra.'
                          </div>
                        </div>
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      </div>
                    </div>

                </div>
              </body></html>
                  ';

          // end

      if(!send_email($_POST["email"],"Registration",$emailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if(!send_email($_POST["advisor_email"],"Recommendation for your Student",$advisoremailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if($_POST["emailtest"] == "false" or 1 == 1)
      {
          DB::insert('mydp_users', array(
            'email' => $regd["email"],
            'hash' => $hash,
            'fullname' => $regd["fullname"],
            'phone' => $regd["phone"],
            'school' => $regd["schoolid"],
            'verified' => 0,
            'position' => 0,
            'birthdate' => $regd["birthdate"],
            'time_register' => microtime(true),
            'applicationdata' => json_encode($regd)
          ));
      }

      echo "ok";
  }

  //

  if($_POST["form"] == "historical")
  {

      if(!$regisetting['historical']) {
        return;
      }

      // Registration Data
      $regd["fullname"] = $_POST["fullname"];
      $regd["country"] = $_POST["country"];
      $regd["birthdate"] = $_POST["birthdate"];
      $regd["graduation"] = $_POST["graduation"];
      $regd["sex"] = $_POST["sex"];
      $regd["schoolid"] = $_POST["school"];
      $regd["schoolname"] = $_POST["schoolname"];
      $regd["phone"] = $_POST["phone"];
      $regd["email"] = $_POST["email"];
      $regd["advisor_email"] = $_POST["advisor_email"];

      $regd["exp1-year"] = $_POST["exp1-year"];
      $regd["exp1-con"] = $_POST["exp1-con"];
      $regd["exp1-pos"] = $_POST["exp1-pos"];

      $regd["exp2-year"] = $_POST["exp2-year"];
      $regd["exp2-con"] = $_POST["exp2-con"];
      $regd["exp2-pos"] = $_POST["exp2-pos"];

      $regd["exp3-year"] = $_POST["exp3-year"];
      $regd["exp3-con"] = $_POST["exp3-con"];
      $regd["exp3-pos"] = $_POST["exp3-pos"];

      $regd["exp4-year"] = $_POST["exp4-year"];
      $regd["exp4-con"] = $_POST["exp4-con"];
      $regd["exp4-pos"] = $_POST["exp4-pos"];

      $regd["exp5-year"] = $_POST["exp5-year"];
      $regd["exp5-con"] = $_POST["exp5-con"];
      $regd["exp5-pos"] = $_POST["exp5-pos"];

      $regd["exp6-year"] = $_POST["exp6-year"];
      $regd["exp6-con"] = $_POST["exp6-con"];
      $regd["exp6-pos"] = $_POST["exp6-pos"];

      $regd["exp7-year"] = $_POST["exp7-year"];
      $regd["exp7-con"] = $_POST["exp7-con"];
      $regd["exp7-pos"] = $_POST["exp7-pos"];

      $regd["exp8-year"] = $_POST["exp8-year"];
      $regd["exp8-con"] = $_POST["exp8-con"];
      $regd["exp8-pos"] = $_POST["exp8-pos"];

      $regd["exp9-year"] = $_POST["exp9-year"];
      $regd["exp9-con"] = $_POST["exp9-con"];
      $regd["exp9-pos"] = $_POST["exp9-pos"];

      $regd["exp10-year"] = $_POST["exp10-year"];
      $regd["exp10-con"] = $_POST["exp10-con"];
      $regd["exp10-pos"] = $_POST["exp10-pos"];

      $regd["applicationletter"] = $_POST["applicationletter"];

      $regd["cabinet"] = $_POST["cabinet"];

      $regd["position"] = "historical";

      $listfor = DB::queryFirstRow("SELECT * FROM mydp_users WHERE email=%s",$_POST["email"]);

      if(!empty($listfor["id"]))
      {
          echo "emailinuse";
          return;
      }

      foreach($regd as $id => $data)
      {
        if(empty($data) and strpos($id, 'exp') === false and strpos($id, 'school') === false)
        {
          echo "empty";
          return;
        }
      }

      include("../secure/email.php");
      include("../secure/randompass.php");

      if($_POST["emailtest"] == "true")
      {
          $emailextra = "<p><strong>Alert:</strong><br>This form is filled for testing. The information given won't be recored into the system.</p>";
      }
      else
      {
          $emailextra = "";
      }

      $password = generateStrongPassword();
      $cost = 10;
      $salt = strtr(base64_encode(mcrypt_create_iv(64, MCRYPT_DEV_URANDOM)), '+', '.');
      $salt = sprintf("$2a$%02d$", $cost) . $salt;
      $hash = crypt($password, $salt);

      $emailcontent = '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
              <meta name="viewport" content="width=device-width" />
              <style type="text/css">
          @media only screen and (min-width: 620px) {
            * [lang=x-wrapper] h1 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * [lang=x-wrapper] h2 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-8] {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            * div [lang=x-size-9] {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            * div [lang=x-size-10] {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            * div [lang=x-size-11] {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-12] {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-13] {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-14] {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-15] {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            * div [lang=x-size-16] {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            * div [lang=x-size-17] {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-20] {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-22] {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            * div [lang=x-size-24] {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            * div [lang=x-size-26] {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * div [lang=x-size-28] {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            * div [lang=x-size-30] {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            * div [lang=x-size-32] {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            * div [lang=x-size-34] {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-36] {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-40] {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            * div [lang=x-size-44] {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            * div [lang=x-size-48] {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            * div [lang=x-size-56] {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            * div [lang=x-size-64] {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          </style>
              <style type="text/css">
          body {
            margin: 0;
            padding: 0;
          }
          table {
            border-collapse: collapse;
            table-layout: fixed;
          }
          * {
            line-height: inherit;
          }
          [x-apple-data-detectors],
          [href^="tel"],
          [href^="sms"] {
            color: inherit !important;
            text-decoration: none !important;
          }
          .wrapper .footer__share-button a:hover,
          .wrapper .footer__share-button a:focus {
            color: #ffffff !important;
          }
          .btn a:hover,
          .btn a:focus,
          .footer__share-button a:hover,
          .footer__share-button a:focus,
          .email-footer__links a:hover,
          .email-footer__links a:focus {
            opacity: 0.8;
          }
          .ie .btn {
            width: 100%;
          }
          .ie .column,
          [owa] .column,
          .ie .gutter,
          [owa] .gutter {
            display: table-cell;
            float: none !important;
            vertical-align: top;
          }
          .ie .preheader,
          [owa] .preheader,
          .ie .email-footer,
          [owa] .email-footer {
            width: 560px !important;
          }
          .ie .snippet,
          [owa] .snippet,
          .ie .webversion,
          [owa] .webversion {
            width: 280px !important;
          }
          .ie .header,
          [owa] .header,
          .ie .layout,
          [owa] .layout,
          .ie .one-col .column,
          [owa] .one-col .column {
            width: 600px !important;
          }
          .ie .fixed-width.has-border,
          [owa] .fixed-width.has-border,
          .ie .has-gutter.has-border,
          [owa] .has-gutter.has-border {
            width: 602px !important;
          }
          .ie .two-col .column,
          [owa] .two-col .column {
            width: 300px !important;
          }
          .ie .three-col .column,
          [owa] .three-col .column,
          .ie .narrow,
          [owa] .narrow {
            width: 200px !important;
          }
          .ie .wide,
          [owa] .wide {
            width: 400px !important;
          }
          .ie .two-col.has-gutter .column,
          [owa] .two-col.x_has-gutter .column {
            width: 290px !important;
          }
          .ie .three-col.has-gutter .column,
          [owa] .three-col.x_has-gutter .column,
          .ie .has-gutter .narrow,
          [owa] .has-gutter .narrow {
            width: 188px !important;
          }
          .ie .has-gutter .wide,
          [owa] .has-gutter .wide {
            width: 394px !important;
          }
          .ie .two-col.has-gutter.has-border .column,
          [owa] .two-col.x_has-gutter.x_has-border .column {
            width: 292px !important;
          }
          .ie .three-col.has-gutter.has-border .column,
          [owa] .three-col.x_has-gutter.x_has-border .column,
          .ie .has-gutter.has-border .narrow,
          [owa] .has-gutter.x_has-border .narrow {
            width: 190px !important;
          }
          .ie .has-gutter.has-border .wide,
          [owa] .has-gutter.x_has-border .wide {
            width: 396px !important;
          }
          .ie .fixed-width .layout__inner {
            border-left: 0 none white !important;
            border-right: 0 none white !important;
          }
          .ie .layout__edges {
            display: none;
          }
          .mso .layout__edges {
            font-size: 0;
          }
          .layout-fixed-width,
          .mso .layout-full-width {
            background-color: #ffffff;
          }
          @media only screen and (min-width: 620px) {
            .column,
            .gutter {
              display: table-cell;
              Float: none !important;
              vertical-align: top;
            }
            .preheader,
            .email-footer {
              width: 560px !important;
            }
            .snippet,
            .webversion {
              width: 280px !important;
            }
            .header,
            .layout,
            .one-col .column {
              width: 600px !important;
            }
            .fixed-width.has-border,
            .fixed-width.ecxhas-border,
            .has-gutter.has-border,
            .has-gutter.ecxhas-border {
              width: 602px !important;
            }
            .two-col .column {
              width: 300px !important;
            }
            .three-col .column,
            .column.narrow {
              width: 200px !important;
            }
            .column.wide {
              width: 400px !important;
            }
            .two-col.has-gutter .column,
            .two-col.ecxhas-gutter .column {
              width: 290px !important;
            }
            .three-col.has-gutter .column,
            .three-col.ecxhas-gutter .column,
            .has-gutter .narrow {
              width: 188px !important;
            }
            .has-gutter .wide {
              width: 394px !important;
            }
            .two-col.has-gutter.has-border .column,
            .two-col.ecxhas-gutter.ecxhas-border .column {
              width: 292px !important;
            }
            .three-col.has-gutter.has-border .column,
            .three-col.ecxhas-gutter.ecxhas-border .column,
            .has-gutter.has-border .narrow,
            .has-gutter.ecxhas-border .narrow {
              width: 190px !important;
            }
            .has-gutter.has-border .wide,
            .has-gutter.ecxhas-border .wide {
              width: 396px !important;
            }
          }
          @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .fblike {
              background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
            }
            .tweet {
              background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
            }
            .linkedinshare {
              background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
            }
            .forwardtoafriend {
              background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
            }
          }
          @media (max-width: 321px) {
            .fixed-width.has-border .layout__inner {
              border-width: 1px 0 !important;
            }
            .layout,
            .column {
              min-width: 320px !important;
              width: 320px !important;
            }
            .border {
              display: none;
            }
          }
          .mso div {
            border: 0 none white !important;
          }
          .mso .w560 .divider {
            Margin-left: 260px !important;
            Margin-right: 260px !important;
          }
          .mso .w360 .divider {
            Margin-left: 160px !important;
            Margin-right: 160px !important;
          }
          .mso .w260 .divider {
            Margin-left: 110px !important;
            Margin-right: 110px !important;
          }
          .mso .w160 .divider {
            Margin-left: 60px !important;
            Margin-right: 60px !important;
          }
          .mso .w354 .divider {
            Margin-left: 157px !important;
            Margin-right: 157px !important;
          }
          .mso .w250 .divider {
            Margin-left: 105px !important;
            Margin-right: 105px !important;
          }
          .mso .w148 .divider {
            Margin-left: 54px !important;
            Margin-right: 54px !important;
          }
          .mso .font-avenir,
          .mso .font-cabin,
          .mso .font-open-sans,
          .mso .font-ubuntu {
            font-family: sans-serif !important;
          }
          .mso .font-bitter,
          .mso .font-merriweather,
          .mso .font-pt-serif {
            font-family: Georgia, serif !important;
          }
          .mso .font-lato,
          .mso .font-roboto {
            font-family: Tahoma, sans-serif !important;
          }
          .mso .font-pt-sans {
            font-family: "Trebuchet MS", sans-serif !important;
          }
          .mso .footer__share-button p {
            margin: 0;
          }
          @media only screen and (min-width: 620px) {
            .wrapper .size-8 {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            .wrapper .size-9 {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            .wrapper .size-10 {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            .wrapper .size-11 {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            .wrapper .size-12 {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            .wrapper .size-13 {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            .wrapper .size-14 {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            .wrapper .size-15 {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            .wrapper .size-16 {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            .wrapper .size-17 {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            .wrapper .size-18 {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            .wrapper .size-20 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            .wrapper .size-22 {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            .wrapper .size-24 {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            .wrapper .size-26 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            .wrapper .size-28 {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            .wrapper .size-30 {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            .wrapper .size-32 {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            .wrapper .size-34 {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            .wrapper .size-36 {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            .wrapper .size-40 {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            .wrapper .size-44 {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            .wrapper .size-48 {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            .wrapper .size-56 {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            .wrapper .size-64 {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          .mso .size-8,
          .ie .size-8 {
            font-size: 8px !important;
            line-height: 14px !important;
          }
          .mso .size-9,
          .ie .size-9 {
            font-size: 9px !important;
            line-height: 16px !important;
          }
          .mso .size-10,
          .ie .size-10 {
            font-size: 10px !important;
            line-height: 18px !important;
          }
          .mso .size-11,
          .ie .size-11 {
            font-size: 11px !important;
            line-height: 19px !important;
          }
          .mso .size-12,
          .ie .size-12 {
            font-size: 12px !important;
            line-height: 19px !important;
          }
          .mso .size-13,
          .ie .size-13 {
            font-size: 13px !important;
            line-height: 21px !important;
          }
          .mso .size-14,
          .ie .size-14 {
            font-size: 14px !important;
            line-height: 21px !important;
          }
          .mso .size-15,
          .ie .size-15 {
            font-size: 15px !important;
            line-height: 23px !important;
          }
          .mso .size-16,
          .ie .size-16 {
            font-size: 16px !important;
            line-height: 24px !important;
          }
          .mso .size-17,
          .ie .size-17 {
            font-size: 17px !important;
            line-height: 26px !important;
          }
          .mso .size-18,
          .ie .size-18 {
            font-size: 18px !important;
            line-height: 26px !important;
          }
          .mso .size-20,
          .ie .size-20 {
            font-size: 20px !important;
            line-height: 28px !important;
          }
          .mso .size-22,
          .ie .size-22 {
            font-size: 22px !important;
            line-height: 31px !important;
          }
          .mso .size-24,
          .ie .size-24 {
            font-size: 24px !important;
            line-height: 32px !important;
          }
          .mso .size-26,
          .ie .size-26 {
            font-size: 26px !important;
            line-height: 34px !important;
          }
          .mso .size-28,
          .ie .size-28 {
            font-size: 28px !important;
            line-height: 36px !important;
          }
          .mso .size-30,
          .ie .size-30 {
            font-size: 30px !important;
            line-height: 38px !important;
          }
          .mso .size-32,
          .ie .size-32 {
            font-size: 32px !important;
            line-height: 40px !important;
          }
          .mso .size-34,
          .ie .size-34 {
            font-size: 34px !important;
            line-height: 43px !important;
          }
          .mso .size-36,
          .ie .size-36 {
            font-size: 36px !important;
            line-height: 43px !important;
          }
          .mso .size-40,
          .ie .size-40 {
            font-size: 40px !important;
            line-height: 47px !important;
          }
          .mso .size-44,
          .ie .size-44 {
            font-size: 44px !important;
            line-height: 50px !important;
          }
          .mso .size-48,
          .ie .size-48 {
            font-size: 48px !important;
            line-height: 54px !important;
          }
          .mso .size-56,
          .ie .size-56 {
            font-size: 56px !important;
            line-height: 60px !important;
          }
          .mso .size-64,
          .ie .size-64 {
            font-size: 64px !important;
            line-height: 63px !important;
          }
          .footer__share-button p {
            margin: 0;
          }
          </style>

              <title></title>
            <!--[if !mso]><!--><style type="text/css">
          @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
          </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
          body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
          620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
          </style><meta name="robots" content="noindex,nofollow" />
          <meta property="og:title" content="My First Campaign" />
          </head>
          <!--[if mso]>
            <body class="mso">
          <![endif]-->
          <!--[if !mso]><!-->
            <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
          <!--<![endif]-->
              <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                  <div style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                    <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                    <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                  <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                    <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                  </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </div>
                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

          <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Thanks for your Application!</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">You have succesfully filled the Registration Form for MUNDP 2019.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your MyDP Login Credentials</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>Username: </strong>'.$_POST["email"].'<br><strong>Password: </strong>'.$password.'</p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                    <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                        <div>

                        </div>
                        <div style="Margin-top: 18px;">

                        </div>
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                    <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                        '.$emailextra.'
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

            </div>
          </body></html>
          ';

      $advisoremailcontent = '
                  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
                      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                      <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
                      <meta name="viewport" content="width=device-width" />
                      <style type="text/css">
                  @media only screen and (min-width: 620px) {
                    * [lang=x-wrapper] h1 {
                      font-size: 26px !important;
                      line-height: 34px !important;
                    }
                    * [lang=x-wrapper] h2 {
                      font-size: 20px !important;
                      line-height: 28px !important;
                    }
                    * div [lang=x-size-8] {
                      font-size: 8px !important;
                      line-height: 14px !important;
                    }
                    * div [lang=x-size-9] {
                      font-size: 9px !important;
                      line-height: 16px !important;
                    }
                    * div [lang=x-size-10] {
                      font-size: 10px !important;
                      line-height: 18px !important;
                    }
                    * div [lang=x-size-11] {
                      font-size: 11px !important;
                      line-height: 19px !important;
                    }
                    * div [lang=x-size-12] {
                      font-size: 12px !important;
                      line-height: 19px !important;
                    }
                    * div [lang=x-size-13] {
                      font-size: 13px !important;
                      line-height: 21px !important;
                    }
                    * div [lang=x-size-14] {
                      font-size: 14px !important;
                      line-height: 21px !important;
                    }
                    * div [lang=x-size-15] {
                      font-size: 15px !important;
                      line-height: 23px !important;
                    }
                    * div [lang=x-size-16] {
                      font-size: 16px !important;
                      line-height: 24px !important;
                    }
                    * div [lang=x-size-17] {
                      font-size: 17px !important;
                      line-height: 26px !important;
                    }
                    * div [lang=x-size-18] {
                      font-size: 18px !important;
                      line-height: 26px !important;
                    }
                    * div [lang=x-size-18] {
                      font-size: 18px !important;
                      line-height: 26px !important;
                    }
                    * div [lang=x-size-20] {
                      font-size: 20px !important;
                      line-height: 28px !important;
                    }
                    * div [lang=x-size-22] {
                      font-size: 22px !important;
                      line-height: 31px !important;
                    }
                    * div [lang=x-size-24] {
                      font-size: 24px !important;
                      line-height: 32px !important;
                    }
                    * div [lang=x-size-26] {
                      font-size: 26px !important;
                      line-height: 34px !important;
                    }
                    * div [lang=x-size-28] {
                      font-size: 28px !important;
                      line-height: 36px !important;
                    }
                    * div [lang=x-size-30] {
                      font-size: 30px !important;
                      line-height: 38px !important;
                    }
                    * div [lang=x-size-32] {
                      font-size: 32px !important;
                      line-height: 40px !important;
                    }
                    * div [lang=x-size-34] {
                      font-size: 34px !important;
                      line-height: 43px !important;
                    }
                    * div [lang=x-size-36] {
                      font-size: 36px !important;
                      line-height: 43px !important;
                    }
                    * div [lang=x-size-40] {
                      font-size: 40px !important;
                      line-height: 47px !important;
                    }
                    * div [lang=x-size-44] {
                      font-size: 44px !important;
                      line-height: 50px !important;
                    }
                    * div [lang=x-size-48] {
                      font-size: 48px !important;
                      line-height: 54px !important;
                    }
                    * div [lang=x-size-56] {
                      font-size: 56px !important;
                      line-height: 60px !important;
                    }
                    * div [lang=x-size-64] {
                      font-size: 64px !important;
                      line-height: 63px !important;
                    }
                  }
                  </style>
                      <style type="text/css">
                  body {
                    margin: 0;
                    padding: 0;
                  }
                  table {
                    border-collapse: collapse;
                    table-layout: fixed;
                  }
                  * {
                    line-height: inherit;
                  }
                  [x-apple-data-detectors],
                  [href^="tel"],
                  [href^="sms"] {
                    color: inherit !important;
                    text-decoration: none !important;
                  }
                  .wrapper .footer__share-button a:hover,
                  .wrapper .footer__share-button a:focus {
                    color: #ffffff !important;
                  }
                  .btn a:hover,
                  .btn a:focus,
                  .footer__share-button a:hover,
                  .footer__share-button a:focus,
                  .email-footer__links a:hover,
                  .email-footer__links a:focus {
                    opacity: 0.8;
                  }
                  .ie .btn {
                    width: 100%;
                  }
                  .ie .column,
                  [owa] .column,
                  .ie .gutter,
                  [owa] .gutter {
                    display: table-cell;
                    float: none !important;
                    vertical-align: top;
                  }
                  .ie .preheader,
                  [owa] .preheader,
                  .ie .email-footer,
                  [owa] .email-footer {
                    width: 560px !important;
                  }
                  .ie .snippet,
                  [owa] .snippet,
                  .ie .webversion,
                  [owa] .webversion {
                    width: 280px !important;
                  }
                  .ie .header,
                  [owa] .header,
                  .ie .layout,
                  [owa] .layout,
                  .ie .one-col .column,
                  [owa] .one-col .column {
                    width: 600px !important;
                  }
                  .ie .fixed-width.has-border,
                  [owa] .fixed-width.has-border,
                  .ie .has-gutter.has-border,
                  [owa] .has-gutter.has-border {
                    width: 602px !important;
                  }
                  .ie .two-col .column,
                  [owa] .two-col .column {
                    width: 300px !important;
                  }
                  .ie .three-col .column,
                  [owa] .three-col .column,
                  .ie .narrow,
                  [owa] .narrow {
                    width: 200px !important;
                  }
                  .ie .wide,
                  [owa] .wide {
                    width: 400px !important;
                  }
                  .ie .two-col.has-gutter .column,
                  [owa] .two-col.x_has-gutter .column {
                    width: 290px !important;
                  }
                  .ie .three-col.has-gutter .column,
                  [owa] .three-col.x_has-gutter .column,
                  .ie .has-gutter .narrow,
                  [owa] .has-gutter .narrow {
                    width: 188px !important;
                  }
                  .ie .has-gutter .wide,
                  [owa] .has-gutter .wide {
                    width: 394px !important;
                  }
                  .ie .two-col.has-gutter.has-border .column,
                  [owa] .two-col.x_has-gutter.x_has-border .column {
                    width: 292px !important;
                  }
                  .ie .three-col.has-gutter.has-border .column,
                  [owa] .three-col.x_has-gutter.x_has-border .column,
                  .ie .has-gutter.has-border .narrow,
                  [owa] .has-gutter.x_has-border .narrow {
                    width: 190px !important;
                  }
                  .ie .has-gutter.has-border .wide,
                  [owa] .has-gutter.x_has-border .wide {
                    width: 396px !important;
                  }
                  .ie .fixed-width .layout__inner {
                    border-left: 0 none white !important;
                    border-right: 0 none white !important;
                  }
                  .ie .layout__edges {
                    display: none;
                  }
                  .mso .layout__edges {
                    font-size: 0;
                  }
                  .layout-fixed-width,
                  .mso .layout-full-width {
                    background-color: #ffffff;
                  }
                  @media only screen and (min-width: 620px) {
                    .column,
                    .gutter {
                      display: table-cell;
                      Float: none !important;
                      vertical-align: top;
                    }
                    .preheader,
                    .email-footer {
                      width: 560px !important;
                    }
                    .snippet,
                    .webversion {
                      width: 280px !important;
                    }
                    .header,
                    .layout,
                    .one-col .column {
                      width: 600px !important;
                    }
                    .fixed-width.has-border,
                    .fixed-width.ecxhas-border,
                    .has-gutter.has-border,
                    .has-gutter.ecxhas-border {
                      width: 602px !important;
                    }
                    .two-col .column {
                      width: 300px !important;
                    }
                    .three-col .column,
                    .column.narrow {
                      width: 200px !important;
                    }
                    .column.wide {
                      width: 400px !important;
                    }
                    .two-col.has-gutter .column,
                    .two-col.ecxhas-gutter .column {
                      width: 290px !important;
                    }
                    .three-col.has-gutter .column,
                    .three-col.ecxhas-gutter .column,
                    .has-gutter .narrow {
                      width: 188px !important;
                    }
                    .has-gutter .wide {
                      width: 394px !important;
                    }
                    .two-col.has-gutter.has-border .column,
                    .two-col.ecxhas-gutter.ecxhas-border .column {
                      width: 292px !important;
                    }
                    .three-col.has-gutter.has-border .column,
                    .three-col.ecxhas-gutter.ecxhas-border .column,
                    .has-gutter.has-border .narrow,
                    .has-gutter.ecxhas-border .narrow {
                      width: 190px !important;
                    }
                    .has-gutter.has-border .wide,
                    .has-gutter.ecxhas-border .wide {
                      width: 396px !important;
                    }
                  }
                  @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                    .fblike {
                      background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
                    }
                    .tweet {
                      background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
                    }
                    .linkedinshare {
                      background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
                    }
                    .forwardtoafriend {
                      background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
                    }
                  }
                  @media (max-width: 321px) {
                    .fixed-width.has-border .layout__inner {
                      border-width: 1px 0 !important;
                    }
                    .layout,
                    .column {
                      min-width: 320px !important;
                      width: 320px !important;
                    }
                    .border {
                      display: none;
                    }
                  }
                  .mso div {
                    border: 0 none white !important;
                  }
                  .mso .w560 .divider {
                    Margin-left: 260px !important;
                    Margin-right: 260px !important;
                  }
                  .mso .w360 .divider {
                    Margin-left: 160px !important;
                    Margin-right: 160px !important;
                  }
                  .mso .w260 .divider {
                    Margin-left: 110px !important;
                    Margin-right: 110px !important;
                  }
                  .mso .w160 .divider {
                    Margin-left: 60px !important;
                    Margin-right: 60px !important;
                  }
                  .mso .w354 .divider {
                    Margin-left: 157px !important;
                    Margin-right: 157px !important;
                  }
                  .mso .w250 .divider {
                    Margin-left: 105px !important;
                    Margin-right: 105px !important;
                  }
                  .mso .w148 .divider {
                    Margin-left: 54px !important;
                    Margin-right: 54px !important;
                  }
                  .mso .font-avenir,
                  .mso .font-cabin,
                  .mso .font-open-sans,
                  .mso .font-ubuntu {
                    font-family: sans-serif !important;
                  }
                  .mso .font-bitter,
                  .mso .font-merriweather,
                  .mso .font-pt-serif {
                    font-family: Georgia, serif !important;
                  }
                  .mso .font-lato,
                  .mso .font-roboto {
                    font-family: Tahoma, sans-serif !important;
                  }
                  .mso .font-pt-sans {
                    font-family: "Trebuchet MS", sans-serif !important;
                  }
                  .mso .footer__share-button p {
                    margin: 0;
                  }
                  @media only screen and (min-width: 620px) {
                    .wrapper .size-8 {
                      font-size: 8px !important;
                      line-height: 14px !important;
                    }
                    .wrapper .size-9 {
                      font-size: 9px !important;
                      line-height: 16px !important;
                    }
                    .wrapper .size-10 {
                      font-size: 10px !important;
                      line-height: 18px !important;
                    }
                    .wrapper .size-11 {
                      font-size: 11px !important;
                      line-height: 19px !important;
                    }
                    .wrapper .size-12 {
                      font-size: 12px !important;
                      line-height: 19px !important;
                    }
                    .wrapper .size-13 {
                      font-size: 13px !important;
                      line-height: 21px !important;
                    }
                    .wrapper .size-14 {
                      font-size: 14px !important;
                      line-height: 21px !important;
                    }
                    .wrapper .size-15 {
                      font-size: 15px !important;
                      line-height: 23px !important;
                    }
                    .wrapper .size-16 {
                      font-size: 16px !important;
                      line-height: 24px !important;
                    }
                    .wrapper .size-17 {
                      font-size: 17px !important;
                      line-height: 26px !important;
                    }
                    .wrapper .size-18 {
                      font-size: 18px !important;
                      line-height: 26px !important;
                    }
                    .wrapper .size-20 {
                      font-size: 20px !important;
                      line-height: 28px !important;
                    }
                    .wrapper .size-22 {
                      font-size: 22px !important;
                      line-height: 31px !important;
                    }
                    .wrapper .size-24 {
                      font-size: 24px !important;
                      line-height: 32px !important;
                    }
                    .wrapper .size-26 {
                      font-size: 26px !important;
                      line-height: 34px !important;
                    }
                    .wrapper .size-28 {
                      font-size: 28px !important;
                      line-height: 36px !important;
                    }
                    .wrapper .size-30 {
                      font-size: 30px !important;
                      line-height: 38px !important;
                    }
                    .wrapper .size-32 {
                      font-size: 32px !important;
                      line-height: 40px !important;
                    }
                    .wrapper .size-34 {
                      font-size: 34px !important;
                      line-height: 43px !important;
                    }
                    .wrapper .size-36 {
                      font-size: 36px !important;
                      line-height: 43px !important;
                    }
                    .wrapper .size-40 {
                      font-size: 40px !important;
                      line-height: 47px !important;
                    }
                    .wrapper .size-44 {
                      font-size: 44px !important;
                      line-height: 50px !important;
                    }
                    .wrapper .size-48 {
                      font-size: 48px !important;
                      line-height: 54px !important;
                    }
                    .wrapper .size-56 {
                      font-size: 56px !important;
                      line-height: 60px !important;
                    }
                    .wrapper .size-64 {
                      font-size: 64px !important;
                      line-height: 63px !important;
                    }
                  }
                  .mso .size-8,
                  .ie .size-8 {
                    font-size: 8px !important;
                    line-height: 14px !important;
                  }
                  .mso .size-9,
                  .ie .size-9 {
                    font-size: 9px !important;
                    line-height: 16px !important;
                  }
                  .mso .size-10,
                  .ie .size-10 {
                    font-size: 10px !important;
                    line-height: 18px !important;
                  }
                  .mso .size-11,
                  .ie .size-11 {
                    font-size: 11px !important;
                    line-height: 19px !important;
                  }
                  .mso .size-12,
                  .ie .size-12 {
                    font-size: 12px !important;
                    line-height: 19px !important;
                  }
                  .mso .size-13,
                  .ie .size-13 {
                    font-size: 13px !important;
                    line-height: 21px !important;
                  }
                  .mso .size-14,
                  .ie .size-14 {
                    font-size: 14px !important;
                    line-height: 21px !important;
                  }
                  .mso .size-15,
                  .ie .size-15 {
                    font-size: 15px !important;
                    line-height: 23px !important;
                  }
                  .mso .size-16,
                  .ie .size-16 {
                    font-size: 16px !important;
                    line-height: 24px !important;
                  }
                  .mso .size-17,
                  .ie .size-17 {
                    font-size: 17px !important;
                    line-height: 26px !important;
                  }
                  .mso .size-18,
                  .ie .size-18 {
                    font-size: 18px !important;
                    line-height: 26px !important;
                  }
                  .mso .size-20,
                  .ie .size-20 {
                    font-size: 20px !important;
                    line-height: 28px !important;
                  }
                  .mso .size-22,
                  .ie .size-22 {
                    font-size: 22px !important;
                    line-height: 31px !important;
                  }
                  .mso .size-24,
                  .ie .size-24 {
                    font-size: 24px !important;
                    line-height: 32px !important;
                  }
                  .mso .size-26,
                  .ie .size-26 {
                    font-size: 26px !important;
                    line-height: 34px !important;
                  }
                  .mso .size-28,
                  .ie .size-28 {
                    font-size: 28px !important;
                    line-height: 36px !important;
                  }
                  .mso .size-30,
                  .ie .size-30 {
                    font-size: 30px !important;
                    line-height: 38px !important;
                  }
                  .mso .size-32,
                  .ie .size-32 {
                    font-size: 32px !important;
                    line-height: 40px !important;
                  }
                  .mso .size-34,
                  .ie .size-34 {
                    font-size: 34px !important;
                    line-height: 43px !important;
                  }
                  .mso .size-36,
                  .ie .size-36 {
                    font-size: 36px !important;
                    line-height: 43px !important;
                  }
                  .mso .size-40,
                  .ie .size-40 {
                    font-size: 40px !important;
                    line-height: 47px !important;
                  }
                  .mso .size-44,
                  .ie .size-44 {
                    font-size: 44px !important;
                    line-height: 50px !important;
                  }
                  .mso .size-48,
                  .ie .size-48 {
                    font-size: 48px !important;
                    line-height: 54px !important;
                  }
                  .mso .size-56,
                  .ie .size-56 {
                    font-size: 56px !important;
                    line-height: 60px !important;
                  }
                  .mso .size-64,
                  .ie .size-64 {
                    font-size: 64px !important;
                    line-height: 63px !important;
                  }
                  .footer__share-button p {
                    margin: 0;
                  }
                  </style>

                      <title></title>
                    <!--[if !mso]><!--><style type="text/css">
                  @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
                  </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
                  body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
                  620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
                  </style><meta name="robots" content="noindex,nofollow" />
                  <meta property="og:title" content="My First Campaign" />
                  </head>
                  <!--[if mso]>
                    <body class="mso">
                  <![endif]-->
                  <!--[if !mso]><!-->
                    <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
                  <!--<![endif]-->
                      <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                        <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                          <div style="border-collapse: collapse;display: table;">
                          <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                            <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                            </div>
                          <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                            <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                            </div>
                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                          </div>
                        </div>
                        <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                        <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                          <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                            <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                          </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        </div>
                        <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                          <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                          <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                            <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

                  <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Dear advisor,</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your student '.$regd["fullname"].' has applied for a position in MUNDP 2019. We kindly ask you to send a recommendation letter to <a href="mailto:recommendation@modelundp.org">recommendation@modelundp.org</a> by Dec. 18 2016. Be reminded that an application without a recommendation letter will not be taken under consideration by the Secretariat.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Also, if you have more than one student applying for the same position, you should include a ranking of these students in terms of their general performance at the bottom of the letter.
                  </p>
                      </div>

                            </div>
                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                          </div>
                        </div>

                        <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                        <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                          <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                          <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                            <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                        <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Best Regards,</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>MUNDP Secretariat</strong></p>
                      </div>

                            </div>
                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                          </div>
                        </div>

                        <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                        <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                          <div class="layout__inner" style="border-collapse: collapse;display: table;">
                          <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                            <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                                <div>

                                </div>
                                <div style="Margin-top: 18px;">

                                </div>
                              </div>
                            </div>
                          <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                            <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                                '.$emailextra.'
                              </div>
                            </div>
                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                          </div>
                        </div>

                    </div>
                  </body></html>
                      ';

              // end

          // end

      if(!send_email($_POST["email"],"Registration",$emailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if(!send_email($_POST["advisor_email"],"Recommendation for your Student",$advisoremailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if($_POST["emailtest"] == "false" or 1 == 1)
      {
          DB::insert('mydp_users', array(
            'email' => $regd["email"],
            'hash' => $hash,
            'fullname' => $regd["fullname"],
            'phone' => $regd["phone"],
            'school' => $regd["schoolid"],
            'verified' => 0,
            'position' => 0,
            'birthdate' => $regd["birthdate"],
            'time_register' => microtime(true),
            'applicationdata' => json_encode($regd)
          ));
      }

      echo "ok";
  }

  //

  if($_POST["form"] == "studentofficer")
  {
      if(!$regisetting['stoff']) {
        return;
      }

      // Registration Data
      $regd["fullname"] = $_POST["fullname"];
      $regd["country"] = $_POST["country"];
      $regd["birthdate"] = $_POST["birthdate"];
      $regd["graduation"] = $_POST["graduation"];
      $regd["sex"] = $_POST["sex"];
      $regd["schoolid"] = $_POST["school"];
      $regd["schoolname"] = $_POST["schoolname"];
      $regd["phone"] = $_POST["phone"];
      $regd["email"] = $_POST["email"];
      $regd["advisor_email"] = $_POST["advisor_email"];

      $regd["exp1-year"] = $_POST["exp1-year"];
      $regd["exp1-con"] = $_POST["exp1-con"];
      $regd["exp1-pos"] = $_POST["exp1-pos"];

      $regd["exp2-year"] = $_POST["exp2-year"];
      $regd["exp2-con"] = $_POST["exp2-con"];
      $regd["exp2-pos"] = $_POST["exp2-pos"];

      $regd["exp3-year"] = $_POST["exp3-year"];
      $regd["exp3-con"] = $_POST["exp3-con"];
      $regd["exp3-pos"] = $_POST["exp3-pos"];

      $regd["exp4-year"] = $_POST["exp4-year"];
      $regd["exp4-con"] = $_POST["exp4-con"];
      $regd["exp4-pos"] = $_POST["exp4-pos"];

      $regd["exp5-year"] = $_POST["exp5-year"];
      $regd["exp5-con"] = $_POST["exp5-con"];
      $regd["exp5-pos"] = $_POST["exp5-pos"];

      $regd["exp6-year"] = $_POST["exp6-year"];
      $regd["exp6-con"] = $_POST["exp6-con"];
      $regd["exp6-pos"] = $_POST["exp6-pos"];

      $regd["exp7-year"] = $_POST["exp7-year"];
      $regd["exp7-con"] = $_POST["exp7-con"];
      $regd["exp7-pos"] = $_POST["exp7-pos"];

      $regd["exp8-year"] = $_POST["exp8-year"];
      $regd["exp8-con"] = $_POST["exp8-con"];
      $regd["exp8-pos"] = $_POST["exp8-pos"];

      $regd["exp9-year"] = $_POST["exp9-year"];
      $regd["exp9-con"] = $_POST["exp9-con"];
      $regd["exp9-pos"] = $_POST["exp9-pos"];

      $regd["exp10-year"] = $_POST["exp10-year"];
      $regd["exp10-con"] = $_POST["exp10-con"];
      $regd["exp10-pos"] = $_POST["exp10-pos"];

      $regd["pref1"] = $_POST["pref1"];
      $regd["pref2"] = $_POST["pref2"];
      $regd["pref3"] = $_POST["pref3"];

      $regd["mdgletter"] = $_POST["mdgletter"];
      $regd["applicationletter"] = $_POST["applicationletter"];
      $regd["previouswork"] = $_POST["previouswork"];

      $regd["position"] = "studentofficer";

      $listfor = DB::queryFirstRow("SELECT * FROM mydp_users WHERE email=%s",$_POST["email"]);

      if(!empty($listfor["id"]))
      {
          echo "emailinuse";
          return;
      }

      foreach($regd as $id => $data)
      {
        if(empty($data) and strpos($id, 'exp') === false and strpos($id, 'school') === false and strpos($id, 'previouswork') === false)
        {
          echo "empty";
          return;
        }
      }

      include("../secure/email.php");
      include("../secure/randompass.php");

      if($_POST["emailtest"] == "true")
      {
          $emailextra = "<p><strong>Alert:</strong><br>This form is filled for testing. The information given won't be recored into the system.</p>";
      }
      else
      {
          $emailextra = "";
      }

      $password = generateStrongPassword();
      $cost = 10;
      $salt = strtr(base64_encode(mcrypt_create_iv(64, MCRYPT_DEV_URANDOM)), '+', '.');
      $salt = sprintf("$2a$%02d$", $cost) . $salt;
      $hash = crypt($password, $salt);

      $emailcontent = '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
              <meta name="viewport" content="width=device-width" />
              <style type="text/css">
          @media only screen and (min-width: 620px) {
            * [lang=x-wrapper] h1 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * [lang=x-wrapper] h2 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-8] {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            * div [lang=x-size-9] {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            * div [lang=x-size-10] {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            * div [lang=x-size-11] {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-12] {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-13] {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-14] {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-15] {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            * div [lang=x-size-16] {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            * div [lang=x-size-17] {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-20] {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-22] {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            * div [lang=x-size-24] {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            * div [lang=x-size-26] {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * div [lang=x-size-28] {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            * div [lang=x-size-30] {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            * div [lang=x-size-32] {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            * div [lang=x-size-34] {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-36] {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-40] {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            * div [lang=x-size-44] {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            * div [lang=x-size-48] {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            * div [lang=x-size-56] {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            * div [lang=x-size-64] {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          </style>
              <style type="text/css">
          body {
            margin: 0;
            padding: 0;
          }
          table {
            border-collapse: collapse;
            table-layout: fixed;
          }
          * {
            line-height: inherit;
          }
          [x-apple-data-detectors],
          [href^="tel"],
          [href^="sms"] {
            color: inherit !important;
            text-decoration: none !important;
          }
          .wrapper .footer__share-button a:hover,
          .wrapper .footer__share-button a:focus {
            color: #ffffff !important;
          }
          .btn a:hover,
          .btn a:focus,
          .footer__share-button a:hover,
          .footer__share-button a:focus,
          .email-footer__links a:hover,
          .email-footer__links a:focus {
            opacity: 0.8;
          }
          .ie .btn {
            width: 100%;
          }
          .ie .column,
          [owa] .column,
          .ie .gutter,
          [owa] .gutter {
            display: table-cell;
            float: none !important;
            vertical-align: top;
          }
          .ie .preheader,
          [owa] .preheader,
          .ie .email-footer,
          [owa] .email-footer {
            width: 560px !important;
          }
          .ie .snippet,
          [owa] .snippet,
          .ie .webversion,
          [owa] .webversion {
            width: 280px !important;
          }
          .ie .header,
          [owa] .header,
          .ie .layout,
          [owa] .layout,
          .ie .one-col .column,
          [owa] .one-col .column {
            width: 600px !important;
          }
          .ie .fixed-width.has-border,
          [owa] .fixed-width.has-border,
          .ie .has-gutter.has-border,
          [owa] .has-gutter.has-border {
            width: 602px !important;
          }
          .ie .two-col .column,
          [owa] .two-col .column {
            width: 300px !important;
          }
          .ie .three-col .column,
          [owa] .three-col .column,
          .ie .narrow,
          [owa] .narrow {
            width: 200px !important;
          }
          .ie .wide,
          [owa] .wide {
            width: 400px !important;
          }
          .ie .two-col.has-gutter .column,
          [owa] .two-col.x_has-gutter .column {
            width: 290px !important;
          }
          .ie .three-col.has-gutter .column,
          [owa] .three-col.x_has-gutter .column,
          .ie .has-gutter .narrow,
          [owa] .has-gutter .narrow {
            width: 188px !important;
          }
          .ie .has-gutter .wide,
          [owa] .has-gutter .wide {
            width: 394px !important;
          }
          .ie .two-col.has-gutter.has-border .column,
          [owa] .two-col.x_has-gutter.x_has-border .column {
            width: 292px !important;
          }
          .ie .three-col.has-gutter.has-border .column,
          [owa] .three-col.x_has-gutter.x_has-border .column,
          .ie .has-gutter.has-border .narrow,
          [owa] .has-gutter.x_has-border .narrow {
            width: 190px !important;
          }
          .ie .has-gutter.has-border .wide,
          [owa] .has-gutter.x_has-border .wide {
            width: 396px !important;
          }
          .ie .fixed-width .layout__inner {
            border-left: 0 none white !important;
            border-right: 0 none white !important;
          }
          .ie .layout__edges {
            display: none;
          }
          .mso .layout__edges {
            font-size: 0;
          }
          .layout-fixed-width,
          .mso .layout-full-width {
            background-color: #ffffff;
          }
          @media only screen and (min-width: 620px) {
            .column,
            .gutter {
              display: table-cell;
              Float: none !important;
              vertical-align: top;
            }
            .preheader,
            .email-footer {
              width: 560px !important;
            }
            .snippet,
            .webversion {
              width: 280px !important;
            }
            .header,
            .layout,
            .one-col .column {
              width: 600px !important;
            }
            .fixed-width.has-border,
            .fixed-width.ecxhas-border,
            .has-gutter.has-border,
            .has-gutter.ecxhas-border {
              width: 602px !important;
            }
            .two-col .column {
              width: 300px !important;
            }
            .three-col .column,
            .column.narrow {
              width: 200px !important;
            }
            .column.wide {
              width: 400px !important;
            }
            .two-col.has-gutter .column,
            .two-col.ecxhas-gutter .column {
              width: 290px !important;
            }
            .three-col.has-gutter .column,
            .three-col.ecxhas-gutter .column,
            .has-gutter .narrow {
              width: 188px !important;
            }
            .has-gutter .wide {
              width: 394px !important;
            }
            .two-col.has-gutter.has-border .column,
            .two-col.ecxhas-gutter.ecxhas-border .column {
              width: 292px !important;
            }
            .three-col.has-gutter.has-border .column,
            .three-col.ecxhas-gutter.ecxhas-border .column,
            .has-gutter.has-border .narrow,
            .has-gutter.ecxhas-border .narrow {
              width: 190px !important;
            }
            .has-gutter.has-border .wide,
            .has-gutter.ecxhas-border .wide {
              width: 396px !important;
            }
          }
          @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .fblike {
              background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
            }
            .tweet {
              background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
            }
            .linkedinshare {
              background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
            }
            .forwardtoafriend {
              background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
            }
          }
          @media (max-width: 321px) {
            .fixed-width.has-border .layout__inner {
              border-width: 1px 0 !important;
            }
            .layout,
            .column {
              min-width: 320px !important;
              width: 320px !important;
            }
            .border {
              display: none;
            }
          }
          .mso div {
            border: 0 none white !important;
          }
          .mso .w560 .divider {
            Margin-left: 260px !important;
            Margin-right: 260px !important;
          }
          .mso .w360 .divider {
            Margin-left: 160px !important;
            Margin-right: 160px !important;
          }
          .mso .w260 .divider {
            Margin-left: 110px !important;
            Margin-right: 110px !important;
          }
          .mso .w160 .divider {
            Margin-left: 60px !important;
            Margin-right: 60px !important;
          }
          .mso .w354 .divider {
            Margin-left: 157px !important;
            Margin-right: 157px !important;
          }
          .mso .w250 .divider {
            Margin-left: 105px !important;
            Margin-right: 105px !important;
          }
          .mso .w148 .divider {
            Margin-left: 54px !important;
            Margin-right: 54px !important;
          }
          .mso .font-avenir,
          .mso .font-cabin,
          .mso .font-open-sans,
          .mso .font-ubuntu {
            font-family: sans-serif !important;
          }
          .mso .font-bitter,
          .mso .font-merriweather,
          .mso .font-pt-serif {
            font-family: Georgia, serif !important;
          }
          .mso .font-lato,
          .mso .font-roboto {
            font-family: Tahoma, sans-serif !important;
          }
          .mso .font-pt-sans {
            font-family: "Trebuchet MS", sans-serif !important;
          }
          .mso .footer__share-button p {
            margin: 0;
          }
          @media only screen and (min-width: 620px) {
            .wrapper .size-8 {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            .wrapper .size-9 {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            .wrapper .size-10 {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            .wrapper .size-11 {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            .wrapper .size-12 {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            .wrapper .size-13 {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            .wrapper .size-14 {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            .wrapper .size-15 {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            .wrapper .size-16 {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            .wrapper .size-17 {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            .wrapper .size-18 {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            .wrapper .size-20 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            .wrapper .size-22 {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            .wrapper .size-24 {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            .wrapper .size-26 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            .wrapper .size-28 {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            .wrapper .size-30 {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            .wrapper .size-32 {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            .wrapper .size-34 {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            .wrapper .size-36 {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            .wrapper .size-40 {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            .wrapper .size-44 {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            .wrapper .size-48 {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            .wrapper .size-56 {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            .wrapper .size-64 {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          .mso .size-8,
          .ie .size-8 {
            font-size: 8px !important;
            line-height: 14px !important;
          }
          .mso .size-9,
          .ie .size-9 {
            font-size: 9px !important;
            line-height: 16px !important;
          }
          .mso .size-10,
          .ie .size-10 {
            font-size: 10px !important;
            line-height: 18px !important;
          }
          .mso .size-11,
          .ie .size-11 {
            font-size: 11px !important;
            line-height: 19px !important;
          }
          .mso .size-12,
          .ie .size-12 {
            font-size: 12px !important;
            line-height: 19px !important;
          }
          .mso .size-13,
          .ie .size-13 {
            font-size: 13px !important;
            line-height: 21px !important;
          }
          .mso .size-14,
          .ie .size-14 {
            font-size: 14px !important;
            line-height: 21px !important;
          }
          .mso .size-15,
          .ie .size-15 {
            font-size: 15px !important;
            line-height: 23px !important;
          }
          .mso .size-16,
          .ie .size-16 {
            font-size: 16px !important;
            line-height: 24px !important;
          }
          .mso .size-17,
          .ie .size-17 {
            font-size: 17px !important;
            line-height: 26px !important;
          }
          .mso .size-18,
          .ie .size-18 {
            font-size: 18px !important;
            line-height: 26px !important;
          }
          .mso .size-20,
          .ie .size-20 {
            font-size: 20px !important;
            line-height: 28px !important;
          }
          .mso .size-22,
          .ie .size-22 {
            font-size: 22px !important;
            line-height: 31px !important;
          }
          .mso .size-24,
          .ie .size-24 {
            font-size: 24px !important;
            line-height: 32px !important;
          }
          .mso .size-26,
          .ie .size-26 {
            font-size: 26px !important;
            line-height: 34px !important;
          }
          .mso .size-28,
          .ie .size-28 {
            font-size: 28px !important;
            line-height: 36px !important;
          }
          .mso .size-30,
          .ie .size-30 {
            font-size: 30px !important;
            line-height: 38px !important;
          }
          .mso .size-32,
          .ie .size-32 {
            font-size: 32px !important;
            line-height: 40px !important;
          }
          .mso .size-34,
          .ie .size-34 {
            font-size: 34px !important;
            line-height: 43px !important;
          }
          .mso .size-36,
          .ie .size-36 {
            font-size: 36px !important;
            line-height: 43px !important;
          }
          .mso .size-40,
          .ie .size-40 {
            font-size: 40px !important;
            line-height: 47px !important;
          }
          .mso .size-44,
          .ie .size-44 {
            font-size: 44px !important;
            line-height: 50px !important;
          }
          .mso .size-48,
          .ie .size-48 {
            font-size: 48px !important;
            line-height: 54px !important;
          }
          .mso .size-56,
          .ie .size-56 {
            font-size: 56px !important;
            line-height: 60px !important;
          }
          .mso .size-64,
          .ie .size-64 {
            font-size: 64px !important;
            line-height: 63px !important;
          }
          .footer__share-button p {
            margin: 0;
          }
          </style>

              <title></title>
            <!--[if !mso]><!--><style type="text/css">
          @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
          </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
          body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
          620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
          </style><meta name="robots" content="noindex,nofollow" />
          <meta property="og:title" content="My First Campaign" />
          </head>
          <!--[if mso]>
            <body class="mso">
          <![endif]-->
          <!--[if !mso]><!-->
            <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
          <!--<![endif]-->
              <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                  <div style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                    <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                    <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                  <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                    <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                  </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </div>
                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

          <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Thanks for your Application!</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">You have succesfully filled the Registration Form for MUNDP 2019.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your MyDP Login Credentials</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>Username: </strong>'.$_POST["email"].'<br><strong>Password: </strong>'.$password.'</p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                    <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                        <div>

                        </div>
                        <div style="Margin-top: 18px;">

                        </div>
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                    <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                        '.$emailextra.'
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

            </div>
          </body></html>
          ';

          $advisoremailcontent = '
                  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
                      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                      <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
                      <meta name="viewport" content="width=device-width" />
                      <style type="text/css">
                  @media only screen and (min-width: 620px) {
                    * [lang=x-wrapper] h1 {
                      font-size: 26px !important;
                      line-height: 34px !important;
                    }
                    * [lang=x-wrapper] h2 {
                      font-size: 20px !important;
                      line-height: 28px !important;
                    }
                    * div [lang=x-size-8] {
                      font-size: 8px !important;
                      line-height: 14px !important;
                    }
                    * div [lang=x-size-9] {
                      font-size: 9px !important;
                      line-height: 16px !important;
                    }
                    * div [lang=x-size-10] {
                      font-size: 10px !important;
                      line-height: 18px !important;
                    }
                    * div [lang=x-size-11] {
                      font-size: 11px !important;
                      line-height: 19px !important;
                    }
                    * div [lang=x-size-12] {
                      font-size: 12px !important;
                      line-height: 19px !important;
                    }
                    * div [lang=x-size-13] {
                      font-size: 13px !important;
                      line-height: 21px !important;
                    }
                    * div [lang=x-size-14] {
                      font-size: 14px !important;
                      line-height: 21px !important;
                    }
                    * div [lang=x-size-15] {
                      font-size: 15px !important;
                      line-height: 23px !important;
                    }
                    * div [lang=x-size-16] {
                      font-size: 16px !important;
                      line-height: 24px !important;
                    }
                    * div [lang=x-size-17] {
                      font-size: 17px !important;
                      line-height: 26px !important;
                    }
                    * div [lang=x-size-18] {
                      font-size: 18px !important;
                      line-height: 26px !important;
                    }
                    * div [lang=x-size-18] {
                      font-size: 18px !important;
                      line-height: 26px !important;
                    }
                    * div [lang=x-size-20] {
                      font-size: 20px !important;
                      line-height: 28px !important;
                    }
                    * div [lang=x-size-22] {
                      font-size: 22px !important;
                      line-height: 31px !important;
                    }
                    * div [lang=x-size-24] {
                      font-size: 24px !important;
                      line-height: 32px !important;
                    }
                    * div [lang=x-size-26] {
                      font-size: 26px !important;
                      line-height: 34px !important;
                    }
                    * div [lang=x-size-28] {
                      font-size: 28px !important;
                      line-height: 36px !important;
                    }
                    * div [lang=x-size-30] {
                      font-size: 30px !important;
                      line-height: 38px !important;
                    }
                    * div [lang=x-size-32] {
                      font-size: 32px !important;
                      line-height: 40px !important;
                    }
                    * div [lang=x-size-34] {
                      font-size: 34px !important;
                      line-height: 43px !important;
                    }
                    * div [lang=x-size-36] {
                      font-size: 36px !important;
                      line-height: 43px !important;
                    }
                    * div [lang=x-size-40] {
                      font-size: 40px !important;
                      line-height: 47px !important;
                    }
                    * div [lang=x-size-44] {
                      font-size: 44px !important;
                      line-height: 50px !important;
                    }
                    * div [lang=x-size-48] {
                      font-size: 48px !important;
                      line-height: 54px !important;
                    }
                    * div [lang=x-size-56] {
                      font-size: 56px !important;
                      line-height: 60px !important;
                    }
                    * div [lang=x-size-64] {
                      font-size: 64px !important;
                      line-height: 63px !important;
                    }
                  }
                  </style>
                      <style type="text/css">
                  body {
                    margin: 0;
                    padding: 0;
                  }
                  table {
                    border-collapse: collapse;
                    table-layout: fixed;
                  }
                  * {
                    line-height: inherit;
                  }
                  [x-apple-data-detectors],
                  [href^="tel"],
                  [href^="sms"] {
                    color: inherit !important;
                    text-decoration: none !important;
                  }
                  .wrapper .footer__share-button a:hover,
                  .wrapper .footer__share-button a:focus {
                    color: #ffffff !important;
                  }
                  .btn a:hover,
                  .btn a:focus,
                  .footer__share-button a:hover,
                  .footer__share-button a:focus,
                  .email-footer__links a:hover,
                  .email-footer__links a:focus {
                    opacity: 0.8;
                  }
                  .ie .btn {
                    width: 100%;
                  }
                  .ie .column,
                  [owa] .column,
                  .ie .gutter,
                  [owa] .gutter {
                    display: table-cell;
                    float: none !important;
                    vertical-align: top;
                  }
                  .ie .preheader,
                  [owa] .preheader,
                  .ie .email-footer,
                  [owa] .email-footer {
                    width: 560px !important;
                  }
                  .ie .snippet,
                  [owa] .snippet,
                  .ie .webversion,
                  [owa] .webversion {
                    width: 280px !important;
                  }
                  .ie .header,
                  [owa] .header,
                  .ie .layout,
                  [owa] .layout,
                  .ie .one-col .column,
                  [owa] .one-col .column {
                    width: 600px !important;
                  }
                  .ie .fixed-width.has-border,
                  [owa] .fixed-width.has-border,
                  .ie .has-gutter.has-border,
                  [owa] .has-gutter.has-border {
                    width: 602px !important;
                  }
                  .ie .two-col .column,
                  [owa] .two-col .column {
                    width: 300px !important;
                  }
                  .ie .three-col .column,
                  [owa] .three-col .column,
                  .ie .narrow,
                  [owa] .narrow {
                    width: 200px !important;
                  }
                  .ie .wide,
                  [owa] .wide {
                    width: 400px !important;
                  }
                  .ie .two-col.has-gutter .column,
                  [owa] .two-col.x_has-gutter .column {
                    width: 290px !important;
                  }
                  .ie .three-col.has-gutter .column,
                  [owa] .three-col.x_has-gutter .column,
                  .ie .has-gutter .narrow,
                  [owa] .has-gutter .narrow {
                    width: 188px !important;
                  }
                  .ie .has-gutter .wide,
                  [owa] .has-gutter .wide {
                    width: 394px !important;
                  }
                  .ie .two-col.has-gutter.has-border .column,
                  [owa] .two-col.x_has-gutter.x_has-border .column {
                    width: 292px !important;
                  }
                  .ie .three-col.has-gutter.has-border .column,
                  [owa] .three-col.x_has-gutter.x_has-border .column,
                  .ie .has-gutter.has-border .narrow,
                  [owa] .has-gutter.x_has-border .narrow {
                    width: 190px !important;
                  }
                  .ie .has-gutter.has-border .wide,
                  [owa] .has-gutter.x_has-border .wide {
                    width: 396px !important;
                  }
                  .ie .fixed-width .layout__inner {
                    border-left: 0 none white !important;
                    border-right: 0 none white !important;
                  }
                  .ie .layout__edges {
                    display: none;
                  }
                  .mso .layout__edges {
                    font-size: 0;
                  }
                  .layout-fixed-width,
                  .mso .layout-full-width {
                    background-color: #ffffff;
                  }
                  @media only screen and (min-width: 620px) {
                    .column,
                    .gutter {
                      display: table-cell;
                      Float: none !important;
                      vertical-align: top;
                    }
                    .preheader,
                    .email-footer {
                      width: 560px !important;
                    }
                    .snippet,
                    .webversion {
                      width: 280px !important;
                    }
                    .header,
                    .layout,
                    .one-col .column {
                      width: 600px !important;
                    }
                    .fixed-width.has-border,
                    .fixed-width.ecxhas-border,
                    .has-gutter.has-border,
                    .has-gutter.ecxhas-border {
                      width: 602px !important;
                    }
                    .two-col .column {
                      width: 300px !important;
                    }
                    .three-col .column,
                    .column.narrow {
                      width: 200px !important;
                    }
                    .column.wide {
                      width: 400px !important;
                    }
                    .two-col.has-gutter .column,
                    .two-col.ecxhas-gutter .column {
                      width: 290px !important;
                    }
                    .three-col.has-gutter .column,
                    .three-col.ecxhas-gutter .column,
                    .has-gutter .narrow {
                      width: 188px !important;
                    }
                    .has-gutter .wide {
                      width: 394px !important;
                    }
                    .two-col.has-gutter.has-border .column,
                    .two-col.ecxhas-gutter.ecxhas-border .column {
                      width: 292px !important;
                    }
                    .three-col.has-gutter.has-border .column,
                    .three-col.ecxhas-gutter.ecxhas-border .column,
                    .has-gutter.has-border .narrow,
                    .has-gutter.ecxhas-border .narrow {
                      width: 190px !important;
                    }
                    .has-gutter.has-border .wide,
                    .has-gutter.ecxhas-border .wide {
                      width: 396px !important;
                    }
                  }
                  @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                    .fblike {
                      background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
                    }
                    .tweet {
                      background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
                    }
                    .linkedinshare {
                      background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
                    }
                    .forwardtoafriend {
                      background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
                    }
                  }
                  @media (max-width: 321px) {
                    .fixed-width.has-border .layout__inner {
                      border-width: 1px 0 !important;
                    }
                    .layout,
                    .column {
                      min-width: 320px !important;
                      width: 320px !important;
                    }
                    .border {
                      display: none;
                    }
                  }
                  .mso div {
                    border: 0 none white !important;
                  }
                  .mso .w560 .divider {
                    Margin-left: 260px !important;
                    Margin-right: 260px !important;
                  }
                  .mso .w360 .divider {
                    Margin-left: 160px !important;
                    Margin-right: 160px !important;
                  }
                  .mso .w260 .divider {
                    Margin-left: 110px !important;
                    Margin-right: 110px !important;
                  }
                  .mso .w160 .divider {
                    Margin-left: 60px !important;
                    Margin-right: 60px !important;
                  }
                  .mso .w354 .divider {
                    Margin-left: 157px !important;
                    Margin-right: 157px !important;
                  }
                  .mso .w250 .divider {
                    Margin-left: 105px !important;
                    Margin-right: 105px !important;
                  }
                  .mso .w148 .divider {
                    Margin-left: 54px !important;
                    Margin-right: 54px !important;
                  }
                  .mso .font-avenir,
                  .mso .font-cabin,
                  .mso .font-open-sans,
                  .mso .font-ubuntu {
                    font-family: sans-serif !important;
                  }
                  .mso .font-bitter,
                  .mso .font-merriweather,
                  .mso .font-pt-serif {
                    font-family: Georgia, serif !important;
                  }
                  .mso .font-lato,
                  .mso .font-roboto {
                    font-family: Tahoma, sans-serif !important;
                  }
                  .mso .font-pt-sans {
                    font-family: "Trebuchet MS", sans-serif !important;
                  }
                  .mso .footer__share-button p {
                    margin: 0;
                  }
                  @media only screen and (min-width: 620px) {
                    .wrapper .size-8 {
                      font-size: 8px !important;
                      line-height: 14px !important;
                    }
                    .wrapper .size-9 {
                      font-size: 9px !important;
                      line-height: 16px !important;
                    }
                    .wrapper .size-10 {
                      font-size: 10px !important;
                      line-height: 18px !important;
                    }
                    .wrapper .size-11 {
                      font-size: 11px !important;
                      line-height: 19px !important;
                    }
                    .wrapper .size-12 {
                      font-size: 12px !important;
                      line-height: 19px !important;
                    }
                    .wrapper .size-13 {
                      font-size: 13px !important;
                      line-height: 21px !important;
                    }
                    .wrapper .size-14 {
                      font-size: 14px !important;
                      line-height: 21px !important;
                    }
                    .wrapper .size-15 {
                      font-size: 15px !important;
                      line-height: 23px !important;
                    }
                    .wrapper .size-16 {
                      font-size: 16px !important;
                      line-height: 24px !important;
                    }
                    .wrapper .size-17 {
                      font-size: 17px !important;
                      line-height: 26px !important;
                    }
                    .wrapper .size-18 {
                      font-size: 18px !important;
                      line-height: 26px !important;
                    }
                    .wrapper .size-20 {
                      font-size: 20px !important;
                      line-height: 28px !important;
                    }
                    .wrapper .size-22 {
                      font-size: 22px !important;
                      line-height: 31px !important;
                    }
                    .wrapper .size-24 {
                      font-size: 24px !important;
                      line-height: 32px !important;
                    }
                    .wrapper .size-26 {
                      font-size: 26px !important;
                      line-height: 34px !important;
                    }
                    .wrapper .size-28 {
                      font-size: 28px !important;
                      line-height: 36px !important;
                    }
                    .wrapper .size-30 {
                      font-size: 30px !important;
                      line-height: 38px !important;
                    }
                    .wrapper .size-32 {
                      font-size: 32px !important;
                      line-height: 40px !important;
                    }
                    .wrapper .size-34 {
                      font-size: 34px !important;
                      line-height: 43px !important;
                    }
                    .wrapper .size-36 {
                      font-size: 36px !important;
                      line-height: 43px !important;
                    }
                    .wrapper .size-40 {
                      font-size: 40px !important;
                      line-height: 47px !important;
                    }
                    .wrapper .size-44 {
                      font-size: 44px !important;
                      line-height: 50px !important;
                    }
                    .wrapper .size-48 {
                      font-size: 48px !important;
                      line-height: 54px !important;
                    }
                    .wrapper .size-56 {
                      font-size: 56px !important;
                      line-height: 60px !important;
                    }
                    .wrapper .size-64 {
                      font-size: 64px !important;
                      line-height: 63px !important;
                    }
                  }
                  .mso .size-8,
                  .ie .size-8 {
                    font-size: 8px !important;
                    line-height: 14px !important;
                  }
                  .mso .size-9,
                  .ie .size-9 {
                    font-size: 9px !important;
                    line-height: 16px !important;
                  }
                  .mso .size-10,
                  .ie .size-10 {
                    font-size: 10px !important;
                    line-height: 18px !important;
                  }
                  .mso .size-11,
                  .ie .size-11 {
                    font-size: 11px !important;
                    line-height: 19px !important;
                  }
                  .mso .size-12,
                  .ie .size-12 {
                    font-size: 12px !important;
                    line-height: 19px !important;
                  }
                  .mso .size-13,
                  .ie .size-13 {
                    font-size: 13px !important;
                    line-height: 21px !important;
                  }
                  .mso .size-14,
                  .ie .size-14 {
                    font-size: 14px !important;
                    line-height: 21px !important;
                  }
                  .mso .size-15,
                  .ie .size-15 {
                    font-size: 15px !important;
                    line-height: 23px !important;
                  }
                  .mso .size-16,
                  .ie .size-16 {
                    font-size: 16px !important;
                    line-height: 24px !important;
                  }
                  .mso .size-17,
                  .ie .size-17 {
                    font-size: 17px !important;
                    line-height: 26px !important;
                  }
                  .mso .size-18,
                  .ie .size-18 {
                    font-size: 18px !important;
                    line-height: 26px !important;
                  }
                  .mso .size-20,
                  .ie .size-20 {
                    font-size: 20px !important;
                    line-height: 28px !important;
                  }
                  .mso .size-22,
                  .ie .size-22 {
                    font-size: 22px !important;
                    line-height: 31px !important;
                  }
                  .mso .size-24,
                  .ie .size-24 {
                    font-size: 24px !important;
                    line-height: 32px !important;
                  }
                  .mso .size-26,
                  .ie .size-26 {
                    font-size: 26px !important;
                    line-height: 34px !important;
                  }
                  .mso .size-28,
                  .ie .size-28 {
                    font-size: 28px !important;
                    line-height: 36px !important;
                  }
                  .mso .size-30,
                  .ie .size-30 {
                    font-size: 30px !important;
                    line-height: 38px !important;
                  }
                  .mso .size-32,
                  .ie .size-32 {
                    font-size: 32px !important;
                    line-height: 40px !important;
                  }
                  .mso .size-34,
                  .ie .size-34 {
                    font-size: 34px !important;
                    line-height: 43px !important;
                  }
                  .mso .size-36,
                  .ie .size-36 {
                    font-size: 36px !important;
                    line-height: 43px !important;
                  }
                  .mso .size-40,
                  .ie .size-40 {
                    font-size: 40px !important;
                    line-height: 47px !important;
                  }
                  .mso .size-44,
                  .ie .size-44 {
                    font-size: 44px !important;
                    line-height: 50px !important;
                  }
                  .mso .size-48,
                  .ie .size-48 {
                    font-size: 48px !important;
                    line-height: 54px !important;
                  }
                  .mso .size-56,
                  .ie .size-56 {
                    font-size: 56px !important;
                    line-height: 60px !important;
                  }
                  .mso .size-64,
                  .ie .size-64 {
                    font-size: 64px !important;
                    line-height: 63px !important;
                  }
                  .footer__share-button p {
                    margin: 0;
                  }
                  </style>

                      <title></title>
                    <!--[if !mso]><!--><style type="text/css">
                  @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
                  </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
                  body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
                  620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
                  </style><meta name="robots" content="noindex,nofollow" />
                  <meta property="og:title" content="My First Campaign" />
                  </head>
                  <!--[if mso]>
                    <body class="mso">
                  <![endif]-->
                  <!--[if !mso]><!-->
                    <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
                  <!--<![endif]-->
                      <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                        <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                          <div style="border-collapse: collapse;display: table;">
                          <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                            <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                            </div>
                          <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                            <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                            </div>
                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                          </div>
                        </div>
                        <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                        <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                          <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                            <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                          </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                        </div>
                        <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                          <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                          <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                            <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

                  <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Dear advisor,</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your student '.$regd["fullname"].' has applied for a position in MUNDP 2019. We kindly ask you to send a recommendation letter to <a href="mailto:recommendation@modelundp.org">recommendation@modelundp.org</a> by Dec. 1 2016. Be reminded that an application without a recommendation letter will not be taken under consideration by the Secretariat.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Also, if you have more than one student applying for the same position, you should include a ranking of these students in terms of their general performance at the bottom of the letter.
                  </p>
                      </div>

                            </div>
                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                          </div>
                        </div>

                        <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                        <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                          <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                          <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                            <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                        <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Best Regards,</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>MUNDP Secretariat</strong></p>
                      </div>

                            </div>
                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                          </div>
                        </div>

                        <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                        <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                          <div class="layout__inner" style="border-collapse: collapse;display: table;">
                          <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                            <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                                <div>

                                </div>
                                <div style="Margin-top: 18px;">

                                </div>
                              </div>
                            </div>
                          <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                            <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                                '.$emailextra.'
                              </div>
                            </div>
                          <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                          </div>
                        </div>

                    </div>
                  </body></html>
                      ';

              // end


      // end

      if(!send_email($_POST["email"],"Registration",$emailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if(!send_email($_POST["advisor_email"],"Recommendation for your Student",$advisoremailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if($_POST["emailtest"] == "false" or 1 == 1)
      {
          DB::insert('mydp_users', array(
            'email' => $regd["email"],
            'hash' => $hash,
            'fullname' => $regd["fullname"],
            'phone' => $regd["phone"],
            'school' => $regd["schoolid"],
            'verified' => 0,
            'position' => 0,
            'birthdate' => $regd["birthdate"],
            'time_register' => microtime(true),
            'applicationdata' => json_encode($regd)
          ));
      }

      echo "ok";
  }

  //

  if($_POST["form"] == "press")
  {
      if(!$regisetting['press']) {
        return;
      }

      // Registration Data
      $regd["fullname"] = $_POST["fullname"];
      $regd["country"] = $_POST["country"];
      $regd["birthdate"] = $_POST["birthdate"];
      $regd["graduation"] = $_POST["graduation"];
      $regd["sex"] = $_POST["sex"];
      $regd["schoolid"] = $_POST["school"];
      $regd["schoolname"] = $_POST["schoolname"];
      $regd["phone"] = $_POST["phone"];
      $regd["email"] = $_POST["email"];

      $regd["exp1-year"] = $_POST["exp1-year"];
      $regd["exp1-con"] = $_POST["exp1-con"];
      $regd["exp1-pos"] = $_POST["exp1-pos"];

      $regd["exp2-year"] = $_POST["exp2-year"];
      $regd["exp2-con"] = $_POST["exp2-con"];
      $regd["exp2-pos"] = $_POST["exp2-pos"];

      $regd["exp3-year"] = $_POST["exp3-year"];
      $regd["exp3-con"] = $_POST["exp3-con"];
      $regd["exp3-pos"] = $_POST["exp3-pos"];

      $regd["exp4-year"] = $_POST["exp4-year"];
      $regd["exp4-con"] = $_POST["exp4-con"];
      $regd["exp4-pos"] = $_POST["exp4-pos"];

      $regd["exp5-year"] = $_POST["exp5-year"];
      $regd["exp5-con"] = $_POST["exp5-con"];
      $regd["exp5-pos"] = $_POST["exp5-pos"];

      $regd["exp6-year"] = $_POST["exp6-year"];
      $regd["exp6-con"] = $_POST["exp6-con"];
      $regd["exp6-pos"] = $_POST["exp6-pos"];

      $regd["exp7-year"] = $_POST["exp7-year"];
      $regd["exp7-con"] = $_POST["exp7-con"];
      $regd["exp7-pos"] = $_POST["exp7-pos"];

      $regd["exp8-year"] = $_POST["exp8-year"];
      $regd["exp8-con"] = $_POST["exp8-con"];
      $regd["exp8-pos"] = $_POST["exp8-pos"];

      $regd["exp9-year"] = $_POST["exp9-year"];
      $regd["exp9-con"] = $_POST["exp9-con"];
      $regd["exp9-pos"] = $_POST["exp9-pos"];

      $regd["exp10-year"] = $_POST["exp10-year"];
      $regd["exp10-con"] = $_POST["exp10-con"];
      $regd["exp10-pos"] = $_POST["exp10-pos"];

      $regd["pref"] = $_POST["pref"];

      $regd["applicationletter"] = $_POST["applicationletter"];

      $regd["position"] = "press";

      $listfor = DB::queryFirstRow("SELECT * FROM mydp_users WHERE email=%s",$_POST["email"]);

      if(!empty($listfor["id"]))
      {
          echo "emailinuse";
          return;
      }

      foreach($regd as $id => $data)
      {
        if(empty($data) and strpos($id, 'exp') === false and strpos($id, 'school') === false)
        {
          echo "empty";
          return;
        }
      }

      include("../secure/email.php");
      include("../secure/randompass.php");

      if($_POST["emailtest"] == "true")
      {
          $emailextra = "<p><strong>Alert:</strong><br>This form is filled for testing. The information given won't be recored into the system.</p>";
      }
      else
      {
          $emailextra = "";
      }

      $password = generateStrongPassword();
      $cost = 10;
      $salt = strtr(base64_encode(mcrypt_create_iv(64, MCRYPT_DEV_URANDOM)), '+', '.');
      $salt = sprintf("$2a$%02d$", $cost) . $salt;
      $hash = crypt($password, $salt);

      $emailcontent = '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
              <meta name="viewport" content="width=device-width" />
              <style type="text/css">
          @media only screen and (min-width: 620px) {
            * [lang=x-wrapper] h1 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * [lang=x-wrapper] h2 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-8] {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            * div [lang=x-size-9] {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            * div [lang=x-size-10] {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            * div [lang=x-size-11] {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-12] {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-13] {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-14] {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-15] {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            * div [lang=x-size-16] {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            * div [lang=x-size-17] {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-20] {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-22] {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            * div [lang=x-size-24] {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            * div [lang=x-size-26] {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * div [lang=x-size-28] {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            * div [lang=x-size-30] {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            * div [lang=x-size-32] {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            * div [lang=x-size-34] {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-36] {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-40] {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            * div [lang=x-size-44] {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            * div [lang=x-size-48] {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            * div [lang=x-size-56] {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            * div [lang=x-size-64] {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          </style>
              <style type="text/css">
          body {
            margin: 0;
            padding: 0;
          }
          table {
            border-collapse: collapse;
            table-layout: fixed;
          }
          * {
            line-height: inherit;
          }
          [x-apple-data-detectors],
          [href^="tel"],
          [href^="sms"] {
            color: inherit !important;
            text-decoration: none !important;
          }
          .wrapper .footer__share-button a:hover,
          .wrapper .footer__share-button a:focus {
            color: #ffffff !important;
          }
          .btn a:hover,
          .btn a:focus,
          .footer__share-button a:hover,
          .footer__share-button a:focus,
          .email-footer__links a:hover,
          .email-footer__links a:focus {
            opacity: 0.8;
          }
          .ie .btn {
            width: 100%;
          }
          .ie .column,
          [owa] .column,
          .ie .gutter,
          [owa] .gutter {
            display: table-cell;
            float: none !important;
            vertical-align: top;
          }
          .ie .preheader,
          [owa] .preheader,
          .ie .email-footer,
          [owa] .email-footer {
            width: 560px !important;
          }
          .ie .snippet,
          [owa] .snippet,
          .ie .webversion,
          [owa] .webversion {
            width: 280px !important;
          }
          .ie .header,
          [owa] .header,
          .ie .layout,
          [owa] .layout,
          .ie .one-col .column,
          [owa] .one-col .column {
            width: 600px !important;
          }
          .ie .fixed-width.has-border,
          [owa] .fixed-width.has-border,
          .ie .has-gutter.has-border,
          [owa] .has-gutter.has-border {
            width: 602px !important;
          }
          .ie .two-col .column,
          [owa] .two-col .column {
            width: 300px !important;
          }
          .ie .three-col .column,
          [owa] .three-col .column,
          .ie .narrow,
          [owa] .narrow {
            width: 200px !important;
          }
          .ie .wide,
          [owa] .wide {
            width: 400px !important;
          }
          .ie .two-col.has-gutter .column,
          [owa] .two-col.x_has-gutter .column {
            width: 290px !important;
          }
          .ie .three-col.has-gutter .column,
          [owa] .three-col.x_has-gutter .column,
          .ie .has-gutter .narrow,
          [owa] .has-gutter .narrow {
            width: 188px !important;
          }
          .ie .has-gutter .wide,
          [owa] .has-gutter .wide {
            width: 394px !important;
          }
          .ie .two-col.has-gutter.has-border .column,
          [owa] .two-col.x_has-gutter.x_has-border .column {
            width: 292px !important;
          }
          .ie .three-col.has-gutter.has-border .column,
          [owa] .three-col.x_has-gutter.x_has-border .column,
          .ie .has-gutter.has-border .narrow,
          [owa] .has-gutter.x_has-border .narrow {
            width: 190px !important;
          }
          .ie .has-gutter.has-border .wide,
          [owa] .has-gutter.x_has-border .wide {
            width: 396px !important;
          }
          .ie .fixed-width .layout__inner {
            border-left: 0 none white !important;
            border-right: 0 none white !important;
          }
          .ie .layout__edges {
            display: none;
          }
          .mso .layout__edges {
            font-size: 0;
          }
          .layout-fixed-width,
          .mso .layout-full-width {
            background-color: #ffffff;
          }
          @media only screen and (min-width: 620px) {
            .column,
            .gutter {
              display: table-cell;
              Float: none !important;
              vertical-align: top;
            }
            .preheader,
            .email-footer {
              width: 560px !important;
            }
            .snippet,
            .webversion {
              width: 280px !important;
            }
            .header,
            .layout,
            .one-col .column {
              width: 600px !important;
            }
            .fixed-width.has-border,
            .fixed-width.ecxhas-border,
            .has-gutter.has-border,
            .has-gutter.ecxhas-border {
              width: 602px !important;
            }
            .two-col .column {
              width: 300px !important;
            }
            .three-col .column,
            .column.narrow {
              width: 200px !important;
            }
            .column.wide {
              width: 400px !important;
            }
            .two-col.has-gutter .column,
            .two-col.ecxhas-gutter .column {
              width: 290px !important;
            }
            .three-col.has-gutter .column,
            .three-col.ecxhas-gutter .column,
            .has-gutter .narrow {
              width: 188px !important;
            }
            .has-gutter .wide {
              width: 394px !important;
            }
            .two-col.has-gutter.has-border .column,
            .two-col.ecxhas-gutter.ecxhas-border .column {
              width: 292px !important;
            }
            .three-col.has-gutter.has-border .column,
            .three-col.ecxhas-gutter.ecxhas-border .column,
            .has-gutter.has-border .narrow,
            .has-gutter.ecxhas-border .narrow {
              width: 190px !important;
            }
            .has-gutter.has-border .wide,
            .has-gutter.ecxhas-border .wide {
              width: 396px !important;
            }
          }
          @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .fblike {
              background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
            }
            .tweet {
              background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
            }
            .linkedinshare {
              background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
            }
            .forwardtoafriend {
              background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
            }
          }
          @media (max-width: 321px) {
            .fixed-width.has-border .layout__inner {
              border-width: 1px 0 !important;
            }
            .layout,
            .column {
              min-width: 320px !important;
              width: 320px !important;
            }
            .border {
              display: none;
            }
          }
          .mso div {
            border: 0 none white !important;
          }
          .mso .w560 .divider {
            Margin-left: 260px !important;
            Margin-right: 260px !important;
          }
          .mso .w360 .divider {
            Margin-left: 160px !important;
            Margin-right: 160px !important;
          }
          .mso .w260 .divider {
            Margin-left: 110px !important;
            Margin-right: 110px !important;
          }
          .mso .w160 .divider {
            Margin-left: 60px !important;
            Margin-right: 60px !important;
          }
          .mso .w354 .divider {
            Margin-left: 157px !important;
            Margin-right: 157px !important;
          }
          .mso .w250 .divider {
            Margin-left: 105px !important;
            Margin-right: 105px !important;
          }
          .mso .w148 .divider {
            Margin-left: 54px !important;
            Margin-right: 54px !important;
          }
          .mso .font-avenir,
          .mso .font-cabin,
          .mso .font-open-sans,
          .mso .font-ubuntu {
            font-family: sans-serif !important;
          }
          .mso .font-bitter,
          .mso .font-merriweather,
          .mso .font-pt-serif {
            font-family: Georgia, serif !important;
          }
          .mso .font-lato,
          .mso .font-roboto {
            font-family: Tahoma, sans-serif !important;
          }
          .mso .font-pt-sans {
            font-family: "Trebuchet MS", sans-serif !important;
          }
          .mso .footer__share-button p {
            margin: 0;
          }
          @media only screen and (min-width: 620px) {
            .wrapper .size-8 {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            .wrapper .size-9 {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            .wrapper .size-10 {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            .wrapper .size-11 {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            .wrapper .size-12 {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            .wrapper .size-13 {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            .wrapper .size-14 {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            .wrapper .size-15 {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            .wrapper .size-16 {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            .wrapper .size-17 {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            .wrapper .size-18 {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            .wrapper .size-20 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            .wrapper .size-22 {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            .wrapper .size-24 {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            .wrapper .size-26 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            .wrapper .size-28 {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            .wrapper .size-30 {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            .wrapper .size-32 {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            .wrapper .size-34 {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            .wrapper .size-36 {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            .wrapper .size-40 {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            .wrapper .size-44 {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            .wrapper .size-48 {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            .wrapper .size-56 {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            .wrapper .size-64 {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          .mso .size-8,
          .ie .size-8 {
            font-size: 8px !important;
            line-height: 14px !important;
          }
          .mso .size-9,
          .ie .size-9 {
            font-size: 9px !important;
            line-height: 16px !important;
          }
          .mso .size-10,
          .ie .size-10 {
            font-size: 10px !important;
            line-height: 18px !important;
          }
          .mso .size-11,
          .ie .size-11 {
            font-size: 11px !important;
            line-height: 19px !important;
          }
          .mso .size-12,
          .ie .size-12 {
            font-size: 12px !important;
            line-height: 19px !important;
          }
          .mso .size-13,
          .ie .size-13 {
            font-size: 13px !important;
            line-height: 21px !important;
          }
          .mso .size-14,
          .ie .size-14 {
            font-size: 14px !important;
            line-height: 21px !important;
          }
          .mso .size-15,
          .ie .size-15 {
            font-size: 15px !important;
            line-height: 23px !important;
          }
          .mso .size-16,
          .ie .size-16 {
            font-size: 16px !important;
            line-height: 24px !important;
          }
          .mso .size-17,
          .ie .size-17 {
            font-size: 17px !important;
            line-height: 26px !important;
          }
          .mso .size-18,
          .ie .size-18 {
            font-size: 18px !important;
            line-height: 26px !important;
          }
          .mso .size-20,
          .ie .size-20 {
            font-size: 20px !important;
            line-height: 28px !important;
          }
          .mso .size-22,
          .ie .size-22 {
            font-size: 22px !important;
            line-height: 31px !important;
          }
          .mso .size-24,
          .ie .size-24 {
            font-size: 24px !important;
            line-height: 32px !important;
          }
          .mso .size-26,
          .ie .size-26 {
            font-size: 26px !important;
            line-height: 34px !important;
          }
          .mso .size-28,
          .ie .size-28 {
            font-size: 28px !important;
            line-height: 36px !important;
          }
          .mso .size-30,
          .ie .size-30 {
            font-size: 30px !important;
            line-height: 38px !important;
          }
          .mso .size-32,
          .ie .size-32 {
            font-size: 32px !important;
            line-height: 40px !important;
          }
          .mso .size-34,
          .ie .size-34 {
            font-size: 34px !important;
            line-height: 43px !important;
          }
          .mso .size-36,
          .ie .size-36 {
            font-size: 36px !important;
            line-height: 43px !important;
          }
          .mso .size-40,
          .ie .size-40 {
            font-size: 40px !important;
            line-height: 47px !important;
          }
          .mso .size-44,
          .ie .size-44 {
            font-size: 44px !important;
            line-height: 50px !important;
          }
          .mso .size-48,
          .ie .size-48 {
            font-size: 48px !important;
            line-height: 54px !important;
          }
          .mso .size-56,
          .ie .size-56 {
            font-size: 56px !important;
            line-height: 60px !important;
          }
          .mso .size-64,
          .ie .size-64 {
            font-size: 64px !important;
            line-height: 63px !important;
          }
          .footer__share-button p {
            margin: 0;
          }
          </style>

              <title></title>
            <!--[if !mso]><!--><style type="text/css">
          @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
          </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
          body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
          620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
          </style><meta name="robots" content="noindex,nofollow" />
          <meta property="og:title" content="My First Campaign" />
          </head>
          <!--[if mso]>
            <body class="mso">
          <![endif]-->
          <!--[if !mso]><!-->
            <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
          <!--<![endif]-->
              <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                  <div style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                    <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                    <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                  <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                    <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                  </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </div>
                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

          <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Thanks for your Application!</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">You have succesfully filled the Registration Form for MUNDP 2019.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17"></p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your MyDP Login Credentials</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>Username: </strong>'.$_POST["email"].'<br><strong>Password: </strong>'.$password.'</p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                    <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                        <div>

                        </div>
                        <div style="Margin-top: 18px;">

                        </div>
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                    <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                        '.$emailextra.'
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

            </div>
          </body></html>
          ';
              // end


      // end

      if(!send_email($_POST["email"],"Registration",$emailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if($_POST["emailtest"] == "false" or 1 == 1)
      {
          DB::insert('mydp_users', array(
            'email' => $regd["email"],
            'hash' => $hash,
            'fullname' => $regd["fullname"],
            'phone' => $regd["phone"],
            'school' => $regd["schoolid"],
            'verified' => 0,
            'position' => 0,
            'birthdate' => $regd["birthdate"],
            'time_register' => microtime(true),
            'applicationdata' => json_encode($regd)
          ));
      }

      echo "ok";
  }

  //

  if($_POST["form"] == "school")
  {

      if(!$regisetting['school']) {
        return;
      }

      $listfor = DB::queryFirstRow("SELECT * FROM mydp_users WHERE email=%s",$_POST["advisor_email"]);

      //include("../secure/captcha.php");

      $url = 'https://www.google.com/recaptcha/api/siteverify';
      $data = array('secret' => RECAPTCHA_SECRET, 'response' => $_POST["g-recaptcha-response"]);

      // use key 'http' even if you send the request to https://...
      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => http_build_query($data),
          ),
      );
      //$context  = stream_context_create($options);
      //$result = file_get_contents($url, false, $context);

      //$rechapcha = json_decode($result);
      /*if(!$rechapcha->success)
      {
          echo "captcha";
          return;
      }*/

      if(!empty($listfor["id"]))
      {
          echo "emailinuse";
          return;
      }

      if(empty($_POST["school_name"]) or empty($_POST["school_country"]) or empty($_POST["school_postal"]) or empty($_POST["school_address"]) or empty($_POST["school_phone"]) or empty($_POST["advisor_fullname"]) or empty($_POST["advisor_phone"]) or empty($_POST["advisor_email"]) or empty($_POST["advisor_birthdate"]))
      {
          echo "empty";
          return;
      }

      include("../secure/email.php");
      include("../secure/randompass.php");

      if($_POST["emailtest"] == "true")
      {
          $emailextra = "<p><strong>Alert:</strong><br>This form is filled for testing. The information given won't be recored into the system.</p>";
      }
      else
      {
          $emailextra = "";
      }

      $password = generateStrongPassword();
      $cost = 10;
  		$salt = strtr(base64_encode(mcrypt_create_iv(64, MCRYPT_DEV_URANDOM)), '+', '.');
  		$salt = sprintf("$2a$%02d$", $cost) . $salt;
  		$hash = crypt($password, $salt);


      $emailcontent = '
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
              <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
              <meta name="viewport" content="width=device-width" />
              <style type="text/css">
          @media only screen and (min-width: 620px) {
            * [lang=x-wrapper] h1 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * [lang=x-wrapper] h2 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-8] {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            * div [lang=x-size-9] {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            * div [lang=x-size-10] {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            * div [lang=x-size-11] {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-12] {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            * div [lang=x-size-13] {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-14] {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            * div [lang=x-size-15] {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            * div [lang=x-size-16] {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            * div [lang=x-size-17] {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-18] {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            * div [lang=x-size-20] {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            * div [lang=x-size-22] {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            * div [lang=x-size-24] {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            * div [lang=x-size-26] {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            * div [lang=x-size-28] {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            * div [lang=x-size-30] {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            * div [lang=x-size-32] {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            * div [lang=x-size-34] {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-36] {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            * div [lang=x-size-40] {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            * div [lang=x-size-44] {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            * div [lang=x-size-48] {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            * div [lang=x-size-56] {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            * div [lang=x-size-64] {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          </style>
              <style type="text/css">
          body {
            margin: 0;
            padding: 0;
          }
          table {
            border-collapse: collapse;
            table-layout: fixed;
          }
          * {
            line-height: inherit;
          }
          [x-apple-data-detectors],
          [href^="tel"],
          [href^="sms"] {
            color: inherit !important;
            text-decoration: none !important;
          }
          .wrapper .footer__share-button a:hover,
          .wrapper .footer__share-button a:focus {
            color: #ffffff !important;
          }
          .btn a:hover,
          .btn a:focus,
          .footer__share-button a:hover,
          .footer__share-button a:focus,
          .email-footer__links a:hover,
          .email-footer__links a:focus {
            opacity: 0.8;
          }
          .ie .btn {
            width: 100%;
          }
          .ie .column,
          [owa] .column,
          .ie .gutter,
          [owa] .gutter {
            display: table-cell;
            float: none !important;
            vertical-align: top;
          }
          .ie .preheader,
          [owa] .preheader,
          .ie .email-footer,
          [owa] .email-footer {
            width: 560px !important;
          }
          .ie .snippet,
          [owa] .snippet,
          .ie .webversion,
          [owa] .webversion {
            width: 280px !important;
          }
          .ie .header,
          [owa] .header,
          .ie .layout,
          [owa] .layout,
          .ie .one-col .column,
          [owa] .one-col .column {
            width: 600px !important;
          }
          .ie .fixed-width.has-border,
          [owa] .fixed-width.has-border,
          .ie .has-gutter.has-border,
          [owa] .has-gutter.has-border {
            width: 602px !important;
          }
          .ie .two-col .column,
          [owa] .two-col .column {
            width: 300px !important;
          }
          .ie .three-col .column,
          [owa] .three-col .column,
          .ie .narrow,
          [owa] .narrow {
            width: 200px !important;
          }
          .ie .wide,
          [owa] .wide {
            width: 400px !important;
          }
          .ie .two-col.has-gutter .column,
          [owa] .two-col.x_has-gutter .column {
            width: 290px !important;
          }
          .ie .three-col.has-gutter .column,
          [owa] .three-col.x_has-gutter .column,
          .ie .has-gutter .narrow,
          [owa] .has-gutter .narrow {
            width: 188px !important;
          }
          .ie .has-gutter .wide,
          [owa] .has-gutter .wide {
            width: 394px !important;
          }
          .ie .two-col.has-gutter.has-border .column,
          [owa] .two-col.x_has-gutter.x_has-border .column {
            width: 292px !important;
          }
          .ie .three-col.has-gutter.has-border .column,
          [owa] .three-col.x_has-gutter.x_has-border .column,
          .ie .has-gutter.has-border .narrow,
          [owa] .has-gutter.x_has-border .narrow {
            width: 190px !important;
          }
          .ie .has-gutter.has-border .wide,
          [owa] .has-gutter.x_has-border .wide {
            width: 396px !important;
          }
          .ie .fixed-width .layout__inner {
            border-left: 0 none white !important;
            border-right: 0 none white !important;
          }
          .ie .layout__edges {
            display: none;
          }
          .mso .layout__edges {
            font-size: 0;
          }
          .layout-fixed-width,
          .mso .layout-full-width {
            background-color: #ffffff;
          }
          @media only screen and (min-width: 620px) {
            .column,
            .gutter {
              display: table-cell;
              Float: none !important;
              vertical-align: top;
            }
            .preheader,
            .email-footer {
              width: 560px !important;
            }
            .snippet,
            .webversion {
              width: 280px !important;
            }
            .header,
            .layout,
            .one-col .column {
              width: 600px !important;
            }
            .fixed-width.has-border,
            .fixed-width.ecxhas-border,
            .has-gutter.has-border,
            .has-gutter.ecxhas-border {
              width: 602px !important;
            }
            .two-col .column {
              width: 300px !important;
            }
            .three-col .column,
            .column.narrow {
              width: 200px !important;
            }
            .column.wide {
              width: 400px !important;
            }
            .two-col.has-gutter .column,
            .two-col.ecxhas-gutter .column {
              width: 290px !important;
            }
            .three-col.has-gutter .column,
            .three-col.ecxhas-gutter .column,
            .has-gutter .narrow {
              width: 188px !important;
            }
            .has-gutter .wide {
              width: 394px !important;
            }
            .two-col.has-gutter.has-border .column,
            .two-col.ecxhas-gutter.ecxhas-border .column {
              width: 292px !important;
            }
            .three-col.has-gutter.has-border .column,
            .three-col.ecxhas-gutter.ecxhas-border .column,
            .has-gutter.has-border .narrow,
            .has-gutter.ecxhas-border .narrow {
              width: 190px !important;
            }
            .has-gutter.has-border .wide,
            .has-gutter.ecxhas-border .wide {
              width: 396px !important;
            }
          }
          @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .fblike {
              background-image: url(https://i3.createsend1.com/static/eb/beta/13-the-blueprint-3/images/fblike@2x.png) !important;
            }
            .tweet {
              background-image: url(https://i4.createsend1.com/static/eb/beta/13-the-blueprint-3/images/tweet@2x.png) !important;
            }
            .linkedinshare {
              background-image: url(https://i6.createsend1.com/static/eb/beta/13-the-blueprint-3/images/lishare@2x.png) !important;
            }
            .forwardtoafriend {
              background-image: url(https://i5.createsend1.com/static/eb/beta/13-the-blueprint-3/images/forward@2x.png) !important;
            }
          }
          @media (max-width: 321px) {
            .fixed-width.has-border .layout__inner {
              border-width: 1px 0 !important;
            }
            .layout,
            .column {
              min-width: 320px !important;
              width: 320px !important;
            }
            .border {
              display: none;
            }
          }
          .mso div {
            border: 0 none white !important;
          }
          .mso .w560 .divider {
            Margin-left: 260px !important;
            Margin-right: 260px !important;
          }
          .mso .w360 .divider {
            Margin-left: 160px !important;
            Margin-right: 160px !important;
          }
          .mso .w260 .divider {
            Margin-left: 110px !important;
            Margin-right: 110px !important;
          }
          .mso .w160 .divider {
            Margin-left: 60px !important;
            Margin-right: 60px !important;
          }
          .mso .w354 .divider {
            Margin-left: 157px !important;
            Margin-right: 157px !important;
          }
          .mso .w250 .divider {
            Margin-left: 105px !important;
            Margin-right: 105px !important;
          }
          .mso .w148 .divider {
            Margin-left: 54px !important;
            Margin-right: 54px !important;
          }
          .mso .font-avenir,
          .mso .font-cabin,
          .mso .font-open-sans,
          .mso .font-ubuntu {
            font-family: sans-serif !important;
          }
          .mso .font-bitter,
          .mso .font-merriweather,
          .mso .font-pt-serif {
            font-family: Georgia, serif !important;
          }
          .mso .font-lato,
          .mso .font-roboto {
            font-family: Tahoma, sans-serif !important;
          }
          .mso .font-pt-sans {
            font-family: "Trebuchet MS", sans-serif !important;
          }
          .mso .footer__share-button p {
            margin: 0;
          }
          @media only screen and (min-width: 620px) {
            .wrapper .size-8 {
              font-size: 8px !important;
              line-height: 14px !important;
            }
            .wrapper .size-9 {
              font-size: 9px !important;
              line-height: 16px !important;
            }
            .wrapper .size-10 {
              font-size: 10px !important;
              line-height: 18px !important;
            }
            .wrapper .size-11 {
              font-size: 11px !important;
              line-height: 19px !important;
            }
            .wrapper .size-12 {
              font-size: 12px !important;
              line-height: 19px !important;
            }
            .wrapper .size-13 {
              font-size: 13px !important;
              line-height: 21px !important;
            }
            .wrapper .size-14 {
              font-size: 14px !important;
              line-height: 21px !important;
            }
            .wrapper .size-15 {
              font-size: 15px !important;
              line-height: 23px !important;
            }
            .wrapper .size-16 {
              font-size: 16px !important;
              line-height: 24px !important;
            }
            .wrapper .size-17 {
              font-size: 17px !important;
              line-height: 26px !important;
            }
            .wrapper .size-18 {
              font-size: 18px !important;
              line-height: 26px !important;
            }
            .wrapper .size-20 {
              font-size: 20px !important;
              line-height: 28px !important;
            }
            .wrapper .size-22 {
              font-size: 22px !important;
              line-height: 31px !important;
            }
            .wrapper .size-24 {
              font-size: 24px !important;
              line-height: 32px !important;
            }
            .wrapper .size-26 {
              font-size: 26px !important;
              line-height: 34px !important;
            }
            .wrapper .size-28 {
              font-size: 28px !important;
              line-height: 36px !important;
            }
            .wrapper .size-30 {
              font-size: 30px !important;
              line-height: 38px !important;
            }
            .wrapper .size-32 {
              font-size: 32px !important;
              line-height: 40px !important;
            }
            .wrapper .size-34 {
              font-size: 34px !important;
              line-height: 43px !important;
            }
            .wrapper .size-36 {
              font-size: 36px !important;
              line-height: 43px !important;
            }
            .wrapper .size-40 {
              font-size: 40px !important;
              line-height: 47px !important;
            }
            .wrapper .size-44 {
              font-size: 44px !important;
              line-height: 50px !important;
            }
            .wrapper .size-48 {
              font-size: 48px !important;
              line-height: 54px !important;
            }
            .wrapper .size-56 {
              font-size: 56px !important;
              line-height: 60px !important;
            }
            .wrapper .size-64 {
              font-size: 64px !important;
              line-height: 63px !important;
            }
          }
          .mso .size-8,
          .ie .size-8 {
            font-size: 8px !important;
            line-height: 14px !important;
          }
          .mso .size-9,
          .ie .size-9 {
            font-size: 9px !important;
            line-height: 16px !important;
          }
          .mso .size-10,
          .ie .size-10 {
            font-size: 10px !important;
            line-height: 18px !important;
          }
          .mso .size-11,
          .ie .size-11 {
            font-size: 11px !important;
            line-height: 19px !important;
          }
          .mso .size-12,
          .ie .size-12 {
            font-size: 12px !important;
            line-height: 19px !important;
          }
          .mso .size-13,
          .ie .size-13 {
            font-size: 13px !important;
            line-height: 21px !important;
          }
          .mso .size-14,
          .ie .size-14 {
            font-size: 14px !important;
            line-height: 21px !important;
          }
          .mso .size-15,
          .ie .size-15 {
            font-size: 15px !important;
            line-height: 23px !important;
          }
          .mso .size-16,
          .ie .size-16 {
            font-size: 16px !important;
            line-height: 24px !important;
          }
          .mso .size-17,
          .ie .size-17 {
            font-size: 17px !important;
            line-height: 26px !important;
          }
          .mso .size-18,
          .ie .size-18 {
            font-size: 18px !important;
            line-height: 26px !important;
          }
          .mso .size-20,
          .ie .size-20 {
            font-size: 20px !important;
            line-height: 28px !important;
          }
          .mso .size-22,
          .ie .size-22 {
            font-size: 22px !important;
            line-height: 31px !important;
          }
          .mso .size-24,
          .ie .size-24 {
            font-size: 24px !important;
            line-height: 32px !important;
          }
          .mso .size-26,
          .ie .size-26 {
            font-size: 26px !important;
            line-height: 34px !important;
          }
          .mso .size-28,
          .ie .size-28 {
            font-size: 28px !important;
            line-height: 36px !important;
          }
          .mso .size-30,
          .ie .size-30 {
            font-size: 30px !important;
            line-height: 38px !important;
          }
          .mso .size-32,
          .ie .size-32 {
            font-size: 32px !important;
            line-height: 40px !important;
          }
          .mso .size-34,
          .ie .size-34 {
            font-size: 34px !important;
            line-height: 43px !important;
          }
          .mso .size-36,
          .ie .size-36 {
            font-size: 36px !important;
            line-height: 43px !important;
          }
          .mso .size-40,
          .ie .size-40 {
            font-size: 40px !important;
            line-height: 47px !important;
          }
          .mso .size-44,
          .ie .size-44 {
            font-size: 44px !important;
            line-height: 50px !important;
          }
          .mso .size-48,
          .ie .size-48 {
            font-size: 48px !important;
            line-height: 54px !important;
          }
          .mso .size-56,
          .ie .size-56 {
            font-size: 56px !important;
            line-height: 60px !important;
          }
          .mso .size-64,
          .ie .size-64 {
            font-size: 64px !important;
            line-height: 63px !important;
          }
          .footer__share-button p {
            margin: 0;
          }
          </style>

              <title></title>
            <!--[if !mso]><!--><style type="text/css">
          @import url(https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic);
          </style><link href="https://fonts.googleapis.com/css?family=Merriweather:400italic,400,700,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
          body{background-color:#fefefe}.mso h1{}.mso h2{}.mso h3{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{}.mso .layout-fixed-width td,.mso .layout-full-width td,.mso .column__background td{font-family:Georgia,serif !important}.mso .btn a{}.mso .btn a{font-family:Georgia,serif !important}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{}.mso .webversion,.mso .snippet,.mso .layout-email-footer td,.mso .footer__share-button p{font-family:Georgia,serif !important}.mso .logo{}.mso .logo{font-family:Tahoma,sans-serif !important}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #cbcbcb;border-bottom:1px solid #cbcbcb}.mso .layout-has-bottom-border{border-bottom:1px solid #cbcbcb}.mso .border,.ie .border{background-color:#cbcbcb}@media only screen and (min-width:
          620px){.wrapper h1{}.wrapper h1{font-size:26px !important;line-height:34px !important}.wrapper h2{}.wrapper h2{font-size:20px !important;line-height:28px !important}.wrapper h3{}.column,.column__background td{}}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:26px !important;line-height:34px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:20px !important;line-height:28px !important}.mso h3,.ie h3{}.mso .column,.ie .column,.mso .column__background td,.ie .column__background td{}
          </style><meta name="robots" content="noindex,nofollow" />
          <meta property="og:title" content="My First Campaign" />
          </head>
          <!--[if mso]>
            <body class="mso">
          <![endif]-->
          <!--[if !mso]><!-->
            <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
          <!--<![endif]-->
              <div class="wrapper" style="min-width: 320px;background-color: #fefefe;" lang="x-wrapper">
                <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000vw - 173040px);">
                  <div style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0"><tr><td style="width: 280px" valign="top"><![endif]-->
                    <div class="snippet" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000vw - 86520px);padding: 10px 0 5px 0;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                    <div class="webversion" style="Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100vw - 87140px);padding: 10px 0 5px 0;text-align: right;color: #a3a4ad;font-family: Merriweather,Georgia,serif;">

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);" id="emb-email-header-container">
                <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0"><tr><td style="width: 600px"><![endif]-->
                  <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;color: #c3ced9;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center">
                    <div class="logo-center" style="font-size:0px !important;line-height:0 !important;" align="center" id="emb-email-header"><img style="height: auto;width: 100%;border: 0;max-width: 286px;" src="http://cdn.modelundp.org/mail_attachments/logo.png" alt="" width="286" /></div>
                  </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </div>
                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #fefefe;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" style="background-color: #fefefe;"><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">

          <h1 class="size-30" style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #353638;font-size: 26px;line-height: 34px;text-align: center;" lang="x-size-30">Thanks for your School Application!</h1><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">You have succesfully filled the Registration Form for MUNDP 2019. We will turn back to you within 48 hours.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">If you do not hear from us in the given time span, please contact Deputy Secretary General of Liaison G&#246;ksu &#350;im&#351;ek (Ms.)&nbsp;at liaison@modelundp.org</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Rregistration form for Student Officers, ICJ, Historical Committee and OIF are also available.</p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;background-color: #ffffff;" emb-background-style>
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                    <div class="column" style="text-align: left;color: #353638;font-size: 14px;line-height: 21px;font-family: Merriweather,Georgia,serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);">

                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;Margin-bottom: 24px;">
                <p class="size-17" style="Margin-top: 0;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">On your MyDP page, you will be able to enroll your delegates and advisors.</p><p class="size-17" style="Margin-top: 20px;Margin-bottom: 0;font-size: 17px;line-height: 26px;text-align: center;" lang="x-size-17">Your MyDP Login Credentials</p><p class="size-14" style="Margin-top: 20px;Margin-bottom: 0;font-size: 14px;line-height: 21px;text-align: center;" lang="x-size-14"><strong>Username: </strong>'.$_POST["advisor_email"].'<br><strong>Password: </strong>'.$password.'</p>
              </div>

                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

                <div style="line-height:20px;font-size:20px;">&nbsp;</div>

                <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000vw - 173000px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
                  <div class="layout__inner" style="border-collapse: collapse;display: table;">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                    <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000vw - 49200px);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                        <div>

                        </div>
                        <div style="Margin-top: 18px;">

                        </div>
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                    <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #a3a4ad;font-family: Merriweather,Georgia,serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(74600px - 12000vw);">
                      <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                        '.$emailextra.'
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>

            </div>
          </body></html>
          ';

      $liaisonemailcontent = '
          <h3>New School Registration</h3>
          <p>
              <strong>School\'s Name:</strong> '.$_POST["school_name"].'
              <br>
              <strong>School\'s Country:</strong> '.$_POST["school_country"].'
              <br>
              <strong>School\'s Phone:</strong> '.$_POST["school_phone"].'
              <br>
              <strong>Past MUNDP Experience:</strong> '.$_POST["school_attendedbefore"].' (1: Yes, 0: No)
              <br>
              <strong>Advisor\'s Name:</strong> '.$_POST["advisor_fullname"].'
              <br>
              <strong>Advisor\'s E-Mail:</strong> '.$_POST["advisor_email"].'
              <br>
              <strong>Advisor\'s Phone:</strong> '.$_POST["advisor_phone"].'
          </p>
          <p>Detailed information will be available on MyDP.</p>
          '.$emailextra.'
          ';

      // end

      if(!send_email("liaison@modelundp.org","School Registration",$liaisonemailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if(!send_email($_POST["advisor_email"],"School Registration",$emailcontent) == "sent")
      {
          echo "mailerror";
          return;
      }

      if($_POST["emailtest"] == "false" or 1 == 1)
      {
          DB::insert('mydp_school', array(
            'name' => $_POST["school_name"],
            'country' => $_POST["school_country"],
            'address_postal' => $_POST["school_postal"],
            'address_full' => $_POST["school_address"],
            'phone' => $_POST["school_phone"],
            'fax' => $_POST["school_fax"],
            'pastmun' => $_POST["school_attendedbefore"],
            'time_register' => microtime(true)
          ));

          $schoolid = DB::insertId();

          DB::insert('mydp_users', array(
            'email' => $_POST["advisor_email"],
            'hash' => $hash,
            'fullname' => $_POST["advisor_fullname"],
            'phone' => $_POST["advisor_phone"],
            'verified' => 0,
		  'position' => 3,
            'birthdate' => $_POST["advisor_birthdate"],
            'school' => $schoolid,
            'time_register' => microtime(true)
          ));
      }

      echo "ok";
  }

  die();
}
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
    <link rel="icon" href="../favicon.ico">

    <title><?= TITLE ?>: Registration</title>

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
  </head>

  <body>

    <? include("../_includes/navigation.php"); ?>

    <div class="jumbotron executive">
        <div class="container">
            <h1>Registrations are Open!</h1>
        </div>
    </div>

    <div class="container">

          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-24">
              <? if(!$regisetting['school']) { ?>
                <a href="" class="btn btn-primary btn-lg btn-block disabled"><h4><strong>School Registration</strong></h4><small>Registration is closed.</small></a>
              <? } else { ?>
                <a href="school" class="btn btn-primary btn-lg btn-block"><h4><strong>School Registration</strong></h4><small>Registration is open until December 10th.</small></a>
              <? } ?>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-24">
              <? if(!$regisetting['stoff']) { ?>
                <a href="" class="btn btn-primary btn-lg btn-block disabled"><h4><strong>Student Officer Registration</strong></h4><small>Registration is closed.</small></a>
              <? } else { ?>
                <a href="studentofficer" class="btn btn-primary btn-lg btn-block"><h4><strong>Student Officer Registration</strong></h4><small>Registration is open until November 12th.</small></a>
              <? } ?>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-24">
              <? if(!$regisetting['icj']) { ?>
                <a href="" class="btn btn-primary btn-lg btn-block disabled"><h4><strong>ICJ Registration</strong></h4><small>Registration is closed.</small></a>
              <? } else { ?>
                <a href="icj" class="btn btn-primary btn-lg btn-block"><h4><strong>ICJ Registration</strong></h4><small>Registration is open until December 10th.</small></a>
              <? } ?>
            </div>
			      <div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-24">
              <? if(!$regisetting['oif']) { ?>
                <a href="" class="btn btn-primary btn-lg btn-block disabled"><h4><strong>OIF Registration</strong></h4><small>Registration is closed.</small></a>
              <? } else { ?>
                <a href="oif" class="btn btn-primary btn-lg btn-block"><h4><strong>OIF Registration</strong></h4><small>Registration is open until December 10th.</small></a>
              <? } ?>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-24">
              <? if(!$regisetting['historical']) { ?>
                <a href="" class="btn btn-primary btn-lg btn-block disabled"><h4><strong>Historical Committee Registration</strong></h4><small>Registration is closed.</small></a>
              <? } else { ?>
                <a href="historical" class="btn btn-primary btn-lg btn-block"><h4><strong>Historical Committee Registration</strong></h4><small>Registration is open until December 10th.</small></a>
              <? } ?>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-24">
              <? if(!$regisetting['press']) { ?>
                <a href="" class="btn btn-primary btn-lg btn-block disabled"><h4><strong>Press Registration</strong></h4><small>Registration is closed.</small></a>
              <? } else { ?>
                <a href="press" class="btn btn-primary btn-lg btn-block"><h4><strong>Press Registration</strong></h4><small>Registration is open until December 31st.</small></a>
              <? } ?>
            </div>
        </div>

<!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdjJEhXygDquXdy4mxKvy2SF85ginR_1UppBxJC9NYCXzvm2Q/viewform?embedded=true" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
-->

      <!--  <div class="alert alert-success">
          <h4>Check Your Application Status</h4>
          <p>You can check your application status from this form.</p><br>
          <form class="form-inline" id="checkform" action="registration.php" method="post">
            <div class="form-group">
              <label class="sr-only">Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <input type="hidden" name="form" value="status">
            <button type="submit" class="btn btn-default" id="statusbutton">Check Status</button>
          </form>
        </div>
      -->
        <br>

        <h3>About Registration and MyDP Service</h3>
        <hr>
        <p>After registration, in order to verify your contact information, a validation e-mail will be sent by us. After verification of your participation to MUNDP, you will be able to access the “MyDP” service. On your MyDP page, you will be able to enroll your delegates and advisors. In order to keep updated, please use give us the e-mail address that you check frequently. Your contacts will be protected by the MUNDP and will not be shared with any third parties.</p>

    </div> <!-- /container -->

    <? include("../_includes/footer.php"); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.form.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>


    <script>

        function disablebutton()
        {
            $("#statusbutton").attr('disabled', true);
            $("#statusbutton").html('Processing...');
        }

        function enablebutton()
        {
            $("#statusbutton").attr('disabled', false);
            $("#statusbfutton").html('Check Status');
        }

        var options = {
            url:        'registration.php',
            success:    function(data) {
                if(data == "notfound")
                {
                    swal("Opps", "There is no application under this email address.", "error");
                    enablebutton();
                }
                else
                {
                    swal("Thank you for your Application", data, "success");
                    enablebutton();
                }
            },
            beforeSubmit: function(){
                disablebutton();
            }
        };

      },
      });
    })

    </script>
  </body>
</html>

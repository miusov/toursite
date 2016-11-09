<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>toursite</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" href="css/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <?php include_once('pages/functions.php') ?>
      <div id="wrap">

        <!-- log in -->

        <div class="container enter">
          <div class="row">
            <div class="col-xs-2 right">
              <a href="index.php?page=0"><img src="img/logo.png" alt=""></a>
            </div>
            <div class="col-xs-10">
              <form action="index.php" class="admin-form">
                <input type="text" placeholder="login" class="inp" name="log"><br>
                <input type="password" placeholder="password" class="inp" name="pas"> <br>
                <input type="submit" value="SIGN IN" name="signin">
              </form>
            </div>
          </div>
        </div>

        <!-- navbar -->

        <?php include('pages/menu.php') ?>

        <!-- content -->

        <section class="content container">
          <div class="row">
            <div class="col-md-12">
                          <?php
                          if (empty($_GET)) {
                            include_once("pages/start.php");
                          }
                          if(isset($_GET['page']))
                          {
                            $page=$_GET['page'];
                            if($page==0)include_once("pages/start.php");
                            if($page==1)include_once("pages/tours.php");
                            if($page==2)include_once("pages/review.php");
                            if($page==3)include_once("pages/register.php");
                            if($page==4)include_once("pages/admin.php");
                            if($page==5)include_once("pages/hotelinfo.php");
                          }
                          ?>
                        </div>
                      </div>
                    </section>

                    <!-- footer -->

                    <footer class="container-fluid">
                      <div class="container">
                        <p class="text-center">Copyright © 2016 IT STEP SCHOOL.</p>
                      </div>

                    </footer>

                  </div>

                  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                  <script src="js/jquery-3.1.1.min.js"></script>
                  <!-- Include all compiled plugins (below), or include individual files as needed -->
                  <script src="js/bootstrap.min.js"></script>
                  <script src="js/ajax/scriptAjax.js"></script>
                  <script type="text/javascript" src="js/jquery.infinitecarousel3.js"></script>
                  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
                  <script type="text/javascript">
                    $(function(){
                      $('#carousel').infiniteCarousel({
                        imagePath: 'images/',
                        transitionSpeed:450,
                        displayTime: 6000,
                        internalThumbnails: false,
                        thumbnailType: 'images',
                        customClass: 'myCarousel',
                        progressRingColorOpacity: '0,0,0,.9',
                        progressRingBackgroundOn: true,
                        easeLeft: 'easeOutExpo',
                        easeRight:'easeOutQuad',
                        inView: 1,
                        advance: 1,
                        autoPilot: true,
                        prevNextInternal: true,
                        autoHideCaptions: true
                      });
                    });
                  </script>
                  <script src="js/main.js"></script>
                </body>
                </html>
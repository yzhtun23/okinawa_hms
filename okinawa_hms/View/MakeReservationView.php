<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">

  <title>Okinawa</title>
  <script type="text/javascript">
  function preventBack(){
    window.history.forward();
  }
  setTimeout("preventBack()",0);
  window.onunload=function(){null};
  window.history.forward();

  </script>
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css"/>

  <!-- Custom styles for this template -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">


  <!-- Just for debugging purposes. Don't actually copy this line! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <?php
  session_start();
  display();

  function display(){

    $arrivaldate=$_SESSION['arrivalDate'];
    $departuredate=$_SESSION['departureDate'];
    $roomTypesingle=$_SESSION['roomTypeSingle'];
    $roomTypeDouble=$_SESSION['roomTypeDouble'];
    $reserveno=$_SESSION['reserveno'];
    $reserveID=$_SESSION['rID'];
    ?>
    <!-- Static navbar -->
    <div class="navbar navbar-default" role="navigation" style="margin:0; padding:0;">
      <div class="container">
        <div class="navbar-header">
          <button type="button"   class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="HomeView.php">OKINAWA</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="HomeView.php">Home</a></li>
            <li class="active"><a href="ReservationView.php">Reservation</a></li>
            <li><a href="InquiryView.php">Inquiry</a></li>
            <li><a href="AboutView.php">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div id="reservationwrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3">
            <h1>RESERVATION</h1>
          </div>
        </div><!--/row -->
      </div> <!-- /container -->
    </div><!--/reservationwrap -->

    <!-- Check Room Availability -->
    <div class="container">
      <div class="row centered mt mb">
        <div class="col-lg-8 col-lg-offset-2" style="margin-top:15px;">
          <h2 style="margin-bottom:40px;">RESERVATION FORM </h2>
          <?php  if ($reserveno==4) {?>
            <h4 style="margin-bottom:20px;"><font color='red'><b>( *) </b>are Require Fields. </font></h4><?php  }?>
            <?php if ($reserveno!=4){
              ?><h2 style="color: green;"><?php
              echo "Reservation Successful<br>";
              echo "Your Reservation Number  is :{$reserveID}";?></h2><?php
            } ?>

            <div class="jumbotron">
              <form class="form-horizontal" name="makeReservation" method="post" action="../Controller/MainController.php">
                <fieldset>
                  <div class="form-group">
                    <label for="NameCR" class="col-md-2 col-md-offset-2 control-label">Name</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="NameCR"   name="name"  pattern="[^0-9\-]+$" placeholder="Name"<?php if($reserveno!=4){?> value="<?php echo $_SESSION['name']; ?>" readonly="readonly" <?php }?> required="required">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="NameCR" class="col-md-2 col-md-offset-2 control-label">Email</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="NameCR"  name="email"  pattern="(\W|^)[\w.+\-]{0,25}@(yahoo|hotmail|gmail)\.com(\W|$)"	required  placeholder="Email" <?php if($reserveno!=4){?> value="<?php echo $_SESSION['email']; ?>" readonly="readonly" <?php }?>>
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="Gender" class="col-md-2 col-md-offset-2 control-label"><b><font color='red'>* </font></b>Gender</label>
                    <div class="col-md-3">
                      <label class="radio-inline"><input type="radio" name="gender"   value="Male" <?php if($reserveno!=4){ if ($_SESSION['gender']=='Male') {?>checked="true"<?php }} else { ?>checked="true" <?php };?> >Male</label>
                    </div>
                    <div class="col-md-3">
                      <label class="radio-inline"><input type="radio" name="gender"  value="Female" <?php if($reserveno!=4){  if ($_SESSION['gender']=='Female') {?>checked="true"<?php }}?>>Female</label>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="phNo" class="col-md-2 col-md-offset-2 control-label">Phone No.</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="phNo" name="phoneno"  pattern="^[0-9\-]+$"  placeholder="Phone No." <?php if($reserveno!=4){?> value="<?php echo $_SESSION['phoneno']; ?>" readonly="readonly" <?php }?> required="required" >
                    </div>
                  </div>




                  <?php if($reserveno!=4){?>
                    <div class="form-group">
                      <label for="roomType" class="col-md-2 col-md-offset-2 control-label">Room Type</label>
                      <div class="col-lg-4">
                        <select  class="form-control"  name="roomTypeSingle" placeholder="" disabled="disabled"/>
                        <?php if($reserveno!=4){ ?>
                          <option value=""><?php echo $_SESSION['roomTypeSingle'] ;?> </option>
                          <?php } else?>
                          <option value="">Single Room</option>
                          <?php for($i=1; $i<=$roomTypesingle; $i++){?>
                            <option><?php echo $i; ?></option>
                            <?php }?>
                          </select>
                        </div>

                        <div class="col-lg-4">
                          <select class="form-control" name="roomTypeDouble"  placeholder="" disabled="disabled"/>
                          <?php if($reserveno!=4){ ?>
                            <option value=""><?php echo $_SESSION['roomTypeDouble'] ;?> </option>
                            <?php } else?>
                            <option value="">Double Room</option>
                            <?php for ($j=1; $j<=$roomTypeDouble; $j++){?>
                              <option><?php echo $j; ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                        <?php }  ?>

                        <div class="form-group">
                          <label for="Address" class="col-md-2 col-md-offset-2 control-label"><b><font color='red'>* </font></b>Address</label>
                          <div class="col-md-6">
                            <textarea class="form-control" rows="3" id="Address" name="address" placeholder="Address" <?php if($reserveno!=4){?> readonly="readonly" <?php }?>>
                              <?php  if($reserveno!=4){  echo $_SESSION['address']; }?>
                            </textarea>
                          </div>
                        </div>
                        <input type="hidden" name="arrivalDate" value='<?php echo $arrivaldate  ?>'/>
                        <input type="hidden" name="departureDate" value='<?php echo $departuredate ?>'/>
                        <input type="hidden" name="roomTypeDouble" value='<?php echo $roomTypeDouble  ?>'/>
                        <input type="hidden" name="roomTypeSingle" value='<?php echo $roomTypesingle  ?>'/>


                        <!-- <h4 id="successAlert" style="color:green; margin-top: 30px;">
                        <center><strong>Rerservation Success</strong></center>
                      </h4> -->
                      <div class="form-group">
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3" style="margin-top: 30px;">
                            <?php if($reserveno==4){?><input type="submit" class="btn btn-primary" id="showAlert" name="CheckButton" value="Reserve" ><?php }?>
                            <?php if($reserveno==4){?>  <input type="reset" class="btn btn-default" name="Back" value="Clear"><?php }?>
                            <?php if($reserveno!=4){?>  <input type="submit" class="btn btn-primary" id="showAlert"  name="CheckButton" value="BACK"> <?php }?>

                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                </div><!--/jumbotron-->
              </div>
            </div><!--/row -->
          </div><!--/container -->

          <div id="social">
            <div class="container">
              <div class="row centered">

              </div><!--/row -->
            </div><!--/container -->
          </div><!--/social -->

          <div id="footerwrap">
            <div class="container">
              <div class="row centered">
                <div class="col-lg-6 col-lg-offset-3">
                  <p><b>OKINAWA HOTEL MANAGEMENT SYSTEM</b></p>
                </div>
              </div>
            </div>
          </div><!--/footerwrap -->



          <!-- Bootstrap core JavaScript
          ================================================== -->
          <!-- Placed at the end of the document so the pages load faster -->
          <!--  jQuery -->
          <script type="text/javascript" src="assets/js/jquery.min.js"></script>

          <script src="assets/js/bootstrap.min.js"></script>


          <?php
        }
        ?>
      </script>
    </body>
    </html>

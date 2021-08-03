<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Gymitron</title>
  <link href="downloaded/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="downloaded/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<link href="css/agency.min.css" rel="stylesheet">
<style type="text/css">
  img{height: 100vh; width: 100vw;}
</style>
</head>
<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Gymitron</a>
       </div>
  </nav>
  <header class="masthead">
    <div class="container">
      <div class="intro-text" >
          <div class="intro-heading text-uppercase">STOP WASTING</div>
         <div class="intro-lead-in">Time</div>
       <button class="btn btn-outline-warning btn-xl text-uppercase js-scroll-trigger" data-toggle="modal" href="#login">AND GET STARTED</button>
      </div>
    </div>
  </header>
  <footer id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>Centres In Delhi</h3>
          <hr>
          <div style="text-align:left; opacity: 0.8;">
          PALAM <br>
          DWARKA <br>
          JANAK PURI <br></div>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <h3>Centres In Other Cities</h3>
          <hr>
          <div style="text-align:right; opacity: 0.8;">
          MUMBAI <br>
          BANGLORE <br>
          KOLKATA <br></div>
        </div>
      </div>
    </div>
  </footer>
 <!--login -->
  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">  
           <div class="modal-body">
      <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">LOGIN <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>
      <div class="card-body">
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">User Name:</label>
            <input class="form-control" id="exampleInputEmail1" type="text" name="uname" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="pass" placeholder="Password">
          </div>
          <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>
                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
                    ?>
          <input type="submit" name="login" class="btn btn-primary btn-block" value="LOGIN"/>
   <div class="text-center">
            <a data-toggle="modal" href="#forgot-password">forgot password?</a>
        </div>
        </form>
        </div>
    </div>
  </div>
            </div>
      </div>
            </div>
    </div>
    <!-- forgotpassword-->
    <div class="modal fade" id="forgot-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">  
           <div class="modal-body">
      <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">RESET PASSWORD<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form>
          <div class="form-group">
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email address">
          </div>
          <a class="btn btn-primary btn-block" href="#">Reset Password</a>
        </form>  
     </div>
    </div>
  </div>
            </div>
      </div>
            </div>
    </div>
 <script src="downloaded/jquery/jquery.min.js"></script>
  <script src="downloaded/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="downloaded/jquery-easing/jquery.easing.min.js"></script>
 <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>
 <script src="js/agency.min.js"></script>
</body>
</html>

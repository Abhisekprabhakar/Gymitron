<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
$uname=$_POST["user"];
$package=$_POST["package"];
$membership=$_POST["membership"];			
$date=date("Y-m-d");
$amount=$_POST["amount"];

$s= "select * from user where username='$uname'";
$result= mysqli_query($conn,$s);
$num=mysqli_fetch_array($result);

if($num == true){
	$s1="select duedate from user where username='$uname'";
$da= mysqli_query($conn,$s1);
$dat=mysqli_fetch_assoc($da);
$d= date('Y-m-d', strtotime($date. ' + 4 days'));
if(strtotime($dat['duedate'])<strtotime($d))
{
if($membership=="Monthly")
{ 	
	$ddate= date('Y-m-d', strtotime($dat['duedate']. ' + 31 days'));
   
}
if($membership=="Quaterly")
{ 	
	$ddate=  date('Y-m-d', strtotime($dat['duedate']. ' + 90 days'));
   
}
if($membership=="Semi-Annual")
{ 	
	$ddate=date('Y-m-d', strtotime($dat['duedate']. ' + 180 days'));   
}
if($membership=="Annual")
{ 	
	$ddate=date('Y-m-d', strtotime($dat['duedate']. ' + 365 days'));
}
	$sql1="UPDATE `user` SET `package`='$package',`member`='$membership',`duedate`='$ddate' WHERE username='$uname'";
	
	mysqli_query($conn,$sql1);
	$sql2=" INSERT INTO `account`(`username`, `date`, `amount`) VALUES ('$uname','$date','$amount')";
	mysqli_query($conn,$sql2);
?>
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
<link href="css/package.css" rel="stylesheet">
<style>
.card-head2 {
    color: white;
    font-family: 'Kaushan Script',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
    font-size: 40px;
    text-align: left;
}
.card-b{    font-family: "Segoe UI Symbol";
    font-size:20px;
    font-weight: 400;
    line-height: 1.5;
    text-align: left;

}
</style>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="max-height: 50px;" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Gymitron</a>
      </div>
  </nav>


 <div class="container-fluid" style = "position:relative; top:50px; padding-top: 10px;">
<div class="row" style="height:400px;">
  <div class="container">
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            
    <div class="card bg-dark text-white col-md-12" style="height: 30%;" >
        <div class="card-header card-head2">Payment Slip</div>
        <div class="card-body card-b">
         <?php
         echo "Recieved From ".$uname." the amount of ".$amount." for ".$package." package, On ".$date."<br>"."The membership is valid till ".$ddate ;
         ?>
    <br><br><hr>
        <button class="btn btn-outline-warning btn-l text-uppercase " data-toggle="modal" onclick="window.print()">Print</button>
</div>
   
  
</div>
        </div>
    </div>
    </div></div>
  <!-- Footer -->
  <footer id="contact" style="background: #EAECEB;">
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
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="downloaded/jquery/jquery.min.js"></script>
  <script src="downloaded/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="downloaded/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>
 
<?php
}else{
	header("location:admin.php?Invalidp=***Can't Proceed *** ");
}}
else{
header("location:admin.php?Invalidp=***Username Doesn't exist*** ");	}









?>
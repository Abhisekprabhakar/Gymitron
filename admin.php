
<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","project");
    if($_SESSION['User']=="admin")
    {
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
<style>
.scroll {
    max-height: 590px;
    overflow-y: auto;
}
.card-head {
    color: #fed136;
    font-family: 'Kaushan Script',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
    font-size: 40px;
    text-align: center;
}
.card-bg{
    background-color: #fed136;
}
.card-head2 {
    color: ##343a40;
    font-family: 'Kaushan Script',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
    font-size: 40px;
    text-align: left;
}
</style>
</head>
<body id="page-top" onload="myFunction()">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="max-height: 50px;" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Gymitron</a>
      <a class="navbar-toggler navbar-toggler-right" href="logout.php?logout" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Logout
        <i class="fas fa-power-off"></i>
      </a>
      <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">  
            <li class="nav-item">
            <a class="nav-link js-scroll-trigger" ><?php echo ' WELCOME! ' . $_SESSION['User']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php?logout"><i class="fa fa-power-off" aria-hidden="true"></i>LOGOUT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="content-wrapper">
    <div class="container-fluid" style = "position:relative; top:50px; padding-top: 10px;">
     <div class="row">
        <div class="col-md-7">
          <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4 md-4">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-rupee-sign"></i>
              </div>
              <div class="mr-5"><?php 
              $s1="select sum(amount) from account";
              $da= mysqli_query($conn,$s1);
              $dat=mysqli_fetch_assoc($da);
              echo $dat['sum(amount)'];
              ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" href="/project/account.php">
              <div class="float-left">View Details</div>
              <div class="float-right">
                <i class="fa fa-angle-right"></i>
              </div>
            </a>
          </div></div>
      <div class="col-xl-4 col-sm-6 mb-4 md-4">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-check-circle"></i>
              </div>
              <div class="mr-5"><?php  $date=date("Y-m-d");
              $s2="SELECT count(username) from user WHERE duedate >= '$date'";
              $da1= mysqli_query($conn,$s2);
              $dat1=mysqli_fetch_assoc($da1);
              echo $dat1['count(username)']; ?> Active Users</div>
            </div>
           </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-4 md-4">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-exclamation-circle" ></i>
              </div>
              <div class="mr-5"><?php $date=date("Y-m-d");
              $d= date('Y-m-d', strtotime($date. ' + 7 days'));
              $s4="SELECT count(*) FROM `user` WHERE duedate <= '$d' AND duedate >= '$date'";
              $da3= mysqli_query($conn,$s4);
              $dat3=mysqli_fetch_assoc($da3);
              echo ($dat3['count(*)']); ?> Due Dates Near </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" href="/project/duedate.php">
              <div class="float-left">View Details</div>
              <div class="float-right">
                <i class="fa fa-angle-right"></i>
              </div>
            </a>
          </div>
        </div>
   </div>
   <div class="row" style="padding-left: 10px; padding-right: 10px">
    <div class="card card-bg col-md-12" style="height: 435px;">
        <div class="card-header card-head2">Payment</div>
        <div class="card-body">
            <form method="post" action="payment.php">
            <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label >Username</label>
                <input class="form-control" type="text" name="user" aria-describedby="nameHelp" placeholder="username" required></div>
                <div class="col-md-6">
                <?php 
                        if(@$_GET['Invalidp']==true)
                        {
                    ?>
                        <div class="alert-light text-danger card-bg text-center py-3">
                            <?php echo $_GET['Invalidp'] ?></div>                                
                    <?php
                        }
                    ?></div>
              
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">            
                <label> Package </label><br>
                <select name="package" id="package" class="form-control" onchange="calpay()">
                <option>--Select--</option>
                <option > Silver </option>
                <option >Gold </option>
                <option >Platinum </option>
                </select>
             </div>   
             <div class="col-md-6">
                <label> Membership </label><br>
                <select name="membership" id="membership" class="form-control" onchange="calpay()">
                <option>--Select--</option>
                <option > Monthly </option>
                <option >Quaterly </option>
                <option >Semi-Annual </option>
                <option >Annual</option>
                </select>
              </div>
              </div></div>     
   </div>
   <div class="form-group">
    <div class="form-row">
        <div class="col-md-8">
            <label> Amount: </label>
            <input  type="text" name="amount" id="amount" placeholder="Amount" required >
         </div>
         <div class="col-md-4">
         <input type="submit" class="btn btn-dark" value="Make Payment"/>
         </div></div></div>   
</form>
</div>
</div>
</div>
       <div class="col-md-5 ">
          <div class="card bg-dark text-white scroll">
    <div class="card-header card-head">Registeration Form</div>
    <div class="card-body">
              <form method="post" action="registeration.php" onsubmit="return func()" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label >Name</label>
                <input class="form-control" name="name" type="text" aria-describedby="nameHelp" placeholder="Enter name" required>
              </div>
              <div class="col-md-6">
                <label >Username</label>
                <input class="form-control" type="text" name="user" aria-describedby="nameHelp" placeholder="username" required>
                <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="alert-light text-danger bg-dark text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
                    <?php
                        }
                    ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Password</label>
        <input class="form-control" id="password"
        name="password" type="password" aria-describedby="nameHelp" placeholder="Password" required>
              </div>
        <div class="col-md-6">
                <label >Confirm Password</label>
                <input class="form-control" id="conpass" type="password" placeholder="Confirm Password" required>
              </div>
          <div id="password_error"></div>    
            </div>
          </div>
      <div class="form-group">
      <div class="form-row">
      <div class="col-md-6">
                          <label >Gender</label> <br>
                          <input class="bg-gray" name="gender" type="radio" id="male" value="male" onclick="cal()" required/>MALE 
                          <input class="bg-gray" name="gender" type="radio" id="female" value="female" onclick="cal()" required/>
                          FEMALE
                         </div>
                        
      <div class="col-md-6">
                          <label class="sidebar-text">Age</label>
                           <input
                            type="text" class="form-control" name="age" id="age" onkeyup="cal()" placeholder="Age" required/> 
                        </div>
           </div> </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label >Weight</label>
        <input class="form-control" id="weight" type="number" name="weight" onkeyup="cal()" aria-describedby="nameHelp" placeholder="Weight" required>
              </div>
        <div class="col-md-6">
                <label >Height</label>
                <input class="form-control" id="height" Name="height" onkeyup="cal()" type="number" placeholder="Height">
              </div>
              </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label >BMI</label>
        <input class="form-control" id="bmi" type="text" name="bmi" aria-describedby="nameHelp" placeholder="Body Mass Index" >
              </div>
        <div class="col-md-6">
                <label >Body Fat Percent</label>
                <input class="form-control" id="bodyfat" Name="bodyfat"  type="text" placeholder="Body Fat">
              </div>
              </div>
          </div>
         <div class="form-group">
            <label>Address</label> <br>
            <input class="form-control" type="text" name="address" class="textInput" placeholder="Address" required> 
       </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
               <label>Contact Number</label> <br>
               <input type="hidden" id="jdate" name="jdate"/>
            <input class="form-control" type="text"  name="contact" id="contact" placeholder="Contact number" required>
            <div id="contact_error"></div>
              </div>
        <div class="col-md-6">
                <label>Email</label> <br>
            <input class="form-control" type="email"  name="email" id="email" placeholder="Email" required>
            <div id="email_error"></div>
              </div>
              
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Register">
        </form>
   </div>
  </div>
        </div>
      </div>
    </div>
</body>
<script>
function calpay() {
            var package = document.getElementById('package').value;
            var membership = document.getElementById('membership').value;
            var amt;
            if(package==='Silver'){
                if(membership==='Monthly')
                   {amt=999;                   
                    }
                if(membership==='Quaterly')
                   { amt=2799; 
                    }
                if(membership==='Semi-Annual')
                   { amt=5599; 
                    }
                if(membership==='Annual')
                   { amt=11899; 
                    }
                }
                else  if(package==='Gold'){
                if(membership==='Monthly')
                   {amt=1499;
                    }
                if(membership==='Quaterly')
                   { amt=4299; 
                    }
                if(membership==='Semi-Annual')
                   { amt=8599; 
                    }
                if(membership==='Annual')
                   { amt=17499; 
                    }
                }
                else  if(package==='Platinum'){
                if(membership==='Monthly')
                   {amt=1999;
                     }
                if(membership==='Quaterly')
                   { amt=5900; 
                    }
                if(membership==='Semi-Annual')
                   { amt=11699; 
                    }
                if(membership==='Annual')
                   { amt=23599; 
                    }
                }
 if(amt){
 document.getElementById('amount').value=amt;
}        }   
function myFunction() {
  var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
today = yyyy + '/' + mm + '/' + dd ;
document.getElementById('jdate').value= today;
document.getElementById('jdate').placeholder= today;
}
function cal() {
            var weight = document.getElementById('weight').value;
            var height = document.getElementById('height').value;
            var result = (parseInt(weight) / (parseInt(height)*parseInt(height)))*10000;
            var age = document.getElementById('age').value;
            if (!isNaN(result)) {
                document.getElementById('bmi').value = result;
                }
           if(document.getElementById("male").checked){
              var fat =(1.20 * result)+(0.23* parseInt(age))-10.8-5.4;
              if(!isNaN(fat)){
              document.getElementById('bodyfat').value = fat;}
           }    
           else{ if(document.getElementById("female").checked){
             var fat =(1.20 * result)+(0.23* parseInt(age))-5.4;
              if(!isNaN(fat)){
              document.getElementById('bodyfat').value = fat;}
           }    }
        }
function func(){
     var pass= document.getElementById('password').value;
     var conpass= document.getElementById('conpass').value;
     var email= document.getElementById('email').value;
     var contact= document.getElementById('contact').value;
       if(pass!=conpass){
        document.getElementById('password_error').innerHTML =" ** Password does not match the confirm password";
        return false;
      }
      
      if(isNaN(contact)){
        document.getElementById('contact_error').innerHTML =" ** user must write digits only not characters";
        return false;
      }
      if(contact.length!=10){
        document.getElementById('contact_error').innerHTML =" ** Mobile Number must be 10 digits only";
        return false;
      }
      if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){
        document.getElementById('email_error').innerHTML =" ** . Invalid Position";
        return false;
      }
}        
</script>
</html>
<?php    }
    else
    {
        header("location:index.php");
    }
 
?>
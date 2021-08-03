<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","project");
    if(isset($_SESSION['User']))
    {   $dat=date("Y-m-d");
        $hello=$_SESSION['User'];
        $query="SELECT * from user where username='".$_SESSION['User']."'";
        $result=mysqli_query($conn,$query);
        $due=mysqli_fetch_assoc($result);
            $dd=$due['duedate'];
        $query2="SELECT `date`  FROM `$hello` ORDER BY date DESC LIMIT 1";
          $result2=mysqli_query($conn,$query2);
          $wdate=mysqli_fetch_assoc($result2);
           $ndate=date('Y-m-d', strtotime($wdate['date']. ' + 7 days'));
        $query3="SELECT 'true' from $hello  where EXISTS (SELECT `weight` FROM `ap001` WHERE date='$ndate')";
           $result3=mysqli_query($conn,$query3);
           $check=mysqli_fetch_assoc($result3);
            $c=$check['true'];
            if($c=='')
            $c= "false";
        $ddat=date('Y-m-d', strtotime($dat. ' + 3 days'));
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
.card-bg{
    background-color: #fed136;
}
.card-head2 {
    color: ##343a40;
    font-family: 'Kaushan Script',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
    font-size: 20px;
    text-align: left;
}
.card-b{    font-family: "Segoe UI Symbol";
    font-weight: 400;
    line-height: 1.5;
    text-align: right;
}
.chart-container{
    align-items: center;
    width: 75%;
    height: auto;
}
</style>
        <script>
            function pack(){
            <?php
            if($c!="true"){if((strtotime($ndate))<=(strtotime($dat))){ ?>
                var da="<?php echo $ndate; ?>";
                var weigh = prompt("Weight");
                if(weigh){
                document.getElementById("weigh").value = weigh;
                document.getElementById("date").value = da;
                document.getElementById("form").submit();
                  }  <?php }} ?>
            <?php 
             if((strtotime($dd))<=strtotime($ddat)){
            ?> var c=" <?php echo"Due Date is near Make Payment to avoid discontinuation" ;?> ";   
               alert(c);
            <?php
            }?>  
            var b= "<?php echo $due['package']; ?>";
            var x = document.getElementById("mySelect");
            var option = document.createElement("option");
            var option2 = document.createElement("option");
            var option3 = document.createElement("option");
            var option4 = document.createElement("option");
            if(b==="Gold")
                   {option.text = "Zumba";
                    x.add(option);
                    option2.text="Yoga";
                    x.add(option2);}
                    if(b==="Platinum")
                    {option.text = "Zumba";
                    x.add(option);
                    option2.text="Yoga";
                    x.add(option2);
                    option3.text = "Spa";
                    x.add(option3);
                    option4.text="Massage";
                    x.add(option4);
                    }
            }
            
            function random_function()
            {   
                var a=document.getElementById("mySelect").value;
                if(a==="Weight Training")
                {
                    var arr=["Abhishek","Neeraj Kumar","Sarita"];
                }
                else if(a==="Cardio Training")
                {
                    var arr=["Shamlal","Sushma","Mahesh"];
                }
                else if(a==="Zumba")
                {
                    var arr=["Vinay"];
                }
                else if(a==="Yoga")
                {
                    var arr=["Sudheer"];
                }
                else if(a==="Spa")
                {
                    var arr=["Puneet"];
                }
                else if(a==="Massage")
                {
                    var arr=["Nirmala"];
                }
                var string="";
                
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option>"+arr[i]+"</option>";
                }
                string="Trainer:     <select name='trainer'>"+string+"</select>";
                document.getElementById("output").innerHTML=string;
            }
            function func(){
                var h=document.getElementById("hr").value;
                var m=document.getElementById("min").value;
                var a1=document.getElementById("a").value;
                var str=h+":"+m+" "+a1;
                var tim= new Date();
               var min= tim.getMinutes();
                if(tim.getHours()>12)
                { var hr=tim.getHours()-12;
                    var a="pm";
                }else {var hr=tim.getHours();
                      var a="am";}
                   var str2=hr+":"+min+" "+a;
                   var n = str.localeCompare(str2);
                   if(n<=0){
                    var aq=" ** Selected time less than current time";
                    alert (aq);
                    return false;
              }     }
      </script>
</head>
<body onload="pack()">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="max-height: 50px;" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Gymitron</a>
      <a class="navbar-toggler navbar-toggler-right" href="logout.php?logout" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Logout
        <i class="fas fa-power-off"></i>
      </button>
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
  <div class="content-wrapper" >
    <div class="container-fluid" style = "position:relative; top:50px; padding-top: 10px;">
      <div class="row">
        <div class="col-md-8">
            <div class="row" style = " padding-bottom:10px;">
                <div class="card  col-md-12" style="height: 70%;">
        <div class="card-header card-head2">PROGRESS</div>
        <div class="card-body">
            <div class="chart-container" >
            <canvas id="mycanvas" ></canvas></div>
        </div></div>
            </div>
            <div class="row">
          <div class="card card-bg col-md-12" style="height: 30%;" >
        <div class="card-header card-head2">WORKOUT SLOTBOOKING</div>
        <div class="card-body">
          <form  action="slot.php" method="post" onsubmit="return func()">
            <div class="row">
            <div class="col-md-6">Workout Type:
       <select id="mySelect" name="workouttype" onchange="random_function()">
             <option>--Select--</option>
             <option>Weight Training</option>
             <option>Cardio Training</option>
             </select>      
        <div id="output">
          </div></div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="row">
        <select id="hr" name="hr">
            <option>hr</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
            <option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
            <option>11</option><option>12</option>
        </select>
        <select id="min" name="min">
            <option>min</option><option>00</option><option>15</option><option>30</option><option>45</option>
        </select>
        <select id="a" name="a">
            <option>select</option><option>am</option><option>pm</option>
        </select>
        </div>
        <div class="row">
        <input type="submit" class="btn btn-dark" value="Book a slot"/></div></div></div></div>
    </form>
           </div>
        </div></div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
         <img class="img-fluid" src="img/user.jpg" alt="">
            </div>
        </div>
      </div>
    </div></div>
    <form action="text.php" method="post" id="form">
    <input type="hidden" id="weigh" name="weigh" />
    <input type="hidden" name="date" id="date"/>
    </form>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/graph.js"></script>
    </body>
    </html>
<?php
    }
    else
    {
        header("location:index.php");
    }
 
?>
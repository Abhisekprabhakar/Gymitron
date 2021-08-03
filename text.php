<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
$uname=$_SESSION['User'];
$query="SELECT * from user where username='".$_SESSION['User']."'";
        $result=mysqli_query($conn,$query);
        $due=mysqli_fetch_assoc($result);
$jdate=$_POST['date'];
$weight=$_POST['weigh'];
$height=$due['height'];
$age=$due['age']; 
$gender=$due['gender'];
$sql3="INSERT INTO $uname(`date`,`weight`) VALUES ('$jdate','$weight')";
mysqli_query($conn,$sql3);
 $bmi=($weight/($height*$height))*10000;
 if($gender=="male"){
 $fat =(1.20 * $bmi)+(0.23* $age)-10.8-5.4;
                   }    
                  else{ if($gender=="female"){
                    $fat =(1.20 * $bmi)+(0.23* $age)-5.4;
                      }}
$sql4="UPDATE `user` SET `weight`='$weight',`bmi`='$bmi',`bodyfat`='$fat' WHERE `username`='$uname'"; 
mysqli_query($conn,$sql4);
            
           header("Location:http://localhost/project/user.php");
           

?>
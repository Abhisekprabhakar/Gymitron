
<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");
$uname=$_POST["user"];
$pass=$_POST["password"];
$name=$_POST["name"];
$address=$_POST["address"];
$weight=$_POST["weight"];
$height=$_POST["height"];
$age=$_POST["age"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$jdate=$_POST["jdate"];
$package="Silver";
$_gender=$_POST["gender"];
$membership="Monthly";
$bmi=$_POST["bmi"];
$bodyfat=$_POST["bodyfat"];
$ddate= date('Y-m-d', strtotime($jdate. ' + 3 days'));
$s= "select * from user where username='$uname'";
$result= mysqli_query($conn,$s);

$num=mysqli_fetch_array($result);

if($num == true){
	header("location:admin.php?Invalid= User Name Already Exists ");
}
else{
	header("location:admin.php?done= Member registered");
$sql2='CREATE TABLE '.$uname.'(id int(5), date date, weight varchar(5))';
$sql3="INSERT INTO $uname(`date`,`weight`) VALUES ('$jdate','$weight')";
$sql="INSERT INTO `user` (`name`, `username`, `password`, `email`, `contact`, `age`, `gender`, `address`, `weight`, `height`, `package`, `member`, `jdate` ,`bmi`,`bodyfat`,`duedate`) VALUES ('$name','$uname','$pass','$email','$contact ','$age','$_gender','$address','$weight','$height','$package','$membership','$jdate','$bmi','$bodyfat','$ddate');";

mysqli_query($conn,$sql);
mysqli_query($conn,$sql2);
mysqli_query($conn,$sql3);
}

?>
<?php
session_start();
$conn = mysqli_connect("localhost","root","","project");

if(isset($_POST['login']))
    { 
       if(empty($_POST['uname']) || empty($_POST['pass']))
       {
            header("location:index.php?Empty= Please Fill in the Blanks");
       }
       else
       {  if(($_POST['uname']=="admin")&&($_POST['pass']=="admin")){
            $query="select * from user where username='".$_POST['uname']."' and password='".$_POST['pass']."'";
            $result=mysqli_query($conn,$query);
			
			
           if(mysqli_fetch_assoc($result))
            {
            $_SESSION['User']=$_POST['uname'];
             header("location:admin.php");
            }
            else
            {
                header("location:index.php?Invalid= Please Enter Correct User Name and Password ");
            }}
          else{ $dat=date("Y-m-d");

          	$query="select * from user where username='".$_POST['uname']."' and password='".$_POST['pass']."'";
            $result=mysqli_query($conn,$query);
 				$due=mysqli_fetch_assoc($result);
           if($due)
            { 
              if(strtotime($due['duedate'])>=strtotime($dat)){
                $_SESSION['User']=$_POST['uname'];
                header("location:user.php");}
                else{header("location:index.php?Invalid= Pay the dues ");}
            }
            else
            {
                header("location:index.php?Invalid= Please Enter Correct User Name and Password ");
            }}
          }  
       }
     
?>
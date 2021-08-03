<?php
header('Content-Type: application/json');
$conn = mysqli_connect("localhost","root","","project");
$query="SELECT `date`, `weight` FROM `ap001` ORDER BY 'date'";
$result= mysqli_query($conn,$query);
$data=array();
foreach($result as $row){
	$data[]=$row;
}
print json_encode($data);
?>






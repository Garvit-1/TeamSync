<?php 

session_start()
?>

<?php
 $profile=$_SESSION['user'];
 if($profile==true){

 }
 else{
    header('location:login.html');
 }

$server = "localhost";
$username= "root";
$password="";
$dbname="ems";
$con = mysqli_connect($server ,$username , $password,$dbname);
if(!$con){
    die("Connection failed due to". mysqli_connect_error());
}
$day1 = date('Y-m-d',strtotime($_POST["from"]));
$day2 = date('Y-m-d',strtotime($_POST["to"]));
$reason=$_POST["reason"];
if(isset($_POST)){
$uname=$_SESSION['user'];
$sql= "INSERT INTO leave2(username,Reason,Startdate,Enddate,Status) VALUES ('$profile','$reason','$day1','$day2',NULL)";



if ( $con->query($sql)) {
    echo "Leave applied Succesfully";
  } else {
    echo " Failed"; //will  never be displayed
  }
$con->close();
}
?>


<?php
$server = "localhost";
$username= "root";
$password="";
$dbname="ems";
$con = mysqli_connect($server ,$username , $password,$dbname);
if(!$con){
    die("Connection failed due to". mysqli_connect_error());
}
// $fname =$lname= $email = $uname = $pwd = $website = "";
echo "Connection Successfull to db";

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$uname=$_POST['username'];
$pwd=$_POST['pwd'];
$dob=$_POST['dob'];
$mob=$_POST['mob'];
$post=$_POST['post'];
$exp=$_POST['exp'];
$branch=$_POST['branch'];
$addr=$_POST['addr'];
$sql= "INSERT INTO ed(fname, lname, email,username,pwd,dob,mob,post,exp,branch,addr)
VALUES ('$fname', '$lname', '$email','$uname','$pwd',$dob,$mob,'$post',$exp,'$branch','$addr')";
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$con->close();
?>


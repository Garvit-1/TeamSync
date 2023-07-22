<?php
session_start();
?>
<?php 
$server = "localhost";
$username= "root";
$password="";
$dbname="ems";
$con = mysqli_connect($server ,$username , $password,$dbname);
if(!$con){
    die("Connection failed due to". mysqli_connect_error());
}

if(isset($_POST)){
    $uname=$_POST['username'];
    $pass=$_POST['pwd'];
    $sql= "Select * from ed where username='".$uname."' and pwd='".$pass."'";
    $result=$con->query($sql);
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    $post=$row['post'];
    if ( $count==1) {
        session_start();
        $_SESSION['user']=$uname;
        setcookie("post",$post);
        header('location:display.php');
    }
    else{
        // header('location:login.php');
    }

}
?>
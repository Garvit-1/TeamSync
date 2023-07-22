<!DOCTYPE html>
<html lang="en">
<?php
session_start();
// echo $_COOKIE['post'];
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

$sql= "Select * from leave2 ";
$result=$con->query($sql);
$count=mysqli_num_rows($result);

// if ($count) {
    $row=mysqli_fetch_assoc($result);
    $user=$row['username'];
    $reason=$row['reason'];
    $day1=$row['Startdate'];
    $day2=$row['Enddate'];
//   } else {
//     echo "Login Failed"; //will  never be displayed
//   }

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My-Page</title>
    <link rel="icon" type="image/ico" href="img\android-chrome-512x512.png" >
    <style>
        * {
            margin: 0px;
            padding: 0px;

        }

        header {
            height: 10vh;
            background: black;
        }

        header a {
            float: left;
            color: white;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 17px;
        }

        header a:hover {
            background-color: #ddd;
            color: black;
        }

        main {
            height: 80vh;
            padding: 20px;
            background-image: url("img/bgimage.webp");
            background-size: cover;
            background-repeat: no-repeat;
        }
        .btn {
            height: 30px;
            width: 70px;
            background: #00b8ff8f;
            border-radius: 5px;
            cursor: pointer;
        }
        .table, th, td {
            border: 1px solid;
            border-collapse: collapse;
            margin: 10px;padding: 10px;
        }
        th, td {
  padding: 15px;
  text-align: left;
}
        footer {
            height: 5vh;
            background: black;
            color: white;
            text-align: center;
        }

        .fin {
            height: 20px;
            border-radius: 5px;

        }
    </style>
</head>

<body>

    <header>
        <ul>
            <a href="home.html"> Home </a>
            <a href="logout.php"> Signout </a>
            <!-- <a href="#"> <img src="#" alt="Your photo"> </a> -->
            <ul>
    </header>
    <main>
    <h1>Leave Response</h1><br>
    <form id="leave" onSubmit="return validateForm()" name="leave" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="Post">
        <br>
        <table class ='table'>
                <tr>
                    <th>ID</th>
                    <th>Reason</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Action</th>
                </tr>

            <tr>
                <td><?php echo $user?></td>
                <td><?php echo $reason?></td>
                <td><?php echo $day1?></td>
                <td><?php echo $day2?></td>
                <td><input type='radio' id='app' name='status' value='Approved'>
                <label for='app'>Approve</label>
                <input type='radio' id='den' name='status' value='Denied'>
                <label for='den'>Deny</label><br></td>
                </tr>
        </tr>
        </table>
        <input class="btn" type="submit" value="Submit">
    </form>
</main>
    <footer>
        <h> Copyrights &copy Company</h>
    </footer> 
<?php
if(isset($_POST)){
    $status="Approved";
    if($status=="Approved"){
    $sql= "Update leave2 SET Status='Approved'";
    $con->query($sql);
}
if($status=="Denied"){
    $sql= "Update leave2 SET Status='Denied'";
    $con->query($sql);
}
    
    if ( $result) {
        echo "updated";
      } else {
        echo "Login Failed"; //will  never be displayed
      }
    $con->close();
    }

?>

</body>
</html>

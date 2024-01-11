<?php
include_once 'database.php';
session_start();
if (!(isset($_SESSION['email']))) {
    header("location:Login.php");
} else {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    include_once 'database.php';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <link rel="stylesheet" typr="text/css" href="./css/Welcome.css">
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="#">Online Quiz System</a></div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <li><a href="Welcome.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li style="margin-left:90px;" class="logout">
                    <?php echo ''; ?> <a href="logout.php?data=Welcome.php"><span class="glyphicon glyphicon-log-out"
                            aria-hidden="true">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div style="margin-top:10vh;margin-left:100px;">
        <h2 style="color:white;">Welcome to Dashboard

        </h2>
    </div>

    <center>

        <div class="panel" style="text-align:left;width:35vw;height:30vh;
        margin-top:10vh;border-radius:10px;">

            <h3 class>Start taking Quiz</h3><br>
            <a href="quiz.php" class="startButton" style="background-color: rgb(7, 176, 86);color: #000000;
  text-decoration: none;
  font-size: 18px;
  font-weight: 500;
  padding: 9px 15px;
  border-radius: 5px;
  transition: all 0.3s ease;">Start</a>

        </div>
    </center>

</body>

</html>
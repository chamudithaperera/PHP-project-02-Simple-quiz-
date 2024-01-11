<?php
require_once("database.php");
require_once("function.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="./css/result.css">

    <title>Quiz</title>

</head>

<body>


    <nav>
        <div class="wrapper">
            <div class="logo"><a href="#">Online Quiz System</a></div>
            <input type="radio" name="slider" id="menu-btn">
            <input type="radio" name="slider" id="close-btn">
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li style="margin-left:90px;" class="logout">
                    <?php echo ''; ?> <a href="logout.php?data=Welcome.php"><span class="glyphicon glyphicon-log-out"
                            aria-hidden="true">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <br>

    <div style="margin-top:20vh;">
        <?php if ($_SESSION['attempted'] == 0): ?>
            <div class="score2">
                <div>
                    <h5>No Question Attempted</h5>
                    <button class="scoreButton">You Score is :
                        <?php echo $_SESSION['score']; ?>
                    </button>
                </div>
            </div>

        <?php else: ?>
            <div class="score2" style="width:1000px;height:40vh;">
                <div class="">
                    <h5 class="">You have attempted
                        <?php echo $_SESSION['attempted']; ?> out of
                        <?php echo totalquestion($conn); ?>
                    </h5><br>
                    <button class="reattemptButton" style="border:0;">You Score:
                        <?php echo $_SESSION['score']; ?>
                    </button><br><br>
                    <span>Answered
                        <?php echo $_SESSION['score']; ?> Questions Successfully!
                    </span>
                </div>
            </div>

        <?php endif ?>
        <br>
        <div class="score1">
            <div class="card-body">
                <a class="reattemptButton" href="quiz.php">Reattempt Quiz</a>
            </div>
        </div>
    </div>
</body>

</html>
<?php
require_once("database.php");
require_once("function.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" type="text/css" href="quiz.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <form action="checkanswer.php" method="post">
        <?php
        for ($i = 1; $i <= totalquestion($conn); $i++):
            $sql = "SELECT * FROM questions where qid = $i";
            $result = mysqli_query($conn, $sql);
            ?>
            <div class="container1">
                <?php
                while ($row = mysqli_fetch_assoc($result)):
                    $sql = "SELECT * FROM answers where ans_id = $i";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <h5>Q.
                        <?php
                        echo $row['qid'] . " " . $row["question"];
                        ; ?>
                    </h5>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <div>
                            <input type="radio" name="checkanswer[<?php echo $row['ans_id']; ?>]" value="<?php
                               echo $row['aid']; ?>">
                            <?php
                            echo $row['answer']; ?>
                        </div>
                    <?php endwhile ?>
                </div>
            <?php endwhile ?>
        <?php endfor ?>
        <div class="container2">
            <button type="submit" class="btnsubmit" name="answer-submit">Submit Answers</button>
        </div>
    </form>

</body>

</html>
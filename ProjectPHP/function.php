<?php
function totalquestion($conn)
{
    $sql = "SELECT * FROM questions";
    $result = mysqli_query($conn, $sql);

    return mysqli_num_rows($result);
}


?>
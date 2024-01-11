<?php
session_start();
if (isset($_SESSION['email'])) {
    session_destroy();
    $ref = @$_GET['data'];
    header("location: $ref");
}
?>
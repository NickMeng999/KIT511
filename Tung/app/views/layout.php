<?php
ini_set('display_errors',0);

if (!isset($_SESSION["username"])) {
    session_destroy();
}

include "./routes.php";
?>
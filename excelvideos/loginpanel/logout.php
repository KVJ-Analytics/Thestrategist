<?php
include("db_connect.php");
unset($_SESSION['admlogin']);
unset($_SESSION['admuserid']);
unset($_SESSION['admuname']);
unset($_SESSION['lastvisited_date']);
unset($_SESSION['lastvisited_ip']);
unset($_SESSION['usertype_id']);
header('Location:'."index.php");

?>

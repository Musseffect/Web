<?php
session_start();
header('Location: main.php');
session_destroy();  
?>
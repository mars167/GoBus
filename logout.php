<?php
require_once 'function.php';
session_start();
if(isset($_SESSION['username'])){
   destorySession();

    header("Location:index.php");
   exit();
}
?>
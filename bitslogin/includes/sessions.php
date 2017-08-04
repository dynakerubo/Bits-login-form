<?php
require('includes/connection.php');

session_start();

function logged_in()
{

	return isset($_SESSION['username']);
}


function confirm_logged_in(){

if(!isset($_SESSION['username'])){
      header("Location:login.php");
      }
}
?>
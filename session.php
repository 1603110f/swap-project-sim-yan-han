<?php
   include('db_connect.inc.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT * from employee_info where employee_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['employee_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location: login.php");
   }
?>
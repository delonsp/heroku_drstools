<?php 

session_start();     
     

if(isset($_POST['login'], $_POST['pass']) || isset($_SESSION['login'], $_SESSION['pass'])) {
    $con = connect();
    if(isset($_SESSION['login'], $_SESSION['pass'])) {
        $email = mysqli_real_escape_string($con, $_SESSION['login']);
        $pass = mysqli_real_escape_string($con, $_SESSION['pass']);
        
    } else {
        $email = mysqli_real_escape_string($con, $_POST['login']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
    }

    $query1 = "SELECT COUNT(`$userId`) FROM $tabelaUser WHERE `$userEmail` = '$email' AND `$userPass` = '$pass'";
    
    $users = mysqli_query($con, $query1);
    $total = my_mysqli_result($users,0); // from connectMedic.php
    
    if ($total ==1) {
        
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['pass'] = $_POST['pass'];
        
    }
    
    if(isset($_SESSION['last_ip']) === false) {
        $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
        
    }
    
    if($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {
        
        session_unset();
        session_destroy();  
    }
}

 ?>
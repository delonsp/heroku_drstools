<?php 

session_start();

if(isset($_POST['login'], $_POST['pass']) || isset($_COOKIE['login'], $_COOKIE['pass'])) {

    $con = connect($DB);

    if(isset($_COOKIE['login'], $_COOKIE['pass'])) {
        $email = mysqli_real_escape_string($con, $_COOKIE['login']);
        $pass = mysqli_real_escape_string($con, $_COOKIE['pass']);
        
    } else {
        $email = mysqli_real_escape_string($con, $_POST['login']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
    }
    
    $query1 = "SELECT COUNT(`user_id`) FROM $tabelaUser WHERE `user_email` = '$email' AND `user_password` = '$pass'";
    
    $users = mysqli_query($con, $query1);
    $total = mysqli_num_rows($users);
    
    if ($total ==1) {
        
        setcookie('login', $_POST['email'], time() + 600);
        setcookie('email', $email, time() + 600);
        setcookie('pass', $_POST['pass'], time() + 600);
        $_SESSION['logged_in'] = 1; 
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

<!-- if(isset($_POST['login'], $_POST['pass']) || isset($_COOKIE['login'], $_COOKIE['pass'])) {
    $con = connect($DB);
    
    if(isset($_COOKIE['login'], $_COOKIE['pass'])) {
        $email = mysqli_real_escape_string($con, $_COOKIE['login']);
        $pass = mysqli_real_escape_string($con, $_COOKIE['pass']);
        
    } else {
        $email = mysqli_real_escape_string($con, $_POST['login']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
    }

    $query1 = "SELECT COUNT(`$userId`) FROM $tabelaUser WHERE `$userEmail` = '$email' AND `$userPass` = '$pass'";

    $users = mysqli_query($con, $query1);
    $total = my_mysqli_result($users,0); // from connectMedic.php
    
    if ($total ==1) {
        
        setcookie('login', $_POST['login'], time() + 600);
        setcookie('email', $email, time() + 600);
        setcookie('pass', $_POST['pass'], time() + 600);
        $_SESSION['logged_in'] = 1;
    
    }
    
    if(isset($_SESSION['last_ip']) === false) {
        $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
        
    }
    
    if($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {
        
        session_unset();
        session_destroy();  
    }
}     
     


 ?> -->
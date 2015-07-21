<?php 

session_start();     
     

if(isset($_POST['login'], $_POST['pass']) || isset($_COOKIE['login'], $_COOKIE['pass'])) {
    $con = connect();
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

        $_SESSION['logged_in'] = 1;  
        
        setcookie('login', $_POST['login'], time() + 60*60*24*10, "/");
        setcookie('pass', $_POST['pass'], time() + 60*60*24*10, "/");

        require_once(__DIR__ . '/../../src/PhpConsole/__autoload.php');

        PhpConsole\Helper::register();

        PhpConsole\Connector::getInstance()->getDebugDispatcher()->setDumper(
        new PhpConsole\Dumper(2, 10, 40) // set new dumper with levelLimit=2, itemsCountLimit=10, itemSizeLimit=10

        PC::debug($_POST['login']);
        PC::debug($_COOKIE['login']);
);

       
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
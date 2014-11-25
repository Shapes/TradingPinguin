<?php
session_start();
	unset($_SESSION['user']);
        if(isset($_GET['x'])){
            setcookie("prijava", "", time()-86400, "/");
            echo "Odjavljen in zbrisan piskot!<br />";
        }else{
            echo "Odjavljen!<br />";
        }
    	$url="/TradingPinguin/index.php";
        $cas=0;
        header("Refresh: $cas; $url");
	exit();
?>
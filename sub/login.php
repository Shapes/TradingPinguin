<?php
include_once "baza.inc.php";
session_start();

if(isset($_POST['prijava'])){
    if ($_POST['username']=="" || $_POST['x']==""){
        echo "<spam> Niste vpisali vseh podatkov</spam>";
    }
    else{
        $uime = $_POST['username'];
        $geslo = md5($_POST['x']);
        
        $sql = mysql_query("SELECT password FROM User WHERE email='$uime'");
        list($geslo_baza) = mysql_fetch_row($sql);
        if ($geslo == $geslo_baza){
            $_SESSION['user'] = $uime;
            setcookie("prijava", $uime, time()+86400, "/");
            echo "<spam>Prijavljen kot <b>" . $uime . "</b></spam>";
            $url="/TradingPinguin/index.php";
            $cas=0;
            header("Refresh: $cas; $url");
            exit();
        }
        else{
            echo "<spam>Geslo in/ali uporabniško ime je nepravilno</spam>". $uime . $geslo;
        }
    }
}else{
    echo "<spam>Napaka pri obrazcu.</spam>";
}
?>
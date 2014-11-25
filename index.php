<?php ob_start(); ini_set('display_errors', -1); session_start();
    if(isset($_COOKIE['prijava'])){
        $_SESSION['user'] = $_COOKIE['prijava'];
    }
?>
<!doctype html>
<html lang="sl">
<head>
  <meta charset="utf-8">

  <title>Penguin Trding</title> <!-- Islandski:Menjava -->
  <meta name="description" content="Its web page where you can change material thing or services online.">
  <meta name="author" content="Marko Balažic">
    
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/tipsy.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="photos/ikona.png">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/main.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
    
  <script type='text/javascript' src='js/jquery.tipsy.js'></script>
  <script type='text/javascript'>
	 $(function() {
	   $('a[rel=tipsy]').tipsy({fade: true, gravity: 'sw'});

	   $('#page').tipsy({gravity: 'sw'});
       $('#rateUser').tipsy({gravity: 'sw'});
	 });
  </script>
</head>
<body>
<?php
    include_once "sub/baza.inc.php";
?>
    <header>
        <div class="header_wrapper">
            <ul class="header_menu">
                <li class="logo"><a href="index.php"><img width="190" src="photos/logo4.png" alt=""/></a></li>
                <form method="get">
                <li class="search" >
                    <input type="text" name="search" id="input__search" placeholder="Search products ..." required>
                    <input type="submit" name="submit" id="input__button" value="Search">   
                </li>
                <li class="categories"> Categories 
                    <ul>
                        <!--
                        <?php $actual_link = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        $link = substr_replace($actual_link,"",0,37);
                            //<?php echo $link . "?id=1";
                        ?>
                        -->
                        <li><a href="?id=1"><i class="fa fa-car"></i> Motors</a></li>
                        <li><a href="?id=2"><i class="fa fa-umbrella"></i> Fashion</a></li>
                        <li><a href="?id=3"><i class="fa fa-home"></i> Home </a></li>
                        <li><a href="?id=4"><i class="fa fa-desktop"></i> Electronics</a></li>
                        
                        <li><a href="?id=5"><i class="fa fa-camera-retro"></i> Antiques</a></li>
                        <li><a href="?id=6"><i class="fa fa-refresh"></i>  Services</a></li>
                        <li><a href="?id=7"><i class="fa fa-heart-o"></i>  Jewellery</a></li>
                        <li><a href="?id=8"> Other </a></li>
                    </ul>
                </li>
                </form> 
            </ul>
        </div>
        <div class="prijava">
            <div id="hidden_1" >
            <?php
            if(isset($_SESSION['user'])){
                $uime = $_SESSION['user'];
                $sql = mysql_query("SELECT id FROM User WHERE email='$uime'");
                list($id) = mysql_fetch_row($sql);
                echo "<a href=?sub=profile&id=". $id .">User</a>";
            }else{
                echo "Guest";
            }
            ?>
            </div>
            <a href="#"><div id="gumb" class="buttonKrog"><i id ="userIcon" class="fa fa-user fa-2x"></i></div></a>
        </div>
    </header>
    <div class="telo">
        <?php
            if (isset($_GET['sub']))
			     if(file_exists ("sub/".$_GET['sub'].".php"))
				    include_once "sub/".$_GET['sub'].".php";
			     else
				    include_once "sub/main.php";
		     else
			     include_once "sub/main.php"; 
        ?>
    </div>
    <footer><br /><a href="http://www.markobalazic.com" id="page" title="My Portfolio page" >Marko Balažic</a> - Predmet: Spletno programiranje 
        <span style="float: right; margin-right: 5px; margin-top: -13px;"><a href="#top"><i style="color:#34495e" class="fa fa-arrow-circle-up fa-2x"></i></a></span>
    </footer>
</body>
</html>
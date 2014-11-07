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
    <header>
        <div class="header_wrapper">
            <ul class="header_menu">
                <li class="logo"><a href="index.php"><img width="190" src="photos/logo4.png" alt=""/></a></li>
                <li class="search" >
                <form>
                    <input type="text" id="input__search" placeholder="Search products ..." required>
                    <input type="button" id="input__button" value="Search">
                </form>    
                </li>
                <li class="categories"> Categories 
                    <ul>
                        <li><a href="#"><i class="fa fa-car"></i> Motors</a></li>
                        <li><a href="#"><i class="fa fa-umbrella"></i> Fashion</a></li>
                        <li><a href="#"><i class="fa fa-home"></i> Home </a></li>
                        <li><a href="#"><i class="fa fa-desktop"></i> Electronics</a></li>
                        
                        <li><a href="#"><i class="fa fa-camera-retro"></i> Antiques</a></li>
                        <li><a href="#"><i class="fa fa-refresh"></i>  Services</a></li>
                        <li><a href="#"><i class="fa fa-heart-o"></i>  Jewellery</a></li>
                        <li><a href="#"> Other </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="prijava">
            <div id="hidden_1" >Login</div>
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
    <footer><a href="http://www.markobalazic.com" id="page" title="My Portfolio page" >Marko Balažic</a> - Predmet: Spletno programiranje 
    </footer>
</body>
</html>
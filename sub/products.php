<?php

    $id=$_GET['id'];
    $query = "SELECT * FROM Products WHERE id = '$id' ";
    $sql = mysql_query($query);
    $podatki = mysql_fetch_row($sql);
    
?>
<div class="chunk">
		<div class="boxP1">
			<img id="prod_photo" src="products/avto.jpg" alt="x" >
		</div>
		<div class="boxP2">
			<h2><?php echo $podatki[1]; ?></h2>
			Uploaded by: Marko Balažic<br />
            Category: <?php echo $podatki[5]; ?><br />
			Location: Ljubljana<br />
            Admin rating:
			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><br />
            <?php 
            if(isset($_SESSION['user'])){
            $query = "SELECT email FROM User WHERE id = '$podatki[2]' limit 1";
            $sql2 = mysql_query($query);
            $uime = mysql_fetch_row($sql2);
            ?>
			 <div class="tradeButton"><a href="mailto:<?php echo $uime[0]; ?>?subject=I want to trade your product.">Trade</a></div>
            <?php } ?>
		</div>
	</div>
	<div id="gallery" class="shadow">
		<img src="products/01/1.jpg" alt="products1" class='show'>
        <img src="products/01/2.jpg" alt="products2" >
        <img src="products/01/3.jpg" alt="products3" >
        <img src="products/01/4.jpg" alt="products4" >
    </div>
    <p id="gallery_controls">
      <span class="selected">Street</span>
      <span>Home</span>
      <span>Highway</span>
      <span>Street</span>
    </p>
	<div class="chunk desc">
        <h2>Description</h2>
        <?php echo $podatki[3]; ?>
	</div>

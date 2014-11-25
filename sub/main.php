<?php 
    $arr = array();

    $poizvedba = "SELECT id, name, photo FROM Products";
    /*
    if(isset($_POST["search"])){
        $idg = $_POST['category'];
        $ser = $_POST['search']
        $poizvedba = $poizvedba ." WHERE idCategory = " . $idg;
        if($ser != ""){
            $poizvedba = $poizvedba ." AND name= %".$ser."%";     
        }
    }
    */
    $result = mysql_query($poizvedba) or die(sprintf('MySQL error %d (%s).',mysql_errno(), mysql_error()));	    
    $stevec=0;
    while( $row = mysql_fetch_row( $result ) ){
        $line = ''; $i=0;
        foreach( $row as $value ){  
            $line[$i] = $value;
            $i=$i+1;
        }
        $i=0;$data[$stevec] = $line;$stevec++;
    }
  //}
?>

<div id="label-view">all categories<i class="fa fa-angle-down"></i></div>
        <div class="row left_row">
            <?php
            for($i=0; $i<$stevec; $i++){
            ?>
            <div id="selected" class="module">
                <img class="module__photo" src="products/avto.jpg" alt="nekaj" />
                <div class="module__content">
                    <a class="exit" href="#"><i class="fa fa-times"></i></a>
                    <h2><?php echo $data[$i][1]; ?></h2>
                    <hr/>
                    <br />
                    <div class="module__button">
                        <a href="?sub=products&id=<?php echo $data[$i][0]; ?>" class="info">View</a>
                    </div>
                </div>
                
            </div>
            <?php } ?>
        </div>
        <div class="row middle_row">
            <?php
            for($i=2; $i<$stevec; $i+=3){
            ?>
            <div id="selected" class="module">
                <img class="module__photo" src="products/avto.jpg" alt="nekaj" />
                <div class="module__content">
                    <a class="exit" href="#"><i class="fa fa-times"></i></a>
                    <h2><?php echo $data[$i][1]; ?></h2>
                    <hr/>
                    <br />
                    <div class="module__button">
                        <a href="?sub=products&id=<?php echo $data[$i][0]; ?>" class="info">View</a>
                    </div>
                </div>
                
            </div>
            
            <?php } ?>
        </div>
        <div class="row right_row">
            <div id="modal" class="module modal-hidden">
                <div class="login_wrapper">
                    <?php
                    if(isset($_SESSION['user'])){
                        $uime = $_SESSION['user'];
                        echo "<br/><spam class='Eho'>Prijavljen kot <b>" . $uime . "</b><br />
                        <a href='sub/logout.php'>Odjavi me</a></spam>.<br /><a href='sub/logout.php?x=1'>Odjavi me in pobrisi piskot.</a><br />";
                    }
                    else{

                    ?>
                    <form name="prijava" method="POST" action="sub/login.php" accept-charset="utf-8">
                        <input type="email" name="username" placeholder="Email" required>
                        <input type="password" name="x" placeholder="Password" required>
                        <input type="submit" name="prijava" id="login_submit" value="Login">
                        <span>Not a member?</span><a href=""> Sign in.</a>
                    </form>
                    <?php  } ?>
                </div>
            </div>
            <?php
            for($i=1; $i<$stevec; $i+=2){
            ?>
            <div id="selected" class="module">
                <img class="module__photo" src="products/avto.jpg" alt="nekaj" />
                <div class="module__content">
                    <a class="exit" href="#"><i class="fa fa-times"></i></a>
                    <h2><?php echo $data[$i][1]; ?></h2>
                    <hr/>
                    <br />
                    <div class="module__button">
                        <a href="?sub=products&id=<?php echo $data[$i][0]; ?>" class="info">View</a>
                    </div>
                </div>
                
            </div>
            
            <?php } ?>
        </div>
        <br style="clear: both" />
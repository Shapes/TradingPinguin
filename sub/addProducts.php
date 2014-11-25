<script src="js/livevalidation.js"></script>          <!-- SKRIPTA VALIDACIJA -->
<script src="js/validate.js"></script>
<div id="add_wrapper">
<?php 
if(isset($_POST["submit"])){
	if($_POST["name"]==""){
		echo "<spam class='Eho'>Some of requested fields are empty.</spam>";
	}else{
		$current_image = $_FILES['slika']['name'];
		$extension = substr(strrchr($current_image, '.'), 1); 
		if (($extension!= "jpg") && ($extension != "jpeg")) {
			die('This type of file is not allowed.');
		}else{	
			$ime = $_POST['name'];
			$opis = $_POST['desc'];

            $uime = $_SESSION['user'];
            $sql = mysql_query("SELECT id FROM User WHERE email='$uime'");
            list($id) = mysql_fetch_row($sql);
            
			//$cena = bcadd($cena,'0',2);
			
			$size = $_POST['size']; 
			$group_id = $_POST['category'];		
			$date = date('Y-m-d H:i:s');
			$url = $ime . $extension;
			
			$weight = $_POST['weight'];
			$weight = bcadd($weight,'0',2);
			
		
			$sql = mysql_query("INSERT INTO Products (`name`, `desc`, `photo`, `idCategory`, `dodano`, `idUser`) 
			VALUES ('$ime', '$opis', '$url', '$group_id', '$date', '$id') ") or die (mysql_error());
			$product_id = mysql_insert_id();

            
			$destination="products/".$url;
			$action = copy($_FILES['slika']['tmp_name'], $destination);
			
			if (!$action) {
				die('Error in loading image.');
			}
			else{
				echo "<spam class='Eho'>Product has been added succsefully to database.</spam><br />";
                 $url="/TradingPinguin/index.php?sub=products&id=".$product_id;
                $cas=1;
                header("Refresh: $cas; $url");
                exit();
			}
			
			
			/*
			// ------------------------------------> SLIKE			
			if(isset($_FILES['files'])){
		    $errors = array();  // Naredi polje kam shrani napake
		    
			foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
			
				$file_name = $key.$_FILES['files']['name'][$key];                // Podatki o datoteki
				$file_size =$_FILES['files']['size'][$key];
				$file_tmp =$_FILES['files']['tmp_name'][$key];
				$file_type=$_FILES['files']['type'][$key];	
				
				
				$extensions = array("jpeg","jpg","png");                        // preveri vrsto datotek
				$file_ext=explode('.',$_FILES['files']['name'][$key]);
				$file_ext=end($file_ext);
				$file_ext=strtolower(end(explode('.',$_FILES['files']['name'][$key]))); 
				if(in_array($file_ext,$extensions ) === false){
					$errors[]="<p>Extension (-".$file_ext."-) for ".$file_name." not allowed!</p>";
				}
				
		          
		        $file_name=$ime."_".$key.'.'.$file_ext;	
		        $desired_dir="products/".$product_id;	
		        $file_link = "/".$desired_dir."/".$file_name;
		        $file_link2 = $desired_dir."/".$file_name;
		        $query="INSERT INTO Photos (Name_Photo, Size, Type, Link_Photo) VALUES ('$file_name','$file_size','$file_ext', '$file_link'); ";
		        
		        
		        if(empty($errors)==true){
		            if(is_dir($desired_dir)==false){
		                mkdir("$desired_dir", 0755);                 // Create directory if it does not exist
		            }
		            if(is_dir("$desired_dir/".$file_name)==false){
		                move_uploaded_file($file_tmp, $file_link2);

		                $image = new SimpleImage(); 
		                $image->load($file_link2); 
		                $image->resizeToHeight(400); 
		                $image->save($file_link2);
		            }else{									                  
		            	$errors[]="Nisem uspel prekaniti datoteke!";				
		            }
		            $sql = mysql_query($query);
		            $photo_id = mysql_insert_id();
		            if(!$sql){
			            $errors[]="Napaka v poizvedbi 1";
		            }else{
			            $sql = mysql_query("INSERT INTO Middle_Photos (ID_Photo, ID_Product) VALUES ('$photo_id', '$product_id') ") or die (mysql_error());		            
			        }		
		        }else{
		            print_r($errors);
		        }
		    }
		    
			if(empty($errors)){
				echo "<spam class='debeli Eho'>Uspešno naložene slike. Product ID:". $product_id ."</spam>";
			}else{
				echo "<spam class='debeli Eho'>Napaka pri nalaganju slik.</spam>";
				unset($errors);
			}
			}
            */
		}
	}
}else{
?>
    
    <form class="form_addProducts" role="form" enctype="multipart/form-data" name="addProduct" method="post" >
	  <div class="form-group">
	    <label>Product name</label><br />
	    <input type="text" name="name" class="form-control" id="productName" maxlength="40" placeholder="Enter product name..">
	  </div>
	  <div class="form-group">
	  <label >Choose category</label><br />
		<select name="category">
		  <option value="1">Motors</option>
		  <option value="2">Fashion</option>
		  <option value="3">Home</option>
		  <option value="4">Electronic</option>
		  <option value="5">Home</option>
		  <option value="6">Services</option>
		  <option value="7">Jewellery</option>
		  <option value="8">Antiques</option>
		  <option value="9">Other</option>
		</select>
	</div>
		<br />
		<hr />

	  <div class="form-group">
	   <label >Price of a new product</label><br />
	    <input  type="text" class="form-control" name="price" id="price" placeholder="Euro sign (&euro;) will be addet automaticly..">
	  </div>
	  
	  <div class="form-group">
	   <label>Size</label><br />
	    <input type="text" class="form-control" name="size" placeholder="Format: [width(mm) x height(mm) x lenght(mm)]">
	  </div>
	  <div class="form-group">
	   <label>Weight</label><br />
	    <input type="text" class="form-control" id="weight" name="weight" placeholder="The 'Kg' will be addet automaticly.">
	  </div>
	  <div class="form-group">
	   <label>Content</label><br />
	    <input type="text" class="form-control" id="content" name="content" placeholder="Enter content as text.">
	  </div>


	  <hr />
	  <div class="description_chunk">
	  <script src="ckeditor/ckeditor.js"></script>
	    <label>Product description</label><br />
	    <textarea class="ckeditor" name="desc" id="desc"  placeholder="Enter product descpription"></textarea>
	 <br />
	  </div>
	

	<div class="form-group">
	    <label>Product Avatar photo</label>
	    <input type="file" name="slika" id="exampleInputFile">
	    Photo size: [width=300px,height=400px]
	 </div>

	<div class="form-group">
		<label >Choose Photos for gallery</label><br />
		<input onchange="this.form.submit()" type="file" name="photos"/>
		Allowed files [.jpg .png .jpeg]
	</div>
	<br />
	<button type="submit" id="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
  <br style="clear: both" />
  <br />
<?php } ?>
</div>

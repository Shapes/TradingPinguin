<script src="js/livevalidation.js"></script>          <!-- SKRIPTA VALIDACIJA -->
<script src="js/validate.js"></script>
<div id="add_wrapper">
	<form class="form_addProducts" role="form" enctype="multipart/form-data" name="addProduct" method="post" >
	  <div class="form-group">
	    <label>Product name</label><br />
	    <input type="text" class="form-control" id="productName" maxlength="40" placeholder="Enter product name..">
	  </div>
	  <div class="form-group">
	  <label >Choose category</label><br />
		<select name="category">
		  <option value="volvo">Motors</option>
		  <option value="saab">Fashion</option>
		  <option value="opel">Home</option>
		  <option value="audi">Electronic</option>
		  <option value="opel">Home</option>
		  <option value="audi">Services</option>
		  <option value="opel">Jewellery</option>
		  <option value="audi">Antiques</option>
		  <option value="audi">Other</option>
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
</div>

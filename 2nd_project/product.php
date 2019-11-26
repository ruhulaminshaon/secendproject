<?php 
include('config.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
	// echo"<pre>";
	// print_r($_POST);
	// echo $_FILES['product_image_one']['name'][0];//array image row.
	// echo $_FILES['product_image_one']['name'][1];//array image row.
	// echo"</pre>";	
	if(isset($_POST['product_save']) || $_POST['product_save']!=''){
		$sql = "SELECT product_title FROM product WHERE product_title = '".$_POST['product_title']."'";
	    $conn=$db->prepare($sql);
	    $conn->execute();
	    $re=$conn->rowCount();
	    if($re>0){
	        $err_message="<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your Product Title is Allready execute</div>";
	    }else{
	    	$conn=$db->prepare("INSERT INTO product(p_cat_id,cat_id,product_date,product_title,product_price,previa_price,product_desc,product_keywords) values (?,?,?,?,?,?,?,?)");

	        $point=$conn->execute(array($_POST["product_cat_name"],$_POST["cat_name"],$_POST["submit_date"],$_POST["product_title"],$_POST["product_price"],$_POST["previa_price"],$_POST["product_des"],$_POST["product_keyword"]));

	        $sql="SELECT * FROM product WHERE p_cat_id =?  AND cat_id=? AND product_title=? ORDER BY id DESC LIMIT 1";
        	$conn=$db->prepare($sql);
    		$conn->execute(array($_POST['product_cat_name'],$_POST['cat_name'],$_POST['product_title']));
    		$row=$conn->fetchAll(PDO::FETCH_ASSOC);
	        foreach($row as $v){
	        	// echo $v['id'];	
	        	$image=$_FILES['product_image_one']['name'];
	        	if(isset($image)){
	        		foreach($image as $key=>$value)
	        		{ 	
	        			$img=time()."_".str_replace("","",basename($_FILES['product_image_one']['name'][$key]));
	        			$image_tmp=$_FILES['product_image_one']['tmp_name'][$key];
	        			if(move_uploaded_file($image_tmp,"image/product/".$img)){
			           	$conn=$db->prepare("INSERT INTO multipalimage(product_id,image) values (?,?)");
				       	$result=$conn->execute(array($v['id'],$img));
			        		if($result){
			        			$seccess_mess="<div class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Category Save Success.</div>";
			        		}
			        	} 	
				        
	        		}

	        	}

	        }

	    }  
	}
}
include('admin_header.php');
?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>               
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="admin.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Product</li>
      </ol>
      <!--php information-->  
	<div class="container" style="margin-bottom: 50px;">
		<h2>Product</h2>
		<?php
		if(isset($seccess_mess)){echo $seccess_mess;}
		if(isset($err_message)){echo $err_message;}
		?>		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="cat_title">Product Category</label>
		    <select class="form-control" name="product_cat_name">
		    	<option>Select Product Category</option>
		    	<?php
		    	$sql="SELECT * FROM product_categories";
		    	$conn=$db->prepare($sql);
          		$conn->execute();
          		$result=$conn->fetchAll(PDO::FETCH_ASSOC);
          		foreach($result as $row){
          		?>
          		<option value="<?php echo $row['id'];?>"><?php echo $row['p_cat_title'];?></option>
          		<?php
          		}
		    	?>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="cat_title">Category</label>
		    <select class="form-control" name="cat_name">
		    	<option>Select Category</option>
		    	<?php
		    	$sql="SELECT * FROM categories";
		    	$conn=$db->prepare($sql);
          		$conn->execute();
          		$result=$conn->fetchAll(PDO::FETCH_ASSOC);
          		foreach($result as $row){
          		?>
          		<option value="<?php echo $row['id'];?>"><?php echo $row['cat_title'];?></option>
          		<?php
          		}
		    	?>
		    </select>
		  </div>
		  <div class="form-group">
		  	<label for="data">Product Submit Date</label>
		  	<input type="date" class="form-control" name="submit_date" required>
		  </div>
		  <div class="form-group">
		  	<label for="product_title">Product Title</label>
		  	<input type="text" class="form-control" name="product_title" required>
		  </div>
		  <div class="form-group row img_row">
			  	<div class="col-xs-2">
			  		<label for="image">Image </label>
			  	</div>
			  	<div class="col-xs-8">
			  		<input type="file" class="form-control" name="product_image_one[]">
			  	</div>
			  	<div class="col-xs-2">
			  		<button type="button" class="btn btn-danger add_image_row">Add Image Row </button>
			  	</div>	
		  </div>
		  <div class="form-group">
		  	<label for="product_price">Product Price</label>
		  	<input type="number" class="form-control" name="product_price" required>
		  </div>
		  <div class="form-group">
		  	<label for="previa_price">Previa Price</label>
		  	<input type="number" class="form-control" name="previa_price" required>
		  </div>
		  <div class="form-group">
		  	<label for="product_des">Product Description</label>
		  	<textarea class="form-control" name="product_des"></textarea>
		  </div>
		  <div class="form-group">
		  	<label for="product_keyword">Product Keyword</label>
		  	<input type="text" class="form-control" name="product_keyword" required>
		  </div>
		  <button type="submit" class="btn btn-warning" name="product_save">Categories Save</button>
		</form>	
    </div>
  </div>
  <!-- /.container-fluid-->
<?php include('admin_footer.php');?>


<?php 
include('config.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['category_save']) || $_POST['category_save']!=''){
		$sql = "SELECT cat_title FROM categories WHERE cat_title = '".$_POST['cat_title']."'";
	    $conn=$db->prepare($sql);
	    $conn->execute();
	    $re=$conn->rowCount();
	    if($re>0){
	        $err_message="<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your Name is Allready execute</div>";
	    }else{
	        $conn=$db->prepare("INSERT INTO categories(cat_title,category_desc) values (?,?)");
	        $result=$conn->execute(array($_POST["cat_title"],$_POST["cat_desc"]));
	        if($result){
	        	$seccess_mess="<div class='alert alert-success'>Category Save Success.</div>";
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
        <li class="breadcrumb-item active">Categories</li>
      </ol>
      <!--php information-->  

	<div class="container breadcrumb">
		<h2>Categorie</h2>
		<?php
		if(isset($seccess_mess)){echo $seccess_mess;}
		if(isset($err_message)){echo $err_message;}
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		  <div class="form-group">
		    <label for="cat_title">Categories Title:</label>
		    <input type="text" class="form-control cat_title" name="cat_title" required>
		  </div>
		  <div class="form-group">
		    <label for="cat_desc">Categories Description:</label>
		    <textarea class="form-control cat_desc" name="cat_desc" required></textarea>
		  </div>
		 
		  <button type="submit" class="btn btn-warning" name="category_save">Categories Save</button>
		</form>
	</div>
     
  </div>
  <!-- /.container-fluid-->
   
   

<?php include('admin_footer.php');?>


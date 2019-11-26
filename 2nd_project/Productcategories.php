<?php 
include('config.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_POST['p_c_save']) || $_POST['p_c_save']!=''){
     $sql = "SELECT p_cat_title FROM product_categories WHERE p_cat_title = '".$_POST['p_title']."'";
      $conn=$db->prepare($sql);
      $conn->execute();
      $re=$conn->rowCount();
      if($re>0){
        $err_message="<div class='container alert alert-danger'>Your Name is Allready execute</div>";
      }else{
        $conn=$db->prepare("INSERT INTO product_categories (p_cat_title,p_cat_desc) VALUES(?,?)");
        $result=$conn->execute(array($_POST["p_title"],$_POST["p_description"]));
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
        <li class="breadcrumb-item active">Product Categories</li>
      </ol>
      <!--php information-->

<div class="container">
<h2>Product categories</h2>
<?php
  if(isset($err_message)){
    echo $err_message;
  }       
      if(isset($result)){
        echo"<div class='container alert alert-success'>Success</div>";
      }
?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
      <label for="p_title">Product Categories Title:</label>
      <input type="text" class="form-control" id="p_title" name="p_title" required>
    </div>
    <div class="form-group">
      <label for="pwd">Product Categories Description:</label>
      <textarea class="form-control" name="p_description" id="p_description" required></textarea>
    </div>
    <button type="submit" class="btn btn-info" name="p_c_save">Submit</button>
  </form>
</div>
      
  </div>
  <!-- /.container-fluid--> 

<?php include('admin_footer.php');?>


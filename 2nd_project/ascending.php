<?php 
  include('config.php'); 
  include('admin_header.php');
?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
        <?php
        if(isset($result)){
          echo"<h3 style='color:green;'>Success</h3>";
        }
        ?>
      
      <h2>Pasenger Add</h2>  
	  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Pasenger Name</span>
        </div>
        <input type="text" class="form-control">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Date of Birth</span>
        </div>
        <input type="date" class="form-control">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Contact Name</span>
        </div>
        <input type="text" class="form-control">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Address</span>
        </div>
        <textarea class="form-control"></textarea>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">City</span>
        </div>
        <input type="text" class="form-control">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">PostalCode</span>
        </div>
        <input type="text" class="form-control">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Country</span>
        </div>
        <input type="text" class="form-control">
      </div>
		<button type="submit" name="pasenger_save" class="btn btn-info">Save</button>
	  </form>  
    </div>
    <!-- /.container-fluid-->
<?php include('admin_footer.php'); ?>
<?php
//distinct
//limit
//order by
//where 
//where .. and .. order by ..
//where .. like ..
//WHERE .. GROUP BY .. ORDER BY ..

//->joining table

?>
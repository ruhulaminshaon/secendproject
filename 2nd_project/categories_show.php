<?php 
include('config.php');   
  
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
        <li class="breadcrumb-item active">Categories Info</li>
      </ol>
      <!--php information-->
      <div class="container">
      <?php 
      if(isset($delete_success)){
        echo $delete_success;
      }
      ?>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-1"><h3>ID</h3></div>
          <div class="col-sm-3"><h3>Categori Title</h3></div>
          <div class="col-sm-5"><h3>Categori Description</h3></div>
          <div class="col-sm-3"><h3>Action</h3></div>
        </div>
        <?php
          $i=0;
          $sql = "SELECT * FROM categories";
          $conn=$db->prepare($sql);
          $conn->execute();
          $result=$conn->fetchAll(PDO::FETCH_ASSOC);
          foreach($result as  $row){
            $i++;
        ?>
          <div class="row">
            <div class="col-sm-1"><?php echo $i;?></div>
            <div class="col-sm-3"><?php echo $row['cat_title'];?></div>
            <div class="col-sm-5"><?php echo substr($row['category_desc'], 0, 30);?></div>
            <div class="col-sm-3"><a class="btn btn-info viewcategori" data-cattitle="<?php echo $row['cat_title'];?>" data-catdescription="<?php echo $row['category_desc'];?>" data-toggle="modal" data-target="#viewcategori">view </a> <a class="btn btn-warning editcategori" data-pcid="<?php echo $row['id'];?>" data-title="<?php echo $row['p_cat_title'];?>" data-description="<?php echo $row['p_cat_desc'];?>" data-toggle="modal" data-target="#editcategori">Edit</a> <a href="delete/pcategore_delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger" onclick="return confirm('Are you Sure?');" name="pcatdelete">Delete </a></div>
          </div>
        <?php
        echo "<br>";
          }
        ?>
      
  <!-- /.container-fluid--> 

    <!-- Modal view-->
    <div class="modal fade" id="viewcategori" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Categorie</h4>
          </div>
          
          <div class="modal-body">
            <h2>Title:</h2>
            <h4 class="cattitle"></h4>
            <h2>Description:</h2>
            <p class="catdescrip"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    <!--model end-->
    

  </div>
  
      
</div>
<?php include('admin_footer.php');?>


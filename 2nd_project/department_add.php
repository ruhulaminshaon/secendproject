<?php
$pages='depart_insert';
include('config.php');
//session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(isset($_POST['department_save']) || $_POST['department_save']!=''){
    $sql = "select * from department WHERE dep_name = '".$_POST['department_name']."'";
      $conn=$db->prepare($sql);
      $conn->execute();
      $re=$conn->rowCount();
      if($re>0){
        $err_message="Your Name is Allready execute";
      }else{
        $conn=$db->prepare("INSERT INTO department(dep_name) values (?)");
        $result=$conn->execute(array($_POST["department_name"]));
      }   
  }
}
?>

<?php include('admin_header.php');?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>               
        
	
 
  <div class="content-wrapper">
    
    <!-- /.container-fluid-->
    <?php
    if(isset($_GET['edit'])){
      $get_id=$_GET['edit'];
      $get_conn=$db->prepare("select * from department where id=?");
      $get_conn->execute(array($get_id));
      $result=$get_conn->fetchAll(PDO::FETCH_ASSOC);      
      foreach($result as $row){
    ?>
    <div class="container">
      <a href="department_show.php"><button type="button" class="btn btn-info">Back</button></a>
      <h2>Update Department</h2>    
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
          <label for="department">Update Department Name:</label>     

          <input type="text" class="form-control" id="department" placeholder="Enter department" name="department_name" value="<?php echo $row['dep_name'];?>" required>
          
        </div>    
        <button type="submit" name="department_update" class="btn btn-warning btn-block">Update Department</button>
      </form>        
    </div>
    <?php
      }
    }else{
    ?>
    <div class="container-fluid">
      <?php       
      if(isset($result)){
        echo"<h2 style='color:green;'>Success</h2>";
      }
      ?>
        <div class="container alert alert-info">
        <h2>Department</h2>    
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <label for="department">Department Name:</label>     

              <input type="text" class="form-control" id="department" placeholder="Enter department" name="department_name" required>
              
            </div>    
            <button type="submit" name="department_save" class="btn btn-info">Save</button>
          </form>  
        </div>
    </div>
    <?php
    }
    ?>
    
   

<?php include('admin_footer.php');?>


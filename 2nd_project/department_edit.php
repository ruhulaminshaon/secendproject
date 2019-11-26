<?php
error_reporting(E_ALL);


/*echo"<pre>";
print_r($_REQUEST);
echo"</pre>";

exit();*/
/*echo"<pre>";
print_r($_POST);
echo"</pre>";

echo"<pre>";
print_r($_FILES);
echo"</pre>";



*/


include('config.php');
if(isset($_REQUEST['edit'])){
	$id=$_REQUEST['edit'];
}else{
	header('location:department_show.php');
}

if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['department_update'])){
	    
      $sql = "select * from department WHERE dep_name = '".$_POST['dep_name']."'";
        $conn=$db->prepare($sql);
        $conn->execute();
        $re=$conn->rowCount();
        if($re>0){
          //$error_massage = "Your Name is Allready execute";
        	header('location:department_show.php');
        }else{
			$conn=$db->prepare("UPDATE department SET dep_name=? WHERE id=?");
			$result=$conn->execute(array($_POST['dep_name'], $_REQUEST['id']));	
		}
		
	}
}

 include('admin_header.php');
 ?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>

  <div class="content-wrapper">
    <div class="container-fluid">
		<a href="department_show.php"><button type="button" class="btn btn-info">Back</button></a>
        <h2>Department</h2>
<?php
// echo $_GET['id'];
?>
      <span><?php if(isset($error_massage) && $error_massage != '' ) echo $error_massage; ?></span>
	  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="form-group">	
		<?php 
			if(isset($result)){
			echo"<h2 style='color:green;'>Success</h2>";
			}
			?>
		  <label for="department">Update Department Name:</label>
		   <?php		   
			$conn=$db->prepare("select * from department where id=?");
			$conn->execute(array($id));
			$result=$conn->fetchAll(PDO::FETCH_ASSOC);			
			foreach($result as $row){
			?> 
		  <input type="text" class="form-control" id="department" name="dep_name" value="<?php 
		  echo $row['dep_name'];
		  ?>" required>
		
		</div>	
		<?php
		}
		?>
		<button type="submit" name="department_update" class="btn btn-info btn-block">Update</button>
	  </form>        	
    </div>
    <!-- /.container-fluid-->
<?php include('admin_footer.php');?>


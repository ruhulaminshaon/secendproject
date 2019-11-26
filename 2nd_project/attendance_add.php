<?php 
include('config.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['attendance_save'])){

		$date=$_POST['day'];
		$intime=strtotime($date." ".$_POST['in_time']);
		//echo date("Y-m-d h:i A",$intime)."<br/>";
		$outtime=strtotime($date." ".$_POST['out_time']);
		//echo date("Y-m-d h:i A",$outtime);
		//$data = array($intime,$outtime);
		
			 $sql="INSERT INTO attendance (	emp_name, att_in_time, att_out_time) VALUES ('".$_POST['emp_id']."', '$intime','$outtime')";
			 $conn=$db->prepare($sql);
			 $result=$conn->execute();
		}
		
	}

?>
<?php include('admin_header.php');?>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>	
      
  <div class="content-wrapper">
  	

    <div class="container-fluid">
    	
	    	<h2>Attendance Field</h2>
	    
  			<?php
  			if(isset($result)){
  			?>

	    	<div class="alert alert-primary" role="alert">
			 <?php
  				echo"<h2 style='color:green;'>Success</h2>";
  			?>
  			</div>
  			<?php
  			}
  			?>
			
	  	
      	<div class="alert alert-success" role="alert"">
	    	
	    	<div>
	    		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >

				    <div class="form-group">
				      <label for="name">Name:</label>
				      
				      <select class="form-control" name="emp_id">
				      	<option>Select Name</option>
				      	<?php
					      $sql="select * from employment";
					      $conn=$db->prepare($sql);
					      $conn->execute();
					      $result=$conn->fetchAll(PDO::FETCH_ASSOC);
					      foreach ($result as $row ) {
				      ?>
				      	<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
				      <?php
				      	}
				      ?>
				        
				      </select>
				    </div>
				    <div class="form-group">
				      <label for="start_time">Day:</label>
				      <input type="date" name="day" >
				      <label for="start_time">In Time:</label>
				      <input type="time" name="in_time">
				      <label for="start_time">Out Time:</label>
				      <input type="time" name="out_time">
				    </div>
				   
					<button type="submit" class="btn btn-danger btn-lg btn-block" name="attendance_save">Attendance Save</button>
				</form>
	    	</div>
	    </div>          
    </div>
    
    <!-- /.container-fluid-->
<?php include('admin_footer.php');?>

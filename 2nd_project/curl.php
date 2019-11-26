<?php 
$pages="curl";
include('config.php');
include('admin_header.php');
?>
<div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
	    	<h2>Curl Tool/Libarary </h2>
	    	<p>Date base of json place holder.</p>		  	
      	<div class="alert alert-success" role="alert">
		<?php
		$defaults=array(
			CURLOPT_URL=>"http://jsonplaceholder.typicode.com/users",
			CURLOPT_POST=>false,
			CURLOPT_RETURNTRANSFER=>true,
		);
		$ch=curl_init();		
		// curl_setopt($ch,CURLOPT_URL,"http://jsonplaceholder.typicode.com/users");
		// curl_setopt($ch,CURLOPT_POST,false);
		// curl_setopt($ch,CURLOPT_POSTFIELDS,"id=333");
		// curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt_array($ch,$defaults);
		$result=curl_exec($ch);
		curl_close($ch);		
		$result=json_decode($result);
		?>
		<table class="table table-bordered">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Username</th>
				<th>Streede</th>
				<th>Phone</th>
			</tr>			
			<?php
			foreach($result as $row){
			?>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->username;?></td>
				<td><?php echo $row->address->street ; ?></td>
				<td><?php echo $row->phone;?></td>
			</tr>
			<?php
			}
			echo "<pre>";
			print_r($result);
			echo "</pre>";
			?>
		</table>
		</div>          
    </div>
    <!-- /.container-fluid-->
<?php include('admin_footer.php');?>

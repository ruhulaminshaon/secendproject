<?php
include('config.php'); 
include('admin_header.php');
?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>	
  <div class="content-wrapper">
    <div class="container-fluid">
      <h2>Employee And Attendance Show</h2>
     <table class="table">
      <tr>
        <th>Action</th>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Phone Number</th>    
      </tr>
        <tr>
          <td><a href="attendance_view.php?id="> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">View</button></a></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
    </table>
      </div>
     <!--card end-->
    </div>
    <!-- /.container-fluid-->
<?php include('admin_footer.php');?>

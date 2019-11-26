<ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="overflow:auto;">
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?>">
          <a class="nav-link" href="admin.php">
            <img class="rounded-circle" src="image/<?php if(isset($_SESSION['image'])){ echo $_SESSION['image']; } ?>" width="100px" height="90px">
            <?php if(isset($_SESSION['user_type_name'])){echo $_SESSION['user_type_name'];}?>
          </a>
          
        </li>

        <li class="nav-item <?php if($_SERVER['PHP_SELF']=='/2nd_project/admin.php'){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin.php">
            <i class="fa fa-fw fa-dashboard" style="font-size: 20px;color: #ADFF2F;"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item <?php if($pages=='weather'){echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="weather">
          <a class="nav-link" href="weather.php">
            <i class="fa fa-fw fa-dashboard" style="font-size: 20px;color: #ADFF2F;"></i>
            <span class="nav-link-text">Weather</span>
          </a>
        </li>

        <li class="nav-item <?php if($pages=='curl'){ echo 'active';}?>" data-toggle="tooltip" data-placement="right" title="Curl">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#curl" data-parent="#exampleAccordion">
            <i class="fa fa-apple" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Curl</span>
          </a>
          <ul class="sidenav-second-level collapse" id="curl">
            
            <li class="<?php if($pages=='curl'){ echo 'active';}?>">
              <a href="curl.php">Curl Insert</a>
            </li>

          </ul>
        </li>

		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Department">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#department" data-parent="#exampleAccordion">
            <i class="fa fa-apple" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Department</span>
          </a>
          <ul class="sidenav-second-level collapse" id="department">
            
            <li class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/department_add.php'){ echo 'active';}else{echo '';}?>">
              <a href="department_add.php">Department Insert</a>
            </li>
            
            <li class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/department_show.php'){ echo 'active';}else{echo '';}?>">
              <a href="department_show.php">Department show</a>
            </li>
          </ul>
        </li>

		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Desination">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#desination" data-parent="#exampleAccordion">
            <i class="fa fa-chrome" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Desination</span>
          </a>
          <ul class="sidenav-second-level collapse" id="desination">
            
            <li>
              <a href="desination_add.php">Desination Insert</a>
            </li>
            
            <li>
              <a href="desination_show.php">Desination show</a>
            </li>
          </ul>
        </li>
			
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Employment">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#employment" data-parent="#exampleAccordion">
            <i class="fa fa-certificate" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Employment</span>
          </a>
          <ul class="sidenav-second-level collapse" id="employment">
            
            <li>
              <a href="employment_add.php">Employment Insert</a>
            </li>
            
            <li>
              <a href="employment_show.php">Employment show</a>
            </li>
          </ul>
        </li>

        <?php
        if($_SESSION['user_type_name']=='Super Admin'){
        ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#user" data-parent="#exampleAccordion">
            <i class="fa fa-child" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">User</span>
          </a>
          <ul class="sidenav-second-level collapse" id="user">
            
            <li>
              <a href="user_add.php">User Insert</a>
            </li>

            <li>
              <a href="user_show.php">User show</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Information">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#information" data-parent="#exampleAccordion">
            <i class="fa fa-child" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Information</span>
          </a>
          <ul class="sidenav-second-level collapse" id="information">
            
            <li>
              <a href="ascending.php">Ascending Insert</a>
            </li>

            <li>
              <a href="ascending_show.php">Ascending show</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Attendance">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#attendance" data-parent="#exampleAccordion">
            <i class="fa fa-android" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Attendance</span>
          </a>
          <ul class="sidenav-second-level collapse" id="attendance">
            
            <li>
              <a href="attendance_add.php">Attendance Insert</a>
            </li>

            <li>
              <a href="attendance_show.php">Attendance show</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="selary">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#selary" data-parent="#exampleAccordion">
            <i class="fa fa-child" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Salary</span>
          </a>
          <ul class="sidenav-second-level collapse" id="selary">
            
            <li>
              <a href="salary_add.php">Salary add</a>
            </li>

            <li>
              <a href="salary_show.php">Salary show</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Productcategories">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Productcategories" data-parent="#exampleAccordion">
            <i class="fa fa-child" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Product categories</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Productcategories">
            
            <li class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/Productcategories.php'){echo "active";}?>">
              <a href="Productcategories.php">Product categories Add</a>
            </li>

            <li class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/Productcategories_show.php'){echo "active";}?>">
              <a href="Productcategories_show.php">Product categories show</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="categories">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#categories" data-parent="#exampleAccordion">
            <i class="fa fa-child" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Categories</span>
          </a>
          <ul class="sidenav-second-level collapse" id="categories">
            
            <li class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/categories.php'){echo "active";}?>">
              <a href="categories.php">Categories Insert</a>
            </li>

            <li class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/categories_show.php'){echo "active";}?>">
              <a href="categories_show.php">Categories show</a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Product">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Product" data-parent="#exampleAccordion">
            <i class="fa fa-child" style="font-size:20px;color:#ddd;"></i>
            <span class="nav-link-text">Product</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Product">
            
            <li>
              <a href="product.php">Product Insert</a>
            </li>

            <li>
              <a href="product_show.php">Product show</a>
            </li>
          </ul>
        </li>
        <?php
        }
        ?>
      </ul>
         
<!--       attendance -->


<!--menu end-->

<!--top menu start-->




<ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">        
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <span class="input-group-append">
                <img src="image/<?php if(isset($_SESSION['image'])){ echo $_SESSION['image']; } ?>" width="30px" height="30px">
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
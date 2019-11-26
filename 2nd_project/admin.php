<?php 
include('admin_header.php');
?>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php include('admin_left_side_menu.php');?>               
    
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!--php information-->
      
      <?php
      ?>
      <!-- Icon Cards-->
      <?php
      echo "<h2>Ternary Operator</h2><br>";
      $age=19;
      echo ($age)?"Yes it is working":"sory,";

      ?>
      <hr>
      <?php
      echo "<h2>func_get_args()</h2><br>";
      function getsun(){
        $numbers = func_get_args();
        $sun = $numbers[0]+$numbers[1];
        echo "Sum of the numbers ".$numbers[0]." and ".$numbers[1]." is";
      }
      getsun(10,20);
      ?>
      <hr>
      <?php
      class A{
        public $name="Plabon Mozumde";
        public $email="plabon@gmail.com";
        public $mobile="01788339922";
        public $price;
        public $user;
        public function setPrice($amount){
          $this->price=$amount;
        }
      }

      $obj=new A;
      $obj->setPrice(100);
      foreach($obj as $property=>$val){
        print $property." => ".$val."\n";
        echo "<br>";
      }
      ?>
      <hr>
      <?php
      echo "Type Operators </br>";
      class Myclass{}
      class NOtclass{}
      $a=new Myclass;
      var_dump($a instanceof Myclass);
      echo "</br>";
      var_dump($a instanceof NOtclass);
      echo "</br>";

      class ParentClass{}
      class Mclass extends ParentClass{}
      $a=new Mclass;
      var_dump($a instanceof Mclass);
      var_dump($a instanceof ParentClass);
      echo "</br>";


      echo "<h3>Interface of implement</h3>";
      interface MyInterface{}
      class Firstclass implements MyInterface{}
      $a= new Firstclass;
      var_dump($a instanceof Firstclass);
      echo "</br>";
      var_dump($a instanceof MyInterface);
      
      ?>
      <hr>
      <?php
      echo "<h2>Error Control Operator</h2></br>";
      echo "@include('x.php')<br>";
      echo "@\$a";
      ?>
      <hr>
      <?php

      echo "<h2>Static valiable </h2><br>";
      function myfirst(){
        $x=0;
        echo $x;
        $x++;
      }
      myfirst();
      myfirst();
      myfirst();
      echo "<br>";
      echo "static \$x=0 <br>";
      function mysecond(){
        static $x=0;
        echo $x;
        $x++;
      }
      mysecond();
      mysecond();
      mysecond();
      ?>
      <hr>
      <?php
      echo "<h2>PHP variable variables</h2> </br>";
      $city="Dhaka";
      $$city="104 Square Miles";
      echo "The size of $city is $Dhaka";
      ?>
      <hr>
      <?php
      echo "<h2>Assigning by Reference</h2> </br>";
      $a="Hi There";
      $b=&$a;
      $b=" See you Later";
      echo $a;
      echo $b;
      ?>
      <hr>
      <?php
      echo "<h2>Passing by Reference</h2></br>";
      function goodbye(&$greeting){
        $greeting="See you later";
      }
      $myvalue="HI there";
      goodbye($myvalue);
      echo $myvalue."</br>";

      function foo(&$x){
        $x++;
      }
      $a=5;
      foo($a);
      echo $a;
      ?>
      <hr>
      <?php
      echo "<h2>Returning References</h2></br>";
      $a = 10;
      function &test() {
        global $a;
        return $a;
      }
        
      $b =&test();
      $b--;
      echo "\$a = $a</br>";
      echo "\$b = $b</br>";
      ?>
      <hr>
      <?php
      echo "<h2>CONSTANT Variabl</h2></br>";
      define("CONSTANT","Hellow world");
      define("ONE","Hellow world",true);
      const TEST="Hello Bangladesh";
      echo CONSTANT."</br>";
      echo one."</br>";
      echo TEST;
      echo "</br>";
      // echo constant;
      // echo text;
      ?>

      <hr>
      <?php
      echo "Document Root--- https://localhost/";
      echo "<pre>";
      print_r($_SERVER);
      echo "</pre>";
      echo $_SERVER['SERVER_NAME']."<br>"; 
      echo $_SERVER['PHP_SELF']."<br>"; 
      echo $_SERVER['GATEWAY_INTERFACE']."<br>"; 
       
      ?>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">
              <?php
              $sql="select * from department";
              $conn=$db->prepare($sql);
              $conn->execute();
              $row=$conn->rowCount();
              if($row>0){
                echo $row;
              }else{
                echo "Empty!";
              }
              ?> Deaprtment!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="department_show.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"> <?php
              $sql="select * from desination";
              $conn=$db->prepare($sql);
              $conn->execute();
              $row=$conn->rowCount();
              if($row){
                echo $row;
              }else{
                echo "Empty!";
              }
              ?> Desination!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="desination_show.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"> 
              <?php
              $sql="select * from employment";
              $conn=$db->prepare($sql);
              $conn->execute();                      
              $row=$conn->rowCount();
              if($row){
                echo $row;
              }else{
                echo"Empty";
              }
              ?> Employment!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="employment_show.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5"> 
              <?php
              // $sql="select * from login";
              // $conn=$db->prepare($sql);
              // $conn->execute();
              // $row=$conn->rowCount();
              // if($row){
              //   echo $row;
              // }
              ?> User!</div>
            </div>
            
            <a class="card-footer text-white clearfix small z-1" href="<?php if($_SESSION['user_type_name']=='admin'){?> user_show.php <?php }?> " >
            
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      
     
      
    </div>
    <!-- /.container-fluid-->
   

<?php include('admin_footer.php');?>


<?php
    /**
     * เปิดใช้งาน Session
     */
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

  <div class="wrapper">
       <!-- Sidebar  -->
       <nav id="sidebar">
           <div class="sidebar-header">
               <h3>Motocycle</h3>
           </div>

           <ul class="list-unstyled components">
             <li  class="active">
                 <a href="index.php"><i class="fas fa-toolbox mr-1"></i>เพิ่มข้อมูลการซ่อม</a>
             </li>
             <li>
                 <a href="user_list.php"><i class="fas fa-users"></i> ข้อมูลลูกค้า</a>
             </li>
             <li>
                 <a href="staff.php"><i class="fas fa-user-cog"></i> ข้อมูลพนักงาน</a>
             </li>
             <li>
                 <a href="rp_history.php"><i class="fas fa-bell"></i> ประวัติการซ่อม</a>
             </li>
             <li>
                 <a href="product.php"><i class="fas fa-box"></i> ข้อมูลสินค้า</a>
             </li>
             <li>
                 <a href="dl_shop.php"><i class="fas fa-truck"></i> ข้อมูลผู้จำหน่ายสินค้า</a>
             </li>
             <li>
                 <a href="show.php"><i class="fas fa-chart-line"></i> รายงาน</a>
             </li>
         </ul>
       </nav>
       <!-- Page Content  -->
       <div id="content">

           <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="container-fluid">

                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <ul class="nav navbar-nav ml-auto">
                           <li class="nav-item active">
                             <?php if(isset($_SESSION['id'])) { ?>
                               <center><h5><?php echo $_SESSION["First_Name"];?> <?php echo $_SESSION["Last_Name"];?></h5></center>
                               <center><a class="btn btn-danger"data-toggle="modal" data-target="#LogoutModal" href="#">ออกจากระบบ</a></center>

                               <div id="LogoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                 <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                     <div class="modal-header">
                                       <h5 class="modal-title">ออกจากระบบ ?</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                       </button>
                                     </div>
                                     <div class="modal-body text-center">
                                       <h1 style="font-size:5.5rem;"><i class="fa fa-sign-out text-danger" aria-hidden="true"></i></h1>
                                       <p>คุณต้องการออกจากระบบหรือไม่?</p>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                       <a href="logout.php" class="btn btn-danger">ออกจากระบบ</a>
                                     </div>
                                   </div>
                                 </div>
                               </div>

                             <?php }else header('location:login.php'); { ?>

                  <?php } ?>
                           </li>
                       </ul>
                   </div>
               </div>
           </nav>

           <h2>Collapsible Sidebar Using Bootstrap 4</h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

           <div class="line"></div>

           <h2>Lorem Ipsum Dolor</h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

           <div class="line"></div>

           <h2>Lorem Ipsum Dolor</h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

           <div class="line"></div>

           <h3>Lorem Ipsum Dolor</h3>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
       </div>
   </div>
    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>

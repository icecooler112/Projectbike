<?php
    /**
     * เปิดใช้งาน Session
     */
    session_start();
    if (!$_SESSION['id']) {
        header("Location:../login.php");
    } else {

?>
<?php     include('../connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน ?>
<?php
$id = $_GET['id'];
$sql = "SELECT  `bu_id`, `user_id`,`bike_id`, `color`, `year_bike`,`brand` FROM `bike_user`  WHERE user_id = '" . $id . "' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>การจัดการข้อมูลลูกค้า</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
  <?php

        if(isset($_POST['submit'])){

                $sql = "UPDATE `bike_user`
                        SET `bu_id` = '".$_POST['bu_id']."',
                          `user_id` = '".$_POST['user_id']."',
                           `bike_id` = '".$_POST['bike_id']."',
                            `color` = '".$_POST['color']."',
                             `year_bike` = '".$_POST['year_bike']."',
                              `brand` = '".$_POST['brand']."'
                                WHERE bike_user.`user_id` = '".$_POST['user_id']."';";
                                $result = $conn->query($sql);
                    if($result){
                    echo '<script> alert("สำเร็จ! แก้ไขข้อมูลลูกค้าเรียบร้อย!")</script>';
                    header('Refresh:0; url=../user.php');
                }else{
                  echo '<script> alert("ล้มเหลว! ไม่สามารถแก้ไขข้อมูลลูกค้าได้ กรุกรุณาลองใหม่อีกครั้ง")</script>';
                  header('Refresh:1; url=create_user.php');


            }
        }
    ?>
  <div class="wrapper">
       <!-- Sidebar  -->
       <nav id="sidebar">
           <div class="sidebar-header">
               <h3>Motocycle</h3>
           </div>

           <ul class="list-unstyled components">
             <li>
                 <a href="../index.php"><i class="fas fa-toolbox mr-1"></i>เพิ่มข้อมูลการซ่อม</a>
             </li>
             <li>
                 <a href="../history.php"><i class="fas fa-bell"></i> ประวัติการซ่อม</a>
             </li>
             <li class="active">
                 <a href="../user.php"><i class="fas fa-users"></i> ข้อมูลลูกค้า</a>
             </li>
             <li>
                 <a href="../staff.php"><i class="fas fa-user-cog"></i> ข้อมูลพนักงาน</a>
             </li>

             <li>
                 <a href="../product.php"><i class="fas fa-box"></i> ข้อมูลสินค้า</a>
             </li>
             <li>
                 <a href="../dealer.php"><i class="fas fa-truck"></i> ข้อมูลผู้จำหน่ายสินค้า</a>
             </li>
             <li>
                 <a href="../show.php"><i class="fas fa-chart-line"></i> รายงาน</a>
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
                               <center><h5><?php echo $_SESSION["First_Name"];?> <?php echo $_SESSION["Last_Name"];?>  <a class="btn btn-danger ml-2"data-toggle="modal" data-target="#LogoutModal" href="#"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a></h5></center>

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
                                       <h1 style="font-size:5.5rem;"><i class="fas fa-sign-out-alt text-danger"></i></h1>
                                       <p>คุณต้องการออกจากระบบหรือไม่?</p>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                       <a href="../logout.php" class="btn btn-danger">ออกจากระบบ</a>
                                     </div>
                                   </div>
                                 </div>
                               </div>

                             <?php }else header('location:../login.php'); { ?>


                           </li>
                       </ul>
                   </div>
               </div>
           </nav>
           <div class="container">
           <div class="row">
               <div class="col-md-8 mx-auto mt-5">
                   <div class="card">
                       <form class="was-validated" action="" method="POST" enctype="multipart/form-data">
                           <div class="card-header text-center text-white bg-primary">
                               <h3>กรอกข้อมูข้อมูลรถจักรยานยนต์</h3>
                           </div>
                           <div class="card-body">
                             <input type="text" class="form-control" id="bu_id" name="bu_id" value="<?php echo $row['bu_id']; ?>" hidden>
                             <input type="text" class="form-control" id="user_id" value="<?php echo $row['user_id']; ?>" name="user_id" hidden >
                             <div class="form-group row">
                                 <label for="bike_id" class="col-sm-3 col-form-label">เลขทะเบียนรถ</label>
                                 <div class="col-sm-9">
                                     <input type="text" class="form-control" id="bike_id" name="bike_id" value="<?php echo $row['bike_id']; ?>"required>
                                     <div class="invalid-feedback">
                                         กรุณากรอกเลขทะเบียนรถ
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="color" class="col-sm-3 col-form-label">สีรถ</label>
                                 <div class="col-sm-9">
                                     <input type="text" class="form-control" id="color" name="color" value="<?php echo $row['color']; ?>" required>
                                     <div class="invalid-feedback">
                                         กรุณากรอกสีรถ
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="year_bike" class="col-sm-3 col-form-label">ปีของรถ</label>
                                 <div class="col-sm-9">
                                     <input type="text" class="form-control" id="year_bike" onKeyUp="IsNumeric(this.value,this)" name="year_bike" value="<?php echo $row['year_bike']; ?>"  required>
                                     <div class="invalid-feedback">
                                         กรุณากรอกปีของรถ
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="brand" class="col-sm-3 col-form-label">ยี่ห้อของรถ</label>
                                 <div class="col-sm-9">
                                     <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $row['brand']; ?>"  required>
                                     <div class="invalid-feedback">
                                         กรุณากรอกยี่ห้อของรถ
                                     </div>
                                 </div>
                             </div>

                               <center><input type="submit" name="submit" class="btn btn-success" value="ยืนยันการทำรายการ">

                                <a class="btn btn-danger text-center" href="../manage_user/bike_show.php?id=<?php echo $row['user_id']; ?>">ย้อนกลับ</a></center>

                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
       <?php } ?>
    <script>
            // ตรวจสอบการกรอกข้อมูลชนิดที่ไม่ช่ตัวเลข
            function IsNumeric(sText, obj) {
                var ValidChars = "0123456789";
                var IsNumber = true;
                var Char;
                for (i = 0; i < sText.length && IsNumber == true; i++) {
                    Char = sText.charAt(i);
                    if (ValidChars.indexOf(Char) == -1) {
                        IsNumber = false;
                    }
                }
                if (IsNumber == false) {
                    alert("กรอกได้เฉพาะตัวเลข 0-9 เท่านั้น");
                    obj.value = sText.substr(0, sText.length - 10);
                }
            }
        </script>
    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>

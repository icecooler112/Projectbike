<?php
    /**
     * เปิดใช้งาน Session
     */
    session_start();
    if (!$_SESSION['id']) {
        header("Location:../login.php");
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>การจัดการข้อมูลสินค้า</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
  <?php
        include('../connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if(isset($_POST['submit'])){
            $temp = explode('.',$_FILES['image']['name']);
            $new_name = round(microtime(true)) . '.' . end($temp);
            /**
             * ตรวจสอบเงื่อนไขที่ว่า สามารถย้ายไฟล์รูปภาพเข้าสู่ storage ของเราได้หรือไม่
             */
            if(move_uploaded_file($_FILES['image']['tmp_name'], '../upload/' .$new_name)){


                $sql = "INSERT INTO `product` (`p_id`, `pname`,`price`, `numproduct`, `detail`, `image`, `dl_id`, `dl_insurance`, `num_insurance`,`dl_date`)
                        VALUES (NULL, '".$_POST['pname']."',
                            '".$_POST['price']."',
                             '".$_POST['numproduct']."',
                              '".$_POST['detail']."' ,
                               '". $new_name."',
                               '".$_POST['dl_id']."' ,
                               '".$_POST['dl_insurance']."',
                               '".$_POST['num_insurance']."',
                               '".$_POST['dl_date']."');";
                $result = $conn->query($sql);
                if($result){
                    echo '<script> alert("สำเร็จ! เพิ่มข้อมูลสินค้าเรียบร้อย!")</script>';
                    header('Refresh:1; url=../product.php');
                }else{
                  echo '<script> alert("ล้มเหลว! ไม่สามารถเพิ่มข้อมูลสินค้าได้ กรุกรุณาลองใหม่อีกครั้ง")</script>';
                  header('Refresh:0; url=create_product.php');

                }
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
             <li>
                 <a href="../user.php"><i class="fas fa-users"></i> ข้อมูลลูกค้า</a>
             </li>
             <li>
                 <a href="../staff.php"><i class="fas fa-user-cog"></i> ข้อมูลพนักงาน</a>
             </li>

             <li class="active">
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

                  <?php } ?>
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
                        <div class="card-header text-center  text-white bg-primary">
                          <h3>กรอกข้อมูลสินค้า</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="pname" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pname" name="pname" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกชื่อสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">ราคา</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="price" onKeyUp="IsNumeric(this.value,this)" name="price" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกราคาสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="numproduct" class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="numproduct" onKeyUp="IsNumeric(this.value,this)" name="numproduct" required>
                                    <div class="invalid-feedback">
                                        กรุณากรอกจำนวนสินค้าที่มี
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="detail" class="col-sm-3 col-form-label" >Detail</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="detail" name="detail" rows="4" required></textarea>
                                    <div class="invalid-feedback">
                                        กรุณากรอกรายละเอียดสินค้า
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dl_insurance" class="col-sm-3 col-form-label">การรับประกันสินค้า</label>
                                <div class="col-sm-5">
                                  <select class="form-control" id="dl_insurance" name="dl_insurance" required>
                                    <option selected disabled value="">การรับประกันสินค้า</option>
                                    <option>ไม่มี</option>
                                    <option>เดือน</option>
                                    <option>ปี</option>
                                    <option>ตลอดชีพ</option>
                                  </select>
                                  <div class="invalid-feedback">
                                      กรุณาเลือกการรัการรับประกันสินค้า
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <select class="form-control" id="num_insurance" name="num_insurance" required>
                                    <option selected disabled value="">ระยะเวลา</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                  </select>
                                  <div class="invalid-feedback">
                                      กรุณาเลือกเวลาการรับประกันสินค้า (ถ้าไม่มี หรือ ตลอดชีพให้เลือกเป็น 0)
                                  </div>
                                </div>
                                </div>
                            <div class="form-group row">
                                <label for="dl_date" class="col-sm-3 col-form-label">วันที่รับสินค้ามา</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="dl_date" value="<?php echo date('Y-m-d');?>" name="dl_date" required>
                                    <div class="invalid-feedback">
                                        กรุณาเลือกวันที่รับสินค้ามา (ปี / เดือน / วัน)
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">อัพโหลดรูปภาพ</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="image" name="image" required>
                                    <div class="invalid-feedback">
                                        กรุณาใส่รูปภาพที่มีนามสกุลไฟล์ .jpg / .png
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dl_id" class="col-sm-3 col-form-label">เลือกชื่อร้านผู้จำหน่าย</label>
                                <div class="col-sm-9">
                                  <select class="form-control" id = "dl_id" name="dl_id" required>
                                          <option value="" disabled selected>----- กรุณาเลือก -----</option>
                                            <?php $sql = "SELECT * FROM dealer";
                                            $result = $conn->query($sql);
                                            while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row['dl_id']; ?>"><?php echo $row["dl_nameshop"]; ?></option>
                                                      <?php } ?>
                                                      </select>
                                    <div class="invalid-feedback">
                                        กรุณาเลือกชื่อร้านผู้จำหน่าย
                                    </div>
                                </div>
                            </div>
                            <center><input type="submit" name="submit" class="btn btn-success" value="ยืนยันการทำรายการ">
                            <a class="btn btn-danger" href="../product.php">ยกเลิก</a></center>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
            // ตรวจสอบการกรอกข้อมูลชนิดที่ไม่ช่ตัวเลข
            function IsNumeric(sText, obj) {
                var ValidChars = "0123456789,";
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

<?php
    /**
     * เปิดใช้งาน Session
     */
    session_start();
    if (!$_SESSION['id']) {
        header("Location:login.php");
    } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูลการซ่อม</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <?php
    include('connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน

        if(isset($_POST['submit'])){

                if($result){
                    echo '<script> alert("สำเร็จ! เพิ่มข้อมูลการซ่อมเรียบร้อย")</script>';
                    header('Refresh:1; url=index.php');
                }else{
                    echo '<script> alert("ล้ล้มเหลว! ไม่สามารถเพิ่มข้อมูลการซ่อมได้ กรุกรุกรุณาลองใหม่อีกครั้ง")</script>';
                    header('Refresh:1; url=index.php');
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
             <li  class="active">
                 <a href="index.php"><i class="fas fa-toolbox mr-1"></i>เพิ่มข้อมูลการซ่อม</a>
             </li>
             <li>
                 <a href="history.php"><i class="fas fa-bell"></i> ประวัติการซ่อม</a>
             </li>
             <li>
                 <a href="user.php"><i class="fas fa-users"></i> ข้อมูลลูกค้า</a>
             </li>
             <li>
                 <a href="staff.php"><i class="fas fa-user-cog"></i> ข้อมูลพนักงาน</a>
             </li>
             <li>
                 <a href="product.php"><i class="fas fa-box"></i> ข้อมูลสินค้า</a>
             </li>
             <li>
                 <a href="dealer.php"><i class="fas fa-truck"></i> ข้อมูลผู้จำหน่ายสินค้า</a>
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
                     <ul class="nav navbar-nav ml-auto ">
                         <li class="nav-item active">
                           <?php if(isset($_SESSION['id'])) { ?>
                             <center><h5><?php echo $_SESSION["First_Name"];?> <?php echo $_SESSION["Last_Name"];?> <a class="btn btn-danger ml-2"data-toggle="modal" data-target="#LogoutModal" href="#"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a></h5></center>
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

           <div class="container">
                <div class="row">
                    <div class="col-md-9 mx-auto mt-5">
                        <div class="card">

                                <div class="card-header text-center text-white bg-primary">
                                    <h3>กรอกข้อมูลการซ่อม</h3>
                                </div>
                                  <div class="card-body">
                                    <form method="GET">
                                    <div class="form-group row">
                                        <label for="bike_id" class="col-sm-3 col-form-label">เลขทะเบียนรถ</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="bike_id" name="bike_id" required value="<?= !empty($_GET["bike_id"]) ? $_GET["bike_id"] : "" ?>">
                                          </div>
                                            <div class="col-sm-2">
                                              <button class="btn btn-primary mb-2 float-right" type="submit"><i class="fas fa-search"></i> ค้นหา </button>
                                        </div>
                                    </div>
                                  </form>
                                    <form class="was-validated" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="bike_id" class="col-sm-3 col-form-label">ชื่อ</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="bike_id" name="bike_id" required>
                                            <div class="invalid-feedback">
                                                กรุณากรอกชื่อลูกค้า
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bike_id" class="col-sm-3 col-form-label">นามสกุล</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="bike_id" name="bike_id" required>
                                            <div class="invalid-feedback">
                                                กรุณากรอกนามสกุลลูกค้า
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="datetime" class="col-sm-3 col-form-label">วันที่เข้ารับการซ่อม</label>
                                        <div class="col-sm-9">
                                            <input type="datetime" class="form-control" id="datetime" value="<?php date_default_timezone_set('asia/bangkok'); echo date('Y-m-d H:i:s');?>" name="datetime" required>
                                            <div class="invalid-feedback">
                                                กรุณาเลือกวันที่เข้ารับการซ่อม
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user_address" class="col-sm-3 col-form-label">รายละเอียดการซ่อม</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" id="user_address" name="user_address" required></textarea>
                                            <div class="invalid-feedback">
                                                กรุณากรอกรายละเอียดการซ่อม
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staff_id" class="col-sm-3 col-form-label">เลือกชื่อพนักงาน</label>
                                        <div class="col-sm-9">
                                          <select class="form-control" id = "staff_id" name="staff_id" required>
                                                  <option value="" disabled selected>----- กรุณาเลือกพนักงาน -----</option>
                                                    <?php $sql = "SELECT * FROM staff";
                                                    $result = $conn->query($sql);
                                                    while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $row['staff_id']; ?>"><?php echo $row["staff_fname"]; ?> <?php echo $row["staff_lname"]; ?></option>
                                                              <?php } ?>
                                                              </select>
                                            <div class="invalid-feedback">
                                                กรุณาเลือกชื่อพนักงาน
                                            </div>
                                        </div>
                                    </div>
                                  </form>
                                    <table class="table table-bordered text-center DataTable">

                           <thead class="thead-light">
                             <tr>
                               <th width="10%">ลำดับ</th>
                               <th width="40%">ชื่อสินค้า</th>
                               <th width="20%">ราคาต่อชิ้น</th>
                               <th width="20%">จำนวนสินค้า</th>
                               <th width="10%">เลือก</th>
                             </tr>
                           </thead>
                           <tbody>
                                        <?php
                                     $search=isset($_GET['search']) ? $_GET['search']:'';

                                     $sql = "SELECT product.p_id, product.pname, product.price, product.numproduct, product.detail, product.image, dealer.dl_nameshop, dealer.dl_phone, product.dl_insurance
                                             FROM `product`
                                             INNER JOIN dealer
                                             ON dealer.dl_id = product.dl_id
                                             WHERE pname LIKE '%$search%'";
                                     $result = $conn->query($sql);
                                     $num = 0;
                                     while ($row = $result->fetch_assoc()) {
                                       $num++;
                                       ?>
                                       <tr>
                                         <td><?php echo $num; ?></td>
                                         <td><?php echo $row['pname']; ?></td>
                                         <td><?php echo $row['price']; ?> บาท</td>
                                         <td><?php echo $row['numproduct']; ?></td>
                                         <td>
                                           <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="customControlValidation<?=$num?>" name="lists[]" value="<?=$row['p_id']?>">
                                          <label class="custom-control-label" for="customControlValidation<?=$num?>"> เลือก</label>
                                        </div>
                                           <?php } ?>
                                         </td>
                                       </tr>
                                     </tbody>
                                   </table>
                                   <br>
                                   <center><input type="submit" name="submit" class="btn btn-success " value="ยืนยันการทำรายการ"></center>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $('.DataTable').DataTable({
            "oLanguage": {
                "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "แสดง _MENU_ แถว",
                "sLoadingRecords": "กำลังโหลดข้อมูล...",
                "sProcessing": "กำลังดำเนินการ...",
                "sSearch": "ค้นหาอะไหล่ที่ต้องการ : ",
                "sZeroRecords": "ไม่พบข้อมูล",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "หน้าสุดท้าย"
                },
                "oAria": {
                    "sSortAscending": ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                    "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
                }
            },
            "lengthMenu": [[-1], ["All"]],
            "bPaginate": false,
            "bInfo" : false

        });
    </script>
</body>
</html>
<?php } ?>

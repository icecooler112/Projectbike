<?php
    /**
     * เปิดใช้งาน Session
     */
    session_start();
    if (!$_SESSION['id']) {
        header("Location:login.php");
    } else {
?>
<?php     include('connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน ?>
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
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
             <li>
                 <a href="index.php"><i class="fas fa-toolbox mr-1"></i>เพิ่มข้อมูลการซ่อม</a>
             </li>
             <li>
                 <a href="history.php"><i class="fas fa-bell"></i> ประวัติการซ่อม</a>
             </li>
             <li class="active">
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
<center><p><h2>ข้อมูลลูกค้า</h2></p></center>
<a href="manage_user/create_user.php" class="btn btn-success mb-2 float-right"><i class="fas fa-plus"></i> เพิ่มข้อมูลลูกค้า </a>
           <table class="table table-bordered text-center DataTable">

             <thead class="thead-light">
               <tr>
                 <th scope="col">ลำดับ</th>
                 <th scope="col">ชื่อ-สกุล</th>
                 <th scope="col">ที่อยู่</th>
                 <th scope="col">เบอร์โทรศัพท์</th>
                 <th scope="col">Email</th>
                 <th scope="col">Facebook</th>
                 <th scope="col">Line</th>
                  <th scope="col">จัดการข้อมูลรถ</th>
                 <th scope="col">แก้ไข</th>
                 <th scope="col">ลบ</th>
               </tr>
             </thead>
             <tbody>
             <?php
                      $search=isset($_GET['search']) ? $_GET['search']:'';

                      $sql = "SELECT * FROM user WHERE first_name LIKE '%$search%'";
                      $result = $conn->query($sql);
                      $num = 0;
                      while ($row = $result->fetch_assoc()) {
                        $num++;
                        ?>
                       <tr>
                         <td><?php echo $num; ?></td>
                         <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                         <td><?php echo $row['user_address']; ?></td>
                         <td><?php echo $row['phone']; ?></td>
                         <td><?php echo $row['email']; ?></td>
                         <td><?php echo $row['user_facebook']; ?></td>
                         <td><?php echo $row['user_line']; ?></td>
                         <td>

                           <a href="manage_user/bike_show.php?id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-primary ">
                             <i class="fas fa-arrow-circle-down"></i> จัดการ
                           </a>
                         </td>
                         <td>
                           <a href="manage_user/edit_user.php?id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-warning text-white ">
                             <i class="fas fa-edit"></i> แก้ไข
                           </a>
                         </td>
                         <td>
                           <?php if ($row['user_id']) { ?>
                             <a href="#" onclick="deleteItem(<?php echo $row['user_id']; ?>);" class="btn btn-sm btn-danger">
                               <i class="fas fa-trash-alt"></i> ลบ
                             </a>
                           <?php } ?>
                         </td>
                       </tr>
                     <?php } ?>



             </tbody>
           </table>


           <!-- Script Delete -->
           <script>
                 function deleteItem(id) {
                   if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่') == true) {
                     window.location = `manage_user/delete_user.php?id=${id}`;
                   }
                 };
               </script>


    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $('.DataTable').DataTable({
            "oLanguage": {
                "sEmptyTable": "ไม่พบข้อมูลในตาราง",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "แสดง _MENU_ แถว",
                "sLoadingRecords": "กำลังโหลดข้อมูล...",
                "sProcessing": "กำลังดำเนินการ...",
                "sSearch": "ค้นหา: ",
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
            }

        });
    </script>

</body>
</html>
<?php } ?>

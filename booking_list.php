<?php
    require 'dbconn.php';
  
    $sql = "SELECT * FROM reservation";
    
    $result = $conn->query($sql);
    
    if(!$result){
        die("Error : ". $conn->$conn_error);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>PetVilla</title>
    <link rel="stylesheet" href="meowstyle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit:wght@200&family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="img/cat_icon01.png" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<style>
    td img
    {
        width: 200px;
        height: 120px;
    }


</style>

</head>
<body>

<!--------------------------  Navigation Bar  ---------------------------------->

    <nav>
        <a id="MeowVilla" href="admin_dashboard.php"><img src="img/PetVilla_Logo.png" alt=""></a>       
        <a href="admin_dashboard.php">รายชื่อสัตว์เลี้ยง</a>
        <a href="employee_list">รายชื่อพนักงาน</a>
        <a href="#">รายการห้องพัก</a>
                         
        <a href="index.php" id="loginbtn" class="logout">ออกจากระบบ</a>

    </nav>
    <div class="bottom-stroke">
        <br>
    </div>
<!---------------------------Main---------------------------------->
<br><br>
<h4 style="margin-left:60px">รายการชำระเงิน</h4><br><br>
<table style="font-family: 'Kanit', sans-serif;" id="tableadmin" class="table table-striped">
    <thead>
        <tr>
            <th scope="col">REV-ID</th>
            <th scope="col">H-ID</th>
            <th scope="col">วันที่เข้าพัก</th>
            <th scope="col">วันที่ออก</th>
            <th scope="col">ชำระเงิน</th>
            <th scope="col">จำนวนสัตว์เลี้ยง</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["reservation_id"]."</td>";
            echo "<td>".$row["headquarter_id"]."</td>";
            echo "<td>".$row["checkin_date"]."</td>";
            echo "<td>".$row["checkout_date"]."</td>";
            echo "<td>".$row["payment_amount"]."</td>";
            echo "<td>".$row["pet_number"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>ไม่มีข้อมูล</td></tr>";
    }
    $conn->close();
    ?>
    </tbody>
</table>



<!-------------------- Bottom(Footer) -------------------------->

<footer class="bg-dark text-light py-4">
    <div class="container">
        <div class="footer-flex">
            <div class="footer-section">
                <h3>สาขาใกล้บ้านคุณ</h3>
                <p>📍 ดอนเมือง<br>📍 สนามบินสุวรรณภูมิ<br>📍 หมอชิต<br>📍 โคกอีเลิ้งซิตี้</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <ul class="list-unstyled">
                    <li><a href="#"><img src="img/facebook.png" alt="">Facebook : PetVilla</a></li>
                    <li><a href="#"><img src="img/twitter.png" alt="">Twitter(X) : @PetVilla_official</a></li>
                    <li><a href="#"><img src="img/instagram.png" alt="">Instagram : PetVilla</a></li>
                    <li><a href="#"><img src="img/line.png" alt="">Line : @PetVilla</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Developed By.</h3>
                <p>Mr.Pakkatorn Pommin <br>Mr.Pitipong Prasirtsak <br>Mr.Sawettachat Kasemyart</p>
            </div>
        </div>
    </div>
</footer>


<script>

const logoutLinks = document.querySelectorAll('.logout');
logoutLinks.forEach((link) => {
  link.addEventListener('click', function (e) {
    e.preventDefault(); // ป้องกันการนำทางไปยัง index.html โดยค่าพื้นฐานของลิงค์

    Swal.fire({
      title: 'ยืนยันการออกจากระบบ',
      text: 'คุณแน่ใจหรือไม่ว่าต้องการออกจากระบบ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'ใช่',
      cancelButtonText: 'ยกเลิก',
    }).then((result) => {
      if (result.isConfirmed) {
        // ทำการออกจากระบบ
        // ตรงนี้คุณสามารถเพิ่มโค้ดเพื่อนำผู้ใช้ออกจากระบบ เช่น การลบคุกกี้หรือทำการตัดการเชื่อมต่อ
        window.location.href = 'index.php'; // นำทางไปยังหน้า index.html หรืออีกหน้าที่คุณต้องการ
      }
    });
  });
});

</script>
</body>
</html>
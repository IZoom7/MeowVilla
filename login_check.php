<body style="font-family: 'Itim', cursive;">
    

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$mysqli = new mysqli("localhost", "u109030572_adminpet", "mrJZP1212.", "u109030572_petvilla");

// ตรวจสอบการเชื่อมต่อ
if ($mysqli->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $mysqli->connect_error);
}

// รับข้อมูลจากแบบฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the username is 'admin' and the password is '1234'
if ($username === 'admin' && $password === '1234') {
    // Redirect to admin_dashboard.php with SweetAlert
    echo '<body><script>
        Swal.fire({
            icon: "success",
            title: "เข้าสู่ระบบสำเร็จ",
            text: "รอซักครู่นะเหมียว..."
        });
        setTimeout(function() {
            window.location = "admin_dashboard.php";
        }, 2000); // รอเวลา 2 วินาที (2000 มิลลิวินาที) ก่อนเปลี่ยนหน้า
    </script></body>';
} else {
    // สอบถามฐานข้อมูลเพื่อตรวจสอบชื่อผู้ใช้และรหัสผ่าน
    $query = "SELECT * FROM owner WHERE owner_username = '$username' AND owner_password = '$password'";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {
        // ถ้าข้อมูลตรงกัน

        session_start(); // เริ่มเซสชัน
        $_SESSION['username'] = $username; // เก็บชื่อผู้ใช้ในเซสชัน

        // แสดง SweetAlert แจ้งเตือนสำเร็จ
        echo '<body><script>
            Swal.fire({
                icon: "success",
                title: "เข้าสู่ระบบสำเร็จ",
                text: "รอซักครู่นะเหมียว..."
            });
            setTimeout(function() {
                window.location = "home_session.php";
            }, 2000); // รอเวลา 2 วินาที (2000 มิลลิวินาที) ก่อนเปลี่ยนหน้า
        </script></body>';
    } else {
        // ถ้าไม่ตรงกัน
        echo '<body><script>
            // ใช้ SweetAlert เพื่อแสดงข้อความแจ้งเตือน
            Swal.fire({
                icon: "error",
                title: "เกิดข้อผิดพลาด",
                text: "ไม่พบผู้ใช้หรือข้อมูลไม่ตรงกัน"
            }).then(function() {
                window.location = "login.php";
            });
        </script></body>';
    }
}
?>

</body>
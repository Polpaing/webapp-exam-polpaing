<?php
    include 'db.php';
    session_start();

    // ดึงข้อมูลผู้ใช้งานจาก Data base
    $sql = "SELECT `id`, `student_id`, `full_name`, `email`, `class`,`profile_image` FROM `students`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>
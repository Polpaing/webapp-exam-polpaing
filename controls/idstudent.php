<?php
    include 'db.php';

    // ดึงข้อมูลผู้ใช้งานตาม id
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->execute([$id]);
    $students = $stmt->fetch(PDO::FETCH_ASSOC);
?>
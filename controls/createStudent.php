<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    header("location: /test/index.php");
}
    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $student_id = $_POST['student_id'];
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $class = $_POST['class'];
        $profile_image = null;

        if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0){
            $target_dir = "../assets/imgs/";
            $image_name = basename($_FILES["profile_image"]["name"]);
            $target_files = $target_dir . $image_name;

            $imageFileType = strtolower(pathinfo($target_files, PATHINFO_EXTENSION));
            if(in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_files)) {
                    $profile_image = $image_name;
                } else {
                    $_SESSION['error'] = "Failed to upload image.";
                    header("Location: ../addstudent.php");
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid image format.";
                header("Location: ../addstudent.php");
                exit;
            }
        }

 $sql = "INSERT INTO students (student_id, full_name, email, class, profile_image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $student_id,
            $full_name,
            $email,
            $class,
            $profile_image
        ]);
        header("Location: ../index.php");
    }
       
?>
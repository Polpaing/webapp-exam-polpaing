<?php
session_start();
    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $student_id = $_POST['student_id'];
        $full_name = $_POST['full_name'];
        $class = $_POST['class'];
        $email = $_POST['email'];
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
                    header("Location: ../editstudent.php?id=".$id);
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid image format.";
                header("Location: ../editstudent.php?id=".$id);
                exit;
            }
        }
        
        $stmt = $pdo->prepare("UPDATE students SET student_id = ?, full_name = ?, email = ?, class = ?" . ($profile_image ? ", profile_image = ?" : ""). " WHERE id = ?");
        $params = [$student_id, $full_name, $email, $class];
        if ($profile_image) {
            $params[] = $profile_image;
        }
        $params[] = $id;
        $result = $stmt->execute($params);

        if($result){
            $_SESSION['success'] = "User updated successfully!";
            header("Location: ../index.php");
        } else {
            $_SESSION['error'] = "Failed to update user.";
            header("Location: ../editstudent.php?id=".$id);
        }
        exit;

    }

?>
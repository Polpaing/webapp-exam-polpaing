

<?php

include 'controls/idstudent.php';

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /test/index.php");
    exit;

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- SweetAlert2 CDN -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="d-flex">
        <main class="p-4 flex-grow-1">
            <h2>แก้ไขนักเรียน</h2>
            <form action="controls/editStudent.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $students['id']; ?>">

                <div class="mb-3">
                    <label for="student_id" class="form-label">student_id</label>
                    <input type="text" id="student_id" name="student_id" class="form-control"
                        value="<?= htmlspecialchars($students['student_id']); ?>">
                </div>
                <div class="mb-3">
                    <label for="full_name" class="form-label">full_name</label>
                    <input type="text" id="full_name" name="full_name" class="form-control"
                        value="<?= htmlspecialchars($students['full_name']); ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" id="email" name="email" class="form-control"
                        value="<?= htmlspecialchars($students['email']); ?>">
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">class</label>
                    <input type="text" id="class" name="class" class="form-control"
                        value="<?= htmlspecialchars($students['class']); ?>">
                </div>
                <div class="mb-3">
                    <label for="profile_image" class="mb-1">Picture</label>
                    <br><img src="assets/imgs/<?= htmlspecialchars($students['profile_image']); ?>" alt="" style="width: 100px">
                <div class="mb-3">
                    <label for="">Picture</label>
                    <input type="file" name="profile_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                <button type="reset" class="btn btn-danger">รีเซ็ต</button>
                <a href="index.php" class="btn btn-secondary">ย้อนกลับ</a>
            </form>
        </main>
    </div>
</body>

</html>
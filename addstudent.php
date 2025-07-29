<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddProduct</title>
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
    
    <main class="p-4 flex-grow-1">
        <h2>addstudent</h2>
        <form method="POST" action="controls/createStudent.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="student_id" class="form-label">student_id</label>
              <input type="text" name="student_id" class="form-control" require>
            </div>
            <div class="mb-3">
              <label for="full_name" class="form-label">full_name</label>
              <input type="text" name="full_name" class="form-control" require>
            </div>
            <div class="mb-3">
              <label for="class" class="form-label">class</label>
              <input type="text" name="class" class="form-control" require>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">email</label>
              <input type="email" name="email" class="form-control" require>
            </div>
            <div class="mb-3">
                    <label for="class">profile_image</label>
                    <input type="file" name="profile_image" class="form-control">
            </div>
             <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
             <button type="reset" class="btn btn-danger">รีเซ็ต</button>
             <a href="index.php" class="btn btn-secondary">ย้อนกลับ</a>
        </form>
        
    </main>
</body>

</html>